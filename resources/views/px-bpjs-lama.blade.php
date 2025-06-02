@extends('layouts.app')
@section('hide-title-dashboard', true)
@section('header-left')
    {{-- @php
        $from = request()->query('from', 'px-bpjs');
        // Set default agar tidak undefined
        $backUrl = url('px-bpjs');

        if ($from === 'px-bpjs') {
            $backUrl = url('px-bpjs');
        }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a> --}}
    <a href="{{ getBackUrlFrom() }}" class="back-button">←</a>
@endsection
@section('header-center', 'PASIEN LAMA BPJS')
@section('hide-logout', true)
@section('content')
<div class="checkin-container">
    <div class="left-section">
    <h2>Nomor Kartu BPJS</h2>
    <p>Silakan masukkan nomor kartu BPJS Anda :</p>
    <input type="text" maxlength="13" class="code-input" placeholder="Nomor Peserta">
    <button class="cari-button" onclick="window.location.href='{{ url('pilih-norujukan') }}?from=px-bpjs-lama'">Cari</button>
    </div>
    <div class="right-section">
    <div class="keypad">
        <button data-key="7">7</button>
        <button data-key="8">8</button>
        <button data-key="9">9</button>
        <button data-key="4">4</button>
        <button data-key="5">5</button>
        <button data-key="6">6</button>
        <button data-key="1">1</button>
        <button data-key="2">2</button>
        <button data-key="3">3</button>
        <button data-key="0">0</button>
        <button class="hapus">Hapus</button>
    </div>
    </div>
</div>
@endsection
