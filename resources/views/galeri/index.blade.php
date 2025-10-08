@extends('layouts.app')

@section('title', 'Galeri Desa')

@section('content')
<!-- Hero Section - Modern Design -->
<div class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full filter blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-400 rounded-full filter blur-3xl transform translate-x-1/2 translate-y-1/2"></div>
    </div>
    
    <div class="relative z-10 py-16 md:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center text-white">
                <div class="inline-block mb-4 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold">
                    📸 Dokumentasi Desa
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-6 leading-tight">
                    Galeri <span class="text-blue-200">Kegiatan Desa</span>
                </h1>
              
            </div>
        </div>
    </div>
    
    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
            <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
        </svg>
    </div>
</div>

<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-100 -mt-1">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 flex-wrap">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-blue-600 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Beranda
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-semibold text-blue-600 md:ml-2">Galeri</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Gallery Grid Section -->
<div class="py-12 md:py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        @if($galeriItems->count() > 0)
            <!-- Stats Info -->
            <div class="mb-10 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <p class="text-gray-600 text-sm md:text-base">
                        Menampilkan <span class="font-semibold text-blue-600">{{ $galeriItems->count() }}</span> dari 
                        <span class="font-semibold text-blue-600">{{ $galeriItems->total() }}</span> foto
                    </p>
                </div>
                
                <!-- Sort/Filter dapat ditambahkan di sini -->
            </div>

            <!-- Gallery Grid with Masonry Effect -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
                @foreach($galeriItems as $item)
                    <article class="group relative bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <!-- Image Container -->
                        <div class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                            <img 
                                src="{{ asset('storage/' . $item->gambar) }}" 
                                alt="{{ $item->judul }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                loading="lazy"
                            >
                            
                            <!-- Overlay on Hover -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <a href="{{ route('galeri.show', $item->id) }}" class="transform scale-75 group-hover:scale-100 transition-transform duration-300">
                                        <div class="bg-white/20 backdrop-blur-md p-4 rounded-full border-2 border-white/50 hover:bg-white/30 transition-all">
                                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                                
                                <div class="absolute bottom-0 left-0 right-0 p-4 md:p-6 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    <a href="{{ route('galeri.show', $item->id) }}" class="inline-flex items-center text-white font-semibold hover:text-blue-200 transition-colors text-sm md:text-base">
                                        <span>Lihat Detail</span>
                                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Image Badge -->
                            <div class="absolute top-3 right-3 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                                📷 Foto
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-4 md:p-5">
                            <h3 class="font-bold text-gray-900 text-base md:text-lg mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors leading-tight">
                                {{ $item->judul }}
                            </h3>
                            
                            @if($item->deskripsi)
                                <p class="text-gray-600 text-sm mb-3 line-clamp-2 leading-relaxed">
                                    {{ $item->deskripsi }}
                                </p>
                            @endif

                            <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                <div class="flex items-center text-xs text-gray-500">
                                    <svg class="w-4 h-4 mr-1.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="font-medium">{{ $item->created_at->format('d M Y') }}</span>
                                </div>
                                
                                <a href="{{ route('galeri.show', $item->id) }}" class="text-blue-600 hover:text-blue-700 font-semibold text-sm flex items-center">
                                    <span class="hidden sm:inline">Detail</span>
                                    <svg class="w-4 h-4 sm:ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($galeriItems->hasPages())
                <div class="mt-12 md:mt-16">
                    <div class="flex flex-col items-center">
                        <!-- Pagination Info -->
                        <div class="mb-4 text-sm text-gray-600">
                            Halaman {{ $galeriItems->currentPage() }} dari {{ $galeriItems->lastPage() }}
                        </div>
                        
                        <!-- Pagination Links -->
                        <div class="flex flex-wrap justify-center gap-2">
                            {{ $galeriItems->links() }}
                        </div>
                    </div>
                </div>
            @endif
        @else
            <!-- Empty State - Modern Design -->
            <div class="text-center py-16 md:py-24">
                <div class="max-w-md mx-auto">
                    <!-- Animated Icon -->
                    <div class="mb-8 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-32 h-32 bg-blue-100 rounded-full animate-pulse"></div>
                        </div>
                        <div class="relative bg-gradient-to-br from-blue-50 to-blue-100 w-32 h-32 rounded-full flex items-center justify-center mx-auto shadow-lg">
                            <svg class="w-16 h-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3">Belum Ada Foto</h3>
                    <p class="text-gray-600 text-base md:text-lg mb-8 leading-relaxed">
                        Foto kegiatan desa akan ditampilkan di sini. Nantikan dokumentasi momen-momen berharga kami.
                    </p>
                    
                    <a href="{{ route('home') }}" class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Call to Action Section -->
@if($galeriItems->count() > 0)
<section class="py-12 md:py-16 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-400 rounded-full filter blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl mx-auto text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Ikuti Kegiatan Desa Kami</h2>
            <p class="text-blue-100 text-base md:text-lg mb-8">
                Dapatkan informasi terbaru tentang berbagai kegiatan dan program desa
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('berita.index') }}" class="inline-flex items-center justify-center bg-white text-blue-700 px-6 md:px-8 py-3 md:py-4 rounded-xl font-bold hover:bg-blue-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <span>Lihat Berita</span>
                </a>
                <a href="{{ route('kontak') }}" class="inline-flex items-center justify-center bg-transparent border-2 border-white text-white px-6 md:px-8 py-3 md:py-4 rounded-xl font-bold hover:bg-white hover:text-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Hubungi Kami</span>
                </a>
            </div>
        </div>
    </div>
</section>
@endif

@endsection