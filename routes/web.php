<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController; // Import ini jika ada Surat Keluar

/*
|--------------------------------------------------------------------------
| 1. Route Khusus Guest (Pengguna yang Belum Login)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

/*
|--------------------------------------------------------------------------
| 2. Route Khusus Auth (Pengguna yang Sudah Login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    
    // Halaman Utama & Logout
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // --- FITUR SURAT MASUK ---
    // A. Akses Baca (Semua user yang login: Pembaca & Petugas)
    Route::resource('surat-masuk', SuratMasukController::class)
        ->only(['index', 'show'])
        ->parameters(['surat-masuk' => 'id']);

    // B. Akses Kelola/Tulis (Khusus Petugas)
    Route::resource('surat-masuk', SuratMasukController::class)
        ->except(['index', 'show'])
        ->parameters(['surat-masuk' => 'id'])
        ->middleware('can:manage-letters');

    // --- FITUR SURAT KELUAR (Jika ada dari P4) ---
    // A. Akses Baca
    Route::resource('surat-keluar', SuratKeluarController::class)
        ->only(['index', 'show'])
        ->parameters(['surat-keluar' => 'id']);

    // B. Akses Kelola/Tulis (Khusus Petugas)
    Route::resource('surat-keluar', SuratKeluarController::class)
        ->except(['index', 'show'])
        ->parameters(['surat-keluar' => 'id'])
        ->middleware('can:manage-letters');
});