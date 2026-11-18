@extends('layouts.public')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Inter:wght@300;400;500;600;700&display=swap');
    
    :root {
        /* PALET WARNA DOODLUNE PINK */
        --primary: #FF6B9D; 
        --secondary: #C44569; 
        --accent: #FFD1DC;
        --bg: #FFF5F7; 
        --text: #4A3040; 
        --text-light: #8B5A6B;
    }

    body { 
        font-family: 'Inter', sans-serif; 
        color: var(--text); 
        background: var(--bg); 
        scroll-behavior: smooth; 
    }
    .font-serif { font-family: 'Playfair Display', serif; }

    /* Glassmorphism Premium */
    .glass-nav { 
        background: rgba(255, 245, 247, 0.85); 
        backdrop-filter: blur(16px); 
        -webkit-backdrop-filter: blur(16px);
        border-bottom: 1px solid rgba(255, 107, 157, 0.15); 
    }
    
    /* Tombol */
    .btn-primary { 
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); 
        color: white; 
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
    }
    .btn-primary:hover { 
        transform: translateY(-3px); 
        box-shadow: 0 10px 25px -5px rgba(255, 107, 157, 0.5); 
    }
    .btn-outline { 
        border: 2px solid var(--primary); 
        color: var(--primary); 
        transition: all 0.3s; 
    }
    .btn-outline:hover { 
        background: var(--primary); 
        color: white; 
        transform: translateY(-3px);
    }

    /* Kartu dengan Efek Hover Mewah */
    .card { 
        background: rgba(255, 255, 255, 0.9); 
        border: 1px solid rgba(255, 209, 220, 0.6); 
        backdrop-filter: blur(10px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); 
    }
    .card:hover { 
        transform: translateY(-8px); 
        box-shadow: 0 20px 40px -10px rgba(255, 107, 157, 0.25); 
        border-color: rgba(255, 107, 157, 0.4);
    }
    .card img { transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1); }
    .card:hover img { transform: scale(1.05); }

    .divider { 
        width: 60px; 
        height: 4px; 
        background: linear-gradient(90deg, var(--primary), var(--accent)); 
        margin: 0 auto; 
        border-radius: 2px;
    }

    /* Animasi Scroll Sederhana */
    .fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
        opacity: 0;
        transform: translateY(30px);
    }
    @keyframes fadeInUp {
        to { opacity: 1; transform: translateY(0); }
    }
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
</style>

<!-- Navbar -->
<nav class="glass-nav sticky top-0 z-50 py-4 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
        <a href="#" class="font-serif text-2xl md:text-3xl font-bold flex items-center gap-2" style="color: var(--primary);">
            <span class="text-3xl">🌸</span> {{ $umkm->nama_toko }}
        </a>
        <div class="hidden md:flex space-x-8">
            <a href="#home" class="text-sm font-semibold hover:text-[var(--primary)] transition" style="color: var(--text);">Beranda</a>
            <a href="#tentang" class="text-sm font-semibold hover:text-[var(--primary)] transition" style="color: var(--text);">Tentang</a>
            <a href="#produk" class="text-sm font-semibold hover:text-[var(--primary)] transition" style="color: var(--text);">Produk</a>
            <a href="#testimoni" class="text-sm font-semibold hover:text-[var(--primary)] transition" style="color: var(--text);">Testimoni</a>
            <a href="#kontak" class="text-sm font-semibold hover:text-[var(--primary)] transition" style="color: var(--text);">Kontak</a>
        </div>
        @php 
            $waUrl = str_contains($umkm->no_hp ?? '', 'wa.me') ? $umkm->no_hp : 'https://wa.me/' . preg_replace('/^0/', '62', $umkm->no_hp ?? ''); 
        @endphp
        <a href="{{ $waUrl }}" target="_blank" class="btn-primary px-5 py-2.5 rounded-full text-sm font-bold flex items-center gap-2 shadow-lg">
            <i class="fab fa-whatsapp text-lg"></i> <span class="hidden sm:inline">Pesan</span>
        </a>
    </div>
</nav>

