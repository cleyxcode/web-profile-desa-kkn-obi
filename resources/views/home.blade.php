@extends('layouts.app')

@section('title', ($profilDesa->nama_desa ?? 'Website Desa') . ' - Beranda')

@section('content')
<!-- Hero/Banner Section - Modern Design -->
<div class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full filter blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-400 rounded-full filter blur-3xl transform translate-x-1/2 translate-y-1/2"></div>
    </div>
    
    @if($profilDesa && $profilDesa->banner)
        <img src="/storage/profil-desa/{{ basename($profilDesa->banner) }}" alt="Banner {{ $profilDesa->nama_desa }}" class="absolute inset-0 w-full h-full object-cover opacity-20">
    @endif
    
    <div class="relative z-10 min-h-[600px] flex items-center py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="text-white max-w-3xl">
                <div class="inline-block mb-4 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium">
                    🏛️ Portal Resmi Pemerintah Desa
                </div>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold mb-6 leading-tight">
                    <span class="block">Selamat Datang di</span>
                    <span class="block text-blue-200">{{ $profilDesa->nama_desa ?? 'Website Desa' }}</span>
                </h1>
                @if($profilDesa && $profilDesa->tagline)
                    <p class="text-xl md:text-2xl mb-8 text-blue-50 font-light">{{ $profilDesa->tagline }}</p>
                @endif
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('profil-desa') }}" class="group bg-white text-blue-700 px-8 py-4 rounded-xl font-bold hover:bg-blue-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center">
                        <span>Tentang Kami</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="{{ route('kontak') }}" class="group bg-transparent border-2 border-white text-white px-8 py-4 rounded-xl font-bold hover:bg-white hover:text-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>Hubungi Kami</span>
                    </a>
                </div>
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

<!-- Statistik Desa - Featured Section -->
@if($dataDesa)
<section class="relative -mt-20 pb-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-2xl p-8 md:p-12 border border-gray-100">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Data Desa dalam Angka</h2>
                <p class="text-gray-600 text-lg">Informasi statistik terkini {{ $profilDesa->nama_desa ?? 'desa kami' }}</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                <!-- Jumlah Penduduk -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-blue-200">
                    <div class="bg-blue-600 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl md:text-4xl font-bold text-blue-700 mb-1">{{ number_format($dataDesa->jumlah_penduduk ?? 0) }}</div>
                    <div class="text-sm md:text-base text-gray-700 font-medium">Jiwa Penduduk</div>
                </div>
                
                <!-- Jumlah KK -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-green-200">
                    <div class="bg-green-600 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <div class="text-3xl md:text-4xl font-bold text-green-700 mb-1">{{ number_format($dataDesa->jumlah_kk ?? 0) }}</div>
                    <div class="text-sm md:text-base text-gray-700 font-medium">Kepala Keluarga</div>
                </div>
                
                <!-- Jumlah SD -->
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-purple-200">
                    <div class="bg-purple-600 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div class="text-3xl md:text-4xl font-bold text-purple-700 mb-1">{{ $dataDesa->jumlah_sd ?? 0 }}</div>
                    <div class="text-sm md:text-base text-gray-700 font-medium">Sekolah Dasar</div>
                </div>
                
                <!-- Jumlah SMP -->
                <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-orange-200">
                    <div class="bg-orange-600 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                        </svg>
                    </div>
                    <div class="text-3xl md:text-4xl font-bold text-orange-700 mb-1">{{ $dataDesa->jumlah_smp ?? 0 }}</div>
                    <div class="text-sm md:text-base text-gray-700 font-medium">SMP</div>
                </div>
                
                <!-- Jumlah Gereja -->
                <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-indigo-200">
                    <div class="bg-indigo-600 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div class="text-3xl md:text-4xl font-bold text-indigo-700 mb-1">{{ $dataDesa->jumlah_gereja ?? 0 }}</div>
                    <div class="text-sm md:text-base text-gray-700 font-medium">Gereja</div>
                </div>
                
                <!-- Jumlah Masjid -->
                <div class="bg-gradient-to-br from-teal-50 to-teal-100 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-teal-200">
                    <div class="bg-teal-600 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div class="text-3xl md:text-4xl font-bold text-teal-700 mb-1">{{ $dataDesa->jumlah_masjid ?? 0 }}</div>
                    <div class="text-sm md:text-base text-gray-700 font-medium">Masjid</div>
                </div>
                
                <!-- Jumlah Puskesmas -->
                <div class="bg-gradient-to-br from-rose-50 to-rose-100 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-rose-200">
                    <div class="bg-rose-600 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl md:text-4xl font-bold text-rose-700 mb-1">{{ $dataDesa->jumlah_puskesmas ?? 0 }}</div>
                    <div class="text-sm md:text-base text-gray-700 font-medium">Puskesmas</div>
                </div>
                
                <!-- Jumlah Posyandu -->
                <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-cyan-200">
                    <div class="bg-cyan-600 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div class="text-3xl md:text-4xl font-bold text-cyan-700 mb-1">{{ $dataDesa->jumlah_posyandu ?? 0 }}</div>
                    <div class="text-sm md:text-base text-gray-700 font-medium">Posyandu</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Sambutan Kepala Desa -->
