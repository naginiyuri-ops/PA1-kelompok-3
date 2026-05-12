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
                        'nama' => 'Pantai Meat',
                        'slug' => 'desa-wisata-meat',
                        'kategori' => 'alam',
                        'lokasi' => 'Kec. Tampahan, Kab. Toba Samosir',
                        'deskripsi' => 'Pantai Meat di Desa Meat, Kecamatan Tampahan, Kabupaten Toba, menawarkan panorama Danau Toba yang indah dengan hamparan pasir putih, air jernih, dan perbukitan hijau. Suasananya tenang dan alami, cocok untuk bersantai, berfoto, maupun menikmati kehidupan masyarakat lokal di sekitar danau.',
                        'deskripsi_lengkap' => 'Pantai Meat merupakan salah satu destinasi wisata alam unggulan yang terletak di Desa Meat, Kecamatan Tampahan, Kabupaten Toba, Sumatera Utara. Berjarak sekitar 12 kilometer dari Kota Balige, pantai ini berada di tepian Danau Toba dan menawarkan panorama menakjubkan berupa hamparan air danau yang luas, perbukitan hijau, serta persawahan terasering khas kawasan Toba.
                                                Suasana Pantai Meat dikenal tenang dan alami, menjadikannya tempat ideal untuk bersantai, menikmati pemandangan, maupun melakukan aktivitas fotografi. Dari kawasan pantai, pengunjung dapat menyaksikan keindahan bentang alam Kaldera Toba, peninggalan letusan supervulkan purba ribuan tahun lalu.
                                                Selain panorama yang memukau, Pantai Meat juga memperlihatkan eratnya hubungan masyarakat lokal dengan alam Danau Toba. Aktivitas pertanian, perikanan, hingga budaya Batak yang masih terjaga dapat ditemui di sekitar kawasan ini.',
                        'jam_operasional' => '24 jam',
                        'harga_tiket' => 'Rp 5.000 per orang',
                        'tags' => ['Sawah Terasering', 'Panorama', 'Spot Foto', 'New Zealand']
                    ],
                    'geosite-batu-basiha' => [
                        'id' => 2,
                        'nama' => 'Batu Basiha',
                        'slug' => 'geosite-batu-basiha',
                        'kategori' => 'alam',
                        'lokasi' => 'Desa Aek Bolon, Balige',
                        'deskripsi' => 'Batu Basiha (Batu Martindi) bukan sekadar tumpukan batu tua — ia adalah saksi bisu perjalanan spiritual, budaya, dan sejarah masyarakat Batak Toba di Desa Sibodiala. Dengan perlindungan yang tepat dan pengembangan wisata berbasis edukasi, situs ini dapat menjadi warisan budaya yang memberi manfaat bagi ilmu pengetahuan, kebanggaan lokal, dan sektor pariwisata Toba.',
                        'deskripsi_lengkap' => 'Batu Basiha, yang juga dikenal sebagai Batu Martindi, merupakan salah satu situs geowisata dan cagar budaya penting yang berada di Desa Sibodiala, Kecamatan Parmaksian, Kabupaten Toba, Sumatera Utara. Destinasi ini tidak hanya menyuguhkan keunikan formasi batuan alam, tetapi juga menyimpan nilai sejarah, budaya, dan kearifan lokal masyarakat Batak yang diwariskan secara turun-temurun.
                        Secara geologis, Batu Basiha terbentuk dari proses pendinginan magma hasil aktivitas vulkanik purba di kawasan Kaldera Toba. Lava yang mengalir dari letusan gunung purba kemudian membeku dan mengalami proses kontraksi alami sehingga membentuk struktur kekar kolom (columnar joint) yang khas. Formasi batuan andesit ini tersusun dalam kolom-kolom vertikal besar yang tampak menyerupai batang atau fosil kayu. Struktur tersebut menjadi salah satu bukti proses geologi vulkanik purba yang membentuk kawasan Danau Toba dan sekitarnya.
                        Nama “Basiha” berasal dari istilah Batak “batu sian hau” yang berarti “batu yang berasal dari kayu”. Masyarakat setempat meyakini bahwa batu ini memiliki hubungan erat dengan sebuah legenda leluhur. Dahulu kala, sekelompok masyarakat bermaksud membuka pemukiman dengan menebang pohon-pohon besar di kawasan tersebut. Namun, seekor harimau muncul sebagai pertanda dan peringatan agar hutan tetap dijaga. Karena larangan itu diabaikan, petir kemudian menyambar pohon besar hingga berubah menjadi batu. Sejak saat itu, masyarakat mempercayai kawasan Batu Basiha sebagai tempat sakral yang mengandung pesan tentang pentingnya menjaga alam dan kelestarian lingkungan.
                        Dalam tradisi masyarakat Batak Toba, Batu Basiha juga dikenal sebagai Batu Martindi, yaitu tempat dilaksanakannya ritual adat “martindi”. Ritual ini dilakukan oleh para tetua adat dan datu sebagai sarana untuk memohon petunjuk leluhur, menentukan keputusan penting, meramal keadaan kampung, hingga menyelesaikan persoalan masyarakat. Batu ini dipercaya menjadi media spiritual yang menghubungkan manusia dengan roh nenek moyang.
                        Di sekitar Batu Basiha terdapat beberapa peninggalan budaya seperti batu duduk untuk musyawarah, batu persembahan, dan area ritual adat yang dahulu digunakan masyarakat setempat. Keberadaan situs ini mencerminkan nilai-nilai kehidupan masyarakat Batak yang menjunjung tinggi musyawarah, kebersamaan, penghormatan terhadap leluhur, serta konservasi alam.
                        Selain menjadi situs budaya dan sejarah, Batu Basiha juga menawarkan panorama alam yang indah dengan suasana perbukitan hijau dan udara sejuk khas kawasan Toba. Pengunjung dapat menikmati wisata edukasi geologi, sejarah budaya Batak, fotografi alam, hingga mendengarkan cerita rakyat dan legenda lokal dari masyarakat sekitar.
                        Saat ini, Batu Basiha telah ditetapkan sebagai salah satu cagar budaya yang dilindungi pemerintah daerah bersama Balai Pelestarian Kebudayaan Sumatera Utara. Pelestarian dilakukan melalui pemasangan informasi sejarah, perlindungan situs dari vandalisme, serta pengembangan wisata edukasi budaya dan geowisata sebagai bagian dari upaya menjaga warisan sejarah dan budaya masyarakat Batak untuk generasi mendatang.',
                        'jam_operasional' => '06:00 - 18:00 WIB',
                        'harga_tiket' => 'Rp 10.000 - Rp 20.000',
                        'tags' => ['Batu Raksasa', 'Geologi', 'Sunrise', 'Sunset']
                    ],
                    'liang-sipege' => [
                        'id' => 3,
                        'nama' => 'Gua Liang Sipege',
                        'slug' => 'liang-sipege',
                        'kategori' => 'alam',
                        'lokasi' => 'Desa Simarmar Pea Talun Hutagaol, Kecamatan Balige',
                        'deskripsi' => 'Goa alami dengan stalaktit dan stalakmit yang terbentuk secara alami, menyimpan nilai sejarah dan geologi.',
                        'deskripsi_lengkap' => 'Gua Liang Sipege merupakan destinasi wisata alam yang berada tidak jauh dari pusat Kota Balige, Kabupaten Toba, Sumatera Utara. Lokasinya dapat dijangkau dengan kendaraan roda dua maupun roda empat dengan waktu tempuh sekitar 30 menit. Akses menuju kawasan gua cukup baik, mulai dari jalan desa hingga jalur rabat beton menuju mulut gua sehingga memudahkan pengunjung menikmati keindahan alam di sekitarnya.
                        Gua ini memiliki mulut gua dengan lebar sekitar 15 meter dan dikelilingi formasi batuan unik yang menjadi daya tarik utama. Kawasan Gua Liang Sipege didominasi batuan andesit dengan struktur kekar kolom horizontal berukuran besar yang menyerupai formasi dyke atau retas raksasa. Keunikan geologi tersebut menjadikan kawasan ini tidak hanya menarik sebagai objek wisata alam, tetapi juga berpotensi menjadi lokasi penelitian bagi para ahli geologi dan akademisi.
                        Selain keindahan alamnya, gua ini juga dikenal memiliki suasana yang tenang dan penuh nuansa misterius. Masyarakat setempat mewariskan berbagai cerita rakyat yang melekat dengan kawasan gua, salah satunya mitos Basiha atau “Batu Sian Hau” yang dipercaya sebagai batu yang berasal dari kayu. Kisah tersebut menjadi bagian dari kekayaan budaya lokal yang menambah daya tarik wisata kawasan ini.
                        Dengan perpaduan panorama alam, formasi batuan langka, serta suasana khas pegunungan Toba, Gua Liang Sipege menjadi salah satu destinasi wisata alam yang menarik untuk dikunjungi sekaligus dinikmati keunikan alam dan budaya yang dimilikinya.',
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