<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\HariKerjaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AdminController;

// Redirect root to login page or home depending on authentication status
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('home');
    } else {
        return redirect()->route('auth.login');
    }
});

// Menampilkan form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');

// Menampilkan form register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');

// Proses registrasi
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.post');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Kelompokkan rute yang memerlukan autentikasi di bawah middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('home');

    // Rute Pegawai
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

    // Rute Gaji
    Route::get('/gaji', [GajiController::class, 'index'])->name('gaji.index');
    Route::get('/gaji/create', [GajiController::class, 'create'])->name('gaji.create');
    Route::post('/gaji', [GajiController::class, 'store'])->name('gaji.store');
    Route::get('/gaji/{gaji}/edit', [GajiController::class, 'edit'])->name('gaji.edit');
    Route::put('/gaji/{gaji}', [GajiController::class, 'update'])->name('gaji.update');
    Route::delete('/gaji/{gaji}', [GajiController::class, 'destroy'])->name('gaji.destroy');

    // Rute Hari Kerja
    Route::get('/hari-kerja', [HariKerjaController::class, 'index'])->name('hari_kerja.index');
    Route::get('/hari-kerja/create', [HariKerjaController::class, 'create'])->name('hari_kerja.create');
    Route::post('/hari-kerja', [HariKerjaController::class, 'store'])->name('hari_kerja.store');
    Route::get('/hari-kerja/{hariKerja}/edit', [HariKerjaController::class, 'edit'])->name('hari_kerja.edit');
    Route::put('/hari-kerja/{hariKerja}', [HariKerjaController::class, 'update'])->name('hari_kerja.update');
    Route::delete('/hari-kerja/{hariKerja}', [HariKerjaController::class, 'destroy'])->name('hari_kerja.destroy');

    // Rute Absensi
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
    Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::get('/absensi/{absensi}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
    Route::put('/absensi/{absensi}', [AbsensiController::class, 'update'])->name('absensi.update');
    Route::delete('/absensi/{absensi}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');

    // Rute Laporan Slip Gaji
    Route::get('/laporan/gaji', [LaporanController::class, 'index'])->name('laporan.gaji');
    Route::get('/laporan/slip-gaji', [LaporanController::class, 'showSlipGaji'])->name('laporan.slip_gaji');
});
