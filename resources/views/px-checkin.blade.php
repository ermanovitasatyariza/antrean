@extends('layouts.app')
@section('hide-title-dashboard', true)
@section('header-left')
    <a href="{{ getBackUrlFrom() }}" class="back-button">←</a>
@endsection
@section('header-center', 'CHECK-IN ANTREAN')
@section('hide-logout', true)
@section('content')
    <div class="checkin-container">
        <!-- Kiri: Input Kode Booking -->
        <div class="left-section">
        <h2>Kode Booking</h2>
        <p>Silakan masukkan nomor kode booking Anda :</p>
        <!-- <div class="input-group"> -->
        <input type="text" maxlength="11" class="code-input" placeholder="-" id="kodeBooking">
        <!-- </div> -->
        <button class="cari-button" onclick="window.location.href='{{ url('konfirmasidata') }}?from=px-checkin'">Cari</button>
        </div>
        <!-- Kanan: Keypad -->
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
