<?php

namespace App\Http\Controllers;

use App\Models\ProfilDesa;
use App\Models\DataDesa;
use App\Models\Berita;
use App\Models\Galeri;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil profil desa (biasanya hanya ada 1 record)
        $profilDesa = ProfilDesa::published()->first();
        
        // Ambil data desa
        $dataDesa = DataDesa::first();
        
        // Ambil 6 berita terbaru untuk grid 3 kolom
        $beritaTerbaru = Berita::orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        
        // Ambil 8 galeri terbaru untuk highlight di home (grid 4 kolom x 2 baris)
        $galeriHighlight = Galeri::latest()
            ->take(8)
            ->get();
        
        return view('home', compact(
            'profilDesa', 
            'dataDesa', 
            'beritaTerbaru', 
            'galeriHighlight'
        ));
    }
}