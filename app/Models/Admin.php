<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    public $timestamps = false;

    protected $fillable = [
        'username', 'password', 'nama_admin', 'email', 'foto'
    ];

    public function logAktivitas()
    {
        return $this->hasMany(LogAktivitas::class, 'id_admin', 'id_admin');
    }
}