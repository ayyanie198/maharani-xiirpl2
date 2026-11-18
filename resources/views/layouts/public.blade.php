<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $umkm->nama_toko ?? 'UMKM' }} - Doodlune 🌸</title>
    <meta name="description" content="{{ $umkm->deskripsi ?? 'Website Portofolio UMKM oleh Doodlune' }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; }
        .font-heading { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#FFF5F7] text-[#4A3040] font-sans antialiased">

    @yield('content')

    <!-- Footer Global Doodlune -->
    <footer class="bg-[#4A3040] text-white py-12 mt-12">
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Kolom 1: Brand -->
            <div>
                <h3 class="font-heading text-2xl font-bold mb-4 text-[#FFD1DC]">{{ $umkm->nama_toko ?? 'UMKM' }} 🌸</h3>
                <p class="text-sm text-white/80 leading-relaxed">{{ $umkm->deskripsi ?? 'Website portofolio UMKM yang dikelola dengan cinta oleh Doodlune.' }}</p>
            </div>
            
            <!-- Kolom 2: Kontak -->
            <div>
                <h4 class="font-heading text-lg font-semibold mb-4 text-[#FFD1DC]">Kontak Kami</h4>
                <ul class="space-y-3 text-sm text-white/90">
                    @if(!empty($umkm->no_hp))
                        <li class="flex items-center">
                            <i class="fab fa-whatsapp mr-3 text-[#25D366] text-lg"></i> {{ $umkm->no_hp }}
                        </li>
                    @endif
                    @if(!empty($umkm->instagram))
                        <li class="flex items-center">
                            <i class="fab fa-instagram mr-3 text-[#FF6B9D] text-lg"></i> {{ $umkm->instagram }}
                        </li>
                    @endif
                    @if(!empty($umkm->alamat))
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mr-3 text-[#FF8FAB] text-lg mt-1"></i> {{ $umkm->alamat }}
                        </li>
                    @endif
                </ul>
            </div>
            
            <!-- Kolom 3: Jam Operasional -->
            <div>
                <h4 class="font-heading text-lg font-semibold mb-4 text-[#FFD1DC]">Jam Operasional</h4>
                <p class="text-sm text-white/80 flex items-center">
                    <i class="far fa-clock mr-3 text-[#FF8FAB]"></i>
                    {{ $umkm->jam_operasional ?? 'Senin - Sabtu: 08.00 - 17.00' }}
                </p>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="border-t border-white/10 mt-10 pt-6 text-center text-xs text-white/60">
            &copy; {{ date('Y') }} {{ $umkm->nama_toko ?? 'UMKM' }}. Dibuat dengan 💖 oleh <span class="text-[#FF6B9D] font-bold">Doodlune</span>.
        </div>
    </footer>

</body>
</html>