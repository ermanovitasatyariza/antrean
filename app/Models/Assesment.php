<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assesment extends Model
{
    use HasFactory;

    protected $fillable = [
        'from',
        'usia_lebih_60',
        'bayi_baru_lahir',
        'penyandang_disabilitas',
        'nomor_antrean' // ← Tambahkan ini!
    ];
}
