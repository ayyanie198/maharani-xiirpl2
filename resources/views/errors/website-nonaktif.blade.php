<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Tidak Tersedia - {{ $umkm->nama_toko }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 max-w-md w-full text-center">
        <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-ban text-red-500 text-4xl"></i>
        </div>
        <h1 class="text-2xl font-bold text-gray-800 mb-3">Website Sedang Tidak Tersedia</h1>
        <p class="text-gray-600 mb-2">Website <strong>{{ $umkm->nama_toko }}</strong> saat ini sedang dinonaktifkan oleh pemiliknya.</p>
        <p class="text-sm text-gray-500 mb-6">Silakan kunjungi kembali nanti atau hubungi pemilik langsung.</p>
        
        @if($umkm->no_hp)
            <a href="https://wa.me/{{ preg_replace('/^0/', '62', $umkm->no_hp) }}" target="_blank" 
               class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-medium transition">
                <i class="fab fa-whatsapp mr-2 text-xl"></i>
                Hubungi Pemilik
            </a>
        @endif
        
        <div class="mt-8 pt-6 border-t border-gray-200">
            <p class="text-xs text-gray-400">Powered by <span class="text-blue-600 font-bold">TintaKita</span></p>
        </div>
    </div>
</body>
</html>