<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Destinasi;

class DestinasiSeeder extends Seeder
{
    public function run()
    {
        Destinasi::insert([
            [
                'nama' => 'Balige',
                'slug' => 'balige',
                'gambar' => 'balige.jpg',
                'deskripsi' => 'Pusat wisata Danau Toba dengan pantai indah'
            ],
            [
                'nama' => 'Meat',
                'slug' => 'meat',
                'gambar' => 'meat.jpg',
                'deskripsi' => 'Desa wisata tradisional di pinggir danau'
            ],
            [
                'nama' => 'Liang Sipege',
                'slug' => 'liang-sipege',
                'gambar' => 'liang.jpg',
                'deskripsi' => 'Goa eksotis dengan pemandangan alam'
            ],
            [
                'nama' => 'Batu Bahisan',
                'slug' => 'batu-bahisan',
                'gambar' => 'batu.jpg',
                'deskripsi' => 'Wisata alam unik dan instagramable'
            ]
        ]);
    }
}