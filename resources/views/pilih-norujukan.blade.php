@extends('layouts.app')
@section('hide-title-dashboard', true)
@section('header-left')
    @php
        $from = request()->query('from', 'px-bpjs-lama');
        // Set default agar tidak undefined
        $backUrl = url('px-bpjs-lama');

        if ($from === 'px-bpjs-lama') {
            $backUrl = url('px-bpjs-lama');
        }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a>
    <a href="{{ getBackUrlFrom() }}" class="back-button">←</a>
@endsection
@section('header-center', 'PASIEN LAMA BPJS')
@section('hide-logout', true)
@section('content')
    <div class="rujukan-container">
        <h2>Nomor Rujukan</h2>
        <p>Silakan Pilih Nomor Rujukan Faskes</p>
        <div class="dropdown">
            <button class="dropdown-btn">
            <span class="arrow">&#9662;</span>
            </button>
        </div>
        <button class="cari-button" onclick="window.location.href='{{ url('input-norm-tgllahir') }}?from=pilih-norujukan'">Selanjutnya</button>
    </div>
@endsection
