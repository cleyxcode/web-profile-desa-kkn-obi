<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\StorageController;
use Illuminate\Support\Facades\Route;

// ==========================================
// STORAGE ROUTES - HARUS DI PALING ATAS!
// ==========================================

// Endpoint untuk debugging storage (HAPUS DI PRODUCTION!)
Route::get('/check-storage-debug', [StorageController::class, 'checkStorage']);

// Route untuk folder spesifik dengan controller
Route::get('/storage/{folder}/{filename}', [StorageController::class, 'serve'])
    ->where([
        'folder' => 'galeri|berita|profil-desa|potensi-desa',
        'filename' => '[a-zA-Z0-9._-]+\.(jpg|jpeg|png|gif|webp|svg|JPG|JPEG|PNG|GIF)'
    ])
    ->name('storage.serve');

// Route fallback untuk path lain di storage
Route::get('/storage/{path}', [StorageController::class, 'serveAny'])
    ->where('path', '.*')
    ->name('storage.any');

// ==========================================
// APPLICATION ROUTES
// ==========================================

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Profil Desa Routes
Route::get('/profil-desa', [ProfilDesaController::class, 'index'])->name('profil-desa');
Route::get('/profil-desa/{section}', [ProfilDesaController::class, 'show'])->name('profil-desa.show');

// Berita Routes
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

// Galeri Routes
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/galeri/{id}', [GaleriController::class, 'show'])->name('galeri.show');

// Data Desa Routes
Route::get('/data-desa', [DataDesaController::class, 'index'])->name('data-desa');

// Potensi Desa Routes
Route::get('/potensi-desa', [DataDesaController::class, 'potensiDesa'])->name('potensi-desa');
Route::get('/potensi-desa/{index}', [DataDesaController::class, 'showProduk'])->name('potensi-desa.show');

// Kontak Routes
Route::get('/kontak', [App\Http\Controllers\KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [App\Http\Controllers\KontakController::class, 'store'])->name('kontak.store');