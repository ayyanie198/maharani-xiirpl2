@extends('layouts.admin')

@section('title', 'Website UMKM')
@section('page-title', 'Daftar Website UMKM')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="font-serif text-2xl font-bold text-[#3E2723]">Daftar Website UMKM</h1>
            <p class="text-[#8D6E63] mt-1">Kelola semua website UMKM yang terdaftar di TintaKita.</p>
        </div>
        <a href="{{ route('admin.umkm.create') }}" class="btn-primary mt-4 md:mt-0 inline-flex items-center px-6 py-3 text-white rounded-xl font-semibold shadow-lg">
            <i class="fas fa-plus mr-2"></i> Tambah Website
        </a>
    </div>

    <!-- Tabel UMKM -->
    <div class="bg-white rounded-2xl shadow-sm border border-[#D7CCC8] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[#FAF7F5] border-b border-[#D7CCC8]">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#5D4037] uppercase tracking-wider">Nama UMKM</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#5D4037] uppercase tracking-wider">Pemilik</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#5D4037] uppercase tracking-wider">Template</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#5D4037] uppercase tracking-wider">Slug</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#5D4037] uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#5D4037] uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#EFEBE9]">
                    @forelse($umkm as $item)
                    <tr class="hover:bg-[#FAF7F5] transition">
                        <!-- Nama UMKM -->
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                @if($item->logo)
                                    <img src="{{ asset('storage/' . $item->logo) }}" class="w-10 h-10 rounded-lg object-cover border border-[#D7CCC8]">
                                @else
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-[#5D4037] to-[#8D6E63] flex items-center justify-center text-white font-bold">
                                        {{ substr($item->nama_toko, 0, 1) }}
                                    </div>
                                @endif
                                <div>
                                    <p class="font-semibold text-[#3E2723]">{{ $item->nama_toko }}</p>
                                    <p class="text-xs text-[#8D6E63]">{{ $item->no_hp ?? '-' }}</p>
                                </div>
                            </div>
                        </td>

                        <!-- Pemilik -->
                        <td class="px-6 py-4 text-sm text-[#5D4037]">{{ $item->nama_pemilik }}</td>

                        <!-- Template -->
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-[#EFEBE9] text-[#5D4037] rounded-full text-xs font-semibold">
                                {{ $item->template ?? 'template-1' }}
                            </span>
                        </td>

                        <!-- Slug -->
                        <td class="px-6 py-4">
                            <code class="px-2 py-1 bg-gray-100 rounded text-xs text-gray-700">{{ $item->slug }}</code>
                        </td>

                        <!-- Status (WARNA-WARNI TETAP DIPERTAHANKAN) -->
                        <td class="px-6 py-4">
                            @if($item->status_website == 'aktif')
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">Aktif</span>
                            @elseif($item->status_website == 'draft')
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-semibold">Draft</span>
                            @else
                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">Nonaktif</span>
                            @endif
                        </td>

                        <!-- Aksi (ICON TETAP WARNA-WARNI) -->
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.umkm.show', $item->id_toko) }}" class="text-gray-600 hover:text-gray-900 bg-gray-100 p-2 rounded-lg" title="Detail">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <a href="{{ route('admin.umkm.preview', $item->id_toko) }}" target="_blank" class="text-purple-600 hover:text-purple-900 bg-purple-50 p-2 rounded-lg" title="Preview">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if($item->status_website == 'aktif')
                                    <button onclick="copyLink('{{ url('/website/' . $item->slug) }}')" class="text-blue-600 hover:text-blue-900 bg-blue-50 p-2 rounded-lg" title="Copy Link">
                                        <i class="fas fa-link"></i>
                                    </button>
                                @endif
                                @if($item->status_website != 'aktif')
                                    <form action="{{ route('admin.umkm.publish', $item->id_toko) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-green-600 hover:text-green-900 bg-green-50 p-2 rounded-lg" title="Publish">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.umkm.nonaktifkan', $item->id_toko) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-yellow-600 hover:text-yellow-900 bg-yellow-50 p-2 rounded-lg" title="Nonaktifkan">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </form>
                                @endif
                                <a href="{{ route('admin.umkm.edit', $item->id_toko) }}" class="text-orange-600 hover:text-orange-900 bg-orange-50 p-2 rounded-lg" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="deleteUmkm({{ $item->id_toko }})" class="text-red-600 hover:text-red-900 bg-red-50 p-2 rounded-lg" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-[#8D6E63]">
                            <i class="fas fa-store text-4xl mb-3 text-[#D7CCC8]"></i>
                            <p>Belum ada website UMKM yang terdaftar.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Hapus (Hidden) -->
    <form id="deleteForm" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</div>

<script>
function deleteUmkm(id) {
    if (confirm('Yakin ingin menghapus website UMKM ini?')) {
        const form = document.getElementById('deleteForm');
        form.action = `/admin/umkm/${id}`;
        form.submit();
    }
}

function copyLink(url) {
    navigator.clipboard.writeText(url).then(() => {
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-5 right-5 bg-[#3E2723] text-white px-6 py-3 rounded-lg shadow-xl z-50 flex items-center';
        toast.innerHTML = '<i class="fas fa-check-circle text-green-400 mr-2"></i> Link berhasil disalin!';
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    });
}
</script>
@endsection