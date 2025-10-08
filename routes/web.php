<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk halaman lain (sementara gunakan placeholder atau buat nanti)
Route::get('/profil-desa', function () {
    return 'Halaman Profil Desa - Akan dibuat selanjutnya';
})->name('profil-desa');

Route::get('/berita', function () {
    return 'Halaman Berita - Akan dibuat selanjutnya';
})->name('berita.index');

Route::get('/berita/{id}', function () {
    return 'Halaman Detail Berita - Akan dibuat selanjutnya';
})->name('berita.show');

Route::get('/galeri', function () {
    return 'Halaman Galeri - Akan dibuat selanjutnya';
})->name('galeri');

Route::get('/data-desa', function () {
    return 'Halaman Data Desa - Akan dibuat selanjutnya';
})->name('data-desa');

Route::get('/potensi-desa', function () {
    return 'Halaman Potensi Desa - Akan dibuat selanjutnya';
})->name('potensi-desa');

Route::get('/kontak', function () {
    return 'Halaman Kontak - Akan dibuat selanjutnya';
})->name('kontak');