<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'name.required'=>'Please fill in the name, you know it will hurt if you dont fill it in',
            'email.required'=>'Please fill in the email, you know it will hurt if you dont fill it in',
            'email.email'=>'Email format is incorrect',
            'password.required'=>'Please fill in the password, you know it will hurt if you dont fill it in'
        ]);

        User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'admin'
        ]);
        session()->flash('success','registered successfully');
        return redirect()->route('register');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