@if($profilDesa && $profilDesa->sambutan_kepala_desa)
<section class="py-20 bg-gradient-to-br from-blue-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Foto Kepala Desa -->
            <div class="flex justify-center lg:justify-end order-2 lg:order-1">
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-r from-blue-600 to-blue-400 rounded-2xl transform rotate-3"></div>
                    @if($profilDesa->foto_kepala_desa)
                        <img src="/storage/profil-desa/{{ basename($profilDesa->foto_kepala_desa) }}" alt="{{ $profilDesa->nama_kepala_desa }}" class="relative w-80 h-80 rounded-2xl object-cover shadow-2xl">
                    @else
                        <div class="relative w-80 h-80 bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl flex items-center justify-center shadow-2xl">
                            <svg class="w-40 h-40 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Sambutan -->
            <div class="order-1 lg:order-2">
                <div class="inline-block mb-4 px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
                    💬 Sambutan
                </div>
                <h2 class="text-4xl font-bold text-gray-800 mb-6">Kata Sambutan<br><span class="text-blue-600">Kepala Desa</span></h2>
                
                <div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100">
                    <div class="relative">
                        <svg class="absolute -top-2 -left-2 w-8 h-8 text-blue-200" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                        </svg>
                        <p class="text-gray-700 leading-relaxed mb-6 pl-6">{{ $profilDesa->sambutan_kepala_desa }}</p>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <p class="font-bold text-gray-800 text-lg">{{ $profilDesa->nama_kepala_desa }}</p>
                        <p class="text-blue-600 font-medium">Kepala Desa {{ $profilDesa->nama_desa }}</p>
                        @if($profilDesa->masa_jabatan_mulai && $profilDesa->masa_jabatan_selesai)
                            <p class="text-sm text-gray-500 mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
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

<!-- Visi & Misi -->
@if($profilDesa && ($profilDesa->visi || $profilDesa->misi))
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="inline-block mb-4 px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
                🎯 Visi & Misi
            </div>
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Visi & Misi <span class="text-blue-600">Desa</span></h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Komitmen kami untuk membangun desa yang lebih baik</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Visi -->
            @if($profilDesa->visi)
            <div class="group bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-blue-200">
                <div class="flex items-center mb-6">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center mr-4 shadow-lg group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800">Visi</h3>
                </div>
                <p class="text-gray-700 leading-relaxed text-lg">{{ $profilDesa->visi }}</p>
            </div>
            @endif

            <!-- Misi -->
            @if($profilDesa->misi)
            <div class="group bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-green-200">
                <div class="flex items-center mb-6">
                    <div class="bg-gradient-to-br from-green-600 to-green-700 w-16 h-16 rounded-2xl flex items-center justify-center mr-4 shadow-lg group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800">Misi</h3>
                </div>
                <p class="text-gray-700 leading-relaxed text-lg whitespace-pre-line">{{ $profilDesa->misi }}</p>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

<!-- Produk Unggulan -->
@if($dataDesa && $dataDesa->produk_unggulan && is_array($dataDesa->produk_unggulan) && count($dataDesa->produk_unggulan) > 0)
<section class="py-20 bg-gradient-to-br from-blue-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="inline-block mb-4 px-4 py-2 bg-orange-100 text-orange-700 rounded-full text-sm font-semibold">
                ⭐ Produk Unggulan
            </div>
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Produk Unggulan <span class="text-blue-600">Desa</span></h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Kebanggaan hasil karya masyarakat desa kami</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($dataDesa->produk_unggulan as $produk)
            <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                <div class="flex items-start">
                    <div class="bg-gradient-to-br from-orange-500 to-orange-600 w-14 h-14 rounded-xl flex items-center justify-center mr-4 flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                        </svg>
                    </div>
                    <div>
                        @if(is_array($produk))
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $produk['nama'] ?? 'Produk' }}</h3>
                            @if(isset($produk['deskripsi']))
                                <p class="text-gray-600">{{ $produk['deskripsi'] }}</p>
                            @endif
                        @else
                            <h3 class="text-xl font-bold text-gray-800">{{ $produk }}</h3>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Berita Terbaru -->
