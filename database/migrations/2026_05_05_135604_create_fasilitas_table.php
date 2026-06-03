<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('informasi_id')->nullable()->constrained('informasi')->nullOnDelete();
            $table->string('nama', 255);
            $table->text('deskripsi');
            $table->string('kontak')->nullable();
            $table->string('lokasi')->nullable();
            $table->longText('gambar')->nullable();
            $table->string('harga')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fasilitas');
    }
};