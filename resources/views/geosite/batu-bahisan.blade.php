<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Batu Bahisan - Geosite Danau Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/batu-bahisan.css') }}">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="[GANTI_LINK_BENDERA]" alt="Bendera" class="flag-img">
            <div class="logo-divider"></div>
            <img src="[GANTI_LINK_DEL]" alt="D el" class="del-img">
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

<!-- SEJARAH DENGAN LAYOUT 2 KOLOM BERSILANG -->
<section id="sejarah" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Sejarah & Legenda</h2>
            <div class="divider"></div>
        </div>
        
        <div class="sejarah-intro" style="margin-bottom: 50px; line-height: 1.8; color: #444; font-size: 0.95rem;">
            <p>
        
                Batu Basiha merupakan salah satu geosite paling istimewa di Kabupaten Toba Samosir (Tobasa), Sumatera Utara, yang berlokasi di Desa Aek Bolon Jae, Kecamatan Balige. Tempat ini bukan hanya sekadar formasi batu biasa, tetapi merupakan manifestasi fisik dari keajaiban geologi dan kearifan lokal masyarakat Batak yang telah dipercayai dan dihormati selama berabad-abad. Batu Basiha telah mendapatkan pengakuan internasional sebagai salah satu dari 16 geosite yang diakui oleh UNESCO pada 7 Juli 2020, menjadikan Danau Toba sebagai UNESCO Global Geopark, sebuah penghargaan bergengsi untuk kawasan dengan nilai geologi dan kebudayaan yang luar biasa.
            </p>
            <p>
                Nama "Batu Basiha" berasal dari bahasa Batak "Batu Sian Hau" yang berarti "batu dari kayu", mencerminkan bentuk unik formasi batuan ini yang menyerupai batang kayu yang telah membatu. Batu Basiha terbentuk dari proses geologis letusan Gunung Api Toba ratusan ribu tahun lalu, di mana magma yang mengalir dari kaldera Porsea membeku dan mengalami kontraksi teratur, membentuk struktur kekar kolom yang sangat khas. Kolom-kolom vertikal alami berukuran besar ini menciptakan sebuah pemandangan yang menakjubkan dan menjadi bukti nyata aktivitas vulkanik purba di Danau Toba. Batuan andesit yang kaya silika ini telah menjadi sumber pembelajaran bagi para peneliti geologi dari seluruh dunia.
            </p>
            <p>
                Selain nilai geologisnya, Batu Basiha memiliki makna spiritual dan budaya yang sangat penting bagi masyarakat Batak setempat. Menurut cerita turun-temurun, batu ini dipercayai sebagai tempat di mana roh leluhur hadir dalam bentuk harimau untuk memberikan pertanda dan nasihat. Batu Basiha telah lama dimanfaatkan sebagai tempat bermusyawarah dan mengambil keputusan penting bagi masyarakat. Keberadaannya mencerminkan kearifan lokal tentang konservasi lingkungan dan pentingnya musyawarah dalam kehidupan kolektif. Hingga saat ini, Batu Basiha tetap menjadi simbol harmoni antara kekuatan alam, nilai budaya, dan kebijaksanaan leluhur masyarakat Batak.
            </p>
        </div>
        
        <div class="sejarah-grid">
            <!-- Sejarah 1: Legenda Kayu Disambar Petir -->
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="/image/meat/batu-bahisan.jpg" alt="Batu Basiha Legenda">
                </div>
                <div class="sejarah-text">
                    <h4 style="color: var(--blue-dark); margin-bottom: 12px; font-family: 'Cormorant Garamond', serif;">Legenda "Batu Sian Hau" (Batu dari Kayu)</h4>
                    <p>Nama "Batu Basiha" berasal dari bahasa Batak "Batu Sian Hau" yang berarti "batu dari kayu". Cerita turun temurun menceritakan bahwa dahulu ada sekelompok orang yang hendak membangun rumah dan pemukiman dengan menebang pohon-pohon besar di kawasan ini. Namun, seekor harimau misterius muncul memberikan peringatan kepada mereka. Mengabaikan peringatan tersebut, petir menyambar pohon secara ajaib dan mengubahnya menjadi batu, mencegah siapa pun untuk menebang kayu dan membangun di sini sejak saat itu.</p>
                </div>
            </div>
            <!-- Sejarah 2: Geologi Struktur Kekar Kolom -->
            <div class="sejarah-item reverse" data-aos="fade-left">
                <div class="sejarah-image">
                    <img src="/image/meat/batu-bahisan.jpg" alt="Batu Basiha Geologi">
                </div>
                <div class="sejarah-text">
                    <h4 style="color: var(--blue-dark); margin-bottom: 12px; font-family: 'Cormorant Garamond', serif;">Formasi Geologis: Struktur Kekar Kolom</h4>
                    <p>Batu Basiha terbentuk dari proses geologis letusan Gunung Api Toba ratusan tahun lalu. Magma yang mengalir dari kaldera Porsea membeku dan mengalami kontraksi teratur, membentuk struktur kekar kolom yang khas. Kolom-kolom vertikal alami berukuran besar ini menyerupai garis-garis fosil kayu. Batuan jenis andesit ini kaya silika dan merupakan bukti nyata aktivitas vulkanik purba di Danau Toba.</p>
                </div>
            </div>
            <!-- Sejarah 3: Tempat Musyawarah dan Kearifan Lokal -->
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="/image/meat/batu-bahisan.jpg" alt="Batu Basiha Spiritual">
                </div>
                <div class="sejarah-text">
                    <h4 style="color: var(--blue-dark); margin-bottom: 12px; font-family: 'Cormorant Garamond', serif;">Tempat Musyawarah dan Kearifan Leluhur</h4>
                    <p>Batu Basiha dimanfaatkan sebagai tempat bermusyawarah dan mengambil keputusan penting bagi masyarakat. Mereka mempercayai bahwa roh leluhur hadir di sekitar batu ini dalam bentuk harimau untuk memberikan pertanda dan nasihat. Keberadaannya mencerminkan kearifan lokal tentang konservasi lingkungan dan nilai penting musyawarah dalam kehidupan kolektif masyarakat Batak.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- INFORMASI PRAKTIS -->
