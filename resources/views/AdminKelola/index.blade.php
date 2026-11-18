@extends('layouts.admin')

@section('title', 'Kelola Admin')
@section('page-title', 'Kelola Administrator')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="font-serif text-2xl font-bold text-[#4A3040]">Daftar Administrator 👥</h1>
            <p class="text-[#C44569] mt-1">Kelola semua admin yang memiliki akses ke dashboard Doodlune.</p>
        </div>
        <a href="{{ route('admin.kelola.create') }}" class="btn-primary mt-4 md:mt-0 inline-flex items-center px-6 py-3 text-white rounded-xl font-semibold shadow-lg">
            <i class="fas fa-user-plus mr-2"></i> Tambah Admin Baru
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-[#FFD1DC] overflow-hidden md:overflow-visible">
        <div class="overflow-x-auto md:overflow-visible">
            <table class="w-full responsive-table">
                <thead class="bg-[#FFF5F7] border-b border-[#FFD1DC]">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Nama Admin</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Username</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Bergabung</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#C44569] uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#FFF0F5]">
                    @forelse($admins as $admin)
                    <tr class="hover:bg-[#FFF5F7] transition">
                        <td class="px-6 py-4" data-label="Nama Admin">
                            <div class="flex items-center space-x-3">
                                @if($admin->foto)
                                    <img src="{{ asset('storage/' . $admin->foto) }}" class="w-10 h-10 rounded-full object-cover border border-[#FFD1DC]">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#FF6B9D] to-[#C44569] flex items-center justify-center text-white font-bold">
                                        {{ substr($admin->nama_admin, 0, 1) }}
                                    </div>
                                @endif
                                <div>
                                    <p class="font-semibold text-[#4A3040]">{{ $admin->nama_admin }}</p>
                                    @if($admin->id_admin == Session::get('admin_id'))
                                        <span class="text-[10px] bg-[#FF6B9D] text-white px-2 py-0.5 rounded-full">Anda</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-[#4A3040] font-mono bg-[#FFF5F7] rounded" data-label="Username">{{ $admin->username }}</td>
                        <td class="px-6 py-4 text-sm text-[#C44569]" data-label="Email">{{ $admin->email ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm text-[#C44569]" data-label="Bergabung">{{ \Carbon\Carbon::parse($admin->created_at)->format('d M Y') }}</td>
                        <td class="px-6 py-4" data-label="Aksi">
                            @if($admin->id_admin != Session::get('admin_id'))
                                <form action="{{ route('admin.kelola.destroy', $admin->id_admin) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus admin ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @else
                                <span class="text-xs text-gray-400 italic">Tidak bisa dihapus</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-[#C44569]">
                            <i class="fas fa-users-slash text-4xl mb-3 text-[#FFD1DC]"></i>
                            <p>Belum ada administrator lain.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection