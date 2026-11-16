<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Produk;
use App\Models\Portofolio;
use App\Models\LogAktivitas;

class ProdukUmkm extends Controller
{
    // 1. INDEX: Tampilkan daftar semua produk
    public function index(Request $request)
    {
        $query = Produk::with('portofolio');
        
        // Filter berdasarkan UMKM jika ada
        if ($request->filled('id_toko')) {
            $query->where('id_toko', $request->id_toko);
        }
        
        $produk = $query->orderBy('created_at', 'desc')->get();
        $umkmList = Portofolio::orderBy('nama_toko')->get();
        
        return view('ProdukUmkm.index', compact('produk', 'umkmList'));
    }

    // 2. CREATE: Tampilkan form tambah produk
    public function create(Request $request)
    {
        $umkmList = Portofolio::orderBy('nama_toko')->get();
        $selectedUmkm = $request->id_toko;
        
        return view('ProdukUmkm.create', compact('umkmList', 'selectedUmkm'));
    }

    // 3. STORE: Simpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_toko' => 'required|exists:portofolio,id_toko',
            'nama_produk' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'status_stok' => 'required|in:tersedia,habis',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Handle Upload Foto
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('uploads/produk', 'public');
        }

        // Simpan ke Database
        $produk = Produk::create([
            'id_toko' => $validated['id_toko'],
            'nama_produk' => $validated['nama_produk'],
            'deskripsi' => $validated['deskripsi'],
            'harga' => $validated['harga'],
            'status_stok' => $validated['status_stok'],
            'foto' => $fotoPath,
        ]);

        // Ambil nama UMKM untuk log
        $umkm = Portofolio::find($validated['id_toko']);

        LogAktivitas::create([
            'jenis_aktivitas' => 'Tambah Produk',
            'deskripsi_aktivitas' => "Administrator menambahkan produk '{$produk->nama_produk}' ke UMKM {$umkm->nama_toko}",
            'id_admin' => Session::get('admin_id'),
        ]);

        return redirect()->route('admin.produk.index')
            ->with('success', "Produk '{$produk->nama_produk}' berhasil ditambahkan!");
    }

    // 4. EDIT: Tampilkan form edit produk
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $umkmList = Portofolio::orderBy('nama_toko')->get();
        
        return view('ProdukUmkm.edit', compact('produk', 'umkmList'));
    }

    // 5. UPDATE: Simpan perubahan produk
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $validated = $request->validate([
            'id_toko' => 'required|exists:portofolio,id_toko',
            'nama_produk' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'status_stok' => 'required|in:tersedia,habis',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Handle Upload Foto (hapus yang lama jika ada yang baru)
        $fotoPath = $produk->foto;
        if ($request->hasFile('foto')) {
            if ($fotoPath) Storage::disk('public')->delete($fotoPath);
            $fotoPath = $request->file('foto')->store('uploads/produk', 'public');
        }

        // Update Database
        $produk->update([
            'id_toko' => $validated['id_toko'],
            'nama_produk' => $validated['nama_produk'],
            'deskripsi' => $validated['deskripsi'],
            'harga' => $validated['harga'],
            'status_stok' => $validated['status_stok'],
            'foto' => $fotoPath,
        ]);

        $umkm = Portofolio::find($validated['id_toko']);

        LogAktivitas::create([
            'jenis_aktivitas' => 'Edit Produk',
            'deskripsi_aktivitas' => "Administrator memperbarui produk '{$produk->nama_produk}' di UMKM {$umkm->nama_toko}",
            'id_admin' => Session::get('admin_id'),
        ]);

        return redirect()->route('admin.produk.index')
            ->with('success', "Produk '{$produk->nama_produk}' berhasil diperbarui!");
    }

    // 6. DESTROY: Hapus produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        
        // Hapus foto dari storage
        if ($produk->foto) Storage::disk('public')->delete($produk->foto);

        $namaProduk = $produk->nama_produk;
        $umkm = Portofolio::find($produk->id_toko);

        $produk->delete();

        LogAktivitas::create([
            'jenis_aktivitas' => 'Hapus Produk',
            'deskripsi_aktivitas' => "Administrator menghapus produk '{$namaProduk}' dari UMKM " . ($umkm ? $umkm->nama_toko : 'Unknown'),
            'id_admin' => Session::get('admin_id'),
        ]);

        return redirect()->route('admin.produk.index')
            ->with('success', "Produk '{$namaProduk}' berhasil dihapus.");
    }
}