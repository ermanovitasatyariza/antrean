<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AssesmentController;
use App\Http\Controllers\PanggilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index'); // ini menampilkan file resources/views/index.blade.php
})->name('login.form'); // penting untuk redirect

Route::get('/server-time', function () {
    return response()->json([
        'time' => \Carbon\Carbon::now()->format('H:i:s')
    ]);
});

Route::post('/login', function (Request $request) {
    $credentials = $request->only('username', 'password');

    if (Auth::attempt(['name' => $credentials['username'], 'password' => $credentials['password']])) {
        $request->session()->regenerate();

        // Redirect berdasarkan role
        if (Auth::user()->role === 'petugas-ambil') {
            return redirect()->intended('/ekios');
        } elseif (Auth::user()->role === 'petugas-panggil') {
            return redirect()->intended('/dashboard');
        }
    }

    return back()->withErrors([
        'username' => 'Login gagal. Username atau password salah.',
    ]);
})->name('login');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/'); // atau arahkan ke halaman login jika berbeda
})->name('logout');

// Rute yang hanya bisa diakses oleh role 'ambil'
Route::middleware(['auth', 'role:petugas-ambil'])->group(function () {

    // Halaman Ekios sebagai awal setelah login
    Route::get('/ekios', function () {
        return view('ekios'); // ini akan render resources/views/ekios.blade.php
    });

    // Halaman-halaman yang dapat diakses setelah login
    Route::get('/px-personal', function () {
        return view('px-personal');
    });

    Route::get('/px-bpjs', function () {
        return view('px-bpjs');
    });

    Route::get('/px-bpjs-lama', function () {
        return view('px-bpjs-lama');
    });

    Route::get('/pilih-norujukan', function () {
        return view('pilih-norujukan');
    });

    Route::get('/input-norm-tgllahir', function () {
        return view('input-norm-tgllahir');
    });

    // Route::get('/assesment', function () {
    //     return view('assesment');
    // });

    Route::get('/assesment', [AssesmentController::class, 'create'])->name('assesment.form');

    Route::post('/assesment', [AssesmentController::class, 'store'])->name('assesment.store');

    Route::get('/print', function () {
        if (!session('nomor_antrean')) {
            return redirect()->route('assesment.form'); // agar tidak buka print tanpa antrean
        }
        return view('print');
    });

    Route::get('/px-checkin', function () {
        return view('px-checkin');
    });

    Route::get('/px-personal-lama', function () {
        return view('px-personal-lama');
    });

    Route::get('/pilih-poli-dokter', [PatientController::class, 'showPoliPage'])->name('pilih-poli-dokter');

    Route::get('/konfirmasidata', function () {
        return view('konfirmasidata');
    });

    Route::get('/terimakasih', function () {
        return view('terimakasih');
    });

    Route::post('/cari-pasien', [PatientController::class, 'cari'])->name('cari-pasien');
});

Route::middleware(['auth', 'role:petugas-panggil'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/admisi-pilihloket', function () {
        return view('admisi-pilihloket');
    });

    Route::get('/admisi-panggil-loket1', [PanggilController::class, 'panggilAdmisi']);

    Route::get('/poli-pilihpolidokterantrean', function () {
        return view('poli-pilihpolidokterantrean');
    });

    Route::get('/poli-panggilantreanpoli', function () {
        return view('poli-panggilantreanpoli');
    });

    Route::get('/display-antrean-admisi', function () {
        return view('display-antrean-admisi');
    });

    Route::get('/display-antrean-poli', function () {
        return view('display-antrean-poli');
    });
});
