<?php

// app/Models/Pegawai.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'master_pegawai'; 

    protected $fillable = [
        'nama',
        'jabatan',
        'gaji_pokok',
    ];

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function gaji()
    {
        return $this->hasOne(Gaji::class);
    }
}
