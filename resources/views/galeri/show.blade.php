@extends('layouts.app')

@section('title', $galeri->judul)

@section('content')
<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-100">
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
                <li>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('galeri') }}" class="ml-1 text-sm font-medium text-gray-600 hover:text-blue-600 md:ml-2 transition-colors">Galeri</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-semibold text-blue-600 md:ml-2 truncate max-w-xs">{{ Str::limit($galeri->judul, 30) }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Main Content -->
<div class="py-12 md:py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <!-- Back Button -->
            <div class="mb-6 md:mb-8">
                <a href="{{ route('galeri') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold transition-all duration-300 group">
                    <div class="bg-blue-50 group-hover:bg-blue-100 p-2 rounded-lg mr-2 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </div>
                    <span>Kembali ke Galeri</span>
                </a>
            </div>

            <!-- Image Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8 md:mb-12">
                <!-- Main Image -->
                <div class="relative aspect-[16/9] bg-gradient-to-br from-gray-900 to-gray-800">
                    <img 
                        src="{{ asset('storage/' . $galeri->gambar) }}" 
                        alt="{{ $galeri->judul }}"
                        class="w-full h-full object-contain"
                    >
                    
                    <!-- Image Badge -->
                    <div class="absolute top-4 right-4 bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg backdrop-blur-sm bg-opacity-90">
                        📷 Foto Kegiatan
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6 md:p-10">
                    <!-- Date -->
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <div class="bg-blue-50 p-2 rounded-lg mr-3">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-700">{{ $galeri->created_at->format('d F Y') }}</span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                        {{ $galeri->judul }}
                    </h1>

                    <!-- Description -->
                    @if($galeri->deskripsi)
                        <div class="prose prose-lg max-w-none mb-8">
                            <div class="bg-gradient-to-br from-blue-50 to-white p-6 rounded-xl border border-blue-100">
                                <p class="text-gray-700 leading-relaxed text-base md:text-lg">
                                    {{ $galeri->deskripsi }}
                                </p>
                            </div>
                        </div>
                    @endif

                    <!-- Share Buttons -->
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <p class="text-sm font-semibold text-gray-700 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                                Bagikan Foto Ini
                            </p>
                            <div class="flex items-center gap-3">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="group flex items-center justify-center w-12 h-12 rounded-xl bg-blue-600 text-white hover:bg-blue-700 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($galeri->judul) }}" target="_blank" class="group flex items-center justify-center w-12 h-12 rounded-xl bg-sky-500 text-white hover:bg-sky-600 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($galeri->judul . ' - ' . request()->fullUrl()) }}" target="_blank" class="group flex items-center justify-center w-12 h-12 rounded-xl bg-green-500 text-white hover:bg-green-600 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Photos -->
            @if($relatedPhotos->count() > 0)
                <div class="mb-8">
                    <div class="flex items-center justify-between mb-6 md:mb-8">
                        <div>
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Foto Lainnya</h2>
                            <p class="text-gray-600">Lihat dokumentasi kegiatan desa lainnya</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                        @foreach($relatedPhotos as $related)
                            <article class="group relative bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                                <!-- Image Container -->
                                <div class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                                    <img 
                                        src="{{ asset('storage/' . $related->gambar) }}" 
                                        alt="{{ $related->judul }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                        loading="lazy"
                                    >
                                    
                                    <!-- Overlay on Hover -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <a href="{{ route('galeri.show', $related->id) }}" class="transform scale-75 group-hover:scale-100 transition-transform duration-300">
                                                <div class="bg-white/20 backdrop-blur-md p-4 rounded-full border-2 border-white/50 hover:bg-white/30 transition-all">
                                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                </div>
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
                                        {{ $related->judul }}
                                    </h3>

                                    <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                        <div class="flex items-center text-xs text-gray-500">
                                            <svg class="w-4 h-4 mr-1.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="font-medium">{{ $related->created_at->format('d M Y') }}</span>
                                        </div>
                                        
                                        <a href="{{ route('galeri.show', $related->id) }}" class="text-blue-600 hover:text-blue-700 font-semibold text-sm flex items-center">
                                            <span class="hidden sm:inline">Lihat</span>
                                            <svg class="w-4 h-4 sm:ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Call to Action Section -->
<section class="py-12 md:py-16 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-400 rounded-full filter blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl mx-auto text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Lihat Dokumentasi Lainnya</h2>
            <p class="text-blue-100 text-base md:text-lg mb-8">
                Jelajahi lebih banyak foto kegiatan dan momen berharga desa kami
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('galeri') }}" class="inline-flex items-center justify-center bg-white text-blue-700 px-6 md:px-8 py-3 md:py-4 rounded-xl font-bold hover:bg-blue-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>Kembali ke Galeri</span>
                </a>
                <a href="{{ route('berita.index') }}" class="inline-flex items-center justify-center bg-transparent border-2 border-white text-white px-6 md:px-8 py-3 md:py-4 rounded-xl font-bold hover:bg-white hover:text-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <span>Lihat Berita</span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection