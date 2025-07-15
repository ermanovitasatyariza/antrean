<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalDokter;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class JadwalDokterController extends Controller
{
    public function pilihPoli()
    {
        $response = Http::get('http://192.168.80.119/service-bpjs/api/antrean/bpjs/ref/poli');

        if ($response->successful()) {
            $data = $response->json();
            $daftarPoli = collect($data['data'] ?? [])
                ->groupBy('kdpoli') // kelompokkan berdasarkan kode poli
                ->map(function ($items) {
                    return $items->first(); // ambil satu item dari tiap grup
                })
                ->sortBy('nmpoli') // urutkan berdasarkan nama poli
                ->values()
                ->all();

            return view('jadwal-pilih-poli', compact('daftarPoli'));
        } else {
            // Jika gagal ambil dari API, bisa fallback ke array default atau error message
            return back()->withErrors(['Gagal mengambil data poli dari API']);
        }
    }

    public function listByPoli(Request $request)
    {
        $kodepoli = $request->query('poli');

    if (!$kodepoli) {
        return response()->json(['message' => 'Kode poli wajib diisi'], 422);
    }

    $start = Carbon::now()->startOfMonth();
    $end = Carbon::now()->endOfMonth();

    $period = CarbonPeriod::create($start, $end);
    $data = [];

    foreach ($period as $date) {
        $tanggal = $date->format('Y-m-d');
        $url = "http://192.168.80.119/service-bpjs/api/antrean/bpjs/ref/jadwaldokter/{$kodepoli}/{$tanggal}";

        $response = Http::get($url);

        if ($response->successful()) {
            $json = $response->json();
            $dayData = $json['data'] ?? [];
            $data = array_merge($data, $dayData); // Gabungkan ke array utama
        }
    }

    return view('jadwal-dokter', compact('data'));
    }

    public function dokterByPoliAjax(Request $request)
    {
        $kodepoli = $request->query('kodepoli');
        $tanggal = now()->format('Y-m-d');

        if (!$kodepoli) {
            return response()->json(['status' => 'error', 'message' => 'Kode poli wajib diisi'], 422);
        }

        $url = "http://192.168.80.119/service-bpjs/api/antrean/bpjs/ref/jadwaldokter/{$kodepoli}/{$tanggal}";
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json()['data'] ?? [];
            return response()->json(['status' => 'success', 'data' => $data]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Gagal mengambil data dokter']);
        }
    }

}
