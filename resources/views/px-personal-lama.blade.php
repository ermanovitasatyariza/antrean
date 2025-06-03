@extends('layouts.app')
@section('hide-title-dashboard', true)
@section('header-left')
    {{-- @php
        $from = request()->query('from', 'px-personal');
        // Set default agar tidak undefined
        $backUrl = url('px-personal');

        if ($from === 'px-personal') {
            $backUrl = url('px-personal');
        }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a> --}}
    {{-- <a href="{{ getBackUrlFrom() }}" class="back-button">←</a> --}}
    @php
    $backUrl = url('px-personal'); // Asal default
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a>
@endsection
@section('header-center', 'UMUM - PASIEN LAMA')
@section('hide-logout', true)
@section('content')
    <div class="inputNoRMTglLhr-container">
        <div class="inputNoRMTglLhr-left-section">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" id="cariForm" action="{{ route('cari-pasien', ['from' => 'px-personal-lama']) }}">
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
                    <p>Silakan ketik tanggal lahir (Hari-Bulan-Tahun)</p>
                    <div class="code-input-group">
                    <input type="text" maxlength="2" name="day" class="code-input" placeholder="DD"/>
                    <span>–</span>
                    <input type="text" maxlength="2" name="month" class="code-input" placeholder="MM"/>
                    <span>–</span>
                    <input type="text" maxlength="4" name="year" class="code-input" placeholder="YYYY"/>
                    </div>
                </div>
                {{-- <button class="cari-button" onclick="window.location.href='{{ url('pilih-poli-dokter') }}?from=px-personal-lama'">CARI</button> --}}
                <button type="submit" class="cari-button">CARI</button>
            </form>
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
{{-- <script>
    $(document).ready(function(){
  alert('');
});
</script> --}}
