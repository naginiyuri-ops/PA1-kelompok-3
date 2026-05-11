<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    // ==================== HALAMAN UTAMA DESTINASI ====================
    public function index()
    {
        return view('destinasi.index');
    }
    
    // ==================== DESTINASI ALAM ====================
    public function alam()
    {
        $kategori = 'Alam';
        $deskripsi = 'Destinasi wisata alam yang menampilkan keindahan geologi, pegunungan, dan keunikan alam Danau Toba.';
        
        $destinasi = [
            (object)[
                'id' => 1,
                'slug' => 'liang-sipege',
                'kategori' => 'alam',
                'nama' => 'Liang Sipege',
                'lokasi' => 'Pulau Sibandang, Danau Toba',
                'deskripsi' => 'Goa alami dengan stalaktit dan stalakmit yang indah. Tempat eksplorasi dan edukasi geologi.',
                'gambar' => '/image/meat/liang-sipege-hero.jpg',
                'tags' => ['Goa Alami', 'Caving', 'Stalaktit', 'Geologi'],
                'url' => '/geosite/liang-sipege'
            ],
            (object)[
                'id' => 2,
                'nama' => 'Batu Basiha',
                'slug' => 'batu basiha',
                'kategori' => 'alam',
                'lokasi' => 'Pulau Sibandang, Danau Toba',
                'deskripsi' => 'Formasi batuan unik hasil erosi ribuan tahun. Spot favorit untuk sunrise, sunset, dan fotografi landscape.',
                'gambar' => '/image/meat/batu-bahisan.jpg',
                'tags' => ['Formasi Batuan', 'Sunrise', 'Sunset', 'Fotografi'],
                'url' => '/geosite/batu-bahisan'
            ],
            (object)[
                'id' => 3,
                'nama' => 'Pantai Meat',
                'lokasi' => 'Balige, Danau Toba',
                'deskripsi' => 'Air terjun cantik dengan air jernih dan suasana asri, cocok untuk refreshing keluarga.',
                'gambar' => '/image/meat/batu-detail.jpg',
                'tags' => ['Air Terjun', 'Refreshing', 'Keluarga', 'Alam'],
                'url' => '/destinasi/air-terjun-efrata',

                'nama' => 'Desa Wisata Meat',
                'slug' => 'desa-wisata-meat',
                'kategori' => 'alam',
                'lokasi' => 'Kec. Tampahan, Kab. Toba Samosir',
                'deskripsi' => 'Dikenal sebagai "New Zealand-nya Toba" dengan hamparan sawah hijau terasering dan pantai pasir di pinggir Danau Toba.',
                'deskripsi_lengkap' => 'Desa Wisata Meat adalah permata tersembunyi di tepi Danau Toba. Dengan hamparan sawah hijau terasering yang membentang hingga ke pinggir danau, desa ini dijuluki "New Zealand-nya Toba". Pengunjung dapat menikmati keindahan alam yang masih asli, berjalan-jalan di tengah persawahan, atau bersantai di tepi pantai berpasir. Udara sejuk dan pemandangan perbukitan yang hijau menjadikan tempat ini cocok untuk melepas penat.',
                'gambar' => 'image/meat/meat-hero.jpg',
                'gambar_hero' => 'image/meat/meat-hero.jpg',
                'galeri' => [
                    'image/meat/meat-detail.jpg',
                    'image/meat/slide1.jpg',
                    'image/meat/slide2.jpg'
                ],
                'tags' => ['Sawah Terasering', 'Pantai', 'Panorama', 'Spot Foto', 'New Zealand'],
                'jam_operasional' => '08:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 5.000 - Rp 15.000'
            ],
            (object)[
                'id' => 2,
                'nama' => 'Geosite Batu Basiha',
                'slug' => 'geosite-batu-basiha',
                'kategori' => 'alam',
                'lokasi' => 'Desa Aek Bolon, Balige',
                'deskripsi' => 'Tumpukan batu-batu balok raksasa sisa letusan dahsyat Gunung Toba yang berbentuk unik menyerupai tiang kayu.',
                'deskripsi_lengkap' => 'Geosite Batu Basiha merupakan formasi batuan unik yang menjadi sak bisu letusan dahsyat Gunung Toba 74.000 tahun lalu. Batu-batu raksasa ini tersusun rapi menyerupai tiang kayu, menciptakan pemandangan yang menakjubkan. Legenda setempat menyebutnya sebagai "Batu Sian Hau" (Batu dari Kayu) yang dikutuk menjadi batu. Tempat ini sangat populer untuk fotografi landscape, terutama saat sunrise dan sunset.',
                'gambar' => 'image/meat/batu-bahisan.jpg',
                'gambar_hero' => 'image/meat/batu-bahisan.jpg',
                'galeri' => [
                    'image/meat/batu-detail.jpg',
                    'image/meat/slide3.jpg',
                    'image/meat/slide4.jpg'
                ],
                'tags' => ['Batu Raksasa', 'Geologi', 'Spot Foto', 'Sunrise', 'Sunset', 'Legenda'],
                'jam_operasional' => '06:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 10.000 - Rp 20.000'
            ],
            (object)[
                'id' => 3,
                'nama' => 'Liang Sipege',
                'slug' => 'liang-sipege',
                'kategori' => 'alam',
                'lokasi' => 'Kawasan Balige',
                'deskripsi' => 'Goa atau tebing unik dengan nilai sejarah dan budaya lokal yang tinggi.',
                'deskripsi_lengkap' => 'Liang Sipege adalah goa alami yang menyimpan nilai sejarah dan geologi yang tinggi. Formasi batuan di dalam goa ini sangat unik, dengan stalaktit dan stalakmit yang terbentuk secara alami. Goa ini menjadi bagian penting dari paket geowisata Danau Toba, menawarkan pengalaman eksplorasi yang mendidik dan menyenangkan.',
                'gambar' => 'image/meat/liang-sipege-hero.jpg',
                'gambar_hero' => 'image/meat/liang-sipege-hero.jpg',
                'galeri' => [
                    'image/meat/liang-detail.jpg',
                    'image/meat/slide5.jpg',
                    'image/meat/gallery1.jpg'
                ],
                'tags' => ['Goa Alami', 'Sejarah', 'Geowisata', 'Edukasi', 'Stalaktit'],
                'jam_operasional' => '08:00 - 17:00 WIB',
                'harga_tiket' => 'Rp 15.000 - Rp 25.000'

            ]
        ];
        
        return view('destinasi.kategori', compact('kategori', 'deskripsi', 'destinasi'));
    }
    
    // ==================== DESTINASI BUATAN ====================
    public function buatan()
    {
        $kategori = 'Buatan';
        $deskripsi = 'Fasilitas wisata yang dikembangkan untuk mendukung kenyamanan wisatawan di kawasan Danau Toba.';
        
        $destinasi = [
            (object)[
                'id' => 1,
                'nama' => 'Rumah Adat Batak',
                'slug' => 'rumah-adat-batak',
                'kategori' => 'buatan',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Spot foto budaya dan edukasi di rumah adat Batak yang masih asri dengan latar sawah dan Danau Toba.',
                'deskripsi_lengkap' => 'Rumah adat Batak di Desa Meat menawarkan pengalaman budaya yang autentik. Pengunjung dapat belajar tentang arsitektur tradisional Batak, filosofi rumah adat, dan berfoto dengan latar belakang yang indah. Rumah adat ini masih dirawat dengan baik dan digunakan untuk kegiatan adat masyarakat setempat.',
                'gambar' => 'image/meat/slide1.jpg',
                'gambar_hero' => 'image/meat/meat-hero.jpg',
                'galeri' => [
                    'image/meat/slide1.jpg',
                    'image/meat/slide2.jpg',
                    'image/meat/slide3.jpg'
                ],
                'tags' => ['Rumah Adat', 'Budaya', 'Spot Foto', 'Edukasi', 'Arsitektur'],
                'jam_operasional' => '08:00 - 17:00 WIB',
                'harga_tiket' => 'Rp 5.000'
            ],
            (object)[
                'id' => 2,
                'nama' => 'Spot Pantai Meat',
                'slug' => 'spot-pantai-meat',
                'kategori' => 'buatan',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Area pinggir Danau Toba yang ditata untuk bersantai menikmati pemandangan danau dan perbukitan.',
                'deskripsi_lengkap' => 'Spot pantai di Desa Meat adalah tempat yang sempurna untuk bersantai sambil menikmati keindahan Danau Toba. Area ini telah ditata dengan baik, dilengkapi dengan tempat duduk dan gazebo. Pengunjung dapat menikmati angin sepoi-sepoi, pemandangan perbukitan hijau, dan air danau yang jernih.',
                'gambar' => 'image/meat/slide2.jpg',
                'gambar_hero' => 'image/meat/slide2.jpg',
                'galeri' => [
                    'image/meat/slide2.jpg',
                    'image/meat/slide3.jpg',
                    'image/meat/slide4.jpg'
                ],
                'tags' => ['Pantai', 'Santai', 'Keluarga', 'Spot Foto', 'Danau Toba'],
                'jam_operasional' => '06:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 5.000'
            ],
            (object)[
                'id' => 3,
                'nama' => 'Homestay Meat',
                'slug' => 'homestay-meat',
                'kategori' => 'buatan',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Penginapan berbasis budaya yang dikelola warga setempat dengan pemandangan sawah dan Danau Toba.',
                'deskripsi_lengkap' => 'Menginap di homestay Desa Meat memberikan pengalaman yang tak terlupakan. Anda akan tinggal bersama keluarga Batak, belajar tentang budaya mereka, menikmati masakan khas, dan bangun dengan pemandangan sawah terasering dan Danau Toba. Homestay ini sederhana namun nyaman, dengan keramahan khas masyarakat Batak.',
                'gambar' => 'image/meat/slide3.jpg',
                'gambar_hero' => 'image/meat/slide3.jpg',
                'galeri' => [
                    'image/meat/slide3.jpg',
                    'image/meat/slide4.jpg',
                    'image/meat/slide5.jpg'
                ],
                'tags' => ['Homestay', 'Budaya', 'Penginapan', 'Ramah', 'Tradisional'],
                'jam_operasional' => '24 Jam',
                'harga_tiket' => 'Rp 150.000 - Rp 300.000 / malam'
            ],
            (object)[
                'id' => 4,
                'nama' => 'Jalur Trekking Sawah',
                'slug' => 'jalur-trekking-sawah',
                'kategori' => 'buatan',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Jalur setapak di tengah persawahan terasering dengan pemandangan spektakuler Danau Toba.',
                'deskripsi_lengkap' => 'Jalur trekking sawah di Desa Meat menawarkan pengalaman berjalan kaki yang menyenangkan di tengah hamparan sawah hijau terasering. Jalur ini dirancang dengan aman, memungkinkan pengunjung untuk menikmati pemandangan Danau Toba dari berbagai sudut. Trekking di sini sangat populer di kalangan fotografer dan pecinta alam.',
                'gambar' => 'image/meat/slide4.jpg',
                'gambar_hero' => 'image/meat/slide4.jpg',
                'galeri' => [
                    'image/meat/slide4.jpg',
                    'image/meat/slide5.jpg',
                    'image/meat/gallery1.jpg'
                ],
                'tags' => ['Trekking', 'Sawah Terasering', 'Panorama', 'Fotografi', 'Olahraga'],
                'jam_operasional' => '06:00 - 18:00 WIB',
                'harga_tiket' => 'Gratis'
            ]
        ];
        
        return view('destinasi.kategori', compact('kategori', 'deskripsi', 'destinasi'));
    }
    
    // ==================== DESTINASI BUDAYA ====================
    public function budaya()
    {
        $kategori = 'Budaya';
        $deskripsi = 'Destinasi wisata budaya yang menampilkan kearifan lokal, adat istiadat, dan warisan leluhur Batak Toba yang masih lestari.';
        
        $destinasi = [
            (object)[
                'id' => 1,
                'nama' => 'Sentra Tenun Ulos',
                'slug' => 'sentra-tenun-ulos',
                'kategori' => 'budaya',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Wisatawan dapat melihat langsung proses martonun (menenun) ulos yang dikerjakan oleh kaum wanita setempat.',
                'deskripsi_lengkap' => 'Di sentra tenun ulos Desa Meat, Anda dapat menyaksikan langsung proses pembuatan ulos, kain tradisional Batak yang sarat makna. Para wanita dengan sabar menenun menggunakan alat tradisional, menghasilkan ulos dengan motif yang indah dan beragam. Pengunjung juga dapat belajar menenun dan membeli ulos langsung dari pengrajinnya.',
                'gambar' => 'image/meat/gallery1.jpg',
                'gambar_hero' => 'image/meat/gallery1.jpg',
                'galeri' => [
                    'image/meat/gallery1.jpg',
                    'image/meat/slide1.jpg',
                    'image/meat/slide2.jpg'
                ],
                'tags' => ['Tenun Ulos', 'Kerajinan Tangan', 'Budaya Batak', 'Oleh-oleh', 'UMKM'],
                'jam_operasional' => '08:00 - 17:00 WIB',
                'harga_tiket' => 'Gratis (belajar tenun: Rp 25.000)'
            ],
            (object)[
                'id' => 2,
                'nama' => 'Rumah Adat Batak',
                'slug' => 'rumah-adat-batak-budaya',
                'kategori' => 'budaya',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Desa ini menampilkan pemandangan rumah tradisional Batak Toba yang khas di tepi sawah dan dekat danau.',
                'deskripsi_lengkap' => 'Rumah adat Batak di Desa Meat bukan hanya bangunan biasa, tetapi juga pusat kegiatan budaya. Rumah-rumah ini masih dihuni dan dirawat dengan baik. Pengunjung dapat melihat langsung arsitektur khas Batak, termasuk ukiran-ukiran dan ornamen yang memiliki makna filosofis. Pemandangan rumah adat dengan latar sawah dan Danau Toba sangat fotogenik.',
                'gambar' => 'image/meat/slide5.jpg',
                'gambar_hero' => 'image/meat/slide5.jpg',
                'galeri' => [
                    'image/meat/slide5.jpg',
                    'image/meat/gallery1.jpg',
                    'image/meat/slide1.jpg'
                ],
                'tags' => ['Rumah Adat', 'Arsitektur', 'Budaya Batak', 'Spot Foto', 'Sejarah'],
                'jam_operasional' => '08:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 5.000'
            ]
        ];
        
        return view('destinasi.kategori', compact('kategori', 'deskripsi', 'destinasi'));
    }
    
    // ==================== DETAIL DESTINASI ====================
    public function detail($kategori, $slug)
    {
        $semuaDestinasi = array_merge(
            $this->getDataAlam(),
            $this->getDataBuatan(),
            $this->getDataBudaya()
        );
        
        $destinasi = null;
        foreach ($semuaDestinasi as $item) {
            if ($item->slug == $slug) {
                $destinasi = $item;
                break;
            }
        }
        
        if (!$destinasi) {
            abort(404, 'Destinasi tidak ditemukan');
        }
        
        return view('destinasi.detail', compact('destinasi'));
    }
    
    // ==================== DATA LENGKAP ALAM UNTUK DETAIL ====================
    private function getDataAlam()
    {
        return [
            (object)[
                'id' => 1,
                'nama' => 'Desa Wisata Meat',
                'slug' => 'desa-wisata-meat',
                'kategori' => 'alam',
                'lokasi' => 'Kec. Tampahan, Kab. Toba Samosir',
                'deskripsi' => 'Dikenal sebagai "New Zealand-nya Toba" dengan hamparan sawah hijau terasering.',
                'deskripsi_lengkap' => 'Desa Wisata Meat adalah permata tersembunyi di tepi Danau Toba. Dengan hamparan sawah hijau terasering yang membentang hingga ke pinggir danau, desa ini dijuluki "New Zealand-nya Toba". Pengunjung dapat menikmati keindahan alam yang masih asli, berjalan-jalan di tengah persawahan, atau bersantai di tepi pantai berpasir. Udara sejuk dan pemandangan perbukitan yang hijau menjadikan tempat ini cocok untuk melepas penat.',
                'gambar' => 'image/meat/meat-hero.jpg',
                'gambar_hero' => 'image/meat/meat-hero.jpg',
                'galeri' => ['image/meat/meat-detail.jpg', 'image/meat/slide1.jpg', 'image/meat/slide2.jpg'],
                'tags' => ['Sawah Terasering', 'Pantai', 'Panorama', 'Spot Foto', 'New Zealand'],
                'jam_operasional' => '08:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 5.000 - Rp 15.000'
            ],
            (object)[
                'id' => 2,
                'nama' => 'Geosite Batu Basiha',
                'slug' => 'geosite-batu-basiha',
                'kategori' => 'alam',
                'lokasi' => 'Desa Aek Bolon, Balige',
                'deskripsi' => 'Tumpukan batu-batu balok raksasa sisa letusan Gunung Toba.',
                'deskripsi_lengkap' => 'Geosite Batu Basiha merupakan formasi batuan unik yang menjadi sak bisu letusan dahsyat Gunung Toba 74.000 tahun lalu. Batu-batu raksasa ini tersusun rapi menyerupai tiang kayu, menciptakan pemandangan yang menakjubkan. Legenda setempat menyebutnya sebagai "Batu Sian Hau" (Batu dari Kayu) yang dikutuk menjadi batu.',
                'gambar' => 'image/meat/batu-bahisan.jpg',
                'gambar_hero' => 'image/meat/batu-bahisan.jpg',
                'galeri' => ['image/meat/batu-detail.jpg', 'image/meat/slide3.jpg', 'image/meat/slide4.jpg'],
                'tags' => ['Batu Raksasa', 'Geologi', 'Spot Foto', 'Sunrise', 'Sunset'],
                'jam_operasional' => '06:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 10.000 - Rp 20.000'
            ],
            (object)[
                'id' => 3,
                'nama' => 'Liang Sipege',
                'slug' => 'liang-sipege',
                'kategori' => 'alam',
                'lokasi' => 'Kawasan Balige',
                'deskripsi' => 'Goa atau tebing unik dengan nilai sejarah dan budaya lokal.',
                'deskripsi_lengkap' => 'Liang Sipege adalah goa alami yang menyimpan nilai sejarah dan geologi yang tinggi. Formasi batuan di dalam goa ini sangat unik, dengan stalaktit dan stalakmit yang terbentuk secara alami. Goa ini menjadi bagian penting dari paket geowisata Danau Toba.',
                'gambar' => 'image/meat/liang-sipege-hero.jpg',
                'gambar_hero' => 'image/meat/liang-sipege-hero.jpg',
                'galeri' => ['image/meat/liang-detail.jpg', 'image/meat/slide5.jpg', 'image/meat/gallery1.jpg'],
                'tags' => ['Goa Alami', 'Sejarah', 'Geowisata', 'Edukasi'],
                'jam_operasional' => '08:00 - 17:00 WIB',
                'harga_tiket' => 'Rp 15.000 - Rp 25.000'
            ]
        ];
    }
    
    // ==================== DATA LENGKAP BUATAN UNTUK DETAIL ====================
    private function getDataBuatan()
    {
        return [
            (object)[
                'id' => 4,
                'nama' => 'Rumah Adat Batak',
                'slug' => 'rumah-adat-batak',
                'kategori' => 'buatan',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Spot foto budaya dan edukasi di rumah adat Batak.',
                'deskripsi_lengkap' => 'Rumah adat Batak di Desa Meat menawarkan pengalaman budaya yang autentik. Pengunjung dapat belajar tentang arsitektur tradisional Batak, filosofi rumah adat, dan berfoto dengan latar belakang yang indah.',
                'gambar' => 'image/meat/slide1.jpg',
                'gambar_hero' => 'image/meat/meat-hero.jpg',
                'galeri' => ['image/meat/slide1.jpg', 'image/meat/slide2.jpg', 'image/meat/slide3.jpg'],
                'tags' => ['Rumah Adat', 'Budaya', 'Spot Foto', 'Edukasi'],
                'jam_operasional' => '08:00 - 17:00 WIB',
                'harga_tiket' => 'Rp 5.000'
            ],
            (object)[
                'id' => 5,
                'nama' => 'Spot Pantai Meat',
                'slug' => 'spot-pantai-meat',
                'kategori' => 'buatan',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Area pinggir Danau Toba untuk bersantai.',
                'deskripsi_lengkap' => 'Spot pantai di Desa Meat adalah tempat yang sempurna untuk bersantai sambil menikmati keindahan Danau Toba. Area ini telah ditata dengan baik, dilengkapi dengan tempat duduk dan gazebo.',
                'gambar' => 'image/meat/slide2.jpg',
                'gambar_hero' => 'image/meat/slide2.jpg',
                'galeri' => ['image/meat/slide2.jpg', 'image/meat/slide3.jpg', 'image/meat/slide4.jpg'],
                'tags' => ['Pantai', 'Santai', 'Keluarga', 'Spot Foto'],
                'jam_operasional' => '06:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 5.000'
            ],
            (object)[
                'id' => 6,
                'nama' => 'Homestay Meat',
                'slug' => 'homestay-meat',
                'kategori' => 'buatan',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Penginapan berbasis budaya dengan pemandangan sawah.',
                'deskripsi_lengkap' => 'Menginap di homestay Desa Meat memberikan pengalaman yang tak terlupakan. Anda akan tinggal bersama keluarga Batak, belajar tentang budaya mereka, menikmati masakan khas.',
                'gambar' => 'image/meat/slide3.jpg',
                'gambar_hero' => 'image/meat/slide3.jpg',
                'galeri' => ['image/meat/slide3.jpg', 'image/meat/slide4.jpg', 'image/meat/slide5.jpg'],
                'tags' => ['Homestay', 'Budaya', 'Penginapan', 'Ramah'],
                'jam_operasional' => '24 Jam',
                'harga_tiket' => 'Rp 150.000 - Rp 300.000 / malam'
            ],
            (object)[
                'id' => 7,
                'nama' => 'Jalur Trekking Sawah',
                'slug' => 'jalur-trekking-sawah',
                'kategori' => 'buatan',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Jalur setapak di tengah persawahan terasering.',
                'deskripsi_lengkap' => 'Jalur trekking sawah di Desa Meat menawarkan pengalaman berjalan kaki yang menyenangkan di tengah hamparan sawah hijau terasering.',
                'gambar' => 'image/meat/slide4.jpg',
                'gambar_hero' => 'image/meat/slide4.jpg',
                'galeri' => ['image/meat/slide4.jpg', 'image/meat/slide5.jpg', 'image/meat/gallery1.jpg'],
                'tags' => ['Trekking', 'Sawah Terasering', 'Panorama', 'Olahraga'],
                'jam_operasional' => '06:00 - 18:00 WIB',
                'harga_tiket' => 'Gratis'
            ]
        ];
    }
    
    // ==================== DATA LENGKAP BUDAYA UNTUK DETAIL ====================
    private function getDataBudaya()
    {
        return [
            (object)[
                'id' => 8,
                'nama' => 'Sentra Tenun Ulos',
                'slug' => 'sentra-tenun-ulos',
                'kategori' => 'budaya',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Melihat proses menenun ulos oleh kaum wanita setempat.',
                'deskripsi_lengkap' => 'Di sentra tenun ulos Desa Meat, Anda dapat menyaksikan langsung proses pembuatan ulos, kain tradisional Batak yang sarat makna. Para wanita dengan sabar menenun menggunakan alat tradisional, menghasilkan ulos dengan motif yang indah.',
                'gambar' => 'image/meat/gallery1.jpg',
                'gambar_hero' => 'image/meat/gallery1.jpg',
                'galeri' => ['image/meat/gallery1.jpg', 'image/meat/slide1.jpg', 'image/meat/slide2.jpg'],
                'tags' => ['Tenun Ulos', 'Kerajinan Tangan', 'Budaya Batak', 'Oleh-oleh'],
                'jam_operasional' => '08:00 - 17:00 WIB',
                'harga_tiket' => 'Gratis (belajar tenun: Rp 25.000)'
            ],
            (object)[
                'id' => 9,
                'nama' => 'Rumah Adat Batak',
                'slug' => 'rumah-adat-batak-budaya',
                'kategori' => 'budaya',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Rumah tradisional Batak Toba yang khas di tepi sawah.',
                'deskripsi_lengkap' => 'Rumah adat Batak di Desa Meat bukan hanya bangunan biasa, tetapi juga pusat kegiatan budaya yang masih dihuni dan dirawat dengan baik. Pengunjung dapat melihat langsung arsitektur khas Batak.',
                'gambar' => 'image/meat/slide5.jpg',
                'gambar_hero' => 'image/meat/slide5.jpg',
                'galeri' => ['image/meat/slide5.jpg', 'image/meat/gallery1.jpg', 'image/meat/slide1.jpg'],
                'tags' => ['Rumah Adat', 'Arsitektur', 'Budaya Batak', 'Spot Foto'],
                'jam_operasional' => '08:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 5.000'
            ]
        ];
    }
}