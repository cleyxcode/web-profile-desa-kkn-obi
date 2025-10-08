@extends('layouts.app')

@section('title', ($profilDesa->nama_desa ?? 'Website Desa') . ' - Beranda')

@section('content')
<!-- Hero/Banner Section -->
<div class="relative bg-blue-900 h-96 md:h-[500px] overflow-hidden">
    @if($profilDesa && $profilDesa->banner)
        <img src="{{ asset('storage/' . $profilDesa->banner) }}" alt="Banner {{ $profilDesa->nama_desa }}" class="absolute inset-0 w-full h-full object-cover opacity-40">
    @else
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-800"></div>
    @endif
    
    <div class="relative z-10 h-full flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">
                Selamat Datang di<br>{{ $profilDesa->nama_desa ?? 'Website Desa' }}
            </h1>
            @if($profilDesa && $profilDesa->tagline)
                <p class="text-xl md:text-2xl mb-6 text-blue-100">{{ $profilDesa->tagline }}</p>
            @endif
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('profil-desa') }}" class="bg-white text-blue-900 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition">
                    Tentang Kami
                </a>
                <a href="{{ route('kontak') }}" class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-900 transition">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Sambutan Kepala Desa -->
@if($profilDesa && $profilDesa->sambutan_kepala_desa)
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
            <!-- Foto Kepala Desa -->
            <div class="md:col-span-1 flex justify-center">
                @if($profilDesa->foto_kepala_desa)
                    <img src="{{ asset('storage/' . $profilDesa->foto_kepala_desa) }}" alt="{{ $profilDesa->nama_kepala_desa }}" class="w-64 h-64 rounded-lg object-cover shadow-xl">
                @else
                    <div class="w-64 h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                        <svg class="w-32 h-32 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                @endif
            </div>
            
            <!-- Sambutan -->
            <div class="md:col-span-2">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Sambutan Kepala Desa</h2>
                <div class="bg-blue-50 p-6 rounded-lg border-l-4 border-blue-600">
                    <p class="text-gray-700 leading-relaxed mb-4">{{ $profilDesa->sambutan_kepala_desa }}</p>
                    <div class="mt-6">
                        <p class="font-bold text-gray-800">{{ $profilDesa->nama_kepala_desa }}</p>
                        <p class="text-sm text-gray-600">Kepala Desa {{ $profilDesa->nama_desa }}</p>
                        @if($profilDesa->masa_jabatan_mulai && $profilDesa->masa_jabatan_selesai)
                            <p class="text-sm text-gray-500 mt-1">
                                Periode: {{ $profilDesa->masa_jabatan_mulai->format('Y') }} - {{ $profilDesa->masa_jabatan_selesai->format('Y') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Statistik Desa -->
@if($dataDesa)
<section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-12">Data Desa dalam Angka</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Jumlah Penduduk -->
            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg p-6 text-center hover:bg-opacity-20 transition">
                <div class="text-4xl font-bold mb-2">{{ number_format($dataDesa->jumlah_penduduk ?? 0) }}</div>
                <div class="text-blue-100">Jiwa Penduduk</div>
            </div>
            
            <!-- Jumlah KK -->
            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg p-6 text-center hover:bg-opacity-20 transition">
                <div class="text-4xl font-bold mb-2">{{ number_format($dataDesa->jumlah_kk ?? 0) }}</div>
                <div class="text-blue-100">Kepala Keluarga</div>
            </div>
            
            <!-- Jumlah SD -->
            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg p-6 text-center hover:bg-opacity-20 transition">
                <div class="text-4xl font-bold mb-2">{{ $dataDesa->jumlah_sd ?? 0 }}</div>
                <div class="text-blue-100">Sekolah Dasar</div>
            </div>
            
            <!-- Jumlah SMP -->
            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg p-6 text-center hover:bg-opacity-20 transition">
                <div class="text-4xl font-bold mb-2">{{ $dataDesa->jumlah_smp ?? 0 }}</div>
                <div class="text-blue-100">Sekolah Menengah Pertama</div>
            </div>
            
            <!-- Jumlah Gereja -->
            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg p-6 text-center hover:bg-opacity-20 transition">
                <div class="text-4xl font-bold mb-2">{{ $dataDesa->jumlah_gereja ?? 0 }}</div>
                <div class="text-blue-100">Gereja</div>
            </div>
            
            <!-- Jumlah Masjid -->
            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg p-6 text-center hover:bg-opacity-20 transition">
                <div class="text-4xl font-bold mb-2">{{ $dataDesa->jumlah_masjid ?? 0 }}</div>
                <div class="text-blue-100">Masjid</div>
            </div>
            
            <!-- Jumlah Puskesmas -->
            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg p-6 text-center hover:bg-opacity-20 transition">
                <div class="text-4xl font-bold mb-2">{{ $dataDesa->jumlah_puskesmas ?? 0 }}</div>
                <div class="text-blue-100">Puskesmas</div>
            </div>
            
            <!-- Jumlah Posyandu -->
            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg p-6 text-center hover:bg-opacity-20 transition">
                <div class="text-4xl font-bold mb-2">{{ $dataDesa->jumlah_posyandu ?? 0 }}</div>
                <div class="text-blue-100">Posyandu</div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Berita Terbaru -->
@if($beritaTerbaru->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Berita Terbaru</h2>
            <a href="{{ route('berita.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center">
                Lihat Semua
                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($beritaTerbaru as $berita)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                <!-- Gambar Berita -->
                @if($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                @endif
                
                <!-- Konten Berita -->
                <div class="p-6">
                    <div class="text-sm text-gray-500 mb-2">
                        {{ $berita->tanggal->format('d M Y') }}
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">
                        {{ $berita->judul }}
                    </h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        {{ Str::limit(strip_tags($berita->isi), 150) }}
                    </p>
                    <a href="{{ route('berita.show', $berita->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center">
                        Baca Selengkapnya
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Quick Links -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">Layanan Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Profil Desa -->
            <a href="{{ route('profil-desa') }}" class="group bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-8 hover:shadow-xl transition">
                <div class="bg-blue-600 w-16 h-16 rounded-lg flex items-center justify-center mb-4 group-hover:bg-blue-700 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Profil Desa</h3>
                <p class="text-gray-600">Kenali lebih dalam tentang sejarah, visi misi, dan struktur pemerintahan desa kami.</p>
            </a>
            
            <!-- Data Desa -->
            <a href="{{ route('data-desa') }}" class="group bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-8 hover:shadow-xl transition">
                <div class="bg-green-600 w-16 h-16 rounded-lg flex items-center justify-center mb-4 group-hover:bg-green-700 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Data Desa</h3>
                <p class="text-gray-600">Informasi statistik lengkap tentang demografi dan fasilitas desa.</p>
            </a>
            
            <!-- Kontak -->
            <a href="{{ route('kontak') }}" class="group bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg p-8 hover:shadow-xl transition">
                <div class="bg-purple-600 w-16 h-16 rounded-lg flex items-center justify-center mb-4 group-hover:bg-purple-700 transition">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Hubungi Kami</h3>
                <p class="text-gray-600">Ada pertanyaan? Sampaikan pesan Anda kepada kami.</p>
            </a>
        </div>
    </div>
</section>

@endsection