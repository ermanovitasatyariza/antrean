<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Antrian | Poli Panggil</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="dashboard-header">
      <a href="pilihpolidokterantrean" class="back-button">&#8592;</a>
      <h1>PANGGIL ANTREAN POLI</h1>
      <div class="logout-button" onclick="window.location.href='index'">Log-Out</div>
  </header>
    <main>
        <div class="container-loket">
          <!-- KIRI -->
          <div class="kiri">
            <div class="kotak">Poli :</div>
            <div class="kotak">Dokter dan Jadwal :</div>
            <div class="kotak antrian-box">
              <div class="judul">Nomor Antrian Yang Sedang Dilayani</div>
              <div class="nomor">001</div>
              <div class="waktu">
                <div><strong>Waktu Ambil</strong> : HH:MM:SS</div>
                <div><strong>Waktu Panggil</strong> : HH:MM:SS</div>
                <div><strong>Lama Tunggu</strong> : HH:MM:SS</div>
              </div>
            </div>
          </div>

          <!-- KANAN -->
          <div class="kanan">
            <div class="kotak">Antrian yang telah dilayani :</div>
            <div class="kotak">Sisa Antrian :</div>
            <div class="kotak opsi">
              <label><input type="radio" name="aksi"> Normal</label>
              <label><input type="radio" name="aksi"> Prioritas</label>
              <label><input type="radio" name="aksi"> Lewati</label>
              <button class="btn-panggil">Panggil Berikutnya</button>
            </div>
          </div>
        </div>
      </main>
    <!-- FOOTER -->
    <footer>
    </footer>
</body>
</html>
