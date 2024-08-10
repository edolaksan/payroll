<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $table = 'master_gaji_karyawan';

    protected $fillable = [
        'pegawai_id',
        'gaji_pokok',
        'denda_keterlambatan',
        'bulan',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    // Overriding save method to auto-fill 'bulan'
    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->bulan = $model->created_at->format('Y-m'); // Mengisi kolom 'bulan' secara otomatis
    //     });
    // }
}


