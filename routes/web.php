<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tintakita;
use App\Http\Controllers\AdminUmkm;
use App\Http\Controllers\ProdukUmkm;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\WebsiteUmkmController;
use App\Http\Controllers\LogAktivitasController;

// ==========================================
// 1. HALAMAN PUBLIK TINTAKITA (Landing Page)
// ==========================================
Route::get('/', [Tintakita::class, 'index'])->name('home');
Route::get('/tentang', [Tintakita::class, 'tentang'])->name('tentang');
Route::get('/templates', [Tintakita::class, 'templates'])->name('templates');
Route::get('/templates/{template}', [Tintakita::class, 'detailTemplate'])->name('templates.detail');

// ==========================================
// 2. WEBSITE UMKM PUBLIK (Server-Side Rendering)
// ==========================================
Route::get('/website/{slug}', [WebsiteUmkmController::class, 'show'])->name('website.show');
Route::post('/website/{slug}/kirim-testimoni', [WebsiteUmkmController::class, 'kirimTestimoni'])->name('website.kirimTestimoni');

// ==========================================
// 3. ADMIN AUTHENTICATION (Login/Logout)
// ==========================================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.process');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// ==========================================
// 4. ADMIN DASHBOARD (Dilindungi Middleware)
// ==========================================
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [AdminUmkm::class, 'dashboard'])->name('dashboard');

    // CRUD Website UMKM
    Route::get('/umkm', [AdminUmkm::class, 'index'])->name('umkm.index');
    Route::get('/umkm/create', [AdminUmkm::class, 'create'])->name('umkm.create');
    Route::post('/umkm', [AdminUmkm::class, 'store'])->name('umkm.store');
    Route::get('/umkm/{id}', [AdminUmkm::class, 'show'])->name('umkm.show');
    Route::get('/umkm/{id}/edit', [AdminUmkm::class, 'edit'])->name('umkm.edit');
    Route::put('/umkm/{id}', [AdminUmkm::class, 'update'])->name('umkm.update');
    Route::delete('/umkm/{id}', [AdminUmkm::class, 'destroy'])->name('umkm.destroy');
    Route::get('/umkm/{id}/preview', [AdminUmkm::class, 'preview'])->name('umkm.preview');
    Route::post('/umkm/{id}/publish', [AdminUmkm::class, 'publish'])->name('umkm.publish');
    Route::post('/umkm/{id}/nonaktifkan', [AdminUmkm::class, 'nonaktifkan'])->name('umkm.nonaktifkan');

    // CRUD Produk
    Route::get('/produk', [ProdukUmkm::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [ProdukUmkm::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukUmkm::class, 'store'])->name('produk.store');
    Route::get('/produk/{id}/edit', [ProdukUmkm::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}', [ProdukUmkm::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProdukUmkm::class, 'destroy'])->name('produk.destroy');

    // Log Aktivitas
    Route::get('/log-aktivitas', [LogAktivitasController::class, 'index'])->name('log.index');

    // Profil Admin
    Route::get('/profil', [AdminAuthController::class, 'showProfile'])->name('profil');
    Route::put('/profil', [AdminAuthController::class, 'updateProfile'])->name('profil.update');
});