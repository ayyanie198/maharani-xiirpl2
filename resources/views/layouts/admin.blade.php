<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Doodlune Admin 🌸</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }

        /* === PALET WARNA DOODLUNE (PINK) === */
        :root {
            --pink-dark: #4A3040;
            --pink-primary: #FF6B9D;
            --pink-medium: #FF8FAB;
            --pink-light: #FFD1DC;
            --pink-accent: #FFF0F5;
            --cream-pink: #FFF5F7;
        }

        /* Scrollbar Lucu */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--cream-pink); }
        ::-webkit-scrollbar-thumb { background: var(--pink-light); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--pink-primary); }

        /* Sidebar Interactions */
        .sidebar-link { transition: all 0.25s ease; }
        .sidebar-link:hover {
            background: linear-gradient(90deg, var(--pink-primary) 0%, var(--pink-medium) 100%);
            color: white;
            transform: translateX(4px);
        }
        .sidebar-link.active {
            background: linear-gradient(90deg, var(--pink-primary) 0%, var(--pink-medium) 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(255, 107, 157, 0.3);
        }

        /* Logo Gradient Text */
        .logo-gradient {
            background: linear-gradient(135deg, var(--pink-primary) 0%, var(--pink-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Tombol Utama */
        .btn-primary {
            background: linear-gradient(135deg, var(--pink-primary) 0%, var(--pink-medium) 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #C44569 0%, var(--pink-primary) 100%);
            box-shadow: 0 8px 20px rgba(255, 107, 157, 0.4);
            transform: translateY(-2px);
        }

        /* ============================================ */
        /* === RESPONSIVE TABLE TO CARD (Mobile) === */
        /* === LABEL DI ATAS, KONTEN DI BAWAH === */
        /* ============================================ */
        @media (max-width: 768px) {
            .responsive-table thead { display: none; }
            .responsive-table, .responsive-table tbody, .responsive-table tr, .responsive-table td {
                display: block; width: 100%;
            }
            .responsive-table tr {
                margin-bottom: 1rem; border: 1px solid #FFD1DC; border-radius: 1rem;
                padding: 1rem 1.25rem; background: white;
                box-shadow: 0 2px 8px rgba(255, 107, 157, 0.1);
            }
            .responsive-table td {
                padding: 0.7rem 0; position: relative;
                border-bottom: 1px dashed #FFF0F5;
                text-align: left;
            }
            .responsive-table td:last-child { border-bottom: none; }
            .responsive-table td::before {
                content: attr(data-label);
                display: block;
                font-weight: 700;
                color: #C44569;
                font-size: 0.7rem;
                text-transform: uppercase;
                letter-spacing: 0.06em;
                margin-bottom: 0.4rem;
            }
            .responsive-table td .flex,
            .responsive-table td .flex.items-center { justify-content: flex-start; }
        }

        /* ============================================ */
        /* === DARK MODE COMPLETE (100% Fix & Kontras) === */
        /* ============================================ */
        .dark body { background-color: #1a0f14 !important; color: #FFE4EC !important; }
        
        .dark .bg-white, .dark .bg-white\/80, .dark .bg-white\/90 { 
            background-color: #2d1f27 !important; color: #FFE4EC !important; 
        }
        .dark .bg-\[\#FFF5F7\], .dark .bg-\[\#FFF0F5\], .dark .bg-\[\#FAF7F5\], .dark .bg-\[\#EFEBE9\],
        .dark .bg-gray-50, .dark .bg-gray-100, .dark .bg-green-50, .dark .bg-red-50, .dark .bg-yellow-50, .dark .bg-blue-50, .dark .bg-orange-50 { 
            background-color: #3d2833 !important; 
        }

        .dark .border-\[\#FFD1DC\], .dark .border-\[\#FFF0F5\], .dark .border-\[\#EFEBE9\], .dark .border-\[\#D7CCC8\],
        .dark .border-gray-100, .dark .border-gray-200, .dark .border-gray-300, .dark .border-green-400, .dark .border-red-400 { 
            border-color: #5a3a4a !important; 
        }

        .dark .text-\[\#4A3040\], .dark .text-\[\#3E2723\], .dark .text-\[\#5D4037\], .dark .text-\[\#8D6E63\], .dark .text-\[\#6D4C41\] { color: #FFD1DC !important; }
        .dark .text-gray-500, .dark .text-gray-600, .dark .text-gray-700, .dark .text-gray-800, .dark .text-gray-900 { color: #FFE4EC !important; }
        .dark .text-\[\#C44569\] { color: #FFB6C1 !important; }
        .dark .text-green-800, .dark .text-red-800, .dark .text-yellow-800 { color: #FFE4EC !important; }

        .dark .bg-green-100 { background-color: rgba(16,185,129,0.2) !important; }
        .dark .text-green-700, .dark .text-green-800 { color: #6EE7B7 !important; }
        .dark .bg-yellow-100 { background-color: rgba(245,158,11,0.2) !important; }
        .dark .text-yellow-700, .dark .text-yellow-800 { color: #FCD34D !important; }
        .dark .bg-red-100 { background-color: rgba(239,68,68,0.2) !important; }
        .dark .text-red-700, .dark .text-red-800 { color: #FCA5A5 !important; }

        .dark input, .dark select, .dark textarea { background-color: #3d2833 !important; color: #FFE4EC !important; border-color: #5a3a4a !important; }
        .dark input::placeholder, .dark textarea::placeholder { color: #C9A0B0 !important; }

        .dark #sidebar { background-color: #241019 !important; border-color: #3d2833 !important; }
        .dark .sidebar-link { color: #FFD1DC !important; }
        .dark .sidebar-link:hover, .dark .sidebar-link.active { background: linear-gradient(90deg, #C44569 0%, #FF6B9D 100%) !important; color: white !important; }

        .dark code { background-color: #3d2833 !important; color: #FFB6C1 !important; }

        .dark .hover\:bg-\[\#FFF5F7\]:hover, .dark .hover\:bg-\[\#FAF7F5\]:hover, .dark .hover\:bg-\[\#FFF0F5\]:hover { background-color: #3d2833 !important; }

        .dark .bg-green-50 { background-color: rgba(16,185,129,0.15) !important; }
        .dark .text-green-800 { color: #6EE7B7 !important; }
        .dark .bg-red-50 { background-color: rgba(239,68,68,0.15) !important; }
        .dark .text-red-800 { color: #FCA5A5 !important; }

        .dark .divide-\[\#FFF0F5\] > *, .dark .divide-y > * { border-color: #3d2833 !important; }

        .dark .file\:bg-\[\#FFF0F5\]::file-selector-button, .dark .file\:bg-blue-50::file-selector-button, .dark .file\:bg-purple-50::file-selector-button { background-color: #4a2f3d !important; color: #FFD1DC !important; }

        .dark .glass, .dark .glass-card { background: rgba(45, 31, 39, 0.85) !important; border-color: #4a2f3d !important; }

        .dark ::-webkit-scrollbar-track { background: #1a0f14; }
        .dark ::-webkit-scrollbar-thumb { background: #5a3a4a; }
        .dark ::-webkit-scrollbar-thumb:hover { background: #FF6B9D; }

        @media (max-width: 768px) {
            .dark .responsive-table tr { background-color: #2d1f27 !important; border-color: #5a3a4a !important; }
            .dark .responsive-table td { border-bottom-color: #3d2833 !important; }
            .dark .responsive-table td::before { color: #FFB6C1 !important; }
        }
    </style>
</head>
<body class="bg-[#FFF5F7]">

<div class="flex h-screen overflow-hidden">
    <!-- SIDEBAR -->
    <aside id="sidebar" class="hidden md:flex flex-col w-64 bg-white border-r border-[#FFD1DC] transition-all duration-300">
        <div class="flex items-center justify-center h-20 border-b border-[#FFD1DC] p-4">
            <img src="{{ asset('images/logo-doodlune.jpeg') }}" onerror="this.style.display='none'" alt="Doodlune" class="h-10 w-auto mr-2">
            <span class="text-2xl font-bold logo-gradient font-serif">Doodlune 🌸</span>
        </div>

        <nav class="flex-1 overflow-y-auto py-6 px-3 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center px-4 py-3 rounded-xl text-[#4A3040] {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home w-6"></i><span class="font-semibold">Dashboard</span>
            </a>
            <a href="{{ route('admin.umkm.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-xl text-[#4A3040] {{ request()->routeIs('admin.umkm.*') ? 'active' : '' }}">
                <i class="fas fa-store w-6"></i><span class="font-semibold">Website UMKM</span>
            </a>
            <a href="{{ route('admin.produk.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-xl text-[#4A3040] {{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                <i class="fas fa-box w-6"></i><span class="font-semibold">Produk</span>
            </a>
            <a href="{{ route('admin.log.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-xl text-[#4A3040] {{ request()->routeIs('admin.log.*') ? 'active' : '' }}">
                <i class="fas fa-history w-6"></i><span class="font-semibold">Log Aktivitas</span>
            </a>
            <a href="{{ route('admin.profil') }}" class="sidebar-link flex items-center px-4 py-3 rounded-xl text-[#4A3040] {{ request()->routeIs('admin.profil') ? 'active' : '' }}">
                <i class="fas fa-user-cog w-6"></i><span class="font-semibold">Profil Saya</span>
            </a>
            <a href="{{ route('admin.kelola.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-xl text-[#4A3040] {{ request()->routeIs('admin.kelola.*') ? 'active' : '' }}">
                <i class="fas fa-users-cog w-6"></i><span class="font-semibold">Kelola Admin</span>
            </a>

            {{-- 🌟 MENU KELOLA ULASAN DENGAN BADGE NOTIFIKASI --}}
            @php
                $pendingCount = \App\Models\Ulasan::where('status', 0)->count();
            @endphp
            <a href="{{ route('admin.ulasan.index') }}" class="sidebar-link flex items-center justify-between px-4 py-3 rounded-xl text-[#4A3040] {{ request()->routeIs('admin.ulasan.*') ? 'active' : '' }}">
                <div class="flex items-center">
                    <i class="fas fa-comments w-6"></i><span class="font-semibold">Kelola Ulasan</span>
                </div>
                @if($pendingCount > 0)
                    <span class="bg-red-500 text-white text-xs font-bold px-2.5 py-0.5 rounded-full animate-pulse">
                        {{ $pendingCount }}
                    </span>
                @endif
            </a>
        </nav>

        <div class="border-t border-[#FFD1DC] p-4">
            <div class="flex items-center space-x-3">
                @php
                    $currentAdmin = \App\Models\Admin::find(Session::get('admin_id'));
                @endphp
                @if($currentAdmin && $currentAdmin->foto)
                    <img src="{{ asset('storage/' . $currentAdmin->foto) }}" class="w-11 h-11 rounded-full object-cover border-2 border-[#FFD1DC]">
                @else
                    <div class="w-11 h-11 rounded-full bg-gradient-to-br from-[#FF6B9D] to-[#C44569] flex items-center justify-center text-white font-bold shadow-md">
                        {{ substr(Session::get('admin_nama', 'A'), 0, 1) }}
                    </div>
                @endif
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-[#4A3040] truncate">{{ Session::get('admin_nama', 'Admin') }}</p>
                    <p class="text-xs text-[#C44569] truncate">{{ Session::get('admin_username', 'admin') }}</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- TOPBAR -->
        <header class="bg-white border-b border-[#FFD1DC] h-20 flex items-center justify-between px-6 shadow-sm">
            <div class="flex items-center space-x-4">
                <button id="toggleSidebar" class="md:hidden text-[#FF6B9D] hover:text-[#C44569] transition">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h2 class="text-xl font-bold text-[#4A3040] font-serif">@yield('page-title', 'Dashboard')</h2>
            </div>

            <div class="flex items-center space-x-4">
                <a href="/" target="_blank" class="hidden md:flex items-center space-x-2 text-[#C44569] hover:text-[#FF6B9D] transition">
                    <i class="fas fa-external-link-alt"></i>
                    <span class="font-medium">Lihat Website</span>
                </a>

                <!-- 🌟 TOMBOL DARK/LIGHT MODE -->
                <button id="theme-toggle" class="p-2.5 rounded-lg bg-[#FFF0F5] hover:bg-[#FFD1DC] text-[#C44569] transition border border-[#FFD1DC]" title="Ganti Tema (Dark/Light)">
                    <i class="fas fa-moon" id="theme-icon"></i>
                </button>

                <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="flex items-center space-x-2 bg-[#FFF0F5] hover:bg-[#FFD1DC] text-[#C44569] px-4 py-2 rounded-lg transition font-medium border border-[#FFD1DC]">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="hidden md:inline">Logout</span>
                    </button>
                </form>
            </div>
        </header>

        <!-- KONTEN HALAMAN -->
        <main class="flex-1 overflow-y-auto p-6">
            @if(session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-400 text-green-800 p-4 rounded-lg shadow-sm flex items-center">
                    <i class="fas fa-check-circle mr-3 text-green-500"></i> {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 bg-red-50 border-l-4 border-red-400 text-red-800 p-4 rounded-lg shadow-sm flex items-center">
                    <i class="fas fa-exclamation-circle mr-3 text-red-500"></i> {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>

<!-- Overlay untuk Mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-30 z-20 hidden md:hidden backdrop-blur-sm"></div>

<script>
    // 1. Sidebar Mobile Toggle
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('fixed');
            sidebar.classList.toggle('inset-y-0');
            sidebar.classList.toggle('left-0');
            sidebar.classList.toggle('z-30');
            overlay.classList.toggle('hidden');
        });
    }
    if (overlay) {
        overlay.addEventListener('click', () => {
            sidebar.classList.add('hidden');
            sidebar.classList.remove('fixed', 'inset-y-0', 'left-0', 'z-30');
            overlay.classList.add('hidden');
        });
    }

    // 2. 🌟 DARK MODE TOGGLE LOGIC
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon');
    const htmlElement = document.documentElement;

    if (localStorage.getItem('theme') === 'dark') {
        htmlElement.classList.add('dark');
        themeIcon.classList.remove('fa-moon');
        themeIcon.classList.add('fa-sun');
    }

    themeToggleBtn.addEventListener('click', () => {
        htmlElement.classList.toggle('dark');

        if (htmlElement.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
        } else {
            localStorage.setItem('theme', 'light');
            themeIcon.classList.remove('fa-sun');
            themeIcon.classList.add('fa-moon');
        }
    });
</script>
@yield('scripts')
</body>
</html>