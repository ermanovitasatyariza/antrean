@extends('layouts.app')
@section('hide-title-dashboard', true)
@section('header-center', 'E-KIOS AMBIL ANTREAN')
@section('hide-logout', true)
@section('content')
        <div class="jadwal-wrapper">
        <table class="jadwal-table">
            <thead>
                <tr>
                    <th colspan="7" class="green-head">{{ $data[0]['namapoli'] ?? 'NAMA POLI' }}</th>
                </tr>
                <tr class="green-head">
                    <th>SENIN</th>
                    <th>SELASA</th>
                    <th>RABU</th>
                    <th>KAMIS</th>
                    <th>JUMAT</th>
                    <th>SABTU</th>
                    <th class="red-cell">MINGGU</th>
                </tr>
            </thead>
            <tbody>
                @php
                    // Kelompokkan semua jadwal berdasarkan nama dokter
                    $dokterGrouped = collect($data)->groupBy('namadokter');

                    // Nama hari sesuai index 1–7
                    $namaHari = [
                        1 => 'SENIN', 2 => 'SELASA', 3 => 'RABU',
                        4 => 'KAMIS', 5 => 'JUMAT', 6 => 'SABTU', 7 => 'MINGGU'
                    ];
                @endphp

                @foreach ($dokterGrouped as $namadokter => $jadwals)
                    <tr>
                        @for ($hari = 1; $hari <= 7; $hari++)
                            @php
                                $jadwalHari = $jadwals->firstWhere('hari', $hari);
                            @endphp

                            @if ($jadwalHari)
                                <td>
                                    <b>{{ $jadwalHari['jadwal'] }}</b><br>
                                    {{ $namadokter }}<br>
                                    <small>{{ $jadwalHari['namasubspesialis'] }}</small>
                                </td>
                            @else
                                <td class="{{ $hari === 7 ? 'red-cell' : '' }}"></td>
                            @endif
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection



