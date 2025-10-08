<?php

namespace App\Http\Controllers;

use App\Models\DataDesa;
use Illuminate\Http\Request;

class DataDesaController extends Controller
{
    public function index()
    {
        $dataDesa = DataDesa::first();
        
        if (!$dataDesa) {
            return redirect()->route('home')->with('error', 'Data desa belum tersedia.');
        }
        
        return view('data-desa.index', compact('dataDesa'));
    }
    
    public function potensiDesa()
    {
        $dataDesa = DataDesa::first();
        
        if (!$dataDesa || !$dataDesa->produk_unggulan) {
            return redirect()->route('home')->with('info', 'Data produk unggulan belum tersedia.');
        }
        
        // Ambil hanya produk yang aktif
        $produkUnggulan = collect($dataDesa->produk_unggulan)
            ->where('is_active', true)
            ->values();
        
        return view('data-desa.potensi', compact('dataDesa', 'produkUnggulan'));
    }
    
    public function showProduk($index)
    {
        $dataDesa = DataDesa::first();
        
        if (!$dataDesa || !isset($dataDesa->produk_unggulan[$index])) {
            return redirect()->route('potensi-desa')->with('error', 'Produk tidak ditemukan.');
        }
        
        $produk = $dataDesa->produk_unggulan[$index];
        
        // Ambil produk lain (max 3)
        $produkLain = collect($dataDesa->produk_unggulan)
            ->where('is_active', true)
            ->filter(function($item, $key) use ($index) {
                return $key != $index;
            })
            ->take(3)
            ->values();
        
        return view('data-desa.produk-detail', compact('produk', 'produkLain', 'index'));
    }
}