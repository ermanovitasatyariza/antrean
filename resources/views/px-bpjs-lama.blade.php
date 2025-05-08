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
      <a href="px-bpjs" class="back-button">
        &#8592;
      </a>
        <h1>AMBIL ANTREAN PASIEN LAMA BPJS</h1>
    </header>

    <!-- Background Image -->
    <main>
        <div class="checkin-container">
          <!-- Kiri: Input Kode Booking -->
          <div class="left-section">
            <h2>Nomor Kartu BPJS</h2>
            <p>Silakan masukkan nomor kartu BPJS Anda :</p>
            <input type="text" maxlength="13" class="code-input" placeholder="Nomor Peserta">
            <button class="cari-button" onclick="window.location.href='pilih-norujukan'">Cari</button>
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
      </main>
    <!-- FOOTER -->
    <footer>
    </footer>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
