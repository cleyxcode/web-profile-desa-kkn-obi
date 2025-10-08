@extends('layouts.app')

@section('title', 'Data Desa')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Data Desa</h1>
            <p class="text-xl text-blue-50">Informasi lengkap tentang kependudukan, fasilitas, dan wilayah desa</p>
        </div>
    </div>
</div>

<!-- Breadcrumb -->
<div class="bg-gray-50 border-b">
    <div class="container mx-auto px-4 py-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
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
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Data Desa</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Main Content -->
<div class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <!-- Data Kependudukan -->
        <div class="mb-12">
            <div class="flex items-center mb-6">
                <div class="bg-blue-100 p-3 rounded-lg mr-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Data Kependudukan</h2>
                    <p class="text-gray-600">Statistik penduduk desa terkini</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Penduduk -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="text-4xl font-bold mb-1">{{ number_format($dataDesa->jumlah_penduduk) }}</div>
                    <div class="text-blue-100">Total Penduduk</div>
                </div>

                <!-- Kepala Keluarga -->
                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="text-4xl font-bold mb-1">{{ number_format($dataDesa->jumlah_kk) }}</div>
                    <div class="text-green-100">Kepala Keluarga</div>
                </div>

                <!-- Penduduk Pria -->
                <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="text-4xl font-bold mb-1">{{ number_format($dataDesa->jumlah_pria) }}</div>
                    <div class="text-indigo-100">Penduduk Pria</div>
                </div>

                <!-- Penduduk Wanita -->
                <div class="bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="text-4xl font-bold mb-1">{{ number_format($dataDesa->jumlah_wanita) }}</div>
                    <div class="text-pink-100">Penduduk Wanita</div>
                </div>
            </div>
        </div>

        <!-- Data Wilayah -->
        @if($dataDesa->luas_wilayah || $dataDesa->batas_wilayah || $dataDesa->mata_pencaharian_utama)
        <div class="mb-12">
            <div class="flex items-center mb-6">
                <div class="bg-emerald-100 p-3 rounded-lg mr-4">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Data Wilayah</h2>
                    <p class="text-gray-600">Informasi geografis dan ekonomi desa</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @if($dataDesa->luas_wilayah)
                <div class="bg-white border-2 border-emerald-200 rounded-xl p-6">
                    <div class="flex items-center mb-3">
                        <svg class="w-6 h-6 text-emerald-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900">Luas Wilayah</h3>
                    </div>
                    <p class="text-3xl font-bold text-emerald-600">{{ number_format($dataDesa->luas_wilayah, 2) }} Ha</p>
                </div>
                @endif

                @if($dataDesa->mata_pencaharian_utama)
                <div class="bg-white border-2 border-emerald-200 rounded-xl p-6">
                    <div class="flex items-center mb-3">
                        <svg class="w-6 h-6 text-emerald-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900">Mata Pencaharian Utama</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed">{{ $dataDesa->mata_pencaharian_utama }}</p>
                </div>
                @endif
            </div>

            @if($dataDesa->batas_wilayah)
            <div class="mt-6 bg-white border-2 border-emerald-200 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <svg class="w-6 h-6 text-emerald-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                    </svg>
                    Batas Wilayah
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach($dataDesa->batas_wilayah as $arah => $nilai)
                        @if($nilai)
                        <div class="bg-emerald-50 rounded-lg p-4 border border-emerald-200">
                            <div class="text-sm font-medium text-emerald-600 mb-1">{{ $arah }}</div>
                            <div class="text-gray-900 font-semibold">{{ $nilai }}</div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        @endif

        <!-- Data Pendidikan -->
        <div class="mb-12">
            <div class="flex items-center mb-6">
                <div class="bg-purple-100 p-3 rounded-lg mr-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Fasilitas Pendidikan</h2>
                    <p class="text-gray-600">Sarana pendidikan di desa</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- SD -->
                <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-purple-500 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Sekolah Dasar</h3>
                        <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-sm font-bold">{{ $dataDesa->jumlah_sd }}</span>
                    </div>
                    @if($dataDesa->nama_sd)
                        <div class="text-sm text-gray-600 space-y-1">
                            @foreach(explode(',', $dataDesa->nama_sd) as $nama)
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-purple-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ trim($nama) }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- SMP -->
                <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-blue-500 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">SMP</h3>
                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-bold">{{ $dataDesa->jumlah_smp }}</span>
                    </div>
                    @if($dataDesa->nama_smp)
                        <div class="text-sm text-gray-600 space-y-1">
                            @foreach(explode(',', $dataDesa->nama_smp) as $nama)
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ trim($nama) }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- SMA/SMK -->
                <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-indigo-500 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">SMA/SMK</h3>
                        <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-sm font-bold">{{ $dataDesa->jumlah_sma }}</span>
                    </div>
                    @if($dataDesa->nama_sma)
                        <div class="text-sm text-gray-600 space-y-1">
                            @foreach(explode(',', $dataDesa->nama_sma) as $nama)
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-indigo-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ trim($nama) }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tempat Ibadah & Kesehatan -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <!-- Tempat Ibadah -->
            <div>
                <div class="flex items-center mb-6">
                    <div class="bg-amber-100 p-3 rounded-lg mr-4">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Tempat Ibadah</h2>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-amber-500">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-lg font-semibold text-gray-900">Gereja</h3>
                            <span class="bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-sm font-bold">{{ $dataDesa->jumlah_gereja }}</span>
                        </div>
                        @if($dataDesa->nama_gereja)
                            <div class="text-sm text-gray-600">
                                {{ $dataDesa->nama_gereja }}
                            </div>
                        @endif
                    </div>

                    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-lg font-semibold text-gray-900">Masjid</h3>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-bold">{{ $dataDesa->jumlah_masjid }}</span>
                        </div>
                        @if($dataDesa->nama_masjid)
                            <div class="text-sm text-gray-600">
                                {{ $dataDesa->nama_masjid }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Fasilitas Kesehatan -->
            <div>
                <div class="flex items-center mb-6">
                    <div class="bg-red-100 p-3 rounded-lg mr-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Fasilitas Kesehatan</h2>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-red-500">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-lg font-semibold text-gray-900">Puskesmas/Pustu</h3>
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-bold">{{ $dataDesa->jumlah_puskesmas }}</span>
                        </div>
                        @if($dataDesa->nama_puskesmas)
                            <div class="text-sm text-gray-600">
                                {{ $dataDesa->nama_puskesmas }}
                            </div>
                        @endif
                    </div>

                    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-pink-500">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-lg font-semibold text-gray-900">Posyandu</h3>
                            <span class="bg-pink-100 text-pink-700 px-3 py-1 rounded-full text-sm font-bold">{{ $dataDesa->jumlah_posyandu }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA to Potensi Desa -->
        @if($dataDesa->produk_unggulan && count($dataDesa->produk_unggulan) > 0)
        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 rounded-2xl shadow-xl p-8 text-white text-center">
            <div class="max-w-2xl mx-auto">
                <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                </svg>
                <h3 class="text-2xl font-bold mb-3">Lihat Produk Unggulan Desa</h3>
                <p class="text-emerald-50 mb-6">Temukan berbagai produk unggulan dan potensi ekonomi desa kami</p>
                <a href="{{ route('potensi-desa') }}" class="inline-flex items-center bg-white text-emerald-600 px-8 py-3 rounded-full font-semibold hover:bg-emerald-50 transition-colors shadow-lg">
                    Lihat Potensi Desa
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection