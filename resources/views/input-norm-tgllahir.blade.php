@extends('layouts.app')
@section('hide-title-dashboard', true)
@section('header-left')
    {{-- @php
        $from = request()->query('from', 'pilih-norujukan');
        // Set default agar tidak undefined
        $backUrl = url('pilih-norujukan');

        if ($from === 'pilih-norujukan') {
            $backUrl = url('pilih-norujukan');
        }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a> --}}
    {{-- <a href="{{ getBackUrlFrom() }}" class="back-button">←</a> --}}
    @php
    $backUrl = url('pilih-norujukan');
    @endphp

    <a href="{{ $backUrl }}" class="back-button">←</a>
@endsection
@section('header-center', 'PASIEN LAMA BPJS')
@section('hide-logout', true)
@section('content')
        <div class="inputNoRMTglLhr-container">
          <!-- Kiri: Input Kode Booking -->
          <div class="inputNoRMTglLhr-left-section">
            <div class="inputNoRMTglLhr-confirmation-table">
              <div class="inputNoRMTglLhr-confirmation-row">
                  <div class="inputNoRMTglLhr-confirmation-label">No Kartu BPJS :</div>
                  <div class="inputNoRMTglLhr-confirmation-value">000XXXXXXXXXXX</div>
              </div>
              <div class="inputNoRMTglLhr-confirmation-row">
                  <div class="inputNoRMTglLhr-confirmation-label">No Rujukkan :</div>
                  <div class="inputNoRMTglLhr-confirmation-value">XXXXXXXXXXXXXXXXXX</div>
              </div>
            </div>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('cari-pasien') }}">
              @csrf
                <div class="input-group">
                <h2>No Rekam Medis :</h2>
                <p>Silakan ketik nomor rekam medis</p>
                <div class="code-input-group">
                    <input type="text" maxlength="2" name="rm1" class="code-input" placeholder="00"/>
                    <span>–</span>
                    <input type="text" maxlength="2" name="rm2" class="code-input" placeholder="00"/>
                    <span>–</span>
                    <input type="text" maxlength="2" name="rm3" class="code-input" placeholder="00"/>
                    <span>–</span>
                    <input type="text" maxlength="2" name="rm4" class="code-input" placeholder="00"/>
                </div>
                </div>
                <div class="input-group">
                <h2>Tanggal Lahir :</h2>
                <p>Silakan ketik tanggal lahir</p>
                <div class="code-input-group">
                    <input type="text" maxlength="2" name="day" class="code-input" placeholder="DD"/>
                    <span>–</span>
                    <input type="text" maxlength="2" name="month" class="code-input" placeholder="DD"/>
                    <span>–</span>
                    <input type="text" maxlength="4" name="year" class="code-input" placeholder="YYYY"/>
                </div>
                </div>
                <button type="submit" class="inputNoRMTglLhr-cari-button">CARI</button>
            </form>
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
{{-- <button class="inputNoRMTglLhr-cari-button" onclick="window.location.href='{{ url('pilih-poli-dokter') }}?from=input-norm-tgllahir'">CARI</button> --}}
