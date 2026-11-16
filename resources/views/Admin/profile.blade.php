@extends('layouts.admin')

@section('title', 'Profil Saya')
@section('page-title', 'Profil Administrator')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-[#D7CCC8] p-6 md:p-8">
        
        <!-- Header Profil -->
        <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6 mb-8 pb-6 border-b border-[#EFEBE9]">
            <div class="relative">
                @if($admin->foto)
                    <img src="{{ asset('storage/' . $admin->foto) }}" class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg">
                @else
                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-[#5D4037] to-[#8D6E63] flex items-center justify-center text-white text-3xl font-bold border-4 border-white shadow-lg">
                        {{ substr($admin->nama_admin, 0, 1) }}
                    </div>
                @endif
            </div>
            <div class="text-center md:text-left">
                <h2 class="text-xl font-bold text-[#3E2723] font-serif">{{ $admin->nama_admin }}</h2>
                <p class="text-sm text-[#8D6E63]">@{{ $admin->username }}</p>
            </div>
        </div>

        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Username (Read Only) -->
            <div>
                <label class="block text-sm font-semibold text-[#5D4037] mb-2">Username</label>
                <input type="text" value="{{ $admin->username }}" disabled 
                    class="w-full px-4 py-3 bg-[#FAF7F5] border border-[#D7CCC8] rounded-xl text-[#8D6E63] cursor-not-allowed">
                <p class="text-xs text-[#A1887F] mt-1">Username tidak dapat diubah untuk keamanan.</p>
            </div>

            <!-- Nama Admin -->
            <div>
                <label class="block text-sm font-semibold text-[#5D4037] mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" name="nama_admin" value="{{ old('nama_admin', $admin->nama_admin) }}" 
                    class="w-full px-4 py-3 bg-[#FAF7F5] border border-[#D7CCC8] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#5D4037] text-[#3E2723]" required>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-semibold text-[#5D4037] mb-2">Alamat Email <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="{{ old('email', $admin->email) }}" 
                    class="w-full px-4 py-3 bg-[#FAF7F5] border border-[#D7CCC8] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#5D4037] text-[#3E2723]" required>
            </div>

            <!-- Upload Foto -->
            <div class="bg-[#FAF7F5] p-4 rounded-xl border border-[#D7CCC8]">
                <label class="block text-sm font-semibold text-[#5D4037] mb-2">Ganti Foto Profil</label>
                <input type="file" name="foto" accept="image/*" class="w-full text-sm text-[#5D4037] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#D7CCC8] file:text-[#3E2723] hover:file:bg-[#EFEBE9]">
                <p class="text-xs text-[#A1887F] mt-1">Format: JPG, PNG, WEBP. Maksimal 2MB. Kosongkan jika tidak ingin mengganti.</p>
            </div>

            <!-- Password Baru -->
            <div class="pt-4 border-t border-[#EFEBE9]">
                <h3 class="text-md font-semibold text-[#3E2723] mb-4 font-serif">Ganti Password (Opsional)</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-[#5D4037] mb-2">Password Baru</label>
                        <input type="password" name="password" 
                            class="w-full px-4 py-3 bg-[#FAF7F5] border border-[#D7CCC8] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#5D4037] text-[#3E2723]" placeholder="Kosongkan jika tidak ingin mengganti">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#5D4037] mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" 
                            class="w-full px-4 py-3 bg-[#FAF7F5] border border-[#D7CCC8] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#5D4037] text-[#3E2723]">
                    </div>
                </div>
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-end pt-4">
                <button type="submit" class="btn-primary px-6 py-3 text-white rounded-xl font-semibold shadow-lg">
                    <i class="fas fa-save mr-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection