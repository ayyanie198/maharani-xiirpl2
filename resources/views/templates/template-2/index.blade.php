@extends('layouts.public')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap');
    
    :root {
        /* PALET BIRU LIQUID GLASS */
        --primary: #3B82F6; 
        --primary-dark: #1E40AF;
        --secondary: #0EA5E9; 
        --accent: #DBEAFE;
        --bg: #F0F9FF; 
        --text: #0C1B33; 
        --text-light: #475569;
        --glass: rgba(255, 255, 255, 0.65);
        --glass-border: rgba(255, 255, 255, 0.4);
    }

    body { 
        font-family: 'Inter', sans-serif; 
        color: var(--text); 
        background: var(--bg); 
        scroll-behavior: smooth; 
        overflow-x: hidden;
    }
    .font-heading { font-family: 'Plus Jakarta Sans', sans-serif; }

    /* === LIQUID GLASS EFFECTS === */
    .glass-nav {
        background: rgba(240, 249, 255, 0.75);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(59, 130, 246, 0.15);
    }
    .glass-card {
        background: var(--glass);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid var(--glass-border);
        box-shadow: 0 8px 32px rgba(59, 130, 246, 0.12);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .glass-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px -10px rgba(59, 130, 246, 0.25);
        border-color: rgba(59, 130, 246, 0.3);
    }
    .glass-input {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(59, 130, 246, 0.2);
        transition: all 0.3s;
    }
    .glass-input:focus {
        background: white;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        outline: none;
    }

    /* Buttons */
    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        color: white;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.35);
    }
    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.45);
    }
    .btn-outline {
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(10px);
        border: 1.5px solid var(--primary);
        color: var(--primary);
        transition: all 0.3s;
    }
    .btn-outline:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
    }

    /* Divider */
    .divider {
        width: 70px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        margin: 0 auto;
        border-radius: 2px;
    }

    /* === ANIMASI === */
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(2deg); }
    }
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }
    @keyframes shimmer {
        0% { background-position: -200% center; }
        100% { background-position: 200% center; }
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-float { animation: float 6s ease-in-out infinite; }
    .animate-blob { animation: blob 8s infinite; }
    .fade-in-up { animation: fadeInUp 0.8s ease-out forwards; opacity: 0; }
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }

    .text-gradient {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 50%, var(--primary-dark) 100%);
        background-size: 200% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: shimmer 3s linear infinite;
    }

    .card img { transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1); }
    .card:hover img { transform: scale(1.08); }
</style>

<!-- Background Blob Animasi Global -->
<div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
    <div class="absolute top-20 left-10 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
    <div class="absolute top-40 right-10 w-72 h-72 bg-cyan-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob" style="animation-delay: 2s;"></div>
    <div class="absolute bottom-20 left-1/2 w-96 h-96 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob" style="animation-delay: 4s;"></div>
</div>

<!-- Navbar Glass -->
<nav class="glass-nav sticky top-0 z-50 py-4">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
        <a href="#" class="font-heading text-2xl md:text-3xl font-extrabold flex items-center gap-2 text-gradient">
            <i class="fas fa-cube text-primary"></i> {{ $umkm->nama_toko }}
        </a>
        <div class="hidden md:flex space-x-8">
            <a href="#home" class="text-sm font-semibold text-slate-700 hover:text-[var(--primary)] transition">Beranda</a>
            <a href="#tentang" class="text-sm font-semibold text-slate-700 hover:text-[var(--primary)] transition">Tentang</a>
            <a href="#produk" class="text-sm font-semibold text-slate-700 hover:text-[var(--primary)] transition">Produk</a>
            <a href="#testimoni" class="text-sm font-semibold text-slate-700 hover:text-[var(--primary)] transition">Testimoni</a>
            <a href="#kontak" class="text-sm font-semibold text-slate-700 hover:text-[var(--primary)] transition">Kontak</a>
        </div>
        @php $waUrl = str_contains($umkm->no_hp ?? '', 'wa.me') ? $umkm->no_hp : 'https://wa.me/' . preg_replace('/^0/', '62', $umkm->no_hp ?? ''); @endphp
        <a href="{{ $waUrl }}" target="_blank" class="btn-primary px-5 py-2.5 rounded-full text-sm font-bold flex items-center gap-2">
            <i class="fab fa-whatsapp text-lg"></i> Pesan
        </a>
    </div>
</nav>

