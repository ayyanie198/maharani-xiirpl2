<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Doodlune 🌸</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        /* Gradient Pink Doodlune */
        .bg-pink-gradient { background: linear-gradient(135deg, #FF6B9D 0%, #FF8FAB 50%, #FFD1DC 100%); }
        .input-pink:focus { border-color: #FF6B9D; box-shadow: 0 0 0 3px rgba(255, 107, 157, 0.2); }
    </style>
</head>
<body class="bg-[#FFF5F7] min-h-screen flex items-center justify-center p-4">

    <div class="max-w-5xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row border-2 border-[#FFD1DC]">
        
        <!-- Sisi Kiri: Branding -->
        <div class="bg-pink-gradient md:w-1/2 p-12 text-white flex flex-col justify-center relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>
            
            <div class="relative z-10">
                <!-- Logo Doodlune -->
                <div class="flex items-center gap-4 mb-8">
                    <img src="{{ asset('images/logo-doodlune.jpeg') }}" onerror="this.style.display='none'" alt="Doodlune Logo" class="w-20 h-20 object-contain drop-shadow-lg bg-white rounded-full p-1">
                    <h1 class="font-serif text-4xl font-bold tracking-tight">Doodlune 🌸</h1>
                </div>
                <h2 class="font-serif text-4xl font-bold mb-4 leading-tight">Selamat Datang,<br>Administrator.</h2>
                <p class="text-white/90 text-lg leading-relaxed">Kelola website portofolio UMKM dengan mudah, cepat, dan penuh warna dalam satu dashboard terpusat.</p>
            </div>
        </div>

        <!-- Sisi Kanan: Form Login -->
        <div class="md:w-1/2 p-12 flex flex-col justify-center">
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-[#4A3040] mb-2 font-serif">Masuk ke Dashboard</h3>
                <p class="text-[#C44569]">Silakan masukkan kredensial Anda untuk melanjutkan.</p>
            </div>

            @if(session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-400 text-green-800 p-4 rounded-lg text-sm flex items-center">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.login.process') }}" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <label class="block text-sm font-semibold text-[#4A3040] mb-2">Username</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-[#C44569]"><i class="fas fa-user"></i></span>
                        <input type="text" name="username" value="{{ old('username') }}" required 
                            class="input-pink w-full pl-11 pr-4 py-3 bg-[#FFF5F7] border border-[#FFD1DC] rounded-xl focus:outline-none focus:ring-2 transition text-[#4A3040] placeholder-[#C44569]" placeholder="Masukkan username">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4A3040] mb-2">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-[#C44569]"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" required 
                            class="input-pink w-full pl-11 pr-4 py-3 bg-[#FFF5F7] border border-[#FFD1DC] rounded-xl focus:outline-none focus:ring-2 transition text-[#4A3040] placeholder-[#C44569]" placeholder="Masukkan password">
                    </div>
                    <!-- Link Lupa Password (Aman untuk UKK) -->
                    <div class="mt-2 text-right">
                        <a href="#" onclick="alert('Untuk keamanan, silakan hubungi Administrator Utama untuk melakukan reset password manual melalui database.')" class="text-xs text-[#C44569] hover:text-[#FF6B9D] transition font-medium">
                            Lupa kata sandi?
                        </a>
                    </div>
                </div>

                @if($errors->has('login'))
                    <div class="text-red-600 text-sm bg-red-50 p-3 rounded-lg border border-red-100 flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i> {{ $errors->first('login') }}
                    </div>
                @endif

                <button type="submit" class="w-full bg-[#FF6B9D] hover:bg-[#C44569] text-white font-bold py-3.5 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2 mt-2">
                    <i class="fas fa-sign-in-alt"></i> Masuk Dashboard
                </button>
            </form>

            <div class="mt-8 text-center">
                <a href="/" class="text-sm text-[#C44569] hover:text-[#FF6B9D] transition flex items-center justify-center gap-2">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda Doodlune
                </a>
            </div>
        </div>
    </div>

</body>
</html>