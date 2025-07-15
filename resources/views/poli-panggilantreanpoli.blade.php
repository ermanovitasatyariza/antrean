@extends('layouts.app')
@section('hide-title-ekios', true)
@section('title', '| Poli')
@section('header-left')
    @php
        $from = request()->query('from', 'poli-pilihpolidokterantrean'); // default ke ekios
        if ($from === 'poli-pilihpolidokterantrean') {
            $backUrl = url('poli-pilihpolidokterantrean');
        }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a>
@endsection
@section('header-center', 'PANGGIL ANTREAN POLI')
@section('content')
    <div class="container-loket">
        <div class="kiri">
            <div class="kotak">Poli : {{ session('namasubspesialis', '-') }}</div>
            <div class="kotak">Dokter : {{ session('namadokter', '-') }}</div>
            <div class="kotak">Jadwal : {{ session('jadwal', '-') }}</div>


            @if($antrean)
            <div class="kotak antrian-box">
                <div class="judul">Nomor Antrian Yang Sedang Dilayani</div>
                <div class="nomor">{{ str_pad($antrean->nomor_antrean, 3, '0', STR_PAD_LEFT) }}</div>
                <div class="waktu"
                    data-waktu-ambil="{{ \Carbon\Carbon::parse($antrean->created_at)->format('Y-m-d H:i:s') }}">
                    {{-- <div><strong>Waktu Ambil</strong> : {{ \Carbon\Carbon::parse($antrean->created_at)->format('H:i:s') }}</div> --}}
                    <div><strong>Waktu Ambil</strong> : <span id="waktu-ambil">{{ \Carbon\Carbon::parse($antrean->created_at)->format('H:i:s') }}</span></div>
                    <div><strong>Waktu Panggil</strong> : <span id="waktu-panggil">-</span></div>
                    <div><strong>Lama Tunggu</strong> : <span id="lama-tunggu">-</span></div>
                </div>
            </div>
            @else
                <p>Tidak ada antrean yang sedang dilayani untuk dokter {{ $dokter }}</p>
            @endif
        </div>
        <div class="kanan">
        <div class="kotak">Antrian yang telah dilayani :</div>
        <div class="kotak">Sisa Antrian :</div>
        <div class="kotak opsi" id="btnPanggilarea">
            <button class="btn-panggil" id="btnPanggil">Panggil</button>
            <button class="btn-panggil-selesai hidden" id="btnPanggil-Selesai">Selesai</button>
            <button class="btn-panggil-lewati hidden" id="btnPanggil-Lewati">Lewati</button>
            <button class="btn-panggil hidden" id="btnPanggil-Selanjutnya">Selanjutnya</button>

        </div>

        <div class="kotak opsi" id="btnPanggilDilewati">
            <button class="btn-panggil" id="no-lewati">Panggil antrean yang dilewati</button>
            <div id="nopoli-lewati">
                Nomor antrean yang telah dilewati
                <select>
                    <option disabled selected>Pilih Nomor</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                <button type="button" class="btn-panggil-selesai hidden" id="btnPanggilDilewati-Selesai">Selesai</button>
            </div>
        </div>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btn = document.getElementById('btnPanggil');
        const waktuPanggil = document.getElementById('waktu-panggil');
        const lamaTunggu = document.getElementById('lama-tunggu');
        const waktuAmbilRaw = document.querySelector('.waktu').dataset.waktuAmbil;

        btn.addEventListener('click', function () {
            const now = new Date();

            // Format waktu panggil
            const jam = String(now.getHours()).padStart(2, '0');
            const menit = String(now.getMinutes()).padStart(2, '0');
            const detik = String(now.getSeconds()).padStart(2, '0');
            const waktuSekarang = `${jam}:${menit}:${detik}`;
            waktuPanggil.textContent = waktuSekarang;

            // Hitung lama tunggu
            const waktuAmbil = new Date(waktuAmbilRaw);
            const selisihMs = now - waktuAmbil;

            const lamaJam = Math.floor(selisihMs / (1000 * 60 * 60));
            const lamaMenit = Math.floor((selisihMs % (1000 * 60 * 60)) / (1000 * 60));
            const lamaDetik = Math.floor((selisihMs % (1000 * 60)) / 1000);

            const lamaFormatted = `${String(lamaJam).padStart(2, '0')}:${String(lamaMenit).padStart(2, '0')}:${String(lamaDetik).padStart(2, '0')}`;
            lamaTunggu.textContent = lamaFormatted;
        });
    });

    document.getElementById('btnPanggil').addEventListener('click', function () {
        document.getElementById('btnPanggil-Selesai').classList.remove('hidden');
        document.getElementById('btnPanggil-Lewati').classList.remove('hidden');
        document.getElementById('btnPanggilDilewati').classList.add('hidden');

    });

    document.getElementById('btnPanggil-Selesai').addEventListener('click', function() {
        document.getElementById('btnPanggil-Selanjutnya').classList.remove('hidden');
        document.getElementById('btnPanggil-Lewati').classList.add('hidden');
        document.getElementById('btnPanggil-Selesai').classList.add('hidden');
        document.getElementById('btnPanggil').classList.add('hidden');
        
    });

    document.getElementById('btnPanggil-Selanjutnya').addEventListener('click',function(){
        document.getElementById('btnPanggil').classList.remove('hidden');
        document.getElementById('btnPanggilDilewati').classList.remove('hidden');
        document.getElementById('btnPanggil-Selanjutnya').classList.add('hidden');
        document.getElementById('btnPanggilDilewati-Selesai').classList.add('hidden');

    });

    document.getElementById('btnPanggil-Lewati').addEventListener('click',function(){
        document.getElementById('btnPanggil').classList.add('hidden');
        document.getElementById('btnPanggil-Selesai').classList.add('hidden');
        document.getElementById('btnPanggil-Lewati').classList.add('hidden');
        document.getElementById('btnPanggil-Selanjutnya').classList.remove('hidden');
    });

    // document.getElementById('nopoli-lewati').addEventListener('click',function(){
    //     document.getElementById('btnPanggilDilewati-Selesai').classList.remove('hidden');
    //     document.getElementById('btnPanggilDilewati-Lewati').classList.remove('hidden');
    //     document.getElementById('btnPanggil').classList.add('hidden');
    // });

    document.getElementById('no-lewati').addEventListener('click',function(){
        document.getElementById('btnPanggilarea').classList.add('hidden');
        document.getElementById('btnPanggilDilewati-Selesai').classList.remove('hidden');
    });

    document.getElementById('btnPanggilDilewati-Selesai').addEventListener('click',function(){
        document.getElementById('btnPanggilDilewati-Selesai').classList.add('hidden');
        document.getElementById('btnPanggilarea').classList.remove('hidden');
    })

</script>
@endsection

@section('hide-sidebar', true)


