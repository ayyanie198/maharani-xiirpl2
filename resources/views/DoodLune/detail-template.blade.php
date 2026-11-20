<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview {{ $tpl['name'] ?? 'Template' }} - Doodlune 🌸</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- 🌟 BUG FIXED: Load SEMUA font yang dibutuhkan sekaligus (bukan pakai urlencode yang salah) --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: {{ $tpl['primary'] ?? '#FF6B9D' }};
            --secondary: {{ $tpl['secondary'] ?? '#C44569' }};
            --accent: {{ $tpl['accent'] ?? '#FFD1DC' }};
            --bg: {{ $tpl['bg'] ?? '#FFF5F7' }};
            --radius: {{ $tpl['radius'] ?? '1rem' }};
        }

        body {
            font-family: {{ $tpl['font'] ?? 'Inter, sans-serif' }};
            background-color: var(--bg);
            color: #333;
            scroll-behavior: smooth;
        }

        .font-dynamic { font-family: {{ $tpl['font'] ?? 'Inter, sans-serif' }}; }

        /* Dynamic Glass / Doodle Effect */
        .glass-dynamic {
            @if($tpl['glass'] ?? false)
                background: rgba(255, 255, 255, 0.65);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border: 1px solid rgba(255, 255, 255, 0.5);
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
            @else
                background: white;
                border: 2px solid var(--primary);
                box-shadow: 4px 4px 0 var(--accent);
            @endif
        }

        .card-dynamic {
            background: white;
            border-radius: var(--radius);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            @if($tpl['glass'] ?? false)
                border: 1px solid rgba(255, 255, 255, 0.6);
                box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            @else
                border: 2px solid var(--accent);
            @endif
        }
        .card-dynamic:hover {
            @if($tpl['glass'] ?? false)
                transform: translateY(-8px);
                box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.1);
            @else
                transform: translateY(-4px) rotate(1deg);
                box-shadow: 8px 8px 0 var(--accent);
            @endif
        }

        .btn-primary-dynamic {
            background: var(--primary);
            color: white;
            border-radius: var(--radius);
            transition: all 0.3s;
        }
        .btn-primary-dynamic:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(0,0,0,0.2);
        }

        .divider-dynamic {
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            margin: 0 auto;
            border-radius: 2px;
        }

        .preview-label {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            z-index: 1000;
            backdrop-filter: blur(10px);
            font-family: 'Inter', sans-serif;
        }

        /* Rating bintang interaktif di form */
        .star-input { display: flex; gap: 4px; cursor: pointer; }
        .star-input i { font-size: 24px; color: #ddd; transition: color 0.2s; }
        .star-input i.active { color: #FBBF24; }
    </style>
</head>
<body class="antialiased">

    <div class="preview-label">
        <i class="fas fa-eye mr-2"></i> Preview: {{ $tpl['name'] ?? 'Template' }}
    </div>

    <!-- Navbar -->
    <nav class="sticky top-0 z-50 py-4 glass-dynamic">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <a href="#home" class="font-dynamic text-3xl font-bold" style="color: var(--primary);">
                🌸 Toko Contoh
            </a>
            <div class="hidden md:flex space-x-8 font-dynamic">
                <a href="#home" class="hover:opacity-70 transition">Beranda</a>
                <a href="#tentang" class="hover:opacity-70 transition">Tentang</a>
                <a href="#produk" class="hover:opacity-70 transition">Produk</a>
                <a href="#ulasan" class="hover:opacity-70 transition">Ulasan</a>
                <a href="#kontak" class="hover:opacity-70 transition">Kontak</a>
            </div>
            <a href="https://wa.me/6289519085299" target="_blank" class="btn-primary-dynamic px-6 py-2.5 font-bold flex items-center gap-2">
                <i class="fab fa-whatsapp"></i> Pesan
            </a>
        </div>
    </nav>

    <!-- Hero -->
    <section id="home" class="py-24 md:py-32" style="background: linear-gradient(135deg, var(--bg) 0%, var(--accent) 100%);">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <span class="inline-block px-4 py-1.5 rounded-full text-sm font-bold glass-dynamic" style="color: var(--primary);">
                    ✨ {{ $tpl['style'] ?? $tpl['category'] ?? 'Premium' }}
                </span>
                <h1 class="font-dynamic text-5xl md:text-6xl lg:text-7xl font-bold" style="color: var(--primary);">
                    Toko Contoh UMKM
                </h1>
                <p class="text-lg opacity-80">
                    Ini adalah preview bagaimana website Anda akan terlihat dengan template <strong>{{ $tpl['name'] }}</strong>. {{ $tpl['desc'] ?? '' }}
                </p>
                <div class="flex gap-4 flex-wrap">
                    <a href="#produk" class="btn-primary-dynamic px-8 py-3.5 font-bold text-lg">Lihat Koleksi</a>
                    <a href="#tentang" class="px-8 py-3.5 rounded-[var(--radius)] font-bold text-lg transition border-2" style="border-color: var(--primary); color: var(--primary);">Tentang Kami</a>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -inset-4 rounded-[var(--radius)] opacity-30 blur-2xl" style="background: var(--primary);"></div>
                {{-- 🌟 BUG FIXED: gradient pakai warna tema, bukan key 'color' yang nggak ada --}}
                <div class="relative rounded-[var(--radius)] overflow-hidden shadow-2xl border-4 border-white">
                    <div class="w-full h-[400px] md:h-[500px] flex items-center justify-center text-white font-dynamic text-8xl font-bold"
                         style="background: linear-gradient(135deg, var(--primary), var(--secondary));">
                        TC
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang -->
    <section id="tentang" class="py-24" style="background: var(--bg);">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="font-dynamic text-4xl md:text-5xl font-bold mb-4" style="color: var(--primary);">Tentang Kami</h2>
            <div class="divider-dynamic mb-8"></div>
            <div class="card-dynamic p-8 md:p-12 mb-12">
                <p class="text-xl italic opacity-70">"Ini adalah contoh cerita usaha. Template {{ $tpl['name'] }} memberikan kesan {{ strtolower($tpl['category'] ?? 'premium') }} yang sempurna untuk bisnis Anda."</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card-dynamic p-8">
                    <p class="font-dynamic text-4xl font-bold mb-2" style="color: var(--primary);">2019</p>
                    <p class="text-sm uppercase font-semibold opacity-60">Tahun Berdiri</p>
                </div>
                <div class="card-dynamic p-8">
                    <p class="font-dynamic text-4xl font-bold mb-2" style="color: var(--primary);">24</p>
                    <p class="text-sm uppercase font-semibold opacity-60">Produk Pilihan</p>
                </div>
                <div class="card-dynamic p-8">
                    <p class="font-dynamic text-4xl font-bold mb-2" style="color: var(--primary);">100%</p>
                    <p class="text-sm uppercase font-semibold opacity-60">Kualitas Terjamin</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Produk -->
    <section id="produk" class="py-24" style="background: white;">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="font-dynamic text-4xl md:text-5xl font-bold mb-4" style="color: var(--primary);">Koleksi Produk</h2>
                <div class="divider-dynamic mb-6"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @for($i = 1; $i <= 3; $i++)
                <div class="card-dynamic overflow-hidden">
                    <div class="h-64 overflow-hidden relative" style="background: var(--accent);">
                        <div class="w-full h-full flex items-center justify-center opacity-50">
                            <i class="fas fa-box text-5xl" style="color: var(--primary);"></i>
                        </div>
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-white text-green-700 shadow-sm">Tersedia</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-dynamic text-xl font-bold mb-2" style="color: var(--primary);">Produk Contoh {{ $i }}</h3>
                        <p class="text-sm mb-4 opacity-60">Deskripsi singkat produk yang sangat menarik dan berkualitas tinggi.</p>
                        <div class="flex justify-between items-center pt-4" style="border-top: 1px solid var(--accent);">
                            <span class="text-2xl font-bold" style="color: var(--secondary);">Rp 50.000</span>
                            <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center text-white transition hover:scale-110" style="background: #25D366;">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    {{-- ============================================================= --}}
    {{-- 🌟 SECTION BARU: ULASAN PELANGGAN + FORM TAMBAH ULASAN          --}}
    {{-- ============================================================= --}}
    <section id="ulasan" class="py-24" style="background: var(--bg);">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Header Section -->
            <div class="text-center mb-16">
                <h2 class="font-dynamic text-4xl md:text-5xl font-bold mb-4" style="color: var(--primary);">Ulasan Pelanggan 💬</h2>
                <div class="divider-dynamic mb-6"></div>
                <p class="text-lg opacity-70">Apa kata mereka tentang layanan kami</p>
            </div>

            <!-- Grid Contoh Testimoni -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                @php
                    $contohUlasan = [
                        ['nama' => 'Siti Aminah', 'usaha' => 'Sweet Bakery', 'rating' => 5, 'pesan' => 'Website toko kue saya jadi kelihatan mewah banget! Admin Doodlune sabar bimbing dari awal sampai live.'],
                        ['nama' => 'Rina Wulandari', 'usaha' => 'Rina Fashion', 'rating' => 5, 'pesan' => 'Prosesnya cepat banget, cuma 2 hari website toko baju saya sudah jadi. Desainnya aesthetic dan gampang diakses lewat HP.'],
                        ['nama' => 'Budi Santoso', 'usaha' => 'Kopi Senja', 'rating' => 5, 'pesan' => 'Pelanggan saya jadi lebih percaya karena punya website resmi. Fitur WhatsApp-nya bikin order makin gampang.'],
                    ];
                @endphp
                @foreach($contohUlasan as $u)
                <div class="card-dynamic p-8 relative">
                    <i class="fas fa-quote-right text-4xl absolute top-6 right-6 opacity-20" style="color: var(--primary);"></i>
                    <div class="flex text-yellow-400 text-sm mb-4">
                        @for($i = 0; $i < $u['rating']; $i++)<i class="fas fa-star"></i>@endfor
                    </div>
                    <p class="italic opacity-80 mb-6 leading-relaxed">"{{ $u['pesan'] }}"</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg" style="background: linear-gradient(135deg, var(--primary), var(--secondary));">
                            {{ substr($u['nama'], 0, 1) }}
                        </div>
                        <div>
                            <p class="font-dynamic font-bold" style="color: var(--primary);">{{ $u['nama'] }}</p>
                            <p class="text-xs opacity-60">{{ $u['usaha'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- 🌟 FORM TAMBAH ULASAN (Bisa Nambah!) -->
            <div class="max-w-2xl mx-auto card-dynamic p-8 md:p-10">
                <h3 class="font-dynamic text-2xl font-bold text-center mb-2" style="color: var(--primary);">Bagikan Pengalamanmu ✍️</h3>
                <p class="text-center mb-6 opacity-70">Sudah pernah belanja di sini? Tinggalkan ulasanmu!</p>

                {{-- Notifikasi sukses (muncul setelah submit) --}}
                <div id="ulasan-success" class="hidden mb-6 p-4 rounded-xl text-sm flex items-center" style="background: rgba(16,185,129,0.15); color: #065f46; border-left: 4px solid #10B981;">
                    <i class="fas fa-check-circle mr-3 text-lg"></i>
                    <span>Terima kasih! Ulasan kamu sedang dimoderasi oleh admin dan akan tampil setelah disetujui. ⏳</span>
                </div>

                <form id="ulasanForm" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold mb-2" style="color: var(--primary);">Nama Kamu</label>
                        <input type="text" name="nama" required
                            class="w-full px-5 py-3 rounded-[var(--radius)] border-2 focus:outline-none transition"
                            style="border-color: var(--accent); background: white;"
                            onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--accent)'"
                            placeholder="Contoh: Budi Santoso">
                    </div>

                    <div>
                        <label class="block text-sm font-bold mb-2" style="color: var(--primary);">Rating</label>
                        <div class="star-input" id="starInput">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star" data-value="{{ $i }}"></i>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="ratingValue" value="5" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold mb-2" style="color: var(--primary);">Ulasan Kamu <span class="text-red-500 text-xs">(min. 10 karakter)</span></label>
                        <textarea name="pesan" rows="4" required minlength="10"
                            class="w-full px-5 py-3 rounded-[var(--radius)] border-2 focus:outline-none transition resize-none"
                            style="border-color: var(--accent); background: white;"
                            onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--accent)'"
                            placeholder="Ceritakan pengalamanmu belanja di sini..."></textarea>
                    </div>

                    <button type="submit" class="btn-primary-dynamic w-full py-4 font-bold text-lg">
                        <i class="fas fa-paper-plane mr-2"></i> Kirim Ulasan
                    </button>

                    <p class="text-center text-xs opacity-60 mt-3">
                        <i class="fas fa-shield-alt mr-1"></i> Di website asli, ulasan akan dimoderasi admin sebelum tampil.
                    </p>
                </form>
            </div>

        </div>
    </section>

    <!-- CTA -->
    <section id="kontak" class="py-24 text-white relative overflow-hidden" style="background: var(--primary);">
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h2 class="font-dynamic text-4xl md:text-5xl font-bold mb-6">Suka dengan Template Ini?</h2>
            <p class="text-lg opacity-90 mb-10 max-w-2xl mx-auto">Template <strong>{{ $tpl['name'] }}</strong> akan membuat website UMKM Anda terlihat profesional.</p>
            <a href="https://wa.me/6289519085299?text=Halo%20Doodlune,%20saya%20tertarik%20dengan%20template%20{{ urlencode($tpl['name'] ?? 'Template') }}" target="_blank" class="inline-flex items-center gap-3 px-10 py-4 rounded-[var(--radius)] font-bold text-lg hover:scale-105 transition shadow-xl bg-white" style="color: var(--primary);">
                <i class="fab fa-whatsapp text-2xl text-green-500"></i> Pesan Template Ini
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 text-center text-sm" style="background: var(--bg); color: var(--primary); border-top: 1px solid var(--accent);">
        <p>Preview Template by <strong>Doodlune</strong>. Website asli akan menyesuaikan data UMKM Anda.</p>
    </footer>

    <a href="/" class="fixed bottom-6 left-6 bg-white shadow-2xl px-6 py-3 rounded-full font-semibold text-gray-800 hover:bg-gray-50 transition flex items-center gap-2 z-50 border" style="border-color: var(--accent);">
        <i class="fas fa-arrow-left" style="color: var(--primary);"></i> Kembali
    </a>

    {{-- 🌟 SCRIPT: Rating bintang + simulasi submit form --}}
    <script>
        // Rating bintang interaktif
        const stars = document.querySelectorAll('#starInput i');
        const ratingValue = document.getElementById('ratingValue');
        stars.forEach((star, idx) => {
            star.addEventListener('click', () => {
                const val = idx + 1;
                ratingValue.value = val;
                stars.forEach((s, i) => s.classList.toggle('active', i < val));
            });
        });
        // Default 5 bintang aktif
        stars.forEach(s => s.classList.add('active'));

        // Simulasi submit (preview tidak punya id UMKM, jadi hanya demo)
        document.getElementById('ulasanForm').addEventListener('submit', (e) => {
            e.preventDefault();
            document.getElementById('ulasan-success').classList.remove('hidden');
            e.target.reset();
            stars.forEach(s => s.classList.add('active'));
            ratingValue.value = 5;
            document.getElementById('ulasan-success').scrollIntoView({ behavior: 'smooth', block: 'center' });
        });
    </script>
</body>
</html>