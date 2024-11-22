<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobil extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='mobil';
    protected $primarykey='id';
    protected $fillable=['id', 'user_id', 'no_polisi', 'merk', 'jenis', 'kapasitas', 'harga', 'foto'];

    public function user():BelongsTo{
        return $this->belongsTo(user::class);
    }
}
