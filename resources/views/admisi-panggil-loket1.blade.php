@extends('layouts.app')
@section('hide-title-ekios', true)
@section('title', '| Admisi')
@section('header-left')
    @php
        $from = request()->query('from');
        $backUrl = url('/'); // fallback default, bisa juga url('dashboard')
        if ($from === 'admisi-pilihloket') {
            $backUrl = url('admisi-pilihloket');
        } elseif ($from === 'dashboard') {
            $backUrl = url('dashboard');
        }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a>
@endsection
@section('header-center', 'PANGGIL ANTREAN ADMISI')
@section('content')

        @php
            $labelPasien = ucwords(str_replace('-', ' ', $payer));
        @endphp

        @php
            $start = \Carbon\Carbon::parse($created_at);
            $now = \Carbon\Carbon::now();
            $diff = $now->diff($start);
            $lamaTunggu = sprintf('%02d:%02d:%02d', $diff->h, $diff->i, $diff->s);
        @endphp

    <form method="POST" action="{{ url('admisi-panggil-loket1') }}">
    <input type="hidden" name="loket" value="{{ $loket }}">
    <input type="hidden" name="payer" value="{{ $payer }}">
    <input type="hidden" name="status_pasien" value="{{ $status_pasien }}">
    @if(request()->has('is_prioritas'))
        <input type="hidden" name="is_prioritas" value="1">
    @endif

    <div class="container-loketpanggil">
        <div class="box-kiri">
            <div class="latar">
                <div class="latar-content">
                    <strong>Nomor Antrian Dipanggil</strong>
                    <strong>Loket {{ $loket }} - {{ ucwords(str_replace('-', ' ', $payer)) }} <br> Pasien {{ ucwords(str_replace('-', ' ', $status_pasien)) }}</strong>
                    <div class="nomor-antrian-panggil">{{ $nomor_antrean }}</div>
                </div>
                <div class="info-waktu">
                    <div><strong>Waktu Panggil</strong><br><span id="waktu-panggil">-</span></div>
                    <div><strong>Waktu Ambil</strong><br>
                        {{ $created_at ? $created_at->format('d/m/Y H:i:s') : '-' }}
                    </div>
                    <div><strong>Lama Tunggu</strong><br>
                        @if($created_at)
                            @php
                                $diff = \Carbon\Carbon::now()->diff($created_at);
                            @endphp
                            {{ sprintf('%02d:%02d:%02d', $diff->h, $diff->i, $diff->s) }}
                        @else
                            -
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="box-kanan">
            <div><strong>Antrian yang telah dilayani :</strong></div>
            <div><strong>Sisa Antrian :</strong></div>
            {{-- <div class="options">
                <label><input type="radio" name="aksi" value="selanjutnya" required>Selanjutnya</label>
                <label><input type="radio" name="aksi" value="lewati">Lewati</label>
                <button type="submit" class="panggil-button">Panggil</button>
            </div> --}}
            <div>
                <button type="button" class="selesai-button">Selesai</button>
                <button type="button" class="panggil-button" onclick="tampilkanLewati()">Panggil</button>

            </div>
            <!-- Audio player (tersembunyi) -->
                <audio id="audioPlayer" src="" hidden></audio>

            <!-- Bagian yang disembunyikan awalnya -->
            <div id="bagian-lewati" style="display: none; margin-top: 1rem;">
                <div>Nomor Yang di Lewati</div>
                <div>
                    <select id="no-lewati" name="no-lewati">
                        <option disabled selected>Pilih Nomor</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="ulang-button" onclick="panggilUlang()">Panggil Ulang</button>
                    <!-- Audio player (tersembunyi) -->
                    <audio id="audioPlayer" src="" hidden></audio>
                    <button type="submit" class="selanjutnya-button">Selanjutnya</button>
                </div>
            </div>

        </div>
    </div>
</form>

@endsection
