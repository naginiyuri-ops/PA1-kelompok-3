<?php
// database/seeders/GaleriSeeder.php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        // Data sample items (deterministic timestamps to preserve insertion order)
        $items = [
            [
                'judul' => 'Pantai Taman Eden Sunset',
                'kategori' => 'Taman Eden',
                'deskripsi' => 'Pemandangan sunset yang indah di Pantai Taman Eden',
                'gambar' => '/image/taman-eden/galeri/1.jpg',
                'lokasi' => 'Pantai Taman Eden',
                'tanggal_foto' => '2024-01-15',
                'status' => true,
            ],
            [
                'judul' => 'Rumah Adat Taman Eden',
                'kategori' => 'Taman Eden',
                'deskripsi' => 'Rumah adat Batak khas Taman Eden',
                'gambar' => '/image/taman-eden/galeri/2.jpg',
                'lokasi' => 'Desa Taman Eden',
                'tanggal_foto' => '2024-01-20',
                'status' => true,
            ],
            [
                'judul' => 'Formasi Batu Bahisan',
                'kategori' => 'Batu Bahisan',
                'deskripsi' => 'Formasi batuan unik Batu Bahisan',
                'gambar' => '/image/batu-bahisan/galeri/1.jpg',
                'lokasi' => 'Batu Bahisan',
                'tanggal_foto' => '2024-02-10',
                'status' => true,
            ],
            [
                'judul' => 'Mulut Goa Liang Sipege',
                'kategori' => 'Taman Eden',
                'deskripsi' => 'Pintu masuk Goa Liang Sipege',
                'gambar' => '/image/taman-eden/galeri/1.jpg',
                'lokasi' => 'Liang Sipege',
                'tanggal_foto' => '2024-03-05',
                'status' => true,
            ],
        ];

        $now = now();
        foreach ($items as $i => $item) {
            $ts = $now->copy()->subSeconds($i);
            $item['created_at'] = $ts;
            $item['updated_at'] = $ts;
            Galeri::create($item);
        }
    }
}