@extends('layouts.app')
@section('hide-title-ekios', true)
@section('header-center','DASHBOARD ANTREAN')
@section('content')
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
@endsection
