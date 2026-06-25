<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'category' => 'alam',
                'title' => 'Taman Eden 100',
                'short_description' => 'Area konservasi dan rekreasi di sekitar Danau Toba',
                'description' => 'Taman Eden 100 menawarkan pemandangan alam, jalur trekking, dan atraksi geologi.',
                'image_path' => 'image/taman-eden/hero.jpg',
                'hero_image_path' => 'image/taman-eden/hero.jpg',
                'location' => 'Kawasan Taman Eden',
                'status' => true,
                'is_featured' => true,
                'tags' => 'taman,eden,geosite',
            ],
            [
                'category' => 'alam',
                'title' => 'Batu Bahisan',
                'short_description' => 'Formasi batuan dengan nilai edukasi tinggi',
                'description' => 'Batu Bahisan menunjukkan struktur geologi yang unik dan menarik untuk penelitian.',
                'image_path' => 'image/batu-bahisan/galeri/1.jpg',
                'hero_image_path' => 'image/batu-bahisan/hero.jpg',
                'location' => 'Desa Aek Bolon',
                'status' => true,
                'is_featured' => false,
                'tags' => 'batu,geosite',
            ],
            [
                'category' => 'alam',
                'title' => 'Liang Sipege',
                'short_description' => 'Gua dengan formasi menarik',
                'description' => 'Liang Sipege adalah gua alami yang memiliki nilai geologi dan wisata.',
                'image_path' => 'image/taman-eden/liang-sipege-hero.jpg',
                'hero_image_path' => 'image/taman-eden/liang-sipege-hero.jpg',
                'location' => 'Kawasan Balige',
                'status' => true,
                'is_featured' => false,
                'tags' => 'gua,liang',
            ],
        ];

        $now = now();
        foreach ($items as $i => $item) {
            $ts = $now->copy()->subSeconds($i);
            $item['created_at'] = $ts;
            $item['updated_at'] = $ts;
            Destination::create($item);
        }
    }
}
