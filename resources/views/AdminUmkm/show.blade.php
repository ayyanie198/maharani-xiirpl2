@extends('layouts.admin')

@section('title', 'Detail Website UMKM')
@section('page-title', 'Detail: ' . $umkm->nama_toko)

@section('content')
<div class="max-w-5xl mx-auto space-y-6">
    
    <!-- Header & Aksi -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between bg-white p-4 rounded-xl shadow-sm border border-[#FFD1DC]">
        <div class="flex items-center space-x-4">
            @if($umkm->logo)
                <img src="{{ asset('storage/' . $umkm->logo) }}" class="w-16 h-16 rounded-xl object-cover border-2 border-[#FFD1DC]">
            @else
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-[#FF6B9D] to-[#C44569] flex items-center justify-center text-white text-2xl font-bold shadow-md">
                    {{ substr($umkm->nama_toko, 0, 1) }}
                </div>
            @endif
            <div>
                <h1 class="text-2xl font-bold text-[#4A3040]">{{ $umkm->nama_toko }} 🌸</h1>
                <p class="text-sm text-[#C44569]">Pemilik: {{ $umkm->nama_pemilik }}</p>
            </div>
        </div>
        <div class="flex space-x-2 mt-4 md:mt-0">
            <a href="{{ route('admin.umkm.edit', $umkm->id_toko) }}" class="px-4 py-2 bg-[#FF6B9D] text-white rounded-lg hover:bg-[#C44569] transition flex items-center shadow-sm">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <a href="{{ route('admin.umkm.index') }}" class="px-4 py-2 border border-[#FFD1DC] text-[#C44569] rounded-lg hover:bg-[#FFF5F7] transition flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Grid Informasi -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Kolom Kiri: Info Utama -->
        <div class="md:col-span-2 space-y-6">
            <!-- Tentang -->
            <div class="bg-white rounded-xl shadow-sm border border-[#FFD1DC] p-6">
                <h3 class="text-lg font-bold text-[#4A3040] mb-4 flex items-center">
                    <i class="fas fa-info-circle text-[#FF6B9D] mr-2"></i> Tentang UMKM
                </h3>
                <div class="prose prose-sm text-[#4A3040]">
                    <p class="mb-4">{{ $umkm->deskripsi }}</p>
                    @if($umkm->cerita_usaha)
                        <h4 class="font-semibold text-[#4A3040] mt-4 mb-2">Cerita Usaha</h4>
                        <p>{{ $umkm->cerita_usaha }}</p>
                    @endif
                </div>
            </div>

            <!-- Daftar Produk -->
            <div class="bg-white rounded-xl shadow-sm border border-[#FFD1DC] p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-[#4A3040] flex items-center">
                        <i class="fas fa-box text-[#C44569] mr-2"></i> Katalog Produk ({{ $umkm->produk->count() }})
                    </h3>
                    <a href="{{ route('admin.produk.create', ['id_toko' => $umkm->id_toko]) }}" class="text-sm text-[#FF6B9D] hover:text-[#C44569] hover:underline transition font-semibold">+ Tambah Produk</a>
                </div>
                
                @if($umkm->produk->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-[#FFF5F7] text-[#C44569]">
                                <tr>
                                    <th class="px-4 py-2 text-left">Nama Produk</th>
                                    <th class="px-4 py-2 text-left">Harga</th>
                                    <th class="px-4 py-2 text-left">Stok</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#FFF0F5]">
                                @foreach($umkm->produk as $p)
                                <tr class="hover:bg-[#FFF5F7] transition">
                                    <td class="px-4 py-3 font-medium text-[#4A3040]">{{ $p->nama_produk }}</td>
                                    <td class="px-4 py-3 text-[#C44569]">Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 rounded-full text-xs {{ $p->status_stok == 'tersedia' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                            {{ ucfirst($p->status_stok) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-8 text-[#C44569] bg-[#FFF5F7] rounded-lg border border-[#FFD1DC]">
                        <i class="fas fa-box-open text-3xl mb-2 text-[#FFD1DC]"></i>
                        <p>Belum ada produk untuk UMKM ini. 🌸</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Kolom Kanan: Detail Kontak & Pengaturan -->
        <div class="space-y-6">
            <!-- Status & Slug -->
            <div class="bg-white rounded-xl shadow-sm border border-[#FFD1DC] p-6">
                <h3 class="text-sm font-bold text-[#C44569] uppercase mb-4">Status Website</h3>
                <div class="mb-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold
                        @if($umkm->status_website == 'aktif') bg-green-100 text-green-700
                        @elseif($umkm->status_website == 'draft') bg-yellow-100 text-yellow-700
                        @else bg-red-100 text-red-700 @endif">
                        {{ ucfirst($umkm->status_website) }}
                    </span>
                </div>
                <div class="text-sm">
                    <p class="text-[#C44569] mb-1">URL Publik:</p>
                    @if($umkm->status_website == 'aktif')
                        <a href="{{ url('/website/' . $umkm->slug) }}" target="_blank" class="text-[#FF6B9D] hover:text-[#C44569] hover:underline break-all transition">
                            <i class="fas fa-external-link-alt mr-1"></i> /website/{{ $umkm->slug }}
                        </a>
                    @else
                        <p class="text-[#FFD1DC] italic">Belum bisa diakses publik</p>
                    @endif
                </div>
            </div>

            <!-- Kontak -->
            <div class="bg-white rounded-xl shadow-sm border border-[#FFD1DC] p-6">
                <h3 class="text-sm font-bold text-[#C44569] uppercase mb-4">Informasi Kontak</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start">
                        <i class="fab fa-whatsapp text-green-500 mt-1 mr-3 w-4"></i>
                        <div>
                            <p class="text-[#C44569] text-xs">WhatsApp / HP</p>
                            <p class="font-medium text-[#4A3040]">{{ $umkm->no_hp ?? '-' }}</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fab fa-instagram text-[#FF6B9D] mt-1 mr-3 w-4"></i>
                        <div>
                            <p class="text-[#C44569] text-xs">Instagram</p>
                            <p class="font-medium text-[#4A3040]">{{ $umkm->instagram ?? '-' }}</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt text-red-500 mt-1 mr-3 w-4"></i>
                        <div>
                            <p class="text-[#C44569] text-xs">Alamat</p>
                            <p class="font-medium text-[#4A3040]">{{ $umkm->alamat ?? '-' }}</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-clock text-[#FF6B9D] mt-1 mr-3 w-4"></i>
                        <div>
                            <p class="text-[#C44569] text-xs">Jam Operasional</p>
                            <p class="font-medium text-[#4A3040]">{{ $umkm->jam_operasional ?? '-' }}</p>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Pengaturan Template -->
            <div class="bg-white rounded-xl shadow-sm border border-[#FFD1DC] p-6">
                <h3 class="text-sm font-bold text-[#C44569] uppercase mb-4">Pengaturan</h3>
                <div class="space-y-3 text-sm">
                    <div>
                        <p class="text-[#C44569] text-xs">Template Aktif</p>
                        <p class="font-medium text-[#4A3040] capitalize">
                            <span class="inline-flex items-center px-2 py-1 bg-[#FFF0F5] rounded-md text-xs">
                                <i class="fas fa-palette text-[#FF6B9D] mr-1"></i>
                                {{ str_replace('-', ' ', $umkm->template) }}
                            </span>
                        </p>
                    </div>
                    <div>
                        <p class="text-[#C44569] text-xs">Tahun Berdiri</p>
                        <p class="font-medium text-[#4A3040]">{{ $umkm->tahun_berdiri ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[#C44569] text-xs">Dibuat Oleh</p>
                        <p class="font-medium text-[#4A3040]">{{ $umkm->admin->nama_admin ?? 'Admin Doodlune' }}</p>
                    </div>
                    <div>
                        <p class="text-[#C44569] text-xs">Tanggal Daftar</p>
                        <p class="font-medium text-[#4A3040]">{{ $umkm->tgl_daftar ? \Carbon\Carbon::parse($umkm->tgl_daftar)->format('d M Y') : '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection