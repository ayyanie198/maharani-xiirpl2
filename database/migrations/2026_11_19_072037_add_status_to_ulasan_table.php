<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ulasan', function (Blueprint $table) {
            // Cek dulu apakah kolom sudah ada (biar aman)
            if (!Schema::hasColumn('ulasan', 'status')) {
                $table->tinyInteger('status')->default(0)->after('rating');
            }
        });
    }

    public function down(): void
    {
        Schema::table('ulasan', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};