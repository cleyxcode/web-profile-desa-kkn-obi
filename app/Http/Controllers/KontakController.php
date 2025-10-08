<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KontakController extends Controller
{
    public function index()
    {
        // Ambil data profil desa untuk informasi kontak
        $profilDesa = ProfilDesa::first();
        
        return view('kontak.index', compact('profilDesa'));
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string|min:10|max:1000',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 255 karakter.',
            'pesan.required' => 'Pesan wajib diisi.',
            'pesan.min' => 'Pesan minimal 10 karakter.',
            'pesan.max' => 'Pesan maksimal 1000 karakter.',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Kontak::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'pesan' => $request->pesan,
                'sudah_dibaca' => false,
            ]);

            return redirect()
                ->back()
                ->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera merespons.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.')
                ->withInput();
        }
    }
}