<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HariKerja extends Model
{
    use HasFactory;

    protected $table = 'master_hari_kerja'; 

    protected $fillable = [
        'hari_kerja',
        'jam_masuk',
        'jam_pulang'
    ];
}
