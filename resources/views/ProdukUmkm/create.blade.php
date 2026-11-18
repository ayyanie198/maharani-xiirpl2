@extends('layouts.admin')

@section('title', 'Tambah Produk')
@section('page-title', 'Tambah Produk UMKM')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-[#FFD1DC] p-6 md:p-8">
        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Pilih UMKM -->
            <div>
                <label class="block text-sm font-medium text-[#4A3040] mb-1">Pilih UMKM <span class="text-red-500">*</span></label>
                <select name="id_toko" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition bg-white" required>
                    <option value="">-- Pilih UMKM --</option>
                    @foreach($umkmList as $umkm)
                        <option value="{{ $umkm->id_toko }}" {{ $selectedUmkm == $umkm->id_toko ? 'selected' : '' }}>
                            {{ $umkm->nama_toko }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nama Produk -->
            <div>
                <label class="block text-sm font-medium text-[#4A3040] mb-1">Nama Produk <span class="text-red-500">*</span></label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" required>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-medium text-[#4A3040] mb-1">Deskripsi Produk</label>
                <textarea name="deskripsi" rows="3" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition">{{ old('deskripsi') }}</textarea>
            </div>

            <!-- Harga & Stok -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-[#4A3040] mb-1">Harga (Rp) <span class="text-red-500">*</span></label>
                    <input type="number" name="harga" value="{{ old('harga') }}" min="0" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#4A3040] mb-1">Status Stok <span class="text-red-500">*</span></label>
                    <select name="status_stok" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition bg-white" required>
                        <option value="tersedia" {{ old('status_stok') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="habis" {{ old('status_stok') == 'habis' ? 'selected' : '' }}>Habis</option>
                    </select>
                </div>
            </div>

            <!-- Upload Foto -->
            <div>
                <label class="block text-sm font-medium text-[#4A3040] mb-1">Foto Produk</label>
                <input type="file" name="foto" accept="image/*" class="w-full text-sm text-[#4A3040] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#FFF0F5] file:text-[#C44569] hover:file:bg-[#FFD1DC] transition">
                <p class="text-xs text-[#C44569] mt-1">Maks 2MB (JPG, PNG, WEBP)</p>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-[#FFF0F5]">
                <a href="{{ route('admin.produk.index') }}" class="px-6 py-2 border border-[#FFD1DC] rounded-lg text-[#C44569] hover:bg-[#FFF5F7] transition font-medium">Batal</a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-[#FF6B9D] to-[#C44569] text-white rounded-lg hover:shadow-lg transition font-medium shadow-sm">
                    <i class="fas fa-save mr-2"></i>Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection