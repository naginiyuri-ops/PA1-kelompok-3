<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha');
            $table->string('pemilik');
            $table->text('alamat');
            $table->string('no_telepon');
            $table->text('deskripsi')->nullable();
            $table->string('foto_utama')->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
            
            // HAPUS SEMUA BARIS YANG ADA FOREIGN KEY
            // JANGAN ADA foreignId atau constraint
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};