<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    public $timestamps = true;

    protected $fillable = [
        'id_toko', 'nama_produk', 'harga', 'status_stok',
        'foto', 'nama_kategori', 'deskripsi',
    ];

    public function portofolio()
    {
        return $this->belongsTo(Portofolio::class, 'id_toko', 'id_toko');
    }
}