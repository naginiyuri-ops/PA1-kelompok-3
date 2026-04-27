@extends('layouts.app')

@section('content')

<style>
    /* ==================== LOGO SECTION STYLE ==================== */
    .logo-container {
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 20px;
        background: rgba(0, 51, 102, 0.98);
        padding: 8px 24px;
        border-radius: 60px;
        backdrop-filter: blur(8px);
        box-shadow: 0 8px 25px rgba(0, 51, 102, 0.3);
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .logo-container:hover {
        background: #0a4a7a;
        box-shadow: 0 12px 30px rgba(0, 51, 102, 0.4);
        transform: translateY(-2px);
    }
    
    .flag-logo-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .flag-img {
        width: 100px;
        height: auto;
        border-radius: 6px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        transition: transform 0.2s ease;
        border: 1px solid rgba(255,255,255,0.3);
    }
    
    .flag-img:hover {
        transform: scale(1.05);
    }
    
    .logo-divider {
        width: 2px;
        height: 35px;
        background: rgba(255,255,255,0.3);
        border-radius: 2px;
    }
    
    .del-logo-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .del-logo-wrapper:hover {
        transform: scale(1.02);
    }
    
    .del-img {
        width: 50px;
        height: auto;
        border-radius: 8px;
        transition: transform 0.2s ease;
    }
    
    .del-img:hover {
        transform: scale(1.05);
    }
    
    .geotoba-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .geotoba-text {
        font-size: 1.5rem;
        font-weight: 800;
        letter-spacing: 1px;
        color: white;
        font-family: 'Inter', 'Poppins', sans-serif;
        line-height: 1.2;
    }
    
    .geotoba-sub {
        font-size: 0.7rem;
        font-weight: 500;
        color: rgba(255,255,255,0.8);
        letter-spacing: 0.5px;
    }
    
    @media (max-width: 768px) {
        .logo-container {
            top: 12px;
            left: 12px;
            padding: 6px 18px;
            gap: 14px;
        }
        .flag-img {
            width: 60px;
        }
        .del-img {
            width: 35px;
        }
        .geotoba-text {
            font-size: 1.2rem;
        }
        .geotoba-sub {
            font-size: 0.6rem;
        }
        .logo-divider {
            height: 28px;
        }
    }
    
    @media (max-width: 576px) {
        .logo-container {
            padding: 5px 14px;
            gap: 10px;
        }
        .flag-img {
            width: 45px;
        }
        .del-img {
            width: 28px;
        }
        .geotoba-text {
            font-size: 0.9rem;
        }
        .geotoba-sub {
            font-size: 0.5rem;
        }
        .logo-divider {
            height: 24px;
        }
    }
    
    /* ==================== HERO SLIDER ==================== */
    .hero-section {
        height: 100vh;
        position: relative;
        overflow: hidden;
        margin-top: 0;
    }
    
    .slides-container {
        position: relative;
        width: 100%;
        height: 100%;
    }
    
    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0;
        transform: scale(1.05);
        transition: opacity 1.5s ease-in-out, transform 6s ease-out;
        z-index: 1;
    }
    
    .slide.active {
        opacity: 1;
        z-index: 2;
        transform: scale(1);
    }
    
    .slide-1 { background-image: linear-gradient(rgba(0, 51, 102, 0.5), rgba(0, 102, 153, 0.3)), url('/image/meat/slide1.jpg'); }
    .slide-2 { background-image: linear-gradient(rgba(0, 51, 102, 0.5), rgba(0, 102, 153, 0.3)), url('/image/meat/slide2.jpg'); }
    .slide-3 { background-image: linear-gradient(rgba(0, 51, 102, 0.5), rgba(0, 102, 153, 0.3)), url('/image/meat/slide3.jpg'); }
    .slide-4 { background-image: linear-gradient(rgba(0, 51, 102, 0.5), rgba(0, 102, 153, 0.3)), url('/image/meat/slide4.jpg'); }
    .slide-5 { background-image: linear-gradient(rgba(0, 51, 102, 0.5), rgba(0, 102, 153, 0.3)), url('/image/meat/slide5.jpg'); }
    
    .hero-content {
        position: absolute;
        z-index: 10;
        bottom: 20%;
        left: 0;
        right: 0;
        text-align: center;
        color: white;
        padding: 0 20px;
    }
    
    .hero-subtitle {
        font-size: 0.7rem;
        letter-spacing: 0.35em;
        text-transform: uppercase;
        margin-bottom: 20px;
        font-weight: 300;
        opacity: 0.9;
        animation: fadeUp 0.8s ease;
    }
    
    .hero-title {
        font-size: 3.8rem;
        font-weight: 700;
        font-family: 'Cormorant Garamond', serif;
        line-height: 1.2;
        margin-bottom: 25px;
        color: white;
        text-shadow: 0 2px 15px rgba(0, 0, 0, 0.4);
        animation: fadeUp 0.8s ease 0.1s both;
    }
    
    .hero-divider {
        width: 60px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto 30px;
        animation: fadeUp 0.8s ease 0.2s both;
    }
    
    .hero-btn {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 14px 42px;
        font-size: 0.75rem;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        transition: all 0.4s ease;
        text-decoration: none;
        font-weight: 600;
        border-radius: 40px;
        animation: fadeUp 0.8s ease 0.3s both;
        border: none;
        cursor: pointer;
    }
    
    .hero-btn:hover {
        background: white;
        color: #003366;
        transform: translateY(-3px);
        letter-spacing: 0.3em;
    }
    
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Slider Dots */
    .slider-dots {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 12px;
        z-index: 15;
    }
    
    .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.4s ease;
    }
    
    .dot.active {
        background: #c6a43b;
        width: 28px;
        border-radius: 10px;
    }
    
    .dot:hover {
        background: #c6a43b;
    }
    
    /* Scroll Indicator */
    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 15;
        animation: bounce 2.5s infinite;
        cursor: pointer;
        color: white;
        font-size: 0.65rem;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        opacity: 0.8;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
    }
    
    .scroll-indicator .line {
        width: 1px;
        height: 30px;
        background: white;
        margin-top: 5px;
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateX(-50%) translateY(0); opacity: 0.8; }
        50% { transform: translateX(-50%) translateY(-10px); opacity: 0.4; }
    }
    
    /* ==================== SECTION UMUM ==================== */
    .section { padding: 90px 0; }
    .section-white { background: linear-gradient(135deg, #f0f7ff 0%, #e8f0fa 100%); }
    .section-light { background: linear-gradient(135deg, #e0ecf7 0%, #d4e4f2 100%); }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
    
    .section-title {
        text-align: center;
        margin-bottom: 60px;
    }
    .section-title h2 {
        font-size: 2.2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 15px;
        color: #003366;
    }
    .section-title .divider {
        width: 50px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto;
    }
    .section-title p {
        color: #2c5f8a;
        max-width: 550px;
        margin: 20px auto 0;
        font-size: 0.85rem;
        line-height: 1.6;
    }
    
    /* ==================== STATS ==================== */
    .stats-grid {
        display: flex;
        justify-content: space-between;
        text-align: center;
        flex-wrap: wrap;
        gap: 40px;
    }
    .stat-item { 
        flex: 1; 
        min-width: 100px; 
        transition: transform 0.3s ease;
        padding: 20px;
        background: rgba(0, 51, 102, 0.05);
        border-radius: 16px;
    }
    .stat-item:hover { 
        transform: translateY(-5px);
        background: rgba(0, 51, 102, 0.1);
    }
    .stat-number {
        font-size: 2.5rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 600;
        color: #c6a43b;
        margin-bottom: 8px;
    }
    .stat-label {
        font-size: 0.65rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: #003366;
        font-weight: 600;
    }
    
    /* ==================== ABOUT ==================== */
    .about-grid {
        display: flex;
        align-items: center;
        gap: 60px;
        flex-wrap: wrap;
    }
    .about-content { flex: 1; }
    .about-content h3 {
        font-size: 2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 20px;
        line-height: 1.3;
        color: #003366;
    }
    .about-content p {
        color: #2c5f8a;
        line-height: 1.8;
        margin-bottom: 20px;
        font-size: 0.9rem;
    }
    .about-image {
        flex: 1;
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.5s ease, box-shadow 0.3s ease;
        box-shadow: 0 10px 30px rgba(0, 51, 102, 0.15);
    }
    .about-image:hover { transform: scale(1.02); box-shadow: 0 20px 40px rgba(0, 51, 102, 0.25); }
    .about-image img { width: 100%; height: auto; display: block; }
    
    /* ==================== DESTINASI ==================== */
    .destinasi-list { display: flex; flex-direction: column; gap: 80px; }
    .destinasi-item {
        display: flex;
        align-items: center;
        gap: 60px;
        flex-wrap: wrap;
    }
    .destinasi-item.reverse { flex-direction: row-reverse; }
    .destinasi-image {
        flex: 1;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 51, 102, 0.15);
        transition: all 0.5s ease;
    }
    .destinasi-image:hover { transform: scale(1.02); box-shadow: 0 20px 40px rgba(0, 51, 102, 0.25); }
    .destinasi-image img { width: 100%; height: auto; display: block; transition: transform 0.5s ease; }
    .destinasi-content { flex: 1; }
    .destinasi-number {
        font-size: 0.7rem;
        letter-spacing: 0.2em;
        color: #c6a43b;
        margin-bottom: 12px;
        text-transform: uppercase;
        font-weight: 600;
    }
    .destinasi-content h3 {
        font-size: 2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 15px;
        color: #003366;
    }
    .destinasi-location {
        font-size: 0.7rem;
        letter-spacing: 0.1em;
        color: #2c5f8a;
        margin-bottom: 20px;
        text-transform: uppercase;
        font-weight: 500;
    }
    .destinasi-desc {
        color: #2c5f8a;
        line-height: 1.8;
        margin-bottom: 25px;
        font-size: 0.9rem;
    }
    .destinasi-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 30px;
    }
    .destinasi-tags span {
        background: rgba(0, 51, 102, 0.1);
        padding: 5px 16px;
        font-size: 0.7rem;
        color: #003366;
        border-radius: 30px;
        transition: all 0.3s ease;
        cursor: pointer;
        font-weight: 500;
    }
    .destinasi-tags span:hover {
        background: #c6a43b;
        color: #003366;
        transform: translateY(-2px);
    }
    .destinasi-link {
        display: inline-block;
        border: 1px solid #c6a43b;
        color: #c6a43b;
        padding: 10px 28px;
        font-size: 0.7rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        text-decoration: none;
        transition: all 0.4s ease;
        border-radius: 40px;
        background: transparent;
    }
    .destinasi-link:hover {
        background: #c6a43b;
        color: #003366;
        letter-spacing: 0.2em;
        transform: translateY(-2px);
    }
    
    /* ==================== PETA LOKASI 3 DESA ==================== */
    .maps-container {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 51, 102, 0.15);
        margin-bottom: 30px;
    }
    
    .maps-container iframe {
        width: 100%;
        height: 450px;
        border: 0;
    }
    
    .maps-info {
        background: linear-gradient(135deg, #003366, #0a4a7a);
        padding: 25px 30px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }
    
    .maps-locations {
        display: flex;
        gap: 25px;
        flex-wrap: wrap;
    }
    
    .maps-location-item {
        display: flex;
        align-items: center;
        gap: 12px;
        background: rgba(255,255,255,0.1);
        padding: 10px 24px;
        border-radius: 50px;
        transition: all 0.3s ease;
        cursor: pointer;
        border: 1px solid transparent;
    }
    
    .maps-location-item:hover {
        background: #c6a43b;
        transform: translateY(-2px);
        border-color: rgba(255,255,255,0.3);
    }
    
    .maps-location-item i {
        font-size: 1rem;
        color: #c6a43b;
    }
    
    .maps-location-item:hover i {
        color: #003366;
    }
    
    .maps-location-item span {
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .maps-note {
        font-size: 0.75rem;
        color: rgba(255,255,255,0.7);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .maps-note i {
        color: #c6a43b;
    }
    
    /* ==================== CTA ==================== */
    .cta-section {
        background: linear-gradient(135deg, #003366 0%, #0a4a7a 50%, #005c8a 100%);
        padding: 80px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }
    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .cta-content { 
        max-width: 600px; 
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    .cta-content h3 {
        font-size: 2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 20px;
        color: white;
    }
    .cta-content .divider {
        width: 50px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto 25px;
    }
    .cta-content p {
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 35px;
        font-size: 0.9rem;
        line-height: 1.7;
    }
    .cta-btn {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 14px 42px;
        font-size: 0.75rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        transition: all 0.4s ease;
        text-decoration: none;
        border-radius: 40px;
        font-weight: 600;
    }
    .cta-btn:hover {
        background: white;
        color: #003366;
        transform: translateY(-3px);
    }
    
    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 992px) {
        .hero-title { font-size: 2.8rem; }
        .destinasi-item, .destinasi-item.reverse { flex-direction: column; gap: 30px; }
        .about-grid { flex-direction: column; text-align: center; }
        .maps-container iframe { height: 350px; }
        .maps-info { flex-direction: column; text-align: center; }
        .maps-locations { justify-content: center; }
    }
    @media (max-width: 768px) {
        .hero-title { font-size: 2rem; }
        .hero-subtitle { font-size: 0.6rem; letter-spacing: 0.2em; }
        .hero-btn { padding: 10px 28px; font-size: 0.65rem; }
        .section { padding: 60px 0; }
        .section-title h2 { font-size: 1.6rem; }
        .destinasi-content h3 { font-size: 1.6rem; }
        .stats-grid { flex-direction: column; align-items: center; gap: 25px; }
        .stat-number { font-size: 2rem; }
        .about-content h3 { font-size: 1.6rem; }
        .cta-content h3 { font-size: 1.6rem; }
        .cta-btn { padding: 10px 28px; font-size: 0.65rem; }
        .maps-container iframe { height: 280px; }
        .maps-location-item { padding: 6px 18px; }
        .maps-location-item span { font-size: 0.7rem; }
    }
    @media (max-width: 480px) {
        .hero-title { font-size: 1.6rem; }
        .hero-subtitle { font-size: 0.5rem; letter-spacing: 0.15em; }
        .dot { width: 8px; height: 8px; }
        .dot.active { width: 20px; }
        .maps-container iframe { height: 220px; }
    }
</style>

    
    <!-- ==================== HERO SLIDER ==================== -->
    <section class="hero-section" id="home">
        <div class="slides-container">
            <div class="slide slide-1 active"></div>
            <div class="slide slide-2"></div>
            <div class="slide slide-3"></div>
            <div class="slide slide-4"></div>
            <div class="slide slide-5"></div>
        </div>
        
        <div class="slider-dots">
            <div class="dot active" data-slide="0"></div>
            <div class="dot" data-slide="1"></div>
            <div class="dot" data-slide="2"></div>
            <div class="dot" data-slide="3"></div>
            <div class="dot" data-slide="4"></div>
        </div>
        
        <div class="hero-content">
            <div>
                <div class="hero-subtitle"> Global Geopark</div>
                <h1 class="hero-title"> BALIGE · MEAT · BATU BAHISAN<br>LIANG SIPEGE</h1>
                <div class="hero-divider"></div>
                <a href="#destinasi" class="hero-btn">Jelajahi Sekarang</a>
            </div>
        </div>
        
        <div class="scroll-indicator" onclick="document.getElementById('destinasi').scrollIntoView({behavior:'smooth'})">
            <span>SCROLL</span>
            <div class="line"></div>
        </div>
    </section>

    <!-- ==================== STATISTICS ==================== -->
    <section class="section section-white">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item" data-aos="fade-up">
                    <div class="stat-number">3</div>
                    <div class="stat-label">GEOSITES</div>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-number">74.000</div>
                    <div class="stat-label">TAHUN SEJARAH</div>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-number">15+</div>
                    <div class="stat-label">WARISAN BUDAYA</div>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-number">100+</div>
                    <div class="stat-label">UMKM LOKAL</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== ABOUT ==================== -->
    <section class="section section-light" id="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-content" data-aos="fade-right">
                    <h3>Warisan Geologi Kelas Dunia</h3>
                    <p>Danau Toba, terbentuk dari letusan supervolcano 74.000 tahun lalu, adalah danau vulkanik terbesar di dunia. Diakui UNESCO sebagai Global Geopark pada tahun 2020.</p>
                    <p>Kawasan ini menyimpan nilai geologi luar biasa, keanekaragaman hayati, dan warisan budaya Batak yang autentik. Tiga geosite unggulan di Pulau Sibandang menanti Anda jelajahi.</p>
                </div>
                <div class="about-image" data-aos="fade-left">
                    <img src="/image/about-toba.jpg" alt="Danau Toba">
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== DESTINASI ==================== -->
    <section id="destinasi" class="section section-white">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Destinasi Unggulan</h2>
                <div class="divider"></div>
                <p>Tiga geosite di Pulau Sibandang, Caldera Danau Toba</p>
            </div>
            <div class="destinasi-list">
                
                <!-- MEAT -->
                <div class="destinasi-item" data-aos="fade-up">
                    <div class="destinasi-image">
                        <img src="/image/meat/meat-detail.jpg" alt="Meat">
                    </div>
                    <div class="destinasi-content">
                        <div class="destinasi-number">01 — GEOSITE</div>
                        <h3>Meat</h3>
                        <div class="destinasi-location">Pulau Sibandang, Danau Toba</div>
                        <p class="destinasi-desc">Desa adat yang kaya budaya Batak. Makam Opung Raja Hunsa, rumah adat tradisional, tarian Tortor, dan tenun ulos khas Meat.</p>
                        <div class="destinasi-tags">
                            <span>Makam Raja Hunsa</span>
                            <span>Tari Tortor</span>
                            <span>Tenun Ulos</span>
                            <span>Rumah Adat Batak</span>
                        </div>
                        <a href="{{ url('/geosite/meat') }}" class="destinasi-link">Jelajahi Lebih Lanjut →</a>
                    </div>
                </div>
                
                <!-- BATU BAHISAN -->
                <div class="destinasi-item reverse" data-aos="fade-up">
                    <div class="destinasi-image">
                        <img src="/image/meat/batu-detail.jpg" alt="Batu Bahisan">
                    </div>
                    <div class="destinasi-content">
                        <div class="destinasi-number">02 — GEOSITE</div>
                        <h3>Batu Bahisan</h3>
                        <div class="destinasi-location">Pulau Sibandang, Danau Toba</div>
                        <p class="destinasi-desc">Formasi batuan unik hasil erosi ribuan tahun. Spot favorit untuk sunrise, sunset, dan fotografi landscape.</p>
                        <div class="destinasi-tags">
                            <span>Formasi Batuan Unik</span>
                            <span>Spot Fotografi</span>
                            <span>Sunrise View</span>
                            <span>Sunset View</span>
                        </div>
                        <a href="{{ url('/geosite/batu-bahisan') }}" class="destinasi-link">Jelajahi Lebih Lanjut →</a>
                    </div>
                </div>
                
                <!-- LIANG SIPEGE -->
                <div class="destinasi-item" data-aos="fade-up">
                    <div class="destinasi-image">
                        <img src="/image/meat/liang-detail.jpg" alt="Liang Sipege">
                    </div>
                    <div class="destinasi-content">
                        <div class="destinasi-number">03 — GEOSITE</div>
                        <h3>Liang Sipege</h3>
                        <div class="destinasi-location">Pulau Sibandang, Danau Toba</div>
                        <p class="destinasi-desc">Goa alami dengan stalaktit dan stalakmit menakjubkan. Cocok untuk caving, eksplorasi, dan edukasi geologi.</p>
                        <div class="destinasi-tags">
                            <span>Goa Alami</span>
                            <span>Caving</span>
                            <span>Stalaktit dan Stalakmit</span>
                            <span>Edukasi Geologi</span>
                        </div>
                        <a href="{{ url('/geosite/liang-sipege') }}" class="destinasi-link">Jelajahi Lebih Lanjut →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== PETA LOKASI 3 DESA ==================== -->
    <section class="section section-light">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Lokasi 3 Geosite</h2>
                <div class="divider"></div>
                <p>Meat, Batu Bahisan, dan Liang Sipege - Pulau Sibandang</p>
            </div>
            
            <div class="maps-container" data-aos="fade-up">
                <iframe 
                    id="mapsIframe"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0!2d98.8835095!3d2.4339262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0415b8f7da39%3A0xc6beb74287f355a5!2sPulau%20Sibandang!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <div class="maps-info">
                    <div class="maps-locations">
                        <div class="maps-location-item" onclick="window.open('https://www.google.com/maps/search/?api=1&query=Meat+Village+Pulau+Sibandang', '_blank')">
                            <i class="fas fa-location-dot"></i>
                            <span>Meat Village</span>
                        </div>
                        <div class="maps-location-item" onclick="window.open('https://www.google.com/maps/search/?api=1&query=Batu+Bahisan+Pulau+Sibandang', '_blank')">
                            <i class="fas fa-location-dot"></i>
                            <span>Batu Bahisan</span>
                        </div>
                        <div class="maps-location-item" onclick="window.open('https://www.google.com/maps/search/?api=1&query=Liang+Sipege+Pulau+Sibandang', '_blank')">
                            <i class="fas fa-location-dot"></i>
                            <span>Liang Sipege</span>
                        </div>
                    </div>
                    <div class="maps-note">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Klik lokasi untuk melihat peta detail</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== CTA ==================== -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content" data-aos="fade-up">
                <h3>Mulai Petualangan Anda</h3>
                <div class="divider"></div>
                <p>Temukan keajaiban geologi dan kekayaan budaya Batak di Geopark Toba, warisan dunia yang diakui UNESCO.</p>
                <a href="#destinasi" class="cta-btn">Jelajahi Sekarang</a>
            </div>
        </div>
    </section>

    <script>
        // ==================== HERO SLIDER ====================
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        let slideInterval;
        const slideCount = slides.length;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('active');
                if (dots[i]) dots[i].classList.remove('active');
            });
            
            slides[index].classList.add('active');
            if (dots[index]) dots[index].classList.add('active');
            currentSlide = index;
        }

        function nextSlide() {
            let next = (currentSlide + 1) % slideCount;
            showSlide(next);
        }

        function startSlider() {
            if (slideInterval) clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, 5000);
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                clearInterval(slideInterval);
                showSlide(index);
                startSlider();
            });
        });

        startSlider();

        // ==================== SMOOTH SCROLL ====================
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script>AOS.init({ duration: 800, once: true, offset: 50 });</script>

@endsection