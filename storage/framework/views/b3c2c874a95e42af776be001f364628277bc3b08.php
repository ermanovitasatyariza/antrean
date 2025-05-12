<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Antrean | E-Kios</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <!-- HEADER -->
    <header>
      <a href="px-personal" class="back-button">
        &#8592;
      </a>
        <h1>AMBIL ANTREAN PASIEN LAMA</h1>
    </header>
    <!-- Background Image -->
    <main>
        <div class="inputNoRMTglLhr-container">
          <!-- Kiri: Input Kode Booking -->
          <div class="inputNoRMTglLhr-left-section">
            <div class="input-group">
              <h2>No Rekam Medis :</h2>
              <p>Silakan ketik nomor rekam medis</p>
              <div class="code-input-group">
                <input type="text" maxlength="2" class="code-input" placeholder="00"/>
                <span>–</span>
                <input type="text" maxlength="2" class="code-input" placeholder="00"/>
                <span>–</span>
                <input type="text" maxlength="2" class="code-input" placeholder="00"/>
                <span>–</span>
                <input type="text" maxlength="2" class="code-input" placeholder="00"/>
              </div>
            </div>
            <div class="input-group">
              <h2>Tanggal Lahir :</h2>
              <p>Silakan ketik tanggal lahir</p>
              <div class="code-input-group">
                <input type="text" maxlength="2" class="code-input" placeholder="DD"/>
                <span>–</span>
                <input type="text" maxlength="2" class="code-input" placeholder="DD"/>
                <span>–</span>
                <input type="text" maxlength="4" class="code-input" placeholder="YYYY"/>
              </div>
            </div>
            <button class="cari-button" onclick="window.location.href='<?php echo e(url('pilih-jadwaldokter')); ?>?from=personal-lama'">CARI</button>
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
  <!-- JavaScript Keypad Logic -->
  <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\ERMANOVITASATYARIZA\OneDrive\ドキュメント\github\antrean\resources\views/personal-lama.blade.php ENDPATH**/ ?>