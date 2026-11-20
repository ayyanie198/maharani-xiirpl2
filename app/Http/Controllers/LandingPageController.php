<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;
use App\Models\Produk;
use App\Models\Ulasan;

class LandingPageController extends Controller
{
    // ============================================
    // 1. LANDING PAGE UTAMA
    // ============================================
    public function index()
    {
        // Foto Hero
        $heroPortofolio = Portofolio::where('status_website', 'aktif')
            ->whereNotNull('foto_hero')
            ->first();
        $heroImage = $heroPortofolio ? asset('storage/' . $heroPortofolio->foto_hero) : null;

        // Ulasan yang sudah disetujui (status = 1)
        $ulasanDb = [];
        try {
            $ulasanDb = Ulasan::where('status', 1)
                ->latest()
                ->get()
                ->map(function ($u) {
                    return [
                        'nama'   => $u->nama,
                        'pesan'  => $u->pesan,
                        'rating' => $u->rating,
                        'usaha'  => 'Pengguna Doodlune',
                    ];
                })
                ->toArray();
        } catch (\Exception $e) {
            $ulasanDb = [];
        }

        // Ulasan default
        $defaultUlasan = [
            ['nama' => 'Siti Aminah', 'pesan' => 'Website toko kue saya jadi kelihatan mewah banget! Admin Doodlune sabar bimbing dari awal sampai live. Recommended!', 'rating' => 5, 'usaha' => 'Sweet Bakery'],
            ['nama' => 'Rina Wulandari', 'pesan' => 'Prosesnya cepat banget, cuma 2 hari website toko baju saya sudah jadi. Desainnya aesthetic dan gampang diakses lewat HP.', 'rating' => 5, 'usaha' => 'Rina Fashion'],
            ['nama' => 'Budi Santoso', 'pesan' => 'Awalnya ragu, tapi setelah lihat hasil preview langsung yakin. Fitur WhatsApp-nya bikin pelanggan makin gampang order.', 'rating' => 5, 'usaha' => 'Kopi Senja'],
            ['nama' => 'Dewi Lestari', 'pesan' => 'Pelanggan saya jadi lebih percaya karena punya website resmi. Terima kasih Doodlune!', 'rating' => 5, 'usaha' => 'Dewi Craft'],
        ];

        $ulasanList = array_merge($ulasanDb, $defaultUlasan);

        // Statistik
        $totalUmkm = Portofolio::count();
        $totalAktif = Portofolio::where('status_website', 'aktif')->count();
        $totalProduk = Produk::count();

        // Template
        $templates = [
            ['id' => 'template-1', 'name' => 'Pink Doodle Lucu', 'color' => 'from-pink-400 to-pink-600', 'desc' => 'Desain playful dengan sentuhan doodle dan warna pastel pink cerah.'],
            ['id' => 'template-2', 'name' => 'Biru Liquid Glass', 'color' => 'from-blue-400 to-cyan-500', 'desc' => 'Tampilan modern dengan efek kaca liquid yang estetik.'],
            ['id' => 'template-3', 'name' => 'Coklat Elegan', 'color' => 'from-[#5D4037] to-[#8D6E63]', 'desc' => 'Nuansa hangat dan mewah untuk bisnis kelas atas.'],
            ['id' => 'template-4', 'name' => 'Hijau Aesthetic', 'color' => 'from-emerald-500 to-green-600', 'desc' => 'Segar, natural, dan harmonis dengan alam.'],
        ];

        return view('Doodlune.index', compact(
            'templates', 'ulasanList', 'heroImage',
            'totalUmkm', 'totalAktif', 'totalProduk'
        ));
    }

    // ============================================
    // 2. SIMPAN ULASAN BARU (DARI FORM)
    // ============================================
    public function storeUlasan(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:100',
            'pesan'  => 'required|string|min:10',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Ulasan::create([
            'nama'   => $request->nama,
            'pesan'  => $request->pesan,
            'rating' => $request->rating,
            'status' => 0, // Pending / Menunggu Moderasi
        ]);

        return back()->with('success_ulasan', 'Terima kasih! Ulasan kamu sedang dimoderasi oleh admin dan akan tampil setelah disetujui. ⏳');
    }

    // ============================================
    // 3. REDIRECT KE SECTION TENTANG
    // ============================================
    public function tentang()
    {
        return redirect()->route('home') . '#tentang';
    }

    // ============================================
    // 4. REDIRECT KE SECTION TEMPLATE
    // ============================================
    public function templates()
    {
        return redirect()->route('home') . '#template';
    }

    // ============================================
    // 5. 🌟 DETAIL TEMPLATE (INI YANG TADI HILANG!)
    // ============================================
    public function detailTemplate($template)
    {
        $templates = [
            'template-1' => [
                'id' => 'template-1', 'name' => 'Pink Doodle Lucu', 'category' => 'Kreatif',
                'desc' => 'Desain playful dengan sentuhan doodle yang menggemaskan.',
                'primary' => '#FF6B9D', 'bg' => '#FFF5F7', 'font' => "'Plus Jakarta Sans', sans-serif",
                'radius' => '1.5rem', 'glass' => false,
            ],
            'template-2' => [
                'id' => 'template-2', 'name' => 'Biru Liquid Glass', 'category' => 'Modern',
                'desc' => 'Tampilan modern dengan efek kaca liquid yang estetik.',
                'primary' => '#3B82F6', 'bg' => '#F0F9FF', 'font' => "'Inter', sans-serif",
                'radius' => '1rem', 'glass' => true,
            ],
            'template-3' => [
                'id' => 'template-3', 'name' => 'Coklat Elegan', 'category' => 'Premium',
                'desc' => 'Nuansa hangat dan mewah untuk bisnis kelas atas.',
                'primary' => '#5D4037', 'bg' => '#FAF7F5', 'font' => "'Playfair Display', serif",
                'radius' => '0.5rem', 'glass' => true,
            ],
            'template-4' => [
                'id' => 'template-4', 'name' => 'Hijau Aesthetic', 'category' => 'Natural',
                'desc' => 'Segar, natural, dan harmonis dengan alam.',
                'primary' => '#059669', 'bg' => '#F0FDF4', 'font' => "'Plus Jakarta Sans', sans-serif",
                'radius' => '2rem', 'glass' => true,
            ]
        ];

        if (!isset($templates[$template])) {
            abort(404, 'Template tidak ditemukan');
        }

        $tpl = $templates[$template];
        return view('Doodlune.detail-template', compact('tpl'));
    }
}