@extends('layouts.admin')

@section('title', 'Edit Produk')
@section('page-title', 'Edit Produk UMKM')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 md:p-8">
        <form action="{{ route('admin.produk.update', $produk->id_kategori) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Pilih UMKM -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih UMKM <span class="text-red-500">*</span></label>
                <select name="id_toko" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    <option value="">-- Pilih UMKM --</option>
                    @foreach($umkmList as $umkm)
                        <option value="{{ $umkm->id_toko }}" {{ old('id_toko', $produk->id_toko) == $umkm->id_toko ? 'selected' : '' }}>
                            {{ $umkm->nama_toko }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nama Produk -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk <span class="text-red-500">*</span></label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Produk</label>
                <textarea name="deskripsi" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
            </div>

            <!-- Harga & Stok -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp) <span class="text-red-500">*</span></label>
                    <input type="number" name="harga" value="{{ old('harga', $produk->harga) }}" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status Stok <span class="text-red-500">*</span></label>
                    <select name="status_stok" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        <option value="tersedia" {{ old('status_stok', $produk->status_stok) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="habis" {{ old('status_stok', $produk->status_stok) == 'habis' ? 'selected' : '' }}>Habis</option>
                    </select>
                </div>
            </div>

            <!-- Upload Foto -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Produk</label>
                @if($produk->foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $produk->foto) }}" class="h-24 w-24 object-cover rounded-lg border">
                    </div>
                @endif
                <input type="file" name="foto" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti. Maks 2MB.</p>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end space-x-3 pt-6 border-t">
                <a href="{{ route('admin.produk.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">Batal</a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:shadow-lg transition font-medium">
                    <i class="fas fa-save mr-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection