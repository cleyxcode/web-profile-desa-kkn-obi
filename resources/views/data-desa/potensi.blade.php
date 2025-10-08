@extends('layouts.app')

@section('title', 'Potensi Desa - Produk Unggulan')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <div class="inline-flex items-center bg-white bg-opacity-20 px-4 py-2 rounded-full mb-4">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                </svg>
                <span class="font-medium">Potensi & Produk Unggulan</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Produk Unggulan Desa</h1>
            <p class="text-xl text-emerald-50">Mengenal berbagai produk unggulan dan potensi ekonomi desa kami</p>
        </div>
    </div>
</div>

<!-- Breadcrumb -->
<div class="bg-gray-50 border-b">
    <div class="container mx-auto px-4 py-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-emerald-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Beranda
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Potensi Desa</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Stats Section -->
<div class="py-8 bg-white border-b">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="text-center">
                <div class="text-3xl font-bold text-emerald-600">{{ $produkUnggulan->count() }}</div>
                <div class="text-sm text-gray-600">Total Produk</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-blue-600">{{ $produkUnggulan->where('kategori', 'pertanian')->count() + $produkUnggulan->where('kategori', 'perkebunan')->count() }}</div>
                <div class="text-sm text-gray-600">Pertanian</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-orange-600">{{ $produkUnggulan->where('kategori', 'kerajinan')->count() }}</div>
                <div class="text-sm text-gray-600">Kerajinan</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-purple-600">{{ $produkUnggulan->where('kategori', 'kuliner')->count() }}</div>
                <div class="text-sm text-gray-600">Kuliner</div>
            </div>
        </div>
    </div>
</div>

<!-- Products Grid -->
<div class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        @if($produkUnggulan->count() > 0)
            <!-- Category Filter Tabs -->
            <div class="mb-8 flex flex-wrap gap-2 justify-center">
                <button class="px-4 py-2 bg-emerald-600 text-white rounded-lg font-medium hover:bg-emerald-700 transition-colors">
                    Semua
                </button>
                <button class="px-4 py-2 bg-white text-gray-700 rounded-lg font-medium hover:bg-gray-100 transition-colors border border-gray-300">
                    Pertanian
                </button>
                <button class="px-4 py-2 bg-white text-gray-700 rounded-lg font-medium hover:bg-gray-100 transition-colors border border-gray-300">
                    Perkebunan
                </button>
                <button class="px-4 py-2 bg-white text-gray-700 rounded-lg font-medium hover:bg-gray-100 transition-colors border border-gray-300">
                    Kerajinan
                </button>
                <button class="px-4 py-2 bg-white text-gray-700 rounded-lg font-medium hover:bg-gray-100 transition-colors border border-gray-300">
                    Kuliner
                </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($produkUnggulan as $index => $produk)
                    <div class="group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <!-- Product Image -->
                        <div class="relative aspect-square overflow-hidden bg-gradient-to-br from-emerald-100 to-teal-100">
                            @if(isset($produk['foto_produk']) && $produk['foto_produk'])
                                <img 
                                    src="{{ asset('storage/' . $produk['foto_produk']) }}" 
                                    alt="{{ $produk['nama_produk'] }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    loading="lazy"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-20 h-20 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Category Badge -->
                            <div class="absolute top-3 left-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white bg-opacity-95 backdrop-blur-sm
                                    @if($produk['kategori'] == 'pertanian') text-green-700
                                    @elseif($produk['kategori'] == 'perkebunan') text-emerald-700
                                    @elseif($produk['kategori'] == 'perikanan') text-blue-700
                                    @elseif($produk['kategori'] == 'kerajinan') text-orange-700
                                    @elseif($produk['kategori'] == 'kuliner') text-purple-700
                                    @else text-gray-700
                                    @endif">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ ucfirst($produk['kategori']) }}
                                </span>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-1 group-hover:text-emerald-600 transition-colors">
                                {{ $produk['nama_produk'] }}
                            </h3>
                            
                            @if(isset($produk['deskripsi']) && $produk['deskripsi'])
                                <p class="text-sm text-gray-600 mb-3 line-clamp-2">
                                    {{ $produk['deskripsi'] }}
                                </p>
                            @endif

                            <div class="space-y-2 mb-4">
                                @if(isset($produk['produksi_tahunan']) && $produk['produksi_tahunan'])
                                    <div class="flex items-center text-xs text-gray-600">
                                        <svg class="w-4 h-4 mr-2 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                        <span class="font-medium">{{ $produk['produksi_tahunan'] }}</span>
                                    </div>
                                @endif

                                @if(isset($produk['harga_rata']) && $produk['harga_rata'])
                                    <div class="flex items-center text-xs text-gray-600">
                                        <svg class="w-4 h-4 mr-2 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="font-medium">{{ $produk['harga_rata'] }}</span>
                                    </div>
                                @endif
                            </div>

                            <a href="{{ route('potensi-desa.show', $index) }}" class="block w-full text-center bg-emerald-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-emerald-700 transition-colors">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <h3 class="mt-4 text-xl font-medium text-gray-900">Belum ada produk unggulan</h3>
                <p class="mt-2 text-gray-500">Produk unggulan desa akan ditampilkan di sini.</p>
            </div>
        @endif
    </div>
</div>

<!-- Back to Data Desa CTA -->
<div class="py-8 bg-white border-t">
    <div class="container mx-auto px-4 text-center">
        <a href="{{ route('data-desa') }}" class="inline-flex items-center text-emerald-600 hover:text-emerald-700 font-medium transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Data Desa
        </a>
    </div>
</div>
@endsection