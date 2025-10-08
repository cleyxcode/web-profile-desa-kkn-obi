@extends('layouts.app')

@section('title', 'Profil Desa - ' . ($profilDesa->nama_desa ?? 'Website Desa'))

@section('content')
<!-- Hero Section dengan Banner -->
<div class="relative h-96 bg-gradient-to-r from-blue-600 to-blue-800 overflow-hidden">
    @if($profilDesa->banner)
        <img src="{{ asset('storage/' . $profilDesa->banner) }}" 
             alt="Banner {{ $profilDesa->nama_desa }}" 
             class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-50">
    @endif
    
    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
        <div class="text-white">
            <div class="flex items-center mb-4">
                @if($profilDesa->logo_desa)
                    <img src="{{ asset('storage/' . $profilDesa->logo_desa) }}" 
                         alt="Logo {{ $profilDesa->nama_desa }}" 
                         class="h-20 w-20 mr-4 bg-white rounded-full p-2">
                @endif
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-2">{{ $profilDesa->nama_desa }}</h1>
                    @if($profilDesa->tagline)
                        <p class="text-xl text-blue-100 italic">{{ $profilDesa->tagline }}</p>
                    @endif
                </div>
            </div>
            
            <div class="flex items-center text-blue-100 space-x-4 mt-4">
                <span>📍 {{ $profilDesa->kecamatan }}, {{ $profilDesa->kabupaten }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Quick Info Cards -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-10">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-12">
        <!-- Card 1: Luas Wilayah -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Luas Wilayah</p>
                    <p class="text-2xl font-bold text-blue-600">{{ $profilDesa->luas_wilayah ?? '0' }}</p>
                    <p class="text-xs text-gray-400">km²</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 2: Jumlah Dusun -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Jumlah Dusun</p>
                    <p class="text-2xl font-bold text-green-600">{{ $profilDesa->jumlah_dusun ?? '0' }}</p>
                    <p class="text-xs text-gray-400">dusun</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 3: Jumlah RW -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Jumlah RW</p>
                    <p class="text-2xl font-bold text-purple-600">{{ $profilDesa->jumlah_rw ?? '0' }}</p>
                    <p class="text-xs text-gray-400">RW</p>
                </div>
                <div class="bg-purple-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 4: Jumlah RT -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Jumlah RT</p>
                    <p class="text-2xl font-bold text-orange-600">{{ $profilDesa->jumlah_rt ?? '0' }}</p>
                    <p class="text-xs text-gray-400">RT</p>
                </div>
                <div class="bg-orange-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content - Left Side -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Sambutan Kepala Desa -->
            @if($profilDesa->sambutan_kepala_desa)
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="bg-blue-600 w-1 h-8 mr-3"></span>
                    Sambutan Kepala Desa
                </h2>
                
                <div class="flex flex-col md:flex-row gap-6">
                    @if($profilDesa->foto_kepala_desa)
                    <div class="flex-shrink-0">
                        <img src="{{ asset('storage/' . $profilDesa->foto_kepala_desa) }}" 
                             alt="{{ $profilDesa->nama_kepala_desa }}" 
                             class="w-32 h-32 rounded-full object-cover border-4 border-blue-100">
                    </div>
                    @endif
                    
                    <div class="flex-1">
                        @if($profilDesa->nama_kepala_desa)
                        <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $profilDesa->nama_kepala_desa }}</h3>
                        <p class="text-sm text-gray-500 mb-4">Kepala Desa {{ $profilDesa->nama_desa }}</p>
                        @endif
                        
                        <div class="prose max-w-none text-gray-600">
                            {!! $profilDesa->sambutan_kepala_desa !!}
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Sejarah Desa -->
            @if($profilDesa->sejarah)
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="bg-blue-600 w-1 h-8 mr-3"></span>
                    Sejarah Desa
                </h2>
                <div class="prose max-w-none text-gray-600">
                    {!! $profilDesa->sejarah !!}
                </div>
            </div>
            @endif

            <!-- Visi & Misi -->
            @if($profilDesa->visi || $profilDesa->misi)
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="bg-blue-600 w-1 h-8 mr-3"></span>
                    Visi & Misi
                </h2>
                
                @if($profilDesa->visi)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        Visi
                    </h3>
                    <div class="bg-blue-50 border-l-4 border-blue-600 p-4 text-gray-700">
                        {{ $profilDesa->visi }}
                    </div>
                </div>
                @endif
                
                @if($profilDesa->misi)
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                        Misi
                    </h3>
                    <div class="bg-green-50 border-l-4 border-green-600 p-4">
                        <div class="text-gray-700 whitespace-pre-line">{{ $profilDesa->misi }}</div>
                    </div>
                </div>
                @endif
            </div>
            @endif

            <!-- Struktur Organisasi -->
            @if($profilDesa->struktur_image || $profilDesa->struktur_pemerintahan)
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="bg-blue-600 w-1 h-8 mr-3"></span>
                    Struktur Pemerintahan
                </h2>
                
                @if($profilDesa->struktur_image)
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $profilDesa->struktur_image) }}" 
                         alt="Struktur Pemerintahan {{ $profilDesa->nama_desa }}" 
                         class="w-full rounded-lg shadow-md">
                </div>
                @endif
                
                @if($profilDesa->struktur_pemerintahan)
                <div class="prose max-w-none text-gray-600">
                    {!! $profilDesa->struktur_pemerintahan !!}
                </div>
                @endif
            </div>
            @endif

            <!-- Video Profil -->
            @if($profilDesa->video_profil_url)
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="bg-blue-600 w-1 h-8 mr-3"></span>
                    Video Profil Desa
                </h2>
                
                <div class="aspect-video mb-4">
                    @php
                        $videoId = null;
                        if (preg_match('/[?&]v=([^&]+)/', $profilDesa->video_profil_url, $matches)) {
                            $videoId = $matches[1];
                        } elseif (preg_match('/youtu\.be\/([^?]+)/', $profilDesa->video_profil_url, $matches)) {
                            $videoId = $matches[1];
                        }
                    @endphp
                    
                    @if($videoId)
                    <iframe 
                        class="w-full h-full rounded-lg shadow-md" 
                        src="https://www.youtube.com/embed/{{ $videoId }}" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                    @endif
                </div>
                
                @if($profilDesa->video_profil_deskripsi)
                <p class="text-gray-600 text-sm">{{ $profilDesa->video_profil_deskripsi }}</p>
                @endif
            </div>
            @endif
        </div>

        <!-- Sidebar - Right Side -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Info Kontak -->
            <div class="bg-white rounded-lg shadow-lg p-6 sticky top-20">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Informasi Kontak
                </h3>
                
                <div class="space-y-4 text-sm">
                    @if($profilDesa->alamat)
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-gray-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <div>
                            <p class="font-semibold text-gray-700">Alamat:</p>
                            <p class="text-gray-600">{{ $profilDesa->alamat }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if($profilDesa->kontak)
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-gray-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <div>
                            <p class="font-semibold text-gray-700">Telepon:</p>
                            <p class="text-gray-600">{{ $profilDesa->kontak }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if($profilDesa->email)
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-gray-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <div>
                            <p class="font-semibold text-gray-700">Email:</p>
                            <p class="text-gray-600 break-all">{{ $profilDesa->email }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if($profilDesa->website)
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-gray-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                        <div>
                            <p class="font-semibold text-gray-700">Website:</p>
                            <a href="{{ $profilDesa->website }}" target="_blank" class="text-blue-600 hover:underline break-all">{{ $profilDesa->website }}</a>
                        </div>
                    </div>
                    @endif
                </div>
                
                <!-- Social Media -->
                @if($profilDesa->facebook || $profilDesa->instagram || $profilDesa->youtube || $profilDesa->twitter || $profilDesa->tiktok)
                <div class="border-t pt-4 mt-4">
                    <p class="font-semibold text-gray-700 mb-3">Media Sosial:</p>
                    <div class="flex flex-wrap gap-2">
                        @if($profilDesa->facebook)
                        <a href="{{ $profilDesa->facebook }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-lg transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        @endif
                        
                        @if($profilDesa->instagram)
                        <a href="{{ $profilDesa->instagram }}" target="_blank" class="bg-gradient-to-br from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 text-white p-2 rounded-lg transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        @endif
                        
                        @if($profilDesa->youtube)
                        <a href="{{ $profilDesa->youtube }}" target="_blank" class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-lg transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                        @endif
                        
                        @if($profilDesa->twitter)
                        <a href="{{ $profilDesa->twitter }}" target="_blank" class="bg-black hover:bg-gray-800 text-white p-2 rounded-lg transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        @endif
                        
                        @if($profilDesa->tiktok)
                        <a href="{{ $profilDesa->tiktok }}" target="_blank" class="bg-black hover:bg-gray-800 text-white p-2 rounded-lg transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                        </a>
                        @endif
                    </div>
                </div>
                @endif
            </div>

            <!-- Peta Lokasi -->
            @if($profilDesa->latitude && $profilDesa->longitude)
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Lokasi Desa
                </h3>
                
                <div class="aspect-square rounded-lg overflow-hidden mb-3">
                    <iframe 
                        width="100%" 
                        height="100%" 
                        frameborder="0" 
                        scrolling="no" 
                        marginheight="0" 
                        marginwidth="0" 
                        src="https://www.openstreetmap.org/export/embed.html?bbox={{ $profilDesa->longitude - 0.01 }}%2C{{ $profilDesa->latitude - 0.01 }}%2C{{ $profilDesa->longitude + 0.01 }}%2C{{ $profilDesa->latitude + 0.01 }}&amp;layer=mapnik&amp;marker={{ $profilDesa->latitude }}%2C{{ $profilDesa->longitude }}"
                        style="border: none">
                    </iframe>
                </div>
                
                <a href="https://www.google.com/maps?q={{ $profilDesa->latitude }},{{ $profilDesa->longitude }}" 
                   target="_blank" 
                   class="block text-center bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition text-sm">
                    Buka di Google Maps
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Galeri Foto -->
@if(isset($profilDesa->galeri_array) && count($profilDesa->galeri_array) > 0)
<div class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Galeri Foto Desa</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($profilDesa->galeri_array as $foto)
            <div class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition cursor-pointer aspect-square">
                <img src="{{ asset('storage/' . $foto) }}" 
                     alt="Galeri {{ $profilDesa->nama_desa }}" 
                     class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition duration-300 flex items-center justify-center">
                    <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                    </svg>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-8">
            <a href="{{ route('galeri') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition font-semibold">
                Lihat Galeri Lengkap
            </a>
        </div>
    </div>
</div>
@endif

@endsection