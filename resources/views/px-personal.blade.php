@extends('layouts.app')
@section('hide-title-dashboard', true)
@section('header-left')
    {{-- @php
        $from = request()->query('from', 'ekios'); // default ke ekios
        if ($from === 'ekios') {
            $backUrl = url('ekios');
        }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a> --}}
    <a href="{{ getBackUrlFrom() }}" class="back-button">←</a>
@endsection
@section('header-center', 'PASIEN UMUM / PERSONAL')
@section('hide-logout', true)
@section('content')
    <div class="menu-container">
        {{-- <button class="menu-button top" onclick="window.location.href='{{ url('px-personal-lama') }}?from=px-personal'">PASIEN LAMA</button> --}}
        <button class="menu-button top" onclick="window.location.href='{{ url('px-personal-lama') }}'">PASIEN LAMA</button>
        <button class="menu-button right" onclick="window.location.href='{{ url('assesment') }}?from=px-personal'">PASIEN BARU</button>
    </div>
@endsection
