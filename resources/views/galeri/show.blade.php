@extends('layouts.app')

@section('title', $galeri->judul)

@section('content')
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
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('galeri') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-emerald-600 md:ml-2">Galeri</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 truncate max-w-xs">{{ Str::limit($galeri->judul, 30) }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Main Content -->
<div class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('galeri') }}" class="inline-flex items-center text-emerald-600 hover:text-emerald-700 font-medium transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Galeri
                </a>
            </div>

            <!-- Image Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
                <!-- Main Image -->
                <div class="relative aspect-[4/3] bg-gray-200">
                    <img 
                        src="{{ asset('storage/' . $galeri->gambar) }}" 
                        alt="{{ $galeri->judul }}"
                        class="w-full h-full object-contain bg-gray-900"
                    >
                </div>

                <!-- Content -->
                <div class="p-6 md:p-8">
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $galeri->created_at->format('d F Y') }}
                    </div>

                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        {{ $galeri->judul }}
                    </h1>

                    @if($galeri->deskripsi)
                        <div class="prose prose-lg max-w-none">
                            <p class="text-gray-700 leading-relaxed">
                                {{ $galeri->deskripsi }}
                            </p>
                        </div>
                    @endif

                    <!-- Share Buttons (Optional) -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <p class="text-sm font-medium text-gray-700 mb-3">Bagikan:</p>
                        <div class="flex space-x-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($galeri->judul) }}" target="_blank" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-sky-500 text-white hover:bg-sky-600 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($galeri->judul . ' - ' . request()->fullUrl()) }}" target="_blank" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-green-500 text-white hover:bg-green-600 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Photos -->
            @if($relatedPhotos->count() > 0)
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Foto Lainnya</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($relatedPhotos as $related)
                            <a href="{{ route('galeri.show', $related->id) }}" class="group block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <div class="relative aspect-[4/3] overflow-hidden bg-gray-200">
                                    <img 
                                        src="{{ asset('storage/' . $related->gambar) }}" 
                                        alt="{{ $related->judul }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                        loading="lazy"
                                    >
                                </div>
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-900 line-clamp-2 group-hover:text-emerald-600 transition-colors">
                                        {{ $related->judul }}
                                    </h3>
                                    <p class="text-xs text-gray-500 mt-2">
                                        {{ $related->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection