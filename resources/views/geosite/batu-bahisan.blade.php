<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Batu Basiha - Geosite Danau Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/batu-bahisan.css') }}">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD..." alt="Bendera" class="flag-img">
            <div class="logo-divider"></div>
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJ..." alt="Del" class="del-img">
            <div class="logo-divider"></div>
            <div class="logo-text">
                <h4>GEOTOBA</h4>
                <p>Geopark Danau Toba</p>
            </div>
        </div>
        <div class="nav-menu">
            <a href="{{ url('/') }}" class="nav-link home-btn">Home</a>
            <a href="#sejarah" class="nav-link">Sejarah</a>
            <a href="#informasi" class="nav-link">Informasi</a>
        </div>
        <div class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </div>
    </div>
</div>

<!-- Mobile Menu -->
<div class="mobile-overlay" id="mobileOverlay">
    <div class="mobile-close" id="mobileClose">×</div>
    <a href="{{ url('/') }}" class="mobile-link mobile-home">Home</a>
    <a href="#sejarah" class="mobile-link">Sejarah</a>
    <a href="#informasi" class="mobile-link">Informasi</a>
</div>

<!-- HERO -->
<section class="hero">
    <div data-aos="fade-up">
        <h1 class="hero-title">BATU BASIHA</h1>
        <p class="hero-subtitle">Desa Aek Bolon Jae · Balige · UNESCO Global Geopark</p>
    </div>
</section>

