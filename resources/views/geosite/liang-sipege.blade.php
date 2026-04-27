<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Liang Sipege - Geosite Danau Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f0f4f3; }

        /* ========== WARNA BANK INDONESIA ========== */
        :root {
            --bi-blue: #003366;
            --bi-gold: #c6a43b;
            --bi-light: #e8f0f0;
        }

        /* ========== NAVBAR ========== */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(0, 51, 102, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(198, 164, 59, 0.3);
            padding: 12px 0;
        }
        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav-logo { display: flex; align-items: center; gap: 16px; }
        .flag-img { width: 70px; height: auto; border-radius: 5px; }
        .logo-divider { width: 1px; height: 30px; background: rgba(255,255,255,0.3); }
        .del-img { width: 35px; height: auto; border-radius: 5px; }
        .logo-text h4 { font-size: 0.9rem; font-weight: 700; color: white; }
        .logo-text p { font-size: 0.45rem; color: rgba(255,255,255,0.6); }
        .nav-menu { display: flex; gap: 30px; align-items: center; }
        .nav-link {
            font-size: 0.7rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            text-decoration: none;
            color: rgba(255,255,255,0.8);
            font-weight: 500;
            transition: 0.3s;
            padding: 6px 0;
        }
        .nav-link:hover { color: var(--bi-gold); }
        .home-btn {
            background: var(--bi-gold);
            color: var(--bi-blue) !important;
            padding: 6px 18px;
            border-radius: 40px;
        }

        /* ========== HAMBURGER ========== */
        .hamburger {
            display: none;
            cursor: pointer;
            padding: 8px 12px;
            background: rgba(255,255,255,0.1);
            border-radius: 50px;
        }
        .hamburger span {
            display: block;
            width: 20px;
            height: 2px;
            background: white;
            margin: 5px 0;
        }
        .mobile-overlay {
            position: fixed;
            top: 0;
            right: -100%;
            width: 280px;
            height: 100vh;
            background: var(--bi-blue);
            z-index: 1001;
            transition: right 0.3s;
            padding: 80px 30px;
        }
        .mobile-overlay.active { right: 0; }
        .mobile-close {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 28px;
            cursor: pointer;
            color: white;
        }
        .mobile-link {
            display: block;
            font-size: 0.8rem;
            text-transform: uppercase;
            text-decoration: none;
            color: rgba(255,255,255,0.8);
            padding: 15px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }
        .mobile-link:hover { color: var(--bi-gold); }
        .mobile-home {
            background: var(--bi-gold);
            color: var(--bi-blue) !important;
            border-radius: 40px;
            margin-bottom: 10px;
        }

        /* ========== HERO DENGAN FOTO ========== */
        .hero {
            height: 55vh;
            min-height: 450px;
            background: linear-gradient(rgba(0,51,102,0.6), rgba(0,51,102,0.7)), url('/image/liang-sipege-hero.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            margin-top: 65px;
        }
        .hero-title { font-size: 3.5rem; font-family: 'Cormorant Garamond', serif; margin-bottom: 12px; }
        .hero-subtitle { font-size: 0.75rem; letter-spacing: 0.2em; text-transform: uppercase; }

        /* ========== SECTION ========== */
        .section { padding: 60px 0; }
        .bg-light { background: var(--bi-light); }
        .container { max-width: 1100px; margin: 0 auto; padding: 0 24px; }
        .section-title { text-align: center; margin-bottom: 45px; }
        .section-title h2 { font-size: 2rem; font-family: 'Cormorant Garamond', serif; color: var(--bi-blue); }
        .divider { width: 50px; height: 2px; background: var(--bi-gold); margin: 10px auto 0; }
        .section-title p { color: #6c7a7a; font-size: 0.85rem; margin-top: 12px; }

        /* ========== SEJARAH 2 KOLOM ========== */
        .sejarah-grid { display: flex; flex-direction: column; gap: 50px; }
        .sejarah-item { display: flex; align-items: center; gap: 50px; flex-wrap: wrap; }
        .sejarah-item.reverse { flex-direction: row-reverse; }
        .sejarah-text { flex: 1; line-height: 1.8; color: #444; font-size: 0.95rem; }
        .sejarah-image { flex: 1; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.08); }
        .sejarah-image img { width: 100%; height: 280px; object-fit: cover; transition: 0.3s; }
        .sejarah-image:hover img { transform: scale(1.02); }

        /* ========== GALERI ========== */
        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }
        .galeri-item {
            aspect-ratio: 1/1;
            overflow: hidden;
            border-radius: 14px;
            cursor: pointer;
            background: #e8e8e8;
        }
        .galeri-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.3s;
        }
        .galeri-item:hover img { transform: scale(1.03); }

        /* ========== CTA ========== */
        .cta {
            background: var(--bi-blue);
            padding: 50px 0;
            text-align: center;
            color: white;
        }
        .cta h3 { font-size: 1.6rem; font-family: 'Cormorant Garamond', serif; margin-bottom: 12px; }
        .cta .divider { margin: 0 auto 18px; background: var(--bi-gold); }
        .cta p { opacity: 0.8; margin-bottom: 25px; }
        .cta-btn {
            display: inline-block;
            background: var(--bi-gold);
            color: var(--bi-blue);
            padding: 12px 35px;
            font-size: 0.7rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }
        .cta-btn:hover { background: white; transform: translateY(-2px); }

        /* ========== LIGHTBOX ========== */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            z-index: 10002;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        .lightbox.active { display: flex; }
        .lightbox img { max-width: 90%; max-height: 85vh; border-radius: 6px; }
        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 32px;
            cursor: pointer;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .nav-menu { display: none; }
            .hamburger { display: block; }
            .hero-title { font-size: 2rem; }
            .section { padding: 40px 0; }
            .galeri-grid { grid-template-columns: repeat(2, 1fr); }
            .sejarah-item, .sejarah-item.reverse { flex-direction: column; text-align: center; }
            .sejarah-image img { height: 220px; }
            .section-title h2 { font-size: 1.6rem; }
        }
        @media (max-width: 576px) {
            .hero-title { font-size: 1.6rem; }
            .galeri-grid { grid-template-columns: 1fr; }
        }
    </style>
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
        <h1 class="hero-title">LIANG SIPEGE</h1>
        <p class="hero-subtitle">Pulau Sibandang · Danau Toba</p>
    </div>
