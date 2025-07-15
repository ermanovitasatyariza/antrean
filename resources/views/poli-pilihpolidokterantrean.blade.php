@extends('layouts.app')
@section('hide-title-ekios', true)
@section('title', '| Poli')
@section('header-left')
    @php
        $from = request()->query('from', 'dashboard'); // default ke ekios
        if ($from === 'dashboard') {
            $backUrl = url('dashboard');
        }
    @endphp
    <a href="{{ $backUrl }}" class="back-button">←</a>
@endsection
@section('header-center', 'PILIH POLI ANTREAN POLI')
@section('content')
    <div class="container-dashboard-antrean">
    <div class="pilihpoli-right-section-antrean">
        <div class="pilihpoli-input-group">
            <h2>Poli</h2>
            <p>Silakan pilih poli :</p>
            <select id="select-poli" class="pilihpoli-select">
                <option disabled selected>-- Pilih Poli --</option>
                @foreach ($daftarPoli as $poli)
                    <option value="{{ $poli['kdpoli'] }}" data-nmpoli="{{ $poli['nmpoli'] }}">{{ $poli['nmpoli'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="pilihpoli-input-group">
            <h2>Dokter</h2>
            <p>Silakan pilih Dokter dan Jadwal Dokter :</p>
            <select id="select-dokter" class="pilihpoli-select" disabled>
                <option disabled selected>-- Pilih Dokter & Jadwal --</option>
            </select>
        </div>
            <form method="POST" action="{{ route('set.session.poli') }}">
                @csrf
                <input type="hidden" name="nmpoli" id="nmpoli">
                <input type="hidden" name="namadokter" id="namadokter">
                <input type="hidden" name="jadwal" id="jadwal">
                <input type="hidden" name="namasubspesialis" id="namasubspesialis">
                <button type="submit" class="btn-panggil">Selanjutnya</button>
            </form>

    </div>
    </div>
@endsection
@section('hide-sidebar', true)

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const poliSelect = document.getElementById('select-poli');
        const dokterSelect = document.getElementById('select-dokter');

        poliSelect.addEventListener('change', function () {
            const kodepoli = this.value;
            const tanggal = new Date().toISOString().split('T')[0];

            dokterSelect.disabled = true;
            dokterSelect.innerHTML = '<option selected>Memuat dokter...</option>';

            fetch(`http://192.168.80.119/service-bpjs/api/antrean/bpjs/ref/jadwaldokter/${kodepoli}/${tanggal}`)
                .then(res => res.json())
                .then(data => {
                    dokterSelect.innerHTML = '';
                    if (data.code === 200 && Array.isArray(data.data)) {
                        dokterSelect.innerHTML = '<option disabled selected>-- Pilih Dokter & Jadwal --</option>';
                        data.data.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.kodedokter;
                            option.textContent = `${item.namadokter} (${item.jadwal}) - Poli ${item.namasubspesialis}`;
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
            const selected = this.options[this.selectedIndex];
            document.getElementById('namadokter').value = selected.dataset.namadokter || '';
            document.getElementById('jadwal').value = selected.dataset.jadwal || '';
            document.getElementById('namasubspesialis').value = selected.dataset.namasubspesialis || '';
        });
    });

    document.querySelector('.btn-panggil').addEventListener('click', function (e) {
        if (!poliSelect.value) {
            alert('Wajib memilih Poli');
            return;
        }
        if (!dokterSelect.value || dokterSelect.disabled) {
            alert('Wajib memilih Dokter & Jadwal');
            return;
        }
        // lanjut redirect atau submit
    });
</script>
