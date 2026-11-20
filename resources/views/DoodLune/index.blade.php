<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doodlune - Jasa Pembuatan Website UMKM Premium 🌸</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pink: {
                            50: '#FFF5F7', 100: '#FFF0F5', 200: '#FFD1DC', 300: '#FFB6C1',
                            400: '#FF8FAB', 500: '#FF6B9D', 600: '#E85D85', 700: '#C44569',
                            800: '#8B3A52', 900: '#4A3040',
                        }
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'], serif: ['Playfair Display', 'serif'] },
                    animation: { 'float': 'float 6s ease-in-out infinite', 'blob': 'blob 7s infinite' },
                    keyframes: {
                        float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-20px)' } },
                        blob: {
                            '0%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                            '100%': { transform: 'translate(0px, 0px) scale(1)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass { 
            background: rgba(255, 255, 255, 0.85); 
            backdrop-filter: blur(16px); 
            -webkit-backdrop-filter: blur(16px); 
            border: 1px solid rgba(255, 255, 255, 0.8); 
            box-shadow: 0 8px 32px 0 rgba(255, 107, 157, 0.1); 
        }
        .glass-dark { 
            background: rgba(74, 48, 64, 0.85); 
            backdrop-filter: blur(16px); 
            -webkit-backdrop-filter: blur(16px); 
            border: 1px solid rgba(255, 255, 255, 0.2); 
        }
        .glass-white { 
            background: rgba(255, 255, 255, 0.9); 
            backdrop-filter: blur(14px); 
            border: 1px solid rgba(255, 255, 255, 0.5); 
        }
        .glass-card { 
            background: rgba(255, 255, 255, 0.9); 
            backdrop-filter: blur(12px); 
            border: 1px solid rgba(255, 107, 157, 0.3); 
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        .glass-card:hover { 
            transform: translateY(-8px); 
            box-shadow: 0 20px 40px -10px rgba(255, 107, 157, 0.25); 
            border-color: rgba(255, 107, 157, 0.6); 
        }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #FFF5F7; }
        ::-webkit-scrollbar-thumb { background: #FFD1DC; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #FF6B9D; }
    </style>
</head>
<body class="bg-[#FFF5F7] text-[#4A3040] font-sans antialiased overflow-x-hidden">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 glass border-b border-pink-200/50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo-doodlune.jpeg') }}" alt="Doodlune Logo" class="h-12 w-auto drop-shadow-md">
                    <span class="font-serif text-2xl font-bold text-[#4A3040] tracking-tight">Doodlune <span class="text-[#FF6B9D]">🌸</span></span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-[#6D4C41] hover:text-[#FF6B9D] font-medium transition">Beranda</a>
                    <a href="#keunggulan" class="text-[#6D4C41] hover:text-[#FF6B9D] font-medium transition">Keunggulan</a>
                    <a href="#ulasan" class="text-[#6D4C41] hover:text-[#FF6B9D] font-medium transition">Ulasan</a>
                    <a href="#template" class="text-[#6D4C41] hover:text-[#FF6B9D] font-medium transition">Template</a>
                    <a href="https://wa.me/6289519085299" target="_blank" class="bg-[#FF6B9D] hover:bg-[#E85D85] text-white px-6 py-2.5 rounded-full font-semibold transition shadow-lg shadow-pink-500/30 flex items-center gap-2">
                        <i class="fab fa-whatsapp text-lg"></i> Konsultasi
                    </a>
                </div>
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-[#4A3040] hover:text-[#FF6B9D] focus:outline-none"><i class="fas fa-bars text-2xl"></i></button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden glass absolute w-full border-t border-pink-200/50 shadow-xl">
            <div class="px-4 py-6 space-y-4">
                <a href="#home" class="block text-[#4A3040] hover:text-[#FF6B9D] font-medium">Beranda</a>
                <a href="#keunggulan" class="block text-[#4A3040] hover:text-[#FF6B9D] font-medium">Keunggulan</a>
                <a href="#ulasan" class="block text-[#4A3040] hover:text-[#FF6B9D] font-medium">Ulasan</a>
                <a href="#template" class="block text-[#4A3040] hover:text-[#FF6B9D] font-medium">Template</a>
                <a href="https://wa.me/6289519085299" target="_blank" class="block w-full text-center bg-[#FF6B9D] text-white px-5 py-3 rounded-xl font-semibold shadow-md"><i class="fab fa-whatsapp mr-2"></i> Konsultasi via WhatsApp</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative min-h-screen flex items-center pt-20 overflow-hidden">
        @if($heroImage)
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $heroImage }}');"></div>
        @else
            <div class="absolute inset-0 bg-gradient-to-br from-[#8B3A52] via-[#C44569] to-[#4A3040]"></div>
        @endif

        <div class="absolute inset-0 bg-gradient-to-b from-[#4A3040]/90 via-[#4A3040]/70 to-[#FFF5F7]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,rgba(255,107,157,0.3),transparent_50%)]"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-20">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="text-center lg:text-left space-y-8">
                    <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full glass-white text-[#4A3040] text-sm font-semibold shadow-sm">
                        <img src="{{ asset('images/logo-doodlune.jpeg') }}" alt="Logo" class="h-6 w-6 object-contain rounded-full">
                        Doodlune Web Studio
                    </div>
                    <h1 class="font-serif text-5xl md:text-6xl lg:text-7xl font-bold leading-tight text-white drop-shadow-lg">
                        Bangun Website UMKM Lebih <span class="text-[#FFB6C1]">Mudah & Cantik</span>
                    </h1>
                    <p class="text-lg md:text-xl text-pink-100 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                        Temukan template website modern untuk bisnis kamu. Pilih desain, kirim data, dan biarkan <strong class="text-white">Doodlune</strong> menyiapkan website profesional untuk bisnismu.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#template" class="bg-[#FF6B9D] hover:bg-[#E85D85] text-white px-8 py-4 rounded-2xl font-semibold text-lg transition shadow-xl shadow-pink-500/40 transform hover:-translate-y-1 flex items-center justify-center gap-2">
                            Lihat Template <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="https://wa.me/6289519085299" target="_blank" class="glass-white hover:bg-white text-[#4A3040] border-2 border-white/60 px-8 py-4 rounded-2xl font-semibold text-lg transition flex items-center justify-center gap-2">
                            <i class="fab fa-whatsapp text-[#25D366] text-xl"></i> Chat Admin
                        </a>
                    </div>
                </div>

                <div class="relative flex justify-center lg:justify-end">
                    <div class="glass-dark p-4 md:p-5 rounded-[2rem] relative overflow-hidden group animate-float border border-white/30 shadow-2xl w-full max-w-md">
                        <div class="flex items-center gap-2 px-3 py-2 mb-3 rounded-xl bg-white/10">
                            <div class="flex space-x-1.5">
                                <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-yellow-400"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-green-400"></span>
                            </div>
                            <div class="flex-1 text-center text-xs text-pink-100 font-medium">doodlune.id/website/toko-saya</div>
                        </div>
                        <div class="rounded-2xl overflow-hidden bg-gradient-to-br from-[#FF6B9D] to-[#C44569] p-8 text-white">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center text-3xl font-bold">🌸</div>
                                <div>
                                    <h3 class="font-serif text-2xl font-bold">Toko Contoh</h3>
                                    <p class="text-sm text-pink-100">Website UMKM Profesional</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-3">
                                <div class="bg-white/15 backdrop-blur rounded-xl p-3 text-center">
                                    <p class="text-2xl font-bold">{{ $totalAktif ?? 0 }}</p>
                                    <p class="text-[10px] uppercase tracking-wider text-pink-100">Website</p>
                                </div>
                                <div class="bg-white/15 backdrop-blur rounded-xl p-3 text-center">
                                    <p class="text-2xl font-bold">{{ $totalProduk ?? 0 }}</p>
                                    <p class="text-[10px] uppercase tracking-wider text-pink-100">Produk</p>
                                </div>
                                <div class="bg-white/15 backdrop-blur rounded-xl p-3 text-center">
                                    <p class="text-2xl font-bold">4.9</p>
                                    <p class="text-[10px] uppercase tracking-wider text-pink-100">Rating</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Bar -->
    <div class="max-w-6xl mx-auto px-4 relative z-20 -mt-10 mb-16">
        <div class="glass rounded-2xl p-6 md:p-8 grid grid-cols-2 md:grid-cols-4 gap-6 text-center border border-pink-200 shadow-xl">
            <div>
                <p class="text-3xl md:text-4xl font-bold text-[#FF6B9D] font-serif">{{ $totalUmkm ?? 0 }}+</p>
                <p class="text-sm text-[#6D4C41] font-medium mt-1">UMKM Terbantu</p>
            </div>
            <div>
                <p class="text-3xl md:text-4xl font-bold text-[#FF6B9D] font-serif">4.9/5</p>
                <p class="text-sm text-[#6D4C41] font-medium mt-1 flex items-center justify-center gap-1">Rating <i class="fas fa-star text-yellow-400 text-xs"></i></p>
            </div>
            <div>
                <p class="text-3xl md:text-4xl font-bold text-[#FF6B9D] font-serif">24/7</p>
                <p class="text-sm text-[#6D4C41] font-medium mt-1">Dukungan Admin</p>
            </div>
            <div>
                <p class="text-3xl md:text-4xl font-bold text-[#FF6B9D] font-serif">100%</p>
                <p class="text-sm text-[#6D4C41] font-medium mt-1">Aman & Terpercaya</p>
            </div>
        </div>
    </div>

    <!-- Keunggulan -->
    <section id="keunggulan" class="py-12 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-[#FF6B9D] font-semibold text-sm uppercase tracking-wider">Mengapa Doodlune?</span>
                <h2 class="font-serif text-4xl md:text-5xl font-bold text-[#4A3040] mt-3 mb-4">Solusi All-in-One untuk UMKM</h2>
                <p class="text-lg text-[#6D4C41]">Kami menghilangkan kerumitan teknis, sehingga Anda bisa fokus mengembangkan bisnis.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="glass-card p-8 rounded-3xl group">
                    <div class="w-16 h-16 bg-pink-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-[#FF6B9D] transition-all duration-300">
                        <i class="fas fa-palette text-2xl text-[#FF6B9D] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-[#4A3040] mb-3">Template Premium</h3>
                    <p class="text-[#6D4C41] leading-relaxed">Desain modern dan responsif yang dioptimalkan untuk konversi penjualan di semua perangkat.</p>
                </div>
                <div class="glass-card p-8 rounded-3xl group">
                    <div class="w-16 h-16 bg-pink-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-[#FF6B9D] transition-all duration-300">
                        <i class="fas fa-user-shield text-2xl text-[#FF6B9D] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-[#4A3040] mb-3">Dikelola Penuh</h3>
                    <p class="text-[#6D4C41] leading-relaxed">Tidak perlu pusing update konten atau teknis. Tim kami yang mengerjakan semuanya untuk Anda.</p>
                </div>
                <div class="glass-card p-8 rounded-3xl group">
                    <div class="w-16 h-16 bg-pink-100 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-[#FF6B9D] transition-all duration-300">
                        <i class="fas fa-bolt text-2xl text-[#FF6B9D] group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-serif text-xl font-bold text-[#4A3040] mb-3">Proses Super Cepat</h3>
                    <p class="text-[#6D4C41] leading-relaxed">Kirim data UMKM Anda, dan website profesional akan siap online dalam waktu singkat.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 🌟 ULASAN + FORM INPUT (SUDANG DIPERBAIKI DENGAN ERROR VALIDATION) -->
    <section id="ulasan" class="py-24 bg-[#FFF5F7] relative overflow-hidden">
        <div class="absolute top-0 left-0 w-96 h-96 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-[#FF6B9D] font-semibold text-sm uppercase tracking-wider">Testimoni Klien</span>
                <h2 class="font-serif text-4xl md:text-5xl font-bold text-[#4A3040] mt-3 mb-4">Apa Kata Mereka Tentang Doodlune? 💬</h2>
                <div class="flex items-center justify-center gap-2 mb-4">
                    <div class="flex text-yellow-400 text-xl">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <span class="font-bold text-[#4A3040] text-lg">4.9 dari 5.0</span>
                    <span class="text-[#6D4C41] text-sm">(Berdasarkan {{ count($ulasanList) }} ulasan)</span>
                </div>
            </div>

            <!-- Daftar Ulasan -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                @foreach($ulasanList as $t)
                <div class="glass-card p-8 rounded-3xl relative group">
                    <i class="fas fa-quote-right text-4xl absolute top-6 right-6 text-pink-200 group-hover:text-pink-300 transition"></i>
                    <div class="flex text-yellow-400 text-sm mb-4">
                        @for($i = 0; $i < ($t['rating'] ?? 5); $i++)<i class="fas fa-star"></i>@endfor
                    </div>
                    <p class="text-[#4A3040] font-medium mb-6 leading-relaxed">"{{ $t['pesan'] }}"</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#FF6B9D] to-[#C44569] flex items-center justify-center text-white font-bold text-lg shadow-md">
                            {{ substr($t['nama'], 0, 1) }}
                        </div>
                        <div>
                            <p class="font-bold text-[#4A3040]">{{ $t['nama'] }}</p>
                            <p class="text-xs text-[#FF6B9D] font-semibold">{{ $t['usaha'] ?? 'Pelanggan Doodlune' }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- 🌟 FORM INPUT ULASAN BARU (SUDAH ADA ERROR VALIDATION) -->
            <div class="max-w-2xl mx-auto glass-card p-8 md:p-10 rounded-3xl shadow-xl border-2 border-pink-100">
                <h3 class="font-serif text-2xl font-bold text-center mb-2 text-[#4A3040]">Bagikan Pengalamanmu ✍️</h3>
                <p class="text-center mb-6 text-[#6D4C41]">Sudah pakai jasa Doodlune? Yuk, tinggalkan ulasanmu di sini!</p>

                {{-- NOTIF SUKSES --}}
                @if(session('success_ulasan'))
                    <div class="mb-6 bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-xl text-sm flex items-center">
                        <i class="fas fa-check-circle mr-3 text-lg"></i> {{ session('success_ulasan') }}
                    </div>
                @endif

                {{-- 🌟 TAMPILKAN ERROR VALIDASI (INI YANG TADI HILANG!) --}}
                @if($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-xl text-sm">
                        <strong><i class="fas fa-exclamation-circle mr-2"></i>Periksa kembali isianmu:</strong>
                        <ul class="list-disc ml-6 mt-2">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('ulasan.store') }}" method="POST" class="space-y-5">
                    @csrf  {{-- ⚠️ WAJIB! Tanpa ini Laravel tolak dengan error 419 --}}

                    <div>
                        <label class="block text-sm font-bold text-[#4A3040] mb-2">Nama Kamu</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" required
                            class="w-full px-5 py-3 rounded-xl border border-pink-200 focus:outline-none focus:ring-2 focus:ring-[#FF6B9D] bg-white text-[#4A3040] placeholder-[#C44569]"
                            placeholder="Contoh: Budi Santoso">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-[#4A3040] mb-2">Rating</label>
                        <select name="rating" required class="w-full px-5 py-3 rounded-xl border border-pink-200 focus:outline-none focus:ring-2 focus:ring-[#FF6B9D] bg-white text-[#4A3040]">
                            <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (Sangat Puas)</option>
                            <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (Puas)</option>
                            <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>⭐⭐⭐ (Cukup)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-[#4A3040] mb-2">
                            Ulasan Kamu <span class="text-red-500 text-xs">(min. 10 karakter)</span>
                        </label>
                        <textarea name="pesan" rows="4" required
                            class="w-full px-5 py-3 rounded-xl border border-pink-200 focus:outline-none focus:ring-2 focus:ring-[#FF6B9D] bg-white text-[#4A3040] placeholder-[#C44569] resize-none"
                            placeholder="Ceritakan pengalamanmu menggunakan Doodlune...">{{ old('pesan') }}</textarea>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-xl font-bold text-white text-lg bg-[#FF6B9D] hover:bg-[#E85D85] transition shadow-lg shadow-pink-500/30 transform hover:-translate-y-1">
                        <i class="fas fa-paper-plane mr-2"></i> Kirim Ulasan
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Template -->
    <section id="template" class="py-24 bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-pink-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-[#FF6B9D] font-semibold text-sm uppercase tracking-wider">Pilihan Desain</span>
                <h2 class="font-serif text-4xl md:text-5xl font-bold text-[#4A3040] mt-3 mb-4">Template Premium Kami</h2>
                <p class="text-lg text-[#6D4C41]">Pilih desain yang paling mencerminkan karakter dan identitas bisnis UMKM Anda.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($templates as $tpl)
                <div class="glass-card rounded-3xl overflow-hidden flex flex-col group">
                    <div class="h-48 bg-gradient-to-br {{ $tpl['color'] }} flex items-center justify-center relative overflow-hidden">
                        <i class="fas fa-laptop-code text-5xl text-white/90 group-hover:scale-110 transition-transform duration-500 drop-shadow-md"></i>
                        <div class="absolute top-4 right-4 glass px-3 py-1.5 rounded-full shadow-sm"><span class="text-xs font-bold text-[#4A3040]">Premium</span></div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="font-serif text-lg font-bold text-[#4A3040] mb-2">{{ $tpl['name'] }}</h3>
                        <p class="text-[#6D4C41] text-sm mb-6 flex-1">{{ $tpl['desc'] }}</p>
                        <div class="flex gap-3 mt-auto">
                            <a href="{{ url('/templates/' . $tpl['id']) }}" class="flex-1 text-center border border-pink-200 text-[#4A3040] px-4 py-2.5 rounded-xl font-medium hover:bg-pink-50 transition text-sm">Detail</a>
                            <a href="https://wa.me/6289519085299" target="_blank" class="flex-1 text-center bg-[#FF6B9D] text-white px-4 py-2.5 rounded-xl font-medium hover:bg-[#E85D85] transition text-sm shadow-md">Pesan</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Cara Kerja -->
    <section id="cara-kerja" class="py-24 bg-[#FFF5F7]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-[#FF6B9D] font-semibold text-sm uppercase tracking-wider">Alur Sederhana</span>
                <h2 class="font-serif text-4xl md:text-5xl font-bold text-[#4A3040] mt-3 mb-4">Cara Kerja Doodlune</h2>
                <p class="text-lg text-[#6D4C41]">Hanya 6 langkah mudah untuk memiliki website profesional.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $steps = [
                        ['icon' => 'fa-mouse-pointer', 'title' => 'Pilih Template', 'desc' => 'Jelajahi dan pilih desain yang sesuai dengan brand Anda.'],
                        ['icon' => 'fa-whatsapp', 'title' => 'Hubungi Admin', 'desc' => 'Klik pesan dan konsultasi langsung via WhatsApp.'],
                        ['icon' => 'fa-file-alt', 'title' => 'Kirim Data UMKM', 'desc' => 'Berikan data toko, deskripsi, dan daftar produk.'],
                        ['icon' => 'fa-cogs', 'title' => 'Kami Mengerjakan', 'desc' => 'Tim Doodlune menyusun website sesuai data Anda.'],
                        ['icon' => 'fa-eye', 'title' => 'Preview & Revisi', 'desc' => 'Cek hasil jadi dan minta revisi jika diperlukan.'],
                        ['icon' => 'fa-rocket', 'title' => 'Website Live!', 'desc' => 'Terima link website dan bagikan ke pelanggan.']
                    ];
                @endphp
                @foreach($steps as $index => $step)
                <div class="relative p-6 glass-card rounded-3xl group bg-white">
                    <div class="absolute top-6 right-6 font-serif text-4xl font-bold text-pink-100 group-hover:text-pink-200 transition">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-pink-100 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 group-hover:bg-[#FF6B9D] transition-all duration-300">
                            <i class="fas {{ $step['icon'] }} text-xl text-[#FF6B9D] group-hover:text-white transition-colors"></i>
                        </div>
                        <h3 class="font-serif text-lg font-bold text-[#4A3040] mb-2">{{ $step['title'] }}</h3>
                        <p class="text-[#6D4C41] text-sm leading-relaxed">{{ $step['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-24 bg-gradient-to-br from-[#FF6B9D] to-[#8B3A52] relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h2 class="font-serif text-4xl md:text-5xl font-bold text-white mb-6">Siap Mengembangkan Bisnis Anda?</h2>
            <p class="text-xl text-pink-100 mb-10 max-w-2xl mx-auto">Jangan biarkan bisnis Anda tertinggal. Miliki website profesional dan tingkatkan kredibilitas mulai hari ini.</p>
            <a href="https://wa.me/6289519085299" target="_blank" class="inline-flex items-center gap-3 bg-white text-[#4A3040] px-8 py-4 rounded-full font-bold text-lg hover:bg-pink-50 transition shadow-2xl transform hover:scale-105">
                <i class="fab fa-whatsapp text-2xl text-[#25D366]"></i> Mulai Konsultasi Gratis
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#4A3040] text-pink-200 py-16 border-t border-[#8B3A52]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <div class="md:col-span-1">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="h-12 w-12 bg-white rounded-xl p-1.5 shadow-lg flex items-center justify-center">
                            <img src="{{ asset('images/logo-doodlune.jpeg') }}" alt="Doodlune Logo" class="w-full h-full object-contain">
                        </div>
                        <span class="font-serif text-xl font-bold text-white tracking-wide">Doodlune</span>
                    </div>
                    <p class="text-sm leading-relaxed text-pink-300">Platform penyedia dan pengelola website UMKM berbasis template modern untuk bisnis Indonesia.</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4 font-serif">Navigasi</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#home" class="hover:text-[#FF6B9D] transition">Beranda</a></li>
                        <li><a href="#keunggulan" class="hover:text-[#FF6B9D] transition">Keunggulan</a></li>
                        <li><a href="#ulasan" class="hover:text-[#FF6B9D] transition">Ulasan</a></li>
                        <li><a href="#template" class="hover:text-[#FF6B9D] transition">Template</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4 font-serif">Kontak</h4>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-center gap-3">
                            <i class="fab fa-whatsapp text-[#25D366] w-5 text-lg"></i> 
                            <span>0895-1908-5299</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fab fa-instagram text-[#FF6B9D] w-5 text-lg"></i> 
                            <span>@doodlune.id</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4 font-serif">Admin Area</h4>
                    <a href="{{ route('admin.login') }}" class="inline-flex items-center gap-2 text-sm glass-dark text-white px-4 py-2.5 rounded-xl transition hover:bg-[#8B3A52] border border-white/20">
                        <i class="fas fa-lock"></i> Login Dashboard
                    </a>
                </div>
            </div>
            <div class="border-t border-[#8B3A52] pt-8 text-center text-sm text-pink-300">
                <p>&copy; {{ date('Y') }} Doodlune. All rights reserved. Dibuat dengan 💖 oleh Maharani.</p>
            </div>
        </div>
    </footer>

    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        if(btn && menu) { btn.addEventListener('click', () => menu.classList.toggle('hidden')); }
    </script>
</body>
</html>