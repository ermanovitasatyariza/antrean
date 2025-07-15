@extends('layouts.app')
@section('title', 'Antrean | Login')
@section('header-center','APLIKASI ANTREAN')
@section('hide-title-dashboard', true)
@section('hide-title-ekios', true)
@section('hide-logout', true)
@section('content')
    <div class="container-login">
        <form method="POST" action="{{ route('login') }}">
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
@endsection
@section('hide-sidebar', true)
