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
          <div class="question">
            <label for="usia">Apakah usia pasien yang Anda daftarkan lebih dari 60 tahun?</label>
            <select id="usia">
              <option disabled selected>Pilih Jawaban </option>
              <option>Ya</option>
              <option>Tidak</option>
            </select>
          </div>
          <div class="question">
            <label for="bayi">Apakah pasien yang Anda daftarkan adalah bayi baru lahir?</label>
            <select id="bayi">
              <option disabled selected>Pilih Jawaban </option>
              <option>Ya</option>
              <option>Tidak</option>
            </select>
          </div>
          <div class="question">
            <label for="disabilitas">Apakah pasien yang Anda daftarkan merupakan penyandang disabilitas?</label>
            <select id="disabilitas">
              <option disabled selected>Pilih Jawaban </option>
              <option>Ya</option>
              <option>Tidak</option>
            </select>
          </div>
          <button class="submit-button-assesment" onclick="window.location.href='print'">Kirim Jawaban</button>
        </div>
@endsection
