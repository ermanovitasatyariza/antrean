<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assesment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payer',
        'status_pasien',
        'usia_lebih_60',
        'bayi_baru_lahir',
        'penyandang_disabilitas',
        'nomor_antrean',
        'is_prioritas', // ← Tambahkan ini!
    ];

    public static function gen_nomor($payer) {
         $lastNumber = Assesment::where('payer', $payer)
                                    ->where('is_prioritas', false)
                                    ->max('nomor_antrean') ?? 0;
         $nomorAntrean = $lastNumber + 1;
         return $nomorAntrean;
    }
}
