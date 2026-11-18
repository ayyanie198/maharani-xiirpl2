@extends('layouts.public')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap');
    
    :root {
        /* PALET COKLAT ELEGAN */
        --primary: #5D4037; 
        --primary-dark: #3E2723;
        --secondary: #8D6E63; 
        --accent: #D7CCC8;
        --accent-light: #EFEBE9;
        --bg: #FAF7F5; 
        --text: #2D1E1A; 
        --text-light: #6D4C41;
        --gold: #D4A574; /* Aksen emas hangat untuk kemewahan */
    }

    body { 
        font-family: 'Inter', sans-serif; 
        color: var(--text); 
        background: var(--bg); 
        scroll-behavior: smooth; 
        overflow-x: hidden;
    }
    .font-serif { font-family: 'Playfair Display', serif; }

    /* === LIQUID GLASS EFFECTS (Premium Warm) === */
    .glass-nav {
        background: rgba(250, 247, 245, 0.85);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(93, 64, 55, 0.1);
    }
    .glass-card {
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(215, 204, 200, 0.6);
        box-shadow: 0 8px 32px rgba(93, 64, 55, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .glass-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px -10px rgba(93, 64, 55, 0.15);
        border-color: rgba(93, 64, 55, 0.2);
    }
    .glass-input {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(8px);
        border: 1px solid var(--accent);
        transition: all 0.3s;
    }
    .glass-input:focus {
        background: white;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(93, 64, 55, 0.1);
        outline: none;
    }

    /* Buttons */
    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 15px rgba(93, 64, 55, 0.25);
    }
    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(93, 64, 55, 0.35);
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
    }

    /* Divider & Text */
    .divider {
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--gold));
        margin: 0 auto;
        border-radius: 2px;
    }
    .text-gradient {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Animations */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
    }
    .fade-in-up { animation: fadeInUp 0.8s ease-out forwards; opacity: 0; }
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .animate-float { animation: float 6s ease-in-out infinite; }

    .card img { transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1); }
    .card:hover img { transform: scale(1.05); }
</style>

<!-- Navbar Glass -->
<nav class="glass-nav sticky top-0 z-50 py-4">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
        <a href="#" class="font-serif text-2xl md:text-3xl font-bold flex items-center gap-2 text-gradient">
            <i class="fas fa-leaf" style="color: var(--gold);"></i> {{ $umkm->nama_toko }}
        </a>
        <div class="hidden md:flex space-x-8">
            <a href="#home" class="text-sm font-medium text-[var(--text)] hover:text-[var(--primary)] transition">Beranda</a>
            <a href="#tentang" class="text-sm font-medium text-[var(--text)] hover:text-[var(--primary)] transition">Tentang</a>
            <a href="#produk" class="text-sm font-medium text-[var(--text)] hover:text-[var(--primary)] transition">Produk</a>
            <a href="#testimoni" class="text-sm font-medium text-[var(--text)] hover:text-[var(--primary)] transition">Testimoni</a>
            <a href="#kontak" class="text-sm font-medium text-[var(--text)] hover:text-[var(--primary)] transition">Kontak</a>
        </div>
        @php $waUrl = str_contains($umkm->no_hp ?? '', 'wa.me') ? $umkm->no_hp : 'https://wa.me/' . preg_replace('/^0/', '62', $umkm->no_hp ?? ''); @endphp
        <a href="{{ $waUrl }}" target="_blank" class="btn-primary px-5 py-2.5 rounded-full text-sm font-semibold flex items-center gap-2">
            <i class="fab fa-whatsapp text-lg"></i> Pesan
        </a>
    </div>
</nav>

