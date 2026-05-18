<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Meat - Geosite Danau Toba</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/meat.css') }}">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar" id="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="{{ asset('image/Logo/logobankindonesia.jpg') }}" alt="Logo">
            <div class="logo-divider"></div>
            <img src="{{ asset('image/Logo/del.jpg') }}" alt="Logo Del">
            <div class="logo-divider"></div>
            <div class="logo-text">
                <h4>GEO<span>TOBA</span></h4>
                <p>Geopark Danau Toba</p>
            </div>
        </div>
        <div class="nav-menu">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
            <a href="#sejarah" class="nav-link">Sejarah</a>
            <a href="#umkm" class="nav-link">UMKM</a>
            <a href="#penginapan" class="nav-link">Penginapan</a>
            <a href="#fasilitas" class="nav-link">Fasilitas</a>
            <a href="#lokasi" class="nav-link">Lokasi</a>
        </div>
        <button class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </button>
    </div>
</div>

<div class="mobile-overlay" id="mobileOverlay">
    <div class="mobile-close" id="mobileClose">&times;</div>
    <a href="{{ url('/') }}" class="mobile-link">Home</a>
    <a href="#sejarah" class="mobile-link">Sejarah</a>
    <a href="#umkm" class="mobile-link">UMKM</a>
    <a href="#penginapan" class="mobile-link">Penginapan</a>
    <a href="#fasilitas" class="mobile-link">Fasilitas</a>
    <a href="#lokasi" class="mobile-link">Lokasi</a>
</div>

<!-- HERO -->
<section class="hero">
    <div>
        <div class="hero-content">
            <div class="hero-badge">UNESCO Global Geopark</div>
            <h1 class="hero-title">MEAT</h1>
            <p class="hero-subtitle">Balige · Danau Toba</p>
        </div>
    </div>
</section>

