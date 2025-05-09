<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

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
})->name('login'); // penting untuk redirect

Route::post('/login', function (Request $request) {
    $credentials = $request->only('username', 'password');

    // Username di-database biasanya dalam kolom "email", ubah jika perlu
    if (Auth::attempt(['name' => $credentials['username'], 'password' => $credentials['password']])) {
        $request->session()->regenerate();
        return redirect()->intended('/ekios'); // ubah sesuai dashboard tujuan
    }

    return back()->withErrors([
        'username' => 'Login gagal. Username atau password salah.',
    ]);
});

Route::get('/ekios', function () {
    return view('ekios');
})->middleware('auth');
// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/ekios', function () {
//     return view('ekios'); // ini akan render resources/views/ekios.blade.php
// })->name('ekios');

Route::get('/px-personal', function () {
    return view('px-personal'); // ini akan render resources/views/px-personal.blade.php
})->name('px-personal');

Route::get('/px-bpjs', function () {
    return view('px-bpjs'); // ini akan render resources/views/px-bpjs.php
})->name('px-bpjs');

Route::get('/px-bpjs-lama', function () {
    return view('px-bpjs-lama'); // ini akan render resources/views/px-bpjs-lama.php
})->name('px-bpjs-lama');

Route::get('/pilih-norujukan', function () {
    return view('pilih-norujukan'); // ini akan render resources/views/pilih-norujukan.php
})->name('pilih-norujukan');

Route::get('/input-norm-tgllahir', function () {
    return view('input-norm-tgllahir'); // ini akan render resources/views/pilih-norujukan.php
})->name('input-norm-tgllahir');

Route::get('/assesment', function () {
    return view('assesment'); // ini akan render resources/views/px-bpjs.php
})->name('assesment');

Route::get('/px-checkin', function () {
    return view('px-checkin'); // ini akan render resources/views/px-bpjs.php
})->name('px-checkin');

Route::get('/personal-lama', function () {
    return view('personal-lama'); // ini akan render resources/views/personal-lama.php
})->name('personal-lama');

Route::get('/pilih-jadwaldokter', function () {
    return view('pilih-jadwaldokter'); // ini akan render resources/views/pilih-jadwaldokter.php
})->name('pilih-jadwaldokter');

Route::get('/pilih-jadwaldokter', function () {
    return view('pilih-jadwaldokter'); // ini akan render resources/views/pilih-jadwaldokter.php
})->name('pilih-jadwaldokter');

Route::get('/konfirmasidata', function () {
    return view('konfirmasidata'); // ini akan render resources/views/konfirmasidata.php
})->name('konfirmasidata');

Route::get('/print', function () {
    return view('print'); // ini akan render resources/views/print.php
})->name('print');

Route::get('/terimakasih', function () {
    return view('terimakasih'); // ini akan render resources/views/terimakasih.php
})->name('terimakasih');

Route::get('/dashboard', function () {
    return view('dashboard'); // ini akan render resources/views/dashboard.php
})->name('dashboard');

Route::get('/admisi-pilihloket', function () {
    return view('admisi-pilihloket'); // ini akan render resources/views/dashboard.php
})->name('admisi-pilihloket');

Route::get('/admisi-panggilantreanadmisi', function () {
    return view('admisi-panggilantreanadmisi'); // ini akan render resources/views/dashboard.php
})->name('admisi-panggilantreanadmisi');

Route::get('/poli-pilihpolidokterantrean', function () {
    return view('poli-pilihpolidokterantrean'); // ini akan render resources/views/dashboard.php
})->name('poli-pilihpolidokterantrean');

Route::get('/poli-panggilantreanpoli', function () {
    return view('poli-panggilantreanpoli'); // ini akan render resources/views/dashboard.php
})->name('poli-panggilantreanpoli');

Route::get('/display-antrean-admisi', function () {
    return view('display-antrean-admisi'); // ini akan render resources/views/dashboard.php
})->name('display-antrean-admisi');

Route::get('/display-antrean-poli', function () {
    return view('display-antrean-poli'); // ini akan render resources/views/dashboard.php
})->name('display-antrean-admisi');

