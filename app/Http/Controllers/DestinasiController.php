<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    // Halaman utama destinasi
    public function index()
    {
        return view('destinasi.index');
    }
    
    // Destinasi Alam
    public function alam()
    {
        $kategori = 'alam';
        return view('destinasi.kategori', compact('kategori'));
    }
    
    // Destinasi Budaya
    public function budaya()
    {
        $kategori = 'budaya';
        return view('destinasi.kategori', compact('kategori'));
    }
    
    // Destinasi Buatan
    public function buatan()
    {
        $kategori = 'buatan';
        return view('destinasi.kategori', compact('kategori'));
    }
    
    // Detail destinasi
    public function detail($kategori, $slug)
    {
        // Data lengkap untuk detail - 1 FOTO SAJA
        $dataDestinasi = [
            'alam' => [
                'items' => [
                    'desa-wisata-meat' => [
                        'id' => 1,
                        'nama' => 'Desa Wisata Meat',
                        'slug' => 'desa-wisata-meat',
                        'kategori' => 'alam',
                        'lokasi' => 'Kec. Tampahan, Kab. Toba Samosir',
                        'deskripsi' => 'Dikenal sebagai "New Zealand-nya Toba" dengan hamparan sawah hijau terasering yang membentang hingga ke pinggir Danau Toba.',
                        'deskripsi_lengkap' => 'Desa Wisata Meat adalah permata tersembunyi di tepi Danau Toba. Dengan hamparan sawah hijau terasering yang membentang hingga ke pinggir danau, desa ini dijuluki "New Zealand-nya Toba". Pengunjung dapat menikmati keindahan alam yang masih asli, berjalan-jalan di tengah persawahan, atau bersantai di tepi pantai berpasir.',
                        'jam_operasional' => '08:00 - 18:00 WIB',
                        'harga_tiket' => 'Rp 5.000 - Rp 15.000',
                        'tags' => ['Sawah Terasering', 'Panorama', 'Spot Foto', 'New Zealand']
                    ],
                    'geosite-batu-basiha' => [
                        'id' => 2,
                        'nama' => 'Geosite Batu Basiha',
                        'slug' => 'geosite-batu-basiha',
                        'kategori' => 'alam',
                        'lokasi' => 'Desa Aek Bolon, Balige',
                        'deskripsi' => 'Tumpukan batu-batu balok raksasa sisa letusan dahsyat Gunung Toba 74.000 tahun lalu.',
                        'deskripsi_lengkap' => 'Geosite Batu Basiha merupakan formasi batuan unik yang menjadi sak bisu letusan dahsyat Gunung Toba 74.000 tahun lalu. Batu-batu raksasa ini tersusun rapi menyerupai tiang kayu, menciptakan pemandangan yang menakjubkan.',
                        'jam_operasional' => '06:00 - 18:00 WIB',
                        'harga_tiket' => 'Rp 10.000 - Rp 20.000',
                        'tags' => ['Batu Raksasa', 'Geologi', 'Sunrise', 'Sunset']
                    ],
                    'liang-sipege' => [
                        'id' => 3,
                        'nama' => 'Liang Sipege',
                        'slug' => 'liang-sipege',
                        'kategori' => 'alam',
                        'lokasi' => 'Kawasan Balige',
                        'deskripsi' => 'Goa alami dengan stalaktit dan stalakmit yang terbentuk secara alami, menyimpan nilai sejarah dan geologi.',
                        'deskripsi_lengkap' => 'Liang Sipege adalah goa alami yang menyimpan nilai sejarah dan geologi yang tinggi. Formasi batuan di dalam goa ini sangat unik, dengan stalaktit dan stalakmit yang terbentuk secara alami.',
                        'jam_operasional' => '08:00 - 17:00 WIB',
                        'harga_tiket' => 'Rp 15.000 - Rp 25.000',
                        'tags' => ['Goa Alami', 'Sejarah', 'Geowisata', 'Edukasi']
                    ]
                ]
            ],
            'budaya' => [
                'items' => [
                    'sentra-tenun-ulos' => [
                        'id' => 1,
                        'nama' => 'Sentra Tenun Ulos',
                        'slug' => 'sentra-tenun-ulos',
                        'kategori' => 'budaya',
                        'lokasi' => 'Desa Meat, Kec. Tampahan',
                        'deskripsi' => 'Wisatawan dapat melihat langsung proses martonun (menenun) ulos yang dikerjakan oleh kaum wanita setempat.',
                        'deskripsi_lengkap' => 'Di sentra tenun ulos Desa Meat, Anda dapat menyaksikan langsung proses pembuatan ulos, kain tradisional Batak yang sarat makna. Para wanita dengan sabar menenun menggunakan alat tradisional, menghasilkan ulos dengan motif yang indah.',
                        'jam_operasional' => '08:00 - 17:00 WIB',
                        'harga_tiket' => 'Gratis (belajar tenun: Rp 25.000)',
                        'tags' => ['Tenun Ulos', 'Kerajinan Tangan', 'Budaya Batak', 'Oleh-oleh']
                    ],
                    'rumah-adat-batak' => [
                        'id' => 2,
                        'nama' => 'Rumah Adat Batak',
                        'slug' => 'rumah-adat-batak',
                        'kategori' => 'budaya',
                        'lokasi' => 'Desa Meat, Kec. Tampahan',
                        'deskripsi' => 'Rumah tradisional Batak Toba yang khas dengan arsitektur dan ornamen penuh makna filosofis.',
                        'deskripsi_lengkap' => 'Rumah adat Batak di Desa Meat bukan hanya bangunan biasa, tetapi juga pusat kegiatan budaya yang masih dihuni dan dirawat dengan baik. Pengunjung dapat melihat langsung arsitektur khas Batak, termasuk ukiran-ukiran dan ornamen yang memiliki makna filosofis.',
                        'jam_operasional' => '08:00 - 18:00 WIB',
                        'harga_tiket' => 'Rp 5.000',
                        'tags' => ['Rumah Adat', 'Arsitektur', 'Budaya Batak', 'Sejarah']
                    ],
                    'sigale-gale' => [
                        'id' => 3,
                        'nama' => 'Patung Sigale-gale',
                        'slug' => 'sigale-gale',
                        'kategori' => 'budaya',
                        'lokasi' => 'Tomok, Pulau Samosir',
                        'deskripsi' => 'Patung kayu khas Batak yang dapat menari, simbol ritual kematian dan penghormatan leluhur.',
                        'deskripsi_lengkap' => 'Sigale-gale adalah patung kayu khas Batak Toba yang dapat menari mengikuti irama musik. Patung ini digunakan dalam ritual kematian untuk menghormati arwah leluhur. Saat ini, Sigale-gale menjadi atraksi wisata budaya yang populer di Pulau Samosir.',
                        'jam_operasional' => '09:00 - 17:00 WIB',
                        'harga_tiket' => 'Rp 10.000',
                        'tags' => ['Sigale-gale', 'Budaya Batak', 'Tari Tradisional', 'Sejarah']
                    ]
                ]
            ],
            'buatan' => [
                'items' => [
                    'spot-pantai-meat' => [
                        'id' => 1,
                        'nama' => 'Spot Pantai Meat',
                        'slug' => 'spot-pantai-meat',
                        'kategori' => 'buatan',
                        'lokasi' => 'Desa Meat, Kec. Tampahan',
                        'deskripsi' => 'Area pinggir Danau Toba yang ditata untuk bersantai menikmati pemandangan danau dan perbukitan.',
                        'deskripsi_lengkap' => 'Spot pantai di Desa Meat adalah tempat yang sempurna untuk bersantai sambil menikmati keindahan Danau Toba. Area ini telah ditata dengan baik, dilengkapi dengan tempat duduk dan gazebo.',
                        'jam_operasional' => '06:00 - 18:00 WIB',
                        'harga_tiket' => 'Rp 5.000',
                        'tags' => ['Pantai', 'Santai', 'Keluarga', 'Spot Foto']
                    ],
                    'homestay-meat' => [
                        'id' => 2,
                        'nama' => 'Homestay Meat',
                        'slug' => 'homestay-meat',
                        'kategori' => 'buatan',
                        'lokasi' => 'Desa Meat, Kec. Tampahan',
                        'deskripsi' => 'Penginapan berbasis budaya yang dikelola warga setempat dengan pemandangan sawah dan Danau Toba.',
                        'deskripsi_lengkap' => 'Menginap di homestay Desa Meat memberikan pengalaman yang tak terlupakan. Anda akan tinggal bersama keluarga Batak, belajar tentang budaya mereka, menikmati masakan khas.',
                        'jam_operasional' => '24 Jam',
                        'harga_tiket' => 'Rp 150.000 - Rp 300.000 / malam',
                        'tags' => ['Homestay', 'Budaya', 'Penginapan', 'Ramah']
                    ],
                    'jalur-trekking-sawah' => [
                        'id' => 3,
                        'nama' => 'Jalur Trekking Sawah',
                        'slug' => 'jalur-trekking-sawah',
                        'kategori' => 'buatan',
                        'lokasi' => 'Desa Meat, Kec. Tampahan',
                        'deskripsi' => 'Jalur setapak di tengah persawahan terasering dengan pemandangan spektakuler Danau Toba.',
                        'deskripsi_lengkap' => 'Jalur trekking sawah di Desa Meat menawarkan pengalaman berjalan kaki yang menyenangkan di tengah hamparan sawah hijau terasering. Jalur ini dirancang dengan aman, memungkinkan pengunjung untuk menikmati pemandangan Danau Toba dari berbagai sudut.',
                        'jam_operasional' => '06:00 - 18:00 WIB',
                        'harga_tiket' => 'Gratis',
                        'tags' => ['Trekking', 'Sawah Terasering', 'Panorama', 'Olahraga']
                    ]
                ]
            ]
        ];
        
        // Ambil data berdasarkan slug
        $item = $dataDestinasi[$kategori]['items'][$slug] ?? null;
        
        if (!$item) {
            abort(404);
        }
        
        // Set gambar berdasarkan ID (1,2,3) - 1 FOTO SAJA
        $noFoto = $item['id'];
        $foto = 'image/destinasi/' . $kategori . $noFoto . '.jpg';
        
        $destinasi = (object)[
            'id' => $item['id'],
            'nama' => $item['nama'],
            'slug' => $slug,
            'kategori' => $kategori,
            'lokasi' => $item['lokasi'],
            'deskripsi' => $item['deskripsi'],
            'deskripsi_lengkap' => $item['deskripsi_lengkap'],
            'gambar' => $foto,
            'gambar_hero' => $foto,
            'galeri' => [$foto], // HANYA 1 FOTO
            'jam_operasional' => $item['jam_operasional'],
            'harga_tiket' => $item['harga_tiket'],
            'tags' => $item['tags']
        ];
        
        return view('destinasi.detail', compact('destinasi'));
    }
}