<!-- SEJARAH -->
<section id="sejarah" class="section">
    <div class="container">
        <div class="section-header">
            <div class="badge">Warisan Budaya</div>
            <h2>Desa Meat<br><em>"New Zealand van Toba"</em></h2>
            <div class="divider"></div>
            <p>
                Desa Meat terletak di pesisir Danau Toba, Kecamatan Tampahan, Kabupaten Toba, Sumatera Utara — 
                dihuni lebih dari 900 jiwa dari Suku Batak Toba yang mayoritas beragama Kristen. 
                Desa ini merupakan salah satu dari 21 destinasi wisata unggulan di kawasan Danau Toba, 
                dan sering dijuluki <strong>"New Zealand van Toba"</strong> karena keindahan bentang alamnya yang dramatis dan memukau.
            </p>
        </div>

        <!-- Kartu Pengantar Singkat -->
        <div class="info-highlight-grid" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:1.2rem; margin-bottom:3rem;">
            <div class="info-highlight-card" style="background:#f0f7f4; border-left:4px solid #2d7a5e; padding:1.2rem; border-radius:8px;">
                
                <h4 style="margin:0 0 .3rem;">Penduduk</h4>
                <p style="margin:0; font-size:.9rem;">Lebih dari 900 jiwa, mayoritas Suku Batak Toba beragama Kristen</p>
            </div>
            <div class="info-highlight-card" style="background:#f0f7f4; border-left:4px solid #2d7a5e; padding:1.2rem; border-radius:8px;">
                <h4 style="margin:0 0 .3rem;">Akses Bandara</h4>
                <p style="margin:0; font-size:.9rem;">±40 menit dari Bandara Sisingamangaraja XII (Silangit)</p>
            </div>
            <div class="info-highlight-card" style="background:#f0f7f4; border-left:4px solid #2d7a5e; padding:1.2rem; border-radius:8px;">
                <h4 style="margin:0 0 .3rem;">Jarak dari Balige</h4>
                <p style="margin:0; font-size:.9rem;">20–30 menit berkendara dari pusat Kota Balige</p>
            </div>
            <div class="info-highlight-card" style="background:#f0f7f4; border-left:4px solid #2d7a5e; padding:1.2rem; border-radius:8px;">
                <h4 style="margin:0 0 .3rem;">Status Wisata</h4>
                <p style="margin:0; font-size:.9rem;">Salah satu dari 21 destinasi wisata utama Kabupaten Toba</p>
            </div>
        </div>

        <div class="sejarah-grid">
            <!-- Panorama Alam: Amfiteater Danau Toba -->
            <div class="sejarah-item">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/meat-detail.jpg') }}" alt="Panorama Alam Desa Meat">
                </div>
                <div class="sejarah-text">
                    <h3> Amfiteater Alam yang Memukau</h3>
                    <p>
                        Desa Meat berada di posisi sangat rendah — tepat di bibir Danau Toba — dikelilingi perbukitan hijau yang menjulang di sisi belakangnya. 
                        Formasi ini menciptakan kesan seperti sebuah <em>amfiteater alam</em> raksasa. 
                        Memandang ke sebelah kiri, pengunjung akan melihat hamparan <strong>sawah terasering</strong> yang tersusun rapi mengikuti kontur bukit, 
                        mirip dengan pemandangan di Bali. Memandang ke sebelah kanan, keindahan biru Danau Toba terbentang luas.
                    </p>
                    <p>
                        Gradasi warna hijaunya perbukitan, kuning keemasan hamparan sawah, dan birunya air danau yang tenang menjadikan Desa Meat 
                        sebagai salah satu <em>spot foto terbaik</em> di Kabupaten Toba. Pasir putih di tepi danau tersedia untuk wisatawan 
                        yang ingin bermain dan berenang, sementara hembusan angin danau dan kicauan burung melengkapi suasana alam yang autentik.
                    </p>
                </div>
            </div>

            <!-- Sentra Tenun Ulos -->
            <div class="sejarah-item reverse">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/slide1.jpg') }}" alt="Penenun Ulos Desa Meat">
                </div>
                <div class="sejarah-text">
                    <h3>  Sentra Tenun Ulos yang Autentik</h3>
                    <p>
                        Desa Meat dikenal sebagai salah satu <strong>sentra pengrajin Ulos Batak</strong> terbaik di kawasan Danau Toba. 
                        Sebagian besar perempuan desa adalah penenun yang mewarisi keahlian ini secara turun-temurun. 
                        Di sela-sela menikmati pemandangan, wisatawan dapat menyaksikan langsung para <em>Inang</em> (ibu-ibu) 
                        yang menenun kain Ulos secara tradisional menggunakan alat tenun kayu (<em>gedokan</em>) di kolong 
                        dan teras rumah adat Batak (<em>Ruma Bolon</em>).
                    </p>
                    <p>
                        Karena dikerjakan seluruhnya secara tradisional, satu lembar kain Ulos membutuhkan waktu pembuatan 
                        <strong>sekitar satu minggu penuh</strong>. Salah satu jenis Ulos paling sakral yang diproduksi di Desa Meat adalah 
                        <strong>Ulos Ragi Hotang</strong>, yang digunakan dalam upacara pernikahan adat Batak. 
                        Pengunjung dapat belajar tentang filosofi motif Ulos dan membeli langsung sebagai oleh-oleh bernilai seni tinggi.
                    </p>
                </div>
            </div>

            <!-- Rumah Adat Batak -->
            <div class="sejarah-item">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/meat-hero.jpg') }}" alt="Rumah Adat Batak Desa Meat">
                </div>
                <div class="sejarah-text">
                    <h3>  Arsitektur <em>Jabu Bolon</em> yang Terjaga</h3>
                    <p>
                        Di Desa Meat terdapat <strong>4 unit rumah adat Batak Toba</strong> yang dikenal dengan nama <em>Jabu Bolon</em> (Ruma Bolon). 
                        Keempat rumah adat ini telah direnovasi oleh <strong>Kementerian Pariwisata</strong> untuk keperluan wisata budaya, 
                        namun tetap berfungsi sebagai hunian aktif. Keberadaannya mencerminkan komitmen masyarakat lokal dalam 
                        menjaga identitas budaya Batak di tengah arus modernisasi.
                    </p>
                    <p>
                        Selain menjadi objek wisata budaya, Desa Meat juga merupakan salah satu <strong>desa adat tertua</strong> 
                        di kawasan Toba. Di dekat kawasan pantai Pakodian terdapat <em>Batu Tuktuk Simundi</em> yang secara geologis 
                        diyakini berkaitan dengan peristiwa letusan purba Gunung Toba. 
                        Potensi keunikan geologis ini menambah nilai Desa Meat sebagai bagian dari <strong>Geopark Kaldera Toba</strong>.
                    </p>
                </div>
            </div>

        </div>

        <!-- Destinasi Camping & Festival -->
        <div class="section-header" style="margin-top:3rem;">
            <div class="badge">Aktivitas</div>
            <h2>Camping & Festival</h2>
            <div class="divider"></div>
            <p>Surga bagi pecinta alam dan petualangan</p>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:1.5rem; margin-bottom:2rem;">
            <div style="background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:1.5rem; box-shadow:0 2px 8px rgba(0,0,0,.06);">
    
                <h4">Camping Ground Tepi Danau</h4>
                <p style="margin:0; font-size:.92rem; color:#555;">
                    Pinggiran danau yang landai dan berumput menjadikan Desa Meat sebagai lokasi berkemah impian. 
                    Area camping telah dikelola dengan baik dan mampu menampung <strong>lebih dari 1.000 unit tenda</strong>. 
                    Bangun pagi hari disambut kabut tipis di atas permukaan air dan perbukitan — pengalaman tak terlupakan.
                </p>
            </div>
            <div style="background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:1.5rem; box-shadow:0 2px 8px rgba(0,0,0,.06);">
               
                <h4 style="margin:0 0 .5rem;">Festival 1.000 Tenda</h4>
                <p style="margin:0; font-size:.92rem; color:#555;">
                    Desa Meat menjadi tuan rumah <strong>Festival 1.000 Tenda</strong>, acara tahunan populer yang 
                    menggabungkan kegiatan berkemah massal, pertunjukan seni budaya Batak, dan diskusi pelestarian 
                    lingkungan Danau Toba. Festival ini menjadikan Desa Meat sebagai <em>spot foto terbaik</em> di Kabupaten Toba.
                </p>
            </div>
            <div style="background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:1.5rem; box-shadow:0 2px 8px rgba(0,0,0,.06);">
                
                <h4 style="margin:0 0 .5rem;">Spot Foto & Bird's Eye View</h4>
                <p style="margin:0; font-size:.92rem; color:#555;">
                    Jalanan aspal yang membelah persawahan menuju desa menjadi jalur favorit fotografer dan pesepeda. 
                    Jalurnya yang berkelok menuruni bukit memberikan <em>view point</em> terbaik untuk melihat 
                    keseluruhan desa, sawah terasering, dan Danau Toba dari ketinggian sekaligus.
                </p>
            </div>
        </div>

        <!-- Kuliner & Homestay -->
        <div style="background:#f8faf9; border-radius:12px; padding:2rem; margin-top:1rem;">
            <h3 style="margin:0 0 1rem; color:#2d7a5e;"> Kuliner & Penginapan Tradisional</h3>
            <p style="margin:0; color:#444; line-height:1.8;">
                Wisatawan dapat mencicipi berbagai makanan khas Batak yang disuguhkan di warung-warung tradisional yang nyaman. 
                Desa Meat sudah memiliki <strong>homestay</strong> dengan nuansa rumah tradisional Batak, memberikan pengalaman 
                menginap yang autentik di tepi Danau Toba. Posisi desa yang strategis juga memungkinkan wisatawan melanjutkan 
                perjalanan ke destinasi lain melalui <strong>perjalanan kapal di Danau Toba</strong>.
            </p>
        </div>
    </div>
