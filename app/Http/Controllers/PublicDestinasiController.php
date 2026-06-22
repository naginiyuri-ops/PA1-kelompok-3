<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicDestinasiController extends Controller
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
        $dataDestinasi = [
            'alam' => [
                'items' => [
                    'desa-wisata-meat' => [
                        'id' => 1,
                        'nama' => 'Pantai Meat',
                        'slug' => 'desa-wisata-meat',
                        'kategori' => 'alam',
                        'lokasi' => 'Kec. Tampahan, Kab. Toba Samosir',
                        'deskripsi' => 'Pantai Meat adalah destinasi wisata alam yang memukau di tepian Danau Toba, menawarkan panorama hamparan air biru, perbukitan hijau, dan persawahan terasering yang sering dibandingkan dengan keindahan alam Selandia Baru. Suasana tenang dan udara sejuk menjadikannya tempat ideal untuk bersantai, berfoto, dan merasakan kehidupan masyarakat Batak Toba yang hangat dan bersahaja.',
                        'deskripsi_lengkap' => 'Pantai Meat merupakan salah satu destinasi wisata alam unggulan yang terletak di Desa Meat, Kecamatan Tampahan, Kabupaten Toba, Sumatera Utara. Berjarak sekitar 12 kilometer dari pusat Kota Balige, pantai ini berada langsung di tepian Danau Toba — danau vulkanik terbesar di dunia sekaligus salah satu keajaiban geologi yang diakui secara internasional.

Keindahan Pantai Meat bersumber dari perpaduan unik antara hamparan air danau yang jernih, perbukitan hijau yang mengelilinginya, serta hamparan sawah terasering yang membentang di sepanjang lereng. Panorama ini sering disebut oleh para wisatawan mancanegara menyerupai pemandangan khas Selandia Baru, sehingga Pantai Meat mendapat julukan informal "New Zealand van Toba". Keistimewaan ini menjadikannya salah satu spot fotografi paling populer di Kabupaten Toba.

Dari kawasan pantai, pengunjung dapat menyaksikan bentang alam Kaldera Toba secara langsung — sebuah kaldera raksasa hasil letusan supervulkan purba yang terjadi sekitar 74.000 tahun lalu. Kaldera Toba kini diakui sebagai UNESCO Global Geopark, menjadikan setiap sudut kawasan ini bernilai ilmiah dan wisata yang tinggi. Di kala pagi hari, kabut tipis yang menyelimuti permukaan danau menciptakan suasana magis yang sayang untuk dilewatkan.

Pantai Meat juga dikenal dengan air danaunya yang relatif jernih dan tenang, cocok untuk aktivitas berenang ringan, kayak, maupun sekadar bermain air di tepi pantai. Bagi wisatawan yang ingin menikmati pemandangan lebih lama, tersedia sejumlah warung makan sederhana yang menyajikan menu khas lokal seperti ikan mas arsik dan naniura — hidangan ikan khas Batak yang lezat.

Kehidupan masyarakat lokal di Desa Meat menjadi daya tarik tersendiri. Pengunjung dapat menyaksikan keseharian warga yang bekerja sebagai petani sawah dan nelayan danau, sebuah pemandangan yang autentik dan jarang ditemui di destinasi wisata modern lainnya. Interaksi dengan warga lokal memberikan pengalaman budaya yang tak ternilai.

Infrastruktur menuju Pantai Meat cukup baik, dengan jalan beraspal yang dapat dilalui kendaraan roda dua maupun roda empat. Kawasan pantai juga dilengkapi dengan area parkir, toilet umum, dan beberapa gazebo sederhana untuk beristirahat. Waktu terbaik berkunjung adalah di pagi hari untuk menikmati udara segar dan cahaya golden hour, atau sore menjelang matahari terbenam untuk menyaksikan langit yang berwarna jingga keemasan di atas permukaan Danau Toba.',
                        'jam_operasional' => '24 jam',
                        'harga_tiket' => 'Rp 5.000 per orang',
                        'tags' => ['Sawah Terasering', 'Panorama', 'Spot Foto', 'New Zealand'],
                        'foto' => 'image/meat/meat-detail.jpg'
                    ],

                    'geosite-batu-basiha' => [
                        'id' => 2,
                        'nama' => 'Batu Basiha',
                        'slug' => 'geosite-batu-basiha',
                        'kategori' => 'alam',
                        'lokasi' => 'Desa Aek Bolon, Balige',
                        'deskripsi' => 'Batu Basiha atau Batu Martindi adalah situs geowisata dan cagar budaya yang menyimpan keajaiban geologi berupa formasi batuan andesit berbentuk kolom vertikal hasil aktivitas vulkanik purba. Lebih dari sekadar keindahan alam, situs ini merupakan warisan spiritual masyarakat Batak Toba yang penuh dengan nilai sejarah, legenda leluhur, dan kearifan lokal tentang hubungan manusia dengan alam.',
                        'deskripsi_lengkap' => 'Batu Basiha, yang juga dikenal dengan nama Batu Martindi, adalah situs geowisata dan cagar budaya yang terletak di Desa Sibodiala, Kecamatan Parmaksian, Kabupaten Toba, Sumatera Utara. Situs ini merupakan salah satu warisan alam dan budaya paling signifikan di kawasan Danau Toba, memadukan keunikan formasi geologi langka dengan kekayaan sejarah dan tradisi masyarakat Batak Toba.

Dari perspektif geologi, Batu Basiha terbentuk dari proses pendinginan magma yang terjadi ribuan tahun lalu akibat aktivitas vulkanik purba di kawasan Kaldera Toba. Ketika lava yang mengalir dari letusan gunung berapi purba mulai mendingin secara perlahan dan seragam, terjadi proses kontraksi termal yang menghasilkan rekahan-rekahan beraturan membentuk struktur kekar kolom (columnar joint). Hasilnya adalah deretan kolom batuan andesit vertikal berukuran besar yang tersusun rapi menyerupai batang pohon raksasa atau tiang-tiang alam yang megah. Struktur geologi serupa juga ditemukan di berbagai belahan dunia seperti Giant s Causeway di Irlandia Utara, namun formasi di Batu Basiha memiliki konteks vulkanik dan budaya yang khas Toba.

Nama "Basiha" berasal dari kata dalam bahasa Batak "batu sian hau" yang secara harfiah berarti "batu yang berasal dari kayu". Penamaan ini mencerminkan keyakinan masyarakat setempat yang melegenda secara turun-temurun. Konon, pada zaman dahulu sekelompok warga hendak membuka lahan dengan menebang pohon-pohon besar di kawasan tersebut. Sebagai peringatan agar alam tetap dijaga, seekor harimau muncul memberikan tanda. Namun karena peringatan itu diabaikan, petir menyambar pohon besar secara tiba-tiba hingga berubah menjadi batu seketika. Sejak saat itu, kawasan ini dianggap sakral dan menjadi pengingat abadi tentang pentingnya menjaga keseimbangan antara manusia dan alam.

Dalam tradisi adat Batak Toba, situs ini juga dikenal sebagai Batu Martindi — tempat para tetua adat dan datu (pemimpin spiritual) melaksanakan ritual adat yang disebut "martindi". Ritual ini dilakukan untuk berbagai keperluan penting: memohon petunjuk leluhur, meramal keberuntungan kampung, menentukan keputusan besar masyarakat, hingga menyelesaikan perselisihan adat secara musyawarah. Batu ini dipercaya sebagai media spiritual yang mampu menghubungkan dunia manusia dengan roh para nenek moyang.

Di sekitar area utama Batu Basiha, terdapat sejumlah peninggalan budaya yang masih dapat ditelusuri, di antaranya batu-batu duduk yang konon digunakan oleh para tetua untuk bermusyawarah, batu persembahan sebagai tempat menaruh sesaji ritual, serta area-area ritual yang dahulu digunakan secara reguler oleh masyarakat. Keberadaan berbagai elemen ini menjadikan Batu Basiha bukan hanya situs alam, tetapi juga museum terbuka warisan budaya Batak.

Kawasan Batu Basiha dikelilingi oleh perbukitan hijau dengan vegetasi alami yang rimbun, menghadirkan suasana alam yang sejuk dan asri. Pengunjung dapat menikmati udara segar sambil menjelajahi formasi batuan yang unik, mendengarkan cerita rakyat dari warga setempat, sekaligus belajar tentang geologi vulkanik dan budaya Batak secara langsung. Lokasi ini juga menjadi spot fotografi yang menarik, terutama pada waktu matahari terbit dan terbenam ketika cahaya alami menciptakan siluet dramatis pada kolom-kolom batu raksasa.

Pemerintah daerah bersama Balai Pelestarian Kebudayaan Sumatera Utara telah menetapkan Batu Basiha sebagai cagar budaya yang dilindungi. Upaya pelestarian mencakup pemasangan papan informasi sejarah, perlindungan situs dari vandalisme, serta pengembangan program wisata edukasi geologi dan budaya. Sebagai bagian dari kawasan UNESCO Global Geopark Kaldera Toba, Batu Basiha memiliki potensi besar untuk berkembang menjadi destinasi geowisata bertaraf internasional yang membanggakan.',
                        'jam_operasional' => '06:00 - 18:00 WIB',
                        'harga_tiket' => 'Free',
                        'tags' => ['Batu Raksasa', 'Geologi', 'Sunrise', 'Sunset'],
                        'foto' => 'image/meat/batubasiha1.png'
                    ],

                    'liang-sipege' => [
                        'id' => 3,
                        'nama' => 'Gua Liang Sipege',
                        'slug' => 'liang-sipege',
                        'kategori' => 'alam',
                        'lokasi' => 'Desa Simarmar Pea Talun Hutagaol, Kecamatan Balige',
                        'deskripsi' => 'Gua Liang Sipege adalah gua alam yang menyimpan keindahan formasi batuan andesit langka berbentuk kekar kolom horizontal, menjadikannya salah satu situs geowisata paling unik di kawasan Toba. Dibalut nuansa misterius dan cerita rakyat Batak yang kaya, gua ini menghadirkan pengalaman wisata alam sekaligus perjalanan edukasi geologi dan budaya lokal yang tak terlupakan.',
                        'deskripsi_lengkap' => 'Gua Liang Sipege merupakan destinasi wisata alam yang terletak di Desa Simarmar Pea Talun Hutagaol, Kecamatan Balige, Kabupaten Toba, Sumatera Utara. Meskipun jaraknya relatif dekat dari pusat Kota Balige — dapat ditempuh dalam waktu sekitar 30 menit menggunakan kendaraan bermotor — gua ini menawarkan pengalaman wisata yang terasa jauh dari keramaian kota, dikelilingi oleh alam perbukitan yang tenang dan hijau.

Akses menuju Gua Liang Sipege cukup ramah wisatawan. Jalan desa yang terhubung ke lokasi dapat dilalui oleh kendaraan roda dua maupun roda empat, dan sebagian jalur menuju mulut gua telah dibeton sehingga memudahkan pengunjung untuk berjalan kaki dengan nyaman sambil menikmati pemandangan alam sekitar yang asri.

Daya tarik utama Gua Liang Sipege terletak pada keunikan formasi geologinya. Mulut gua memiliki lebar sekitar 15 meter dengan langit-langit yang cukup tinggi, menciptakan kesan dramatis dan megah sejak pertama kali pengunjung tiba. Yang membedakan gua ini dari gua-gua lainnya adalah keberadaan formasi batuan andesit berstruktur kekar kolom horizontal berukuran besar yang menghiasi dinding dan langit-langit gua. Struktur ini terbentuk akibat proses pendinginan lava purba dari aktivitas vulkanik Kaldera Toba puluhan ribu tahun lalu, dan secara ilmiah dikenal menyerupai formasi dyke atau retas — retakan batuan tempat magma menyusup dan membeku. Keunikan geologi ini menjadikan Gua Liang Sipege sebagai lokasi yang menarik tidak hanya bagi wisatawan umum, tetapi juga bagi kalangan peneliti, ahli geologi, dan mahasiswa yang ingin mempelajari vulkanologi secara langsung di lapangan.

Selain keajaiban geologinya, suasana di dalam dan sekitar gua memiliki daya tarik tersendiri. Udara di dalam gua terasa lebih sejuk dibandingkan area luar, dan cahaya yang masuk melalui mulut gua menciptakan efek pencahayaan alami yang indah, terutama di pagi hari ketika sinar matahari pertama mulai menyinari formasi batuan. Suara tetesan air dari celah-celah batu menambah nuansa tenang dan misterius yang membuat pengunjung merasa seolah berada di dunia yang berbeda.

Masyarakat setempat mewariskan berbagai cerita rakyat dan legenda yang melekat erat dengan keberadaan Gua Liang Sipege. Salah satu yang paling terkenal adalah kisah tentang "Batu Sian Hau" atau Basiha — sebuah mitos yang menceritakan tentang pohon raksasa yang berubah menjadi batu akibat petir sebagai peringatan dari alam atas keserakahan manusia. Legenda ini tidak hanya menjadi bagian dari identitas budaya lokal, tetapi juga mengandung pesan moral tentang pentingnya menjaga kelestarian alam yang relevan hingga hari ini.

Kawasan sekitar Gua Liang Sipege juga menawarkan pemandangan alam yang indah dengan hamparan perbukitan khas kawasan Toba, vegetasi liar yang rimbun, serta udara pegunungan yang segar dan bersih. Pengunjung dapat menikmati wisata fotografi, eksplorasi gua ringan, maupun sekadar duduk bersantai sambil menikmati ketenangan alam jauh dari hiruk pikuk perkotaan.

Sebagai bagian dari kawasan UNESCO Global Geopark Kaldera Toba, Gua Liang Sipege memiliki potensi besar untuk dikembangkan menjadi destinasi geowisata dan ekowisata yang bernilai tinggi. Saat ini, pengelolaan kawasan masih melibatkan masyarakat desa setempat, sehingga kunjungan ke lokasi ini secara langsung turut mendukung perekonomian dan pemberdayaan warga lokal.',
                        'jam_operasional' => '08:00 - 17:00 WIB',
                        'harga_tiket' => 'Free',
                        'tags' => ['Goa Alami', 'Sejarah', 'Geowisata', 'Edukasi'],
                        'foto' => 'image/meat/liang-sipege-hero.jpg'
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
                        'deskripsi' => 'Sentra Tenun Ulos Desa Meat adalah tempat di mana seni martonun (menenun) ulos masih dijalankan secara tradisional oleh kaum perempuan setempat menggunakan alat tenun warisan leluhur. Ulos bukan sekadar kain — ia adalah jiwa budaya Batak Toba yang mengandung doa, kasih sayang, dan makna adat mendalam dalam setiap helai benangnya. Mengunjungi sentra ini berarti menyaksikan langsung pelestarian warisan budaya takbenda yang hidup dan terus diwariskan dari generasi ke generasi.',
                        'deskripsi_lengkap' => 'Sentra Tenun Ulos di Desa Meat, Kecamatan Tampahan, merupakan salah satu pusat kerajinan tenun tradisional yang masih aktif beroperasi di kawasan wisata Toba. Di sinilah para perempuan Batak Toba meneruskan tradisi martonun — proses menenun ulos secara manual menggunakan alat tenun tradisional yang disebut "raga-raga" atau alat tenun gendong, persis seperti yang dilakukan oleh nenek moyang mereka selama berabad-abad lamanya.

Ulos adalah kain tenun tradisional paling sakral dalam kebudayaan Batak. Jauh melampaui fungsi sebagai pakaian biasa, ulos merupakan simbol hubungan emosional, spiritual, dan sosial antar manusia dalam masyarakat Batak. Dalam falsafah Batak, dikenal ungkapan "Ijuk pangihot ni hodong, ulos pangihot ni holong" yang berarti "Ijuk pengikat pelepah, ulos pengikat kasih sayang". Ungkapan ini mencerminkan betapa dalamnya makna ulos bagi setiap orang Batak — ia adalah medium untuk menyampaikan berkat, cinta, dan penghormatan.

Setiap jenis ulos memiliki nama, motif, warna, dan fungsi adat yang berbeda-beda. Ulos Ragidup, misalnya, hanya diberikan oleh orang tua kepada anaknya yang menikah dan memiliki makna doa agar kehidupan baru yang penuh semangat. Ulos Bintang Maratur digunakan dalam acara pernikahan sebagai simbol keharmonisan. Sementara ulos Sadum bermakna kegembiraan dan kebahagiaan. Pengetahuan mendalam tentang makna dan fungsi setiap ulos inilah yang diwariskan dari para penenun senior kepada generasi penerus di Sentra Tenun Desa Meat.

Proses pembuatan ulos membutuhkan keterampilan, kesabaran, dan waktu yang tidak sedikit. Dimulai dari pemilihan benang berkualitas tinggi, pencelupan warna menggunakan pewarna alami maupun modern, penyusunan motif di alat tenun, hingga proses menenun yang membutuhkan konsentrasi penuh untuk menghasilkan pola yang presisi. Satu lembar ulos ukuran standar dapat memakan waktu beberapa hari hingga beberapa minggu, tergantung pada kerumitan motifnya. Hasilnya adalah sebuah karya seni tekstil yang bernilai tinggi — baik secara ekonomi maupun secara budaya.

Di Sentra Tenun Desa Meat, pengunjung tidak hanya bisa menyaksikan proses menenun dari jarak dekat, tetapi juga diajak untuk mencoba langsung duduk di hadapan alat tenun dan merasakan bagaimana benang-benang diolah menjadi kain berpola. Sesi belajar menenun singkat tersedia bagi wisatawan yang ingin mendapatkan pengalaman lebih mendalam dan langsung bersentuhan dengan tradisi ini. Tersedia pula berbagai pilihan ulos dan kain tenun yang dapat dibeli sebagai oleh-oleh khas, mulai dari syal, selendang, hingga lembar ulos lengkap dengan harga yang bervariasi sesuai kualitas dan kerumitan motif.

Sentra Tenun Ulos Desa Meat juga berperan penting dalam pemberdayaan ekonomi perempuan setempat. Dengan menjaga kelangsungan usaha tenun tradisional ini, para perempuan Desa Meat tidak hanya melestarikan warisan budaya, tetapi juga memiliki sumber penghasilan yang mandiri dan berkelanjutan. Dukungan dari sektor pariwisata menjadi salah satu faktor kunci yang membantu industri tenun lokal ini tetap bertahan dan terus berkembang di tengah arus modernisasi.',
                        'jam_operasional' => '08:00 - 17:00 WIB',
                        'harga_tiket' => 'Gratis (belajar tenun: Rp 25.000)',
                        'tags' => ['Tenun Ulos', 'Kerajinan Tangan', 'Budaya Batak', 'Oleh-oleh'],
                        'foto' => 'image/meat/ulos.jpg'
                    ],

                    'rumah-adat-batak' => [
                        'id' => 2,
                        'nama' => 'Rumah Adat Batak',
                        'slug' => 'rumah-adat-batak',
                        'kategori' => 'budaya',
                        'lokasi' => 'Desa Meat, Kec. Tampahan',
                        'deskripsi' => 'Rumah Adat Batak Toba atau Ruma Gorga adalah mahakarya arsitektur tradisional yang memancarkan kekayaan filosofi dan estetika budaya Batak. Dengan atap melengkung khas berbentuk punggung kerbau, dinding berukir gorga berwarna merah, hitam, dan putih, serta konstruksi kayu panggung tanpa paku, setiap detail rumah ini menyimpan makna mendalam tentang kosmologi, kekeluargaan, dan nilai-nilai leluhur Batak yang telah bertahan selama ratusan tahun.',
                        'deskripsi_lengkap' => 'Rumah Adat Batak Toba, yang dikenal secara tradisional sebagai Ruma Gorga atau Jabu, merupakan salah satu warisan arsitektur vernakular paling menakjubkan di Nusantara. Keberadaannya di Desa Meat, Kecamatan Tampahan, menjadikan desa ini tidak hanya kaya akan keindahan alam, tetapi juga sebagai ruang hidup kebudayaan Batak Toba yang otentik dan masih terjaga dengan baik.

Secara arsitektur, Ruma Gorga sangat mudah dikenali dari bentuk atapnya yang melengkung dramatis menyerupai punggung kerbau — hewan yang memiliki simbol penting dalam budaya Batak sebagai lambang kekuatan, kemakmuran, dan kehormatan. Kemiringan atap yang tajam di kedua ujungnya bukan hanya berfungsi estetis, tetapi juga dirancang secara fungsional untuk mengalirkan air hujan dengan cepat dan efisien di iklim tropis yang curah hujannya tinggi. Atap tradisional ini dahulu menggunakan bahan ijuk (serat pohon aren) yang tahan lama, meskipun kini sebagian telah diganti dengan seng atau genteng tanpa mengurangi keagungan bentuk bangunannya.

Elemen paling ikonik dari Ruma Gorga adalah ukiran gorga yang menghiasi hampir seluruh permukaan dinding luarnya. Gorga adalah ragam hias ukiran khas Batak yang dibuat dengan tiga warna utama — merah (sira), hitam (bonang), dan putih (patar) — yang masing-masing memiliki makna simbolis mendalam. Merah melambangkan keberanian dan kekuatan; hitam melambangkan keabadian dan kewibawaan; serta putih melambangkan kesucian dan kejujuran. Motif gorga yang paling umum antara lain ipon-ipon (geometris berlian), desa naualu (delapan penjuru mata angin), dan boraspati ni tano (cicak penjaga tanah) yang dipercaya membawa keberuntungan bagi penghuni rumah. Setiap motif bukan hanya ornamen semata, melainkan bahasa visual yang bercerita tentang kosmologi dan pandangan hidup masyarakat Batak Toba.

Konstruksi Ruma Gorga menampilkan kecanggihan rekayasa bangunan tradisional yang luar biasa. Rumah dibangun di atas tiang-tiang kayu besar sehingga berbentuk panggung, memberikan ruang bawah (kolong) yang dahulu berfungsi sebagai kandang ternak. Teknik pembangunan tradisional Batak tidak menggunakan paku besi sama sekali; seluruh elemen struktur disambungkan menggunakan sistem pasak dan ikatan tali rotan, menghasilkan bangunan yang elastis dan mampu bertahan terhadap guncangan gempa. Kayu-kayu pilihan yang digunakan umumnya adalah kayu keras bermutu tinggi seperti kayu alam dari hutan sekitar yang telah melalui proses pengeringan alami panjang.

Secara spasial, interior Ruma Gorga dibagi menjadi beberapa zona yang mencerminkan struktur sosial masyarakat Batak yang teratur. Bagian depan (sopo) berfungsi sebagai ruang pertemuan dan musyawarah adat, sementara bagian tengah adalah ruang tinggal bersama yang digunakan secara kolektif oleh beberapa keluarga. Pada masa lalu, satu Ruma Gorga bisa dihuni oleh 4 hingga 6 keluarga sekaligus yang masih berhubungan dalam satu marga, mencerminkan nilai kebersamaan dan gotong royong yang menjadi pondasi kehidupan sosial Batak.

Mengunjungi Rumah Adat Batak di Desa Meat memberikan kesempatan langka untuk memahami secara langsung bagaimana sebuah bangunan bisa menjadi cerminan utuh dari sebuah peradaban. Tersedia pemandu lokal yang dapat menjelaskan makna setiap detail bangunan, cerita sejarahnya, serta hubungannya dengan ritual dan adat istiadat Batak yang masih berlangsung hingga kini. Kunjungan ini sangat direkomendasikan bagi siapa pun yang ingin memahami kedalaman budaya Batak Toba secara lebih bermakna.',
                        'jam_operasional' => '08:00 - 18:00 WIB',
                        'harga_tiket' => '',
                        'tags' => ['Rumah Adat', 'Arsitektur', 'Budaya Batak', 'Sejarah'],
                        'foto' => 'image/meat/jabubatak.jpg'
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
                        'deskripsi' => 'Spot Pantai Meat adalah area tepi Danau Toba yang telah ditata dengan apik menjadi ruang rekreasi publik yang nyaman, lengkap dengan gazebo, bangku santai, dan berbagai sudut foto artistik. Dari sini, pengunjung dapat menikmati pemandangan Danau Toba yang membentang luas berpadu dengan latar perbukitan hijau — momen terbaik hadir saat senja ketika langit berubah keemasan di atas permukaan danau.',
                        'deskripsi_lengkap' => 'Spot Pantai Meat adalah kawasan wisata tepi danau yang telah dikelola dan ditata secara khusus oleh masyarakat dan pengelola wisata Desa Meat sebagai ruang rekreasi publik yang ramah keluarga. Berlokasi strategis di tepi Danau Toba dengan latar belakang perbukitan hijau yang dramatis, area ini menjadi salah satu spot bersantai dan berfoto favorit bagi wisatawan yang berkunjung ke kawasan Toba.

Area Spot Pantai Meat dilengkapi dengan sejumlah fasilitas yang dirancang untuk memaksimalkan kenyamanan pengunjung. Tersedia gazebo-gazebo sederhana yang ditempatkan di titik-titik strategis menghadap danau, bangku-bangku santai di tepi air, serta beberapa instalasi dekorasi dan spot foto tematik yang menarik untuk mengabadikan momen liburan. Meski sederhana, penataan kawasan ini menciptakan atmosfer yang hangat dan bersahabat, jauh dari kesan komersial yang berlebihan.

Daya tarik utama Spot Pantai Meat tentu saja adalah pemandangan Danau Toba yang terbuka lebar dari kawasan ini. Pengunjung dapat duduk di gazebo sambil menikmati semilir angin danau yang sejuk, memandangi permukaan air yang memantulkan warna langit, atau sekadar mencelupkan kaki di tepi danau sambil bercengkerama dengan keluarga. Di musim kemarau, air danau yang lebih jernih membuat pemandangan semakin memukau.

Salah satu waktu paling istimewa untuk mengunjungi Spot Pantai Meat adalah sore menjelang matahari terbenam. Ketika langit mulai berubah dari biru cerah menjadi gradasi jingga dan keemasan, pantulannya di atas permukaan Danau Toba menciptakan panorama yang begitu indah hingga terasa seperti lukisan hidup. Momen ini sangat diminati oleh fotografer amatir maupun profesional yang sengaja datang untuk mengabadikan golden hour khas Toba.

Fasilitas pendukung di kawasan Spot Pantai Meat juga cukup memadai. Terdapat warung-warung makan sederhana yang menyajikan hidangan lokal seperti mie gomak, ikan mas bakar, serta berbagai minuman ringan. Area parkir yang memadai dan toilet umum tersedia untuk kenyamanan pengunjung. Pengelolaan kawasan yang melibatkan warga lokal secara langsung memastikan bahwa setiap rupiah yang dibelanjakan wisatawan memberikan dampak positif langsung bagi perekonomian masyarakat Desa Meat.',
                        'jam_operasional' => '06:00 - 18:00 WIB',
                        'harga_tiket' => 'Rp 5.000',
                        'tags' => ['Pantai', 'Santai', 'Keluarga', 'Spot Foto'],
                        'foto' => 'image/meat/meat.jpeg'
                    ],

                    'homestay-meat' => [
                        'id' => 2,
                        'nama' => 'Homestay Meat',
                        'slug' => 'homestay-meat',
                        'kategori' => 'buatan',
                        'lokasi' => 'Desa Meat, Kec. Tampahan',
                        'deskripsi' => 'Homestay Meat menawarkan pengalaman menginap yang otentik di tengah kehidupan nyata masyarakat Batak Toba. Dikelola langsung oleh keluarga-keluarga warga Desa Meat, penginapan berbasis komunitas ini hadir dengan pemandangan sawah terasering dan Danau Toba dari jendela kamar, suasana kekeluargaan yang hangat, serta kesempatan langka untuk merasakan keseharian, tradisi, dan kuliner autentik Batak dari jarak terdekat.',
                        'deskripsi_lengkap' => 'Homestay Meat adalah konsep penginapan berbasis komunitas (community-based tourism) yang dikelola secara langsung oleh keluarga-keluarga asli warga Desa Meat, Kecamatan Tampahan, Kabupaten Toba. Berbeda dari hotel atau resort konvensional, menginap di Homestay Meat memberikan pengalaman yang jauh lebih personal, hangat, dan otentik — sebuah kesempatan untuk benar-benar masuk ke dalam kehidupan dan budaya masyarakat Batak Toba, bukan hanya mengamatinya dari kejauhan.

Setiap unit homestay merupakan rumah tinggal aktif yang dimiliki dan ditinggali oleh keluarga-keluarga Desa Meat. Kamar-kamar yang disediakan untuk tamu dijaga kebersihannya dengan baik, dilengkapi dengan tempat tidur yang nyaman, perlengkapan mandi dasar, serta fasilitas esensial yang memadai. Salah satu keunggulan terbesar dari homestay ini adalah lokasinya yang memungkinkan tamu menikmati pemandangan langsung hamparan sawah terasering hijau dan permukaan Danau Toba dari jendela atau teras kamar — sebuah view yang sulit ditandingi oleh penginapan manapun di kawasan Toba.

Pengalaman menginap di Homestay Meat dimulai sejak kedatangan. Tamu disambut dengan kehangatan dan keramahan khas orang Batak yang terkenal dengan budaya "holong" (kasih sayang) kepada tamu. Sarapan pagi disediakan oleh tuan rumah dengan menu masakan rumahan khas Batak yang lezat — mulai dari mie gomak berbumbu andaliman, nasi goreng dengan lauk ikan danau, hingga kopi dan teh hangat yang disajikan dengan pisang goreng atau ubi rebus.

Selama menginap, tamu memiliki kesempatan istimewa untuk terlibat langsung dalam kehidupan sehari-hari keluarga Batak. Mulai dari ikut serta dalam aktivitas bertani di sawah terasering, belajar memasak masakan khas Batak seperti arsik dan naniura, berpartisipasi dalam proses tenun ulos bersama ibu-ibu warga, hingga mendengarkan cerita dan filsafat hidup Batak dari para tetua yang penuh kearifan. Interaksi-interaksi ini menjadikan setiap momen menginap di Homestay Meat sebagai petualangan budaya yang tak ternilai harganya.

Bagi wisatawan yang datang berkelompok atau bersama keluarga, tersedia pilihan untuk menyewa seluruh unit dengan kapasitas yang lebih besar. Pengelola homestay juga dapat membantu mengatur berbagai paket aktivitas wisata di Desa Meat, termasuk trekking sawah, wisata danau, kunjungan ke sentra tenun ulos, hingga wisata kuliner. Dengan harga yang sangat terjangkau untuk standar wisata Toba, Homestay Meat menjadi pilihan cerdas bagi pelancong yang ingin mendapatkan pengalaman terbaik tanpa harus mengeluarkan biaya besar.',
                        'jam_operasional' => '24 Jam',
                        'harga_tiket' => 'Rp 150.000 - Rp 300.000 / malam',
                        'tags' => ['Homestay', 'Budaya', 'Penginapan', 'Ramah'],
                        'foto' => 'image/meat/meat1.jpeg'
                    ],

                    'jalur-trekking-sawah' => [
                        'id' => 3,
                        'nama' => 'Jalur Trekking Sawah',
                        'slug' => 'jalur-trekking-sawah',
                        'kategori' => 'buatan',
                        'lokasi' => 'Desa Meat, Kec. Tampahan',
                        'deskripsi' => 'Jalur Trekking Sawah Desa Meat mengajak wisatawan berjalan kaki menyusuri jalur setapak yang membelah hamparan sawah terasering ikonik dengan pemandangan Danau Toba yang spektakuler di setiap tikungan. Lebih dari sekadar aktivitas fisik, trekking ini adalah perjalanan meresapi ketenangan alam, mengenal sistem pertanian tradisional Batak, dan menikmati udara segar pegunungan Toba yang menyegarkan jiwa dan raga.',
                        'deskripsi_lengkap' => 'Jalur Trekking Sawah Desa Meat adalah pengalaman wisata aktif yang memadukan keindahan alam, olahraga ringan, dan edukasi pertanian dalam satu paket perjalanan yang menyenangkan. Jalur ini dirancang khusus oleh pengelola wisata desa untuk memandu wisatawan melewati kawasan persawahan terasering yang menjadi kebanggaan dan ikon Desa Meat, dengan pemandangan Danau Toba sebagai latar belakang yang tak pernah bosan dipandang.

Jalur trekking dimulai dari pintu masuk kawasan wisata Desa Meat dan melewati beberapa segmen persawahan terasering dengan ketinggian yang bervariasi. Total panjang jalur mencapai sekitar 2 hingga 3 kilometer dengan tingkat kesulitan yang tergolong mudah hingga sedang — cocok untuk semua usia, termasuk anak-anak dan lansia yang masih aktif bergerak. Jalur telah ditata dengan aman menggunakan patok penanda arah, papan informasi di titik-titik penting, serta beberapa jembatan kayu sederhana untuk melewati area sawah yang lebih basah.

Selama perjalanan, pemandangan yang tersaji sungguh luar biasa. Hamparan petak-petak sawah terasering yang tersusun rapi mengikuti kontur bukit menciptakan pola geometris alami yang memukau — terutama di musim tanam ketika padi masih hijau segar, atau di musim panen ketika warna kuning keemasan mendominasi pemandangan. Di balik sawah, permukaan Danau Toba yang luas biru membentang hingga ke horizon, dengan Pulau Samosir yang tampak samar di kejauhan. Panorama ini telah membuat banyak wisatawan terpesona dan menyebutnya sebagai salah satu pemandangan terindah yang pernah mereka saksikan di Sumatera Utara.

Sepanjang jalur, wisatawan berkesempatan berinteraksi langsung dengan para petani Desa Meat yang sedang mengerjakan sawah mereka. Petani-petani ini dengan ramah menceritakan sistem pertanian tradisional yang mereka terapkan — mulai dari cara memilih bibit padi unggul, teknik irigasi sawah terasering yang telah diwariskan turun-temurun, hingga ritual-ritual adat yang biasanya dilakukan sebelum masa tanam dan panen dimulai. Interaksi autentik ini memberikan dimensi budaya yang memperkaya pengalaman trekking secara keseluruhan.

Di beberapa titik sepanjang jalur terdapat area peristirahatan dengan bangku kayu dan atap sederhana yang memungkinkan wisatawan untuk beristirahat sejenak, menikmati pemandangan, atau mengabadikan momen dengan kamera. Waktu terbaik untuk melakukan trekking adalah di pagi hari antara pukul 06.30 hingga 09.00 WIB — ketika udara masih sangat sejuk, cahaya pagi menghadirkan efek pencahayaan yang indah di antara petak sawah, dan aktivitas para petani mulai terlihat sibuk. Alternatif lainnya adalah sore hari antara pukul 15.00 hingga 17.30 WIB untuk menikmati cahaya golden hour yang dramatis sebelum matahari terbenam di atas Danau Toba.',
                        'jam_operasional' => '06:00 - 18:00 WIB',
                        'harga_tiket' => 'Gratis',
                        'tags' => ['Trekking', 'Sawah Terasering', 'Panorama', 'Olahraga'],
                        'foto' => 'image/destinasi/buatan3.jpg'
                    ]
                ]
            ]
        ];

        // Ambil data berdasarkan slug
        $item = $dataDestinasi[$kategori]['items'][$slug] ?? null;

        if (!$item) {
            abort(404);
        }

        $foto = $item['foto'];

        $destinasi = (object)[
            'id'               => $item['id'],
            'nama'             => $item['nama'],
            'slug'             => $slug,
            'kategori'         => $kategori,
            'lokasi'           => $item['lokasi'],
            'deskripsi'        => $item['deskripsi'],
            'deskripsi_lengkap'=> $item['deskripsi_lengkap'],
            'gambar'           => $foto,
            'gambar_hero'      => $foto,
            'galeri'           => [$foto],
            'jam_operasional'  => $item['jam_operasional'],
            'harga_tiket'      => $item['harga_tiket'],
            'tags'             => $item['tags']
        ];

        return view('destinasi.detail', compact('destinasi'));
    }
}