@if($beritaTerbaru->count() > 0)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-16">
            <div>
                <div class="inline-block mb-4 px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
                    📰 Berita Terkini
                </div>
                <h2 class="text-4xl font-bold text-gray-800 mb-2">Berita <span class="text-blue-600">Terbaru</span></h2>
                <p class="text-gray-600 text-lg">Informasi dan aktivitas terkini dari desa</p>
            </div>
            <a href="{{ route('berita.index') }}" class="group mt-6 md:mt-0 inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold text-lg transition-all">
                <span>Lihat Semua Berita</span>
                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($beritaTerbaru as $berita)
            <article class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:-translate-y-2">
                <!-- Gambar Berita -->
                <div class="relative overflow-hidden h-56">
                    @if($berita->gambar)
                        <img src="/storage/berita/{{ basename($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                            <svg class="w-20 h-20 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4 bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow-lg">
                        {{ $berita->tanggal->format('d M Y') }}
                    </div>
                </div>
                
                <!-- Konten Berita -->
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors">
                        {{ $berita->judul }}
                    </h3>
                    <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                        {{ Str::limit(strip_tags($berita->isi), 150) }}
                    </p>
                    <a href="{{ route('berita.show', $berita->id) }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold group/link">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-4 h-4 ml-2 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Galeri Highlight -->
@if(isset($galeriHighlight) && $galeriHighlight->count() > 0)
<section class="py-20 bg-gradient-to-br from-blue-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-16">
            <div>
                <div class="inline-block mb-4 px-4 py-2 bg-purple-100 text-purple-700 rounded-full text-sm font-semibold">
                    📸 Galeri
                </div>
                <h2 class="text-4xl font-bold text-gray-800 mb-2">Galeri <span class="text-blue-600">Desa</span></h2>
                <p class="text-gray-600 text-lg">Dokumentasi kegiatan dan keindahan desa</p>
            </div>
            <a href="{{ route('galeri') }}" class="group mt-6 md:mt-0 inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold text-lg transition-all">
                <span>Lihat Semua Galeri</span>
                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($galeriHighlight as $item)
            <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 aspect-square">
                <img src="/storage/galeri/{{ basename($item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-white font-bold text-lg">{{ $item->judul }}</h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Video Profil -->
@if($profilDesa && $profilDesa->video_profil_url)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-block mb-4 px-4 py-2 bg-red-100 text-red-700 rounded-full text-sm font-semibold">
                🎥 Video Profil
            </div>
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Video Profil <span class="text-blue-600">Desa</span></h2>
            @if($profilDesa->video_profil_deskripsi)
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">{{ $profilDesa->video_profil_deskripsi }}</p>
            @endif
        </div>
        
        <div class="max-w-5xl mx-auto">
            <div class="relative pb-[56.25%] h-0 overflow-hidden rounded-2xl shadow-2xl border-4 border-white">
                @if($profilDesa->youtube_embed_url)
                    <iframe 
                        src="{{ $profilDesa->youtube_embed_url }}" 
                        class="absolute top-0 left-0 w-full h-full"
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                @endif
            </div>
        </div>
    </div>
</section>
@endif

<!-- Quick Links / Layanan -->
<section class="py-20 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-400 rounded-full filter blur-3xl"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-block mb-4 px-4 py-2 bg-white/20 backdrop-blur-sm text-white rounded-full text-sm font-semibold">
                🔗 Layanan Kami
            </div>
            <h2 class="text-4xl font-bold text-white mb-4">Akses Cepat <span class="text-blue-200">Layanan Desa</span></h2>
            <p class="text-blue-100 text-lg max-w-2xl mx-auto">Jelajahi berbagai informasi dan layanan yang tersedia</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Profil Desa -->
            <a href="{{ route('profil-desa') }}" class="group bg-white rounded-2xl p-8 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors">Profil Desa</h3>
                <p class="text-gray-600 leading-relaxed mb-4">Kenali lebih dalam tentang sejarah, visi misi, dan struktur pemerintahan desa kami.</p>
                <div class="flex items-center text-blue-600 font-semibold group-hover:translate-x-2 transition-transform">
                    <span>Selengkapnya</span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </div>
            </a>
            
            <!-- Data Desa -->
            <a href="{{ route('data-desa') }}" class="group bg-white rounded-2xl p-8 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="bg-gradient-to-br from-green-600 to-green-700 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-green-600 transition-colors">Data Desa</h3>
                <p class="text-gray-600 leading-relaxed mb-4">Informasi statistik lengkap tentang demografi dan fasilitas desa.</p>
                <div class="flex items-center text-green-600 font-semibold group-hover:translate-x-2 transition-transform">
                    <span>Selengkapnya</span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </div>
            </a>
            
            <!-- Kontak -->
            <a href="{{ route('kontak') }}" class="group bg-white rounded-2xl p-8 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="bg-gradient-to-br from-purple-600 to-purple-700 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-purple-600 transition-colors">Hubungi Kami</h3>
                <p class="text-gray-600 leading-relaxed mb-4">Ada pertanyaan? Sampaikan pesan Anda kepada kami.</p>
                <div class="flex items-center text-purple-600 font-semibold group-hover:translate-x-2 transition-transform">
                    <span>Selengkapnya</span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</section>

@endsection