@extends('layouts.app')

@section('title', 'Berita Desa - ' . ($profilDesa->nama_desa ?? 'Website Desa'))

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-blue-800 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Berita Desa</h1>
            <p class="text-xl text-blue-100">Informasi dan Kabar Terkini dari Desa</p>
        </div>
    </div>
</div>

<!-- Search & Filter Section -->
<div class="bg-white shadow-md sticky top-16 z-40" x-data="{ showFilter: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <form action="{{ route('berita.index') }}" method="GET" class="space-y-4">
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Search Box -->
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Cari berita..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Filter Toggle Button (Mobile) -->
                <button type="button" 
                        @click="showFilter = !showFilter"
                        class="md:hidden bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Filter
                </button>

                <!-- Filter Desktop -->
                <div class="hidden md:flex gap-2">
                    <select name="bulan" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Semua Bulan</option>
                        <option value="1" {{ request('bulan') == '1' ? 'selected' : '' }}>Januari</option>
                        <option value="2" {{ request('bulan') == '2' ? 'selected' : '' }}>Februari</option>
                        <option value="3" {{ request('bulan') == '3' ? 'selected' : '' }}>Maret</option>
                        <option value="4" {{ request('bulan') == '4' ? 'selected' : '' }}>April</option>
                        <option value="5" {{ request('bulan') == '5' ? 'selected' : '' }}>Mei</option>
                        <option value="6" {{ request('bulan') == '6' ? 'selected' : '' }}>Juni</option>
                        <option value="7" {{ request('bulan') == '7' ? 'selected' : '' }}>Juli</option>
                        <option value="8" {{ request('bulan') == '8' ? 'selected' : '' }}>Agustus</option>
                        <option value="9" {{ request('bulan') == '9' ? 'selected' : '' }}>September</option>
                        <option value="10" {{ request('bulan') == '10' ? 'selected' : '' }}>Oktober</option>
                        <option value="11" {{ request('bulan') == '11' ? 'selected' : '' }}>November</option>
                        <option value="12" {{ request('bulan') == '12' ? 'selected' : '' }}>Desember</option>
                    </select>

                    <select name="tahun" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Semua Tahun</option>
                        @foreach($tahunList as $tahun)
                            <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Cari
                    </button>

                    @if(request()->hasAny(['search', 'bulan', 'tahun']))
                        <a href="{{ route('berita.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition flex items-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Filter Mobile (Collapsible) -->
            <div x-show="showFilter" x-cloak x-transition class="md:hidden space-y-3">
                <select name="bulan" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Semua Bulan</option>
                    <option value="1" {{ request('bulan') == '1' ? 'selected' : '' }}>Januari</option>
                    <option value="2" {{ request('bulan') == '2' ? 'selected' : '' }}>Februari</option>
                    <option value="3" {{ request('bulan') == '3' ? 'selected' : '' }}>Maret</option>
                    <option value="4" {{ request('bulan') == '4' ? 'selected' : '' }}>April</option>
                    <option value="5" {{ request('bulan') == '5' ? 'selected' : '' }}>Mei</option>
                    <option value="6" {{ request('bulan') == '6' ? 'selected' : '' }}>Juni</option>
                    <option value="7" {{ request('bulan') == '7' ? 'selected' : '' }}>Juli</option>
                    <option value="8" {{ request('bulan') == '8' ? 'selected' : '' }}>Agustus</option>
                    <option value="9" {{ request('bulan') == '9' ? 'selected' : '' }}>September</option>
                    <option value="10" {{ request('bulan') == '10' ? 'selected' : '' }}>Oktober</option>
                    <option value="11" {{ request('bulan') == '11' ? 'selected' : '' }}>November</option>
                    <option value="12" {{ request('bulan') == '12' ? 'selected' : '' }}>Desember</option>
                </select>

                <select name="tahun" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Semua Tahun</option>
                    @foreach($tahunList as $tahun)
                        <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                    @endforeach
                </select>

                <div class="flex gap-2">
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
                        Cari
                    </button>

                    @if(request()->hasAny(['search', 'bulan', 'tahun']))
                        <a href="{{ route('berita.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Berita Grid -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @if($berita->count() > 0)
        <!-- Search Info -->
        @if(request()->has('search') || request()->has('bulan') || request()->has('tahun'))
            <div class="mb-6 text-gray-600">
                <p>
                    Menampilkan {{ $berita->total() }} berita
                    @if(request('search'))
                        untuk pencarian "<strong>{{ request('search') }}</strong>"
                    @endif
                    @if(request('bulan'))
                        bulan <strong>{{ DateTime::createFromFormat('!m', request('bulan'))->format('F') }}</strong>
                    @endif
                    @if(request('tahun'))
                        tahun <strong>{{ request('tahun') }}</strong>
                    @endif
                </p>
            </div>
        @endif

        <!-- Berita Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($berita as $item)
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition group">
                    <!-- Image -->
                    <a href="{{ route('berita.show', $item->id) }}" class="block overflow-hidden aspect-video">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" 
                                 alt="{{ $item->judul }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                                <svg class="w-20 h-20 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                        @endif
                    </a>

                    <!-- Content -->
                    <div class="p-6">
                        <!-- Date Badge -->
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $item->tanggal->format('d F Y') }}
                        </div>

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 group-hover:text-blue-600 transition">
                            <a href="{{ route('berita.show', $item->id) }}">
                                {{ $item->judul }}
                            </a>
                        </h3>

                        <!-- Excerpt -->
                        <div class="text-gray-600 mb-4 line-clamp-3">
                            {!! Str::limit(strip_tags($item->isi), 150) !!}
                        </div>

                        <!-- Read More -->
                        <a href="{{ route('berita.show', $item->id) }}" 
                           class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold group">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $berita->links() }}
        </div>

    @else
        <!-- Empty State -->
        <div class="text-center py-16">
            <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
            </svg>
            <h3 class="mt-4 text-xl font-semibold text-gray-900">Tidak ada berita ditemukan</h3>
            <p class="mt-2 text-gray-500">
                @if(request()->hasAny(['search', 'bulan', 'tahun']))
                    Coba ubah kriteria pencarian Anda.
                @else
                    Belum ada berita yang dipublikasikan.
                @endif
            </p>
            @if(request()->hasAny(['search', 'bulan', 'tahun']))
                <a href="{{ route('berita.index') }}" class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
                    Tampilkan Semua Berita
                </a>
            @endif
        </div>
    @endif
</div>

@endsection