</section>

<!-- UMKM -->
<section id="umkm" class="section section-light">
    <div class="container">
        <div class="section-header">
            <div class="badge">Produk Lokal</div>
            <h2>UMKM Meat</h2>
            <div class="divider"></div>
            <p>
                Ulos produksi Desa Meat dikenal memiliki kualitas benang dan kerapian tenunan yang sangat baik. 
                Beberapa jenis Ulos langka dan bernilai tinggi diproduksi oleh pengrajin lokal yang mewarisi keahlian ini turun-temurun.
            </p>
        </div>
        <div class="grid-3">
            @forelse($umkm as $item)
            <div class="card">
                @if($item->gambar && str_starts_with($item->gambar, 'data:image'))
                    <img src="{{ $item->gambar }}" class="card-img" alt="{{ $item->nama }}">
                @else
                    <div style="height:200px; background:#e2e8f0; display:flex; align-items:center; justify-content:center;">
                        <i class="fas fa-image" style="font-size:2rem; color:#94a3b8;"></i>
                    </div>
                @endif
                <div class="card-content">
                    <h3>{{ $item->nama }}</h3>
                    <p>{{ Str::limit($item->deskripsi, 90) }}</p>
                    <div class="card-location"><i class="fas fa-map-marker-alt"></i> {{ $item->lokasi ?? 'Desa Meat' }}</div>
                    <div class="card-contact"><i class="fas fa-phone"></i> {{ $item->kontak ?? 'Hubungi pengrajin' }}</div>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-store"></i>
                <p>Belum ada data UMKM</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- PENGINAPAN -->
