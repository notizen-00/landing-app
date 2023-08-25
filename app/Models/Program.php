<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_program',
        'deskripsi_program',
        'status_program',
    ];
    protected $table = 'program';

}
