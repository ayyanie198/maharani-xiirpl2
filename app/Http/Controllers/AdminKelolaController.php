<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminKelolaController extends Controller
{
    // Tampilkan daftar admin
    public function index()
    {
        $admins = Admin::orderBy('created_at', 'desc')->get();
        return view('AdminKelola.index', compact('admins'));
    }

    // Tampilkan form tambah admin
    public function create()
    {
        return view('AdminKelola.create');
    }

    // Simpan admin baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_admin' => 'required|string|max:100',
            'username' => 'required|string|unique:admins,username|max:50',
            'password' => 'required|string|min:6',
            'email' => 'nullable|email|max:100',
        ]);

        Admin::create([
            'nama_admin' => $request->nama_admin,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Penting: Password harus di-hash!
            'email' => $request->email,
        ]);

        return redirect()->route('admin.kelola.index')
            ->with('success', 'Admin baru berhasil ditambahkan ke Doodlune! 🌸');
    }

    // Hapus admin
    public function destroy($id)
    {
        // Cegah admin menghapus akunnya sendiri
        if ($id == Session::get('admin_id')) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri! 🚫');
        }

        $admin = Admin::findOrFail($id);
        $admin->delete();

        return back()->with('success', 'Admin berhasil dihapus dari sistem.');
    }
}