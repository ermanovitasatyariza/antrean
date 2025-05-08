<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Antrian | E-Kios</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- HEADER -->
    <header>
        @php
            $from = request()->query('from', 'default');
            if ($from === 'input-norm-tgllahir') {
                $backUrl = url('input-norm-tgllahir');
            } elseif ($from === 'personal-lama') {
                $backUrl = url('personal-lama');
            } else {
                $backUrl = url('ekios');
            }
        @endphp
      <a href="{{ $backUrl }}" class="back-button">
        &#8592;
      </a>
      {{-- <button class="back-button" onclick="goBack()">&#8592;</button> --}}
        <h1>AMBIL ANTREAN PASIEN LAMA</h1>
    </header>
    <!-- Background Image -->
    <main>
      <div class="pilihpoli-simpan">
        <div class="pilihpoli-container">

          <!-- Kiri -->
          <div class="pilihpoli-left-section">

            <div class="pilihpoli-confirmation-table">
              <p class="pilihpoli-info-text">
                Silakan cek kembali data pasien, bila sudah benar silakan pilih Poli dan Jadwal dokter kemudian klik “Simpan”
              </p>
              <div class="pilihpoli-confirmation-row">
                <div class="pilihpoli-confirmation-label">No Kartu BPJS :</div>
                <div class="pilihpoli-confirmation-value">000XXXXXXXXXXX</div>
              </div>
              <div class="pilihpoli-confirmation-row">
                <div class="pilihpoli-confirmation-label">No Rujukkan :</div>
                <div class="pilihpoli-confirmation-value">XXXXXXXXXXXXXXXXXX</div>
              </div>
              <div class="pilihpoli-confirmation-row">
                <div class="pilihpoli-confirmation-label">No Rekam Medis :</div>
                <div class="pilihpoli-confirmation-value">XX – XX – XX – XX</div>
              </div>
              <div class="pilihpoli-confirmation-row">
                <div class="pilihpoli-confirmation-label">Nama :</div>
                <div class="pilihpoli-confirmation-value">Sxxx Dxxxxx Qxxxxx</div>
              </div>
              <div class="pilihpoli-confirmation-row">
                <div class="pilihpoli-confirmation-label">Tanggal Lahir :</div>
                <div class="pilihpoli-confirmation-value">DD – MM – YYYY</div>
              </div>
              <div class="pilihpoli-confirmation-row">
                <div class="pilihpoli-confirmation-label">NIK :</div>
                <div class="pilihpoli-confirmation-value">1671XXXXXXXXXXXXX</div>
              </div>
            </div>

          </div>

          <!-- Kanan -->
          <div class="pilihpoli-right-section">

            <div class="pilihpoli-input-group">
              <h2>Poli</h2>
              <p>Silakan pilih poli :</p>
              <select class="pilihpoli-select">
                <option disabled selected>-- Pilih Poli --</option>
                <option value="umum">Poli Umum</option>
                <option value="gigi">Poli Gigi</option>
                <option value="anak">Poli Anak</option>
                <option value="penyakit-dalam">Poli Penyakit Dalam</option>
              </select>
            </div>

            <div class="pilihpoli-input-group">
              <h2>Dokter</h2>
              <p>Silakan pilih Dokter dan Jadwal Dokter :</p>
              <select class="pilihpoli-select">
                <option disabled selected>-- Pilih Dokter & Jadwal --</option>
                <option value="dr-andi">dr. Andi - Senin 08:00</option>
                <option value="dr-budi">dr. Budi - Selasa 10:00</option>
                <option value="dr-citra">dr. Citra - Rabu 13:00</option>
              </select>
            </div>
          </div>
        </div>
        <button class="pilihpoli-cari-button" onclick="window.location.href='{{ url('konfirmasidata') }}?from=pilih-jadwaldokter'">Simpan</button>
      </div>

    </main>


    <!-- FOOTER -->
    <footer>
    </footer>
</body>
</html>
