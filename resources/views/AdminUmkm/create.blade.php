@extends('layouts.admin')

@section('title', 'Tambah Website UMKM')
@section('page-title', 'Tambah Website UMKM')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 md:p-8">
        <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- SECTION 1: DATA UTAMA -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2"><i class="fas fa-store text-blue-600 mr-2"></i>Data Utama UMKM</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Toko / UMKM <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_toko" value="{{ old('nama_toko') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pemilik <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp / HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="0812...">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <textarea name="alamat" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('alamat') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- SECTION 2: UPLOAD GAMBAR -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2"><i class="fas fa-image text-purple-600 mr-2"></i>Upload Gambar</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Logo UMKM</label>
                        <input type="file" name="logo" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <p class="text-xs text-gray-500 mt-1">Maks 2MB (JPG, PNG, WEBP)</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Foto Hero (Banner Utama)</label>
                        <input type="file" name="foto_hero" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                        <p class="text-xs text-gray-500 mt-1">Maks 2MB (JPG, PNG, WEBP)</p>
                    </div>
                </div>
            </div>

            <!-- SECTION 3: TENTANG & KONTAK -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2"><i class="fas fa-info-circle text-green-600 mr-2"></i>Tentang & Kontak</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat <span class="text-red-500">*</span></label>
                        <textarea name="deskripsi" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>{{ old('deskripsi') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Cerita Usaha</label>
                        <textarea name="cerita_usaha" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('cerita_usaha') }}</textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tahun Berdiri</label>
                            <input type="number" name="tahun_berdiri" value="{{ old('tahun_berdiri') }}" min="1900" max="2100" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Instagram</label>
                            <input type="text" name="instagram" value="{{ old('instagram') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="@username">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jam Operasional</label>
                            <input type="text" name="jam_operasional" value="{{ old('jam_operasional') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="08:00 - 21:00">
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECTION 4: PENGATURAN WEBSITE -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2"><i class="fas fa-cogs text-orange-600 mr-2"></i>Pengaturan Website</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Template <span class="text-red-500">*</span></label>
                        <div>
    <label class="block text-sm font-semibold text-[#5D4037] mb-2">Pilih Template <span class="text-red-500">*</span></label>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <label class="cursor-pointer">
            <input type="radio" name="template" value="template-1" class="peer hidden" required>
            <div class="peer-checked:ring-2 peer-checked:ring-[#5D4037] peer-checked:border-[#5D4037] border-2 border-[#D7CCC8] rounded-xl p-4 hover:bg-[#FAF7F5] transition">
                <div class="h-24 rounded-lg bg-gradient-to-br from-[#5D4037] to-[#8D6E63] mb-3 flex items-center justify-center text-white font-serif text-2xl font-bold">Elegan Coklat</div>
                <p class="font-bold text-[#3E2723]">Template 1 - Elegan Coklat</p>
                <p class="text-xs text-[#8D6E63]">Mewah & Profesional</p>
            </div>
        </label>
        <label class="cursor-pointer">
            <input type="radio" name="template" value="template-2" class="peer hidden">
            <div class="peer-checked:ring-2 peer-checked:ring-[#FF6B9D] peer-checked:border-[#FF6B9D] border-2 border-[#D7CCC8] rounded-xl p-4 hover:bg-[#FAF7F5] transition">
                <div class="h-24 rounded-lg bg-gradient-to-br from-[#FF9A8B] to-[#FF6A88] mb-3 flex items-center justify-center text-white font-bold text-2xl">Doodle Lucu 🌸</div>
                <p class="font-bold text-[#3E2723]">Template 2 - Doodle Lucu</p>
                <p class="text-xs text-[#8D6E63]">Playful & Menggemaskan</p>
            </div>
        </label>
        <label class="cursor-pointer">
            <input type="radio" name="template" value="template-3" class="peer hidden">
            <div class="peer-checked:ring-2 peer-checked:ring-[#1E40AF] peer-checked:border-[#1E40AF] border-2 border-[#D7CCC8] rounded-xl p-4 hover:bg-[#FAF7F5] transition">
                <div class="h-24 rounded-lg bg-gradient-to-br from-[#1E3A8A] to-[#3B82F6] mb-3 flex items-center justify-center text-white font-bold text-2xl">Biru Modern</div>
                <p class="font-bold text-[#3E2723]">Template 3 - Biru Modern</p>
                <p class="text-xs text-[#8D6E63]">Profesional & Clean</p>
            </div>
        </label>
        <label class="cursor-pointer">
            <input type="radio" name="template" value="template-4" class="peer hidden">
            <div class="peer-checked:ring-2 peer-checked:ring-[#2C1810] peer-checked:border-[#2C1810] border-2 border-[#D7CCC8] rounded-xl p-4 hover:bg-[#FAF7F5] transition">
                <div class="h-24 rounded-lg bg-gradient-to-br from-[#1a1a1a] to-[#3E2723] mb-3 flex items-center justify-center text-[#D4A574] font-serif font-bold text-2xl">Glass Premium</div>
                <p class="font-bold text-[#3E2723]">Template 4 - Glass Premium</p>
                <p class="text-xs text-[#8D6E63]">Eksklusif & Mewah</p>
            </div>
        </label>
    </div>
