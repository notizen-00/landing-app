<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'no_mitra',
        'user_id',
        'program_id',
        'nama_usaha',
        'deskripsi_usaha',
        'nama_kecamatan',
        'alamat_usaha',
        'no_ijin_usaha',
        'npwp_usaha',
        'status_mitra',
    ];

    protected $table='mitra';

    public function users(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function produk(){
        return $this->hasMany(Produk::class,'mitra_id','id');
    }

    public function program(){
        return $this->hasOne(Program::class,'id','program_id');
    }
}
