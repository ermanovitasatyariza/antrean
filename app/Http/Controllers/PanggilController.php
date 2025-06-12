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
        $payer = $request->query('payer');
        $status_pasien = $request->query('status_pasien');
        $is_prioritas = $request->query('is_prioritas');

        

        $query = Assesment::query();

        if ($is_prioritas) {
            $query->where('is_prioritas', true);
        } else {
            $query->where('is_prioritas', false)
                ->where('payer', $payer)
                ->where('status_pasien', $status_pasien);
        }

        // Simpan antrean terakhir dipanggil di session untuk navigasi "selanjutnya"
        $lastId = session('last_antrian_id');

        if ($lastId) {
            $query->where('id', '>', $lastId);
        }

        $antrian = $query->orderBy('id')->first();

        if ($antrian) {
            session(['last_antrian_id' => $antrian->id]);
            $nomor_antrean = $antrian->nomor_antrean;
            $created_at = $antrian->created_at;
        } else {
            $nomor_antrean = 'Tidak ada antrean';
            $created_at = null;
        }

        return view('admisi-panggil-loket1', compact('loket', 'payer', 'status_pasien', 'nomor_antrean', 'created_at'));
    }
}
