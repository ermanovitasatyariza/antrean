@extends('layouts.app')
@section('hide-title-dashboard', true)
@section('header-center', 'E-KIOS AMBIL ANTREAN')
@section('hide-logout', true)
@section('content')
<div class="pilih-poli-wrapper">
    <p class="petunjuk-scroll">Geser ke atas/bawah dan pilih poli untuk melihat Jadwal Dokter</p>

    <div class="pilih-poli-scroll">
        <div class="pilih-poli-container">
            @foreach ($daftarPoli as $poli)
                <div class="poli-box">
                    <button onclick="window.location.href='{{ route('jadwal.list', ['poli' => $poli['kdpoli']]) }}'">
                        {{ $poli['nmpoli'] }}
                    </button>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
