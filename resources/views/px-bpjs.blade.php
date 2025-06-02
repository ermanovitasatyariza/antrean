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
@section('header-center', 'PASIEN BPJS')
@section('hide-logout', true)
@section('content')
    <div class="menu-container">
        <button class="menu-button right" onclick="window.location.href='{{ url('px-bpjs-lama') }}?from=px-bpjs'">PASIEN LAMA</button>
        <button class="menu-button bottom" onclick="window.location.href='{{ url('assesment') }}?from=px-bpjs'">PASIEN BARU</button>
    </div>
@endsection
