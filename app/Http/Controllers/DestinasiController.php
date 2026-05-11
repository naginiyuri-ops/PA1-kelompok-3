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
        // Data lengkap untuk detail
        $dataDestinasi = [
            'alam' => [
                'items' => [
                    'desa-wisata-meat' => [
                        'nama' => 'Desa Wisata Meat',
                        'lokasi' => 'Kec. Tampahan, Kab. Toba Samosir',
                        'deskripsi' => 'Dikenal sebagai "New Zealand-nya Toba" dengan hamparan sawah hijau terasering.',
                        'deskripsi_lengkap' => 'Desa Wisata Meat adalah permata tersembunyi di tepi Danau Toba. Dengan hamparan sawah hijau terasering yang membentang hingga ke pinggir danau, desa ini dijuluki "New Zealand-nya Toba". Pengunjung dapat menikmati keindahan alam yang masih asli, berjalan-jalan di tengah persawahan, atau bersantai di tepi pantai berpasir.',
                        'jam_operasional' => '08:00 - 18:00 WIB',
                        'harga_tiket' => 'Rp 5.000 - Rp 15.000'
                    ],
                    'geosite-batu-basiha' => [
                        'nama' => 'Geosite Batu Basiha',
                        'lokasi' => 'Desa Aek Bolon, Balige',
                        'deskripsi' => 'Tumpukan batu-batu balok raksasa sisa letusan Gunung Toba.',
                        'deskripsi_lengkap' => 'Geosite Batu Basiha merupakan formasi batuan unik yang menjadi sak bisu letusan dahsyat Gunung Toba 74.000 tahun lalu. Batu-batu raksasa ini tersusun rapi menyerupai tiang kayu, menciptakan pemandangan yang menakjubkan.',
                        'jam_operasional' => '06:00 - 18:00 WIB',
                        'harga_tiket' => 'Rp 10.000 - Rp 20.000'
                    ],
                    'liang-sipege' => [
                        'nama' => 'Liang Sipege',
                        'lokasi' => 'Kawasan Balige',
                        'deskripsi' => 'Goa alami dengan stalaktit dan stalakmit.',
                        'deskripsi_lengkap' => 'Liang Sipege adalah goa alami yang menyimpan nilai sejarah dan geologi yang tinggi. Formasi batuan di dalam goa ini sangat unik, dengan stalaktit dan stalakmit yang terbentuk secara alami.',
                        'jam_operasional' => '08:00 - 17:00 WIB',
                        'harga_tiket' => 'Rp 15.000 - Rp 25.000'
                    ]
                ]
            ],
            'budaya' => [
                'items' => [
                    'sentra-tenun-ulos' => [
                        'nama' => 'Sentra Tenun Ulos',
                        'lokasi' => 'Desa Meat, Kec. Tampahan',
                        'deskripsi' => 'Melihat proses menenun ulos.',
                        'deskripsi_lengkap' => 'Di sentra tenun ulos Desa Meat, Anda dapat menyaksikan langsung proses pembuatan ulos, kain tradisional Batak yang sarat makna. Para wanita dengan sabar menenun menggunakan alat tradisional.',
                        'jam_operasional' => '08:00 - 17:00 WIB',
                        'harga_tiket' => 'Gratis (belajar tenun: Rp 25.000)'
                    ],
                    'rumah-adat-batak' => [
                        'nama' => 'Rumah Adat Batak',
                        'lokasi' => 'Desa Meat, Kec. Tampahan',
                        'deskripsi' => 'Rumah tradisional Batak Toba.',
                        'deskripsi_lengkap' => 'Rumah adat Batak di Desa Meat bukan hanya bangunan biasa, tetapi juga pusat kegiatan budaya yang masih dihuni dan dirawat dengan baik.',
                        'jam_operasional' => '08:00 - 18:00 WIB',
                        'harga_tiket' => 'Rp 5.000'
                    ],
                    'sigale-gale' => [
                        'nama' => 'Patung Sigale-gale',
                        'lokasi' => 'Tomok, Pulau Samosir',
                        'deskripsi' => 'Patung kayu khas Batak yang dapat menari.',
                        'deskripsi_lengkap' => 'Sigale-gale adalah patung kayu khas Batak Toba yang dapat menari mengikuti irama musik. Patung ini digunakan dalam ritual kematian untuk menghormati arwah leluhur.',
                        'jam_operasional' => '09:00 - 17:00 WIB',
                        'harga_tiket' => 'Rp 10.000'
                    ]
                ]
            ],
            'buatan' => [
                'items' => [
                    'spot-pantai-meat' => [
                        'nama' => 'Spot Pantai Meat',
                        'lokasi' => 'Desa Meat, Kec. Tampahan',
                        'deskripsi' => 'Area pinggir Danau Toba untuk bersantai.',
                        'deskripsi_lengkap' => 'Spot pantai di Desa Meat adalah tempat yang sempurna untuk bersantai sambil menikmati keindahan Danau Toba. Area ini telah ditata dengan baik, dilengkapi dengan tempat duduk dan gazebo.',
                        'jam_operasional' => '06:00 - 18:00 WIB',
                        'harga_tiket' => 'Rp 5.000'
                    ],
                    'homestay-meat' => [
                        'nama' => 'Homestay Meat',
                        'lokasi' => 'Desa Meat, Kec. Tampahan',
                        'deskripsi' => 'Penginapan berbasis budaya.',
                        'deskripsi_lengkap' => 'Menginap di homestay Desa Meat memberikan pengalaman yang tak terlupakan. Anda akan tinggal bersama keluarga Batak, belajar tentang budaya mereka, menikmati masakan khas.',
                        'jam_operasional' => '24 Jam',
                        'harga_tiket' => 'Rp 150.000 - Rp 300.000 / malam'
                    ],
                    'jalur-trekking-sawah' => [
                        'nama' => 'Jalur Trekking Sawah',
                        'lokasi' => 'Desa Meat, Kec. Tampahan',
                        'deskripsi' => 'Jalur setapak di tengah persawahan.',
                        'deskripsi_lengkap' => 'Jalur trekking sawah di Desa Meat menawarkan pengalaman berjalan kaki yang menyenangkan di tengah hamparan sawah hijau terasering.',
                        'jam_operasional' => '06:00 - 18:00 WIB',
                        'harga_tiket' => 'Gratis'
                    ]
                ]
            ]
        ];
        
        // Ambil data berdasarkan slug
        $item = $dataDestinasi[$kategori]['items'][$slug] ?? null;
        
        if (!$item) {
            abort(404);
        }
        
        // Cari nomor urut berdasarkan slug untuk menentukan foto
        $slugs = array_keys($dataDestinasi[$kategori]['items']);
        $index = array_search($slug, $slugs);
        $noFoto = $index + 1;
        
        $destinasi = (object)[
            'id' => $index + 1,
            'nama' => $item['nama'],
            'slug' => $slug,
            'kategori' => $kategori,
            'lokasi' => $item['lokasi'],
            'deskripsi' => $item['deskripsi'],
            'deskripsi_lengkap' => $item['deskripsi_lengkap'],
            'gambar' => 'image/destinasi/' . $kategori . $noFoto . '.jpg',
            'gambar_hero' => 'image/destinasi/' . $kategori . $noFoto . '.jpg',
            'galeri' => [
                'image/destinasi/' . $kategori . '1.jpg',
                'image/destinasi/' . $kategori . '2.jpg',
                'image/destinasi/' . $kategori . '3.jpg'
            ],
            'jam_operasional' => $item['jam_operasional'],
            'harga_tiket' => $item['harga_tiket'],
            'tags' => ['Wisata', 'Danau Toba', ucfirst($kategori)]
        ];
        
        return view('destinasi.detail', compact('destinasi'));
    }
}