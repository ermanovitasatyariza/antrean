@extends('layouts.app')
@section('hide-title-ekios', true)
@section('title', '| Poli')
@section('header-left')
    @php
        $from = request()->query('from', 'dashboard'); // default ke ekios
        if ($from === 'dashboard') {
            $backUrl = url('dashboard');
        }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a>
@endsection
@section('header-center', 'PILIH POLI ANTREAN POLI')
@section('content')
    <div class="container-dashboard-antrean">
    <div class="pilihpoli-right-section-antrean">
        <div class="pilihpoli-input-group">
            <h2>Poli</h2>
            <p>Silakan pilih poli :</p>
            <select class="pilihpoli-select">
            <option disabled selected>-- Pilih Poli --</option>
            <option value="umum">Poli Umum</option>
            <option value="gigi">Poli Gigi</option>
            <option value="anak">Poli Anak</option>
            <option value="penyakit-dalam">Poli Penyakit Dalam</option>
            </select>
        </div>
        <div class="pilihpoli-input-group">
            <h2>Dokter</h2>
            <p>Silakan pilih Dokter dan Jadwal Dokter :</p>
            <select class="pilihpoli-select">
            <option disabled selected>-- Pilih Dokter & Jadwal --</option>
            <option value="dr-andi">dr. Andi - Senin 08:00</option>
            <option value="dr-budi">dr. Budi - Selasa 10:00</option>
            <option value="dr-citra">dr. Citra - Rabu 13:00</option>
            </select>
        </div>
            <button class="btn-panggil" onclick="window.location.href='{{ url('poli-panggilantreanpoli') }}?from=poli-pilihpolidokterantrean'">Selanjutnya</button>
    </div>
    </div>
@endsection
