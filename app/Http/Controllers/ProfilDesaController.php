<?php

namespace App\Http\Controllers;

use App\Models\ProfilDesa;
use Illuminate\Http\Request;

class ProfilDesaController extends Controller
{
    /**
     * Display profil desa page
     */
    public function index()
    {
        // Ambil profil desa yang dipublikasikan (biasanya hanya ada 1)
        $profilDesa = ProfilDesa::where('is_published', true)
            ->first();

        // Jika tidak ada profil yang dipublikasikan, ambil yang pertama
        if (!$profilDesa) {
            $profilDesa = ProfilDesa::first();
        }

        // Jika masih tidak ada data, redirect ke home dengan pesan
        if (!$profilDesa) {
            return redirect()->route('home')
                ->with('info', 'Profil desa belum tersedia.');
        }

        return view('profil-desa.index', compact('profilDesa'));
    }

    /**
     * Display specific profil desa (untuk preview dari admin)
     */
    public function show(ProfilDesa $profilDesa)
    {
        return view('profil-desa.show', compact('profilDesa'));
    }
}