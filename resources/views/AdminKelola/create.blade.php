@extends('layouts.admin')

@section('title', 'Tambah Admin')
@section('page-title', 'Tambah Administrator Baru')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-[#FFD1DC] p-6 md:p-8">
        <form action="{{ route('admin.kelola.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-[#4A3040] mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" name="nama_admin" value="{{ old('nama_admin') }}" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" required placeholder="Contoh: Maharani">
            </div>

            <div>
                <label class="block text-sm font-medium text-[#4A3040] mb-1">Username (untuk login) <span class="text-red-500">*</span></label>
                <input type="text" name="username" value="{{ old('username') }}" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" required placeholder="Contoh: rani_admin">
                @error('username') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-[#4A3040] mb-1">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" placeholder="admin@doodlune.com">
            </div>

            <div>
                <label class="block text-sm font-medium text-[#4A3040] mb-1">Password <span class="text-red-500">*</span></label>
                <input type="password" name="password" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" required placeholder="Minimal 6 karakter">
                @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="bg-[#FFF5F7] p-4 rounded-xl border border-[#FFD1DC] flex items-start gap-3">
                <i class="fas fa-info-circle text-[#FF6B9D] mt-1"></i>
                <p class="text-sm text-[#C44569]">Password akan dienkripsi secara otomatis oleh sistem. Pastikan admin baru menyimpan passwordnya dengan aman.</p>
            </div>

            <div class="flex justify-end space-x-3 pt-6 border-t border-[#FFF0F5]">
                <a href="{{ route('admin.kelola.index') }}" class="px-6 py-2 border border-[#FFD1DC] rounded-lg text-[#C44569] hover:bg-[#FFF5F7] transition font-medium">Batal</a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-[#FF6B9D] to-[#C44569] text-white rounded-lg hover:shadow-lg transition font-medium shadow-sm">
                    <i class="fas fa-save mr-2"></i>Simpan Admin
                </button>
            </div>
        </form>
    </div>
</div>
@endsection