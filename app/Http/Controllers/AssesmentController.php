<?php

namespace App\Http\Controllers;

use App\Models\Assesment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
class AssesmentController extends Controller
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
    public function create(Request $request)
    {
        //
        // return view('assesment');
        {
            $from = $request->query('from', 'ekios'); // default jika tidak ada

            return view('assesment', compact('from'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'from' => 'required|string|in:px-bpjs,ekios,px-personal',
            'usia_lebih_60' => 'required|in:0,1',
            'bayi_baru_lahir' => 'required|in:0,1',
            'penyandang_disabilitas' => 'required|in:0,1',
        ]);

        $validated['usia_lebih_60'] = (int)$validated['usia_lebih_60'];
        $validated['bayi_baru_lahir'] = (int)$validated['bayi_baru_lahir'];
        $validated['penyandang_disabilitas'] = (int)$validated['penyandang_disabilitas'];

        // Cari nomor antrean terakhir untuk asal yg sama
        $last = Assesment::where('from', $validated['from'])->max('nomor_antrean') ?? 0;

        // Simpan ke DB
        $assesment = Assesment::create([
            'from' => $validated['from'],
            'usia_lebih_60' => $validated['usia_lebih_60'],
            'bayi_baru_lahir' => $validated['bayi_baru_lahir'],
            'penyandang_disabilitas' => $validated['penyandang_disabilitas'],
            'nomor_antrean' => $last + 1,
        ]);

        // Simpan ke session
        session([
            'nomor_antrean' => $assesment->nomor_antrean,
            'from' => $assesment->from,
        ]);

        return redirect('/print');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assesment  $assesment
     * @return \Illuminate\Http\Response
     */
    public function show(Assesment $assesment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assesment  $assesment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assesment $assesment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assesment  $assesment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assesment $assesment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assesment  $assesment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assesment $assesment)
    {
        //
    }
}
