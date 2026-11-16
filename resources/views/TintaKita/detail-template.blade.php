<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview {{ $tpl['name'] }} - TintaKita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        :root {
            --primary: {{ $tpl['primary'] }};
            --secondary: {{ $tpl['secondary'] }};
            --accent: {{ $tpl['accent'] }};
            --bg: {{ $tpl['bg'] }};
        }
        .bg-primary { background-color: var(--primary); }
        .bg-secondary { background-color: var(--secondary); }
        .bg-accent { background-color: var(--accent); }
        .bg-bg { background-color: var(--bg); }
        .text-primary { color: var(--primary); }
        .text-secondary { color: var(--secondary); }
        .btn-primary { background-color: var(--primary); color: white; transition: all 0.3s; }
        .btn-primary:hover { opacity: 0.9; transform: translateY(-2px); }
        .btn-outline { border: 2px solid var(--primary); color: var(--primary); transition: all 0.3s; }
        .btn-outline:hover { background-color: var(--primary); color: white; }
        .card-hover { transition: all 0.4s; background: white; border: 1px solid #e5e7eb; }
        .card-hover:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        .section-divider { width: 60px; height: 3px; background: linear-gradient(90deg, var(--primary), var(--accent)); margin: 0 auto; }
        .preview-label { position: fixed; top: 20px; right: 20px; background: rgba(0,0,0,0.8); color: white; padding: 10px 20px; border-radius: 50px; font-size: 12px; font-weight: 600; z-index: 1000; backdrop-filter: blur(10px); }
    </style>
</head>
<body class="bg-bg antialiased">
    <div class="preview-label"><i class="fas fa-eye mr-2"></i> Preview: {{ $tpl['name'] }} - {{ $tpl['style'] }}</div>

    <nav class="sticky top-0 z-50 bg-bg/95 backdrop-blur-md border-b border-gray-200 py-4">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <a href="#" class="font-serif text-3xl font-bold text-primary">Toko Contoh</a>
            <div class="hidden md:flex space-x-8">
                <a href="#home" class="text-sm font-medium text-gray-700">Beranda</a>
                <a href="#tentang" class="text-sm font-medium text-gray-700">Tentang</a>
                <a href="#produk" class="text-sm font-medium text-gray-700">Produk</a>
                <a href="#testimoni" class="text-sm font-medium text-gray-700">Testimoni</a>
                <a href="#kontak" class="text-sm font-medium text-gray-700">Kontak</a>
            </div>
            <a href="#" class="btn-primary px-6 py-2.5 rounded-full text-sm font-semibold flex items-center gap-2"><i class="fab fa-whatsapp"></i> Pesan</a>
        </div>
    </nav>

    <section id="home" class="py-24 md:py-32 bg-white">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold uppercase bg-accent text-primary">✨ {{ $tpl['style'] }}</span>
                <h1 class="font-serif text-5xl md:text-6xl lg:text-7xl font-bold text-primary">Toko Contoh UMKM</h1>
                <p class="text-lg text-gray-600">Ini adalah preview bagaimana website UMKM Anda akan terlihat dengan template <strong>{{ $tpl['name'] }}</strong>. {{ $tpl['desc'] }}</p>
                <div class="flex gap-4">
                    <a href="#produk" class="btn-primary px-8 py-3.5 rounded-full font-semibold">Lihat Koleksi</a>
                    <a href="#tentang" class="btn-outline px-8 py-3.5 rounded-full font-semibold">Tentang Kami</a>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -inset-4 rounded-3xl opacity-20 blur-2xl bg-accent"></div>
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                    <div class="w-full h-[400px] md:h-[500px] flex items-center justify-center text-white font-serif text-8xl font-bold bg-gradient-to-br {{ $tpl['color'] }}">TC</div>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang" class="py-24 bg-bg">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4 text-primary">Tentang Kami</h2>
            <div class="section-divider mb-8"></div>
            <div class="bg-white p-8 md:p-12 rounded-2xl shadow-sm border border-gray-100 mb-12">
                <p class="text-lg italic text-gray-600">"Ini adalah contoh cerita usaha. Template {{ $tpl['name'] }} memberikan kesan {{ strtolower($tpl['category']) }} yang sempurna untuk bisnis Anda."</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl border border-gray-100"><p class="font-serif text-4xl font-bold mb-2 text-primary">2019</p><p class="text-sm uppercase font-semibold text-gray-500">Tahun Berdiri</p></div>
                <div class="bg-white p-8 rounded-2xl border border-gray-100"><p class="font-serif text-4xl font-bold mb-2 text-primary">24</p><p class="text-sm uppercase font-semibold text-gray-500">Produk Pilihan</p></div>
                <div class="bg-white p-8 rounded-2xl border border-gray-100"><p class="font-serif text-4xl font-bold mb-2 text-primary">100%</p><p class="text-sm uppercase font-semibold text-gray-500">Kualitas Terjamin</p></div>
            </div>
        </div>
    </section>

    <section id="produk" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4 text-primary">Koleksi Produk</h2>
                <div class="section-divider mb-6"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @for($i = 1; $i <= 3; $i++)
                <div class="card-hover rounded-2xl overflow-hidden">
                    <div class="h-64 bg-gray-100 overflow-hidden relative">
                        <div class="w-full h-full flex items-center justify-center bg-accent"><i class="fas fa-box text-5xl text-white opacity-50"></i></div>
                        <div class="absolute top-4 right-4"><span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800">Tersedia</span></div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-serif text-xl font-bold mb-2 text-primary">Produk Contoh {{ $i }}</h3>
                        <p class="text-sm mb-4 text-gray-500">Deskripsi singkat produk akan ditampilkan di sini.</p>
                        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                            <span class="text-2xl font-bold text-secondary">Rp 50.000</span>
                            <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center text-white bg-green-500"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <section id="testimoni" class="py-24 bg-bg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4 text-primary">Apa Kata Mereka?</h2>
                <div class="section-divider mb-6"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach([['nama' => 'Sarah', 'pesan' => 'Pelayanan sangat memuaskan!'], ['nama' => 'Budi', 'pesan' => 'Produk berkualitas tinggi.'], ['nama' => 'Dewi', 'pesan' => 'Sangat recommended!']] as $t)
                <div class="card-hover p-8 rounded-2xl relative">
                    <i class="fas fa-quote-left text-4xl absolute top-6 left-6 opacity-10 text-primary"></i>
                    <p class="text-lg italic mb-6 relative z-10 pt-4 text-gray-700">"{{ $t['pesan'] }}"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold bg-secondary">{{ substr($t['nama'], 0, 1) }}</div>
                        <div>
                            <p class="font-bold text-primary">{{ $t['nama'] }}</p>
                            <div class="text-yellow-400 text-xs">⭐⭐⭐⭐⭐</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="kontak" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4 text-primary">Hubungi Kami</h2>
                <div class="section-divider mb-6"></div>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <div class="bg-bg p-6 rounded-xl border border-gray-200 flex items-start gap-4"><div class="w-12 h-12 rounded-xl flex items-center justify-center bg-accent"><i class="fas fa-map-marker-alt text-primary"></i></div><div><h4 class="font-bold text-primary">Alamat</h4><p class="text-gray-600">Jl. Contoh No. 123</p></div></div>
                    <div class="bg-bg p-6 rounded-xl border border-gray-200 flex items-start gap-4"><div class="w-12 h-12 rounded-xl flex items-center justify-center bg-green-100"><i class="fab fa-whatsapp text-green-600"></i></div><div><h4 class="font-bold text-primary">WhatsApp</h4><p class="text-gray-600">0812-3456-7890</p></div></div>
                    <div class="bg-bg p-6 rounded-xl border border-gray-200 flex items-start gap-4"><div class="w-12 h-12 rounded-xl flex items-center justify-center bg-pink-100"><i class="fab fa-instagram text-pink-600"></i></div><div><h4 class="font-bold text-primary">Instagram</h4><p class="text-gray-600">@tokocontoh</p></div></div>
                </div>
                <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-200 h-96 bg-bg flex items-center justify-center">
                    <div class="text-center"><i class="fas fa-map-marked-alt text-6xl mb-4 text-primary opacity-50"></i><p class="font-medium text-gray-500">Google Maps akan muncul di sini</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 text-white relative overflow-hidden bg-primary">
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h2 class="font-serif text-4xl md:text-5xl font-bold mb-6">Suka dengan Template Ini?</h2>
            <p class="text-lg opacity-90 mb-10 max-w-2xl mx-auto">Template <strong>{{ $tpl['name'] }}</strong> akan membuat website UMKM Anda terlihat profesional.</p>
            <a href="https://wa.me/6289519085299?text=Halo%20TintaKita,%20saya%20tertarik%20dengan%20template%20{{ urlencode($tpl['name']) }}" target="_blank" class="inline-flex items-center gap-3 px-10 py-4 rounded-full font-bold text-lg hover:scale-105 transition shadow-xl bg-white text-primary">
                <i class="fab fa-whatsapp text-2xl"></i> Pesan Template Ini
            </a>
        </div>
    </section>

    <footer class="bg-gray-900 text-gray-400 py-8 text-center text-sm">
        <p>Ini adalah preview template. Website asli akan memiliki data UMKM Anda.</p>
    </footer>

    <a href="/" class="fixed bottom-6 left-6 bg-white shadow-2xl border border-gray-200 px-6 py-3 rounded-full font-semibold text-gray-800 hover:bg-gray-50 transition flex items-center gap-2 z-50">
        <i class="fas fa-arrow-left"></i> Kembali ke TintaKita
    </a>
</body>
</html>