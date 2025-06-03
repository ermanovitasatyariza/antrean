@extends('layouts.app')
@section('header-left')
    @php
        $from = request()->query('from', 'ekios'); // default ke ekios
        if ($from === 'px-personal') {
            $backUrl = url('px-personal');
        } else if ($from === 'px-bpjs') {
            $backUrl = url('px-bpjs');
        } else if ($from === 'ekios') {
            $backUrl = url('ekios');
        }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a>
@endsection
@section('header-center', 'PENGISIAN ASSESMENT PASIEN')
@section('hide-logout', true)
@section('content')
    <div class="card">
    <p class="intro-text">Silakan isi tiga pertanyaan di bawah ini :</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form method="POST" action="{{ route('assesment.store') }}">
        @csrf
        <input type="hidden" name="from" value="{{ $from }}">

            <div class="question">
                <label for="usia">Apakah usia pasien yang Anda daftarkan lebih dari 60 tahun?</label>
                <select id="usia" name="usia_lebih_60" required>
                <option disabled selected>Pilih Jawaban </option>
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
                </select>
            </div>
            <div class="question">
                <label for="bayi">Apakah pasien yang Anda daftarkan adalah bayi baru lahir?</label>
                <select id="bayi" name="bayi_baru_lahir" required>
                <option disabled selected>Pilih Jawaban </option>
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
                </select>
            </div>
            <div class="question">
                <label for="disabilitas">Apakah pasien yang Anda daftarkan merupakan penyandang disabilitas?</label>
                <select id="disabilitas" name="penyandang_disabilitas" required>
                <option disabled selected>Pilih Jawaban </option>
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
                </select>
            </div>
            <button type="submit" class="submit-button-assesment">Kirim Jawaban</button>
            </div>
    </form>
@endsection