<section id="penginapan" class="section">
    <div class="container">
        <div class="section-header">
            <div class="badge">Akomodasi</div>
            <h2>Penginapan</h2>
            <div class="divider"></div>
            <p>Tempat menginap dengan nuansa budaya Batak di tepi Danau Toba</p>
        </div>
        <div class="grid-3">
            @forelse($penginapan as $item)
            <div class="card">
                @if($item->gambar && str_starts_with($item->gambar, 'data:image'))
                    <img src="{{ $item->gambar }}" class="card-img" alt="{{ $item->nama }}">
                @else
                    <div style="height:200px; background:#e2e8f0; display:flex; align-items:center; justify-content:center;">
                        <i class="fas fa-hotel" style="font-size:2rem; color:#94a3b8;"></i>
                    </div>
                @endif
                <div class="card-content">
                    <h3>{{ $item->nama }}</h3>
                    <p>{{ Str::limit($item->deskripsi, 90) }}</p>
                    <div class="card-price"><i class="fas fa-tag"></i> {{ $item->harga ?? 'Hubungi' }}</div>
                    <div class="card-contact"><i class="fas fa-phone"></i> {{ $item->kontak ?? 'Hubungi' }}</div>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-hotel"></i>
                <p>Belum ada data penginapan</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- FASILITAS -->
<section id="fasilitas" class="section section-light">
    <div class="container">
        <div class="section-header">
            <div class="badge">Layanan</div>
            <h2>Fasilitas</h2>
            <div class="divider"></div>
            <p>Fasilitas lengkap untuk kenyamanan wisatawan di Desa Meat</p>
        </div>
        <div class="grid-2">
            @forelse($fasilitas as $item)
            <div class="fasilitas-item">
                @if($item->gambar && str_starts_with($item->gambar, 'data:image'))
                    <img src="{{ $item->gambar }}" class="fasilitas-img" alt="{{ $item->nama }}">
                @else
                    <div style="width:110px; height:110px; background:#e2e8f0; display:flex; align-items:center; justify-content:center;">
                        <i class="fas fa-tools" style="font-size:1.5rem; color:#94a3b8;"></i>
                    </div>
                @endif
                <div class="fasilitas-content">
                    <h4>{{ $item->nama }}</h4>
                    <p>{{ Str::limit($item->deskripsi, 70) }}</p>
                    <div class="fasilitas-price"><i class="fas fa-tag"></i> {{ $item->harga ?? 'Gratis' }}</div>
                </div>
            </div>
            @empty
            <div class="empty-state" style="grid-column:1/-1;">
                <i class="fas fa-tools"></i>
                <p>Belum ada data fasilitas</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- LOKASI -->
