@extends('layouts.app')
@section('hide-title-ekios', true)
@section('title', '| Display')
@section('header-left')
    @php
        $from = request()->query('from', 'dashboard'); // default ke ekios
        if ($from === 'dashboard') {
            $backUrl = url('dashboard');
        }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a>
@endsection
@section('header-center', 'ANTREAN POLI SEDANG DILAYANI')
@section('content')
    <header class="dashboard-header">
      <a href="dashboard.html" class="back-button">&#8592;</a>
      <h1>ANTREAN POLI</h1>
    </header>
    <main>
        <div class="judul-display">SEDANG DILAYANI</div>
       <div class="wrapper-marquee">
        <div class="marquee-track" id="marqueeTrack">
          <div class="container-display-poli" id="poliContent">
            <div class="kotak-poli">
                <div>Geriatri</div>
                <div>Nama Dokter</div>
                <div class="nomor-antrian">PB-001</div>
                <div>Nama Pasien</div>
              </div>
              <div class="kotak-poli">
                <div>Psikologi</div>
                <div>Nama Dokter</div>
                <div class="nomor-antrian">PB-002</div>
                <div>Nama Pasien</div>
              </div>
              <div class="kotak-poli">
                <div>Kardiovaskuler</div>
                <div>Nama Dokter</div>
                <div class="nomor-antrian">PB-005</div>
                <div>Nama Pasien</div>
              </div>
              <div class="kotak-poli">
                <div>Spesialis Anak</div>
                <div>Nama Dokter</div>
                <div class="nomor-antrian">PB-006</div>
                <div>Nama Pasien</div>
              </div>
          </div>
        </div>
      </div>
       <div class="dipanggil-box">
          <div class="judul-dipanggil">ANTREAN DIPANGGIL</div>
          <div class="info-poli">Nama Poli</div>
          <div class="nomor-dipanggil">PB-001</div>
          <div class="info-dokter">Nama Dokter</div>
          <div class="info-pasien">Nama Pasien</div>
        </div>
@endsection
