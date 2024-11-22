<?php

namespace App\Livewire;

use App\Models\Mobil;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class MobilComponent extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;

    protected $paginationTheme='bootstrap';
    public $addPage,$editPage=false;
    public $no_polisi,$merk,$jenis,$kapasitas,$harga,$foto,$id;
    public function render()
    {
        $data['mobil']=Mobil::paginate(10);
        return view('livewire.mobil-component', $data);
    }
    public function create(){
        $this->addPage=true;
    }
    public function store()
    {
        $this->validate([
            'no_polisi'=>'required',
            'merk'=>'required',
            'jenis'=>'required',
            'harga'=>'required',
            'foto'=>'required|image'
        ],[
            'no_polisi.required'=>'police number cannot be empty',
            'merk.required'=>'the brand cannot be empty',
            'jenis.required'=>'type brand cannot be empty',
            'harga.required'=>'price cannot be empty',
            'foto.required'=>'photo cannot be empty',
            'foto.image'=>'photo in image format!!!'
        ]);

    $this->foto->storeAs('public/mobil', $this->foto->hashName());
    Mobil::create([
        'user_id'=>auth()->user()->id,
        'no_polisi'=>$this->no_polisi,
        'merk'=>$this->merk,
        'jenis'=>$this->jenis,
        'harga'=>$this->harga,
        'foto'=>$this->foto->hashName()
    ]);
    session()->flash('success', 'successfully saved data');
    $this->reset();
    }
    public function edit($id){
        $this->editPage=true;
        $this->id=$id;
        $mobil=Mobil::find($id);
        $this->no_polisi=$mobil->no_polisi;
        $this->merk=$mobil->merk;
        $this->jenis=$mobil->jenis;
        $this->harga=$mobil->harga;
    }
    public function update(){
        $mobil=Mobil::find($this->id);
        if(empty($this->foto)){
            $mobil->update([
                'user_id'=>auth()->user()->id,
                'no_polisi'=>$this->no_polisi,
                'merk'=>$this->merk,
                'jenis'=>$this->jenis,
                'harga'=>$this->harga
            ]);
        }
        else{
            unlink (public_path('storage/mobil/'. $mobil->foto));
            $this->foto->storeAs('public/mobil', $this->foto->hashName());
            $mobil->update([
                'user_id'=>auth()->user()->id,
                'no_polisi'=>$this->no_polisi,
                'merk'=>$this->merk,
                'jenis'=>$this->jenis,
                'harga'=>$this->harga,
                'foto'=>$this->foto->hashName()
            ]);
        }
        session()->flash('success', 'successfully update data');
        $this->reset();
    }
    public function destroy($id){
        $mobil=Mobil::find($id);
        unlink(public_path('storage/mobil/'.$mobil->foto));
        $mobil->delete();
        session()->flash('success', 'successfully delete data');
        $this->reset();
    }
}