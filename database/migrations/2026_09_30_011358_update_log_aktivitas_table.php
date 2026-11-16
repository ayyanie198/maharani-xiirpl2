<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('log_aktivitas', function (Blueprint $table) {
            // Kolom 'riwayat_aktivitas' existing bertipe timestamp (sedikit tidak standar).
            // Kita tambahkan kolom baru untuk deskripsi teks yang sebenarnya.
            if (!Schema::hasColumn('log_aktivitas', 'deskripsi_aktivitas')) {
                $table->text('deskripsi_aktivitas')->nullable()->after('jenis_aktivitas');
            }
            
            // Tambahkan timestamp standar Laravel
            if (!Schema::hasColumn('log_aktivitas', 'created_at')) {
                $table->timestamps();
            }
        });
    }

    public function down()
    {
        // Dibiarkan kosong
    }
};