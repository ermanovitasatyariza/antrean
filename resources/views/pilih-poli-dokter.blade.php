@extends('layouts.app')

@section('hide-title-dashboard', true)

@section('header-left')
    @php
        $from = request()->query('from');
        $prev = request()->query('prev');
        $status_pasien = 'lama';
        if ($from === 'px-personal-lama') {
            $backUrl = url('px-personal-lama');
            $payer = 'personal';
            $status_pasien = 'lama';
        } elseif ($from === 'input-norm-tgllahir') {
            $backUrl = url('input-norm-tgllahir');
        } else {
            $backUrl = url('/');
        }
        $nextUrl = url('konfirmasidata') . '?from=pilih-poli-dokter&prev=' . ($from ?? '');
    @endphp

    <a href="{{ $backUrl }}" class="back-button">←</a>
@endsection

@section('header-center', 'PILIH POLI & DOKTER')
@section('hide-logout', true)

@section('content')
    <div class="pilihpoli-simpan">
        <div class="pilihpoli-container">
            {{-- Kiri - Data Pasien --}}
            <div class="pilihpoli-left-section">
                @if ($pasien)
                    <div class="pilihpoli-confirmation-table">
                        <p class="pilihpoli-info-text">Silakan cek kembali data pasien, bila sudah benar silakan pilih Poli
                            dan Jadwal dokter kemudian klik “Simpan”</p>

                        @if ($from !== 'px-personal-lama')
                            <div class="pilihpoli-confirmation-row">
                                <div class="pilihpoli-confirmation-label">No Kartu BPJS :</div>
                                <div class="pilihpoli-confirmation-value">{{ $pasien->BpjsCardNo ?? '-' }}</div>
                            </div>
                            <div class="pilihpoli-confirmation-row">
                                <div class="pilihpoli-confirmation-label">No Rujukan :</div>
                                <div class="pilihpoli-confirmation-value">{{ $pasien->BpjsCardNo ?? '-' }}</div>
                            </div>
                        @endif

                        <div class="pilihpoli-confirmation-row">
                            <div class="pilihpoli-confirmation-label">No Rekam Medis :</div>
                            <div class="pilihpoli-confirmation-value">{{ $pasien->MedicalNo }}</div>
                        </div>
                        <div class="pilihpoli-confirmation-row">
                            <div class="pilihpoli-confirmation-label">Nama :</div>
                            <div class="pilihpoli-confirmation-value">{{ $pasien->PatientName }}</div>
                        </div>
                        <div class="pilihpoli-confirmation-row">
                            <div class="pilihpoli-confirmation-label">Tanggal Lahir :</div>
                            <div class="pilihpoli-confirmation-value">
                                {{ \Carbon\Carbon::parse($pasien->DateOfBirth)->format('d-m-Y') }}
                            </div>
                        </div>
                        <div class="pilihpoli-confirmation-row">
                            <div class="pilihpoli-confirmation-label">NIK :</div>
                            <div class="pilihpoli-confirmation-value">{{ $pasien->SSN }}</div>
                        </div>
                    </div>
                @else
                    <p style="color:red; font-weight:bold;">Data pasien tidak tersedia. Silakan kembali dan cari data pasien
                        terlebih dahulu.</p>
                @endif
            </div>

            <form method="POST" action="{{ url('konfirmasidata') }}">
                @csrf
                <input type="hidden" name="from" value="{{ $from }}">
                <input type="hidden" name="prev" value="{{ $prev }}">
                <input type="hidden" name="payer" value="{{ $payer }}">
                <input type="hidden" name="status_pasien" value="{{ $status_pasien }}">
                <input type="hidden" name="medical_no" value="{{ $pasien->MedicalNo }}">
                <input type="hidden" name="patient_name" value="{{ $pasien->PatientName }}">
                <input type="hidden" name="dob" value="{{ $pasien->DateOfBirth }}">
                <input type="hidden" name="ssn" value="{{ $pasien->SSN }}">
                <input type="hidden" name="bpjs_card_no" value="{{ $pasien->BpjsCardNo }}">
                {{-- hidden rujukan bisa ditambahkan jika ada datanya --}}
                {{-- Kanan - Poli dan Dokter --}}
                <div class="pilihpoli-right-section">
                    <div class="pilihpoli-input-group">
                        <h2>Poli</h2>
                        <p>Silakan pilih poli :</p>
                        <select name="kodepoli" id="select-poli" class="pilihpoli-select">
                            <option disabled selected>-- Pilih Poli --</option>
                            @foreach ($daftarPoli as $poli)
                                <option value="{{ $poli['kdpoli'] }}" data-nmpoli="{{ $poli['nmpoli'] }}">{{ $poli['nmpoli'] }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="nmpoli" id="nmpoli">
                    </div>

                    <div class="pilihpoli-input-group" id="dokter-container">
                        <h2>Dokter</h2>
                        <p>Silakan pilih Dokter dan Jadwal Dokter :</p>
                        <select name="dokter" id="select-dokter" class="pilihpoli-select" disabled>
                            <option disabled selected>-- Pilih Dokter & Jadwal --</option>
                        </select>
                    </div>
                </div>
                    {{-- <input type="hidden" name="kodedokter" id="kodedokter"> --}}
                    <input type="hidden" name="namadokter" id="namadokter">
                    <input type="hidden" name="jadwal" id="jadwal">
                    <input type="hidden" name="namasubspesialis" id="namasubspesialis">
                    <input type="hidden" name="kodepoli" id="kodepoli">
                    <input type="hidden" name="nmpoli" id="nmpoli">

                <button class="pilihpoli-cari-button" type="submit">Selanjutnya</button>
            </form>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const poliSelect = document.getElementById('select-poli');
            const dokterSelect = document.getElementById('select-dokter');
            const form = document.querySelector('form');

            poliSelect.addEventListener('change', function() {
                const kodepoli = this.value;
                const tanggal = new Date().toISOString().split('T')[0];

                dokterSelect.disabled = true;
                dokterSelect.innerHTML = '<option selected>Memuat dokter...</option>';

                fetch(
                        `http://192.168.80.119/service-bpjs/api/antrean/bpjs/ref/jadwaldokter/${kodepoli}/${tanggal}`)
                    .then(res => res.json())
                    .then(data => {
                        console.log(data)
                        dokterSelect.innerHTML = '';
                        if (data.code === 200 && Array.isArray(data.data)) {
                            dokterSelect.innerHTML =
                                '<option disabled selected>-- Pilih Dokter & Jadwal --</option>';
                            data.data.forEach(item => {
                                const option = document.createElement('option');
                                // option.value = item.kodedokter;
                                // option.textContent = `${item.namadokter} ( ${item.jadwal} ) - Poli ${item.namasubspesialis}`;
                                option.value = item.kodedokter;
                                option.textContent = `${item.namadokter} ( ${item.jadwal} ) - Poli ${item.namasubspesialis}`;
                                option.dataset.namadokter = item.namadokter;
                                option.dataset.jadwal = item.jadwal;
                                option.dataset.namasubspesialis = item.namasubspesialis;
                                dokterSelect.appendChild(option);
                            });
                            dokterSelect.disabled = false;
                        } else {
                            dokterSelect.innerHTML = '<option disabled selected>Tidak ada jadwal tersedia</option>';
                        }

                    })
                    .catch(err => {
                        console.error('Gagal fetch dokter:', err);
                        dokterSelect.innerHTML = '<option disabled selected>Gagal memuat data dokter</option>';
                    });
            });

            dokterSelect.addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                document.getElementById('namadokter').value = selectedOption.dataset.namadokter || '';
                document.getElementById('jadwal').value = selectedOption.dataset.jadwal || '';
                document.getElementById('namasubspesialis').value = selectedOption.dataset.namasubspesialis || '';
            });

            form.addEventListener('submit', function (e) {
                const selectedPoli = poliSelect.value;
                const selectedDokter = dokterSelect.value;

                if (!selectedPoli) {
                    e.preventDefault();
                    alert('Wajib memilih Poli');
                    return;
                }

                if (!selectedDokter || dokterSelect.disabled) {
                    e.preventDefault();
                    alert('Wajib memilih Dokter dan Jadwal Dokter');
                    return;
                }
            });
        });
    </script>
@endsection
