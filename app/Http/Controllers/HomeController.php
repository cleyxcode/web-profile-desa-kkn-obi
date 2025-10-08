<?php

namespace App\Http\Controllers;

use App\Models\ProfilDesa;
use App\Models\DataDesa;
use App\Models\Berita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil profil desa (biasanya hanya ada 1 record)
        $profilDesa = ProfilDesa::published()->first();
        
        // Ambil data desa
        $dataDesa = DataDesa::first();
        
        // Ambil 5 berita terbaru
        $beritaTerbaru = Berita::orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        return view('home', compact('profilDesa', 'dataDesa', 'beritaTerbaru'));
    }
}