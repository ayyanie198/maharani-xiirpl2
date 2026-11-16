@extends('layouts.admin')

@section('title', 'Log Aktivitas')
@section('page-title', 'Log Aktivitas Sistem')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="font-serif text-2xl font-bold text-[#3E2723]">Riwayat Aktivitas</h1>
            <p class="text-[#8D6E63] mt-1">Pantau semua aktivitas yang terjadi di dalam dashboard TintaKita.</p>
        </div>
    </div>

    <!-- Tabel Log -->
    <div class="bg-white rounded-2xl shadow-sm border border-[#D7CCC8] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[#FAF7F5] border-b border-[#D7CCC8]">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#5D4037] uppercase tracking-wider">Waktu</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#5D4037] uppercase tracking-wider">Aktivitas</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#5D4037] uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#5D4037] uppercase tracking-wider">Admin</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#EFEBE9]">
                    @forelse($logs as $log)
                    <tr class="hover:bg-[#FAF7F5] transition">
                        <!-- Waktu -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#5D4037]">
                            <div class="font-semibold text-[#3E2723]">{{ $log->created_at ? $log->created_at->format('d M Y') : '-' }}</div>
                            <div class="text-xs text-[#8D6E63]">{{ $log->created_at ? $log->created_at->format('H:i') . ' WIB' : '-' }}</div>
                            <div class="text-xs text-[#5D4037] mt-1">{{ $log->created_at ? $log->created_at->diffForHumans() : '' }}</div>
                        </td>

                        <!-- Jenis Aktivitas -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $iconClass = 'bg-gray-100 text-gray-600';
                                $icon = 'fa-info-circle';
                                $jenis = $log->jenis_aktivitas;

                                if (str_contains($jenis, 'Login')) { $iconClass = 'bg-blue-100 text-blue-600'; $icon = 'fa-sign-in-alt'; }
                                elseif (str_contains($jenis, 'Logout')) { $iconClass = 'bg-gray-100 text-gray-600'; $icon = 'fa-sign-out-alt'; }
                                elseif (str_contains($jenis, 'Tambah Website')) { $iconClass = 'bg-green-100 text-green-600'; $icon = 'fa-plus-circle'; }
                                elseif (str_contains($jenis, 'Edit Website')) { $iconClass = 'bg-yellow-100 text-yellow-600'; $icon = 'fa-edit'; }
                                elseif (str_contains($jenis, 'Hapus Website')) { $iconClass = 'bg-red-100 text-red-600'; $icon = 'fa-trash'; }
                                elseif (str_contains($jenis, 'Publish')) { $iconClass = 'bg-purple-100 text-purple-600'; $icon = 'fa-rocket'; }
                                elseif (str_contains($jenis, 'Nonaktifkan')) { $iconClass = 'bg-orange-100 text-orange-600'; $icon = 'fa-ban'; }
                                elseif (str_contains($jenis, 'Tambah Produk')) { $iconClass = 'bg-indigo-100 text-indigo-600'; $icon = 'fa-box-open'; }
                                elseif (str_contains($jenis, 'Edit Produk')) { $iconClass = 'bg-teal-100 text-teal-600'; $icon = 'fa-box'; }
                                elseif (str_contains($jenis, 'Hapus Produk')) { $iconClass = 'bg-red-100 text-red-600'; $icon = 'fa-box-open'; }
                                elseif (str_contains($jenis, 'Update Profil')) { $iconClass = 'bg-pink-100 text-pink-600'; $icon = 'fa-user-edit'; }
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $iconClass }}">
                                <i class="fas {{ $icon }} mr-2"></i> {{ $jenis ?? 'Aktivitas' }}
                            </span>
                        </td>

                        <!-- Deskripsi -->
                        <td class="px-6 py-4 text-sm text-[#5D4037] max-w-md truncate" title="{{ $log->deskripsi_aktivitas }}">
                            {{ $log->deskripsi_aktivitas ?? '-' }}
                        </td>

                        <!-- Admin -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#5D4037]">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#5D4037] to-[#8D6E63] flex items-center justify-center text-white text-xs font-bold mr-2">
                                    {{ substr($log->admin->nama_admin ?? 'A', 0, 1) }}
                                </div>
                                {{ $log->admin->nama_admin ?? 'Sistem' }}
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-[#8D6E63]">
                            <i class="fas fa-clipboard-list text-4xl mb-3 text-[#D7CCC8]"></i>
                            <p>Belum ada riwayat aktivitas.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center">
        {{ $logs->links() }}
    </div>
</div>
@endsection