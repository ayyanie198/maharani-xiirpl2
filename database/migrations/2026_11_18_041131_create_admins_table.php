<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id('id_admin'); // Primary key dengan nama id_admin
            $table->string('nama_admin', 100);
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->string('email', 100)->nullable();
            $table->string('foto')->nullable();
            $table->timestamps(); // created_at & updated_at
        });

        // Insert admin default (supaya bisa login pertama kali)
        \Illuminate\Support\Facades\DB::table('admins')->insert([
            'nama_admin' => 'Admin Doodlune',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'email' => 'admin@doodlune.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};