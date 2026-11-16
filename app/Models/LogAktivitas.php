<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAktivitas extends Model
{
    protected $table = 'log_aktivitas';
    protected $primaryKey = 'id_aktivitas';
    public $timestamps = true;

    protected $fillable = [
        'jenis_aktivitas', 'deskripsi_aktivitas', 'id_admin'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
}