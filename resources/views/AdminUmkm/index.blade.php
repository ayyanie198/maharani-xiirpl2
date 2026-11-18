@extends('layouts.admin')

@section('title', 'Website UMKM')
@section('page-title', 'Daftar Website UMKM')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="font-serif text-2xl font-bold text-[#4A3040]">Daftar Website UMKM 🏪</h1>
            <p class="text-[#C44569] mt-1">Kelola semua website UMKM yang terdaftar di Doodlune.</p>
        </div>
        <a href="{{ route('admin.umkm.create') }}" class="btn-primary mt-4 md:mt-0 inline-flex items-center px-6 py-3 text-white rounded-xl font-semibold shadow-lg">
            <i class="fas fa-plus mr-2"></i> Tambah Website
        </a>
    </div>

    <!-- Tabel Website UMKM -->
    <div class="bg-white rounded-2xl shadow-sm border border-[#FFD1DC] overflow-hidden md:overflow-visible">
        <div class="overflow-x-auto md:overflow-visible">
            <table class="w-full responsive-table">
                <thead class="bg-[#FFF5F7] border-b border-[#FFD1DC]">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Nama UMKM</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Pemilik</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Template</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Slug</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#FFF0F5]">
                    @forelse($umkm as $item)
                    <tr class="hover:bg-[#FFF5F7] transition">
                        <!-- Nama UMKM -->
                        <td class="px-6 py-4" data-label="Nama UMKM">
                            <div class="flex items-center space-x-3">
                                @if($item->logo)
                                    <img src="{{ asset('storage/' . $item->logo) }}" class="w-10 h-10 rounded-lg object-cover border border-[#FFD1DC]">
                                @else
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-[#FF6B9D] to-[#C44569] flex items-center justify-center text-white font-bold">
                                        {{ substr($item->nama_toko, 0, 1) }}
                                    </div>
                                @endif
                                <div>
                                    <p class="font-semibold text-[#4A3040]">{{ $item->nama_toko }}</p>
                                    <p class="text-xs text-[#C44569]">{{ $item->no_hp ?? '-' }}</p>
                                </div>
                            </div>
                        </td>
                        
                        <!-- Pemilik -->
                        <td class="px-6 py-4 text-sm text-[#4A3040]" data-label="Pemilik">{{ $item->nama_pemilik }}</td>
                        
                        <!-- Template -->
                        <td class="px-6 py-4" data-label="Template">
                            <span class="px-3 py-1 bg-[#FFF0F5] text-[#C44569] rounded-full text-xs font-semibold">
                                {{ str_replace('template-', 'Template ', $item->template ?? '1') }}
                            </span>
                        </td>
                        
                        <!-- Slug -->
                        <td class="px-6 py-4" data-label="Slug">
                            <code class="px-2 py-1 bg-gray-100 dark:bg-[#3d2833] rounded text-xs text-gray-700 dark:text-[#FFB6C1]">{{ $item->slug }}</code>
                        </td>
                        
                        <!-- Status -->
                        <td class="px-6 py-4" data-label="Status">
                            @if($item->status_website == 'aktif')
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold flex items-center w-max gap-1">
                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Aktif
                                </span>
                            @elseif($item->status_website == 'draft')
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-semibold flex items-center w-max gap-1">
                                    <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></span> Draft
                                </span>
                            @else
                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold flex items-center w-max gap-1">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span> Nonaktif
                                </span>
                            @endif
                        </td>
                        
                        <!-- 🌟 AKSI (Sudah Ditambah Tombol Publish/Nonaktif) -->
                        <td class="px-6 py-4" data-label="Aksi">
                            <div class="flex flex-wrap gap-2">
                                <!-- Detail -->
                                <a href="{{ route('admin.umkm.show', $item->id_toko) }}" class="text-[#4A3040] hover:text-[#FF6B9D] bg-[#FFF5F7] p-2 rounded-lg transition" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                
                                <!-- Edit -->
                                <a href="{{ route('admin.umkm.edit', $item->id_toko) }}" class="text-orange-600 hover:text-orange-900 bg-orange-50 p-2 rounded-lg transition" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <!-- Publish / Nonaktifkan (Dinamis berdasarkan status) -->
                                @if($item->status_website != 'aktif')
                                    <form action="{{ route('admin.umkm.publish', $item->id_toko) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-green-600 hover:text-green-900 bg-green-50 p-2 rounded-lg transition" title="Publish Website">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.umkm.nonaktifkan', $item->id_toko) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-yellow-600 hover:text-yellow-900 bg-yellow-50 p-2 rounded-lg transition" title="Nonaktifkan Website">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </form>
                                @endif

                                <!-- Hapus -->
                                <form action="{{ route('admin.umkm.destroy', $item->id_toko) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus website UMKM ini? Data akan hilang permanen.')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 p-2 rounded-lg transition" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-[#C44569]">
                            <i class="fas fa-store text-4xl mb-3 text-[#FFD1DC]"></i>
                            <p>Belum ada website UMKM yang terdaftar. 🌸</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pagination (Jika ada) -->
    @if(method_exists($umkm, 'links'))
        <div class="flex justify-center">
            {{ $umkm->links() }}
        </div>
    @endif
</div>
@endsection