<!-- Hero Section -->
<section id="home" class="py-24 md:py-32 bg-white relative overflow-hidden">
    <!-- Dekorasi Background -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-[var(--accent)] rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
    <div class="absolute bottom-0 left-0 w-72 h-72 bg-[var(--primary)] rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>

    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center relative z-10">
        <div class="space-y-6 fade-in-up">
            <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider" style="background: var(--accent); color: var(--secondary);">✨ Selamat Datang di Official Website</span>
            <h1 class="font-serif text-5xl md:text-6xl lg:text-7xl font-black leading-tight" style="color: var(--text);">
                {{ $umkm->nama_toko }}
            </h1>
            <p class="text-lg md:text-xl leading-relaxed" style="color: var(--text-light);">
                {{ $umkm->deskripsi ?? 'Tempat terbaik untuk menemukan produk berkualitas dan unik untuk kebutuhan Anda.' }}
            </p>
            <div class="flex flex-wrap gap-4 pt-2">
                <a href="#produk" class="btn-primary px-8 py-4 rounded-full font-bold text-lg">Lihat Koleksi</a>
                <a href="#tentang" class="btn-outline px-8 py-4 rounded-full font-bold text-lg">Tentang Kami</a>
            </div>
        </div>
        <div class="relative fade-in-up delay-200">
            <div class="absolute -inset-4 rounded-[2rem] opacity-30 blur-2xl" style="background: linear-gradient(135deg, var(--primary), var(--accent));"></div>
            <div class="relative rounded-[2rem] overflow-hidden shadow-2xl border-4 border-white bg-white">
                @if($umkm->foto_hero)
                    <img src="{{ asset('storage/' . $umkm->foto_hero) }}" class="w-full h-[400px] md:h-[500px] object-cover">
                @else
                    <div class="w-full h-[400px] md:h-[500px] flex flex-col items-center justify-center text-white font-serif" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">
                        <span class="text-8xl font-black mb-4">{{ substr($umkm->nama_toko, 0, 2) }}</span>
                        <span class="text-lg opacity-80">Premium Quality</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Tentang Section -->
<section id="tentang" class="py-24" style="background: var(--bg);">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4 fade-in-up" style="color: var(--text);">Tentang Kami</h2>
        <div class="divider mb-8 fade-in-up delay-100"></div>
        
        <div class="card p-8 md:p-12 rounded-3xl mb-12 fade-in-up delay-200">
            <i class="fas fa-quote-left text-4xl mb-4 opacity-20" style="color: var(--primary);"></i>
            <p class="text-xl md:text-2xl italic leading-relaxed" style="color: var(--text-light);">
                "{{ $umkm->cerita_usaha ?? $umkm->deskripsi ?? 'Kami berdedikasi untuk memberikan produk dan layanan terbaik bagi pelanggan kami.' }}"
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 fade-in-up delay-300">
            @if($umkm->tahun_berdiri)
            <div class="card p-8 rounded-3xl text-center">
                <p class="font-serif text-5xl font-black mb-2" style="color: var(--primary);">{{ $umkm->tahun_berdiri }}</p>
                <p class="text-sm uppercase font-bold tracking-wider" style="color: var(--text-light);">Tahun Berdiri</p>
            </div>
            @endif
            <div class="card p-8 rounded-3xl text-center">
                <p class="font-serif text-5xl font-black mb-2" style="color: var(--primary);">{{ $umkm->produk->count() }}+</p>
                <p class="text-sm uppercase font-bold tracking-wider" style="color: var(--text-light);">Produk Pilihan</p>
            </div>
            <div class="card p-8 rounded-3xl text-center">
                <p class="font-serif text-5xl font-black mb-2" style="color: var(--primary);">100%</p>
                <p class="text-sm uppercase font-bold tracking-wider" style="color: var(--text-light);">Kepuasan Pelanggan</p>
            </div>
        </div>
    </div>
</section>