</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">URL Slug (Alamat Website) <span class="text-red-500">*</span></label>
                        <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-500">
                            <span class="bg-gray-100 px-3 py-2 text-gray-500 text-sm border-r">localhost:8000/website/</span>
                            <input type="text" name="slug" value="{{ old('slug') }}" class="flex-1 px-4 py-2 outline-none" required placeholder="toko-jaya">
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Hanya boleh huruf kecil, angka, dan tanda hubung (-).</p>
                    </div>
                </div>
            </div>

            <!-- SECTION PRODUK INLINE -->
<div class="bg-white p-6 rounded-xl border border-[#D7CCC8] mb-6">
    <h3 class="font-serif text-xl font-bold text-[#3E2723] mb-4"><i class="fas fa-box-open text-[#8D6E63] mr-2"></i>Tambah Produk Langsung (Opsional)</h3>
    <div id="produk-container" class="space-y-4">
        <div class="produk-item bg-[#FAF7F5] p-4 rounded-lg border border-[#D7CCC8]">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-[#5D4037] mb-1">Nama Produk</label>
                    <input type="text" name="produk_nama[]" class="w-full px-3 py-2 border border-[#D7CCC8] rounded-lg focus:ring-[#5D4037]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#5D4037] mb-1">Harga (Rp)</label>
                    <input type="number" name="produk_harga[]" class="w-full px-3 py-2 border border-[#D7CCC8] rounded-lg focus:ring-[#5D4037]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#5D4037] mb-1">Stok</label>
                    <select name="produk_stok[]" class="w-full px-3 py-2 border border-[#D7CCC8] rounded-lg focus:ring-[#5D4037]">
                        <option value="tersedia">Tersedia</option>
                        <option value="habis">Habis</option>
                    </select>
                </div>
            </div>
            <div class="mt-3">
                <label class="block text-xs font-bold text-[#5D4037] mb-1">Foto Produk</label>
                <input type="file" name="produk_foto[]" accept="image/*" class="w-full text-sm">
            </div>
        </div>
    </div>
    <button type="button" onclick="tambahProduk()" class="mt-4 px-4 py-2 bg-[#5D4037] text-white rounded-lg hover:bg-[#3E2723] transition text-sm font-semibold">
        <i class="fas fa-plus mr-1"></i> Tambah Produk Lagi
    </button>
</div>

<script>
let pIndex = 1;
function tambahProduk() {
    const container = document.getElementById('produk-container');
    const div = document.createElement('div');
    div.className = 'produk-item bg-[#FAF7F5] p-4 rounded-lg border border-[#D7CCC8] mt-4 relative';
    div.innerHTML = `
        <button type="button" onclick="this.parentElement.remove()" class="absolute top-2 right-2 text-red-500 hover:text-red-700"><i class="fas fa-times"></i></button>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="md:col-span-2"><label class="block text-xs font-bold text-[#5D4037] mb-1">Nama Produk</label><input type="text" name="produk_nama[]" class="w-full px-3 py-2 border border-[#D7CCC8] rounded-lg"></div>
            <div><label class="block text-xs font-bold text-[#5D4037] mb-1">Harga</label><input type="number" name="produk_harga[]" class="w-full px-3 py-2 border border-[#D7CCC8] rounded-lg"></div>
            <div><label class="block text-xs font-bold text-[#5D4037] mb-1">Stok</label><select name="produk_stok[]" class="w-full px-3 py-2 border border-[#D7CCC8] rounded-lg"><option value="tersedia">Tersedia</option><option value="habis">Habis</option></select></div>
        </div>
        <div class="mt-3"><label class="block text-xs font-bold text-[#5D4037] mb-1">Foto</label><input type="file" name="produk_foto[]" accept="image/*" class="w-full text-sm"></div>
    `;
    container.appendChild(div);
}
</script>

            <!-- TOMBOL AKSI -->
            <div class="flex justify-end space-x-3 pt-6 border-t">
                <a href="{{ route('admin.umkm.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">Batal</a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:shadow-lg transition font-medium">
                    <i class="fas fa-save mr-2"></i>Simpan Website
                </button>
            </div>
        </form>
    </div>
</div>
@endsection