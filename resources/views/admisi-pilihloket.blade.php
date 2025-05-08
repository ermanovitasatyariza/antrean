<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Antrean | Admisi</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <!-- <div class="back-button"> -->
            <!-- &#8592; -->
            <!-- KEMBALI -->
        <!-- </div>
        <h1>APLIKASI ANTRIAN</h1> -->
        <a href="dashboard" class="back-button">&#8592;</a>
        <h1>PANGGIL ANTREAN ADMISI</h1>
        <div class="logout-button" onclick="window.location.href='index'">Log-Out</div>
    </header>
    <main>
    <div class="container-petugasadmisi">
        <p>Pilih Jenis Loket dan Jenis Antrean Pasien</p>
        <div class="container-antrian">
            <div class="box-antrian">
                <button onclick="window.location.href='admisi-panggilantreanadmisi'">
                    <div class="box-header">Loket 1</div>
                    <div class="box-footer">Pasien Baru BPJS</div>
                </button>
            </div>
            <div class="box-antrian">
                <button onclick="window.loacation.href='admisi-panggilantreanadmisi'">
                    <div class="box-header">Loket 2</div>
                    <div class="box-footer">Pasien Baru Umum</div>
                </button>
            </div>
            <div class="box-antrian">
                <button>
                    <div class="box-header">Loket 3</div>
                    <div class="box-footer">Pasien Asuransi Lainnya</div>
                </button>
            </div>
            <div class="box-antrian">
                <button>
                    <div class="box-header">Loket 4</div>
                    <div class="box-footer">Pasien Baru BPJS</div>
                </button>
            </div>
            <div class="box-antrian">
                <button>
                    <div class="box-header">Loket 5</div>
                    <div class="box-footer">Pasien Baru Umum</div>
                </button>
            </div>
            <div class="box-antrian">
                <button>
                    <div class="box-header">Loket 6</div>
                    <div class="box-footer">Pasien Asuransi Lainnya</div>
                </button>
            </div>
        </div>
    </div>
    </main>

    <!-- FOOTER -->
    <footer>

    </footer>

</body>
</html>
