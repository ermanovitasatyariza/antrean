<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Antrean | Dashboard</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <header>
      <h1>DASHBOARD ANTREAN</h1>
      <div class="logout-button" onclick="window.location.href='index'">Log-Out</div>
    </header>
    <main>
      <div class="container-dashboard">
          <div class="dashboard-box">
            <!-- Tombol Petugas Panggil -->
            <div id="buttonPG">
              <button class="open-btnpage" onclick="showFormPG()">
                <h2>PETUGAS PANGGIL</h2>
              </button>
            </div>
            <!-- Form Petugas Panggil (hidden awalnya) -->
            <div class="petugasForm" id="petugasForm">
              <h3>PETUGAS PANGGIL</h3>
              <select class="dashboard-select" id="menuSelectPetugasPanggil">
                <option value="" disabled selected>-- PILIH MENU --</option>
                <option value="farmasi">Farmasi</option>
                <option value="poli">Poli</option>
                <option value="admisi">Admisi</option>
              </select>
              <button class="open-btnpg" onclick="openPagePG()">Open</button>
            </div>
          </div>

          <div class="dashboard-box">
            <!-- Tombol Petugas Panggil -->
            <div id="buttonDisplay">
              <button class="open-btnpage" onclick="showFormDisplay()">
                <h2>DISPLAY</h2>
              </button>
            </div>
            <!-- Form Petugas Panggil (hidden awalnya) -->
            <div class="petugasForm" id="DisplayForm">
              <h3>DISPLAY</h3>
              <select class="dashboard-select" id="menuSelectDisplay">
                <option value="" disabled selected>-- PILIH MENU --</option>
                <option value="farmasi">Farmasi</option>
                <option value="poli">Poli</option>
                <option value="admisi">Admisi</option>
              </select>
              <button class="open-btnpg" onclick="openPageDisplay()">Open</button>
            </div>
          </div>
      </div>
    </main>
    <!-- FOOTER -->
    <footer>
    </footer>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\ERMANOVITASATYARIZA\OneDrive\ドキュメント\github\antrean\resources\views/dashboard.blade.php ENDPATH**/ ?>