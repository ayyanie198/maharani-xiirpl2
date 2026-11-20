@extends('layouts.admin')

@section('title', 'Kelola Ulasan')
@section('page-title', 'Moderasi Ulasan Pengunjung')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="font-serif text-2xl font-bold text-[#4A3040]">Moderasi Ulasan 💬</h1>
            <p class="text-[#C44569] mt-1">Setujui ulasan yang membangun atau hapus yang tidak pantas.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-[#FFD1DC] overflow-hidden md:overflow-visible">
        <div class="overflow-x-auto md:overflow-visible">
            <!-- 🌟 TAMBAHAN: class 'responsive-table' agar rapi di HP -->
            <table class="w-full responsive-table">
                <thead class="bg-[#FFF5F7] border-b border-[#FFD1DC]">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Nama & Pesan</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Rating</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#FFF0F5]">
                    @forelse($ulasanList as $ulasan)
                    <tr class="hover:bg-[#FFF5F7] transition">
                        <!-- 🌟 TAMBAHAN: data-label untuk mode HP -->
                        <td class="px-6 py-4" data-label="Nama & Pesan">
                            <p class="font-semibold text-[#4A3040]">{{ $ulasan->nama }}</p>
                            <p class="text-sm text-[#6D4C41] mt-1 italic">"{{ Str::limit($ulasan->pesan, 60) }}"</p>
                        </td>
                        <td class="px-6 py-4" data-label="Rating">
                            <div class="flex text-yellow-400 text-sm">
                                @for($i = 0; $i < $ulasan->rating; $i++)<i class="fas fa-star"></i>@endfor
                            </div>
                        </td>
                        <td class="px-6 py-4" data-label="Status">
                            @if($ulasan->status == 1)
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold flex items-center w-max gap-1">
                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Disetujui
                                </span>
                            @else
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-semibold flex items-center w-max gap-1">
                                    <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></span> Pending
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-[#4A3040]" data-label="Tanggal">
                            {{ \Carbon\Carbon::parse($ulasan->created_at)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4" data-label="Aksi">
                            <div class="flex flex-wrap gap-2">
                                {{-- TOMBOL APPROVE: Hanya muncul jika Pending (0) --}}
                                @if($ulasan->status == 0)
                                    <form action="{{ route('admin.ulasan.approve', $ulasan->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-green-600 hover:text-green-900 bg-green-50 hover:bg-green-100 p-2 rounded-lg transition" title="Setujui Ulasan">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                @endif
                                
                                {{-- TOMBOL HAPUS: Selalu muncul --}}
                                <form action="{{ route('admin.ulasan.destroy', $ulasan->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition" title="Hapus Ulasan">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-[#C44569]">
                            <i class="fas fa-comment-slash text-4xl mb-3 text-[#FFD1DC]"></i>
                            <p>Belum ada ulasan yang masuk. 🌸</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection