@extends('layouts.public')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
    :root {
        --primary: #1E40AF; --secondary: #3B82F6; --accent: #DBEAFE;
        --bg: #EFF6FF; --text: #1E293B; --text-light: #64748B;
    }
    body { font-family: 'Inter', sans-serif; color: var(--text); background: var(--bg); scroll-behavior: smooth; }
    .glass-nav { background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(12px); border-bottom: 1px solid var(--accent); }
    .btn-primary { background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; transition: all 0.3s; }
    .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 30px rgba(30, 64, 175, 0.3); }
    .btn-outline { border: 2px solid var(--primary); color: var(--primary); transition: all 0.3s; }
    .btn-outline:hover { background: var(--primary); color: white; }
    .card { background: white; border-radius: 16px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: all 0.3s; }
    .card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(30, 64, 175, 0.15); }
    .card img { transition: transform 0.5s; }
    .card:hover img { transform: scale(1.05); }
    .divider { width: 60px; height: 4px; background: linear-gradient(90deg, var(--primary), var(--secondary)); margin: 0 auto; border-radius: 2px; }
    .gradient-text { background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
</style>

<nav class="glass-nav sticky top-0 z-50 py-4">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
        <a href="#" class="text-2xl font-bold gradient-text">{{ $umkm->nama_toko }}</a>
        <div class="hidden md:flex space-x-8">
            <a href="#home" class="text-sm font-medium hover:text-[var(--primary)]" style="color: var(--text);">Beranda</a>
            <a href="#tentang" class="text-sm font-medium hover:text-[var(--primary)]" style="color: var(--text);">Tentang</a>
            <a href="#produk" class="text-sm font-medium hover:text-[var(--primary)]" style="color: var(--text);">Produk</a>
            <a href="#testimoni" class="text-sm font-medium hover:text-[var(--primary)]" style="color: var(--text);">Testimoni</a>
            <a href="#kontak" class="text-sm font-medium hover:text-[var(--primary)]" style="color: var(--text);">Kontak</a>
        </div>
        @php $waUrl = str_contains($umkm->no_hp ?? '', 'wa.me') ? $umkm->no_hp : 'https://wa.me/' . preg_replace('/^0/', '62', $umkm->no_hp ?? ''); @endphp
        <a href="{{ $waUrl }}" target="_blank" class="btn-primary px-6 py-2.5 rounded-full text-sm font-semibold flex items-center gap-2"><i class="fab fa-whatsapp"></i> Pesan</a>
    </div>
</nav>

<section id="home" class="py-24 md:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
            <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold uppercase" style="background: var(--accent); color: var(--primary);">✨ Selamat Datang</span>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold gradient-text">{{ $umkm->nama_toko }}</h1>
            <p class="text-lg" style="color: var(--text-light);">{{ $umkm->deskripsi }}</p>
            <div class="flex gap-4">
                <a href="#produk" class="btn-primary px-8 py-3.5 rounded-full font-semibold">Lihat Koleksi</a>
                <a href="#tentang" class="btn-outline px-8 py-3.5 rounded-full font-semibold">Tentang Kami</a>
            </div>
        </div>
        <div class="relative">
            <div class="absolute -inset-4 rounded-3xl opacity-30 blur-2xl" style="background: linear-gradient(135deg, var(--primary), var(--secondary));"></div>
            <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                @if($umkm->foto_hero)<img src="{{ asset('storage/' . $umkm->foto_hero) }}" class="w-full h-[500px] object-cover">@else<div class="w-full h-[500px] flex items-center justify-center text-white font-bold text-8xl" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">{{ substr($umkm->nama_toko, 0, 2) }}</div>@endif
            </div>
        </div>
    </div>
</section>

<section id="tentang" class="py-24" style="background: var(--bg);">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 gradient-text">Tentang Kami</h2>
        <div class="divider mb-8"></div>
        <div class="card p-8 md:p-12 mb-12">
            <p class="text-lg italic" style="color: var(--text-light);">"{{ $umkm->cerita_usaha ?? $umkm->deskripsi }}"</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @if($umkm->tahun_berdiri)<div class="card p-8"><p class="text-4xl font-bold mb-2 gradient-text">{{ $umkm->tahun_berdiri }}</p><p class="text-sm uppercase font-semibold" style="color: var(--text-light);">Tahun Berdiri</p></div>@endif
            <div class="card p-8"><p class="text-4xl font-bold mb-2 gradient-text">{{ $umkm->produk->count() }}</p><p class="text-sm uppercase font-semibold" style="color: var(--text-light);">Produk Pilihan</p></div>
            <div class="card p-8"><p class="text-4xl font-bold mb-2 gradient-text">100%</p><p class="text-sm uppercase font-semibold" style="color: var(--text-light);">Kualitas Terjamin</p></div>
        </div>
    </div>
</section>

<section id="produk" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 gradient-text">Koleksi Produk</h2>
            <div class="divider mb-6"></div>
        </div>
        @if($umkm->produk->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($umkm->produk as $item)
                <div class="card overflow-hidden">
                    <div class="h-64 bg-gray-100 overflow-hidden relative">
                        @if($item->foto)<img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover">@else<div class="w-full h-full flex items-center justify-center" style="background: var(--accent);"><i class="fas fa-box text-5xl" style="color: var(--primary);"></i></div>@endif
                        <div class="absolute top-4 right-4"><span class="px-3 py-1 rounded-full text-xs font-bold {{ $item->status_stok == 'tersedia' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">{{ ucfirst($item->status_stok) }}</span></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2" style="color: var(--primary);">{{ $item->nama_produk }}</h3>
                        <p class="text-sm mb-4 line-clamp-2" style="color: var(--text-light);">{{ $item->deskripsi }}</p>
                        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                            <span class="text-2xl font-bold" style="color: var(--secondary);">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
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

<section id="testimoni" class="py-24" style="background: var(--bg);">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 gradient-text">Apa Kata Mereka?</h2>
            <div class="divider mb-6"></div>
        </div>
        @php $listTestimoni = is_string($umkm->testimoni) ? json_decode($umkm->testimoni, true) : ($umkm->testimoni ?? []); @endphp
        @if(is_array($listTestimoni) && count($listTestimoni) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                @foreach($listTestimoni as $testi)
                <div class="card p-8 relative">
                    <i class="fas fa-quote-left text-4xl absolute top-6 left-6 opacity-10" style="color: var(--primary);"></i>
                    <p class="text-lg italic mb-6 relative z-10 pt-4" style="color: var(--text);">"{{ $testi['pesan'] ?? '' }}"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">{{ substr($testi['nama'] ?? 'P', 0, 1) }}</div>
                        <div>
                            <p class="font-bold" style="color: var(--primary);">{{ $testi['nama'] ?? 'Pelanggan' }}</p>
                            <div class="text-yellow-400 text-xs">@for($i = 0; $i < ($testi['rating'] ?? 5); $i++)<i class="fas fa-star"></i>@endfor</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
        <div class="max-w-2xl mx-auto card p-8">
            <h3 class="text-2xl font-bold text-center mb-6 gradient-text">Tulis Testimoni Anda</h3>
            @if(session('success_testimoni'))<div class="mb-4 bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-lg text-sm">{{ session('success_testimoni') }}</div>@endif
            <form action="{{ route('website.kirimTestimoni', $umkm->slug) }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="nama_pengirim" required class="w-full px-4 py-3 rounded-xl border border-[var(--accent)] focus:outline-none focus:ring-2 focus:ring-[var(--primary)] bg-white" placeholder="Nama Anda">
                <textarea name="pesan_testimoni" rows="4" required class="w-full px-4 py-3 rounded-xl border border-[var(--accent)] focus:outline-none focus:ring-2 focus:ring-[var(--primary)] bg-white" placeholder="Tulis pengalaman Anda..."></textarea>
                <button type="submit" class="w-full py-3 rounded-xl font-bold text-white btn-primary"><i class="fas fa-paper-plane mr-2"></i>Kirim Testimoni</button>
            </form>
        </div>
    </div>
</section>

<section id="kontak" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 gradient-text">Hubungi Kami</h2>
            <div class="divider mb-6"></div>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-4">
                @if($umkm->alamat)<div class="card p-6 flex items-start gap-4"><div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background: var(--accent);"><i class="fas fa-map-marker-alt" style="color: var(--primary);"></i></div><div><h4 class="font-bold" style="color: var(--primary);">Alamat</h4><p style="color: var(--text-light);">{{ $umkm->alamat }}</p></div></div>@endif
                @if($umkm->no_hp)<a href="{{ $waUrl }}" target="_blank" class="card p-6 flex items-start gap-4 no-underline hover:bg-[var(--bg)]"><div class="w-12 h-12 rounded-xl flex items-center justify-center bg-green-100"><i class="fab fa-whatsapp text-green-600"></i></div><div><h4 class="font-bold" style="color: var(--primary);">WhatsApp</h4><p style="color: var(--text-light);">{{ $umkm->no_hp }}</p></div></a>@endif
                @if($umkm->instagram)@php $igLink = str_contains($umkm->instagram, 'http') ? $umkm->instagram : 'https://instagram.com/' . ltrim($umkm->instagram, '@'); @endphp<a href="{{ $igLink }}" target="_blank" class="card p-6 flex items-start gap-4 no-underline hover:bg-[var(--bg)]"><div class="w-12 h-12 rounded-xl flex items-center justify-center bg-pink-100"><i class="fab fa-instagram text-pink-600"></i></div><div><h4 class="font-bold" style="color: var(--primary);">Instagram</h4><p style="color: var(--text-light);">{{ $umkm->instagram }}</p></div></a>@endif
            </div>
            <div class="rounded-2xl overflow-hidden shadow-lg border border-[var(--accent)] h-96">
                @if($umkm->alamat)<iframe src="https://www.google.com/maps?q={{ urlencode($umkm->alamat) }}&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy"></iframe>@else<div class="w-full h-full flex items-center justify-center" style="background: var(--accent);"><i class="fas fa-map-marked-alt text-6xl" style="color: var(--primary);"></i></div>@endif
            </div>
        </div>
    </div>
</section>
@endsection