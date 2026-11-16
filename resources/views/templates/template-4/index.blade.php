@extends('layouts.public')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Inter:wght@300;400;500;600&display=swap');
    :root {
        --primary: #2C1810; --secondary: #8B6F47; --accent: #D4A574;
        --bg: #0f0f0f; --text: #F5E6D3; --text-light: #C9A87C;
    }
    body { font-family: 'Inter', sans-serif; color: var(--text); background: var(--bg); scroll-behavior: smooth; }
    .font-serif { font-family: 'Playfair Display', serif; }
    .glass { background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px); border: 1px solid rgba(212, 165, 116, 0.2); }
    .glass-nav { background: rgba(15, 15, 15, 0.8); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(212, 165, 116, 0.2); }
    .btn-primary { background: linear-gradient(135deg, var(--secondary), var(--accent)); color: var(--primary); transition: all 0.3s; }
    .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 30px rgba(212, 165, 116, 0.4); }
    .btn-outline { border: 1px solid var(--accent); color: var(--accent); transition: all 0.3s; }
    .btn-outline:hover { background: var(--accent); color: var(--primary); }
    .card { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(10px); border: 1px solid rgba(212, 165, 116, 0.2); transition: all 0.4s; }
    .card:hover { transform: translateY(-8px); background: rgba(255, 255, 255, 0.08); box-shadow: 0 20px 40px rgba(0,0,0,0.5); }
    .card img { transition: transform 0.6s; }
    .card:hover img { transform: scale(1.05); }
    .divider { width: 60px; height: 3px; background: linear-gradient(90deg, var(--secondary), var(--accent)); margin: 0 auto; }
    .gold-text { background: linear-gradient(135deg, var(--accent), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
</style>

<nav class="glass-nav sticky top-0 z-50 py-4">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
        <a href="#" class="font-serif text-3xl font-bold gold-text">{{ $umkm->nama_toko }}</a>
        <div class="hidden md:flex space-x-8">
            <a href="#home" class="text-sm font-medium hover:text-[var(--accent)]" style="color: var(--text);">Beranda</a>
            <a href="#tentang" class="text-sm font-medium hover:text-[var(--accent)]" style="color: var(--text);">Tentang</a>
            <a href="#produk" class="text-sm font-medium hover:text-[var(--accent)]" style="color: var(--text);">Produk</a>
            <a href="#testimoni" class="text-sm font-medium hover:text-[var(--accent)]" style="color: var(--text);">Testimoni</a>
            <a href="#kontak" class="text-sm font-medium hover:text-[var(--accent)]" style="color: var(--text);">Kontak</a>
        </div>
        @php $waUrl = str_contains($umkm->no_hp ?? '', 'wa.me') ? $umkm->no_hp : 'https://wa.me/' . preg_replace('/^0/', '62', $umkm->no_hp ?? ''); @endphp
        <a href="{{ $waUrl }}" target="_blank" class="btn-primary px-6 py-2.5 rounded-full text-sm font-semibold flex items-center gap-2"><i class="fab fa-whatsapp"></i> Pesan</a>
    </div>
</nav>

<section id="home" class="py-24 md:py-32 relative overflow-hidden">
    <div class="absolute inset-0" style="background: radial-gradient(circle at 20% 50%, rgba(139, 111, 71, 0.15) 0%, transparent 50%), radial-gradient(circle at 80% 80%, rgba(212, 165, 116, 0.1) 0%, transparent 50%);"></div>
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center relative z-10">
        <div class="space-y-6">
            <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold uppercase glass" style="color: var(--accent);">✨ Eksklusif & Premium</span>
            <h1 class="font-serif text-5xl md:text-6xl lg:text-7xl font-bold gold-text">{{ $umkm->nama_toko }}</h1>
            <p class="text-lg" style="color: var(--text-light);">{{ $umkm->deskripsi }}</p>
            <div class="flex gap-4">
                <a href="#produk" class="btn-primary px-8 py-3.5 rounded-full font-semibold">Lihat Koleksi</a>
                <a href="#tentang" class="btn-outline px-8 py-3.5 rounded-full font-semibold">Tentang Kami</a>
            </div>
        </div>
        <div class="relative">
            <div class="absolute -inset-4 rounded-3xl opacity-30 blur-3xl" style="background: linear-gradient(135deg, var(--secondary), var(--accent));"></div>
            <div class="relative rounded-3xl overflow-hidden glass">
                @if($umkm->foto_hero)<img src="{{ asset('storage/' . $umkm->foto_hero) }}" class="w-full h-[500px] object-cover">@else<div class="w-full h-[500px] flex items-center justify-center text-white font-serif text-8xl font-bold" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">{{ substr($umkm->nama_toko, 0, 2) }}</div>@endif
            </div>
        </div>
    </div>
</section>

<section id="tentang" class="py-24 relative">
    <div class="absolute inset-0" style="background: linear-gradient(180deg, transparent 0%, rgba(44, 24, 16, 0.3) 100%);"></div>
    <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4 gold-text">Tentang Kami</h2>
        <div class="divider mb-8"></div>
        <div class="glass p-8 md:p-12 rounded-2xl mb-12">
            <p class="text-lg italic" style="color: var(--text-light);">"{{ $umkm->cerita_usaha ?? $umkm->deskripsi }}"</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @if($umkm->tahun_berdiri)<div class="glass p-8 rounded-2xl"><p class="font-serif text-4xl font-bold mb-2 gold-text">{{ $umkm->tahun_berdiri }}</p><p class="text-sm uppercase font-semibold" style="color: var(--text-light);">Tahun Berdiri</p></div>@endif
            <div class="glass p-8 rounded-2xl"><p class="font-serif text-4xl font-bold mb-2 gold-text">{{ $umkm->produk->count() }}</p><p class="text-sm uppercase font-semibold" style="color: var(--text-light);">Produk Eksklusif</p></div>
            <div class="glass p-8 rounded-2xl"><p class="font-serif text-4xl font-bold mb-2 gold-text">100%</p><p class="text-sm uppercase font-semibold" style="color: var(--text-light);">Kualitas Premium</p></div>
        </div>
    </div>
</section>

<section id="produk" class="py-24 relative">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4 gold-text">Koleksi Eksklusif</h2>
            <div class="divider mb-6"></div>
        </div>
        @if($umkm->produk->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($umkm->produk as $item)
                <div class="card rounded-2xl overflow-hidden">
                    <div class="h-64 bg-gray-900 overflow-hidden relative">
                        @if($item->foto)<img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover">@else<div class="w-full h-full flex items-center justify-center" style="background: linear-gradient(135deg, var(--primary), var(--secondary));"><i class="fas fa-gem text-5xl" style="color: var(--accent);"></i></div>@endif
                        <div class="absolute top-4 right-4"><span class="px-3 py-1 rounded-full text-xs font-bold {{ $item->status_stok == 'tersedia' ? 'bg-green-900 text-green-300' : 'bg-red-900 text-red-300' }}">{{ ucfirst($item->status_stok) }}</span></div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-serif text-xl font-bold mb-2 gold-text">{{ $item->nama_produk }}</h3>
                        <p class="text-sm mb-4 line-clamp-2" style="color: var(--text-light);">{{ $item->deskripsi }}</p>
                        <div class="flex justify-between items-center pt-4" style="border-top: 1px solid rgba(212, 165, 116, 0.2);">
                            <span class="text-2xl font-bold" style="color: var(--accent);">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                            @if($item->status_stok == 'tersedia')
                                @php $waP = $waUrl . '?text=Halo%20' . urlencode($umkm->nama_toko) . ',%20saya%20tertarik%20dengan%20' . urlencode($item->nama_produk); @endphp
                                <a href="{{ $waP }}" target="_blank" class="w-10 h-10 rounded-full flex items-center justify-center text-white hover:scale-110" style="background: #25D366;"><i class="fab fa-whatsapp"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<section id="testimoni" class="py-24 relative">
    <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(44, 24, 16, 0.3) 0%, transparent 100%);"></div>
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="text-center mb-16">
            <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4 gold-text">Apa Kata Mereka?</h2>
            <div class="divider mb-6"></div>
        </div>
        @php $listTestimoni = is_string($umkm->testimoni) ? json_decode($umkm->testimoni, true) : ($umkm->testimoni ?? []); @endphp
        @if(is_array($listTestimoni) && count($listTestimoni) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                @foreach($listTestimoni as $testi)
                <div class="glass p-8 rounded-2xl relative">
                    <i class="fas fa-quote-left text-4xl absolute top-6 left-6 opacity-20" style="color: var(--accent);"></i>
                    <p class="text-lg italic mb-6 relative z-10 pt-4" style="color: var(--text);">"{{ $testi['pesan'] ?? '' }}"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold" style="background: linear-gradient(135deg, var(--secondary), var(--accent));">{{ substr($testi['nama'] ?? 'P', 0, 1) }}</div>
                        <div>
                            <p class="font-bold gold-text">{{ $testi['nama'] ?? 'Pelanggan' }}</p>
                            <div class="text-yellow-400 text-xs">@for($i = 0; $i < ($testi['rating'] ?? 5); $i++)<i class="fas fa-star"></i>@endfor</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
        <div class="max-w-2xl mx-auto glass p-8 rounded-2xl">
            <h3 class="font-serif text-2xl font-bold text-center mb-6 gold-text">Tulis Testimoni Anda</h3>
            @if(session('success_testimoni'))<div class="mb-4 bg-green-900/30 border-l-4 border-green-500 text-green-300 p-4 rounded-lg text-sm">{{ session('success_testimoni') }}</div>@endif
            <form action="{{ route('website.kirimTestimoni', $umkm->slug) }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="nama_pengirim" required class="w-full px-4 py-3 rounded-xl border border-[rgba(212,165,116,0.3)] focus:outline-none focus:ring-2 focus:ring-[var(--accent)] bg-black/30 text-white" placeholder="Nama Anda">
                <textarea name="pesan_testimoni" rows="4" required class="w-full px-4 py-3 rounded-xl border border-[rgba(212,165,116,0.3)] focus:outline-none focus:ring-2 focus:ring-[var(--accent)] bg-black/30 text-white" placeholder="Tulis pengalaman Anda..."></textarea>
                <button type="submit" class="w-full py-3 rounded-xl font-bold btn-primary"><i class="fas fa-paper-plane mr-2"></i>Kirim Testimoni</button>
            </form>
        </div>
    </div>
</section>

<section id="kontak" class="py-24 relative">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4 gold-text">Hubungi Kami</h2>
            <div class="divider mb-6"></div>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-4">
                @if($umkm->alamat)<div class="glass p-6 rounded-xl flex items-start gap-4"><div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: rgba(212, 165, 116, 0.2);"><i class="fas fa-map-marker-alt" style="color: var(--accent);"></i></div><div><h4 class="font-bold gold-text">Alamat</h4><p style="color: var(--text-light);">{{ $umkm->alamat }}</p></div></div>@endif
                @if($umkm->no_hp)<a href="{{ $waUrl }}" target="_blank" class="glass p-6 rounded-xl flex items-start gap-4 no-underline hover:bg-white/10"><div class="w-12 h-12 rounded-xl flex items-center justify-center bg-green-900/30"><i class="fab fa-whatsapp text-green-400"></i></div><div><h4 class="font-bold gold-text">WhatsApp</h4><p style="color: var(--text-light);">{{ $umkm->no_hp }}</p></div></a>@endif
                @if($umkm->instagram)@php $igLink = str_contains($umkm->instagram, 'http') ? $umkm->instagram : 'https://instagram.com/' . ltrim($umkm->instagram, '@'); @endphp<a href="{{ $igLink }}" target="_blank" class="glass p-6 rounded-xl flex items-start gap-4 no-underline hover:bg-white/10"><div class="w-12 h-12 rounded-xl flex items-center justify-center bg-pink-900/30"><i class="fab fa-instagram text-pink-400"></i></div><div><h4 class="font-bold gold-text">Instagram</h4><p style="color: var(--text-light);">{{ $umkm->instagram }}</p></div></a>@endif
            </div>
            <div class="glass rounded-2xl overflow-hidden h-96">
                @if($umkm->alamat)<iframe src="https://www.google.com/maps?q={{ urlencode($umkm->alamat) }}&output=embed" width="100%" height="100%" style="border:0; filter: invert(90%) hue-rotate(180deg);" allowfullscreen loading="lazy"></iframe>@else<div class="w-full h-full flex items-center justify-center" style="background: rgba(212, 165, 116, 0.1);"><i class="fas fa-map-marked-alt text-6xl" style="color: var(--accent);"></i></div>@endif
            </div>
        </div>
    </div>
</section>
@endsection