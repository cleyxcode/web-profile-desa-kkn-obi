<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class StorageController extends Controller
{
    /**
     * Serve files from storage
     */
    public function serve($folder, $filename)
    {
        // Daftar folder yang diizinkan
        $allowedFolders = ['galeri', 'berita', 'profil-desa', 'potensi-desa'];
        
        // Validasi folder
        if (!in_array($folder, $allowedFolders)) {
            Log::warning("Unauthorized folder access attempt: {$folder}");
            abort(403, 'Akses folder tidak diizinkan');
        }
        
        // Sanitize filename untuk mencegah directory traversal
        $filename = basename($filename);
        
        // Path ke file
        $storagePath = storage_path("app/public/{$folder}/{$filename}");
        $publicPath = public_path("storage/{$folder}/{$filename}");
        
        // Log untuk debugging
        Log::info("Storage Controller - Folder: {$folder}, File: {$filename}");
        Log::info("Storage path: {$storagePath}");
        Log::info("Public path: {$publicPath}");
        
        // Coba storage path dulu
        $path = $storagePath;
        if (!File::exists($storagePath)) {
            Log::warning("File not found in storage path: {$storagePath}");
            
            // Fallback ke public path
            if (File::exists($publicPath)) {
                $path = $publicPath;
                Log::info("File found in public path: {$publicPath}");
            } else {
                Log::error("File not found in both paths");
                abort(404, 'File tidak ditemukan');
            }
        } else {
            Log::info("File found in storage path");
        }
        
        // Get mime type
        try {
            $mimeType = File::mimeType($path);
        } catch (\Exception $e) {
            Log::error("Error getting mime type: " . $e->getMessage());
            $mimeType = 'application/octet-stream';
        }
        
        // Return file response dengan headers
        return Response::file($path, [
            'Content-Type' => $mimeType,
            'Cache-Control' => 'public, max-age=604800', // Cache 7 hari
            'Pragma' => 'public',
            'Expires' => gmdate('D, d M Y H:i:s', time() + 604800) . ' GMT',
        ]);
    }
    
    /**
     * Serve generic storage files (fallback)
     */
    public function serveAny($path)
    {
        // Sanitize path
        $path = str_replace(['../', '..\\'], '', $path);
        
        $storagePath = storage_path("app/public/{$path}");
        $publicPath = public_path("storage/{$path}");
        
        Log::info("Generic serve - Path: {$path}");
        
        // Check storage path first
        if (File::exists($storagePath)) {
            $filePath = $storagePath;
        } elseif (File::exists($publicPath)) {
            $filePath = $publicPath;
        } else {
            Log::error("File not found: {$path}");
            abort(404);
        }
        
        try {
            $mimeType = File::mimeType($filePath);
        } catch (\Exception $e) {
            $mimeType = 'application/octet-stream';
        }
        
        return Response::file($filePath, [
            'Content-Type' => $mimeType,
            'Cache-Control' => 'public, max-age=604800',
        ]);
    }
    
    /**
     * Check if storage is properly linked (debugging endpoint)
     * Hapus atau comment method ini di production
     */
    public function checkStorage()
    {
        if (config('app.env') !== 'local') {
            abort(403, 'This endpoint is only available in local environment');
        }
        
        $checks = [
            'storage_path_exists' => File::exists(storage_path('app/public')),
            'public_storage_exists' => File::exists(public_path('storage')),
            'is_link' => is_link(public_path('storage')),
            'storage_path' => storage_path('app/public'),
            'public_path' => public_path('storage'),
            'link_target' => is_link(public_path('storage')) ? readlink(public_path('storage')) : 'not a link',
        ];
        
        // Check folders
        $folders = ['galeri', 'berita', 'profil-desa', 'potensi-desa'];
        foreach ($folders as $folder) {
            $checks["folder_{$folder}_storage"] = File::exists(storage_path("app/public/{$folder}"));
            $checks["folder_{$folder}_public"] = File::exists(public_path("storage/{$folder}"));
            
            // List files in folder
            $storageFolderPath = storage_path("app/public/{$folder}");
            if (File::exists($storageFolderPath)) {
                $checks["files_in_{$folder}"] = File::files($storageFolderPath);
            }
        }
        
        return response()->json($checks, 200, [], JSON_PRETTY_PRINT);
    }
}