<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->string('kategori', 100);
            $table->text('deskripsi')->nullable();
            $table->string('gambar', 255);
            $table->string('lokasi', 255)->nullable();
            $table->date('tanggal_foto')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            
            // Index untuk mempercepat pencarian
            $table->index('kategori');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};