<!-- SEJARAH -->
<section id="sejarah" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Sejarah & Legenda</h2>
            <div class="divider"></div>
        </div>

        <!-- Paragraf Pengantar -->
        <div class="sejarah-intro" style="margin-bottom: 50px; line-height: 1.9; color: #444; font-size: 0.95rem;">
            <p style="margin-bottom: 1.2rem;">
                Geosite Batu Basiha adalah bebatuan yang berada di <strong>Desa Aek Bolon Jae, Kecamatan Balige, Kabupaten Toba, Provinsi Sumatera Utara</strong>. 
                Situs ini merupakan salah satu peninggalan sejarah yang terbentuk dari <strong>pecahan batu akibat letusan Gunung Api Toba</strong> yang terjadi sekitar 
                <strong>74.000 tahun lalu</strong> — salah satu letusan supervolcano terdahsyat dalam sejarah bumi.
            </p>
            <p style="margin-bottom: 1.2rem;">
                Batu Basiha merupakan <strong>satu di antara 16 geosite</strong> yang telah diakui Dewan Eksekutif 
                <em>United Nations Educational, Scientific and Cultural Organization</em> (UNESCO) pada <strong>7 Juli 2020</strong>, 
                menjadikan Danau Toba sebagai anggota resmi <strong>UNESCO Global Geopark</strong>. 
                Pengakuan ini menempatkan Batu Basiha sebagai warisan geologi bertaraf internasional yang wajib dijaga kelestariannya.
            </p>
            <p>
                Formasi batuan ini berupa <strong>batuan andesit kekar kolom horizontal</strong> — tumpukan batu berbentuk balok besar 
                yang tersusun rapi dengan variasi bentuk yang menakjubkan. Secara ilmiah, batuan ini terbentuk dari magma yang membeku 
                dan mengalami kontraksi teratur pasca letusan purba Gunung Toba, menciptakan struktur kekar kolom yang menjadi 
                objek pembelajaran geologi dari para peneliti di seluruh dunia. Situs ini berlokasi di <strong>Perbukitan Sibodiala, Desa Aek Bolon</strong>.
            </p>
        </div>

        <!-- Kartu Fakta Singkat -->
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:1.2rem; margin-bottom:3.5rem;">
            <div style="background:#f0f7f9; border-left:4px solid #1a5f7a; padding:1.2rem; border-radius:8px;">
                <i class="fas fa-map-marker-alt" style="color:#1a5f7a; margin-bottom:.5rem; display:block; font-size:1.2rem;"></i>
                <h4 style="margin:0 0 .3rem; font-size:.95rem;">Lokasi</h4>
                <p style="margin:0; font-size:.88rem; color:#555;">Desa Aek Bolon Jae, Kecamatan Balige, Kabupaten Toba, Sumatera Utara</p>
            </div>
            <div style="background:#f0f7f9; border-left:4px solid #1a5f7a; padding:1.2rem; border-radius:8px;">
                <i class="fas fa-globe" style="color:#1a5f7a; margin-bottom:.5rem; display:block; font-size:1.2rem;"></i>
                <h4 style="margin:0 0 .3rem; font-size:.95rem;">Status UNESCO</h4>
                <p style="margin:0; font-size:.88rem; color:#555;">1 dari 16 geosite UNESCO Global Geopark, diakui 7 Juli 2020</p>
            </div>
            <div style="background:#f0f7f9; border-left:4px solid #1a5f7a; padding:1.2rem; border-radius:8px;">
                <i class="fas fa-mountain" style="color:#1a5f7a; margin-bottom:.5rem; display:block; font-size:1.2rem;"></i>
                <h4 style="margin:0 0 .3rem; font-size:.95rem;">Terbentuk</h4>
                <p style="margin:0; font-size:.88rem; color:#555;">Letusan Gunung Api Toba ~74.000 tahun lalu — batuan andesit kekar kolom horizontal</p>
            </div>
            <div style="background:#f0f7f9; border-left:4px solid #1a5f7a; padding:1.2rem; border-radius:8px;">
                <i class="fas fa-leaf" style="color:#1a5f7a; margin-bottom:.5rem; display:block; font-size:1.2rem;"></i>
                <h4 style="margin:0 0 .3rem; font-size:.95rem;">Pengembangan</h4>
                <p style="margin:0; font-size:.88rem; color:#555;">Dikembangkan sebagai kawasan ekowisata dan agrowisata oleh Pemkab Toba</p>
            </div>
        </div>

        <!-- Blok Sejarah: Layout Bersilang -->
        <div class="sejarah-grid">

            <!-- 1: Asal-usul Nama & Legenda -->
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/batu-bahisan.jpg') }}" alt="Batu Basiha - Asal Usul Nama">
                </div>
                <div class="sejarah-text">
                    <h4 style="color: var(--blue-dark); margin-bottom: 12px; font-family: 'Cormorant Garamond', serif; font-size:1.2rem;">
                        Legenda <em>"Batu Sian Hau"</em> — Batu dari Kayu
                    </h4>
                    <p>
                        Nama <strong>Batu Basiha</strong> diambil dari bahasa Batak, yaitu <em>"Batu Sian Hau"</em> yang berarti <strong>"batu dari kayu"</strong>. 
                        Menurut penuturan Tokoh Adat Desa Aek Bolon, Timbul Napitupulu, nama ini merujuk pada cerita turun-temurun 
                        yang dipercaya masyarakat selama berabad-abad.
                    </p>
                    <p>
                        Berdasarkan mitologi masyarakat setempat, bebatuan yang bertumpuk di lokasi ini dahulu merupakan 
                        <strong>tumpukan kayu milik leluhur bernama Oppung Manggak Napitupulu</strong>, yang dipersiapkan untuk membangun 
                        sebuah rumah adat Batak. Sebelum pembangunan dimulai, seekor <strong>harimau misterius</strong> muncul memberikan 
                        peringatan agar nenek moyang tidak membangun rumah di tempat tersebut — namun peringatan itu diabaikan. 
                        Akhirnya petir menyambar tumpukan kayu tersebut, dan secara ajaib mengubahnya menjadi batu seketika.
                    </p>
                    <p>
                        Kisah ini kemudian dipercaya oleh segenap warga Aek Bolon dan terus dilestarikan secara turun-temurun. 
                        Kepala Desa Aek Bolon, Dapot Simanjuntak, menyebutkan bahwa sebagian besar masyarakat meyakini 
                        mitos ini sebagai <strong>peringatan untuk menjaga alam dan tidak merusak lingkungan</strong>.
                    </p>
                </div>
            </div>

            <!-- 2: Nilai Geologi -->
            <div class="sejarah-item reverse" data-aos="fade-left">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/batubasiha1.png') }}" alt="Batuan Andesit Kekar Kolom Batu Basiha">
                </div>
                <div class="sejarah-text">
                    <h4 style="color: var(--blue-dark); margin-bottom: 12px; font-family: 'Cormorant Garamond', serif; font-size:1.2rem;">
                        Warisan Geologi: Bukti Letusan Purba Gunung Toba
                    </h4>
                    <p>
                        Secara ilmiah, Batu Basiha adalah <strong>bukti nyata letusan maha dahsyat Gunung Api Toba</strong> yang terjadi 
                        sekitar <strong>74.000 tahun yang lalu</strong>. Letusan supervolcano ini merupakan salah satu yang terbesar 
                        dalam sejarah bumi dan membentuk Kaldera Toba — cekungan raksasa yang kini menjadi Danau Toba.
                    </p>
                    <p>
                        Formasi batuan di lokasi ini berupa <strong>batuan andesit kekar kolom horizontal</strong> — tumpukan balok batu 
                        besar yang tersusun rapi dengan variasi bentuk yang unik. Struktur kekar kolom ini terbentuk dari 
                        magma yang mengalir keluar saat letusan, kemudian membeku perlahan dan mengalami kontraksi teratur, 
                        menciptakan pola retakan geometris yang khas dan langka. Batu Basiha berada di <strong>Perbukitan Sibodiala</strong>, 
                        menjadikannya salah satu situs geologi paling menarik di kawasan Danau Toba.
                    </p>
                    <p>
                        Keunikan geologis ini selaras dengan keanekaragaman hayati dan kebudayaan masyarakat sekitarnya, 
                        memperkuat posisi Batu Basiha sebagai geosite dengan nilai multidimensi — geologi, ekologi, dan budaya.
                    </p>
                </div>
            </div>

            <!-- 3: Pengakuan UNESCO & Pengembangan -->
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/batubasiha2.jpg') }}" alt="Batu Basiha UNESCO Global Geopark">
                </div>
                <div class="sejarah-text">
                    <h4 style="color: var(--blue-dark); margin-bottom: 12px; font-family: 'Cormorant Garamond', serif; font-size:1.2rem;">
                        Pengakuan UNESCO Global Geopark & Pengembangan Wisata
                    </h4>
                    <p>
                        Batu Basiha secara resmi telah diakui sebagai <strong>satu dari 16 geosite</strong> dalam kawasan Danau Toba 
                        oleh Dewan Eksekutif UNESCO pada <strong>7 Juli 2020</strong>. Pengakuan ini menjadikan Danau Toba sebagai 
                        <strong>UNESCO Global Geopark</strong> — sebuah penghargaan bergengsi bagi kawasan dengan nilai geologi, 
                        kebudayaan, dan keanekaragaman hayati yang luar biasa.
                    </p>
                    <p>
                        Kepala Dinas Pariwisata dan Kebudayaan Kabupaten Toba, <strong>Jhon Piter Silalahi</strong>, menyatakan bahwa 
                        pemerintah kabupaten akan mengembangkan Geosite Batu Basiha dan kawasan sekitarnya menjadi 
                        <strong>lokasi ekowisata dan agrowisata</strong>. 
                        <em>"Di sana ada sawah, ada juga kehidupan sehari-hari masyarakat. Jadi, ini akan digabungkan dengan 
                        agrowisata maupun ekowisata yang ada di sana,"</em> kata Jhon Piter.
                    </p>
                    <p>
                        Sebagai bagian dari pengembangan, pemerintah daerah juga telah membangun <strong>jalan setapak menuju 
                        kawasan Geosite Batu Basiha</strong> untuk memudahkan akses wisatawan. Warisan geologi yang dulunya hanya 
                        dikenal dalam lingkup lokal, kini terbuka bagi wisatawan nusantara maupun mancanegara.
                    </p>
                </div>
            </div>

        </div>

        <!-- Kotak Nilai Kesakralan -->
        <div style="background:#fdf8f0; border:1px solid #d4a853; border-radius:12px; padding:2rem; margin-top:1.5rem;" data-aos="fade-up">
            <h3 style="margin:0 0 1rem; color:#8b6914; font-family:'Cormorant Garamond',serif; font-size:1.2rem;">
                <i class="fas fa-star" style="margin-right:.5rem;"></i>
                Situs Keramat yang Disakralkan Masyarakat
            </h3>
            <p style="margin:0; color:#555; line-height:1.8; font-size:.94rem;">
                Batu Basiha bukan sekadar formasi batuan biasa. Situs ini merupakan <strong>lokasi keramat yang sangat disakralkan 
                masyarakat setempat secara turun-temurun hingga saat ini</strong>. Mitos tentang harimau dan petir yang mengubah kayu 
                menjadi batu telah menjadi warisan lisan yang hidup dan terus dilestarikan oleh warga Desa Aek Bolon kepada 
                anak-cucu mereka. Kepercayaan ini sekaligus mencerminkan kearifan lokal Batak dalam konservasi lingkungan — 
                bahwa alam harus dihormati dan dijaga, bukan dieksploitasi sembarangan.
            </p>
        </div>
    </div>
