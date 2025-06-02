@extends('layouts.app')
@section('hide-title-dashboard', true)
@section('header-left')
    {{-- @php
        $from = request()->query('from','input-norm-tgllahir');
        if ($from === 'px-personal-lama') {
            $backUrl = url('px-personal-lama');
        } else if ($from === 'input-norm-tgllahir') {
            $backUrl = url('input-norm-tgllahir');
        }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a> --}}
    {{-- <a href="{{ getBackUrlFrom() }}" class="back-button">←</a> --}}
    {{-- @php
    $from = request()->query('from', 'input-norm-tgllahir'); // Default fallback
    $backUrl = url($from); // Asumsikan nilai `from` adalah nama route atau URL segmen valid
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a> --}}

    @php
        // $from = request()->query('from', 'input-norm-tgllahir');
        $from = request()->query('from');
        $prev = request()->query('prev', null);
        if ($from === 'px-personal-lama') {
            $backUrl = url('px-personal-lama');
        } elseif ($from === 'input-norm-tgllahir') {
            $backUrl = url('input-norm-tgllahir');
        } else {
            $backUrl = url('/');
        }
        $nextUrl = url('konfirmasidata') . '?from=pilih-poli-dokter&prev=' . $from;
    @endphp

<a href="{{ $backUrl }}" class="back-button">←</a>
@endsection
@section('header-center', 'PILIH POLI & DOKTER')
@section('hide-logout', true)
@section('content')
    <div class="pilihpoli-simpan">
    <div class="pilihpoli-container">
        <div class="pilihpoli-left-section">
            @if ($pasien )
                <div class="pilihpoli-confirmation-table">
                    <p class="pilihpoli-info-text">Silakan cek kembali data pasien, bila sudah benar silakan pilih Poli dan Jadwal dokter kemudian klik “Simpan”</p>
                    {{-- Hanya tampil jika bukan dari px-personal-lama --}}
                    @if ($from !== 'px-personal-lama')
                        <div class="pilihpoli-confirmation-row">
                        <div class="pilihpoli-confirmation-label">No Kartu BPJS :</div>
                        <div class="pilihpoli-confirmation-value">{{ $pasien->BpjsCardNo ?? '-' }}</div>
                        </div>
                        <div class="pilihpoli-confirmation-row">
                        <div class="pilihpoli-confirmation-label">No Rujukkan :</div>
                        <div class="pilihpoli-confirmation-value">{{ $pasien->BpjsCardNo ?? '-' }}</div>
                        </div>
                    @endif
                    <div class="pilihpoli-confirmation-row">
                    <div class="pilihpoli-confirmation-label">No Rekam Medis :</div>
                    <div class="pilihpoli-confirmation-value">{{ $pasien->MedicalNo }}</div>
                    </div>
                    <div class="pilihpoli-confirmation-row">
                    <div class="pilihpoli-confirmation-label">Nama :</div>
                    <div class="pilihpoli-confirmation-value">{{ $pasien->PatientName }}</div>
                    </div>
                    <div class="pilihpoli-confirmation-row">
                    <div class="pilihpoli-confirmation-label">Tanggal Lahir :</div>
                    <div class="pilihpoli-confirmation-value">{{ \Carbon\Carbon::parse($pasien->DateOfBirth)->format('d-m-Y') }}</div>
                    </div>
                    <div class="pilihpoli-confirmation-row">
                    <div class="pilihpoli-confirmation-label">NIK :</div>
                    <div class="pilihpoli-confirmation-value">{{ $pasien->SSN }}</div>
                    </div>
                </div>
            @else
                <p style="color:red; font-weight:bold;">Data pasien tidak tersedia. Silakan kembali dan cari data pasien terlebih dahulu.</p>
            @endif
        </div>
        <div class="pilihpoli-right-section">
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
        </div>
    </div>
    <button class="pilihpoli-cari-button" onclick="window.location.href='{{ $nextUrl }}'">Selanjutnya</button>
    </div>
@endsection
{{-- <button class="pilihpoli-cari-button" onclick="window.location.href='{{ url('konfirmasidata') }}?from=pilih-poli-dokter'">Selanjutnya</button> --}}

