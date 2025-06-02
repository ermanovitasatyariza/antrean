@extends('layouts.app')
@section('hide-title-ekios', true)
@section('title', '| Admisi')
@section('header-left')
    @php
        $from = request()->query('from'); // default ke ekios
        if ($from === 'admisi-pilihloket') {
            $backUrl = url('admisi-pilihloket');
        }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a>
@endsection
@section('header-center', 'PANGGIL ANTREAN ADMISI')
@section('content')
    <div class="container-loketpanggil">
        <div class="box-kiri">
            <div class="latar">
                <div class="latar-content">
                <strong>Nomor Antrian Yang Sedang Dilayani</strong><br>
                <strong>Loket : 1 .: Pasien Baru BPJS :. </strong>
                <div class="nomor-antrian">PB-001</div>
                </div>
                <div class="info-waktu">
                <div><strong>Waktu Panggil</strong> : HH:MM:SS</div>
                <div><strng>Waktu Ambil</strong> : HH:MM:SS</div>
                <div><strong>Lama Tunggu</strong> : HH:MM:SS</div>
                </div>
            </div>
        </div>
        <div class="box-kanan">
        <div><strong>Antrian yang telah dilayani :</strong></div>
        <div><strong>Sisa Antrian :</strong></div>
        <div class="options">
            <label><input type="radio" name="aksi" value="selanjutnya">Selanjutnya</label>
            <label><input type="radio" name="aksi" value="lewati">Lewati</label>
            <button class="panggil-button">Panggil Berikutnya</button>
        </div>
        </div>
    </div>
@endsection
