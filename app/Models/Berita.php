<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'judul',
        'author',
        'deskripsi',
        'konten',
        'status_berita'
        
    ];
    protected $table = 'berita';
    
    public function getCreatedAtAttribute($value)
    {
        // Ubah format tanggal dan waktu dari format default Laravel ke format Indonesia
        $tanggalJamIndo = \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s');
    
        return $tanggalJamIndo;
    }
    
}
