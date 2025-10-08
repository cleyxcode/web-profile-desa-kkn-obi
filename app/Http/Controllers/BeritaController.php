<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    /**
     * Display a listing of berita
     */
    public function index(Request $request)
    {
        $driver = DB::getDriverName(); // deteksi jenis database
        $query = Berita::query()->orderBy('tanggal', 'desc');

        // 🔍 Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('isi', 'like', "%{$search}%");
            });
        }

        // 📅 Filter by month/year (SQLite & MySQL compatible)
        if ($request->has('bulan') && $request->bulan != '') {
            if ($driver === 'sqlite') {
                $query->whereRaw("strftime('%m', tanggal) = ?", [str_pad($request->bulan, 2, '0', STR_PAD_LEFT)]);
            } else {
                $query->whereMonth('tanggal', $request->bulan);
            }
        }

        if ($request->has('tahun') && $request->tahun != '') {
            if ($driver === 'sqlite') {
                $query->whereRaw("strftime('%Y', tanggal) = ?", [$request->tahun]);
            } else {
                $query->whereYear('tanggal', $request->tahun);
            }
        }

        $berita = $query->paginate(9);

        // 📆 Get available years for filter
        if ($driver === 'sqlite') {
            $tahunList = Berita::selectRaw("distinct strftime('%Y', tanggal) as tahun")
                ->orderBy('tahun', 'desc')
                ->pluck('tahun');
        } else {
            $tahunList = Berita::selectRaw('distinct YEAR(tanggal) as tahun')
                ->orderBy('tahun', 'desc')
                ->pluck('tahun');
        }

        return view('berita.index', compact('berita', 'tahunList'));
    }

    /**
     * Display the specified berita
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);

        // 📰 Get related berita (berita terbaru lainnya)
        $beritaTerkait = Berita::where('id', '!=', $id)
            ->orderBy('tanggal', 'desc')
            ->limit(3)
            ->get();

        // ⏮ Get previous berita
        $previousBerita = Berita::where('tanggal', '<', $berita->tanggal)
            ->orderBy('tanggal', 'desc')
            ->first();

        // ⏭ Get next berita
        $nextBerita = Berita::where('tanggal', '>', $berita->tanggal)
            ->orderBy('tanggal', 'asc')
            ->first();

        return view('berita.show', compact('berita', 'beritaTerkait', 'previousBerita', 'nextBerita'));
    }
}
