@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')

{{-- 🌟 CARD NOTIFIKASI ULASAN PENDING --}}
@if($pendingUlasan > 0)
<div class="mb-6 bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-xl shadow-sm flex items-center justify-between">
    <div class="flex items-center gap-4">
        <div class="p-3 bg-yellow-100 rounded-full">
            <i class="fas fa-bell text-yellow-600 text-xl animate-bounce"></i>
        </div>
        <div>
            <h3 class="font-bold text-yellow-800 text-lg">Ada {{ $pendingUlasan }} Ulasan Baru Menunggu Persetujuan!</h3>
            <p class="text-yellow-700 text-sm">Silakan cek menu <strong>Kelola Ulasan</strong> untuk menyetujui atau menghapus.</p>
        </div>
    </div>
    <a href="{{ route('admin.ulasan.index') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-semibold text-sm transition shadow-md">
        Cek Sekarang <i class="fas fa-arrow-right ml-1"></i>
    </a>
</div>
@endif

<div class="space-y-8">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="font-serif text-3xl font-bold text-[#3E2723]">Selamat Datang, {{ Session::get('admin_nama', 'Admin') }}! 👋</h1>
            <p class="text-[#8D6E63] mt-2">Berikut ringkasan performa platform TintaKita hari ini.</p>
        </div>
        <a href="{{ route('admin.umkm.create') }}" class="mt-4 md:mt-0 btn-primary inline-flex items-center px-6 py-3 text-white rounded-xl font-semibold shadow-lg">
            <i class="fas fa-plus mr-2"></i> Tambah Website UMKM
        </a>
    </div>

    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5">
        @php
            $stats = [
                ['label' => 'Total Website', 'value' => $totalWebsite ?? 0, 'color' => 'bg-[#5D4037]', 'icon' => 'fa-globe'],
                ['label' => 'Website Aktif', 'value' => $websiteAktif ?? 0, 'color' => 'bg-green-700', 'icon' => 'fa-check-circle'],
                ['label' => 'Draft', 'value' => $websiteDraft ?? 0, 'color' => 'bg-yellow-600', 'icon' => 'fa-edit'],
                ['label' => 'Nonaktif', 'value' => $websiteNonaktif ?? 0, 'color' => 'bg-red-700', 'icon' => 'fa-ban'],
                ['label' => 'Total Produk', 'value' => $totalProduk ?? 0, 'color' => 'bg-[#8D6E63]', 'icon' => 'fa-box'],
                ['label' => 'Aktivitas Hari Ini', 'value' => $aktivitasHariIni ?? 0, 'color' => 'bg-[#3E2723]', 'icon' => 'fa-chart-line'],
            ];
        @endphp
        @foreach($stats as $stat)
        <div class="bg-white rounded-2xl shadow-sm border border-[#D7CCC8] p-5 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-[#8D6E63] uppercase tracking-wider">{{ $stat['label'] }}</p>
                    <p class="text-2xl font-bold text-[#3E2723] mt-1 font-serif">{{ $stat['value'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl {{ $stat['color'] }} flex items-center justify-center shadow-md">
                    <i class="fas {{ $stat['icon'] }} text-white text-xl"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Panel Bawah -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Aktivitas Terbaru -->
        <div class="bg-white rounded-2xl shadow-sm border border-[#D7CCC8] p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-serif text-xl font-bold text-[#3E2723] flex items-center">
                    <i class="fas fa-history text-[#8D6E63] mr-3"></i> Aktivitas Terbaru
                </h3>
                <a href="{{ route('admin.log.index') }}" class="text-sm font-semibold text-[#5D4037] hover:text-[#3E2723] transition">Lihat Semua →</a>
            </div>
            <div class="space-y-4">
                @forelse($aktivitasTerbaru ?? [] as $log)
                    <div class="flex items-start space-x-4 pb-4 border-b border-[#EFEBE9] last:border-0 last:pb-0">
                        <div class="w-10 h-10 rounded-full bg-[#FAF7F5] border border-[#D7CCC8] flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-[#8D6E63] text-sm"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-[#3E2723] font-medium truncate">{{ $log->deskripsi_aktivitas ?? 'Aktivitas tidak diketahui' }}</p>
                            <p class="text-xs text-[#A1887F] mt-1">{{ $log->created_at ? $log->created_at->diffForHumans() : '-' }}</p>
                        </div>
                        <span class="text-xs px-3 py-1 bg-[#EFEBE9] text-[#5D4037] rounded-full font-semibold whitespace-nowrap">{{ $log->jenis_aktivitas ?? '-' }}</span>
                    </div>
                @empty
                    <p class="text-[#8D6E63] text-sm text-center py-8 bg-[#FAF7F5] rounded-xl">Belum ada aktivitas tercatat.</p>
                @endforelse
            </div>
        </div>

        <!-- Website Terbaru -->
        <div class="bg-white rounded-2xl shadow-sm border border-[#D7CCC8] p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-serif text-xl font-bold text-[#3E2723] flex items-center">
                    <i class="fas fa-store text-[#8D6E63] mr-3"></i> Website Terbaru
                </h3>
                <a href="{{ route('admin.umkm.index') }}" class="text-sm font-semibold text-[#5D4037] hover:text-[#3E2723] transition">Lihat Semua →</a>
            </div>
            <div class="space-y-4">
                @forelse($websiteTerbaru ?? [] as $umkm)
                    <a href="{{ route('admin.umkm.show', $umkm->id_toko) }}" class="flex items-center justify-between p-3 rounded-xl hover:bg-[#FAF7F5] transition group">
                        <div class="flex items-center space-x-4 min-w-0 flex-1">
                            @if($umkm->logo)
                                <img src="{{ asset('storage/' . $umkm->logo) }}" class="w-12 h-12 rounded-xl object-cover border border-[#D7CCC8] flex-shrink-0">
                            @else
                                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#5D4037] to-[#8D6E63] flex items-center justify-center text-white font-serif font-bold text-lg flex-shrink-0 shadow-sm">
                                    {{ substr($umkm->nama_toko, 0, 1) }}
                                </div>
                            @endif
                            <div class="min-w-0">
                                <p class="text-sm font-bold text-[#3E2723] truncate group-hover:text-[#5D4037] transition">{{ $umkm->nama_toko }}</p>
                                <p class="text-xs text-[#A1887F] truncate">{{ $umkm->slug ?? '-' }}</p>
                            </div>
                        </div>
                        <span class="text-xs px-3 py-1.5 rounded-full font-semibold whitespace-nowrap ml-2
                            @if($umkm->status_website == 'aktif') bg-green-100 text-green-800
                            @elseif($umkm->status_website == 'draft') bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($umkm->status_website ?? 'draft') }}
                        </span>
                    </a>
                @empty
                    <p class="text-[#8D6E63] text-sm text-center py-8 bg-[#FAF7F5] rounded-xl">Belum ada website yang dibuat.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection