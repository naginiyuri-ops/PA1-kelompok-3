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
            <a href="#galeri" class="nav-link">Galeri</a>
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
    <a href="#galeri" class="mobile-link">Galeri</a>
</div>

<!-- HERO -->
<section class="hero">
    <div data-aos="fade-up">
        <h1 class="hero-title">BATU BAHISAN</h1>
        <p class="hero-subtitle">Pulau Sibandang · Danau Toba</p>
    </div>
</section>

<!-- SEJARAH DENGAN LAYOUT 2 KOLOM BERSILANG -->
<section id="sejarah" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Sejarah</h2>
            <div class="divider"></div>
        </div>
        <div class="sejarah-grid">
            <!-- Sejarah 1: Gambar Kiri, Teks Kanan -->
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="/image/batu/sejarah1.jpg" alt="Batu Bahisan 1">
                </div>
                <div class="sejarah-text">
                    <p>Batu Bahisan berasal dari kata "bahis" yang berarti "tajam" dalam bahasa Batak. Batu-batu besar ini dipercaya sebagai bekas perlengkapan perang para raja Batak zaman dahulu. Konon, batu-batu ini digunakan sebagai senjata dan alat pertahanan oleh para prajurit kerajaan.</p>
                </div>
            </div>
            <!-- Sejarah 2: Gambar Kanan, Teks Kiri -->
            <div class="sejarah-item reverse" data-aos="fade-left">
                <div class="sejarah-image">
                    <img src="/image/batu/sejarah2.jpg" alt="Batu Bahisan 2">
                </div>
                <div class="sejarah-text">
                    <p>Menurut cerita turun temurun, batu-batu ini terbentuk dari letusan gunung berapi purba dan mengalami erosi selama ribuan tahun hingga membentuk formasi yang unik seperti sekarang. Proses alam yang panjang ini menciptakan keindahan geologi yang luar biasa.</p>
                </div>
            </div>
            <!-- Sejarah 3: Gambar Kiri, Teks Kanan -->
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="/image/batu/sejarah3.jpg" alt="Batu Bahisan 3">
                </div>
                <div class="sejarah-text">
                    <p>Masyarakat setempat menggunakan kawasan ini sebagai tempat ritual adat untuk meminta keselamatan dan hasil panen yang melimpah. Hingga kini, Batu Bahisan menjadi destinasi favorit bagi wisatawan yang ingin menikmati keindahan alam dan nilai sejarahnya.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- GALERI (TANPA TAB) -->
<section id="galeri" class="section bg-light">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Galeri</h2>
            <div class="divider"></div>
            <p>Keindahan Batu Bahisan</p>
        </div>
        <div class="galeri-grid" id="galeriGrid">
            <div class="galeri-item"><img src="/image/batu/galeri1.jpg" alt="Batu Bahisan 1"></div>
            <div class="galeri-item"><img src="/image/batu/galeri2.jpg" alt="Batu Bahisan 2"></div>
            <div class="galeri-item"><img src="/image/batu/galeri3.jpg" alt="Batu Bahisan 3"></div>
            <div class="galeri-item"><img src="/image/batu/galeri4.jpg" alt="Batu Bahisan 4"></div>
            <div class="galeri-item"><img src="/image/batu/galeri5.jpg" alt="Batu Bahisan 5"></div>
            <div class="galeri-item"><img src="/image/batu/galeri6.jpg" alt="Batu Bahisan 6"></div>
            <div class="galeri-item"><img src="/image/batu/galeri7.jpg" alt="Batu Bahisan 7"></div>
            <div class="galeri-item"><img src="/image/batu/galeri8.jpg" alt="Batu Bahisan 8"></div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container" data-aos="fade-up">
        <h3>Kunjungi Batu Bahisan Sekarang</h3>
        <div class="divider"></div>
        <p>Nikmati keindahan formasi batuan unik dan panorama Danau Toba yang memukau</p>
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