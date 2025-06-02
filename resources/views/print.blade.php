@extends('layouts.app')
@section('hide-title-dashboard', true)
@section('hide-logout', true)
@section('content')
    <div class="print">
        <div class="print-container">
            <p>Silakan klik <strong>“Print”</strong> untuk mencetak nomor antrian Anda</p>
        </div>
        <button class="print-button" onclick="window.location.href='terimakasih'">Print</button>
    </div>
@endsection
