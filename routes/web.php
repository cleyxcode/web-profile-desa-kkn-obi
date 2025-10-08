<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilDesaController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Profil Desa Routes
Route::get('/profil-desa', [ProfilDesaController::class, 'index'])->name('profil-desa');
Route::get('/profil-desa/{section}', [ProfilDesaController::class, 'show'])->name('profil-desa.show');

// Route lainnya (sementara redirect ke home)
Route::get('/berita', function() {
    return redirect()->route('home')->with('info', 'Halaman berita sedang dalam pengembangan.');
})->name('berita.index');

Route::get('/galeri', function() {
    return redirect()->route('home')->with('info', 'Halaman galeri sedang dalam pengembangan.');
})->name('galeri');

Route::get('/data-desa', function() {
    return redirect()->route('home')->with('info', 'Halaman data desa sedang dalam pengembangan.');
})->name('data-desa');

Route::get('/potensi-desa', function() {
    return redirect()->route('home')->with('info', 'Halaman potensi desa sedang dalam pengembangan.');
})->name('potensi-desa');

Route::get('/kontak', function() {
    return redirect()->route('home')->with('info', 'Halaman kontak sedang dalam pengembangan.');
})->name('kontak');