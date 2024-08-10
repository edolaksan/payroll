<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'data_absensi';

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = ['pegawai_id', 'tanggal', 'jam_masuk', 'jam_pulang'];

    // Relasi dengan model Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