<!-- Hero Section -->
<section id="home" class="py-24 md:py-32 bg-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[var(--accent-light)] rounded-full mix-blend-multiply filter blur-3xl opacity-40"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-[var(--accent)] rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>

    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center relative z-10">
        <div class="space-y-6 fade-in-up">
            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest glass-card" style="color: var(--primary);">
                <span class="w-2 h-2 bg-[var(--gold)] rounded-full animate-pulse"></span>
                Premium Quality
            </span>
            <h1 class="font-serif text-5xl md:text-6xl lg:text-7xl font-bold leading-tight text-[var(--text)]">
                {{ $umkm->nama_toko }}
            </h1>
            <p class="text-lg md:text-xl leading-relaxed" style="color: var(--text-light);">
                {{ $umkm->deskripsi ?? 'Menghadirkan produk berkualitas dengan sentuhan elegan dan pelayanan terbaik untuk Anda.' }}
            </p>
            <div class="flex flex-wrap gap-4 pt-2">
                <a href="#produk" class="btn-primary px-8 py-4 rounded-full font-semibold text-lg">
                    <i class="fas fa-box-open mr-2"></i> Lihat Koleksi
                </a>
                <a href="#tentang" class="btn-outline px-8 py-4 rounded-full font-semibold text-lg">
                    <i class="fas fa-info-circle mr-2"></i> Tentang Kami
                </a>
            </div>
        </div>
        <div class="relative fade-in-up delay-200">
            <div class="absolute -inset-6 rounded-[2.5rem] bg-gradient-to-br from-[var(--primary)] to-[var(--secondary)] opacity-15 blur-3xl animate-float"></div>
            <div class="relative glass-card rounded-[2rem] p-3 animate-float">
                @if($umkm->foto_hero)
                    <img src="{{ asset('storage/' . $umkm->foto_hero) }}" class="w-full h-[400px] md:h-[500px] object-cover rounded-[1.5rem]">
                @else
                    <div class="w-full h-[400px] md:h-[500px] flex flex-col items-center justify-center rounded-[1.5rem] text-white font-serif" style="background: linear-gradient(135deg, var(--primary), var(--primary-dark));">
                        <span class="text-8xl font-bold mb-4 opacity-90">{{ substr($umkm->nama_toko, 0, 2) }}</span>
                        <span class="text-sm tracking-[0.2em] uppercase opacity-80">Est. {{ $umkm->tahun_berdiri ?? '2024' }}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Tentang Section -->
<section id="tentang" class="py-24" style="background: var(--bg);">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4 text-[var(--text)]">Tentang Kami</h2>
        <div class="divider mb-10"></div>
        
        <div class="glass-card p-8 md:p-12 rounded-3xl mb-12 relative">
            <i class="fas fa-quote-left text-5xl absolute -top-4 -left-4 opacity-10" style="color: var(--primary);"></i>
            <p class="text-xl md:text-2xl italic leading-relaxed" style="color: var(--text-light);">
                "{{ $umkm->cerita_usaha ?? $umkm->deskripsi ?? 'Kami berdedikasi untuk menghadirkan kualitas terbaik dalam setiap detail produk kami.' }}"
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @if($umkm->tahun_berdiri)
            <div class="glass-card p-8 rounded-3xl text-center">
                <div class="w-14 h-14 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">
                    <i class="fas fa-calendar-alt text-white text-xl"></i>
                </div>
                <p class="font-serif text-4xl font-bold mb-2 text-[var(--primary)]">{{ $umkm->tahun_berdiri }}</p>
                <p class="text-xs uppercase font-bold tracking-widest" style="color: var(--text-light);">Tahun Berdiri</p>
            </div>
            @endif
            <div class="glass-card p-8 rounded-3xl text-center">
                <div class="w-14 h-14 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">
                    <i class="fas fa-gem text-white text-xl"></i>
                </div>
                <p class="font-serif text-4xl font-bold mb-2 text-[var(--primary)]">{{ $umkm->produk->count() }}+</p>
                <p class="text-xs uppercase font-bold tracking-widest" style="color: var(--text-light);">Koleksi Pilihan</p>
            </div>
            <div class="glass-card p-8 rounded-3xl text-center">
                <div class="w-14 h-14 rounded-full mx-auto mb-4 flex items-center justify-center" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">
                    <i class="fas fa-award text-white text-xl"></i>
                </div>
                <p class="font-serif text-4xl font-bold mb-2 text-[var(--primary)]">100%</p>
                <p class="text-xs uppercase font-bold tracking-widest" style="color: var(--text-light);">Kualitas Terjamin</p>
            </div>
        </div>
    </div>
