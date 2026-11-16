<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Dalam Pengembangan - {{ $umkm->nama_toko }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 max-w-md w-full text-center">
        <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-tools text-yellow-500 text-4xl"></i>
        </div>
        <h1 class="text-2xl font-bold text-gray-800 mb-3">Website Dalam Pengembangan</h1>
        <p class="text-gray-600 mb-2">Website <strong>{{ $umkm->nama_toko }}</strong> masih dalam tahap penyusunan.</p>
        <p class="text-sm text-gray-500 mb-6">Website ini akan segera dipublikasikan. Silakan kembali lagi nanti.</p>
        
        <div class="mt-8 pt-6 border-t border-gray-200">
            <p class="text-xs text-gray-400">Powered by <span class="text-blue-600 font-bold">TintaKita</span></p>
        </div>
    </div>
</body>
</html>