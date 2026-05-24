@extends('layouts.app')

@section('content')

<style>
    /* ==================== ANIMASI GLOBAL (HANYA UNTUK TEKS) ==================== */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-20px);
        }
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateX(-50%) translateY(0); opacity: 0.8; }
        50% { transform: translateX(-50%) translateY(-10px); opacity: 0.4; }
    }
    
    /* ==================== HERO VIDEO BACKGROUND ==================== */
    .hero-section {
        height: 100vh;
        position: relative;
        overflow: hidden;
        margin-top: 0;
    }
    
    .video-background {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: translate(-50%, -50%);
        z-index: 1;
    }
    
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0,51,102,0.5) 0%, rgba(0,102,153,0.4) 100%);
        z-index: 2;
    }
    
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
        animation: fadeInUp 0.8s ease;
    }
    
    .hero-title {
        font-size: 3.8rem;
        font-weight: 700;
        font-family: 'Cormorant Garamond', serif;
        line-height: 1.2;
        margin-bottom: 25px;
        color: white;
        text-shadow: 0 2px 15px rgba(0, 0, 0, 0.4);
        animation: fadeInUp 0.8s ease 0.1s both;
    }
    
    .hero-divider {
        width: 60px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto 30px;
        animation: fadeInUp 0.8s ease 0.2s both;
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
        animation: fadeInUp 0.8s ease 0.3s both;
        border: none;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    
    .hero-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255,255,255,0.5);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }
    
    .hero-btn:hover::before {
        width: 300px;
        height: 300px;
    }
    
    .hero-btn:hover {
        background: white;
        color: #003366;
        transform: translateY(-3px);
        letter-spacing: 0.3em;
    }
    
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
        transition: height 0.3s ease;
    }
    
    .scroll-indicator:hover .line {
        height: 40px;
        background: #c6a43b;
    }
    
    /* ==================== SECTION UMUM ==================== */
    .section { padding: 90px 0; position: relative; overflow: hidden; }
    .section-white { background: linear-gradient(135deg, #f0f7ff 0%, #e8f0fa 100%); }
    .section-light { background: linear-gradient(135deg, #e0ecf7 0%, #d4e4f2 100%); }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
    
    /* Decorative Elements */
    .section::before {
        content: '✦';
        position: absolute;
        font-size: 8rem;
        color: rgba(198, 164, 59, 0.05);
        bottom: -50px;
        right: -50px;
        transform: rotate(15deg);
        pointer-events: none;
    }
    
    .section::after {
        content: '✦';
        position: absolute;
        font-size: 6rem;
        color: rgba(198, 164, 59, 0.05);
        top: -30px;
        left: -30px;
        transform: rotate(-10deg);
        pointer-events: none;
    }
    
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
        position: relative;
        display: inline-block;
        animation: fadeInUp 0.8s ease;
    }
    
    .section-title h2::before {
        content: '❖';
        position: absolute;
        left: -30px;
        top: 50%;
        transform: translateY(-50%);
        color: #c6a43b;
        font-size: 1rem;
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .section-title h2::after {
        content: '❖';
        position: absolute;
        right: -30px;
        top: 50%;
        transform: translateY(-50%);
        color: #c6a43b;
        font-size: 1rem;
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .section-title:hover h2::before,
    .section-title:hover h2::after {
        opacity: 1;
        left: -25px;
        right: -25px;
    }
    
    .section-title .divider {
        width: 50px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto;
        transition: width 0.5s ease;
    }
    
    .section-title:hover .divider {
        width: 100px;
    }
    
    .section-title p {
        color: #2c5f8a;
        max-width: 550px;
        margin: 20px auto 0;
        font-size: 0.85rem;
        line-height: 1.6;
        animation: fadeInUp 0.8s ease 0.2s both;
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
        transition: all 0.3s ease;
        padding: 20px;
        background: rgba(0, 51, 102, 0.05);
        border-radius: 16px;
        position: relative;
        overflow: hidden;
    }
    
    .stat-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(198,164,59,0.2), transparent);
        transition: left 0.6s ease;
    }
    
    .stat-item:hover::before {
        left: 100%;
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
        transition: all 0.3s ease;
    }
    
    .stat-item:hover .stat-number {
        color: #003366;
    }
    
    .stat-label {
        font-size: 0.65rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: #003366;
        font-weight: 600;
        transition: letter-spacing 0.3s ease;
    }
    
    .stat-item:hover .stat-label {
        letter-spacing: 0.3em;
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
        position: relative;
        display: inline-block;
    }
    
    .about-content h3::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 0;
        height: 2px;
        background: #c6a43b;
        transition: width 0.5s ease;
    }
    
    .about-content:hover h3::after {
        width: 100%;
    }
    
    .about-content p {
        color: #2c5f8a;
        line-height: 1.8;
        margin-bottom: 20px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    
    .about-content p:hover {
        transform: translateX(10px);
        color: #003366;
    }
    
    .about-image {
        flex: 1;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 51, 102, 0.15);
        transition: box-shadow 0.3s ease;
    }
    
    .about-image img { 
        width: 100%; 
        height: auto; 
        display: block; 
    }
    
    /* ==================== DESTINASI ==================== */
    .destinasi-list { display: flex; flex-direction: column; gap: 80px; }
    .destinasi-item {
        display: flex;
        align-items: center;
        gap: 60px;
        flex-wrap: wrap;
        transition: all 0.3s ease;
    }
    
    .destinasi-item.reverse { flex-direction: row-reverse; }
    
    .destinasi-image {
        flex: 1;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 51, 102, 0.15);
        transition: box-shadow 0.3s ease;
    }
    
    .destinasi-image img { 
        width: 100%; 
        height: auto; 
        display: block; 
    }
    
    .destinasi-content { 
        flex: 1; 
        transition: all 0.3s ease;
    }
    
    .destinasi-number {
        font-size: 0.7rem;
        letter-spacing: 0.2em;
        color: #c6a43b;
        margin-bottom: 12px;
        text-transform: uppercase;
        font-weight: 600;
        position: relative;
        display: inline-block;
    }
    
    .destinasi-number::before {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 1px;
        background: #c6a43b;
        transition: width 0.4s ease;
    }
    
    .destinasi-item:hover .destinasi-number::before {
        width: 100%;
    }
    
    .destinasi-content h3 {
        font-size: 2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 15px;
        color: #003366;
        transition: all 0.3s ease;
    }
    
    .destinasi-item:hover .destinasi-content h3 {
        transform: translateX(10px);
        color: #c6a43b;
    }
    
    .destinasi-location {
        font-size: 0.7rem;
        letter-spacing: 0.1em;
        color: #2c5f8a;
        margin-bottom: 20px;
        text-transform: uppercase;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .destinasi-item:hover .destinasi-location {
        transform: translateX(10px);
    }
    
    .destinasi-desc {
        color: #2c5f8a;
        line-height: 1.8;
        margin-bottom: 25px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    
    .destinasi-item:hover .destinasi-desc {
        transform: translateX(10px);
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
        transition: all 0.3s ease;
        border-radius: 40px;
        background: transparent;
    }
    
    .destinasi-link:hover {
        background: #c6a43b;
        color: #003366;
        letter-spacing: 0.25em;
        padding-right: 45px;
    }
    
    /* ==================== PETA LOKASI ==================== */
    .maps-container {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 51, 102, 0.15);
        margin-bottom: 30px;
        transition: box-shadow 0.3s ease;
    }
    
    .maps-container:hover {
        box-shadow: 0 25px 45px rgba(0, 51, 102, 0.25);
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
        transform: translateY(-3px);
    }
    
    .maps-location-item i {
        font-size: 1rem;
        color: #c6a43b;
        transition: all 0.3s ease;
    }
    
    .maps-location-item:hover i {
        color: #003366;
    }
    
    .maps-location-item span {
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .maps-location-item:hover span {
        letter-spacing: 1px;
    }
    
    .maps-note {
        font-size: 0.75rem;
        color: rgba(255,255,255,0.7);
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    
    .maps-note:hover {
        transform: translateX(5px);
        color: white;
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
        background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }
    
    .cta-section::after {
        content: '✦';
        position: absolute;
        font-size: 3rem;
        color: rgba(255,255,255,0.05);
        bottom: 20px;
        right: 30px;
        animation: float 3s ease-in-out infinite;
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
        animation: fadeInUp 0.8s ease;
    }
    
    .cta-content .divider {
        width: 50px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto 25px;
        transition: width 0.5s ease;
    }
    
    .cta-content:hover .divider {
        width: 100px;
    }
    
    .cta-content p {
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 35px;
        font-size: 0.9rem;
        line-height: 1.7;
        animation: fadeInUp 0.8s ease 0.2s both;
    }
    
    .cta-btn {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 14px 42px;
        font-size: 0.75rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        transition: all 0.3s ease;
        text-decoration: none;
        border-radius: 40px;
        font-weight: 600;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.8s ease 0.4s both;
    }
    
    .cta-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255,255,255,0.5);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }
    
    .cta-btn:hover::before {
        width: 300px;
        height: 300px;
    }
    
    .cta-btn:hover {
        background: white;
        color: #003366;
        transform: translateY(-3px);
        letter-spacing: 0.3em;
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
        .maps-container iframe { height: 220px; }
    }
</style>

<!-- ==================== HERO VIDEO BACKGROUND ==================== -->
<section class="hero-section" id="home">
    <video class="video-background" autoplay muted loop playsinline>
        <source src="/image/slide.mp4" type="video/mp4">
        <!-- Fallback jika video tidak bisa diputar -->
        Your browser does not support the video tag.
    </video>
    <div class="hero-overlay"></div>
    
    <div class="hero-content">
        <div>
            <div class="hero-subtitle">Global Geopark</div>
            <h1 class="hero-title">BALIGE · MEAT · BATU BASIHA<br>LIANG SIPEGE</h1>
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
            <div class="stat-item" data-aos="zoom-in" data-aos-duration="800">
                <div class="stat-number">16</div>
                <div class="stat-label">GEOSITES</div>
            </div>
            <div class="stat-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="100">
                <div class="stat-number">74.000</div>
                <div class="stat-label">TAHUN SEJARAH</div>
            </div>
            <div class="stat-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
                <div class="stat-number">3</div>
                <div class="stat-label">GEOSITE UNGGULAN</div>
            </div>
            <div class="stat-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="300">
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
            <div class="about-content" data-aos="fade-right" data-aos-duration="1000">
                <h3>Warisan Geologi Kelas Dunia</h3>
                <p>Danau Toba, terbentuk dari letusan supervolcano 74.000 tahun lalu, adalah danau vulkanik terbesar di dunia. Diakui UNESCO sebagai Global Geopark pada tahun 2020.</p>
                <p>Kawasan ini menyimpan nilai geologi luar biasa, keanekaragaman hayati, dan warisan budaya Batak yang autentik. Tiga geosite unggulan di Kecamatan Balige menanti Anda jelajahi.</p>
            </div>
            <div class="about-image" data-aos="fade-left" data-aos-duration="1000">
                <img src="/image/meat/slide1.jpg" alt="Danau Toba">
            </div>
        </div>
    </div>
</section>

<!-- ==================== DESTINASI ==================== -->
<section id="destinasi" class="section section-white">
    <div class="container">
        <div class="section-title" data-aos="fade-up" data-aos-duration="800">
            <h2>Destinasi Unggulan</h2>
            <div class="divider"></div>
            <p>Tiga geosite di Balige, Caldera Danau Toba</p>
        </div>
        <div class="destinasi-list">
            
            <!-- MEAT -->
            <div class="destinasi-item" data-aos="fade-up" data-aos-duration="1000">
                <div class="destinasi-image">
                    <img src="/image/meat/meat-detail.jpg" alt="Meat">
                </div>
                <div class="destinasi-content">
                    <div class="destinasi-number">01 — MEAT</div>
                    <h3>Meat</h3>
                    <div class="destinasi-location">Desa Tampahan, Kecamatan Tampahan, Kabupaten Toba</div>
                    <p class="destinasi-desc">Desa Meat adalah salah satu desa wisata yang terletak di Kecamatan Balige, Kabupaten Toba, di tepi Danau Toba. Menawarkan pemandangan danau yang indah dan budaya Batak yang kental.</p>
                    <div class="destinasi-tags">
                        <span>#DanauToba</span>
                        <span>#DesaWisata</span>
                        <span>#BudayaBatak</span>
                    </div>
                    <a href="{{ url('/geosite/meat') }}" class="destinasi-link">Jelajahi Lebih Lanjut →</a>
                </div>
            </div>
            
            <!-- BATU BAHISAN -->
            <div class="destinasi-item reverse" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="destinasi-image">
                    <img src="/image/meat/batu-detail.jpg" alt="Batu Bahisan">
                </div>
                <div class="destinasi-content">
                    <div class="destinasi-number">02 — BATU BAHISAN</div>
                    <h3>Batu Bahisan</h3>
                    <div class="destinasi-location">Desa Aek Bolon Jae, Balige</div>
                    <p class="destinasi-desc">Batu Bahisan merupakan salah satu situs batu bersejarah di kawasan Balige yang memiliki nilai budaya dan legenda dalam masyarakat Batak Toba. Konon batu ini digunakan sebagai tempat mengasah senjata.</p>
                    <div class="destinasi-tags">
                        <span>#SitusBersejarah</span>
                        <span>#BatakToba</span>
                        <span>#WarisanBudaya</span>
                    </div>
                    <a href="{{ url('/geosite/batu-bahisan') }}" class="destinasi-link">Jelajahi Lebih Lanjut →</a>
                </div>
            </div>
            
            <!-- LIANG SIPEGE -->
            <div class="destinasi-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <div class="destinasi-image">
                    <img src="/image/meat/liang-detail.jpg" alt="Liang Sipege">
                </div>
                <div class="destinasi-content">
                    <div class="destinasi-number">03 — LIANG SIPEGE</div>
                    <h3>Liang Sipege</h3>
                    <div class="destinasi-location">Hutagaol Peatalun, Balige</div>
                    <p class="destinasi-desc">Gua Liang Sipege adalah destinasi wisata alam yang terletak di Desa Simarmar Pea Talun Hutagaol, Kecamatan Balige, Kabupaten Toba. Memiliki stalaktit dan stalagmit yang indah.</p>
                    <div class="destinasi-tags">
                        <span>#GuaAlam</span>
                        <span>#Petualangan</span>
                        <span>#Geowisata</span>
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
        <div class="section-title" data-aos="fade-up" data-aos-duration="800">
            <h2>Lokasi 3 Geosite</h2>
            <div class="divider"></div>
            <p>Meat, Batu Bahisan, dan Liang Sipege - Balige, Toba</p>
        </div>
        
        <div class="maps-container" data-aos="zoom-in" data-aos-duration="1000">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31892.45522108672!2d98.96240686371921!3d2.316828414712955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e1b2618ee6569%3A0x36e2c26fb20124ca!2sMeat%2C%20Kec.%20Tampahan%2C%20Toba%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1779549114075!5m2!1sid!2sid"
                width="600" 
                height="450"
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>

            <div class="maps-info">
                <div class="maps-locations">
                    <div class="maps-location-item" onclick="window.open('https://www.google.com/maps/search/?api=1&query=Meat+Village+Balige+Toba', '_blank')">
                        <i class="fas fa-location-dot"></i>
                        <span>Meat Village</span>
                    </div>
                    <div class="maps-location-item" onclick="window.open('https://www.google.com/maps/search/?api=1&query=Batu+Bahisan+Balige+Toba', '_blank')">
                        <i class="fas fa-location-dot"></i>
                        <span>Batu Bahisan</span>
                    </div>
                    <div class="maps-location-item" onclick="window.open('https://www.google.com/maps/search/?api=1&query=Liang+Sipege+Balige+Toba', '_blank')">
                        <i class="fas fa-location-dot"></i>
                        <span>Liang Sipege</span>
                    </div>
                </div>
                <div class="maps-note">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Klik salah satu lokasi di samping untuk melihat rute detail</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== CTA ==================== -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up" data-aos-duration="800">
            <h3>Mulai Petualangan Anda</h3>
            <div class="divider"></div>
            <p>Temukan keajaiban geologi dan kekayaan budaya Batak di Geopark Toba, warisan dunia yang diakui UNESCO.</p>
            <a href="#destinasi" class="cta-btn">Jelajahi Sekarang</a>
        </div>
    </div>
</section>

<script>
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
    
    // ==================== ANIMATION ON SCROLL ====================
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.stat-item, .destinasi-item, .maps-container').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.8s ease';
        observer.observe(el);
    });
    
    // ==================== PRELOAD VIDEO ====================
    const video = document.querySelector('.video-background');
    if (video) {
        video.addEventListener('loadeddata', () => {
            video.play().catch(e => console.log('Video autoplay failed:', e));
        });
    }
</script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script>AOS.init({ duration: 800, once: true, offset: 50 });</script>

@endsection