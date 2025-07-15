<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntreanPoli extends Model
{
    use HasFactory;

    protected $table = 'antrean_poli';

    protected $fillable = [
        'ssn', 'payer', 'status_pasien', 'bpjs_card_no', 'no_rujukan',
        'medical_no', 'patient_name', 'dob',
        'kodepoli', 'nmpoli',
        'namasubspesialis', 'namadokter', 'jadwal',
        'nomor_antrean', 'is_prioritas'
    ];
}
