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
            'usia_lebih_60' => 'required|boolean',
            'bayi_baru_lahir' => 'required|boolean',
            'penyandang_disabilitas' => 'required|boolean',
        ]);

        $isPrioritas = $validated['usia_lebih_60'] || $validated['bayi_baru_lahir'] || $validated['penyandang_disabilitas'];

        if ($isPrioritas) {
            // Global nomor antrean prioritas
            $lastPriorityNumber = Assesment::where('is_prioritas', true)->max('nomor_antrean') ?? 0;
            $nomorAntrean = $lastPriorityNumber + 1;
        } else {
            // Nomor antrean biasa berdasarkan asal halaman
            $lastNumber = Assesment::where('from', $validated['from'])
                                    ->where('is_prioritas', false)
                                    ->max('nomor_antrean') ?? 0;
            $nomorAntrean = $lastNumber + 1;
        }

        $assesment = Assesment::create([
            'from' => $validated['from'],
            'usia_lebih_60' => $validated['usia_lebih_60'],
            'bayi_baru_lahir' => $validated['bayi_baru_lahir'],
            'penyandang_disabilitas' => $validated['penyandang_disabilitas'],
            'is_prioritas' => $isPrioritas,
            'nomor_antrean' => $nomorAntrean,
        ]);

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
