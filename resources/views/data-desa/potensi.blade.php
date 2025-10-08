@extends('layouts.app')

@section('title', 'Potensi Desa - Produk Unggulan')

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
                <div class="inline-flex items-center bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full mb-4 text-sm font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                    <span>Potensi & Produk Unggulan</span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-6 leading-tight">
                    Produk <span class="text-blue-200">Unggulan Desa</span>
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
                        <span class="ml-1 text-sm font-semibold text-blue-600 md:ml-2">Potensi Desa</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Stats Section -->
<div class="py-8 md:py-12 bg-white border-b border-gray-100">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 text-center transform hover:scale-105 transition-transform duration-300">
                <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">{{ $produkUnggulan->count() }}</div>
                <div class="text-sm md:text-base text-gray-700 font-medium">Total Produk</div>
            </div>
            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 text-center transform hover:scale-105 transition-transform duration-300">
                <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">{{ $produkUnggulan->where('kategori', 'pertanian')->count() + $produkUnggulan->where('kategori', 'perkebunan')->count() }}</div>
                <div class="text-sm md:text-base text-gray-700 font-medium">Pertanian</div>
            </div>
            <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-6 text-center transform hover:scale-105 transition-transform duration-300">
                <div class="text-3xl md:text-4xl font-bold text-orange-600 mb-2">{{ $produkUnggulan->where('kategori', 'kerajinan')->count() }}</div>
                <div class="text-sm md:text-base text-gray-700 font-medium">Kerajinan</div>
            </div>
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 text-center transform hover:scale-105 transition-transform duration-300">
                <div class="text-3xl md:text-4xl font-bold text-purple-600 mb-2">{{ $produkUnggulan->where('kategori', 'kuliner')->count() }}</div>
                <div class="text-sm md:text-base text-gray-700 font-medium">Kuliner</div>
            </div>
        </div>
    </div>
</div>

<!-- Products Grid -->
<div class="py-12 md:py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        @if($produkUnggulan->count() > 0)
            <!-- Category Filter Tabs -->
            <div class="mb-10 md:mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 text-center">Kategori Produk</h2>
                <div class="flex flex-wrap gap-3 justify-center">
                    <button class="group px-5 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                            Semua
                        </span>
                    </button>
                    <button class="group px-5 py-2.5 bg-white text-gray-700 rounded-xl font-semibold hover:bg-blue-50 hover:text-blue-600 transition-all duration-300 border-2 border-gray-200 hover:border-blue-300 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                        <span class="flex items-center">
                            🌾 Pertanian
                        </span>
                    </button>
                    <button class="group px-5 py-2.5 bg-white text-gray-700 rounded-xl font-semibold hover:bg-blue-50 hover:text-blue-600 transition-all duration-300 border-2 border-gray-200 hover:border-blue-300 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                        <span class="flex items-center">
                            🌳 Perkebunan
                        </span>
                    </button>
                    <button class="group px-5 py-2.5 bg-white text-gray-700 rounded-xl font-semibold hover:bg-blue-50 hover:text-blue-600 transition-all duration-300 border-2 border-gray-200 hover:border-blue-300 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                        <span class="flex items-center">
                            🎨 Kerajinan
                        </span>
                    </button>
                    <button class="group px-5 py-2.5 bg-white text-gray-700 rounded-xl font-semibold hover:bg-blue-50 hover:text-blue-600 transition-all duration-300 border-2 border-gray-200 hover:border-blue-300 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                        <span class="flex items-center">
                            🍽️ Kuliner
                        </span>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($produkUnggulan as $index => $produk)
                    <article class="group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <!-- Product Image -->
                        <div class="relative aspect-square overflow-hidden bg-gradient-to-br from-blue-50 to-blue-100">
                            @if(isset($produk['foto_produk']) && $produk['foto_produk'])
                                <img 
                                    src="{{ asset('storage/' . $produk['foto_produk']) }}" 
                                    alt="{{ $produk['nama_produk'] }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    loading="lazy"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-20 h-20 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Overlay on Hover -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-4 left-4 right-4">
                                    <div class="bg-white/20 backdrop-blur-md rounded-lg p-3 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                        <p class="text-white text-sm font-medium">Klik untuk detail</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Category Badge -->
                            <div class="absolute top-3 left-3">
                                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-white shadow-md
                                    @if($produk['kategori'] == 'pertanian') text-green-700
                                    @elseif($produk['kategori'] == 'perkebunan') text-emerald-700
                                    @elseif($produk['kategori'] == 'perikanan') text-blue-700
                                    @elseif($produk['kategori'] == 'kerajinan') text-orange-700
                                    @elseif($produk['kategori'] == 'kuliner') text-purple-700
                                    @else text-gray-700
                                    @endif">
                                    @if($produk['kategori'] == 'pertanian') 🌾
                                    @elseif($produk['kategori'] == 'perkebunan') 🌳
                                    @elseif($produk['kategori'] == 'perikanan') 🐟
                                    @elseif($produk['kategori'] == 'kerajinan') 🎨
                                    @elseif($produk['kategori'] == 'kuliner') 🍽️
                                    @endif
                                    {{ ucfirst($produk['kategori']) }}
                                </span>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-1 group-hover:text-blue-600 transition-colors">
                                {{ $produk['nama_produk'] }}
                            </h3>
                            
                            @if(isset($produk['deskripsi']) && $produk['deskripsi'])
                                <p class="text-sm text-gray-600 mb-4 line-clamp-2 leading-relaxed">
                                    {{ $produk['deskripsi'] }}
                                </p>
                            @endif

                            <div class="space-y-2 mb-4 pb-4 border-b border-gray-100">
                                @if(isset($produk['produksi_tahunan']) && $produk['produksi_tahunan'])
                                    <div class="flex items-center text-xs text-gray-600">
                                        <div class="bg-blue-50 p-1.5 rounded-lg mr-2">
                                            <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium">{{ $produk['produksi_tahunan'] }}</span>
                                    </div>
                                @endif

                                @if(isset($produk['harga_rata']) && $produk['harga_rata'])
                                    <div class="flex items-center text-xs text-gray-600">
                                        <div class="bg-blue-50 p-1.5 rounded-lg mr-2">
                                            <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium">{{ $produk['harga_rata'] }}</span>
                                    </div>
                                @endif
                            </div>

                            <a href="{{ route('potensi-desa.show', $index) }}" class="block w-full text-center bg-blue-600 text-white px-4 py-2.5 rounded-xl font-semibold hover:bg-blue-700 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                Lihat Detail
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3">Belum Ada Produk Unggulan</h3>
                    <p class="text-gray-600 text-base md:text-lg mb-8 leading-relaxed">
                        Produk unggulan desa akan ditampilkan di sini. Nantikan update terbaru dari kami.
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
@if($produkUnggulan->count() > 0)
<section class="py-12 md:py-16 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-400 rounded-full filter blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl mx-auto text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Ingin Mengetahui Lebih Lanjut?</h2>
            <p class="text-blue-100 text-base md:text-lg mb-8">
                Jelajahi informasi lengkap tentang data desa dan informasi lainnya
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('data-desa') }}" class="inline-flex items-center justify-center bg-white text-blue-700 px-6 md:px-8 py-3 md:py-4 rounded-xl font-bold hover:bg-blue-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Kembali ke Data Desa</span>
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