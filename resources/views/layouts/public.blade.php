<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $umkm->nama_toko ?? 'UMKM' }} - TintaKita</title>
    <meta name="description" content="{{ $umkm->deskripsi ?? 'Website UMKM' }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        html { scroll-behavior: smooth; }
        .font-heading { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">

    @yield('content')

    <!-- Footer Global -->
    <footer class="bg-gray-900 text-gray-300 py-10">
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-white text-xl font-bold mb-4">{{ $umkm->nama_toko }}</h3>
                <p class="text-sm text-gray-400">{{ $umkm->deskripsi }}</p>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-4">Kontak</h4>
                <ul class="space-y-2 text-sm">
                    @if($umkm->no_hp)
                        <li><i class="fab fa-whatsapp mr-2 text-green-500"></i> {{ $umkm->no_hp }}</li>
                    @endif
                    @if($umkm->instagram)
                        <li><i class="fab fa-instagram mr-2 text-pink-500"></i> {{ $umkm->instagram }}</li>
                    @endif
                    @if($umkm->alamat)
                        <li><i class="fas fa-map-marker-alt mr-2 text-red-500"></i> {{ $umkm->alamat }}</li>
                    @endif
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-4">Jam Operasional</h4>
                <p class="text-sm text-gray-400">{{ $umkm->jam_operasional ?? 'Senin - Sabtu: 08.00 - 17.00' }}</p>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-6 text-center text-xs text-gray-500">
            &copy; {{ date('Y') }} {{ $umkm->nama_toko }}. Powered by <span class="text-blue-400 font-bold">TintaKita</span>.
        </div>
    </footer>

</body>
</html>