</section>
<!-- INFORMASI PRAKTIS -->
<section id="informasi" class="section" style="background:#f8fafe;">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Informasi Praktis</h2>
            <div class="divider"></div>
            <p style="color:#666; max-width:600px; margin:0 auto;">Panduan kunjungan ke Geosite Batu Basiha, Desa Aek Bolon, Balige</p>
        </div>

        <div class="sejarah-grid">

            <!-- Cara Menuju -->
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/batubasiha1.png') }}" alt="Akses Menuju Batu Basiha">
                </div>
                <div class="sejarah-text">
                    <h4 style="color: var(--blue-dark); margin-bottom: 12px; font-family: 'Cormorant Garamond', serif; font-size:1.15rem;">
                        <i class="fas fa-directions" style="margin-right:.4rem;"></i> Akses & Lokasi
                    </h4>
                    <p>
                        Geosite Batu Basiha terletak di <strong>Desa Aek Bolon Jae, Kecamatan Balige, Kabupaten Toba</strong> — 
                        tidak jauh dari pusat Kota Balige. Kawasan ini juga berada di area <strong>Perbukitan Sibodiala</strong>, 
                        memberikan suasana alam perbukitan yang sejuk dan asri.
                    </p>
                    <ul style="padding-left:1.2rem; color:#555; font-size:.92rem; line-height:1.8;">
                        <li>Dari pusat Kota Balige: ±10–15 menit berkendara</li>
                        <li>Dari Bandara Silangit (Sisingamangaraja XII): ±50–60 menit</li>
                        <li>Pemerintah daerah telah membangun <strong>jalan setapak</strong> menuju lokasi geosite</li>
                        <li>Tersedia area parkir di sekitar kawasan desa</li>
                    </ul>
                </div>
            </div>

            <!-- Ekowisata & Agrowisata -->
            <div class="sejarah-item reverse" data-aos="fade-left">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/batubasiha2.jpg') }}" alt="Ekowisata Agrowisata Batu Basiha">
                </div>
                <div class="sejarah-text">
                    <h4 style="color: var(--blue-dark); margin-bottom: 12px; font-family: 'Cormorant Garamond', serif; font-size:1.15rem;">
                        Ekowisata & Agrowisata
                    </h4>
                    <p>
                        Kawasan sekitar Batu Basiha dikembangkan oleh Pemerintah Kabupaten Toba menjadi 
                        <strong>destinasi ekowisata dan agrowisata</strong>. Di sekitar situs, wisatawan dapat menikmati:
                    </p>
                    <ul style="padding-left:1.2rem; color:#555; font-size:.92rem; line-height:1.8;">
                        <li>Hamparan <strong>sawah dan ladang</strong> milik masyarakat lokal</li>
                        <li>Kehidupan sehari-hari masyarakat Batak di Desa Aek Bolon</li>
                        <li>Panorama perbukitan hijau khas kawasan Danau Toba</li>
                        <li>Pembelajaran langsung tentang <strong>geologi vulkanik</strong> dari pemandu lokal</li>
                        <li>Interaksi budaya dengan masyarakat Suku Batak Toba</li>
                    </ul>
                </div>
            </div>

            <!-- Balige & Museum Batak -->
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/batu-bahisan.jpg') }}" alt="Balige Pusat Peradaban Toba">
                </div>
                <div class="sejarah-text">
                    <h4 >
                        Balige: Jantung Peradaban Toba
                    </h4>
                    <p>
                        Kunjungan ke Batu Basiha dapat dikombinasikan dengan menjelajahi <strong>Kota Balige</strong>, 
                        salah satu pusat peradaban Batak Toba dengan ragam warisan sejarah dan budaya. 
                        Di Balige terdapat <strong>Museum Batak TB Silalahi</strong> yang memiliki koleksi terlengkap tentang 
                        kebudayaan Batak Toba — mulai dari ulos, senjata tradisional, hingga dokumen sejarah.
                    </p>
                    <p>
                        Dari Balige, wisatawan juga dapat melanjutkan perjalanan ke berbagai geosite lain 
                        dalam jaringan <strong>UNESCO Global Geopark Danau Toba</strong>, seperti Bukit Tarabunga, 
                        Lumban Silintong, hingga Desa Meat yang terkenal dengan sawah terasering dan tenun ulosnya.
                    </p>
                </div>
            </div>

        </div>

        <!-- Tips Kunjungan -->
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:1.2rem; margin-top:2rem;" data-aos="fade-up">
            <div style="background:#fff; border:1px solid #e0e8f0; border-radius:10px; padding:1.2rem; box-shadow:0 2px 8px rgba(0,0,0,.05);">
                <i class="fas fa-clock" style="color:#1a5f7a; font-size:1.3rem; margin-bottom:.6rem; display:block;"></i>
                <h4 style="margin:0 0 .4rem; font-size:.95rem;">Waktu Kunjungan</h4>
                <p style="margin:0; font-size:.87rem; color:#666;">Pagi hingga sore hari. Pagi hari disarankan untuk menikmati udara segar perbukitan dan cahaya terbaik untuk fotografi.</p>
            </div>
            <div style="background:#fff; border:1px solid #e0e8f0; border-radius:10px; padding:1.2rem; box-shadow:0 2px 8px rgba(0,0,0,.05);">
                <i class="fas fa-shoe-prints" style="color:#1a5f7a; font-size:1.3rem; margin-bottom:.6rem; display:block;"></i>
                <h4 style="margin:0 0 .4rem; font-size:.95rem;">Persiapan Fisik</h4>
                <p style="margin:0; font-size:.87rem; color:#666;">Gunakan alas kaki yang nyaman. Jalan setapak menuju geosite telah dibangun oleh pemerintah daerah, namun medan perbukitan tetap memerlukan kewaspadaan.</p>
            </div>
            <div style="background:#fff; border:1px solid #e0e8f0; border-radius:10px; padding:1.2rem; box-shadow:0 2px 8px rgba(0,0,0,.05);">
                <i class="fas fa-hands" style="color:#1a5f7a; font-size:1.3rem; margin-bottom:.6rem; display:block;"></i>
                <h4 style="margin:0 0 .4rem; font-size:.95rem;">Hormati Adat Setempat</h4>
                <p style="margin:0; font-size:.87rem; color:#666;">Batu Basiha adalah situs keramat. Harap bersikap sopan, tidak membuang sampah, dan tidak merusak formasi batuan yang merupakan warisan tak ternilai.</p>
            </div>
            <div style="background:#fff; border:1px solid #e0e8f0; border-radius:10px; padding:1.2rem; box-shadow:0 2px 8px rgba(0,0,0,.05);">
                <i class="fas fa-camera" style="color:#1a5f7a; font-size:1.3rem; margin-bottom:.6rem; display:block;"></i>
                <h4 style="margin:0 0 .4rem; font-size:.95rem;">Fotografi</h4>
                <p style="margin:0; font-size:.87rem; color:#666;">Formasi batu balok andesit yang tersusun rapi menawarkan latar foto yang unik dan langka. Kombinasikan dengan pemandangan perbukitan dan sawah sekitarnya.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container" data-aos="fade-up">
        <h3>Jelajahi Keajaiban Batu Basiha</h3>
        <div class="divider"></div>
        <p>Warisan Geologi 74.000 Tahun — Diakui UNESCO Global Geopark · Desa Aek Bolon, Balige</p>
        <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
    </div>