</section>

<!-- SEJARAH -->
<section id="sejarah" class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Sejarah</h2>
            <div class="divider"></div>
        </div>
        <div class="sejarah-grid">
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image"><img src="/image/liang/sejarah1.jpg" alt="Sejarah 1"></div>
                <div class="sejarah-text">
                    <p>Liang Sipege dalam bahasa Batak berarti "goa yang curam". Goa ini dipercaya oleh masyarakat setempat sebagai tempat pertapaan para raja-raja Batak zaman dahulu. Beberapa artefak kuno ditemukan di dalam goa, seperti gerabah pecah, peralatan dari batu, dan bekas pembakaran.</p>
                </div>
            </div>
            <div class="sejarah-item reverse" data-aos="fade-left">
                <div class="sejarah-image"><img src="/image/liang/sejarah2.jpg" alt="Sejarah 2"></div>
                <div class="sejarah-text">
                    <p>Goa ini terbentuk secara alami dari proses geologi selama ribuan tahun akibat aktivitas vulkanik dan erosi air. Formasi stalaktit dan stalakmit yang indah merupakan hasil dari proses tetesan air yang mengandung mineral kalsium selama bertahun-tahun.</p>
                </div>
            </div>
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image"><img src="/image/liang/sejarah3.jpg" alt="Sejarah 3"></div>
                <div class="sejarah-text">
                    <p>Sekarang, Liang Sipege menjadi destinasi favorit bagi wisatawan petualang dan peneliti geologi. Keindahan di dalam goa yang eksotis serta nilai sejarah dan geologinya yang tinggi menjadikan tempat ini sebagai salah satu geosite unggulan di Danau Toba.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- GALERI -->
<section id="galeri" class="section bg-light">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Galeri</h2>
            <div class="divider"></div>
            <p>Keindahan Liang Sipege</p>
        </div>
        <div class="galeri-grid" id="galeriGrid">
            <div class="galeri-item"><img src="/image/liang/galeri1.jpg" alt="Galeri 1"></div>
            <div class="galeri-item"><img src="/image/liang/galeri2.jpg" alt="Galeri 2"></div>
            <div class="galeri-item"><img src="/image/liang/galeri3.jpg" alt="Galeri 3"></div>
            <div class="galeri-item"><img src="/image/liang/galeri4.jpg" alt="Galeri 4"></div>
           
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container" data-aos="fade-up">
        <h3>Kunjungi Liang Sipege Sekarang</h3>
        <div class="divider"></div>
        <p>Jelajahi keindahan goa alami dengan stalaktit dan stalakmit yang menakjubkan</p>
        <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
    </div>
</section>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
    <div class="lightbox-close" onclick="closeLightbox()">×</div>
    <img id="lightboxImg">
</div>
<!-- FOOTER LENGKAP -->
<footer class="footer-full">
    <div class="footer-full-container">
        <div class="footer-full-logo">
            
        <div class="footer-full-btn">
            <a href="{{ url('/') }}" class="back-btn">← Kembali ke Dashboard</a>
        </div>
        
        
</footer>

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