@extends('layouts.admin')

@section('title', 'Edit Website UMKM')
@section('page-title', 'Edit Website UMKM')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-[#FFD1DC] p-6 md:p-8">
        <form action="{{ route('admin.umkm.update', $umkm->id_toko) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <!-- SECTION 1: DATA UTAMA -->
            <div>
                <h3 class="text-lg font-semibold text-[#4A3040] mb-4 border-b pb-2 border-[#FFF0F5]">
                    <i class="fas fa-store text-[#FF6B9D] mr-2"></i>Data Utama UMKM
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">Nama Toko / UMKM <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_toko" value="{{ old('nama_toko', $umkm->nama_toko) }}" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">Nama Pemilik <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik', $umkm->nama_pemilik) }}" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">Nomor WhatsApp / HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $umkm->no_hp) }}" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" placeholder="0812...">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">Alamat</label>
                        <textarea name="alamat" rows="2" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition">{{ old('alamat', $umkm->alamat) }}</textarea>
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
                        @if($umkm->logo)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $umkm->logo) }}" class="h-20 w-20 object-cover rounded-lg border-2 border-[#FFD1DC] shadow-sm">
                            </div>
                        @endif
                        <input type="file" name="logo" accept="image/*" class="w-full text-sm text-[#4A3040] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#FFF0F5] file:text-[#C44569] hover:file:bg-[#FFD1DC] transition">
                        <p class="text-xs text-[#C44569] mt-1">Kosongkan jika tidak ingin mengganti. Maks 2MB.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">Foto Hero (Banner Utama)</label>
                        @if($umkm->foto_hero)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $umkm->foto_hero) }}" class="h-20 w-40 object-cover rounded-lg border-2 border-[#FFD1DC] shadow-sm">
                            </div>
                        @endif
                        <input type="file" name="foto_hero" accept="image/*" class="w-full text-sm text-[#4A3040] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#FFF0F5] file:text-[#C44569] hover:file:bg-[#FFD1DC] transition">
                        <p class="text-xs text-[#C44569] mt-1">Kosongkan jika tidak ingin mengganti. Maks 2MB.</p>
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
                        <textarea name="deskripsi" rows="3" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" required>{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">Cerita Usaha</label>
                        <textarea name="cerita_usaha" rows="3" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition">{{ old('cerita_usaha', $umkm->cerita_usaha) }}</textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-[#4A3040] mb-1">Tahun Berdiri</label>
                            <input type="number" name="tahun_berdiri" value="{{ old('tahun_berdiri', $umkm->tahun_berdiri) }}" min="1900" max="2100" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#4A3040] mb-1">Instagram</label>
                            <input type="text" name="instagram" value="{{ old('instagram', $umkm->instagram) }}" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" placeholder="@username">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#4A3040] mb-1">Jam Operasional</label>
                            <input type="text" name="jam_operasional" value="{{ old('jam_operasional', $umkm->jam_operasional) }}" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition" placeholder="08:00 - 21:00">
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
                    <div>
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">Pilih Template <span class="text-red-500">*</span></label>
                        <select name="template" class="w-full px-4 py-2 border border-[#FFD1DC] rounded-lg focus:ring-2 focus:ring-[#FF6B9D] focus:border-[#FF6B9D] outline-none transition bg-white" required>
                            <option value="template-1" {{ old('template', $umkm->template) == 'template-1' ? 'selected' : '' }}>Template 1 - Modern Minimalis</option>
                            <option value="template-2" {{ old('template', $umkm->template) == 'template-2' ? 'selected' : '' }}>Template 2 - Klasik Elegan</option>
                            <option value="template-3" {{ old('template', $umkm->template) == 'template-3' ? 'selected' : '' }}>Template 3 - Ceria & Warna-warni</option>
                            <option value="template-4" {{ old('template', $umkm->template) == 'template-4' ? 'selected' : '' }}>Template 4 - Eksklusif & Mewah</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#4A3040] mb-1">URL Slug (Alamat Website) <span class="text-red-500">*</span></label>
                        <div class="flex items-center border border-[#FFD1DC] rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-[#FF6B9D]">
                            <span class="bg-[#FFF5F7] px-3 py-2 text-[#C44569] text-sm border-r border-[#FFD1DC]">localhost:8000/website/</span>
                            <input type="text" name="slug" value="{{ old('slug', $umkm->slug) }}" class="flex-1 px-4 py-2 outline-none bg-white" required placeholder="toko-jaya">
                        </div>
                        <p class="text-xs text-[#C44569] mt-1">Hanya boleh huruf kecil, angka, dan tanda hubung (-).</p>
                    </div>
                </div>
            </div>

            <!-- TOMBOL AKSI -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-[#FFF0F5]">
                <a href="{{ route('admin.umkm.index') }}" class="px-6 py-2 border border-[#FFD1DC] rounded-lg text-[#C44569] hover:bg-[#FFF5F7] transition font-medium">Batal</a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-[#FF6B9D] to-[#C44569] text-white rounded-lg hover:shadow-lg transition font-medium shadow-sm">
                    <i class="fas fa-save mr-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection