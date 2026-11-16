<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;

class WebsiteUmkmController extends Controller
{
    /**
     * Tampilkan website UMKM secara publik berdasarkan slug
     */
    public function show($slug)
    {
        // Cari UMKM berdasarkan slug, beserta produknya
        $umkm = Portofolio::with('produk')
            ->where('slug', $slug)
            ->first();

        // Jika tidak ditemukan, tampilkan 404
        if (!$umkm) {
            abort(404, 'Website UMKM tidak ditemukan.');
        }

        // Jika status nonaktif, tampilkan halaman khusus
        if ($umkm->status_website === 'nonaktif') {
            return view('errors.website-nonaktif', compact('umkm'));
        }

        // Jika status draft, tampilkan halaman khusus
        if ($umkm->status_website === 'draft') {
            return view('errors.website-draft', compact('umkm'));
        }

        // Tentukan template yang digunakan
        $template = $umkm->template ?? 'template-1';

        // Render template yang sesuai
        return view("templates.{$template}.index", compact('umkm'));
    }
    
    public function kirimTestimoni(Request $request, $slug)
    {
        $umkm = Portofolio::where('slug', $slug)->firstOrFail();

        $request->validate([
            'nama_pengirim' => 'required|string|max:50',
            'pesan_testimoni' => 'required|string|max:500',
        ], [
            'nama_pengirim.required' => 'Nama wajib diisi.',
            'pesan_testimoni.required' => 'Pesan testimoni wajib diisi.',
        ]);

        $testimoniLama = $umkm->testimoni;
        
        if (is_string($testimoniLama)) {
            $testimoniLama = json_decode($testimoniLama, true) ?? [];
        }
        if (!is_array($testimoniLama)) {
            $testimoniLama = [];
        }

        $testimoniLama[] = [
            'nama' => $request->nama_pengirim,
            'pesan' => $request->pesan_testimoni,
            'tanggal' => date('d M Y'),
            'rating' => 5,
        ];

        $umkm->testimoni = json_encode($testimoniLama);
        $umkm->save();

        return back()->with('success_testimoni', 'Terima kasih! Testimoni Anda berhasil dikirim.');
    }
}