<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\LogAktivitas;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        if (Session::has('admin_id')) {
            return redirect()->route('admin.dashboard');
        }
        return view('Admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->withErrors(['login' => 'Username atau password salah.'])->withInput();
        }

        Session::put([
            'admin_id' => $admin->id_admin,
            'admin_username' => $admin->username,
            'admin_nama' => $admin->nama_admin,
        ]);

        LogAktivitas::create([
            'jenis_aktivitas' => 'Login',
            'deskripsi_aktivitas' => "Administrator {$admin->nama_admin} login ke dashboard.",
            'id_admin' => $admin->id_admin,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, ' . $admin->nama_admin . '!');
    }

    public function logout()
    {
        if (Session::has('admin_id')) {
            LogAktivitas::create([
                'jenis_aktivitas' => 'Logout',
                'deskripsi_aktivitas' => "Administrator " . Session::get('admin_nama') . " logout dari dashboard.",
                'id_admin' => Session::get('admin_id'),
            ]);
        }

        Session::forget(['admin_id', 'admin_username', 'admin_nama']);

        return redirect()->route('admin.login')->with('success', 'Anda berhasil logout.');
    }

    public function showProfile()
    {
        $admin = Admin::find(Session::get('admin_id'));
        return view('Admin.profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = Admin::find(Session::get('admin_id'));

        $validated = $request->validate([
            'nama_admin' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:admin,email,' . $admin->id_admin . ',id_admin',
            'password' => 'nullable|string|min:6|confirmed',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($admin->foto) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($admin->foto);
            }
            $validated['foto'] = $request->file('foto')->store('uploads/admin', 'public');
        }

        $admin->nama_admin = $validated['nama_admin'];
        $admin->email = $validated['email'];
        if (isset($validated['foto'])) {
            $admin->foto = $validated['foto'];
        }
        if (!empty($validated['password'])) {
            $admin->password = Hash::make($validated['password']);
        }

        $admin->save();
        Session::put('admin_nama', $admin->nama_admin);

        LogAktivitas::create([
            'jenis_aktivitas' => 'Update Profil',
            'deskripsi_aktivitas' => "Administrator {$admin->nama_admin} memperbarui profil akun.",
            'id_admin' => $admin->id_admin,
        ]);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}