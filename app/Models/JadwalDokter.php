<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalDokter extends Model
{
    use HasFactory;

    protected $fillable = [
    'kodesubspesialis', 'hari', 'kapasitaspasien', 'libur', 'namahari', 'jadwal',
    'namasubspesialis', 'namadokter', 'kodepoli', 'namapoli', 'kodedokter'
    ];
}
