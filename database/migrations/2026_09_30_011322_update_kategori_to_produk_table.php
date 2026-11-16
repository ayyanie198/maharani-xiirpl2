<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('kategori', function (Blueprint $table) {
            // Tambahkan kolom agar tabel ini bisa berfungsi sebagai 'Produk'
            // Kolom lama (nama_kategori, deskripsi) TETAP DIPERTAHANKAN agar data existing tidak rusak
            
            if (!Schema::hasColumn('kategori', 'id_toko')) {
                $table->unsignedBigInteger('id_toko')->nullable()->after('id_kategori');
            }
            if (!Schema::hasColumn('kategori', 'nama_produk')) {
                $table->string('nama_produk')->nullable()->after('id_toko');
            }
            if (!Schema::hasColumn('kategori', 'harga')) {
                $table->decimal('harga', 10, 2)->default(0)->after('nama_produk');
            }
            if (!Schema::hasColumn('kategori', 'status_stok')) {
                $table->enum('status_stok', ['tersedia', 'habis'])->default('tersedia')->after('harga');
            }
            if (!Schema::hasColumn('kategori', 'foto')) {
                $table->string('foto')->nullable()->after('status_stok');
            }
            
            // Tambahkan timestamp standar Laravel
            if (!Schema::hasColumn('kategori', 'created_at')) {
                $table->timestamps();
            }
        });
    }

    public function down()
    {
        // Dibiarkan kosong
    }
};