<section id="informasi" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Informasi Praktis</h2>
            <div class="divider"></div>
        </div>
        <div class="sejarah-grid">
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image"><img src="/image/meat/batu-bahisan.jpg" alt="Lokasi"></div>
                <div class="sejarah-text">
                    <h4 style="color: var(--blue-dark); margin-bottom: 12px; font-family: 'Cormorant Garamond', serif;">Pengakuan UNESCO Global Geopark</h4>
                    <p>Batu Basiha adalah salah satu dari 16 geosite yang telah diakui Dewan Eksekutif UNESCO pada 7 Juli 2020. Pengakuan ini menjadikan Danau Toba sebagai UNESCO Global Geopark, tempat yang menarik bagi penelitian geologi internasional. Status ini menegaskan nilai geologi dan kebudayaan yang luar biasa dari kawasan ini.</p>
                </div>
            </div>
            <div class="sejarah-item reverse" data-aos="fade-left">
                <div class="sejarah-image"><img src="/image/meat/batu-bahisan.jpg" alt="Wisata"></div>
                <div class="sejarah-text">
                    <h4 style="color: var(--blue-dark); margin-bottom: 12px; font-family: 'Cormorant Garamond', serif;\">Ekowisata dan Agrowisata</h4>
                    <p>Pemerintah setempat telah mengembangkan kawasan sekitar Batu Basiha menjadi lokasi ekowisata dan agrowisata. Pengunjung dapat menikmati keindahan alam, belajar tentang geologi vulkanik, dan merasakan kearifan lokal masyarakat Batak dalam pengelolaan sumber daya alam secara berkelanjutan.</p>
                </div>
            </div>
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image"><img src="/image/meat/batu-bahisan.jpg" alt="Balige"></div>
                <div class="sejarah-text">
                    <h4 style="color: var(--blue-dark); margin-bottom: 12px; font-family: 'Cormorant Garamond', serif;\">Balige: Jantung Peradaban Toba</h4>
                    <p>Balige adalah salah satu pusat peradaban Toba dengan warisan kolonial, tinggalan budaya, dan Museum Batak TB Silalahi yang memiliki koleksi terlengkap mengenai kebudayaan Toba. Mengunjungi Balige seperti membaca kitab besar tentang Toba, di mana setiap lembah, batu, dan gua menyimpan cerita tak terhingga.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container" data-aos="fade-up">
        <h3>Jelajahi Keajaiban Batu Basiha</h3>
        <div class="divider"></div>
        <p>Warisan Geologi Toba, Kearifan Lokal, dan Pengakuan UNESCO Global Geopark</p>
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