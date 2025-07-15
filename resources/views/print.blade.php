@extends('layouts.app')
@section('hide-title-dashboard', true)
@section('hide-logout', true)
@section('content')
    <div class="print">
         <div class="ticket-box">
            <h2 class="ticket-title">FASKES TINGKAT LANJUT<br>RSUD SITI FATIMAH PROV SUMSEL</h2>
            <p class="ticket-time">{{ ucwords(session('created_at')) }} </p>
            <hr>
            <h1 class="ticket-number">{{ ucwords(session('nomor_antrean')) }}</h1>
            @if(session('is_prioritas'))
                <p class="ticket-subtitle">Loket Prioritas</p>
            @elseif(session('namasubspesialis'))
                <p class="ticket-warning">Spesialis/Subspesialis</p>
                <p class="ticket-subtitle">{{ ucwords(session('namasubspesialis')) }}</p>
                <p class="ticket-subtitle">{{ ucwords(session('namadokter')) }} ( {{ ucwords(session('jadwal')) }} )</p>
            @else
                <p class="ticket-subtitle">Loket Pasien {{ ucwords(session('status_pasien')) }} {{ ucwords(session('payer')) }}</p>
            @endif
            <hr>
            <div class="ticket-warning">*) Silakan mengambil nomor antrean baru,<br>jika nomor antrean terlewatkan</div>
        </div>

        <div class="print-container">
            <p>Klik <strong>“Print”</strong> untuk mencetak nomor antrean Anda</p>
        </div>
        <button class="print-button" onclick="printAndRedirect()">Print</button>
    </div>
@endsection
