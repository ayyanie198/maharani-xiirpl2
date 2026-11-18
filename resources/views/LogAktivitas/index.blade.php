@extends('layouts.admin')

@section('title', 'Log Aktivitas')
@section('page-title', 'Log Aktivitas Sistem')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="font-serif text-2xl font-bold text-[#4A3040]">Riwayat Aktivitas 📋</h1>
            <p class="text-[#C44569] mt-1">Pantau semua aktivitas yang terjadi di dalam dashboard Doodlune.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-[#FFD1DC] overflow-hidden md:overflow-visible">
        <div class="overflow-x-auto md:overflow-visible">
            <table class="w-full responsive-table">
                <thead class="bg-[#FFF5F7] border-b border-[#FFD1DC]">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Waktu</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Aktivitas</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Admin</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#FFF0F5]">
                    @forelse($logs as $log)
                    <tr class="hover:bg-[#FFF5F7] transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#4A3040]" data-label="Waktu">
                            <div class="font-semibold text-[#4A3040]">{{ $log->created_at ? $log->created_at->format('d M Y') : '-' }}</div>
                            <div class="text-xs text-[#C44569]">{{ $log->created_at ? $log->created_at->format('H:i') . ' WIB' : '-' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap" data-label="Aktivitas">
                            @php
                                $iconClass = 'bg-[#FFF0F5] text-[#C44569]';
                                $icon = 'fa-circle';
                                $jenis = $log->jenis_aktivitas;
                                if (str_contains($jenis, 'Login')) { $iconClass = 'bg-blue-100 text-blue-600'; $icon = 'fa-sign-in-alt'; }
                                elseif (str_contains($jenis, 'Logout')) { $iconClass = 'bg-gray-100 text-gray-600'; $icon = 'fa-sign-out-alt'; }
                                elseif (str_contains($jenis, 'Tambah')) { $iconClass = 'bg-green-100 text-green-600'; $icon = 'fa-plus-circle'; }
                                elseif (str_contains($jenis, 'Edit') || str_contains($jenis, 'Update')) { $iconClass = 'bg-yellow-100 text-yellow-600'; $icon = 'fa-edit'; }
                                elseif (str_contains($jenis, 'Hapus')) { $iconClass = 'bg-red-100 text-red-600'; $icon = 'fa-trash'; }
                                elseif (str_contains($jenis, 'Publish')) { $iconClass = 'bg-purple-100 text-purple-600'; $icon = 'fa-rocket'; }
                                elseif (str_contains($jenis, 'Nonaktif')) { $iconClass = 'bg-orange-100 text-orange-600'; $icon = 'fa-ban'; }
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $iconClass }}">
                                <i class="fas {{ $icon }} mr-2"></i> {{ $jenis ?? 'Aktivitas' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-[#4A3040] max-w-md truncate" data-label="Deskripsi" title="{{ $log->deskripsi_aktivitas }}">
                            {{ $log->deskripsi_aktivitas ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#4A3040]" data-label="Admin">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#FF6B9D] to-[#C44569] flex items-center justify-center text-white text-xs font-bold mr-2 shadow-sm">
                                    {{ substr($log->admin->nama_admin ?? 'A', 0, 1) }}
                                </div>
                                {{ $log->admin->nama_admin ?? 'Sistem' }}
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-[#C44569]">
                            <i class="fas fa-clipboard-list text-4xl mb-3 text-[#FFD1DC]"></i>
                            <p>Belum ada riwayat aktivitas tercatat. 🌸</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex justify-center">
        {{ $logs->links() }}
    </div>
</div>
@endsection