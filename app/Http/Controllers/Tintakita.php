<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tintakita extends Controller
{
    public function index()
    {
        $templates = [
            [
                'id' => 'template-1',
                'name' => 'Elegan Coklat',
                'category' => 'Premium',
                'desc' => 'Tampilan mewah dengan nuansa coklat hangat. Cocok untuk bisnis kuliner, fashion, dan kerajinan.',
                'color' => 'from-[#5D4037] to-[#8D6E63]',
                'primary' => '#5D4037',
                'secondary' => '#8D6E63',
                'accent' => '#D7CCC8',
                'bg' => '#FAF7F5',
                'style' => 'Elegan & Mewah'
            ],
            [
                'id' => 'template-2',
                'name' => 'Doodle Lucu',
                'category' => 'Kreatif',
                'desc' => 'Desain playful dengan sentuhan doodle yang menggemaskan. Sempurna untuk UMKM anak muda dan stationery.',
                'color' => 'from-[#FF9A8B] to-[#FF6A88]',
                'primary' => '#FF6B9D',
                'secondary' => '#C44569',
                'accent' => '#FFEAA7',
                'bg' => '#FFF5F7',
                'style' => 'Lucu & Playful'
            ],
            [
                'id' => 'template-3',
                'name' => 'Biru Modern',
                'category' => 'Profesional',
                'desc' => 'Tampilan bersih dan profesional dengan palet biru yang menenangkan. Cocok untuk bisnis jasa dan teknologi.',
                'color' => 'from-[#1E3A8A] to-[#3B82F6]',
                'primary' => '#1E40AF',
                'secondary' => '#3B82F6',
                'accent' => '#DBEAFE',
                'bg' => '#EFF6FF',
                'style' => 'Modern & Profesional'
            ],
            [
                'id' => 'template-4',
                'name' => 'Glass Premium',
                'category' => 'Eksklusif',
                'desc' => 'Desain glass morphism dengan perpaduan hitam dan coklat. Cocok untuk butik, salon, dan bisnis premium.',
                'color' => 'from-[#1a1a1a] to-[#3E2723]',
                'primary' => '#2C1810',
                'secondary' => '#8B6F47',
                'accent' => '#D4A574',
                'bg' => '#0f0f0f',
                'style' => 'Glass & Eksklusif'
            ]
        ];

        return view('Tintakita.index', compact('templates'));
    }

    public function tentang() 
    { 
        return redirect()->route('home') . '#tentang'; 
    }
    
    public function templates() 
    { 
        return redirect()->route('home') . '#template'; 
    }
    
    public function detailTemplate($template)
    {
        $templates = [
            'template-1' => [
                'id' => 'template-1',
                'name' => 'Elegan Coklat',
                'category' => 'Premium',
                'desc' => 'Tampilan mewah dengan nuansa coklat hangat yang memberikan kesan profesional dan terpercaya.',
                'color' => 'from-[#5D4037] to-[#8D6E63]',
                'primary' => '#5D4037',
                'secondary' => '#8D6E63',
                'accent' => '#D7CCC8',
                'bg' => '#FAF7F5',
                'style' => 'Elegan & Mewah',
                'features' => [
                    'Desain Responsif (Mobile, Tablet, Desktop)',
                    'Palet Warna Coklat Hangat & Mewah',
                    'Typography Serif Elegan',
                    'Katalog Produk dengan Foto',
                    'Integrasi WhatsApp Otomatis',
                    'Section Testimoni Pelanggan',
                    'Google Maps Terintegrasi',
                    'Footer dengan Info Kontak Lengkap'
                ]
            ],
            'template-2' => [
                'id' => 'template-2',
                'name' => 'Doodle Lucu',
                'category' => 'Kreatif',
                'desc' => 'Desain playful dengan sentuhan doodle yang menggemaskan dan warna pastel cerah.',
                'color' => 'from-[#FF9A8B] to-[#FF6A88]',
                'primary' => '#FF6B9D',
                'secondary' => '#C44569',
                'accent' => '#FFEAA7',
                'bg' => '#FFF5F7',
                'style' => 'Lucu & Playful',
                'features' => [
                    'Font Doodle Playful & Lucu',
                    'Warna Pastel Ceria',
                    'Border Melengkung & Doodle',
                    'Animasi Hover Menggemaskan',
                    'Katalog Produk dengan Stiker',
                    'Testimoni dengan Emoji',
                    'Integrasi WhatsApp & Instagram',
                    'Desain Mobile-First'
                ]
            ],
            'template-3' => [
                'id' => 'template-3',
                'name' => 'Biru Modern',
                'category' => 'Profesional',
                'desc' => 'Tampilan bersih dan profesional dengan palet biru yang menenangkan dan modern.',
                'color' => 'from-[#1E3A8A] to-[#3B82F6]',
                'primary' => '#1E40AF',
                'secondary' => '#3B82F6',
                'accent' => '#DBEAFE',
                'bg' => '#EFF6FF',
                'style' => 'Modern & Profesional',
                'features' => [
                    'Gradient Biru Modern',
                    'Layout Clean & Minimalis',
                    'Typography Sans-Serif Modern',
                    'Katalog Produk dengan Card',
                    'Integrasi WhatsApp Otomatis',
                    'Section Testimoni Rating',
                    'Google Maps Terintegrasi',
                    'Animasi Smooth & Profesional'
                ]
            ],
            'template-4' => [
                'id' => 'template-4',
                'name' => 'Glass Premium',
                'category' => 'Eksklusif',
                'desc' => 'Desain glass morphism dengan perpaduan hitam dan coklat yang eksklusif dan mewah.',
                'color' => 'from-[#1a1a1a] to-[#3E2723]',
                'primary' => '#2C1810',
                'secondary' => '#8B6F47',
                'accent' => '#D4A574',
                'bg' => '#0f0f0f',
                'style' => 'Glass & Eksklusif',
                'features' => [
                    'Glass Morphism Effect',
                    'Background Gelap Premium',
                    'Aksen Emas & Coklat',
                    'Blur & Transparency Effect',
                    'Katalog Produk Mewah',
                    'Testimoni dengan Rating Bintang',
                    'Integrasi WhatsApp & Instagram',
                    'Typography Serif Klasik'
                ]
            ]
        ];

        if (!isset($templates[$template])) {
            abort(404, 'Template tidak ditemukan');
        }

        $tpl = $templates[$template];
        return view('Tintakita.detail-template', compact('tpl'));
    }
}