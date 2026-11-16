<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - TintaKita Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        :root { 
            --brown-dark: #3E2723; 
            --brown-primary: #5D4037; 
            --brown-medium: #795548; 
            --brown-light: #A1887F; 
            --brown-accent: #D7CCC8; 
            --cream: #EFEBE9; 
            --cream-light: #FAF7F5; 
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--cream-light); }
        ::-webkit-scrollbar-thumb { background: var(--brown-light); border-radius: 3px; }

        .sidebar-link { transition: all 0.25s ease; }
        .sidebar-link:hover {
            background: linear-gradient(90deg, var(--brown-primary) 0%, var(--brown-medium) 100%);
            color: white;
            transform: translateX(4px);
        }
        .sidebar-link.active {
            background: linear-gradient(90deg, var(--brown-primary) 0%, var(--brown-medium) 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(93, 64, 55, 0.3);
        }

        .logo-gradient {
            background: linear-gradient(135deg, var(--brown-dark) 0%, var(--brown-medium) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--brown-primary) 0%, var(--brown-medium) 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--brown-dark) 0%, var(--brown-primary) 100%);
            box-shadow: 0 8px 20px rgba(93, 64, 55, 0.3);
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="bg-[#FAF7F5]">

<div class="flex h-screen overflow-hidden">
    <!-- SIDEBAR -->
    <aside id="sidebar" class="hidden md:flex flex-col w-64 bg-white border-r border-[#D7CCC8] transition-all duration-300">
        <div class="flex items-center justify-center h-20 border-b border-[#D7CCC8] p-4">
            <img src="{{ asset('images/logo-tintakita.png') }}" alt="TintaKita" class="h-12 w-auto">
        </div>
        <nav class="flex-1 overflow-y-auto py-6 px-3 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center px-4 py-3 rounded-xl text-[#5D4037] {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home w-6"></i><span class="font-semibold">Dashboard</span>
            </a>
            <a href="{{ route('admin.umkm.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-xl text-[#5D4037] {{ request()->routeIs('admin.umkm.*') ? 'active' : '' }}">
                <i class="fas fa-store w-6"></i><span class="font-semibold">Website UMKM</span>
            </a>
            <a href="{{ route('admin.produk.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-xl text-[#5D4037] {{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                <i class="fas fa-box w-6"></i><span class="font-semibold">Produk</span>
            </a>
            <a href="{{ route('admin.log.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-xl text-[#5D4037] {{ request()->routeIs('admin.log.*') ? 'active' : '' }}">
                <i class="fas fa-history w-6"></i><span class="font-semibold">Log Aktivitas</span>
            </a>
            <a href="{{ route('admin.profil') }}" class="sidebar-link flex items-center px-4 py-3 rounded-xl text-[#5D4037] {{ request()->routeIs('admin.profil') ? 'active' : '' }}">
                <i class="fas fa-user-cog w-6"></i><span class="font-semibold">Profil Saya</span>
            </a>
        </nav>
        <div class="border-t border-[#D7CCC8] p-4">
            <div class="flex items-center space-x-3">
                @php
                    $currentAdmin = \App\Models\Admin::find(Session::get('admin_id'));
                @endphp
                
                @if($currentAdmin && $currentAdmin->foto)
                    <img src="{{ asset('storage/' . $currentAdmin->foto) }}" class="w-11 h-11 rounded-full object-cover border-2 border-[#D7CCC8]">
                @else
                    <div class="w-11 h-11 rounded-full bg-gradient-to-br from-[#5D4037] to-[#8D6E63] flex items-center justify-center text-white font-bold">
                        {{ substr(Session::get('admin_nama', 'A'), 0, 1) }}
                    </div>
                @endif
                
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold text-[#3E2723] truncate">{{ Session::get('admin_nama', 'Admin') }}</p>
                    <p class="text-xs text-[#795548] truncate">{{ Session::get('admin_username', 'admin') }}</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- TOPBAR -->
        <header class="bg-white border-b border-[#D7CCC8] h-20 flex items-center justify-between px-6">
            <div class="flex items-center space-x-4">
                <button id="toggleSidebar" class="md:hidden text-[#5D4037] hover:text-[#3E2723]">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h2 class="text-xl font-bold text-[#3E2723] font-serif">@yield('page-title', 'Dashboard')</h2>
            </div>
            <div class="flex items-center space-x-4">
                <a href="/" target="_blank" class="hidden md:flex items-center space-x-2 text-[#5D4037] hover:text-[#3E2723] transition">
                    <i class="fas fa-external-link-alt"></i>
                    <span class="font-medium">Lihat Website</span>
                </a>
                <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="flex items-center space-x-2 bg-[#EFEBE9] hover:bg-[#D7CCC8] text-[#3E2723] px-4 py-2 rounded-lg transition font-medium">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="hidden md:inline">Logout</span>
                    </button>
                </form>
            </div>
        </header>

        <!-- KONTEN HALAMAN -->
        <main class="flex-1 overflow-y-auto p-6">
            @if(session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-lg shadow-sm flex items-center">
                    <i class="fas fa-check-circle mr-3 text-green-600"></i> {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-lg shadow-sm flex items-center">
                    <i class="fas fa-exclamation-circle mr-3 text-red-600"></i> {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>

<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden md:hidden"></div>

<script>
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
</script>
@yield('scripts')
</body>
</html>