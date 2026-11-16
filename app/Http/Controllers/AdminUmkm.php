<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;
use App\Models\LogAktivitas;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminUmkm extends Controller
{
    public function dashboard()
    {
        $totalWebsite = Portofolio::count();
        $websiteAktif = Portofolio::where('status_website', 'aktif')->count();
        $websiteDraft = Portofolio::where('status_website', 'draft')->count();
        $websiteNonaktif = Portofolio::where('status_website', 'nonaktif')->count();
        $totalProduk = \App\Models\Produk::count();
        $aktivitasHariIni = LogAktivitas::whereDate('created_at', today())->count();
        $aktivitasTerbaru = LogAktivitas::with('admin')->orderBy('created_at', 'desc')->take(5)->get();
        $websiteTerbaru = Portofolio::orderBy('created_at', 'desc')->take(5)->get();

        return view('Admin.dashboard', compact(
            'totalWebsite', 'websiteAktif', 'websiteDraft', 'websiteNonaktif',
            'totalProduk', 'aktivitasHariIni', 'aktivitasTerbaru', 'websiteTerbaru'
        ));
    }

    public function index()
    {
        $umkm = Portofolio::with('admin')->orderBy('created_at', 'desc')->get();
        return view('AdminUmkm.index', compact('umkm'));
    }

    public function create()
    {
        return view('AdminUmkm.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_toko' => 'required|string|max:100',
            'nama_pemilik' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:255',
            'deskripsi' => 'required|string',
            'slug' => 'required|string|unique:portofolio,slug|max:100|alpha_dash',
            'template' => 'required|string|in:template-1,template-2,template-3,template-4',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'foto_hero' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cerita_usaha' => 'nullable|string',
            'tahun_berdiri' => 'nullable|integer',
            'instagram' => 'nullable|string|max:255',
            'jam_operasional' => 'nullable|string|max:100',
            'testimoni_nama.*' => 'nullable|string|max:100',
            'testimoni_rating.*' => 'nullable|integer|min:1|max:5',
            'testimoni_pesan.*' => 'nullable|string',
            'produk_nama.*' => 'nullable|string|max:100',
            'produk_harga.*' => 'nullable|numeric|min:0',
            'produk_stok.*' => 'nullable|in:tersedia,habis',
            'produk_foto.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'produk_deskripsi.*' => 'nullable|string',
        ]);

        $logoPath = $request->hasFile('logo') ? $request->file('logo')->store('uploads/umkm', 'public') : null;
        $heroPath = $request->hasFile('foto_hero') ? $request->file('foto_hero')->store('uploads/umkm', 'public') : null;

        // Proses Testimoni
        $testimoniData = [];
        if ($request->has('testimoni_nama')) {
            foreach ($request->testimoni_nama as $index => $nama) {
                if (!empty(trim($nama))) {
                    $testimoniData[] = [
                        'nama' => trim($nama),
                        'rating' => (int)($request->testimoni_rating[$index] ?? 5),
                        'pesan' => trim($request->testimoni_pesan[$index] ?? ''),
                    ];
                }
            }
        }

        $portofolio = Portofolio::create([
            'nama_toko' => $validated['nama_toko'],
            'nama_pemilik' => $validated['nama_pemilik'],
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
            'deskripsi' => $validated['deskripsi'],
            'slug' => $validated['slug'],
            'template' => $validated['template'],
            'logo' => $logoPath,
            'foto_hero' => $heroPath,
            'cerita_usaha' => $request->cerita_usaha,
            'tahun_berdiri' => $request->tahun_berdiri,
            'instagram' => $request->instagram,
            'jam_operasional' => $request->jam_operasional,
            'testimoni' => !empty($testimoniData) ? json_encode($testimoniData) : null,
            'status_website' => 'draft',
            'id_admin' => Session::get('admin_id'),
        ]);

        // Simpan Produk Inline
        if ($request->has('produk_nama')) {
            foreach ($request->produk_nama as $index => $namaProduk) {
                if (!empty($namaProduk)) {
                    $fotoProduk = $request->hasFile("produk_foto.$index") 
                        ? $request->file("produk_foto.$index")->store('uploads/produk', 'public') 
                        : null;

                    \App\Models\Produk::create([
                        'id_toko' => $portofolio->id_toko,
                        'nama_produk' => $namaProduk,
                        'harga' => $request->produk_harga[$index] ?? 0,
                        'status_stok' => $request->produk_stok[$index] ?? 'tersedia',
                        'foto' => $fotoProduk,
                        'nama_kategori' => 'Umum',
                        'deskripsi' => $request->produk_deskripsi[$index] ?? null,
                    ]);
                }
            }
        }

        LogAktivitas::create([
            'jenis_aktivitas' => 'Tambah Website',
            'deskripsi_aktivitas' => "Administrator menambahkan website UMKM: {$portofolio->nama_toko}",
            'id_admin' => Session::get('admin_id'),
        ]);

        return redirect()->route('admin.umkm.index')
            ->with('success', "Website UMKM '{$portofolio->nama_toko}' berhasil dibuat!");
    }

    public function show($id)
    {
        $umkm = Portofolio::with('produk')->findOrFail($id);
        return view('AdminUmkm.show', compact('umkm'));
    }

    public function edit($id)
    {
        $umkm = Portofolio::findOrFail($id);
        return view('AdminUmkm.edit', compact('umkm'));
    }

    public function update(Request $request, $id)
    {
        $umkm = Portofolio::findOrFail($id);

        $validated = $request->validate([
            'nama_toko' => 'required|string|max:100',
            'nama_pemilik' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:255',
            'deskripsi' => 'required|string',
            'slug' => 'required|string|max:100|alpha_dash|unique:portofolio,slug,' . $umkm->id_toko . ',id_toko',
            'template' => 'required|string|in:template-1,template-2,template-3,template-4',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'foto_hero' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cerita_usaha' => 'nullable|string',
            'tahun_berdiri' => 'nullable|integer',
            'instagram' => 'nullable|string|max:255',
            'jam_operasional' => 'nullable|string|max:100',
            'testimoni_nama.*' => 'nullable|string|max:100',
            'testimoni_rating.*' => 'nullable|integer|min:1|max:5',
            'testimoni_pesan.*' => 'nullable|string',
        ]);

        if ($request->hasFile('logo')) {
            if ($umkm->logo) Storage::disk('public')->delete($umkm->logo);
            $validated['logo'] = $request->file('logo')->store('uploads/umkm', 'public');
        }

        if ($request->hasFile('foto_hero')) {
            if ($umkm->foto_hero) Storage::disk('public')->delete($umkm->foto_hero);
            $validated['foto_hero'] = $request->file('foto_hero')->store('uploads/umkm', 'public');
        }

        $testimoniData = [];
        if ($request->has('testimoni_nama')) {
            foreach ($request->testimoni_nama as $index => $nama) {
                if (!empty(trim($nama))) {
                    $testimoniData[] = [
                        'nama' => trim($nama),
                        'rating' => (int)($request->testimoni_rating[$index] ?? 5),
                        'pesan' => trim($request->testimoni_pesan[$index] ?? ''),
                    ];
                }
            }
        }

        $umkm->update([
            'nama_toko' => $validated['nama_toko'],
            'nama_pemilik' => $validated['nama_pemilik'],
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
            'deskripsi' => $validated['deskripsi'],
            'slug' => $validated['slug'],
            'template' => $validated['template'],
            'logo' => $validated['logo'] ?? $umkm->logo,
            'foto_hero' => $validated['foto_hero'] ?? $umkm->foto_hero,
            'cerita_usaha' => $request->cerita_usaha,
            'tahun_berdiri' => $request->tahun_berdiri,
            'instagram' => $request->instagram,
            'jam_operasional' => $request->jam_operasional,
            'testimoni' => !empty($testimoniData) ? json_encode($testimoniData) : null,
        ]);

        LogAktivitas::create([
            'jenis_aktivitas' => 'Edit Website',
            'deskripsi_aktivitas' => "Administrator memperbarui website UMKM: {$umkm->nama_toko}",
            'id_admin' => Session::get('admin_id'),
        ]);

        return redirect()->route('admin.umkm.index')
            ->with('success', "Website UMKM '{$umkm->nama_toko}' berhasil diperbarui!");
    }

    public function destroy($id)
    {
        $umkm = Portofolio::findOrFail($id);
        $namaToko = $umkm->nama_toko;

        if ($umkm->logo) Storage::disk('public')->delete($umkm->logo);
        if ($umkm->foto_hero) Storage::disk('public')->delete($umkm->foto_hero);

        $umkm->delete();

        LogAktivitas::create([
            'jenis_aktivitas' => 'Hapus Website',
            'deskripsi_aktivitas' => "Administrator menghapus website UMKM: {$namaToko}",
            'id_admin' => Session::get('admin_id'),
        ]);

        return redirect()->route('admin.umkm.index')
            ->with('success', "Website UMKM '{$namaToko}' berhasil dihapus!");
    }

    public function preview($id)
    {
        $umkm = Portofolio::with('produk')->findOrFail($id);
        $template = $umkm->template ?? 'template-1';
        return view("templates.{$template}.index", compact('umkm'));
    }

    public function publish($id)
    {
        $umkm = Portofolio::findOrFail($id);
        $umkm->update(['status_website' => 'aktif']);

        LogAktivitas::create([
            'jenis_aktivitas' => 'Publish Website',
            'deskripsi_aktivitas' => "Administrator mempublikasikan website UMKM: {$umkm->nama_toko}",
            'id_admin' => Session::get('admin_id'),
        ]);

        return back()->with('success', "Website '{$umkm->nama_toko}' berhasil dipublikasikan!");
    }

    public function nonaktifkan($id)
    {
        $umkm = Portofolio::findOrFail($id);
        $umkm->update(['status_website' => 'nonaktif']);

        LogAktivitas::create([
            'jenis_aktivitas' => 'Nonaktifkan Website',
            'deskripsi_aktivitas' => "Administrator menonaktifkan website UMKM: {$umkm->nama_toko}",
            'id_admin' => Session::get('admin_id'),
        ]);

        return back()->with('success', "Website '{$umkm->nama_toko}' berhasil dinonaktifkan!");
    }
}