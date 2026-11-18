@extends('layouts.admin')

@section('title', 'Produk UMKM')
@section('page-title', 'Daftar Produk')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="font-serif text-2xl font-bold text-[#4A3040]">Daftar Produk UMKM 🛍️</h1>
            <p class="text-[#C44569] mt-1">Kelola semua produk yang terdaftar di platform Doodlune.</p>
        </div>
        <a href="{{ route('admin.produk.create') }}" class="btn-primary mt-4 md:mt-0 inline-flex items-center px-6 py-3 text-white rounded-xl font-semibold shadow-lg">
            <i class="fas fa-plus mr-2"></i> Tambah Produk
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-[#FFD1DC] overflow-hidden md:overflow-visible">
        <div class="overflow-x-auto md:overflow-visible">
            <table class="w-full responsive-table">
                <thead class="bg-[#FFF5F7] border-b border-[#FFD1DC]">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Nama Produk</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">UMKM</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Stok</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#FFF0F5]">
                    @forelse($produk as $item)
                    <tr class="hover:bg-[#FFF5F7] transition">
                        <td class="px-6 py-4" data-label="Nama Produk">
                            <div class="flex items-center space-x-3">
                                @if($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}" class="w-10 h-10 rounded-lg object-cover border border-[#FFD1DC]">
                                @else
                                    <div class="w-10 h-10 rounded-lg bg-[#FFF0F5] flex items-center justify-center text-[#FF6B9D]"><i class="fas fa-box"></i></div>
                                @endif
                                <div>
                                    <p class="font-semibold text-[#4A3040]">{{ $item->nama_produk }}</p>
                                    <p class="text-xs text-[#C44569]">{{ $item->nama_kategori ?? '-' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-[#4A3040]" data-label="UMKM">{{ $item->portofolio->nama_toko ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-[#4A3040]" data-label="Harga">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-4" data-label="Stok">
                            <span class="px-3 py-1 {{ $item->status_stok == 'tersedia' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} rounded-full text-xs font-semibold">
                                {{ ucfirst($item->status_stok) }}
                            </span>
                        </td>
                        <td class="px-6 py-4" data-label="Aksi">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.produk.edit', $item->id_kategori) }}" class="text-orange-600 hover:text-orange-900 bg-orange-50 hover:bg-orange-100 p-2 rounded-lg transition" title="Edit"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.produk.destroy', $item->id_kategori) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition" title="Hapus"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-[#C44569]">
                            <i class="fas fa-box-open text-4xl mb-3 text-[#FFD1DC]"></i>
                            <p>Belum ada produk yang terdaftar. 🌸</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection