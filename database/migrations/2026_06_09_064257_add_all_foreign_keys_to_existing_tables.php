<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ==================== 1. TAMBAH KOLOM admin_id KE SEMUA TABEL ====================
        
        // Beritas
        if (Schema::hasTable('beritas') && !Schema::hasColumn('beritas', 'admin_id')) {
            Schema::table('beritas', function (Blueprint $table) {
                $table->unsignedBigInteger('admin_id')->nullable()->after('id');
            });
        }
        
        // Informasis
        if (Schema::hasTable('informasis') && !Schema::hasColumn('informasis', 'admin_id')) {
            Schema::table('informasis', function (Blueprint $table) {
                $table->unsignedBigInteger('admin_id')->nullable()->after('id');
            });
        }
        
        // Galeri
        if (Schema::hasTable('galeri') && !Schema::hasColumn('galeri', 'admin_id')) {
            Schema::table('galeri', function (Blueprint $table) {
                $table->unsignedBigInteger('admin_id')->nullable()->after('id');
            });
        }
        
        // Umkm
        if (Schema::hasTable('umkm') && !Schema::hasColumn('umkm', 'admin_id')) {
            Schema::table('umkm', function (Blueprint $table) {
                $table->unsignedBigInteger('admin_id')->nullable()->after('id');
            });
        }
        
        // Fasilitas
        if (Schema::hasTable('fasilitas') && !Schema::hasColumn('fasilitas', 'admin_id')) {
            Schema::table('fasilitas', function (Blueprint $table) {
                $table->unsignedBigInteger('admin_id')->nullable()->after('id');
            });
        }
        
        // Penginapan
        if (Schema::hasTable('penginapan') && !Schema::hasColumn('penginapan', 'admin_id')) {
            Schema::table('penginapan', function (Blueprint $table) {
                $table->unsignedBigInteger('admin_id')->nullable()->after('id');
            });
        }
        
        // KONTAK - tambah kolom admin_id
        if (Schema::hasTable('kontak') && !Schema::hasColumn('kontak', 'admin_id')) {
            Schema::table('kontak', function (Blueprint $table) {
                $table->unsignedBigInteger('admin_id')->nullable()->after('id');
            });
        }
        
        // Koleksi_fotos
        if (Schema::hasTable('koleksi_fotos') && !Schema::hasColumn('koleksi_fotos', 'galeri_id')) {
            Schema::table('koleksi_fotos', function (Blueprint $table) {
                $table->unsignedBigInteger('galeri_id')->nullable()->after('id');
            });
        }
        
        // ==================== 2. BUAT FOREIGN KEY ====================
        
        // Beritas ke Admin
        if (Schema::hasTable('beritas') && Schema::hasColumn('beritas', 'admin_id')) {
            Schema::table('beritas', function (Blueprint $table) {
                $table->foreign('admin_id', 'fk_beritas_admin')
                      ->references('id')->on('admin')
                      ->onDelete('set null');
            });
        }
        
        // Informasis ke Admin
        if (Schema::hasTable('informasis') && Schema::hasColumn('informasis', 'admin_id')) {
            Schema::table('informasis', function (Blueprint $table) {
                $table->foreign('admin_id', 'fk_informasis_admin')
                      ->references('id')->on('admin')
                      ->onDelete('set null');
            });
        }
        
        // Galeri ke Admin
        if (Schema::hasTable('galeri') && Schema::hasColumn('galeri', 'admin_id')) {
            Schema::table('galeri', function (Blueprint $table) {
                $table->foreign('admin_id', 'fk_galeri_admin')
                      ->references('id')->on('admin')
                      ->onDelete('set null');
            });
        }
        
        // Umkm ke Admin
        if (Schema::hasTable('umkm') && Schema::hasColumn('umkm', 'admin_id')) {
            Schema::table('umkm', function (Blueprint $table) {
                $table->foreign('admin_id', 'fk_umkm_admin')
                      ->references('id')->on('admin')
                      ->onDelete('set null');
            });
        }
        
        // Fasilitas ke Admin
        if (Schema::hasTable('fasilitas') && Schema::hasColumn('fasilitas', 'admin_id')) {
            Schema::table('fasilitas', function (Blueprint $table) {
                $table->foreign('admin_id', 'fk_fasilitas_admin')
                      ->references('id')->on('admin')
                      ->onDelete('set null');
            });
        }
        
        // Penginapan ke Admin
        if (Schema::hasTable('penginapan') && Schema::hasColumn('penginapan', 'admin_id')) {
            Schema::table('penginapan', function (Blueprint $table) {
                $table->foreign('admin_id', 'fk_penginapan_admin')
                      ->references('id')->on('admin')
                      ->onDelete('set null');
            });
        }
        
        // KONTAK ke Admin - RELASI LANGSUNG
        if (Schema::hasTable('kontak') && Schema::hasColumn('kontak', 'admin_id')) {
            Schema::table('kontak', function (Blueprint $table) {
                $table->foreign('admin_id', 'fk_kontak_admin')
                      ->references('id')->on('admin')
                      ->onDelete('set null');
            });
        }
        
        // Koleksi_fotos ke Galeri
        if (Schema::hasTable('koleksi_fotos') && Schema::hasColumn('koleksi_fotos', 'galeri_id')) {
            Schema::table('koleksi_fotos', function (Blueprint $table) {
                $table->foreign('galeri_id', 'fk_koleksifotos_galeri')
                      ->references('id')->on('galeri')
                      ->onDelete('set null');
            });
        }
    }

    public function down(): void
    {
        // Hapus foreign key
        $foreignKeys = [
            'fk_beritas_admin', 'fk_informasis_admin', 'fk_galeri_admin',
            'fk_umkm_admin', 'fk_fasilitas_admin', 'fk_penginapan_admin',
            'fk_kontak_admin', 'fk_koleksifotos_galeri'
        ];
        
        $tables = ['beritas', 'informasis', 'galeri', 'umkm', 'fasilitas', 'penginapan', 'kontak', 'koleksi_fotos'];
        
        foreach ($tables as $table) {
            if (Schema::hasTable($table)) {
                Schema::table($table, function (Blueprint $table) use ($foreignKeys) {
                    foreach ($foreignKeys as $fk) {
                        try {
                            $table->dropForeign($fk);
                        } catch (\Exception $e) {
                            // Foreign key tidak ada, lanjutkan
                        }
                    }
                });
            }
        }
        
        // Hapus kolom admin_id dari semua tabel
        $tablesWithAdminId = ['beritas', 'informasis', 'galeri', 'umkm', 'fasilitas', 'penginapan', 'kontak'];
        foreach ($tablesWithAdminId as $table) {
            if (Schema::hasTable($table) && Schema::hasColumn($table, 'admin_id')) {
                Schema::table($table, function (Blueprint $table) {
                    $table->dropColumn('admin_id');
                });
            }
        }
        
        // Hapus kolom galeri_id dari koleksi_fotos
        if (Schema::hasTable('koleksi_fotos') && Schema::hasColumn('koleksi_fotos', 'galeri_id')) {
            Schema::table('koleksi_fotos', function (Blueprint $table) {
                $table->dropColumn('galeri_id');
            });
        }
    }
};