@extends('layouts.admin')

@section('title', 'Tambah Website UMKM')
@section('page-title', 'Tambah Website UMKM')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-[#FFD1DC] p-6 md:p-8">
        <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- SECTION 1: DATA UTAMA -->
            <div>
                <h3 class="text-lg font-semibold text-[#4A3040] mb-4 border-b pb-2 border-[#FFF0F5]">
                    <i class="fas fa-store text-[#FF6B9D] mr-2"></i>Data Utama UMKM
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">Nama Toko / UMKM <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_toko" value="{{ old('nama_toko') }}" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">Nama Pemilik <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik') }}" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">Nomor WhatsApp / HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" placeholder="0812...">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">Alamat</label>
                        <textarea name="alamat" rows="2" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition">{{ old('alamat') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- SECTION 2: UPLOAD GAMBAR -->
            <div>
                <h3 class="text-lg font-semibold text-[#4A3040] mb-4 border-b pb-2 border-[#FFF0F5]">
                    <i class="fas fa-image text-[#C44569] mr-2"></i>Upload Gambar
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">Logo UMKM</label>
                        <input type="file" name="logo" accept="image/*" class="w-full text-sm text-[#4A3040] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#FFF0F5] file:text-[#C44569] hover:file:bg-[#FFD1DC] transition">
                        <p class="text-xs text-[#C44569] mt-1">Maks 2MB (JPG, PNG, WEBP)</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">Foto Hero (Banner Utama)</label>
                        <input type="file" name="foto_hero" accept="image/*" class="w-full text-sm text-[#4A3040] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#FFF0F5] file:text-[#C44569] hover:file:bg-[#FFD1DC] transition">
                        <p class="text-xs text-[#C44569] mt-1">Maks 2MB (JPG, PNG, WEBP)</p>
                    </div>
                </div>
            </div>

            <!-- SECTION 3: TENTANG & KONTAK -->
            <div>
                <h3 class="text-lg font-semibold text-[#4A3040] mb-4 border-b pb-2 border-[#FFF0F5]">
                    <i class="fas fa-info-circle text-[#FF6B9D] mr-2"></i>Tentang & Kontak
                </h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">Deskripsi Singkat <span class="text-red-500">*</span></label>
                        <textarea name="deskripsi" rows="3" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" required>{{ old('deskripsi') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">Cerita Usaha</label>
                        <textarea name="cerita_usaha" rows="3" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition">{{ old('cerita_usaha') }}</textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-[#4A3040] mb-1">Tahun Berdiri</label>
                            <input type="number" name="tahun_berdiri" value="{{ old('tahun_berdiri') }}" min="1900" max="2100" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#4A3040] mb-1">Instagram</label>
                            <input type="text" name="instagram" value="{{ old('instagram') }}" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" placeholder="@username">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#4A3040] mb-1">Jam Operasional</label>
                            <input type="text" name="jam_operasional" value="{{ old('jam_operasional') }}" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" placeholder="08:00 - 21:00">
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECTION 4: PENGATURAN WEBSITE -->
            <div>
                <h3 class="text-lg font-semibold text-[#4A3040] mb-4 border-b pb-2 border-[#FFF0F5]">
                    <i class="fas fa-cogs text-[#C44569] mr-2"></i>Pengaturan Website
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-[#4A3040] mb-2">Pilih Template <span class="text-red-500">*</span></label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <label class="cursor-pointer">
                                <input type="radio" name="template" value="template-1" class="peer hidden" required>
                                <div class="peer-checked:ring-2 peer-checked:ring-[#FF6B9D] peer-checked:border-[#FF6B9D] border-2 border-[#FFD1DC] rounded-xl p-4 hover:bg-[#FFF5F7] transition">
                                    <div class="h-24 rounded-lg bg-gradient-to-br from-pink-400 to-pink-600 mb-3 flex items-center justify-center text-white font-bold text-2xl">Doodle Lucu 🌸</div>
                                    <p class="font-bold text-[#4A3040]">Template 1 - Pink Doodle Lucu</p>
                                    <p class="text-xs text-[#C44569]">Playful & Warna Pastel Ceria</p>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="template" value="template-2" class="peer hidden">
                                <div class="peer-checked:ring-2 peer-checked:ring-[#FF6B9D] peer-checked:border-[#FF6B9D] border-2 border-[#FFD1DC] rounded-xl p-4 hover:bg-[#FFF5F7] transition">
                                    <div class="h-24 rounded-lg bg-gradient-to-br from-blue-400 to-cyan-500 mb-3 flex items-center justify-center text-white font-bold text-2xl">Liquid Glass 💧</div>
                                    <p class="font-bold text-[#4A3040]">Template 2 - Biru Liquid Glass</p>
                                    <p class="text-xs text-[#C44569]">Modern & Estetik</p>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="template" value="template-3" class="peer hidden">
                                <div class="peer-checked:ring-2 peer-checked:ring-[#FF6B9D] peer-checked:border-[#FF6B9D] border-2 border-[#FFD1DC] rounded-xl p-4 hover:bg-[#FFF5F7] transition">
                                    <div class="h-24 rounded-lg bg-gradient-to-br from-[#5D4037] to-[#8D6E63] mb-3 flex items-center justify-center text-white font-serif text-2xl font-bold">Elegan ☕</div>
                                    <p class="font-bold text-[#4A3040]">Template 3 - Coklat Elegan</p>
                                    <p class="text-xs text-[#C44569]">Hangat & Mewah</p>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="template" value="template-4" class="peer hidden">
                                <div class="peer-checked:ring-2 peer-checked:ring-[#FF6B9D] peer-checked:border-[#FF6B9D] border-2 border-[#FFD1DC] rounded-xl p-4 hover:bg-[#FFF5F7] transition">
                                    <div class="h-24 rounded-lg bg-gradient-to-br from-emerald-500 to-green-600 mb-3 flex items-center justify-center text-white font-bold text-2xl">Aesthetic 🌿</div>
                                    <p class="font-bold text-[#4A3040]">Template 4 - Hijau Aesthetic</p>
                                    <p class="text-xs text-[#C44569]">Segar & Natural</p>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">URL Slug (Alamat Website) <span class="text-red-500">*</span></label>
                        <div class="flex items-center border border-[#FFD1DC] rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-[#FF6B9D]">
                            <span class="bg-[#FFF5F7] px-3 py-2 text-[#C44569] text-sm border-r border-[#FFD1DC]">localhost:8000/website/</span>
                            <input type="text" name="slug" value="{{ old('slug') }}" class="flex-1 px-4 py-2 outline-none bg-white" required placeholder="toko-jaya">
                        </div>
                        <p class="text-xs text-[#C44569] mt-1">Hanya boleh huruf kecil, angka, dan tanda hubung (-).</p>
                    </div>
                </div>
            </div>

            <!-- SECTION PRODUK INLINE -->
            <div class="bg-white p-6 rounded-xl border border-[#FFD1DC] mb-6">
                <h3 class="font-serif text-xl font-bold text-[#4A3040] mb-4">
                    <i class="fas fa-box-open text-[#FF6B9D] mr-2"></i>Tambah Produk Langsung (Opsional)
                </h3>
                <div id="produk-container" class="space-y-4">
                    <div class="produk-item bg-[#FFF5F7] p-4 rounded-lg border border-[#FFD1DC]">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold text-[#4A3040] mb-1">Nama Produk</label>
                                <input type="text" name="produk_nama[]" class="w-full px-3 py-2 border border-[#FFD1DC] rounded-lg focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-[#4A3040] mb-1">Harga (Rp)</label>
                                <input type="number" name="produk_harga[]" class="w-full px-3 py-2 border border-[#FFD1DC] rounded-lg focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-[#4A3040] mb-1">Stok</label>
                                <select name="produk_stok[]" class="w-full px-3 py-2 border border-[#FFD1DC] rounded-lg focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none">
                                    <option value="tersedia">Tersedia</option>
                                    <option value="habis">Habis</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="block text-xs font-bold text-[#4A3040] mb-1">Foto Produk</label>
                            <input type="file" name="produk_foto[]" accept="image/*" class="w-full text-sm text-[#4A3040]">
                        </div>
                    </div>
                </div>
                <button type="button" onclick="tambahProduk()" class="mt-4 px-4 py-2 bg-[#FF6B9D] text-white rounded-lg hover:bg-[#C44569] transition text-sm font-semibold shadow-sm">
                    <i class="fas fa-plus mr-1"></i> Tambah Produk Lagi
                </button>
            </div>

            <script>
            let pIndex = 1;
            function tambahProduk() {
                const container = document.getElementById('produk-container');
                const div = document.createElement('div');
                div.className = 'produk-item bg-[#FFF5F7] p-4 rounded-lg border border-[#FFD1DC] mt-4 relative';
                div.innerHTML = `
                    <button type="button" onclick="this.parentElement.remove()" class="absolute top-2 right-2 text-[#C44569] hover:text-[#FF6B9D]"><i class="fas fa-times"></i></button>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="md:col-span-2"><label class="block text-xs font-bold text-[#4A3040] mb-1">Nama Produk</label><input type="text" name="produk_nama[]" class="w-full px-3 py-2 border border-[#FFD1DC] rounded-lg focus:ring-[#FF6B9D] outline-none"></div>
                        <div><label class="block text-xs font-bold text-[#4A3040] mb-1">Harga</label><input type="number" name="produk_harga[]" class="w-full px-3 py-2 border border-[#FFD1DC] rounded-lg focus:ring-[#FF6B9D] outline-none"></div>
                        <div><label class="block text-xs font-bold text-[#4A3040] mb-1">Stok</label><select name="produk_stok[]" class="w-full px-3 py-2 border border-[#FFD1DC] rounded-lg focus:ring-[#FF6B9D] outline-none"><option value="tersedia">Tersedia</option><option value="habis">Habis</option></select></div>
                    </div>
                    <div class="mt-3"><label class="block text-xs font-bold text-[#4A3040] mb-1">Foto</label><input type="file" name="produk_foto[]" accept="image/*" class="w-full text-sm"></div>
                `;
                container.appendChild(div);
            }
            </script>

            <!-- TOMBOL AKSI -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-[#FFF0F5]">
                <a href="{{ route('admin.umkm.index') }}" class="px-6 py-2 border border-[#FFD1DC] rounded-lg text-[#C44569] hover:bg-[#FFF5F7] transition font-medium">Batal</a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-[#FF6B9D] to-[#C44569] text-white rounded-lg hover:shadow-lg transition font-medium shadow-sm">
                    <i class="fas fa-save mr-2"></i>Simpan Website
                </button>
            </div>
        </form>
    </div>
</div>
@endsection