<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('informasi', function (Blueprint $table) {
            if (!Schema::hasColumn('informasi', 'geosite')) {
                $table->enum('geosite', ['meat', 'batu_bahisan', 'liang_sipege'])->nullable()->after('status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('informasi', function (Blueprint $table) {
            if (Schema::hasColumn('informasi', 'geosite')) {
                $table->dropColumn('geosite');
            }
        });
    }
};