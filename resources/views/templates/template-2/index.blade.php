@extends('layouts.public')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Patrick+Hand&family=Quicksand:wght@400;500;600;700&display=swap');
    :root {
        --primary: #FF6B9D; --secondary: #C44569; --accent: #FFEAA7;
        --bg: #FFF5F7; --text: #5D4037; --text-light: #8D6E63;
    }
    body { font-family: 'Quicksand', sans-serif; color: var(--text); background: var(--bg); scroll-behavior: smooth; }
    .font-doodle { font-family: 'Patrick Hand', cursive; }
    .doodle-border { border: 3px solid var(--primary); border-radius: 255px 15px 225px 15px / 15px 225px 15px 255px; }
    .doodle-border-2 { border: 3px dashed var(--secondary); border-radius: 30px 5px 30px 5px; }
    .btn-primary { background: var(--primary); color: white; transition: all 0.3s; border-radius: 255px 15px 225px 15px / 15px 225px 15px 255px; }
    .btn-primary:hover { background: var(--secondary); transform: rotate(-2deg) scale(1.05); }
    .card { background: white; border: 3px solid var(--primary); border-radius: 255px 15px 225px 15px / 15px 225px 15px 255px; transition: all 0.3s; }
    .card:hover { transform: rotate(2deg) scale(1.03); box-shadow: 8px 8px 0 var(--accent); }
    .wavy { position: relative; }
    .wavy::after { content: ''; position: absolute; bottom: -10px; left: 0; right: 0; height: 20px; background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120'%3E%3Cpath d='M0,60 C150,120 300,0 450,60 C600,120 750,0 900,60 C1050,120 1200,60 1200,60 L1200,120 L0,120 Z' fill='%23FFEAA7'/%3E%3C/svg%3E") repeat-x; }
    .sticker { display: inline-block; animation: wiggle 2s infinite; }
    @keyframes wiggle { 0%, 100% { transform: rotate(-3deg); } 50% { transform: rotate(3deg); } }
    .sparkle { position: absolute; font-size: 20px; animation: sparkle 1.5s infinite; }
    @keyframes sparkle { 0%, 100% { opacity: 0; transform: scale(0); } 50% { opacity: 1; transform: scale(1); } }
</style>

<nav class="sticky top-0 z-50 py-4" style="background: var(--bg); border-bottom: 3px dashed var(--primary);">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
        <a href="#" class="font-doodle text-4xl font-bold" style="color: var(--primary);">{{ $umkm->nama_toko }} </a>
        <div class="hidden md:flex space-x-6">
            <a href="#home" class="font-doodle text-lg hover:opacity-70" style="color: var(--text);">🏠 Beranda</a>
            <a href="#tentang" class="font-doodle text-lg hover:opacity-70" style="color: var(--text);">💝 Tentang</a>
            <a href="#produk" class="font-doodle text-lg hover:opacity-70" style="color: var(--text);"> Produk</a>
            <a href="#testimoni" class="font-doodle text-lg hover:opacity-70" style="color: var(--text);">💬 Testimoni</a>
            <a href="#kontak" class="font-doodle text-lg hover:opacity-70" style="color: var(--text);">📞 Kontak</a>
        </div>
        @php $waUrl = str_contains($umkm->no_hp ?? '', 'wa.me') ? $umkm->no_hp : 'https://wa.me/' . preg_replace('/^0/', '62', $umkm->no_hp ?? ''); @endphp
        <a href="{{ $waUrl }}" target="_blank" class="btn-primary px-6 py-2.5 font-doodle text-lg font-bold"><span class="sticker">💌</span> Pesan</a>
    </div>
</nav>

<section id="home" class="py-24 md:py-32 wavy" style="background: linear-gradient(135deg, #FFF5F7 0%, #FFE5EC 100%);">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
        <div class="space-y-6 relative">
            <span class="sticker inline-block px-4 py-1.5 rounded-full text-lg font-doodle font-bold" style="background: var(--accent); color: var(--primary);"> Selamat Datang!</span>
            <h1 class="font-doodle text-6xl md:text-7xl lg:text-8xl font-bold" style="color: var(--primary);">{{ $umkm->nama_toko }}</h1>
            <p class="text-xl font-doodle" style="color: var(--text-light);">{{ $umkm->deskripsi }}</p>
            <div class="flex gap-4">
                <a href="#produk" class="btn-primary px-8 py-3.5 font-doodle text-xl font-bold">🛍️ Lihat Koleksi</a>
                <a href="#tentang" class="doodle-border-2 px-8 py-3.5 font-doodle text-xl font-bold" style="color: var(--primary); background: white;">💖 Tentang</a>
            </div>
            <span class="sparkle" style="top: 20px; right: 10%; animation-delay: 0s;">✨</span>
            <span class="sparkle" style="top: 60%; right: 5%; animation-delay: 0.5s;">⭐</span>
            <span class="sparkle" style="top: 30%; right: 15%; animation-delay: 1s;">💫</span>
        </div>
        <div class="relative">
            <div class="doodle-border overflow-hidden shadow-2xl" style="background: white; padding: 10px;">
                @if($umkm->foto_hero)
                    <img src="{{ asset('storage/' . $umkm->foto_hero) }}" class="w-full h-[500px] object-cover" style="border-radius: 20px;">
                @else
                    <div class="w-full h-[500px] flex items-center justify-center font-doodle text-8xl font-bold" style="background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white;">{{ substr($umkm->nama_toko, 0, 2) }} 💕</div>
                @endif
            </div>
        </div>
    </div>
</section>

<section id="tentang" class="py-24" style="background: white;">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="font-doodle text-5xl md:text-6xl font-bold mb-4" style="color: var(--primary);">Tentang Kami 💝</h2>
        <div class="wavy mb-8" style="display: inline-block; width: 100px; height: 10px; background: var(--primary); border-radius: 50%;"></div>
        <div class="doodle-border-2 bg-[#FFF5F7] p-8 md:p-12 mb-12" style="background: white;">
            <p class="text-xl font-doodle italic" style="color: var(--text-light);">"{{ $umkm->cerita_usaha ?? $umkm->deskripsi }}"</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @if($umkm->tahun_berdiri)<div class="card p-8"><p class="font-doodle text-5xl font-bold mb-2" style="color: var(--primary);">{{ $umkm->tahun_berdiri }} 📅</p><p class="font-doodle text-lg" style="color: var(--text-light);">Tahun Berdiri</p></div>@endif
            <div class="card p-8"><p class="font-doodle text-5xl font-bold mb-2" style="color: var(--primary);">{{ $umkm->produk->count() }} 🎁</p><p class="font-doodle text-lg" style="color: var(--text-light);">Produk Lucu</p></div>
            <div class="card p-8"><p class="font-doodle text-5xl font-bold mb-2" style="color: var(--primary);">100% 💯</p><p class="font-doodle text-lg" style="color: var(--text-light);">Kualitas Oke</p></div>
        </div>
    </div>
</section>

<section id="produk" class="py-24" style="background: var(--bg);">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="font-doodle text-5xl md:text-6xl font-bold mb-4" style="color: var(--primary);">Produk Kami 🎁</h2>
            <div class="wavy" style="display: inline-block; width: 100px; height: 10px; background: var(--primary); border-radius: 50%;"></div>
        </div>
        @if($umkm->produk->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($umkm->produk as $item)
                <div class="card overflow-hidden">
                    <div class="h-64 bg-gray-100 overflow-hidden relative">
                        @if($item->foto)<img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover">@else<div class="w-full h-full flex items-center justify-center font-doodle text-6xl" style="background: var(--accent);">🎨</div>@endif
                        <div class="absolute top-4 right-4"><span class="px-3 py-1 rounded-full text-xs font-doodle font-bold {{ $item->status_stok == 'tersedia' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">{{ $item->status_stok == 'tersedia' ? '✨ Tersedia' : '😢 Habis' }}</span></div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-doodle text-2xl font-bold mb-2" style="color: var(--primary);">{{ $item->nama_produk }}</h3>
                        <p class="text-sm mb-4 font-doodle" style="color: var(--text-light);">{{ $item->deskripsi }}</p>
                        <div class="flex justify-between items-center pt-4" style="border-top: 2px dashed var(--accent);">
                            <span class="font-doodle text-2xl font-bold" style="color: var(--secondary);">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                            @if($item->status_stok == 'tersedia')
                                @php $waP = $waUrl . '?text=Halo%20' . urlencode($umkm->nama_toko) . ',%20saya%20mau%20beli%20' . urlencode($item->nama_produk); @endphp
                                <a href="{{ $waP }}" target="_blank" class="btn-primary w-12 h-12 flex items-center justify-center font-doodle text-xl">💬</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<section id="testimoni" class="py-24" style="background: white;">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="font-doodle text-5xl md:text-6xl font-bold mb-4" style="color: var(--primary);">Kata Mereka 💬</h2>
            <div class="wavy" style="display: inline-block; width: 100px; height: 10px; background: var(--primary); border-radius: 50%;"></div>
        </div>
        @php $listTestimoni = is_string($umkm->testimoni) ? json_decode($umkm->testimoni, true) : ($umkm->testimoni ?? []); @endphp
        @if(is_array($listTestimoni) && count($listTestimoni) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                @foreach($listTestimoni as $testi)
                <div class="card p-8 relative">
                    <div class="font-doodle text-6xl absolute top-4 left-4 opacity-20" style="color: var(--primary);">"</div>
                    <p class="font-doodle text-xl italic mb-6 relative z-10 pt-4" style="color: var(--text);">"{{ $testi['pesan'] ?? '' }}"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-doodle text-xl font-bold" style="background: var(--primary);">{{ substr($testi['nama'] ?? 'P', 0, 1) }}</div>
                        <div>
                            <p class="font-doodle font-bold text-lg" style="color: var(--primary);">{{ $testi['nama'] ?? 'Pelanggan' }} 💕</p>
                            <div class="text-yellow-400 text-lg">@for($i = 0; $i < ($testi['rating'] ?? 5); $i++)⭐@endfor</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
        <div class="max-w-2xl mx-auto doodle-border-2 p-8" style="background: var(--bg);">
            <h3 class="font-doodle text-3xl font-bold text-center mb-6" style="color: var(--primary);">Tulis Testimoni Kamu! ✏️</h3>
            @if(session('success_testimoni'))<div class="mb-4 bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-lg font-doodle">{{ session('success_testimoni') }} 🎉</div>@endif
            <form action="{{ route('website.kirimTestimoni', $umkm->slug) }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="nama_pengirim" required class="w-full px-4 py-3 font-doodle text-lg rounded-full border-2 border-dashed focus:outline-none" style="border-color: var(--primary); background: white;" placeholder="Nama kamu...">
                <textarea name="pesan_testimoni" rows="4" required class="w-full px-4 py-3 font-doodle text-lg rounded-2xl border-2 border-dashed focus:outline-none" style="border-color: var(--primary); background: white;" placeholder="Tulis pengalamanmu di sini..."></textarea>
                <button type="submit" class="w-full py-3 font-doodle text-xl font-bold text-white btn-primary">Kirim Testimoni 💌</button>
            </form>
        </div>
    </div>
</section>

<section id="kontak" class="py-24" style="background: var(--bg);">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="font-doodle text-5xl md:text-6xl font-bold mb-4" style="color: var(--primary);">Hubungi Kami 📞</h2>
            <div class="wavy" style="display: inline-block; width: 100px; height: 10px; background: var(--primary); border-radius: 50%;"></div>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-4">
                @if($umkm->alamat)<div class="card p-6 flex items-start gap-4"><div class="w-12 h-12 rounded-full flex items-center justify-center font-doodle text-2xl" style="background: var(--accent);">📍</div><div><h4 class="font-doodle font-bold text-xl" style="color: var(--primary);">Alamat</h4><p class="font-doodle" style="color: var(--text-light);">{{ $umkm->alamat }}</p></div></div>@endif
                @if($umkm->no_hp)<a href="{{ $waUrl }}" target="_blank" class="card p-6 flex items-start gap-4 no-underline"><div class="w-12 h-12 rounded-full flex items-center justify-center font-doodle text-2xl bg-green-100">💬</div><div><h4 class="font-doodle font-bold text-xl" style="color: var(--primary);">WhatsApp</h4><p class="font-doodle" style="color: var(--text-light);">{{ $umkm->no_hp }}</p></div></a>@endif
                @if($umkm->instagram)@php $igLink = str_contains($umkm->instagram, 'http') ? $umkm->instagram : 'https://instagram.com/' . ltrim($umkm->instagram, '@'); @endphp<a href="{{ $igLink }}" target="_blank" class="card p-6 flex items-start gap-4 no-underline"><div class="w-12 h-12 rounded-full flex items-center justify-center font-doodle text-2xl bg-pink-100">📷</div><div><h4 class="font-doodle font-bold text-xl" style="color: var(--primary);">Instagram</h4><p class="font-doodle" style="color: var(--text-light);">{{ $umkm->instagram }}</p></div></a>@endif
            </div>
            <div class="doodle-border overflow-hidden shadow-lg h-96">
                @if($umkm->alamat)<iframe src="https://www.google.com/maps?q={{ urlencode($umkm->alamat) }}&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy"></iframe>@else<div class="w-full h-full flex items-center justify-center font-doodle text-6xl" style="background: var(--accent);">🗺️</div>@endif
            </div>
        </div>
    </div>
</section>
@endsection