<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assesment;

class PanggilController extends Controller
{
    //
    public function panggilAdmisi(Request $request)
    {
        $loket = $request->query('loket');
        $pasien = $request->query('pasien');

        // Mapping jenis pasien ke nilai from
        $mapping = [
            'Pasien Baru BPJS' => 'px-bpjs',
            'Pasien Asuransi Lainnya' => 'ekios',
            'Pasien Baru Umum' => 'px-personal',
            'Pasien Prioritas' => 'prioritas',
        ];

        $key = $mapping[$pasien] ?? null;

        if ($key === 'prioritas') {
            $antrian = Assesment::where('is_prioritas', true)
                        ->orderBy('created_at')
                        ->first();
        } elseif ($key) {
            $antrian = Assesment::where('from', $key)
                        ->where('is_prioritas', false)
                        ->orderBy('created_at')
                        ->first();
        } else {
            $antrian = null;
        }

        $nomor_antrean = $antrian ? $antrian->nomor_antrean : 'Tidak ada antrean';
        $created_at = $antrian ? $antrian->created_at : null;

        return view('admisi-panggil-loket1', compact('loket', 'pasien', 'nomor_antrean','created_at'));
    }
}
