<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'portofolio';
    protected $primaryKey = 'id_toko';
    public $timestamps = true;

    protected $fillable = [
        'nama_toko', 'nama_pemilik', 'alamat', 'no_hp', 'logo', 'foto',
        'foto_hero', 'tgl_daftar', 'id_admin', 'id_kategori', 'deskripsi',
        'cerita_usaha', 'tahun_berdiri', 'instagram', 'jam_operasional',
        'template', 'slug', 'status_website', 'testimoni',
    ];

    protected $casts = [
        'testimoni' => 'array',
        'tahun_berdiri' => 'integer',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_toko', 'id_toko');
    }
}