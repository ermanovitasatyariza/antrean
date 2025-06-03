<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>

        @hasSection('hide-title-dashboard')
        {{-- Jangan tampilkan Antrean - Dashboard --}}
            @else
                Antrean - Dashboard
            @endif
        @yield('title')
        @hasSection('hide-title-ekios')
        {{-- Jangan tampilkan Antrean - Ekios --}}
            @else
                Antrean - Ekios
            @endif
    </title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
<header class="dashboard-header">
    <div class="header-left">
        @yield('header-left')
    </div>
    <div class="header-center">
        <h1>@yield('header-center')</h1>
    </div>
    <div class="header-right">
        @php
            use Carbon\Carbon;
            $tanggal = Carbon::now()->format('l, d F Y');
        @endphp
        <h5>@yield('waktu', $tanggal)</h5>
        <span id="jam"></span>
        @hasSection('hide-logout')
        {{-- Jangan tampilkan logout --}}
            @else
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-button">Log-Out</button>
                </form>
            @endif
    </div>
</header>
    {{-- Konten Halaman --}}
    <main>
        @yield('content')
    </main>
    {{-- Footer --}}
    <footer>
    {{-- <p>&copy; 2025 RSUD Siti Fatimah</p> --}}
    </footer>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
