<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('koleksi_fotos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_foto');
            $table->string('file_foto');
            $table->string('imageable_type')->nullable();
            $table->unsignedBigInteger('imageable_id')->nullable();
            $table->timestamps();
            
            $table->index(['imageable_type', 'imageable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('koleksi_fotos');
    }
};