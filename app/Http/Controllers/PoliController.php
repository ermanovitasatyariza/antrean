<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliController extends Controller
{
    //
    public function setSession(Request $request)
    {
        session([
            'nmpoli' => $request->nmpoli,
            'namadokter' => $request->namadokter,
            'jadwal' => $request->jadwal,
            'namasubspesialis' => $request->namasubspesialis,
        ]);
        return redirect()->to('/poli-panggilantreanpoli');
    }
}