<section id="lokasi" class="section">
    <div class="container">
        <div class="section-header">
            <div class="badge">Lokasi</div>
            <h2>Cara Mencapai Desa Meat</h2>
            <div class="divider"></div>
            <p>
                Desa Meat terletak di Kecamatan Tampahan, Kabupaten Toba, Sumatera Utara. 
                Akses menuju desa cukup mudah dari pusat Kota Balige maupun dari Bandara Silangit.
            </p>
        </div>
        <div class="maps-section">
            <div class="maps-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0!2d99.0835095!3d2.3339262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0415b8f7da39%3A0xc6beb74287f355a5!2sBalige%2C%20Toba%20Samosir%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                    allowfullscreen loading="lazy">
                </iframe>
            </div>
            <div class="rute-info">
                <div class="rute-item">
                    <h4> Dari Kota Balige</h4>
                    <p>Berkendara dari pusat Kota Balige menuju Kecamatan Tampahan melalui jalan yang berkelok menuruni perbukitan. Sepanjang jalan menawarkan <em>bird's eye view</em> Danau Toba yang spektakuler.</p>
                    <span class="rute-time">± 20–30 menit</span>
                </div>
                <div class="rute-item">
                    <h4> </i> Dari Bandara Silangit</h4>
                    <p>Bandara Sisingamangaraja XII (Silangit) di Siborongborong, Tapanuli Utara, adalah pintu masuk utama ke kawasan Danau Toba. Dari sini, lanjutkan perjalanan darat menuju Desa Meat.</p>
                    <span class="rute-time">± 40 menit</span>
                </div>
                <div class="rute-item">
                    <h4>  Melalui Danau Toba</h4>
                    <p>Karena terletak di pinggiran Danau Toba, Desa Meat juga dapat dicapai atau diteruskan ke destinasi lain menggunakan kapal di Danau Toba, menjadikan posisi desa ini sangat strategis.</p>
                    <span class="rute-time">Sesuai jadwal kapal</span>
                </div>
                <div class="rute-item">
                    <h4> Catatan Perjalanan</h4>
                    <p>Jalan menuju desa cukup berkelok dan menuruni bukit dengan kemiringan cukup curam. Harap berhati-hati. Namun, kondisi jalan sudah cukup baik dan lelah perjalanan terbayar lunas oleh keindahan yang tersaji.</p>
                    <span class="rute-time">Hati-hati di turunan curam</span>
                </div>
            </div>
        </div>

        <!-- Wisata Sekitar Balige -->
        <div class="section-header" style="margin-top:3rem;">
            <div class="badge">Destinasi Terdekat</div>
            <h2>Objek Wisata di Sekitar Balige</h2>
            <div class="divider"></div>
            <p>Dari Desa Meat, Anda dapat melanjutkan perjalanan ke berbagai destinasi wisata menarik lainnya</p>
        </div>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(240px,1fr)); gap:1.2rem;">
            <div style="background:#fff; border:1px solid #e2e8f0; border-radius:10px; padding:1.2rem; box-shadow:0 2px 6px rgba(0,0,0,.05);">
            
                <h4 style="margin:0 0 .3rem;">Bukit Pahoda</h4>
                <p style="margin:0; font-size:.88rem; color:#555;">
                    Hidden gem di Desa Lumban Silintong, Balige. Populer untuk healing, camping, dan menikmati sunrise/sunset dengan panorama Danau Toba yang menakjubkan.
                </p>
            </div>
            <div style="background:#fff; border:1px solid #e2e8f0; border-radius:10px; padding:1.2rem; box-shadow:0 2px 6px rgba(0,0,0,.05);">
                
                <h4 style="margin:0 0 .3rem;">Bukit Tarabunga</h4>
                <p style="margin:0; font-size:.88rem; color:#555;">
                    Terletak di Kecamatan Tampahan, ±8 km dari pusat Balige. Menawarkan pemandangan Danau Toba dari sisi selatan, populer untuk menikmati sunset.
                </p>
            </div>
            <div style="background:#fff; border:1px solid #e2e8f0; border-radius:10px; padding:1.2rem; box-shadow:0 2px 6px rgba(0,0,0,.05);">       
                <h4 style="margin:0 0 .3rem;">Lumban Silintong</h4>
                <p style="margin:0; font-size:.88rem; color:#555;">
                    Desa wisata pantai di Kecamatan Balige dengan pasir putih dan fasilitas modern di tepian Danau Toba. Ideal untuk berbagai aktivitas wisata air.
                </p>
            </div>
            <div style="background:#fff; border:1px solid #e2e8f0; border-radius:10px; padding:1.2rem; box-shadow:0 2px 6px rgba(0,0,0,.05);">
                <h4 style="margin:0 0 .3rem;">Air Panas Sipoholon</h4>
                <p style="margin:0; font-size:.88rem; color:#555;">
                    Pemandian air panas alami di Kecamatan Sipoholon, Tapanuli Utara. Terkenal dengan sumber air panas dari bukit kapur yang instagramable.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container">
        <h3>Kunjungi Desa Meat</h3>
        <div class="divider"></div>
        <p>Rasakan pengalaman wisata budaya Batak yang autentik — alam, tradisi, dan keramahan dalam satu destinasi</p>
        <div class="cta-buttons">
            <a href="{{ url('/') }}" class="cta-btn">Kembali ke Home</a>
            <a href="#penginapan" class="cta-btn cta-btn-outline">Penginapan</a>
            <a href="#umkm" class="cta-btn cta-btn-outline">UMKM</a>
            <a href="#fasilitas" class="cta-btn cta-btn-outline">Fasilitas</a>
            <a href="#sejarah" class="cta-btn cta-btn-outline">Sejarah</a>
        </div>
    </div>
</section>

<!-- FOOTER -->

</body>
</html>