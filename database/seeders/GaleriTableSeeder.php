<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GaleriTableSeeder extends Seeder
{
    public function run()
    {
        $basePath = public_path('image');
        
        if (!File::exists($basePath)) {
            $this->command->error("Folder image tidak ditemukan!");
            return;
        }
        
        // Hapus data lama (opsional)
        DB::table('galeris')->truncate();
        
        // Mapping file ke kategori
        $fileMapping = [
            // Taman Eden (Desa Taman Eden)
            ['file' => 'taman-eden/1.jpg', 'judul' => 'Suasana Desa Taman Eden', 'kategori' => 'taman-eden', 'deskripsi' => 'Keindahan alam Desa Taman Eden'],
            ['file' => 'taman-eden/2.jpg', 'judul' => 'Kegiatan Warga Taman Eden', 'kategori' => 'taman-eden', 'deskripsi' => 'Aktivitas sehari-hari masyarakat'],
            ['file' => 'taman-eden/3.jpg', 'judul' => 'Pemandangan Taman Eden', 'kategori' => 'taman-eden', 'deskripsi' => 'Panorama indah Desa Taman Eden'],
            ['file' => 'taman-eden/4.jpg', 'judul' => 'Budaya Taman Eden', 'kategori' => 'taman-eden', 'deskripsi' => 'Kearifan lokal Desa Taman Eden'],
            ['file' => 'taman-eden/5.jpg', 'judul' => 'Wisata Taman Eden', 'kategori' => 'taman-eden', 'deskripsi' => 'Objek wisata unggulan'],
            ['file' => 'taman-eden/6.jpg', 'judul' => 'Keunikan Taman Eden', 'kategori' => 'taman-eden', 'deskripsi' => 'Spot foto menarik'],
            ['file' => 'taman-eden/7.jpg', 'judul' => 'Persawahan Taman Eden', 'kategori' => 'taman-eden', 'deskripsi' => 'Hamparan sawah hijau'],
            ['file' => 'taman-eden/8.jpg', 'judul' => 'Rumah Adat Taman Eden', 'kategori' => 'taman-eden', 'deskripsi' => 'Arsitektur tradisional Batak'],
            
            // Batu Bahisan
            ['file' => 'batu-bahisan/1.jpg', 'judul' => 'Batu Bahisan Utama', 'kategori' => 'batu-bahisan', 'deskripsi' => 'Formasi batu unik'],
            ['file' => 'batu-bahisan/2.jpg', 'judul' => 'Spot Foto Batu Bahisan', 'kategori' => 'batu-bahisan', 'deskripsi' => 'Lokasi favorit berfoto'],
            ['file' => 'batu-bahisan/3.jpg', 'judul' => 'Panorama Batu Bahisan', 'kategori' => 'batu-bahisan', 'deskripsi' => 'Pemandangan sekitar'],
            
            // Liang Sipege (mapped to Taman Eden)
            ['file' => 'liang-sipege/1.jpg', 'judul' => 'Mulut Gua Liang Sipege', 'kategori' => 'taman-eden', 'deskripsi' => 'Pintu masuk gua'],
            ['file' => 'liang-sipege/2.jpg', 'judul' => 'Di Dalam Gua', 'kategori' => 'taman-eden', 'deskripsi' => 'Keindahan stalaktit'],
            ['file' => 'liang-sipege/3.jpg', 'judul' => 'Ekspedisi Liang Sipege', 'kategori' => 'taman-eden', 'deskripsi' => 'Penjelajahan gua'],
            
            // Slide/Hero (opsional untuk galeri)
            ['file' => 'slide1.jpg', 'judul' => 'Danau Toba 1', 'kategori' => 'taman-eden', 'deskripsi' => 'Keindahan Danau Toba'],
            ['file' => 'slide2.jpg', 'judul' => 'Danau Toba 2', 'kategori' => 'taman-eden', 'deskripsi' => 'Panorama Danau Toba'],
            ['file' => 'slide3.jpg', 'judul' => 'Danau Toba 3', 'kategori' => 'taman-eden', 'deskripsi' => 'Pesona Danau Toba'],
            ['file' => 'slide4.jpg', 'judul' => 'Danau Toba 4', 'kategori' => 'taman-eden', 'deskripsi' => 'Keindahan Alam'],
            ['file' => 'slide5.jpg', 'judul' => 'Danau Toba 5', 'kategori' => 'taman-eden', 'deskripsi' => 'Spot Favorit'],
            
            // Detail destinasi
            ['file' => 'taman-eden/meat-detail.jpg', 'judul' => 'Detail Desa Taman Eden', 'kategori' => 'taman-eden', 'deskripsi' => 'Keunikan Desa Taman Eden'],
            ['file' => 'batu-detail.jpg', 'judul' => 'Detail Batu Bahisan', 'kategori' => 'batu-bahisan', 'deskripsi' => 'Formasi batu eksotis'],
            ['file' => 'liang-detail.jpg', 'judul' => 'Detail Liang Sipege', 'kategori' => 'liang-sipege', 'deskripsi' => 'Keindahan dalam gua'],
            
            // Penginapan
            ['file' => 'taman-eden/penginapan1.jpg', 'judul' => 'Penginapan Mewah', 'kategori' => 'taman-eden', 'deskripsi' => 'Akomodasi nyaman'],
            ['file' => 'taman-eden/penginapan2.jpg', 'judul' => 'Resort Danau Toba', 'kategori' => 'taman-eden', 'deskripsi' => 'Resort bintang 5'],
            ['file' => 'taman-eden/penginapan3.jpg', 'judul' => 'Villa Keluarga', 'kategori' => 'taman-eden', 'deskripsi' => 'Villa untuk keluarga'],
        ];
        
        $count = 0;
        
        foreach ($fileMapping as $data) {
            $fullPath = $basePath . '/' . $data['file'];
            
            // Cek apakah file ada
            if (File::exists($fullPath)) {
                DB::table('galeris')->insert([
                    'judul' => $data['judul'],
                    'slug' => Str::slug($data['judul']) . '-' . uniqid(),
                    'deskripsi' => $data['deskripsi'],
                    'gambar' => 'image/' . $data['file'],
                    'kategori' => $data['kategori'],
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $count++;
                $this->command->info("✓ " . $data['file']);
            } else {
                $this->command->warn("✗ File tidak ditemukan: " . $data['file']);
            }
        }
        
        $this->command->info("");
        $this->command->info(" SELESAI! Total $count foto masuk database.");
    }
}