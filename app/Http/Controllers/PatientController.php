<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }

    public function cari(Request $request)
    {
        $request->validate([
        'rm1' => 'required|string|max:2',
        'rm2' => 'required|string|max:2',
        'rm3' => 'required|string|max:2',
        'rm4' => 'required|string|max:2',
        'day' => 'required|numeric|between:1,31',
        'month' => 'required|numeric|between:1,12',
        'year' => 'required|numeric|min:1900',
        ]);

        $no_rm = "{$request->rm1}-{$request->rm2}-{$request->rm3}-{$request->rm4}";
        $tgl_lahir = "{$request->year}-{$request->month}-{$request->day}";

        $pasien = Patient::where('MedicalNo', $no_rm)
                         ->whereDate('DateOfBirth', $tgl_lahir)
                         ->first();
        if (!$pasien) {
            return redirect()->back()->with('error', 'Pasien tidak ditemukan');
        } else {
            $backurl = $request->query('from', ''); // ambil "from" atau default kosong
            return view('pilih-poli-dokter', compact('pasien', 'backurl'));
        }
        // $backurl = $request->query('from', ''); // ambil "from" atau default kosong
        // return view('pilih-poli-dokter', compact('pasien', 'backurl'));
    }
}
