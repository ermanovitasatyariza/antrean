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

        @php
            $labelPasien = ucwords(str_replace('-', ' ', $pasien));
        @endphp

        @php
            $start = \Carbon\Carbon::parse($created_at);
            $now = \Carbon\Carbon::now();
            $diff = $now->diff($start);
            $lamaTunggu = sprintf('%02d:%02d:%02d', $diff->h, $diff->i, $diff->s);
        @endphp

    <div class="container-loketpanggil">
        <div class="box-kiri">
            <div class="latar">
                <div class="latar-content">
                    <strong>Nomor Antrian Dipanggil</strong>
                    <strong>Loket {{ $loket }} - {{ $labelPasien }}</strong>
                    {{-- <strong> </strong> --}}
                    <div class="nomor-antrian-panggil">{{ $nomor_antrean }}</div>
                </div>
                <div class="info-waktu">
                    <div><strong>Waktu Panggil</strong><br><span id="waktu-panggil">-</span></div>
                    <div><strong>Waktu Ambil</strong><br>{{ $created_at->format('d/m/Y H:i:s') }}</div>
                    <div><strong>Lama Tunggu</strong><br>{{ $lamaTunggu }}</div>
                </div>
            </div>
        </div>
        <div class="box-kanan">
        <div><strong>Antrian yang telah dilayani :</strong></div>
        <div><strong>Sisa Antrian :</strong></div>
        <div class="options">
            <label><input type="radio" name="aksi" value="selanjutnya">Selanjutnya</label>
            <label><input type="radio" name="aksi" value="lewati">Lewati</label>
            <button type="button" class="panggil-button">Panggil</button>
        </div>
        </div>
    </div>
@endsection
