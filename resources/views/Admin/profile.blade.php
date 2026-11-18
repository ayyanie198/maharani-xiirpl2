@extends('layouts.admin')

@section('title', 'Profil Saya')
@section('page-title', 'Profil Administrator')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-[#FFD1DC] p-6 md:p-8">
        
        <!-- Header Profil -->
        <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6 mb-8 pb-6 border-b border-[#FFF0F5]">
            <div class="relative">
                @if($admin->foto)
                    <img src="{{ asset('storage/' . $admin->foto) }}" class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg">
                @else
                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-[#FF6B9D] to-[#C44569] flex items-center justify-center text-white text-3xl font-bold border-4 border-white shadow-lg">
                        {{ substr($admin->nama_admin, 0, 1) }}
                    </div>
                @endif
            </div>
            <div class="text-center md:text-left">
                <h2 class="text-xl font-bold text-[#4A3040] font-serif">{{ $admin->nama_admin }}</h2>
                <p class="text-sm text-[#C44569]">@{{ $admin->username }}</p>
            </div>
        </div>

        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Username (Read Only) -->
            <div>
                <label class="block text-sm font-semibold text-[#4A3040] mb-2">Username</label>
                <input type="text" value="{{ $admin->username }}" disabled 
                    class="w-full px-4 py-3 bg-[#FFF5F7] border border-[#FFD1DC] rounded-xl text-[#C44569] cursor-not-allowed">
                <p class="text-xs text-[#C44569] mt-1">Username tidak dapat diubah untuk keamanan.</p>
            </div>

            <!-- Nama Admin -->
            <div>
                <label class="block text-sm font-semibold text-[#4A3040] mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" name="nama_admin" value="{{ old('nama_admin', $admin->nama_admin) }}" 
                    class="w-full px-4 py-3 bg-[#FFF5F7] border border-[#FFD1DC] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#FF6B9D] text-[#4A3040]" required>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-semibold text-[#4A3040] mb-2">Alamat Email <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="{{ old('email', $admin->email) }}" 
                    class="w-full px-4 py-3 bg-[#FFF5F7] border border-[#FFD1DC] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#FF6B9D] text-[#4A3040]" required>
            </div>

            <!-- Upload Foto -->
            <div class="bg-[#FFF5F7] p-4 rounded-xl border border-[#FFD1DC]">
                <label class="block text-sm font-semibold text-[#4A3040] mb-2">Ganti Foto Profil</label>
                <input type="file" name="foto" accept="image/*" class="w-full text-sm text-[#4A3040] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#FFD1DC] file:text-[#C44569] hover:file:bg-[#FFB6C1] transition">
                <p class="text-xs text-[#C44569] mt-1">Format: JPG, PNG, WEBP. Maksimal 2MB. Kosongkan jika tidak ingin mengganti.</p>
            </div>

            <!-- Password Baru -->
            <div class="pt-4 border-t border-[#FFF0F5]">
                <h3 class="text-md font-semibold text-[#4A3040] mb-4 font-serif">Ganti Password (Opsional)</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-[#4A3040] mb-2">Password Baru</label>
                        <input type="password" name="password" 
                            class="w-full px-4 py-3 bg-[#FFF5F7] border border-[#FFD1DC] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#FF6B9D] text-[#4A3040]" placeholder="Kosongkan jika tidak ingin mengganti">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#4A3040] mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" 
                            class="w-full px-4 py-3 bg-[#FFF5F7] border border-[#FFD1DC] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#FF6B9D] text-[#4A3040]">
                    </div>
                </div>
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-end pt-4">
                <button type="submit" class="btn-primary px-6 py-3 text-white rounded-xl font-semibold shadow-lg flex items-center">
                    <i class="fas fa-save mr-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection