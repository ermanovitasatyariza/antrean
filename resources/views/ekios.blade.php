@extends('layouts.app')
@section('hide-title-dashboard', true)
@section('header-center', 'E-KIOS AMBIL ANTREAN')
@section('hide-logout', true)
@section('content')
    <div class="menu-container">
        {{-- <button class="menu-button left" onclick="window.location.href='{{ url('px-personal') }}?from=ekios'">UMUM/PERSONAL</button> --}}
        <button class="menu-button left" onclick="window.location.href='{{ url('px-personal') }}?from=ekios'" >UMUM/PERSONAL</button>
        <button class="menu-button top" onclick="window.location.href='{{ url('px-bpjs') }}?from=ekios'">ASURANSI BPJS</button>
        <button class="menu-button right" onclick="window.location.href='{{ url('assesment') }}?from=ekios'">ASURANSI LAINNYA</button>
        <button class="menu-button bottom" onclick="window.location.href='{{ url('px-checkin') }}?from=ekios'">CHECK-IN</button>
    </div>
@endsection

