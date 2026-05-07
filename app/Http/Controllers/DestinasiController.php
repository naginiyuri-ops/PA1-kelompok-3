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
        $deskripsi = 'Destinasi wisata alam yang menampilkan keindahan geologi, pegunungan, air terjun, dan keunikan alam Danau Toba.';
        
        $destinasi = [
            (object)[
                'id' => 1,
                'nama' => 'Desa Wisata Meat',
                'slug' => 'desa-wisata-meat',
                'lokasi' => 'Kec. Tampahan, Kab. Toba Samosir',
                'deskripsi' => 'Dikenal sebagai "New Zealand-nya Toba" dengan hamparan sawah hijau terasering, pantai pasir di pinggir Danau Toba, dan panorama perbukitan yang memukau.',
                'deskripsi_lengkap' => 'Desa Wisata Meat adalah permata tersembunyi di tepi Danau Toba. Dengan hamparan sawah hijau terasering yang membentang hingga ke pinggir danau, desa ini dijuluki "New Zealand-nya Toba". Pengunjung dapat menikmati keindahan alam yang masih asli, berjalan-jalan di tengah persawahan, atau bersantai di tepi pantai berpasir. Udara sejuk dan pemandangan perbukitan yang hijau menjadikan tempat ini cocok untuk melepas penat.',
                'gambar' => 'meat.jpg',
                'gambar_hero' => 'meat/hero.jpg',
                'galeri' => ['meat/gallery1.jpg', 'meat/gallery2.jpg', 'meat/gallery3.jpg', 'meat/gallery4.jpg'],
                'tags' => ['Sawah Terasering', 'Pantai', 'Panorama', 'Spot Foto', 'New Zealand-nya Toba'],
                'maps' => '2.3841,99.1234',
                'jam_operasional' => '08:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 5.000 - Rp 15.000'
            ],
            (object)[
                'id' => 2,
                'nama' => 'Geosite Batu Basiha',
                'slug' => 'geosite-batu-basiha',
                'lokasi' => 'Desa Aek Bolon, Balige',
                'deskripsi' => 'Tumpukan batu-batu balok raksasa sisa letusan dahsyat Gunung Toba (super volcano) yang berbentuk unik menyerupai tiang kayu.',
                'deskripsi_lengkap' => 'Geosite Batu Basiha merupakan formasi batuan unik yang menjadi sak bisu letusan dahsyat Gunung Toba 74.000 tahun lalu. Batu-batu raksasa ini tersusun rapi menyerupai tiang kayu, menciptakan pemandangan yang menakjubkan. Legenda setempat menyebutnya sebagai "Batu Sian Hau" (Batu dari Kayu) yang dikutuk menjadi batu. Tempat ini sangat populer untuk fotografi landscape, terutama saat sunrise dan sunset.',
                'gambar' => 'batu-bahisan.jpg',
                'gambar_hero' => 'batu-bahisan/hero.jpg',
                'galeri' => ['batu-bahisan/gallery1.jpg', 'batu-bahisan/gallery2.jpg', 'batu-bahisan/gallery3.jpg'],
                'tags' => ['Batu Raksasa', 'Geologi', 'Super Volcano', 'Spot Foto', 'Sunrise', 'Sunset', 'Legenda'],
                'maps' => '2.3841,99.1234',
                'jam_operasional' => '06:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 10.000 - Rp 20.000'
            ],
            (object)[
                'id' => 3,
                'nama' => 'Liang Sipege',
                'slug' => 'liang-sipege',
                'lokasi' => 'Kawasan Balige',
                'deskripsi' => 'Goa atau tebing unik dengan nilai sejarah dan budaya lokal yang tinggi. Bagian dari paket geowisata Danau Toba.',
                'deskripsi_lengkap' => 'Liang Sipege adalah goa alami yang menyimpan nilai sejarah dan geologi yang tinggi. Formasi batuan di dalam goa ini sangat unik, dengan stalaktit dan stalakmit yang terbentuk secara alami. Goa ini menjadi bagian penting dari paket geowisata Danau Toba, menawarkan pengalaman eksplorasi yang mendidik dan menyenangkan. Pengunjung dapat belajar tentang proses pembentukan goa dan sejarah geologi kawasan ini.',
                'gambar' => 'liang-sipege.jpg',
                'gambar_hero' => 'liang-sipege/hero.jpg',
                'galeri' => ['liang-sipege/gallery1.jpg', 'liang-sipege/gallery2.jpg', 'liang-sipege/gallery3.jpg', 'liang-sipege/gallery4.jpg'],
                'tags' => ['Goa Alami', 'Sejarah', 'Geowisata', 'Edukasi', 'Stalaktit', 'Caving'],
                'maps' => '2.3841,99.1234',
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
        $deskripsi = 'Destinasi wisata buatan dan fasilitas pendukung yang dikembangkan untuk meningkatkan kenyamanan wisatawan di kawasan Danau Toba.';
        
        $destinasi = [
            (object)[
                'id' => 1,
                'nama' => 'Rumah Adat Batak (Desa Meat)',
                'slug' => 'rumah-adat-batak-meat',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Spot foto budaya dan edukasi di rumah adat Batak yang masih asri dengan latar sawah dan Danau Toba.',
                'deskripsi_lengkap' => 'Rumah adat Batak di Desa Meat menawarkan pengalaman budaya yang autentik. Pengunjung dapat belajar tentang arsitektur tradisional Batak, filosofi rumah adat, dan berfoto dengan latar belakang yang indah. Rumah adat ini masih dirawat dengan baik dan digunakan untuk kegiatan adat masyarakat setempat.',
                'gambar' => 'rumah-adat.jpg',
                'gambar_hero' => 'rumah-adat/hero.jpg',
                'galeri' => ['rumah-adat/gallery1.jpg', 'rumah-adat/gallery2.jpg'],
                'tags' => ['Rumah Adat', 'Budaya', 'Spot Foto', 'Edukasi'],
                'maps' => '2.3841,99.1234',
                'jam_operasional' => '08:00 - 17:00 WIB',
                'harga_tiket' => 'Rp 5.000'
            ],
            (object)[
                'id' => 2,
                'nama' => 'Spot Pantai/Tepian Danau (Desa Meat)',
                'slug' => 'spot-pantai-meat',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Area pinggir Danau Toba yang ditata untuk bersantai menikmati pemandangan danau dan perbukitan.',
                'deskripsi_lengkap' => 'Spot pantai di Desa Meat adalah tempat yang sempurna untuk bersantai sambil menikmati keindahan Danau Toba. Area ini telah ditata dengan baik, dilengkapi dengan tempat duduk dan gazebo. Pengunjung dapat menikmati angin sepoi-sepoi, pemandangan perbukitan hijau, dan air danau yang jernih. Tempat ini sangat cocok untuk bersantai bersama keluarga.',
                'gambar' => 'pantai-meat.jpg',
                'gambar_hero' => 'pantai-meat/hero.jpg',
                'galeri' => ['pantai-meat/gallery1.jpg', 'pantai-meat/gallery2.jpg', 'pantai-meat/gallery3.jpg'],
                'tags' => ['Pantai', 'Santai', 'Keluarga', 'Spot Foto', 'Danau Toba'],
                'maps' => '2.3841,99.1234',
                'jam_operasional' => '06:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 5.000'
            ],
            (object)[
                'id' => 3,
                'nama' => 'Penginapan/Homestay (Desa Meat)',
                'slug' => 'homestay-meat',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Penginapan berbasis budaya yang dikelola warga setempat dengan pemandangan sawah dan Danau Toba.',
                'deskripsi_lengkap' => 'Menginap di homestay Desa Meat memberikan pengalaman yang tak terlupakan. Anda akan tinggal bersama keluarga Batak, belajar tentang budaya mereka, menikmati masakan khas, dan bangun dengan pemandangan sawah terasering dan Danau Toba. Homestay ini sederhana namun nyaman, dengan keramahan khas masyarakat Batak.',
                'gambar' => 'homestay.jpg',
                'gambar_hero' => 'homestay/hero.jpg',
                'galeri' => ['homestay/gallery1.jpg', 'homestay/gallery2.jpg'],
                'tags' => ['Homestay', 'Budaya', 'Penginapan', 'Ramah', 'Tradisional'],
                'maps' => '2.3841,99.1234',
                'jam_operasional' => '24 Jam',
                'harga_tiket' => 'Rp 150.000 - Rp 300.000 / malam'
            ],
            (object)[
                'id' => 4,
                'nama' => 'Jalur Trekking Sawah (Desa Meat)',
                'slug' => 'jalur-trekking-sawah-meat',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Jalur setapak di tengah persawahan terasering dengan pemandangan spektakuler Danau Toba.',
                'deskripsi_lengkap' => 'Jalur trekking sawah di Desa Meat menawarkan pengalaman berjalan kaki yang menyenangkan di tengah hamparan sawah hijau terasering. Jalur ini dirancang dengan aman, memungkinkan pengunjung untuk menikmati pemandangan Danau Toba dari berbagai sudut. Trekking di sini sangat populer di kalangan fotografer dan pecinta alam.',
                'gambar' => 'trekking-sawah.jpg',
                'gambar_hero' => 'trekking-sawah/hero.jpg',
                'galeri' => ['trekking-sawah/gallery1.jpg', 'trekking-sawah/gallery2.jpg', 'trekking-sawah/gallery3.jpg'],
                'tags' => ['Trekking', 'Sawah Terasering', 'Panorama', 'Fotografi', 'Olahraga'],
                'maps' => '2.3841,99.1234',
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
                'nama' => 'Sentra Tenun Ulos (Desa Meat)',
                'slug' => 'sentra-tenun-ulos-meat',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Wisatawan dapat melihat langsung proses martonun (menenun) ulos yang dikerjakan oleh kaum wanita setempat.',
                'deskripsi_lengkap' => 'Di sentra tenun ulos Desa Meat, Anda dapat menyaksikan langsung proses pembuatan ulos, kain tradisional Batak yang sarat makna. Para wanita dengan sabar menenun menggunakan alat tradisional, menghasilkan ulos dengan motif yang indah dan beragam. Pengunjung juga dapat belajar menenun dan membeli ulos langsung dari pengrajinnya.',
                'gambar' => 'tenun-ulos.jpg',
                'gambar_hero' => 'tenun-ulos/hero.jpg',
                'galeri' => ['tenun-ulos/gallery1.jpg', 'tenun-ulos/gallery2.jpg', 'tenun-ulos/gallery3.jpg', 'tenun-ulos/gallery4.jpg'],
                'tags' => ['Tenun Ulos', 'Kerajinan Tangan', 'Budaya Batak', 'Oleh-oleh', 'UMKM'],
                'maps' => '2.3841,99.1234',
                'jam_operasional' => '08:00 - 17:00 WIB',
                'harga_tiket' => 'Gratis (belajar tenun: Rp 25.000)'
            ],
            (object)[
                'id' => 2,
                'nama' => 'Rumah Adat Batak (Desa Meat)',
                'slug' => 'rumah-adat-batak-budaya-meat',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Desa ini menampilkan pemandangan rumah tradisional Batak Toba yang khas di tepi sawah dan dekat danau.',
                'deskripsi_lengkap' => 'Rumah adat Batak di Desa Meat bukan hanya bangunan biasa, tetapi juga pusat kegiatan budaya. Rumah-rumah ini masih dihuni dan dirawat dengan baik. Pengunjung dapat melihat langsung arsitektur khas Batak, termasuk ukiran-ukiran dan ornamen yang memiliki makna filosofis. Pemandangan rumah adat dengan latar sawah dan Danau Toba sangat fotogenik.',
                'gambar' => 'rumah-adat-budaya.jpg',
                'gambar_hero' => 'rumah-adat-budaya/hero.jpg',
                'galeri' => ['rumah-adat-budaya/gallery1.jpg', 'rumah-adat-budaya/gallery2.jpg'],
                'tags' => ['Rumah Adat', 'Arsitektur', 'Budaya Batak', 'Spot Foto', 'Sejarah'],
                'maps' => '2.3841,99.1234',
                'jam_operasional' => '08:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 5.000'
            ]
        ];
        
        return view('destinasi.kategori', compact('kategori', 'deskripsi', 'destinasi'));
    }
    
    // ==================== DETAIL DESTINASI ====================
    public function detail($kategori, $slug)
    {
        // Kumpulkan semua data destinasi
        $semuaDestinasi = array_merge(
            $this->getDataAlam(),
            $this->getDataBuatan(),
            $this->getDataBudaya()
        );
        
        // Cari destinasi berdasarkan slug
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
    
    // ==================== DATA DESTINASI ALAM ====================
    private function getDataAlam()
    {
        return [
            (object)[
                'id' => 1,
                'nama' => 'Desa Wisata Meat',
                'slug' => 'desa-wisata-meat',
                'kategori' => 'alam',
                'lokasi' => 'Kec. Tampahan, Kab. Toba Samosir',
                'deskripsi' => 'Dikenal sebagai "New Zealand-nya Toba" dengan hamparan sawah hijau terasering, pantai pasir di pinggir Danau Toba, dan panorama perbukitan yang memukau.',
                'deskripsi_lengkap' => 'Desa Wisata Meat adalah permata tersembunyi di tepi Danau Toba. Dengan hamparan sawah hijau terasering yang membentang hingga ke pinggir danau, desa ini dijuluki "New Zealand-nya Toba". Pengunjung dapat menikmati keindahan alam yang masih asli, berjalan-jalan di tengah persawahan, atau bersantai di tepi pantai berpasir. Udara sejuk dan pemandangan perbukitan yang hijau menjadikan tempat ini cocok untuk melepas penat.',
                'gambar' => 'meat.jpg',
                'gambar_hero' => 'meat/hero.jpg',
                'galeri' => ['meat/gallery1.jpg', 'meat/gallery2.jpg', 'meat/gallery3.jpg', 'meat/gallery4.jpg'],
                'tags' => ['Sawah Terasering', 'Pantai', 'Panorama', 'Spot Foto', 'New Zealand-nya Toba'],
                'maps' => '-2.3841,99.1234',
                'jam_operasional' => '08:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 5.000 - Rp 15.000'
            ],
            (object)[
                'id' => 2,
                'nama' => 'Geosite Batu Basiha',
                'slug' => 'geosite-batu-basiha',
                'kategori' => 'alam',
                'lokasi' => 'Desa Aek Bolon, Balige',
                'deskripsi' => 'Tumpukan batu-batu balok raksasa sisa letusan dahsyat Gunung Toba (super volcano) yang berbentuk unik menyerupai tiang kayu.',
                'deskripsi_lengkap' => 'Geosite Batu Basiha merupakan formasi batuan unik yang menjadi sak bisu letusan dahsyat Gunung Toba 74.000 tahun lalu. Batu-batu raksasa ini tersusun rapi menyerupai tiang kayu, menciptakan pemandangan yang menakjubkan. Legenda setempat menyebutnya sebagai "Batu Sian Hau" (Batu dari Kayu) yang dikutuk menjadi batu. Tempat ini sangat populer untuk fotografi landscape, terutama saat sunrise dan sunset.',
                'gambar' => 'batu-bahisan.jpg',
                'gambar_hero' => 'batu-bahisan/hero.jpg',
                'galeri' => ['batu-bahisan/gallery1.jpg', 'batu-bahisan/gallery2.jpg', 'batu-bahisan/gallery3.jpg'],
                'tags' => ['Batu Raksasa', 'Geologi', 'Super Volcano', 'Spot Foto', 'Sunrise', 'Sunset', 'Legenda'],
                'maps' => '-2.3841,99.1234',
                'jam_operasional' => '06:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 10.000 - Rp 20.000'
            ],
            (object)[
                'id' => 3,
                'nama' => 'Liang Sipege',
                'slug' => 'liang-sipege',
                'kategori' => 'alam',
                'lokasi' => 'Kawasan Balige',
                'deskripsi' => 'Goa atau tebing unik dengan nilai sejarah dan budaya lokal yang tinggi. Bagian dari paket geowisata Danau Toba.',
                'deskripsi_lengkap' => 'Liang Sipege adalah goa alami yang menyimpan nilai sejarah dan geologi yang tinggi. Formasi batuan di dalam goa ini sangat unik, dengan stalaktit dan stalakmit yang terbentuk secara alami. Goa ini menjadi bagian penting dari paket geowisata Danau Toba, menawarkan pengalaman eksplorasi yang mendidik dan menyenangkan.',
                'gambar' => 'liang-sipege.jpg',
                'gambar_hero' => 'liang-sipege/hero.jpg',
                'galeri' => ['liang-sipege/gallery1.jpg', 'liang-sipege/gallery2.jpg', 'liang-sipege/gallery3.jpg', 'liang-sipege/gallery4.jpg'],
                'tags' => ['Goa Alami', 'Sejarah', 'Geowisata', 'Edukasi', 'Stalaktit', 'Caving'],
                'maps' => '-2.3841,99.1234',
                'jam_operasional' => '08:00 - 17:00 WIB',
                'harga_tiket' => 'Rp 15.000 - Rp 25.000'
            ]
        ];
    }
    
    // ==================== DATA DESTINASI BUATAN ====================
    private function getDataBuatan()
    {
        return [
            (object)[
                'id' => 4,
                'nama' => 'Rumah Adat Batak (Desa Meat)',
                'slug' => 'rumah-adat-batak-meat',
                'kategori' => 'buatan',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Spot foto budaya dan edukasi di rumah adat Batak yang masih asri dengan latar sawah dan Danau Toba.',
                'deskripsi_lengkap' => 'Rumah adat Batak di Desa Meat menawarkan pengalaman budaya yang autentik. Pengunjung dapat belajar tentang arsitektur tradisional Batak, filosofi rumah adat, dan berfoto dengan latar belakang yang indah.',
                'gambar' => 'rumah-adat.jpg',
                'gambar_hero' => 'rumah-adat/hero.jpg',
                'galeri' => ['rumah-adat/gallery1.jpg', 'rumah-adat/gallery2.jpg'],
                'tags' => ['Rumah Adat', 'Budaya', 'Spot Foto', 'Edukasi'],
                'maps' => '-2.3841,99.1234',
                'jam_operasional' => '08:00 - 17:00 WIB',
                'harga_tiket' => 'Rp 5.000'
            ],
            (object)[
                'id' => 5,
                'nama' => 'Spot Pantai/Tepian Danau (Desa Meat)',
                'slug' => 'spot-pantai-meat',
                'kategori' => 'buatan',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Area pinggir Danau Toba yang ditata untuk bersantai menikmati pemandangan danau dan perbukitan.',
                'deskripsi_lengkap' => 'Spot pantai di Desa Meat adalah tempat yang sempurna untuk bersantai sambil menikmati keindahan Danau Toba. Area ini telah ditata dengan baik, dilengkapi dengan tempat duduk dan gazebo.',
                'gambar' => 'pantai-meat.jpg',
                'gambar_hero' => 'pantai-meat/hero.jpg',
                'galeri' => ['pantai-meat/gallery1.jpg', 'pantai-meat/gallery2.jpg', 'pantai-meat/gallery3.jpg'],
                'tags' => ['Pantai', 'Santai', 'Keluarga', 'Spot Foto', 'Danau Toba'],
                'maps' => '-2.3841,99.1234',
                'jam_operasional' => '06:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 5.000'
            ],
            (object)[
                'id' => 6,
                'nama' => 'Penginapan/Homestay (Desa Meat)',
                'slug' => 'homestay-meat',
                'kategori' => 'buatan',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Penginapan berbasis budaya yang dikelola warga setempat dengan pemandangan sawah dan Danau Toba.',
                'deskripsi_lengkap' => 'Menginap di homestay Desa Meat memberikan pengalaman yang tak terlupakan. Anda akan tinggal bersama keluarga Batak, belajar tentang budaya mereka, menikmati masakan khas.',
                'gambar' => 'homestay.jpg',
                'gambar_hero' => 'homestay/hero.jpg',
                'galeri' => ['homestay/gallery1.jpg', 'homestay/gallery2.jpg'],
                'tags' => ['Homestay', 'Budaya', 'Penginapan', 'Ramah', 'Tradisional'],
                'maps' => '-2.3841,99.1234',
                'jam_operasional' => '24 Jam',
                'harga_tiket' => 'Rp 150.000 - Rp 300.000 / malam'
            ],
            (object)[
                'id' => 7,
                'nama' => 'Jalur Trekking Sawah (Desa Meat)',
                'slug' => 'jalur-trekking-sawah-meat',
                'kategori' => 'buatan',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Jalur setapak di tengah persawahan terasering dengan pemandangan spektakuler Danau Toba.',
                'deskripsi_lengkap' => 'Jalur trekking sawah di Desa Meat menawarkan pengalaman berjalan kaki yang menyenangkan di tengah hamparan sawah hijau terasering.',
                'gambar' => 'trekking-sawah.jpg',
                'gambar_hero' => 'trekking-sawah/hero.jpg',
                'galeri' => ['trekking-sawah/gallery1.jpg', 'trekking-sawah/gallery2.jpg', 'trekking-sawah/gallery3.jpg'],
                'tags' => ['Trekking', 'Sawah Terasering', 'Panorama', 'Fotografi', 'Olahraga'],
                'maps' => '-2.3841,99.1234',
                'jam_operasional' => '06:00 - 18:00 WIB',
                'harga_tiket' => 'Gratis'
            ]
        ];
    }
    
    // ==================== DATA DESTINASI BUDAYA ====================
    private function getDataBudaya()
    {
        return [
            (object)[
                'id' => 8,
                'nama' => 'Sentra Tenun Ulos (Desa Meat)',
                'slug' => 'sentra-tenun-ulos-meat',
                'kategori' => 'budaya',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Wisatawan dapat melihat langsung proses martonun (menenun) ulos yang dikerjakan oleh kaum wanita setempat.',
                'deskripsi_lengkap' => 'Di sentra tenun ulos Desa Meat, Anda dapat menyaksikan langsung proses pembuatan ulos, kain tradisional Batak yang sarat makna. Para wanita dengan sabar menenun menggunakan alat tradisional.',
                'gambar' => 'tenun-ulos.jpg',
                'gambar_hero' => 'tenun-ulos/hero.jpg',
                'galeri' => ['tenun-ulos/gallery1.jpg', 'tenun-ulos/gallery2.jpg', 'tenun-ulos/gallery3.jpg', 'tenun-ulos/gallery4.jpg'],
                'tags' => ['Tenun Ulos', 'Kerajinan Tangan', 'Budaya Batak', 'Oleh-oleh', 'UMKM'],
                'maps' => '-2.3841,99.1234',
                'jam_operasional' => '08:00 - 17:00 WIB',
                'harga_tiket' => 'Gratis (belajar tenun: Rp 25.000)'
            ],
            (object)[
                'id' => 9,
                'nama' => 'Rumah Adat Batak (Desa Meat)',
                'slug' => 'rumah-adat-batak-budaya-meat',
                'kategori' => 'budaya',
                'lokasi' => 'Desa Meat, Kec. Tampahan',
                'deskripsi' => 'Desa ini menampilkan pemandangan rumah tradisional Batak Toba yang khas di tepi sawah dan dekat danau.',
                'deskripsi_lengkap' => 'Rumah adat Batak di Desa Meat bukan hanya bangunan biasa, tetapi juga pusat kegiatan budaya. Rumah-rumah ini masih dihuni dan dirawat dengan baik.',
                'gambar' => 'rumah-adat-budaya.jpg',
                'gambar_hero' => 'rumah-adat-budaya/hero.jpg',
                'galeri' => ['rumah-adat-budaya/gallery1.jpg', 'rumah-adat-budaya/gallery2.jpg'],
                'tags' => ['Rumah Adat', 'Arsitektur', 'Budaya Batak', 'Spot Foto', 'Sejarah'],
                'maps' => '-2.3841,99.1234',
                'jam_operasional' => '08:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 5.000'
            ]
        ];
    }
}