<!-- Produk Section -->
<section id="produk" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4" style="color: var(--text);">Koleksi Produk Terbaik</h2>
            <div class="divider mb-6"></div>
            <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-light);">Pilihan produk unggulan yang telah melalui kurasi ketat untuk memastikan kualitas terbaik.</p>
        </div>

        @if($umkm->produk->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($umkm->produk as $item)
                <div class="card rounded-3xl overflow-hidden group">
                    <div class="h-72 bg-[var(--bg)] overflow-hidden relative">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center" style="background: linear-gradient(135deg, var(--accent), var(--bg));">
                                <i class="fas fa-box-open text-6xl" style="color: var(--primary); opacity: 0.5;"></i>
                            </div>
                        @endif
                        
                        <!-- Badge Stok -->
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1.5 rounded-full text-xs font-bold shadow-sm backdrop-blur-md {{ $item->status_stok == 'tersedia' ? 'bg-green-100/90 text-green-800' : 'bg-red-100/90 text-red-800' }}">
                                {{ ucfirst($item->status_stok) }}
                            </span>
                        </div>
                   94>
                    <div class="p-6">
                        <h3 class="font-serif text-xl font-bold mb-2 line-clamp-1" style="color: var(--text);">{{ $item->nama_produk }}</h3>
                        <p class="text-sm mb-4 line-clamp-2 h-10" style="color: var(--text-light);">{{ $item->deskripsi ?? 'Produk berkualitas tinggi dengan harga terjangkau.' }}</p>
                        
                        <div class="flex justify-between items-center pt-4 border-t border-[var(--accent)]">
                            <span class="text-2xl font-black" style="color: var(--secondary);">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                            
                            @if($item->status_stok == 'tersedia')
                                @php $waP = $waUrl . '?text=Halo%20' . urlencode($umkm->nama_toko) . ',%20saya%20tertarik%20dengan%20*' . urlencode($item->nama_produk) . '*%20seharga%20Rp%20' . number_format($item->harga, 0, ',', '.'); @endphp
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
            <div class="text-center py-16 card rounded-3xl">
                <i class="fas fa-box-open text-6xl mb-4" style="color: var(--accent);"></i>
                <p class="text-xl font-semibold" style="color: var(--text-light);">Produk akan segera hadir. Nantikan update terbaru dari kami!</p>
            </div>
        @endif
    </div>
</section>

<!-- Testimoni Section -->
<section id="testimoni" class="py-24" style="background: var(--bg);">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4" style="color: var(--text);">Apa Kata Mereka?</h2>
            <div class="divider mb-6"></div>
        </div>

        @php $listTestimoni = is_string($umkm->testimoni) ? json_decode($umkm->testimoni, true) : ($umkm->testimoni ?? []); @endphp
        
        @if(is_array($listTestimoni) && count($listTestimoni) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                @foreach($listTestimoni as $testi)
                <div class="card p-8 rounded-3xl relative">
                    <i class="fas fa-quote-left text-5xl absolute top-6 left-6 opacity-10" style="color: var(--primary);"></i>
                    <p class="text-lg italic mb-6 relative z-10 pt-6 leading-relaxed" style="color: var(--text);">"{{ $testi['pesan'] ?? 'Produk yang sangat bagus dan pelayanan ramah!' }}"</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-md" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">
                            {{ substr($testi['nama'] ?? 'P', 0, 1) }}
                        </div>
                        <div>
                            <p class="font-bold text-lg" style="color: var(--text);">{{ $testi['nama'] ?? 'Pelanggan Setia' }}</p>
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
        <div class="max-w-2xl mx-auto card p-8 md:p-10 rounded-3xl shadow-xl">
            <h3 class="font-serif text-2xl font-bold text-center mb-2" style="color: var(--text);">Bagikan Pengalaman Anda</h3>
            <p class="text-center mb-6" style="color: var(--text-light);">Pendapat Anda sangat berarti untuk perkembangan kami.</p>
            
            @if(session('success_testimoni'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-xl text-sm flex items-center">
                    <i class="fas fa-check-circle mr-3 text-lg"></i> {{ session('success_testimoni') }}
                </div>
            @endif

            <form action="{{ route('website.kirimTestimoni', $umkm->slug) }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <input type="text" name="nama_pengirim" required 
                        class="w-full px-5 py-4 rounded-xl border border-[var(--accent)] focus:outline-none focus:ring-2 focus:ring-[var(--primary)] focus:border-transparent bg-white transition" 
                        placeholder="Nama Lengkap Anda">
                </div>
                <div>
                    <textarea name="pesan_testimoni" rows="4" required 
                        class="w-full px-5 py-4 rounded-xl border border-[var(--accent)] focus:outline-none focus:ring-2 focus:ring-[var(--primary)] focus:border-transparent bg-white transition resize-none" 
                        placeholder="Tulis pengalaman Anda menggunakan produk kami..."></textarea>
                </div>
                <button type="submit" class="w-full py-4 rounded-xl font-bold text-white text-lg btn-primary shadow-lg shadow-pink-500/30">
                    <i class="fas fa-paper-plane mr-2"></i> Kirim Testimoni
                </button>
            </form>
        </div.>
    </div>
</section>

<!-- Kontak Section -->
<section id="kontak" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4" style="color: var(--text);">Hubungi Kami</h2>
            <div class="divider mb-6"></div>
            <p class="text-lg max-w-2xl mx-auto" style="color: var(--text-light);">Jangan ragu untuk menghubungi kami jika ada pertanyaan atau ingin melakukan pemesanan khusus.</p>
        </div>

        <div class="grid lg:grid-cols-5 gap-8">
            <!-- Info Kontak -->
            <div class="lg:col-span-2 space-y-5">
                @if($umkm->alamat)
                <div class="card p-6 rounded-2xl flex items-start gap-5">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center flex-shrink-0" style="background: var(--accent);">
                        <i class="fas fa-map-marker-alt text-2xl" style="color: var(--primary);"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg mb-1" style="color: var(--text);">Alamat Toko</h4>
                        <p style="color: var(--text-light);">{{ $umkm->alamat }}</p>
                    </div>
                </div>
                @endif

                @if($umkm->no_hp)
                <a href="{{ $waUrl }}" target="_blank" class="card p-6 rounded-2xl flex items-start gap-5 no-underline hover:bg-green-50/50 transition group">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center flex-shrink-0 bg-green-100 group-hover:bg-green-200 transition">
                        <i class="fab fa-whatsapp text-2xl text-green-600"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg mb-1" style="color: var(--text);">WhatsApp</h4>
                        <p style="color: var(--text-light);">{{ $umkm->no_hp }}</p>
                        <p class="text-xs text-green-600 mt-1 font-semibold">Klik untuk chat langsung →</p>
                    </div>
                </a>
                @endif

                @if($umkm->instagram)
                @php $igLink = str_contains($umkm->instagram, 'http') ? $umkm->instagram : 'https://instagram.com/' . ltrim($umkm->instagram, '@'); @endphp
                <a href="{{ $igLink }}" target="_blank" class="card p-6 rounded-2xl flex items-start gap-5 no-underline hover:bg-pink-50/50 transition group">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center flex-shrink-0 bg-pink-100 group-hover:bg-pink-200 transition">
                        <i class="fab fa-instagram text-2xl text-pink-600"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg mb-1" style="color: var(--text);">Instagram</h4>
                        <p style="color: var(--text-light);">{{ $umkm->instagram }}</p>
                        <p class="text-xs text-pink-600 mt-1 font-semibold">Follow kami untuk update →</p>
                    </div>
                </a>
                @endif
            </div>

            <!-- Google Maps -->
            <div class="lg:col-span-3">
                <div class="rounded-3xl overflow-hidden shadow-xl border-4 border-white h-[400px] lg:h-full min-h-[400px] relative bg-[var(--bg)]">
                    @if($umkm->alamat)
                        <iframe src="https://www.google.com/maps?q={{ urlencode($umkm->alamat) }}&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center" style="background: linear-gradient(135deg, var(--accent), var(--bg));">
                            <i class="fas fa-map-marked-alt text-7xl mb-4" style="color: var(--primary); opacity: 0.6;"></i>
                            <p class="font-semibold text-lg" style="color: var(--text-light);">Peta lokasi akan muncul di sini</p>
                            <p class="text-sm" style="color: var(--text-light);">Silakan isi alamat di dashboard admin</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Floating WA Button (Mobile Friendly) -->
<a href="{{ $waUrl }}" target="_blank" class="fixed bottom-6 right-6 z-50 bg-[#25D366] text-white w-16 h-16 rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition duration-300 animate-bounce" style="animation-duration: 3s;">
    <i class="fab fa-whatsapp text-3xl"></i>
</a>

@endsection