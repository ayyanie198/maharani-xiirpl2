<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class AdminUlasanController extends Controller
{
    public function index()
    {
        $ulasanList = Ulasan::orderBy('created_at', 'desc')->get();
        return view('AdminUlasan.index', compact('ulasanList'));
    }

    public function approve($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->status = 1; // Ubah jadi Disetujui
        $ulasan->save();
        
        return back()->with('success', 'Ulasan berhasil disetujui dan tampil di landing page! 🌸');
    }

    public function destroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();
        
        return back()->with('success', 'Ulasan berhasil dihapus.');
    }
}