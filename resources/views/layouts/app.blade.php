<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIM-Surat')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-['Inter'] app-body">

    <!-- SIDEBAR KIRI -->
    <aside class="sidebar">
        <div>
            <!-- Judul Aplikasi -->
            <div class="p-6 border-b border-rose-900/40">
                <h2 class="sidebar-brand">SIM-Surat</h2>
                <p class="text-[10px] text-rose-300/80 uppercase tracking-wider mt-1">Sistem Informasi Surat</p>
            </div>

            <!-- Menu Navigasi -->
            <nav class="p-4 space-y-1.5">
                <p class="text-[10px] font-semibold text-rose-400 uppercase tracking-wider px-3 mb-2">Menu Utama</p>

                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'nav-item-active' : 'nav-item' }}">
                    <span>🏠</span>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('surat-masuk.index') }}" class="{{ request()->routeIs('surat-masuk.*') ? 'nav-item-active' : 'nav-item' }}">
                    <span>📥</span>
                    <span>Surat Masuk</span>
                </a>

                <a href="{{ route('surat-keluar.index') }}" class="{{ request()->routeIs('surat-keluar.*') ? 'nav-item-active' : 'nav-item' }}">
                    <span>📤</span>
                    <span>Surat Keluar</span>
                </a>
            </nav>
        </div>

        <!-- Info User & Logout -->
        <div class="p-4 border-t border-rose-900/40 bg-[#260206]">
            @auth
                <div class="mb-3">
                    <p class="text-[10px] text-rose-400">Masuk sebagai:</p>
                    <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                    <span class="inline-block px-2 py-0.5 mt-1 rounded text-[11px] font-medium bg-amber-400/10 text-amber-300 border border-amber-400/20">
                        {{ auth()->user()->role }}
                    </span>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-rose-700 hover:bg-rose-600 text-white text-xs font-semibold py-2 px-3 rounded-lg transition cursor-pointer">
                        Keluar
                    </button>
                </form>
            @endauth
        </div>
    </aside>

    <!-- KONTEN KANAN -->
    <div class="main-wrapper">
        <header class="topbar">
            <span class="text-sm font-medium text-rose-200">@yield('title', 'Dashboard')</span>
            <span class="text-xs text-rose-400">{{ now()->format('d M Y') }}</span>
        </header>

        <main class="main-content">
            @yield('content')
        </main>

        <footer class="app-footer">
            <p>&copy; {{ date('Y') }} Sistem Informasi Surat</p>
        </footer>
    </div>

</body>
</html>