<!-- Hero Section -->
<section id="home" class="py-24 md:py-32 relative">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
        <div class="space-y-7 fade-in-up">
            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider glass-card">
                <span class="w-2 h-2 bg-[var(--primary)] rounded-full animate-pulse"></span>
                Official Website
            </span>
            <h1 class="font-heading text-5xl md:text-6xl lg:text-7xl font-extrabold leading-[1.1] text-gradient">
                {{ $umkm->nama_toko }}
            </h1>
            <p class="text-lg md:text-xl leading-relaxed text-slate-600">
                {{ $umkm->deskripsi ?? 'Solusi digital modern untuk kebutuhan bisnis Anda dengan kualitas premium dan pelayanan terbaik.' }}
            </p>
            <div class="flex flex-wrap gap-4 pt-2">
                <a href="#produk" class="btn-primary px-8 py-4 rounded-2xl font-bold text-lg">
                    <i class="fas fa-box-open mr-2"></i> Lihat Koleksi
                </a>
                <a href="#tentang" class="btn-outline px-8 py-4 rounded-2xl font-bold text-lg">
                    <i class="fas fa-info-circle mr-2"></i> Tentang Kami
                </a>
            </div>
        </div>
        <div class="relative fade-in-up delay-200">
            <div class="absolute -inset-6 rounded-[2.5rem] bg-gradient-to-br from-[var(--primary)] to-[var(--secondary)] opacity-20 blur-3xl animate-float"></div>
            <div class="relative glass-card rounded-[2rem] p-3 animate-float">
                @if($umkm->foto_hero)
                    <img src="{{ asset('storage/' . $umkm->foto_hero) }}" class="w-full h-[400px] md:h-[500px] object-cover rounded-[1.5rem]">
                @else
                    <div class="w-full h-[400px] md:h-[500px] flex flex-col items-center justify-center rounded-[1.5rem] text-white font-heading" style="background: linear-gradient(135deg, var(--primary), var(--primary-dark));">
                        <span class="text-9xl font-black mb-4 opacity-90">{{ substr($umkm->nama_toko, 0, 2) }}</span>
                        <span class="text-lg opacity-80 tracking-widest uppercase">Premium Quality</span>
                    </div>
                @endif
            </div>
            <!-- Floating Badge -->
            <div class="absolute -top-4 -right-4 glass-card px-4 py-2 rounded-full flex items-center gap-2 animate-float" style="animation-delay: 1s;">
                <i class="fas fa-star text-yellow-400"></i>
                <span class="text-xs font-bold text-slate-700">Rating 5.0</span>
            </div>
        </div>
    </div>
</section>

<!-- Tentang Section -->
<section id="tentang" class="py-24">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="font-heading text-4xl md:text-5xl font-extrabold mb-4 text-gradient">Tentang Kami</h2>
        <div class="divider mb-10"></div>
        
        <div class="glass-card p-8 md:p-12 rounded-3xl mb-12 relative">
            <i class="fas fa-quote-left text-5xl absolute -top-4 -left-4 opacity-20 text-[var(--primary)]"></i>
            <p class="text-xl md:text-2xl italic leading-relaxed text-slate-600">
                "{{ $umkm->cerita_usaha ?? $umkm->deskripsi ?? 'Kami berkomitmen memberikan produk dan layanan terbaik untuk setiap pelanggan.' }}"
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @if($umkm->tahun_berdiri)
            <div class="glass-card p-8 rounded-3xl text-center">
                <div class="w-14 h-14 rounded-2xl mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">
                    <i class="fas fa-calendar text-white text-xl"></i>
                </div>
                <p class="font-heading text-4xl font-extrabold mb-2 text-gradient">{{ $umkm->tahun_berdiri }}</p>
                <p class="text-sm uppercase font-bold tracking-wider text-slate-500">Tahun Berdiri</p>
            </div>
            @endif
            <div class="glass-card p-8 rounded-3xl text-center">
                <div class="w-14 h-14 rounded-2xl mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">
                    <i class="fas fa-box text-white text-xl"></i>
                </div>
                <p class="font-heading text-4xl font-extrabold mb-2 text-gradient">{{ $umkm->produk->count() }}+</p>
                <p class="text-sm uppercase font-bold tracking-wider text-slate-500">Produk Pilihan</p>
            </div>
            <div class="glass-card p-8 rounded-3xl text-center">
                <div class="w-14 h-14 rounded-2xl mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">
                    <i class="fas fa-award text-white text-xl"></i>
                </div>
                <p class="font-heading text-4xl font-extrabold mb-2 text-gradient">100%</p>
                <p class="text-sm uppercase font-bold tracking-wider text-slate-500">Kualitas Terjamin</p>
            </div>
        </div>
    </div>
