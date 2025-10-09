<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\DataDesaController;
use Illuminate\Support\Facades\Route;

// Route untuk serve storage files - solusi untuk masalah 403/404
// Route khusus untuk galeri
Route::get('/storage/galeri/{filename}', function ($filename) {
    $path = storage_path('app/public/galeri/' . $filename);
    
    if (!file_exists($path)) {
        abort(404, 'File not found: ' . $filename);
    }
    
    $mimeType = mime_content_type($path);
    $headers = [
        'Content-Type' => $mimeType,
        'Cache-Control' => 'public, max-age=86400',
        'Access-Control-Allow-Origin' => '*',
    ];
    
    return response()->file($path, $headers);
})->where('filename', '[a-zA-Z0-9._-]+\.(jpg|jpeg|png|gif|webp|svg)');

// Route khusus untuk berita (jika ada upload gambar di berita)
Route::get('/storage/berita/{filename}', function ($filename) {
    $path = storage_path('app/public/berita/' . $filename);
    
    if (!file_exists($path)) {
        abort(404, 'File not found: ' . $filename);
    }
    
    $mimeType = mime_content_type($path);
    $headers = [
        'Content-Type' => $mimeType,
        'Cache-Control' => 'public, max-age=86400',
        'Access-Control-Allow-Origin' => '*',
    ];
    
    return response()->file($path, $headers);
})->where('filename', '[a-zA-Z0-9._-]+\.(jpg|jpeg|png|gif|webp|svg)');

// Route khusus untuk profil desa (jika ada upload gambar)
Route::get('/storage/profil-desa/{filename}', function ($filename) {
    $path = storage_path('app/public/profil-desa/' . $filename);
    
    if (!file_exists($path)) {
        abort(404, 'File not found: ' . $filename);
    }
    
    $mimeType = mime_content_type($path);
    $headers = [
        'Content-Type' => $mimeType,
        'Cache-Control' => 'public, max-age=86400',
        'Access-Control-Allow-Origin' => '*',
    ];
    
    return response()->file($path, $headers);
})->where('filename', '[a-zA-Z0-9._-]+\.(jpg|jpeg|png|gif|webp|svg)');

// Route khusus untuk potensi desa (jika ada upload gambar produk)
Route::get('/storage/potensi-desa/{filename}', function ($filename) {
    $path = storage_path('app/public/potensi-desa/' . $filename);
    
    if (!file_exists($path)) {
        abort(404, 'File not found: ' . $filename);
    }
    
    $mimeType = mime_content_type($path);
    $headers = [
        'Content-Type' => $mimeType,
        'Cache-Control' => 'public, max-age=86400',
        'Access-Control-Allow-Origin' => '*',
    ];
    
    return response()->file($path, $headers);
})->where('filename', '[a-zA-Z0-9._-]+\.(jpg|jpeg|png|gif|webp|svg)');

// Route umum untuk semua storage files (fallback) - HARUS DI PALING BAWAH
Route::get('/storage/{path}', function ($path) {
    $fullPath = storage_path('app/public/' . $path);
    
    if (!file_exists($fullPath)) {
        abort(404, 'File not found: ' . $path);
    }
    
    $mimeType = mime_content_type($fullPath);
    return response()->file($fullPath, [
        'Content-Type' => $mimeType,
        'Cache-Control' => 'public, max-age=86400',
        'Access-Control-Allow-Origin' => '*',
    ]);
})->where('path', '.*');

Route::get('/storage/{folder}/{filename}', [App\Http\Controllers\StorageController::class, 'serve'])
    ->where([
        'folder' => '(galeri|berita|profil-desa|potensi-desa)',
        'filename' => '[a-zA-Z0-9._-]+\.(jpg|jpeg|png|gif|webp|svg|JPG|JPEG|PNG|GIF)'
    ])
    ->name('storage.serve');

// Route fallback untuk path lain di storage
Route::get('/storage/{path}', [App\Http\Controllers\StorageController::class, 'serveAny'])
    ->where('path', '.*')
    ->name('storage.any');

// Endpoint untuk debugging storage (HAPUS DI PRODUCTION!)
Route::get('/check-storage-debug', [App\Http\Controllers\StorageController::class, 'checkStorage']);

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