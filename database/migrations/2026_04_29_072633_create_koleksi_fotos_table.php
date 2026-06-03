<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('koleksi_fotos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_foto');
            $table->binary('file_foto');
            $table->string('imageable_type')->nullable(); // berita, umkm, fasilitas, penginapan
            $table->unsignedBigInteger('imageable_id')->nullable();
            $table->timestamps();
            
            $table->index(['imageable_type', 'imageable_id']);
        });

        DB::statement("ALTER TABLE koleksi_fotos MODIFY file_foto LONGBLOB");
    }

    public function down(): void
    {
        Schema::dropIfExists('koleksi_fotos');
    }
};