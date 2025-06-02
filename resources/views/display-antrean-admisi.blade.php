@extends('layouts.app')
@section('hide-title-ekios', true)
@section('title', '| Display')
@section('header-left')
    @php
        $from = request()->query('from', 'dashboard'); // default ke ekios
        if ($from === 'dashboard') {
            $backUrl = url('dashboard');
        }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a>
@endsection
@section('header-center', 'ANTREAN ADMISI DILAYANI')
@section('content')
        <div class="display">
            <!-- <h1 class="display-judul"></h1> -->
            <div class="display-wrapper">
                <!-- ANTRIAN DIPANGGIL -->
                <div class="box-panggil">
                  <h2 class="panggil-title">ANTREAN DIPANGGIL</h2>
                  <div class="panggil-subtitle">Antrean Admisi</div>
                  <div class="panggil-nomor">001</div>
                  <div class="panggil-loket">Loket 1</div>
                </div>

                <!-- ANTRIAN DILAYANI -->
                <div class="container-display">
                  <!-- <h2 class="display-judul">ANTREAN DILAYANI</h2> -->
                  <div class="grid-loket">
                    <div class="display-box-antrian">
                      <div class="display-box-header">LOKET 1</div>
                      <div class="display-box-footer">001</div>
                    </div>
                    <div class="display-box-antrian">
                      <div class="display-box-header">LOKET 2</div>
                      <div class="display-box-footer">001</div>
                    </div>
                    <div class="display-box-antrian">
                      <div class="display-box-header">LOKET 3</div>
                      <div class="display-box-footer">001</div>
                    </div>
                    <div class="display-box-antrian">
                      <div class="display-box-header">LOKET 4</div>
                      <div class="display-box-footer">001</div>
                    </div>
                    <div class="display-box-antrian">
                      <div class="display-box-header">LOKET 5</div>
                      <div class="display-box-footer">001</div>
                    </div>
                    <div class="display-box-antrian">
                      <div class="display-box-header">LOKET 6</div>
                      <div class="display-box-footer">001</div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
@endsection
