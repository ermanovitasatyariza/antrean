@extends('layouts.app')
@section('hide-title-dashboard', true)
@section('header-left')
    {{-- @php
    $from = request()->query('from', 'pilih-poli-dokter');
    // Set default agar tidak undefined
    $backUrl = url('pilih-poli-dokter');
    if ($from === 'px-checkin') {
        $backUrl = url('px-checkin');
    } elseif ($from === 'pilih-poli-dokter') {
        $backUrl = url('pilih-poli-dokter');
    }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a> --}}
    {{-- <a href="{{ getBackUrlFrom() }}" class="back-button">←</a> --}}

    {{-- @php
    $from = request()->query('from', 'pilih-poli-dokter');
    $prev = request()->query('prev', 'input-norm-tgllahir');
    $backUrl = url('pilih-poli-dokter') . '?from=' . $prev;
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a> --}}
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
    <div class="confirmation-container">
        <p>Silakan cek kembali data pasien, klik "Konfirmasi" apabila sudah benar</p>
        <div class="confirmation-table">
            <div class="confirmation-row">
                <div class="confirmation-label">NIK :</div>
                <div class="confirmation-value">1671XXXXXXXXXXXX</div>
            </div>
            <div class="confirmation-row">
                <div class="confirmation-label">No Kartu BPJS :</div>
                <div class="confirmation-value">000XXXXXXXXXXX</div>
            </div>
            <div class="confirmation-row">
                <div class="confirmation-label">No Rujukkan :</div>
                <div class="confirmation-value">XXXXXXXXXXXXXX</div>
            </div>
            <div class="confirmation-row">
                <div class="confirmation-label">No Rekam Medis :</div>
                <div class="confirmation-value">XX - XX – XX – XX</div>
            </div>
            <div class="confirmation-row">
                <div class="confirmation-label">Nama :</div>
                <div class="confirmation-value">Sxxx Dxxxxx Qxxxxx</div>
            </div>
            <div class="confirmation-row">
                <div class="confirmation-label">Tanggal Lahir :</div>
                <div class="confirmation-value">DD – MM – YYYY</div>
            </div>
            <div class="confirmation-row">
                <div class="confirmation-label">Poli :</div>
                <div class="confirmation-value">Klinik XXXXXX</div>
            </div>
            <div class="confirmation-row">
                <div class="confirmation-label">Dokter dan Jadwal :</div>
                <div class="confirmation-value">dr. XXX (Senin – Kamis 14.50–16.00 WIB)</div>
            </div>
        </div>
        <button class="konfirmasi-button" onclick="window.location.href='print'">Konfirmasi</button>
        <p class="note-text">Bila terjadi perbedaan data silakan menuju “Personal Care”</p>
    </div>
@endsection
