<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeriItems = Galeri::latest()->paginate(12);
        
        return view('galeri.index', compact('galeriItems'));
    }

    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);
        
        // Ambil foto terkait (3 foto terbaru selain foto ini)
        $relatedPhotos = Galeri::where('id', '!=', $id)
            ->latest()
            ->take(3)
            ->get();
        
        return view('galeri.show', compact('galeri', 'relatedPhotos'));
    }
}