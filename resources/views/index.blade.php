<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Antrian | Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <div class="back-button">
            &#8592; <!-- Panah Kiri -->
        </div>
        <h1>APLIKASI ANTRIAN</h1>
    </header>
<main>
    <div class="container-login">
        <form method="POST" action="{{ url('/login') }}">
            @csrf
                <div class="field">
                    <!-- <div class="input-container"> -->
                        <input type="text" name="username" id="username" placeholder=" " required>
                        <label for="username">Username</label>
                    <!-- </div> -->
                </div>
                <div class="field">
                    <!-- <div class="input-container"> -->
                        <input type="password" name="password" id="password" placeholder=" " required>
                        <label for="password">Password</label>
                    <!-- </div> -->
                </div>
                <!-- Remember Me -->
                <div class="remember-container">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <!-- Tombol Login -->
                <button type="submit" class="login-button">Login</button>
        </form>
    </div>
    <!-- JavaScript untuk ikon mata -->
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</main>
<!-- FOOTER -->
<footer>
</footer>
</body>
</html>