</section>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
    <div class="lightbox-close" onclick="closeLightbox()">×</div>
    <img id="lightboxImg">
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 700, once: true, offset: 50 });

    // Hamburger Menu
    const hamburger = document.getElementById('hamburger');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const mobileClose = document.getElementById('mobileClose');

    hamburger.addEventListener('click', () => {
        mobileOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

    const closeMenu = () => {
        mobileOverlay.classList.remove('active');
        document.body.style.overflow = '';
    };

    mobileClose.addEventListener('click', closeMenu);
    document.querySelectorAll('.mobile-link').forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    // Active link on scroll
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link:not(.home-btn), .mobile-link:not(.mobile-home)');
    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const top = section.offsetTop - 100;
            if (scrollY >= top) current = section.getAttribute('id');
        });
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) link.classList.add('active');
        });
    });

    // Lightbox
    const lightbox = document.getElementById('lightbox');
    document.querySelectorAll('.galeri-item img').forEach(img => {
        img.addEventListener('click', () => {
            lightbox.classList.add('active');
            document.getElementById('lightboxImg').src = img.src;
        });
    });
    function closeLightbox() { lightbox.classList.remove('active'); }
    lightbox.addEventListener('click', (e) => { if (e.target === lightbox) closeLightbox(); });

    // Smooth scroll
    document.querySelectorAll('.nav-link[href^="#"], .mobile-link[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) target.scrollIntoView({ behavior: 'smooth' });
        });
    });
</script>
</body>
</html>