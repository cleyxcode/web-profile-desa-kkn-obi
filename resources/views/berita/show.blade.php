@extends('layouts.app')

@section('title', $berita->judul . ' - ' . ($profilDesa->nama_desa ?? 'Website Desa'))

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-100 py-4">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Home</a>
            <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <a href="{{ route('berita.index') }}" class="hover:text-blue-600 transition">Berita</a>
            <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="text-gray-900 font-medium truncate">{{ Str::limit($berita->judul, 50) }}</span>
        </nav>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <article class="bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Featured Image -->
        @if($berita->gambar)
        <div class="aspect-video overflow-hidden">
            <img src="{{ asset('storage/' . $berita->gambar) }}" 
                 alt="{{ $berita->judul }}" 
                 class="w-full h-full object-cover">
        </div>
        @endif

        <!-- Article Content -->
        <div class="p-8 md:p-12">
            <!-- Meta Info -->
            <div class="flex items-center text-sm text-gray-500 mb-6">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <time datetime="{{ $berita->tanggal->format('Y-m-d') }}">
                    {{ $berita->tanggal->format('d F Y') }}
                </time>
                <span class="mx-2">•</span>
                <span>{{ $berita->tanggal->diffForHumans() }}</span>
            </div>

            <!-- Title -->
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                {{ $berita->judul }}
            </h1>

            <!-- Divider -->
            <div class="w-20 h-1 bg-blue-600 mb-8"></div>

            <!-- Content -->
            <div class="prose prose-lg max-w-none">
                {!! $berita->isi !!}
            </div>

            <!-- Share Buttons -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Bagikan Berita:</h3>
                <div class="flex flex-wrap gap-3">
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('berita.show', $berita->id)) }}" 
                       target="_blank"
                       class="flex items-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        Facebook
                    </a>

                    <!-- Twitter -->
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('berita.show', $berita->id)) }}&text={{ urlencode($berita->judul) }}" 
                       target="_blank"
                       class="flex items-center bg-black hover:bg-gray-800 text-white px-4 py-2 rounded-lg transition">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        Twitter
                    </a>

                    <!-- WhatsApp -->
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' - ' . route('berita.show', $berita->id)) }}" 
                       target="_blank"
                       class="flex items-center bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        WhatsApp
                    </a>

                    <!-- Copy Link -->
                    <button onclick="copyToClipboard('{{ route('berita.show', $berita->id) }}')" 
                            class="flex items-center bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                        Salin Link
                    </button>
                </div>
            </div>
        </div>
    </article>

    <!-- Navigation -->
    @if($previousBerita || $nextBerita)
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Previous Berita -->
        @if($previousBerita)
        <a href="{{ route('berita.show', $previousBerita->id) }}" 
           class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition group">
            <div class="flex items-center text-sm text-gray-500 mb-2">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Berita Sebelumnya
            </div>
            <h3 class="text-lg font-semibold text-gray-900 group-hover:text-blue-600 transition line-clamp-2">
                {{ $previousBerita->judul }}
            </h3>
        </a>
        @else
        <div></div>
        @endif

        <!-- Next Berita -->
        @if($nextBerita)
        <a href="{{ route('berita.show', $nextBerita->id) }}" 
           class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition group text-right">
            <div class="flex items-center justify-end text-sm text-gray-500 mb-2">
                Berita Selanjutnya
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 group-hover:text-blue-600 transition line-clamp-2">
                {{ $nextBerita->judul }}
            </h3>
        </a>
        @endif
    </div>
    @endif

    <!-- Related Berita -->
    @if($beritaTerkait->count() > 0)
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Berita Terkait</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($beritaTerkait as $item)
            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition group">
                <a href="{{ route('berita.show', $item->id) }}" class="block">
                    <div class="aspect-video overflow-hidden">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" 
                                 alt="{{ $item->judul }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                                <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <div class="text-xs text-gray-500 mb-2">
                            {{ $item->tanggal->format('d M Y') }}
                        </div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-blue-600 transition line-clamp-2">
                            {{ $item->judul }}
                        </h3>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Back to Berita List -->
    <div class="mt-8 text-center">
        <a href="{{ route('berita.index') }}" 
           class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition font-semibold">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar Berita
        </a>
    </div>
</div>

<!-- Copy to Clipboard Script -->
<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Show success message
        alert('Link berhasil disalin!');
    }, function(err) {
        console.error('Gagal menyalin link: ', err);
    });
}
</script>

@endsection