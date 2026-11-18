<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Dalam Pengembangan - {{ $umkm->nama_toko }} | Doodlune 🌸</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#FFF5F7] min-h-screen flex items-center justify-center p-4">
    
    <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 max-w-md w-full text-center border-2 border-[#FFD1DC] relative overflow-hidden">
        <!-- Dekorasi Background Lucu (Konsisten dengan 404) -->
        <div class="absolute top-0 right-0 w-40 h-40 bg-[#FFF0F5] rounded-full -mr-20 -mt-20 opacity-60"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-[#FFF0F5] rounded-full -ml-16 -mb-16 opacity-60"></div>
        
        <div class="relative z-10">
            <!-- Ikon Doodle -->
            <div class="w-24 h-24 bg-[#FFF0F5] rounded-full flex items-center justify-center mx-auto mb-6 border-2 border-[#FFD1DC] shadow-sm">
                <i class="fas fa-pencil-ruler text-4xl text-[#FF6B9D]"></i>
            </div>
            
            <!-- Teks Utama -->
            <h1 class="font-serif text-3xl font-bold text-[#4A3040] mb-3">Website Dalam Penyusunan 🌸</h1>
            <p class="text-[#C44569] mb-2">
                Website <strong>{{ $umkm->nama_toko }}</strong> masih dalam tahap penyusunan oleh tim Doodlune.
            </p>
            <p class="text-sm text-[#C44569]/80 mb-6">
                Website ini akan segera dipublikasikan. Silakan kembali lagi nanti ya!
            </p>
            
            <!-- Footer -->
            <div class="mt-8 pt-6 border-t border-[#FFF0F5]">
                <p class="text-xs text-[#C44569]/60">
                    Powered by <span class="text-[#FF6B9D] font-bold">Doodlune</span> 🌸
                </p>
            </div>
        </div>
    </div>

</body>
</html>