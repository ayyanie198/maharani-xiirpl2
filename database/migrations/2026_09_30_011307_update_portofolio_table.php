<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // 1. Hapus foreign key lama ke kategori secara AMAN
        // Cek dulu nama foreign key yang sebenarnya ada di database
        $foreignKeyName = DB::select("
            SELECT CONSTRAINT_NAME 
            FROM information_schema.KEY_COLUMN_USAGE 
            WHERE TABLE_SCHEMA = DATABASE() 
            AND TABLE_NAME = 'portofolio' 
            AND COLUMN_NAME = 'id_kategori' 
            AND REFERENCED_TABLE_NAME = 'kategori'
        ");

        // Jika ketemu, hapus foreign key tersebut
        if (!empty($foreignKeyName)) {
            $constraint = $foreignKeyName[0]->CONSTRAINT_NAME;
            DB::statement("ALTER TABLE `portofolio` DROP FOREIGN KEY `{$constraint}`");
        }

        // 2. Tambahkan kolom baru yang dibutuhkan (hanya jika belum ada)
        Schema::table('portofolio', function (Blueprint $table) {
            if (!Schema::hasColumn('portofolio', 'logo')) {
                $table->string('logo')->nullable()->after('no_hp');
            }
            if (!Schema::hasColumn('portofolio', 'foto_hero')) {
                $table->string('foto_hero')->nullable()->after('foto');
            }
            if (!Schema::hasColumn('portofolio', 'cerita_usaha')) {
                $table->text('cerita_usaha')->nullable()->after('deskripsi');
            }
            if (!Schema::hasColumn('portofolio', 'tahun_berdiri')) {
                $table->year('tahun_berdiri')->nullable()->after('cerita_usaha');
            }
            if (!Schema::hasColumn('portofolio', 'instagram')) {
                $table->string('instagram')->nullable()->after('tahun_berdiri');
            }
            if (!Schema::hasColumn('portofolio', 'jam_operasional')) {
                $table->string('jam_operasional')->nullable()->after('instagram');
            }
            if (!Schema::hasColumn('portofolio', 'template')) {
                $table->string('template')->default('template-1')->after('jam_operasional');
            }
            if (!Schema::hasColumn('portofolio', 'status_website')) {
                $table->enum('status_website', ['draft', 'aktif', 'nonaktif'])->default('draft')->after('slug');
            }
            if (!Schema::hasColumn('portofolio', 'testimoni')) {
                $table->json('testimoni')->nullable()->after('status_website');
            }
            
            // 3. Tambahkan timestamp standar Laravel untuk kemudahan tracking
            if (!Schema::hasColumn('portofolio', 'created_at')) {
                $table->timestamps();
            }
        });
    }

    public function down()
    {
        // Dibiarkan kosong agar data tidak terhapus saat rollback
    }
};