</section>

<!-- Produk Section -->
<section id="produk" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4 text-[var(--text)]">Koleksi Produk</h2>
            <div class="divider mb-6"></div>
            <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-light);">Kurasi produk terbaik yang dirancang dengan penuh perhatian dan kualitas premium.</p>
        </div>

        @if($umkm->produk->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($umkm->produk as $item)
                <div class="card glass-card rounded-3xl overflow-hidden group">
                    <div class="h-72 bg-[var(--bg)] overflow-hidden relative">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center" style="background: linear-gradient(135deg, var(--accent-light), var(--bg));">
                                <i class="fas fa-box-open text-6xl" style="color: var(--primary); opacity: 0.3;"></i>
                            </div>
                        @endif
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1.5 rounded-full text-xs font-bold backdrop-blur-md {{ $item->status_stok == 'tersedia' ? 'bg-green-100/90 text-green-800' : 'bg-red-100/90 text-red-800' }}">
                                {{ ucfirst($item->status_stok) }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-serif text-xl font-bold mb-2 text-[var(--text)]">{{ $item->nama_produk }}</h3>
                        <p class="text-sm mb-4 line-clamp-2 h-10" style="color: var(--text-light);">{{ $item->deskripsi ?? 'Produk berkualitas tinggi dengan detail yang sempurna.' }}</p>
                        <div class="flex justify-between items-center pt-4 border-t border-[var(--accent)]">
                            <span class="font-serif text-2xl font-bold" style="color: var(--primary);">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                            @if($item->status_stok == 'tersedia')
                                @php $waP = $waUrl . '?text=Halo%20' . urlencode($umkm->nama_toko) . ',%20saya%20tertarik%20dengan%20*' . urlencode($item->nama_produk) . '*'; @endphp
                                <a href="{{ $waP }}" target="_blank" class="w-12 h-12 rounded-full flex items-center justify-center text-white bg-[#25D366] hover:bg-[#128C7E] hover:scale-110 transition shadow-lg shadow-green-500/20">
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
                <i class="fas fa-box-open text-6xl mb-4" style="color: var(--accent);"></i>
                <p class="text-xl font-semibold" style="color: var(--text-light);">Koleksi baru akan segera hadir. Nantikan update dari kami.</p>
            </div>
        @endif
    </div>
</section>

<!-- Testimoni Section -->
<section id="testimoni" class="py-24" style="background: var(--bg);">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4 text-[var(--text)]">Apa Kata Mereka?</h2>
            <div class="divider mb-6"></div>
        </div>

        @php $listTestimoni = is_string($umkm->testimoni) ? json_decode($umkm->testimoni, true) : ($umkm->testimoni ?? []); @endphp
        
        @if(is_array($listTestimoni) && count($listTestimoni) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                @foreach($listTestimoni as $testi)
                <div class="card glass-card p-8 rounded-3xl relative">
                    <i class="fas fa-quote-left text-5xl absolute top-6 left-6 opacity-10" style="color: var(--primary);"></i>
                    <p class="text-lg italic mb-6 relative z-10 pt-6 leading-relaxed" style="color: var(--text);">"{{ $testi['pesan'] ?? 'Pelayanan sangat memuaskan dan produk berkualitas!' }}"</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-md" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">
                            {{ substr($testi['nama'] ?? 'P', 0, 1) }}
                        </div>
                        <div>
                            <p class="font-serif font-bold text-lg text-[var(--text)]">{{ $testi['nama'] ?? 'Pelanggan Setia' }}</p>
                            <div class="text-[var(--gold)] text-sm tracking-widest">
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
            <h3 class="font-serif text-2xl font-bold text-center mb-2 text-[var(--text)]">Bagikan Pengalaman Anda</h3>
            <p class="text-center mb-6" style="color: var(--text-light);">Pendapat Anda sangat berarti untuk perkembangan kami.</p>
            
            @if(session('success_testimoni'))
                <div class="mb-6 bg-green-50/80 backdrop-blur border-l-4 border-green-500 text-green-800 p-4 rounded-xl text-sm flex items-center">
                    <i class="fas fa-check-circle mr-3 text-lg"></i> {{ session('success_testimoni') }}
                </div>
            @endif

            <form action="{{ route('website.kirimTestimoni', $umkm->slug) }}" method="POST" class="space-y-5">
                @csrf
                <input type="text" name="nama_pengirim" required class="glass-input w-full px-5 py-4 rounded-2xl text-[var(--text)]" placeholder="Nama Lengkap Anda">
                <textarea name="pesan_testimoni" rows="4" required class="glass-input w-full px-5 py-4 rounded-2xl text-[var(--text)] resize-none" placeholder="Tulis pengalaman Anda..."></textarea>
                <button type="submit" class="w-full py-4 rounded-2xl font-bold text-white text-lg btn-primary">
                    <i class="fas fa-paper-plane mr-2"></i> Kirim Testimoni
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Kontak Section -->
<section id="kontak" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4 text-[var(--text)]">Hubungi Kami</h2>
            <div class="divider mb-6"></div>
        </div>

        <div class="grid lg:grid-cols-5 gap-8">
            <div class="lg:col-span-2 space-y-5">
                @if($umkm->alamat)
                <div class="card glass-card p-6 rounded-2xl flex items-start gap-5">
                    <div class="w-14 h-14 rounded-full flex items-center justify-center flex-shrink-0" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">
                        <i class="fas fa-map-marker-alt text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-serif font-bold text-lg text-[var(--text)]">Alamat</h4>
                        <p style="color: var(--text-light);">{{ $umkm->alamat }}</p>
                    </div>
                </div>
                @endif
                @if($umkm->no_hp)
                <a href="{{ $waUrl }}" target="_blank" class="card glass-card p-6 rounded-2xl flex items-start gap-5 no-underline hover:bg-green-50/50 transition">
                    <div class="w-14 h-14 rounded-full flex items-center justify-center flex-shrink-0 bg-[#25D366]">
                        <i class="fab fa-whatsapp text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-serif font-bold text-lg text-[var(--text)]">WhatsApp</h4>
                        <p style="color: var(--text-light);">{{ $umkm->no_hp }}</p>
                    </div>
                </a>
                @endif
                @if($umkm->instagram)
                @php $igLink = str_contains($umkm->instagram, 'http') ? $umkm->instagram : 'https://instagram.com/' . ltrim($umkm->instagram, '@'); @endphp
                <a href="{{ $igLink }}" target="_blank" class="card glass-card p-6 rounded-2xl flex items-start gap-5 no-underline hover:bg-pink-50/50 transition">
                    <div class="w-14 h-14 rounded-full flex items-center justify-center flex-shrink-0 bg-gradient-to-br from-pink-500 to-purple-600">
                        <i class="fab fa-instagram text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-serif font-bold text-lg text-[var(--text)]">Instagram</h4>
                        <p style="color: var(--text-light);">{{ $umkm->instagram }}</p>
                    </div>
                </a>
                @endif
            </div>

            <div class="lg:col-span-3">
                <div class="glass-card rounded-3xl overflow-hidden h-[400px] lg:h-full min-h-[400px] p-2">
                    @if($umkm->alamat)
                        <iframe src="https://www.google.com/maps?q={{ urlencode($umkm->alamat) }}&output=embed" width="100%" height="100%" style="border:0; border-radius: 1.5rem;" allowfullscreen loading="lazy"></iframe>
                    @else
                        <div class="w-full h-full rounded-2xl flex flex-col items-center justify-center" style="background: linear-gradient(135deg, var(--accent-light), var(--bg));">
                            <i class="fas fa-map-marked-alt text-7xl mb-4" style="color: var(--primary); opacity: 0.3;"></i>
                            <p class="font-semibold" style="color: var(--text-light);">Peta lokasi akan muncul di sini</p>
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