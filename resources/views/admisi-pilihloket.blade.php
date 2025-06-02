@extends('layouts.app')
@section('hide-title-ekios', true)
@section('title', '| Admisi')
@section('header-left')
    @php
        $from = request()->query('from', 'dashboard'); // default ke ekios
        if ($from === 'dashboard') {
            $backUrl = url('dashboard');
        }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a>
@endsection
@section('header-center', 'PANGGIL ANTREAN ADMISI')
@section('content')
    <div class="container-petugasadmisi">
        {{-- <p>Pilih Jenis Loket dan Jenis Antrean Pasien</p> --}}
        <div class="container-antrian">
            <div class="box-antrian">
                <button onclick="window.location.href='{{ url('admisi-panggil-loket1') }}?from=admisi-pilihloket'">
                    <div class="box-header">Loket 1</div>
                    <div class="box-footer">Pasien Baru BPJS</div>
                </button>
            </div>
            <div class="box-antrian">
                <button onclick="window.loacation.href='admisi-panggilantreanadmisi'">
                    <div class="box-header">Loket 2</div>
                    <div class="box-footer">Pasien Baru Umum</div>
                </button>
            </div>
            <div class="box-antrian">
                <button>
                    <div class="box-header">Loket 3</div>
                    <div class="box-footer">Pasien Asuransi Lainnya</div>
                </button>
            </div>
            <div class="box-antrian">
                <button>
                    <div class="box-header">Loket 4</div>
                    <div class="box-footer">Pasien Lama BPJS</div>
                </button>
            </div>
            <div class="box-antrian">
                <button>
                    <div class="box-header">Loket 5</div>
                    <div class="box-footer">Pasien Lama Umum</div>
                </button>
            </div>
            <div class="box-antrian">
                <button>
                    <div class="box-header">Loket 6</div>
                    <div class="box-footer">Pasien Asuransi Lainnya</div>
                </button>
            </div>
        </div>
    </div>
@endsection
