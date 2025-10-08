<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Website Desa')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo & Nama Desa -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        @if(isset($profilDesa) && $profilDesa->logo_desa)
                            <img src="{{ asset('storage/' . $profilDesa->logo_desa) }}" alt="Logo Desa" class="h-10 w-10">
                        @endif
                        <span class="text-xl font-bold text-gray-800">
                            {{ $profilDesa->nama_desa ?? 'Website Desa' }}
                        </span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex md:items-center md:space-x-1">
                    <a href="{{ route('home') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('profil-desa') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition {{ request()->routeIs('profil-desa') ? 'text-blue-600 bg-blue-50' : '' }}">
                        Profil Desa
                    </a>
                    <a href="{{ route('berita.index') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition {{ request()->routeIs('berita.*') ? 'text-blue-600 bg-blue-50' : '' }}">
                        Berita
                    </a>
                    <a href="{{ route('galeri') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition {{ request()->routeIs('galeri') ? 'text-blue-600 bg-blue-50' : '' }}">
                        Galeri
                    </a>
                    <a href="{{ route('data-desa') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition {{ request()->routeIs('data-desa') ? 'text-blue-600 bg-blue-50' : '' }}">
                        Data Desa
                    </a>
                    <a href="{{ route('potensi-desa') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition {{ request()->routeIs('potensi-desa') ? 'text-blue-600 bg-blue-50' : '' }}">
                        Potensi Desa
                    </a>
                    <a href="{{ route('kontak') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition {{ request()->routeIs('kontak') ? 'text-blue-600 bg-blue-50' : '' }}">
                        Kontak
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-blue-600 hover:bg-blue-50 focus:outline-none">
                        <svg class="h-6 w-6" :class="{'hidden': open, 'block': !open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="h-6 w-6" :class="{'block': open, 'hidden': !open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-cloak x-transition class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Home
                </a>
                <a href="{{ route('profil-desa') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 {{ request()->routeIs('profil-desa') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Profil Desa
                </a>
                <a href="{{ route('berita.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 {{ request()->routeIs('berita.*') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Berita
                </a>
                <a href="{{ route('galeri') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 {{ request()->routeIs('galeri') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Galeri
                </a>
                <a href="{{ route('data-desa') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 {{ request()->routeIs('data-desa') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Data Desa
                </a>
                <a href="{{ route('potensi-desa') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 {{ request()->routeIs('potensi-desa') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Potensi Desa
                </a>
                <a href="{{ route('kontak') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 {{ request()->routeIs('kontak') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Kontak
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Kolom 1: Info Desa -->
                <div>
                    <h3 class="text-lg font-bold mb-4">{{ $profilDesa->nama_desa ?? 'Desa' }}</h3>
                    <p class="text-gray-300 text-sm">
                        {{ $profilDesa->alamat_lengkap ?? 'Alamat Desa' }}
                    </p>
                    @if(isset($profilDesa) && $profilDesa->kontak)
                        <p class="text-gray-300 text-sm mt-2">
                            <span class="font-semibold">Kontak:</span> {{ $profilDesa->kontak }}
                        </p>
                    @endif
                    @if(isset($profilDesa) && $profilDesa->email)
                        <p class="text-gray-300 text-sm">
                            <span class="font-semibold">Email:</span> {{ $profilDesa->email }}
                        </p>
                    @endif
                </div>

                <!-- Kolom 2: Menu Cepat -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Menu Cepat</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition">Home</a></li>
                        <li><a href="{{ route('profil-desa') }}" class="text-gray-300 hover:text-white transition">Profil Desa</a></li>
                        <li><a href="{{ route('berita.index') }}" class="text-gray-300 hover:text-white transition">Berita</a></li>
                        <li><a href="{{ route('data-desa') }}" class="text-gray-300 hover:text-white transition">Data Desa</a></li>
                        <li><a href="{{ route('kontak') }}" class="text-gray-300 hover:text-white transition">Kontak</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Social Media -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        @if(isset($profilDesa) && $profilDesa->facebook)
                            <a href="{{ $profilDesa->facebook }}" target="_blank" class="text-gray-300 hover:text-white transition">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                        @endif
                        @if(isset($profilDesa) && $profilDesa->instagram)
                            <a href="{{ $profilDesa->instagram }}" target="_blank" class="text-gray-300 hover:text-white transition">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                        @endif
                        @if(isset($profilDesa) && $profilDesa->youtube)
                            <a href="{{ $profilDesa->youtube }}" target="_blank" class="text-gray-300 hover:text-white transition">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-sm text-gray-300">
                <p>&copy; {{ date('Y') }} {{ $profilDesa->nama_desa ?? 'Website Desa' }}. KKN Informatika.</p>
            </div>
        </div>
    </footer>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>