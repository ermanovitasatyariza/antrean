<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Antrean | E-Kios</title>
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- HEADER -->
    <header>
        <a href="ekios" class="back-button">
            &#8592;
        </a>
        <h1>AMBIL ANTREAN PASIEN UMUM / PERSONAL</h1>
    </header>

    <!-- Background Image -->
    <main>
        <div class="menu-container">
            <button class="menu-button top" onclick="window.location.href='personal-lama'">Pasien Lama</button>
           <button class="menu-button right" onclick="window.location.href='assesment'">Pasien Baru</button>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>

    </footer>
</body>
</html>
