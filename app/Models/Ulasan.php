<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasan';
    
    // WAJIB: 'status' harus ada di sini!
    protected $fillable = [
        'nama',
        'pesan',
        'rating',
        'status'
    ];
}