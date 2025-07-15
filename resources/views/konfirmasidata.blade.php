@extends('layouts.app')
@section('hide-title-dashboard', true)
@section('header-left')
    @php
    $from = request()->query('from', 'pilih-poli-dokter');
    $prev = request()->query('prev', null);

    // back ke halaman sebelumnya (pilih-poli-dokter), sambil menyertakan prev supaya info asal tetap utuh
    if ($from === 'pilih-poli-dokter' && $prev) {
        $backUrl = url('pilih-poli-dokter') . '?from=' . $prev;
    } elseif ($from === 'px-checkin') {
        // Kembali langsung ke px-checkin
        $backUrl = url('px-checkin');
    } else {
        $backUrl = url('/');
    }
    @endphp

<a href="{{ $backUrl }}" class="back-button">←</a>
@endsection
@section('header-center', 'KONFIRMASI DATA')
@section('hide-logout', true)
@section('content')

    @php
        $data = request()->all(); // Ambil semua input POST dari form
    @endphp

    <div class="confirmation-container">
        <p>Silakan cek kembali data pasien, klik "Konfirmasi" apabila sudah benar</p>
        <div class="confirmation-table">
            <div class="confirmation-row">
                <div class="confirmation-label">NIK :</div>
                <div class="confirmation-value">{{ $data['ssn'] ?? '-' }}</div>
            </div>
            <div class="confirmation-row">
                <div class="confirmation-label">Payer :</div>
                <div class="confirmation-value">{{ ucfirst($data['payer'] ?? '-') }}</div>
            </div>

            @if(session('bpjs_card_no'))
                <div class="confirmation-row">
                    <div class="confirmation-label">No Kartu BPJS :</div>
                    <div class="confirmation-value">{{ $data['bpjs_card_no'] ?? '-' }}</div>
                </div>
                <div class="confirmation-row">
                    <div class="confirmation-label">No Rujukkan :</div>
                    <div class="confirmation-value">{{ $data['no_rujukan'] ?? '-' }}</div>
                </div>
            @endif

            <div class="confirmation-row">
                <div class="confirmation-label">No Rekam Medis :</div>
                <div class="confirmation-value">{{ $data['medical_no'] ?? '-' }}</div>
            </div>
            <div class="confirmation-row">
                <div class="confirmation-label">Nama :</div>
                <div class="confirmation-value">{{ $data['patient_name'] ?? '-' }}</div>
            </div>
            <div class="confirmation-row">
                <div class="confirmation-label">Tanggal Lahir :</div>
                <div class="confirmation-value">{{ \Carbon\Carbon::parse($data['dob'])->format('d-m-Y') }}</div>
            </div>
            <div class="confirmation-row">
                <div class="confirmation-label">Spesialis/Subspesialis :</div>
                <div class="confirmation-value">{{ $data['namasubspesialis'] ?? '-' }}</div>
            </div>
            <div class="confirmation-row">
                <div class="confirmation-label">Dokter dan Jadwal :</div>
                <div class="confirmation-value">
                        {{ $data['namadokter'] ?? '-' }}
                        @if (!empty($data['jadwal']))
                            ({{ $data['jadwal'] }})
                        @endif
                </div>
            </div>
        </div>

        <form action="{{ route('antrean-poli.store') }}" method="POST">
        @csrf
            <input type="hidden" name="ssn" value="{{ $data['ssn'] }}">
            <input type="hidden" name="payer" value="{{ $data['payer'] }}">
            <input type="hidden" name="status_pasien" value="{{ $data['status_pasien'] }}">
            {{-- <input type="hidden" name="bpjs_card_no" value="{{ $data['bpjs_card_no'] }}"> --}}
            {{-- <input type="hidden" name="no_rujukan" value="{{ $data['no_rujukan'] }}"> --}}
            <input type="hidden" name="medical_no" value="{{ $data['medical_no'] }}">
            <input type="hidden" name="patient_name" value="{{ $data['patient_name'] }}">
            <input type="hidden" name="dob" value="{{ $data['dob'] }}">
            <input type="hidden" name="kodepoli" value="{{ $data['kodepoli'] }}">
            {{-- <input type="hidden" name="namapoli" value="{{ $data['namapoli'] }}"> --}}
            <input type="hidden" name="namasubspesialis" value="{{ $data['namasubspesialis'] }}">
            <input type="hidden" name="namadokter" value="{{ $data['namadokter'] }}">
            <input type="hidden" name="jadwal" value="{{ $data['jadwal'] }}">
            <button type="submit" class="konfirmasi-button">Konfirmasi</button>
        </form>

        {{-- <button class="konfirmasi-button" onclick="window.location.href='print'">Konfirmasi</button> --}}
        <p class="note-text">Bila terjadi perbedaan data silakan menuju “Personal Care”</p>
    </div>
@endsection
