<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TintaKita - Jasa Pembuatan Website Stationery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brown: {
                            50: '#FAF7F5',
                            100: '#EFEBE9',
                            200: '#D7CCC8',
                            300: '#BCAAA4',
                            400: '#A1887F',
                            500: '#8D6E63',
                            600: '#795548',
                            700: '#5D4037',
                            800: '#4E342E',
                            900: '#3E2723',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .glass-nav {
            background: rgba(250, 247, 245, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .hero-pattern {
            background-image: radial-gradient(#D7CCC8 1px, transparent 1px);
            background-size: 24px 24px;
        }
        .text-gradient {
            background: linear-gradient(135deg, #5D4037 0%, #8D6E63 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -10px rgba(93, 64, 55, 0.2);
        }
    </style>
</head>
<body class="bg-brown-50 text-brown-900 font-sans antialiased">

    <!-- Navbar dengan Logo + Tulisan TintaKita -->
    <nav class="fixed w-full z-50 glass-nav border-b border-brown-200 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo + Tulisan TintaKita -->
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo-tintakita.png') }}" alt="TintaKita Logo" class="h-12 w-auto">
                    <span class="font-serif text-2xl font-bold text-brown-900 tracking-tight">TintaKita</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-brown-700 hover:text-brown-900 font-medium transition">Beranda</a>
                    <a href="#keunggulan" class="text-brown-700 hover:text-brown-900 font-medium transition">Keunggulan</a>
                    <a href="#template" class="text-brown-700 hover:text-brown-900 font-medium transition">Template</a>
                    <a href="#cara-kerja" class="text-brown-700 hover:text-brown-900 font-medium transition">Cara Kerja</a>
                    <a href="https://wa.me/6289519085299" target="_blank" class="bg-brown-700 hover:bg-brown-800 text-white px-6 py-2.5 rounded-full font-semibold transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center gap-2">
                        <i class="fab fa-whatsapp text-lg"></i> Konsultasi
                    </a>
                </div>
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-brown-700 hover:text-brown-900 focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-brown-50 border-t border-brown-200 absolute w-full shadow-lg">
            <div class="px-4 py-6 space-y-4">
                <a href="#home" class="block text-brown-700 hover:text-brown-900 font-medium">Beranda</a>
                <a href="#keunggulan" class="block text-brown-700 hover:text-brown-900 font-medium">Keunggulan</a>
                <a href="#template" class="block text-brown-700 hover:text-brown-900 font-medium">Template</a>
                <a href="#cara-kerja" class="block text-brown-700 hover:text-brown-900 font-medium">Cara Kerja</a>
                <a href="https://wa.me/6289519085299" target="_blank" class="block w-full text-center bg-brown-700 text-white px-5 py-3 rounded-xl font-semibold">
                    <i class="fab fa-whatsapp mr-2"></i> Konsultasi via WhatsApp
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative pt-32 pb-20 md:pt-40 md:pb-28 overflow-hidden">
        <div class="absolute inset-0 hero-pattern opacity-40"></div>
        <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-brown-100/50 to-transparent rounded-full blur-3xl -z-10"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="text-center lg:text-left space-y-8">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brown-100 border border-brown-200 text-brown-700 text-sm font-semibold">
                        <span class="flex h-2 w-2 rounded-full bg-brown-600 animate-pulse"></span>
                        Solusi Website UMKM #1 di Indonesia
                    </div>
                    <h1 class="font-serif text-5xl md:text-6xl lg:text-7xl font-bold leading-tight text-brown-900">
                        Bangun Website UMKM Lebih <span class="text-gradient">Mudah & Elegan</span>
                    </h1>
                    <p class="text-lg md:text-xl text-brown-600 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                        Temukan template website modern untuk bisnis kamu. Pilih desain, kirim data, dan biarkan TintaKita menyiapkan website profesional untuk bisnismu.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#template" class="bg-brown-700 hover:bg-brown-800 text-white px-8 py-4 rounded-xl font-semibold text-lg transition shadow-xl hover:shadow-2xl transform hover:-translate-y-1 flex items-center justify-center gap-2">
                            Lihat Template <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="https://wa.me/6289519085299" target="_blank" class="bg-white hover:bg-brown-50 text-brown-800 border-2 border-brown-200 px-8 py-4 rounded-xl font-semibold text-lg transition flex items-center justify-center gap-2">
                            <i class="fab fa-whatsapp text-green-600 text-xl"></i> Chat Admin
                        </a>
                    </div>
                </div>

                <!-- Mockup Browser -->
                <div class="relative lg:pl-8">
                    <div class="absolute -inset-4 bg-gradient-to-r from-brown-200 to-brown-100 rounded-3xl blur-2xl opacity-50"></div>
                    <div class="relative bg-white rounded-2xl shadow-2xl border border-brown-200 overflow-hidden card-hover">
                        <div class="bg-brown-100 px-4 py-3 border-b border-brown-200 flex items-center space-x-2">
                            <div class="flex space-x-1.5">
                                <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                                <div class="w-3 h-3 rounded-full bg-green-400"></div>
                            </div>
                            <div class="ml-4 bg-white px-4 py-1 rounded-md text-xs text-brown-600 flex-1 text-center border border-brown-200 shadow-sm">
                                <i class="fas fa-lock text-[10px] mr-1 text-green-600"></i> tintakita.com/website/toko-jaya
                            </div>
                        </div>
                        <div class="p-8 bg-gradient-to-br from-brown-50 to-white min-h-[400px] flex items-center justify-center">
                            <div class="text-center space-y-6">
                                <div class="w-20 h-20 bg-gradient-to-br from-brown-700 to-brown-500 rounded-2xl flex items-center justify-center mx-auto shadow-xl">
                                    <i class="fas fa-store text-white text-3xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-serif text-2xl font-bold text-brown-900 mb-2">Toko Jaya Stationery</h3>
                                    <p class="text-brown-600 text-sm max-w-xs mx-auto">Website UMKM profesional dengan katalog produk dan integrasi WhatsApp.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Keunggulan Section -->
    <section id="keunggulan" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-brown-600 font-semibold text-sm uppercase tracking-wider">Mengapa TintaKita?</span>
                <h2 class="font-serif text-4xl md:text-5xl font-bold text-brown-900 mt-3 mb-4">Solusi All-in-One untuk UMKM</h2>
                <p class="text-lg text-brown-600">Kami menghilangkan kerumitan teknis, sehingga Anda bisa fokus mengembangkan bisnis.</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-8 rounded-2xl bg-brown-50 border border-brown-100 card-hover group">
                    <div class="w-14 h-14 bg-white rounded-xl shadow-sm border border-brown-200 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-palette text-2xl text-brown-700"></i>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-brown-900 mb-3">Template Premium</h3>
                    <p class="text-brown-600 leading-relaxed">Desain modern dan responsif yang dioptimalkan untuk konversi penjualan di semua perangkat.</p>
                </div>
                <div class="p-8 rounded-2xl bg-brown-50 border border-brown-100 card-hover group">
                    <div class="w-14 h-14 bg-white rounded-xl shadow-sm border border-brown-200 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-user-shield text-2xl text-brown-700"></i>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-brown-900 mb-3">Dikelola Penuh</h3>
                    <p class="text-brown-600 leading-relaxed">Tidak perlu pusing update konten atau teknis. Tim kami yang mengerjakan semuanya untuk Anda.</p>
                </div>
                <div class="p-8 rounded-2xl bg-brown-50 border border-brown-100 card-hover group">
                    <div class="w-14 h-14 bg-white rounded-xl shadow-sm border border-brown-200 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-bolt text-2xl text-brown-700"></i>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-brown-900 mb-3">Proses Super Cepat</h3>
                    <p class="text-brown-600 leading-relaxed">Kirim data UMKM Anda, dan website profesional akan siap online dalam waktu singkat.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Template Section -->
    <section id="template" class="py-24 bg-brown-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-brown-600 font-semibold text-sm uppercase tracking-wider">Pilihan Desain</span>
                <h2 class="font-serif text-4xl md:text-5xl font-bold text-brown-900 mt-3 mb-4">Template Premium Kami</h2>
                <p class="text-lg text-brown-600">Pilih desain yang paling mencerminkan karakter dan identitas bisnis UMKM Anda.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $templates = [
                        ['id' => 'template-1', 'name' => 'Modern Minimalis', 'color' => 'from-brown-700 to-brown-500', 'desc' => 'Desain bersih, profesional, dan fokus pada produk.'],
                        ['id' => 'template-2', 'name' => 'Klasik Elegan', 'color' => 'from-brown-600 to-brown-400', 'desc' => 'Sentuhan warna alam dan tata letak yang rapi.'],
                        ['id' => 'template-3', 'name' => 'Ceria & Hangat', 'color' => 'from-brown-500 to-brown-300', 'desc' => 'Tampilan energik dan hangat.'],
                        ['id' => 'template-4', 'name' => 'Eksklusif Mewah', 'color' => 'from-brown-800 to-brown-600', 'desc' => 'Tampilan mewah dengan aksen elegan.']
                    ];
                @endphp

                @foreach($templates as $tpl)
                <div class="bg-white rounded-2xl shadow-sm border border-brown-100 overflow-hidden card-hover flex flex-col">
                    <div class="h-48 bg-gradient-to-br {{ $tpl['color'] }} flex items-center justify-center relative overflow-hidden">
                        <i class="fas fa-laptop-code text-5xl text-white/80"></i>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-brown-800 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                            Premium
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="font-serif text-lg font-bold text-brown-900 mb-2">{{ $tpl['name'] }}</h3>
                        <p class="text-brown-600 text-sm mb-6 flex-1">{{ $tpl['desc'] }}</p>
                        <div class="flex gap-3 mt-auto">
                            <a href="{{ url('/templates/' . $tpl['id']) }}" 
                               class="flex-1 text-center border border-brown-200 text-brown-700 px-4 py-2.5 rounded-xl font-medium hover:bg-brown-50 transition text-sm">
                                Detail
                            </a>
                            <a href="https://wa.me/6289519085299" target="_blank" 
                               class="flex-1 text-center bg-brown-700 text-white px-4 py-2.5 rounded-xl font-medium hover:bg-brown-800 transition text-sm">
                                Pesan
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Cara Kerja Section -->
    <section id="cara-kerja" class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-brown-600 font-semibold text-sm uppercase tracking-wider">Alur Sederhana</span>
                <h2 class="font-serif text-4xl md:text-5xl font-bold text-brown-900 mt-3 mb-4">Cara Kerja TintaKita</h2>
                <p class="text-lg text-brown-600">Hanya 6 langkah mudah untuk memiliki website profesional.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $steps = [
                        ['icon' => 'fa-mouse-pointer', 'title' => 'Pilih Template', 'desc' => 'Jelajahi dan pilih desain yang sesuai dengan brand Anda.'],
                        ['icon' => 'fa-whatsapp', 'title' => 'Hubungi Admin', 'desc' => 'Klik pesan dan konsultasi langsung via WhatsApp.'],
                        ['icon' => 'fa-file-alt', 'title' => 'Kirim Data UMKM', 'desc' => 'Berikan data toko, deskripsi, dan daftar produk.'],
                        ['icon' => 'fa-cogs', 'title' => 'Kami Mengerjakan', 'desc' => 'Tim TintaKita menyusun website sesuai data Anda.'],
                        ['icon' => 'fa-eye', 'title' => 'Preview & Revisi', 'desc' => 'Cek hasil jadi dan minta revisi jika diperlukan.'],
                        ['icon' => 'fa-rocket', 'title' => 'Website Live!', 'desc' => 'Terima link website dan bagikan ke pelanggan.']
                    ];
                @endphp
                @foreach($steps as $index => $step)
                <div class="relative p-6 bg-brown-50 rounded-2xl border border-brown-100 hover:border-brown-300 hover:bg-white transition group">
                    <div class="absolute top-6 right-6 font-serif text-4xl font-bold text-brown-200 group-hover:text-brown-100 transition">
                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                    </div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-white rounded-xl shadow-sm border border-brown-200 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <i class="fas {{ $step['icon'] }} text-xl text-brown-700"></i>
                        </div>
                        <h3 class="font-serif text-lg font-bold text-brown-900 mb-2">{{ $step['title'] }}</h3>
                        <p class="text-brown-600 text-sm leading-relaxed">{{ $step['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-gradient-to-br from-brown-800 to-brown-900 relative overflow-hidden">
        <div class="absolute inset-0 hero-pattern opacity-10"></div>
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h2 class="font-serif text-4xl md:text-5xl font-bold text-white mb-6">Siap Mengembangkan Bisnis Anda?</h2>
            <p class="text-xl text-brown-200 mb-10 max-w-2xl mx-auto">Jangan biarkan bisnis Anda tertinggal. Miliki website profesional dan tingkatkan kredibilitas mulai hari ini.</p>
            <a href="https://wa.me/6289519085299" target="_blank" 
               class="inline-flex items-center gap-3 bg-white text-brown-900 px-8 py-4 rounded-full font-bold text-lg hover:bg-brown-50 transition shadow-2xl transform hover:scale-105">
                <i class="fab fa-whatsapp text-2xl text-green-600"></i> Mulai Konsultasi Gratis
            </a>
        </div>
    </section>

    <!-- Footer dengan Logo + Tulisan -->
    <footer class="bg-brown-900 text-brown-300 py-16 border-t border-brown-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <div class="md:col-span-1">
                    <!-- Logo + Tulisan TintaKita di Footer -->
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('images/logo-tintakita.png') }}" alt="TintaKita" class="h-12 w-auto brightness-0 invert">
                        <span class="font-serif text-xl font-bold text-white">TintaKita</span>
                    </div>
                    <p class="text-sm leading-relaxed">Platform penyedia dan pengelola website UMKM berbasis template modern untuk bisnis Indonesia.</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4 font-serif">Navigasi</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#home" class="hover:text-white transition">Beranda</a></li>
                        <li><a href="#keunggulan" class="hover:text-white transition">Keunggulan</a></li>
                        <li><a href="#template" class="hover:text-white transition">Template</a></li>
                        <li><a href="#cara-kerja" class="hover:text-white transition">Cara Kerja</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4 font-serif">Kontak</h4>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-center gap-3"><i class="fab fa-whatsapp text-green-500 w-5"></i> 0895-1908-5299</li>
                        <li class="flex items-center gap-3"><i class="fab fa-instagram text-pink-500 w-5"></i> @tintakita.id</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4 font-serif">Admin Area</h4>
                    <a href="{{ route('admin.login') }}" class="inline-flex items-center gap-2 text-sm bg-brown-800 hover:bg-brown-700 text-white px-4 py-2.5 rounded-lg transition border border-brown-700">
                        <i class="fas fa-lock"></i> Login Dashboard
                    </a>
                </div>
            </div>
            <div class="border-t border-brown-800 pt-8 text-center text-sm">
                <p>&copy; {{ date('Y') }} TintaKita. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        if(btn && menu) {
            btn.addEventListener('click', () => menu.classList.toggle('hidden'));
        }
    </script>
</body>
</html>