</section>

<!-- Produk Section -->
<section id="produk" class="py-24">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="font-heading text-4xl md:text-5xl font-extrabold mb-4 text-gradient">Koleksi Produk</h2>
            <div class="divider mb-6"></div>
            <p class="text-lg max-w-2xl mx-auto text-slate-600">Produk unggulan yang telah dikurasi untuk kualitas terbaik.</p>
        </div>

        @if($umkm->produk->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($umkm->produk as $item)
                <div class="card glass-card rounded-3xl overflow-hidden group">
                    <div class="h-72 bg-[var(--bg)] overflow-hidden relative">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center" style="background: linear-gradient(135deg, var(--accent), var(--bg));">
                                <i class="fas fa-box-open text-6xl text-[var(--primary)] opacity-40"></i>
                            </div>
                        @endif
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1.5 rounded-full text-xs font-bold backdrop-blur-md {{ $item->status_stok == 'tersedia' ? 'bg-green-100/90 text-green-800' : 'bg-red-100/90 text-red-800' }}">
                                <i class="fas {{ $item->status_stok == 'tersedia' ? 'fa-check-circle' : 'fa-times-circle' }} mr-1"></i>
                                {{ ucfirst($item->status_stok) }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-heading text-xl font-bold mb-2 text-slate-800">{{ $item->nama_produk }}</h3>
                        <p class="text-sm mb-4 line-clamp-2 h-10 text-slate-500">{{ $item->deskripsi ?? 'Produk berkualitas dengan harga terbaik.' }}</p>
                        <div class="flex justify-between items-center pt-4 border-t border-[var(--accent)]">
                            <span class="font-heading text-2xl font-extrabold text-gradient">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                            @if($item->status_stok == 'tersedia')
                                @php $waP = $waUrl . '?text=Halo%20' . urlencode($umkm->nama_toko) . ',%20saya%20tertarik%20dengan%20*' . urlencode($item->nama_produk) . '*'; @endphp
                                <a href="{{ $waP }}" target="_blank" class="w-12 h-12 rounded-full flex items-center justify-center text-white bg-[#25D366] hover:bg-[#128C7E] hover:scale-110 transition shadow-lg shadow-green-500/30">
                                    <i class="fab fa-whatsapp text-xl"></i>
                                </a>
                            @else
                                <button disabled class="w-12 h-12 rounded-full flex items-center justify-center text-gray-400 bg-gray-100 cursor-not-allowed">
                                    <i class="fas fa-times"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16 glass-card rounded-3xl">
                <i class="fas fa-box-open text-6xl mb-4 text-[var(--accent)]"></i>
                <p class="text-xl font-semibold text-slate-500">Produk akan segera hadir!</p>
            </div>
        @endif
    </div>
</section>

<!-- Testimoni Section -->
<section id="testimoni" class="py-24">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="font-heading text-4xl md:text-5xl font-extrabold mb-4 text-gradient">Apa Kata Mereka?</h2>
            <div class="divider mb-6"></div>
        </div>

        @php $listTestimoni = is_string($umkm->testimoni) ? json_decode($umkm->testimoni, true) : ($umkm->testimoni ?? []); @endphp
        
        @if(is_array($listTestimoni) && count($listTestimoni) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                @foreach($listTestimoni as $testi)
                <div class="card glass-card p-8 rounded-3xl relative">
                    <i class="fas fa-quote-left text-5xl absolute top-6 left-6 opacity-10 text-[var(--primary)]"></i>
                    <p class="text-lg italic mb-6 relative z-10 pt-6 text-slate-600">"{{ $testi['pesan'] ?? 'Pelayanan sangat memuaskan!' }}"</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-md" style="background: linear-gradient(135deg, var(--primary), var(--primary-dark));">
                            {{ substr($testi['nama'] ?? 'P', 0, 1) }}
                        </div>
                        <div>
                            <p class="font-heading font-bold text-lg text-slate-800">{{ $testi['nama'] ?? 'Pelanggan' }}</p>
                            <div class="text-yellow-400 text-sm tracking-widest">
                                @for($i = 0; $i < ($testi['rating'] ?? 5); $i++)<i class="fas fa-star"></i>@endfor
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif

        <!-- Form Testimoni -->
        <div class="max-w-2xl mx-auto glass-card p-8 md:p-10 rounded-3xl">
            <h3 class="font-heading text-2xl font-extrabold text-center mb-2 text-gradient">Bagikan Pengalaman Anda</h3>
            <p class="text-center mb-6 text-slate-500">Pendapat Anda sangat berarti untuk kami.</p>
            
            @if(session('success_testimoni'))
                <div class="mb-6 bg-green-50/80 backdrop-blur border-l-4 border-green-500 text-green-800 p-4 rounded-xl text-sm flex items-center">
                    <i class="fas fa-check-circle mr-3 text-lg"></i> {{ session('success_testimoni') }}
                </div>
            @endif

            <form action="{{ route('website.kirimTestimoni', $umkm->slug) }}" method="POST" class="space-y-5">
                @csrf
                <input type="text" name="nama_pengirim" required class="glass-input w-full px-5 py-4 rounded-2xl text-slate-800" placeholder="Nama Lengkap Anda">
                <textarea name="pesan_testimoni" rows="4" required class="glass-input w-full px-5 py-4 rounded-2xl text-slate-800 resize-none" placeholder="Tulis pengalaman Anda..."></textarea>
                <button type="submit" class="w-full py-4 rounded-2xl font-bold text-white text-lg btn-primary">
                    <i class="fas fa-paper-plane mr-2"></i> Kirim Testimoni
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Kontak Section -->
<section id="kontak" class="py-24">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="font-heading text-4xl md:text-5xl font-extrabold mb-4 text-gradient">Hubungi Kami</h2>
            <div class="divider mb-6"></div>
        </div>

        <div class="grid lg:grid-cols-5 gap-8">
            <div class="lg:col-span-2 space-y-5">
                @if($umkm->alamat)
                <div class="card glass-card p-6 rounded-2xl flex items-start gap-5">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center flex-shrink-0" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">
                        <i class="fas fa-map-marker-alt text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-heading font-bold text-lg text-slate-800">Alamat</h4>
                        <p class="text-slate-600">{{ $umkm->alamat }}</p>
                    </div>
                </div>
                @endif
                @if($umkm->no_hp)
                <a href="{{ $waUrl }}" target="_blank" class="card glass-card p-6 rounded-2xl flex items-start gap-5 no-underline hover:bg-green-50/50 transition">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center flex-shrink-0 bg-[#25D366]">
                        <i class="fab fa-whatsapp text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-heading font-bold text-lg text-slate-800">WhatsApp</h4>
                        <p class="text-slate-600">{{ $umkm->no_hp }}</p>
                    </div>
                </a>
                @endif
                @if($umkm->instagram)
                @php $igLink = str_contains($umkm->instagram, 'http') ? $umkm->instagram : 'https://instagram.com/' . ltrim($umkm->instagram, '@'); @endphp
                <a href="{{ $igLink }}" target="_blank" class="card glass-card p-6 rounded-2xl flex items-start gap-5 no-underline hover:bg-pink-50/50 transition">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center flex-shrink-0 bg-gradient-to-br from-pink-500 to-purple-600">
                        <i class="fab fa-instagram text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-heading font-bold text-lg text-slate-800">Instagram</h4>
                        <p class="text-slate-600">{{ $umkm->instagram }}</p>
                    </div>
                </a>
                @endif
            </div>

            <div class="lg:col-span-3">
                <div class="glass-card rounded-3xl overflow-hidden h-[400px] lg:h-full min-h-[400px] p-2">
                    @if($umkm->alamat)
                        <iframe src="https://www.google.com/maps?q={{ urlencode($umkm->alamat) }}&output=embed" width="100%" height="100%" style="border:0; border-radius: 1.5rem;" allowfullscreen loading="lazy"></iframe>
                    @else
                        <div class="w-full h-full rounded-2xl flex flex-col items-center justify-center" style="background: linear-gradient(135deg, var(--accent), var(--bg));">
                            <i class="fas fa-map-marked-alt text-7xl mb-4 text-[var(--primary)] opacity-40"></i>
                            <p class="font-semibold text-slate-500">Peta lokasi akan muncul di sini</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Floating WA Button -->
<a href="{{ $waUrl }}" target="_blank" class="fixed bottom-6 right-6 z-50 bg-[#25D366] text-white w-16 h-16 rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition duration-300 animate-float">
    <i class="fab fa-whatsapp text-3xl"></i>
</a>

@endsection