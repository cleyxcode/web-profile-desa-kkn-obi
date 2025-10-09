<!DOCTYPE html>
<html lang="id">
<head>
    {{-- views/layouts/app.blade.php --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Website Desa')</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Optional: custom konfigurasi warna -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1E3A8A',
                        secondary: '#2563EB',
                    },
                },
            },
        }
    </script>
    
    <style>
        [x-cloak] { display: none !important; }
        
        /* Animasi untuk navbar scroll */
        .navbar-scrolled {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95);
        }
        
        /* Animasi underline hover */
        .nav-link {
            position: relative;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 50%;
            background: linear-gradient(90deg, #2563EB, #3B82F6);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        
        /* Animasi logo */
        .logo-container {
            transition: transform 0.3s ease;
        }
        
        .logo-container:hover {
            transform: scale(1.05);
        }
        
        /* Animasi mobile menu */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .mobile-menu-item {
            animation: slideDown 0.3s ease forwards;
        }
        
        /* Stagger animation untuk mobile menu items */
        .mobile-menu-item:nth-child(1) { animation-delay: 0.1s; }
        .mobile-menu-item:nth-child(2) { animation-delay: 0.15s; }
        .mobile-menu-item:nth-child(3) { animation-delay: 0.2s; }
        .mobile-menu-item:nth-child(4) { animation-delay: 0.25s; }
        .mobile-menu-item:nth-child(5) { animation-delay: 0.3s; }
        .mobile-menu-item:nth-child(6) { animation-delay: 0.35s; }
        .mobile-menu-item:nth-child(7) { animation-delay: 0.4s; }
        
        /* Hamburger menu animation */
        .hamburger-line {
            transition: all 0.3s ease;
        }
        
        /* Gradient text effect */
        .gradient-text {
            background: linear-gradient(135deg, #1E3A8A 0%, #2563EB 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50 transition-all duration-300" 
         x-data="{ 
             open: false, 
             scrolled: false,
             init() {
                 window.addEventListener('scroll', () => {
                     this.scrolled = window.scrollY > 20;
                 });
             }
         }"
         :class="{ 'navbar-scrolled': scrolled }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16" :class="{ 'h-14': scrolled }">
                <!-- Logo & Nama Desa -->
                <div class="flex items-center logo-container">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        @if(isset($profilDesa) && $profilDesa->logo_desa)
                            <div class="relative">
                                <div class="absolute inset-0 bg-blue-400 rounded-full blur opacity-20 group-hover:opacity-40 transition-opacity"></div>
                                <img src="{{ asset('storage/' . $profilDesa->logo_desa) }}" 
                                     alt="Logo Desa" 
                                     class="h-10 w-10 relative z-10 transition-transform group-hover:rotate-6">
                            </div>
                        @endif
                        <span class="text-xl font-bold gradient-text transition-all" 
                              :class="{ 'text-lg': scrolled }">
                            {{ $profilDesa->nama_desa ?? 'Website Desa' }}
                        </span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex md:items-center md:space-x-1">
                    <a href="{{ route('home') }}" 
                       class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-gray-700 hover:text-blue-600 transition-all duration-300 {{ request()->routeIs('home') ? 'active text-blue-600' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('profil-desa') }}" 
                       class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-gray-700 hover:text-blue-600 transition-all duration-300 {{ request()->routeIs('profil-desa') ? 'active text-blue-600' : '' }}">
                        Profil Desa
                    </a>
                    <a href="{{ route('berita.index') }}" 
                       class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-gray-700 hover:text-blue-600 transition-all duration-300 {{ request()->routeIs('berita.*') ? 'active text-blue-600' : '' }}">
                        Berita
                    </a>
                    <a href="{{ route('galeri') }}" 
                       class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-gray-700 hover:text-blue-600 transition-all duration-300 {{ request()->routeIs('galeri') ? 'active text-blue-600' : '' }}">
                        Galeri
                    </a>
                    <a href="{{ route('data-desa') }}" 
                       class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-gray-700 hover:text-blue-600 transition-all duration-300 {{ request()->routeIs('data-desa') ? 'active text-blue-600' : '' }}">
                        Data Desa
                    </a>
                    <a href="{{ route('potensi-desa') }}" 
                       class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-gray-700 hover:text-blue-600 transition-all duration-300 {{ request()->routeIs('potensi-desa') ? 'active text-blue-600' : '' }}">
                        Potensi Desa
                    </a>
                    <a href="{{ route('kontak') }}" 
                       class="px-4 py-2 rounded-lg text-sm font-medium bg-gradient-to-r from-blue-600 to-blue-500 text-white hover:from-blue-700 hover:to-blue-600 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                        Kontak
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button @click="open = !open" 
                            class="inline-flex items-center justify-center p-2 rounded-lg text-gray-700 hover:text-blue-600 hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300">
                        <span class="sr-only">Open main menu</span>
                        <!-- Hamburger Icon -->
                        <div class="w-6 h-5 flex flex-col justify-between">
                            <span class="hamburger-line w-full h-0.5 bg-current rounded-full" 
                                  :class="{ 'rotate-45 translate-y-2': open }"></span>
                            <span class="hamburger-line w-full h-0.5 bg-current rounded-full" 
                                  :class="{ 'opacity-0': open }"></span>
                            <span class="hamburger-line w-full h-0.5 bg-current rounded-full" 
                                  :class="{ '-rotate-45 -translate-y-2': open }"></span>
                        </div>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" 
             x-cloak 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-gradient-to-b from-white to-blue-50 border-t shadow-lg">
                <a href="{{ route('home') }}" 
                   class="mobile-menu-item block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-white hover:shadow-md transition-all duration-300 {{ request()->routeIs('home') ? 'text-blue-600 bg-white shadow-md' : '' }}"
                   style="opacity: 0;">
                    <span class="flex items-center">
                        <span class="mr-3">🏠</span>
                        Home
                    </span>
                </a>
                <a href="{{ route('profil-desa') }}" 
                   class="mobile-menu-item block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-white hover:shadow-md transition-all duration-300 {{ request()->routeIs('profil-desa') ? 'text-blue-600 bg-white shadow-md' : '' }}"
                   style="opacity: 0;">
                    <span class="flex items-center">
                        <span class="mr-3">📋</span>
                        Profil Desa
                    </span>
                </a>
                <a href="{{ route('berita.index') }}" 
                   class="mobile-menu-item block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-white hover:shadow-md transition-all duration-300 {{ request()->routeIs('berita.*') ? 'text-blue-600 bg-white shadow-md' : '' }}"
                   style="opacity: 0;">
                    <span class="flex items-center">
                        <span class="mr-3">📰</span>
                        Berita
                    </span>
                </a>
                <a href="{{ route('galeri') }}" 
                   class="mobile-menu-item block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-white hover:shadow-md transition-all duration-300 {{ request()->routeIs('galeri') ? 'text-blue-600 bg-white shadow-md' : '' }}"
                   style="opacity: 0;">
                    <span class="flex items-center">
                        <span class="mr-3">🖼️</span>
                        Galeri
                    </span>
                </a>
                <a href="{{ route('data-desa') }}" 
                   class="mobile-menu-item block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-white hover:shadow-md transition-all duration-300 {{ request()->routeIs('data-desa') ? 'text-blue-600 bg-white shadow-md' : '' }}"
                   style="opacity: 0;">
                    <span class="flex items-center">
                        <span class="mr-3">📊</span>
                        Data Desa
                    </span>
                </a>
                <a href="{{ route('potensi-desa') }}" 
                   class="mobile-menu-item block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-white hover:shadow-md transition-all duration-300 {{ request()->routeIs('potensi-desa') ? 'text-blue-600 bg-white shadow-md' : '' }}"
                   style="opacity: 0;">
                    <span class="flex items-center">
                        <span class="mr-3">🌾</span>
                        Potensi Desa
                    </span>
                </a>
                <a href="{{ route('kontak') }}" 
                   class="mobile-menu-item block px-4 py-3 rounded-lg text-base font-medium bg-gradient-to-r from-blue-600 to-blue-500 text-white hover:from-blue-700 hover:to-blue-600 transition-all duration-300 shadow-md hover:shadow-lg"
                   style="opacity: 0;">
                    <span class="flex items-center">
                        <span class="mr-3">📞</span>
                        Kontak
                    </span>
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