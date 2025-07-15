<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\AntreanPoli;

class AntreanPoliController extends Controller
{
    //
    public function store(Request $request)
    {
        // Simpan data ke tabel antrean_poli
        $data = $request->only([
            'ssn',
            'payer',
            'status_pasien',
            'bpjs_card_no',
            'no_rujukan',
            'medical_no',
            'patient_name',
            'dob',
            'kodepoli',
            'namapoli',
            'namasubspesialis',
            'namadokter',
            'jadwal'
        ]);

        // Generate nomor antrean sederhana (misal berdasarkan urutan terakhir + 1)
        $lastAntrean = AntreanPoli::where('namadokter', $data['namadokter'])
            ->max('nomor_antrean');
        $data['nomor_antrean'] = $lastAntrean ? $lastAntrean + 1 : 1;

        // Jika kamu memiliki logika prioritas, kamu bisa tambahkan:
        $data['is_prioritas'] = 0; // default bukan prioritas

        // Simpan ke database
        $antreanpoli = AntreanPoli::create($data);

        session([
            'nomor_antrean' => $antreanpoli->nomor_antrean,
            'payer' => $antreanpoli->payer,
            'status_pasien' => $antreanpoli->status_pasien,
            'created_at' => $antreanpoli->created_at,
            'is_prioritas' => $antreanpoli->is_prioritas,
            'namasubspesialis' => $antreanpoli->namasubspesialis,
            'namadokter' => $antreanpoli->namadokter,
            'jadwal' => $antreanpoli->jadwal,

        ]);

        // Redirect ke halaman print atau success
        return redirect()->to('/print'); // Ganti dengan route tujuan setelah konfirmasi
    }

    public function tampilAntreanSedangDilayani(Request $request)
    {
        // Ambil dari query string, jika tidak ada ambil dari session
        $dokter = $request->query('namadokter') ?? session('namadokter');

        if (!$dokter) {
        return redirect()->back()->with('error', 'Nama dokter tidak tersedia.');
    }

        // Ambil antrean terbaru untuk dokter tersebut
        $antrean = AntreanPoli::where('namadokter', $dokter)
                ->orderBy('created_at', 'desc')
                ->first();

        if (!isset($antrean)) {
            $antrean = null;
        }
        if (!isset($dokter)) {
            $dokter = '-';
        }

        session([
            'namadokter' => $antrean->namadokter,
        ]);

        return view('poli-panggilantreanpoli', compact('antrean', 'dokter'));
    }
}
