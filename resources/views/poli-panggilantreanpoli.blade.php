@extends('layouts.app')
@section('hide-title-ekios', true)
@section('title', '| Poli')
@section('header-left')
    @php
        $from = request()->query('from', 'poli-pilihpolidokterantrean'); // default ke ekios
        if ($from === 'poli-pilihpolidokterantrean') {
            $backUrl = url('poli-pilihpolidokterantrean');
        }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a>
@endsection
@section('header-center', 'PANGGIL ANTREAN POLI')
@section('content')
    <div class="container-loket">
        <div class="kiri">
        <div class="kotak">Poli :</div>
        <div class="kotak">Dokter dan Jadwal :</div>
        <div class="kotak antrian-box">
            <div class="judul">Nomor Antrian Yang Sedang Dilayani</div>
            <div class="nomor">001</div>
            <div class="waktu">
            <div><strong>Waktu Ambil</strong> : HH:MM:SS</div>
            <div><strong>Waktu Panggil</strong> : HH:MM:SS</div>
            <div><strong>Lama Tunggu</strong> : HH:MM:SS</div>
            </div>
        </div>
        </div>
        <div class="kanan">
        <div class="kotak">Antrian yang telah dilayani :</div>
        <div class="kotak">Sisa Antrian :</div>
        <div class="kotak opsi">
            <label><input type="radio" name="aksi"> Normal</label>
            <label><input type="radio" name="aksi"> Prioritas</label>
            <label><input type="radio" name="aksi"> Lewati</label>
            <button class="btn-panggil">Panggil Berikutnya</button>
        </div>
        </div>
    </div>
@endsection
