@extends('layouts.app')

@section('content')

<style>
    /* ==================== FONTS ==================== */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800;900&family=Cormorant+Garamond:wght@400;500;600;700&display=swap');

    /* ==================== VARIABLES ==================== */
    :root {
        --primary: #003366;
        --primary-light: #1a4a7a;
        --gold: #c6a43b;
        --gold-light: #e8c45a;
        --gold-dark: #a8882e;
        --text-dark: #0f172a;
        --text-gray: #475569;
        --text-light: #64748b;
        --white: #ffffff;
        --bg-light: #f8fafc;
        --bg-gray: #f1f5f9;
        --shadow: 0 4px 20px rgba(0,0,0,0.06);
        --shadow-lg: 0 10px 40px rgba(0,0,0,0.1);
        --shadow-xl: 0 20px 60px rgba(0,0,0,0.12);
        --radius: 20px;
    }

    /* ==================== ANIMASI ==================== */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(50px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes slideFade {
        0% { opacity: 0; transform: scale(1.05); }
        10% { opacity: 1; transform: scale(1); }
        90% { opacity: 1; transform: scale(1); }
        100% { opacity: 0; transform: scale(0.98); }
    }
    
    @keyframes pulse {
        0%, 100% { transform: translateY(0); opacity: 0.7; }
        50% { transform: translateY(-10px); opacity: 1; }
    }
    
    @keyframes rotateSlow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* ==================== HERO ==================== */
    .hero-section {
        height: 100vh;
        position: relative;
        overflow: hidden;
        margin-top: 0;
    }

    .hero-slideshow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }
    
    .hero-slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0;
        animation: slideFade 20s ease-in-out infinite;
    }
    
    .hero-slide-1 { background-image: url('/image/meat/slide2.jpg'); animation-delay: 0s; }
    .hero-slide-2 { background-image: url('/image/meat/slide5.jpg'); animation-delay: 4s; }
    .hero-slide-3 { background-image: url('/image/meat/meat-detail.jpg'); animation-delay: 8s; }
    .hero-slide-4 { background-image: url('/image/meat/liang-sipege-hero.jpg'); animation-delay: 12s; }
    .hero-slide-5 { background-image: url('/image/meat/Jabubatak.jpg'); animation-delay: 16s; }
    
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0,51,102,0.5) 0%, rgba(0,0,0,0.4) 100%);
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
    
    .hero-badge {
        display: inline-block;
        background: rgba(198, 164, 59, 0.15);
        border: 1px solid rgba(198, 164, 59, 0.3);
        color: var(--gold-light);
        padding: 6px 20px;
        border-radius: 50px;
        font-size: 0.6rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 20px;
        font-weight: 600;
    }
    
    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 4.5rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 20px;
        letter-spacing: 4px;
        text-shadow: 0 4px 30px rgba(0,0,0,0.3);
    }
    
    .hero-title span {
        color: var(--gold);
    }
    
    .hero-divider {
        width: 80px;
        height: 2px;
        background: var(--gold);
        margin: 0 auto 30px;
    }
    
    .hero-btn {
        display: inline-block;
        background: var(--gold);
        color: var(--primary);
        padding: 14px 40px;
        font-size: 0.7rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-weight: 700;
        border-radius: 50px;
        transition: all 0.4s ease;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }
    
    .hero-btn:hover {
        background: white;
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        letter-spacing: 3px;
    }
    
    .scroll-indicator {
        position: absolute;
        bottom: 25px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 15;
        animation: pulse 2.5s infinite;
        cursor: pointer;
        color: white;
        font-size: 0.6rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        opacity: 0.7;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
    }
    
    .scroll-indicator .line {
        width: 1px;
        height: 30px;
        background: white;
    }

    /* ==================== SECTION ==================== */
    .section {
        padding: 80px 0;
        position: relative;
    }
    .section-white { background: var(--bg-light); }
    .section-light { background: var(--bg-gray); }
    .section-gold { background: linear-gradient(135deg, #fef9e6, #fdf4d6); }
    
    .container { max-width: 1280px; margin: 0 auto; padding: 0 24px; }
    
    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }
    .section-header .badge {
        display: inline-block;
        background: rgba(198, 164, 59, 0.1);
        color: var(--gold-dark);
        padding: 4px 16px;
        border-radius: 30px;
        font-size: 0.6rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-weight: 600;
        margin-bottom: 12px;
    }
    .section-header h2 {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 15px;
    }
    .section-header .divider {
        width: 50px;
        height: 2px;
        background: var(--gold);
        margin: 0 auto;
        transition: width 0.4s ease;
    }
    .section-header:hover .divider { width: 80px; }
    .section-header p {
        color: var(--text-light);
        max-width: 550px;
        margin: 18px auto 0;
        font-size: 0.9rem;
        line-height: 1.7;
    }

    /* ==================== STATS ==================== */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 25px;
    }
    .stat-item {
        text-align: center;
        padding: 30px 20px;
        background: white;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        transition: all 0.4s ease;
        border-bottom: 3px solid transparent;
    }
    .stat-item:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
        border-bottom-color: var(--gold);
    }
    .stat-number {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        font-weight: 800;
        color: var(--gold);
        line-height: 1;
    }
    .stat-label {
        font-size: 0.7rem;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: var(--text-gray);
        font-weight: 600;
        margin-top: 8px;
    }

    /* ==================== TENTANG ==================== */
    .tentang-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }
    .tentang-text h3 {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 20px;
    }
    .tentang-text p {
        color: var(--text-gray);
        line-height: 1.8;
        font-size: 0.95rem;
        margin-bottom: 15px;
    }
    .tentang-image {
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        cursor: pointer;
        transition: all 0.4s ease;
    }
    .tentang-image:hover {
        transform: scale(1.02);
        box-shadow: var(--shadow-xl);
    }
    .tentang-image img {
        width: 100%;
        height: 350px;
        object-fit: cover;
        display: block;
    }

    /* ==================== DESTINASI (SELANG-SELING) ==================== */
    .destinasi-item {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
        align-items: center;
        padding: 30px 0;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    .destinasi-item:last-child { border-bottom: none; }
    .destinasi-item.reverse { direction: rtl; }
    .destinasi-item.reverse > * { direction: ltr; }
    
    .destinasi-image {
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        cursor: pointer;
        transition: all 0.5s ease;
        position: relative;
    }
    .destinasi-image:hover {
        transform: scale(1.03) translateY(-5px);
        box-shadow: var(--shadow-xl);
    }
    .destinasi-image img {
        width: 100%;
        height: 280px;
        object-fit: cover;
        display: block;
        transition: transform 0.5s ease;
    }
    .destinasi-image:hover img { transform: scale(1.05); }
    
    .destinasi-number {
        display: inline-block;
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        font-weight: 800;
        color: rgba(198, 164, 59, 0.15);
        line-height: 1;
        margin-bottom: 5px;
    }
    .destinasi-content h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 8px;
    }
    .destinasi-content .location {
        font-size: 0.75rem;
        color: var(--text-light);
        letter-spacing: 0.5px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .destinasi-content .location i { color: var(--gold); }
    .destinasi-content p {
        color: var(--text-gray);
        line-height: 1.7;
        font-size: 0.9rem;
        margin-bottom: 18px;
    }
    .destinasi-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--gold-dark);
        font-weight: 600;
        font-size: 0.8rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .destinasi-link:hover { gap: 12px; color: var(--primary); }

    /* ==================== GALERI UNGGULAN (SCROLL) ==================== */
    .galeri-scroll-wrapper {
        position: relative;
    }
    .galeri-scroll {
        display: flex;
        gap: 25px;
        overflow-x: auto;
        padding: 10px 4px 25px;
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch;
    }
    .galeri-scroll::-webkit-scrollbar {
        height: 6px;
    }
    .galeri-scroll::-webkit-scrollbar-track {
        background: #e2e8f0;
        border-radius: 10px;
    }
    .galeri-scroll::-webkit-scrollbar-thumb {
        background: var(--gold);
        border-radius: 10px;
    }
    
    .galeri-card {
        flex: 0 0 300px;
        border-radius: var(--radius);
        overflow: hidden;
        background: white;
        box-shadow: var(--shadow);
        transition: all 0.4s ease;
        cursor: pointer;
    }
    .galeri-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }
    .galeri-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .galeri-card:hover img { transform: scale(1.05); }
    .galeri-card .caption {
        padding: 16px 18px;
    }
    .galeri-card .caption h4 {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 4px;
        font-family: 'Playfair Display', serif;
    }
    .galeri-card .caption p {
        font-size: 0.75rem;
        color: var(--text-light);
    }
    .galeri-card .caption .badge-unggulan {
        display: inline-block;
        background: var(--gold);
        color: var(--primary);
        padding: 2px 10px;
        border-radius: 20px;
        font-size: 0.55rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        margin-top: 6px;
    }
    
    .galeri-nav {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: 20px;
    }
    .galeri-nav button {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 1px solid #e2e8f0;
        background: white;
        color: var(--primary);
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1rem;
    }
    .galeri-nav button:hover {
        background: var(--gold);
        color: white;
        border-color: var(--gold);
        transform: translateY(-2px);
    }

    /* ==================== TAUTAN CEPAT ==================== */
    .quick-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 20px;
    }
    .quick-item {
        background: white;
        padding: 25px 15px;
        border-radius: var(--radius);
        text-align: center;
        box-shadow: var(--shadow);
        transition: all 0.4s ease;
        text-decoration: none;
        color: var(--primary);
        border: 1px solid rgba(0,0,0,0.03);
    }
    .quick-item:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-lg);
        border-color: var(--gold);
    }
    .quick-item i {
        font-size: 2.2rem;
        color: var(--gold);
        margin-bottom: 10px;
        display: block;
        transition: transform 0.3s ease;
    }
    .quick-item:hover i { transform: scale(1.1) rotate(5deg); }
    .quick-item span {
        font-size: 0.8rem;
        font-weight: 600;
        display: block;
    }

    /* ==================== BERITA ==================== */
    .berita-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }
    .berita-card {
        background: white;
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: all 0.4s ease;
        cursor: pointer;
    }
    .berita-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-xl);
    }
    .berita-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .berita-card:hover img { transform: scale(1.03); }
    .berita-card .content {
        padding: 20px;
    }
    .berita-card .content .date {
        font-size: 0.65rem;
        color: var(--text-light);
        display: flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 8px;
    }
    .berita-card .content h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 8px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .berita-card .content p {
        font-size: 0.85rem;
        color: var(--text-gray);
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .berita-card .content .btn-read {
        display: inline-block;
        margin-top: 12px;
        font-size: 0.7rem;
        font-weight: 600;
        color: var(--gold-dark);
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .berita-card .content .btn-read:hover { color: var(--primary); letter-spacing: 0.5px; }

    /* ==================== CTA ==================== */
    .cta-section {
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        padding: 70px 0;
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
        background: radial-gradient(circle, rgba(255,255,255,0.03) 0%, transparent 70%);
        animation: rotateSlow 30s linear infinite;
    }
    .cta-content {
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    .cta-content h3 {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 700;
        color: white;
        margin-bottom: 18px;
    }
    .cta-content .divider {
        width: 50px;
        height: 2px;
        background: var(--gold);
        margin: 0 auto 20px;
    }
    .cta-content p {
        color: rgba(255,255,255,0.8);
        font-size: 0.9rem;
        line-height: 1.7;
        margin-bottom: 30px;
    }
    .cta-btn {
        display: inline-block;
        background: var(--gold);
        color: var(--primary);
        padding: 14px 42px;
        font-size: 0.7rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-weight: 700;
        border-radius: 50px;
        transition: all 0.4s ease;
        text-decoration: none;
    }
    .cta-btn:hover {
        background: white;
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        letter-spacing: 3px;
    }

    /* ==================== LIGHTBOX ==================== */
    .lightbox-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.96);
        z-index: 20000;
        backdrop-filter: blur(12px);
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }
    .lightbox-overlay.active { display: flex; }
    .lightbox-container {
        max-width: 90%;
        max-height: 90%;
        text-align: center;
    }
    .lightbox-image {
        max-width: 100%;
        max-height: 80vh;
        object-fit: contain;
        border-radius: 12px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.3);
    }
    .lightbox-caption {
        margin-top: 20px;
        color: white;
    }
    .lightbox-caption h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        color: var(--gold);
        margin-bottom: 6px;
    }
    .lightbox-caption p {
        color: rgba(255,255,255,0.6);
        font-size: 0.85rem;
    }
    .lightbox-close {
        position: absolute;
        top: 20px;
        right: 30px;
        color: white;
        font-size: 2rem;
        cursor: pointer;
        background: rgba(0,0,0,0.5);
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    .lightbox-close:hover {
        background: var(--gold);
        transform: rotate(90deg);
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 992px) {
        .hero-title { font-size: 3rem; }
        .tentang-grid { grid-template-columns: 1fr; gap: 30px; }
        .destinasi-item { grid-template-columns: 1fr; gap: 25px; }
        .destinasi-item.reverse { direction: ltr; }
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .quick-grid { grid-template-columns: repeat(3, 1fr); }
        .berita-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 768px) {
        .hero-title { font-size: 2.2rem; letter-spacing: 2px; }
        .hero-badge { font-size: 0.5rem; padding: 4px 14px; }
        .section { padding: 50px 0; }
        .section-header h2 { font-size: 1.8rem; }
        .stats-grid { grid-template-columns: 1fr 1fr; gap: 15px; }
        .stat-number { font-size: 2rem; }
        .quick-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
        .berita-grid { grid-template-columns: 1fr; }
        .galeri-card { flex: 0 0 250px; }
        .galeri-card img { height: 180px; }
        .tentang-image img { height: 250px; }
        .destinasi-image img { height: 220px; }
        .lightbox-close { top: 10px; right: 15px; width: 38px; height: 38px; font-size: 1.5rem; }
        .cta-content h3 { font-size: 1.6rem; }
    }

    @media (max-width: 480px) {
        .hero-title { font-size: 1.6rem; }
        .container { padding: 0 16px; }
        .stats-grid { grid-template-columns: 1fr 1fr; gap: 10px; }
        .stat-item { padding: 18px 12px; }
        .stat-number { font-size: 1.6rem; }
        .quick-grid { grid-template-columns: 1fr 1fr; }
        .quick-item { padding: 18px 12px; }
        .quick-item i { font-size: 1.6rem; }
        .galeri-card { flex: 0 0 200px; }
        .galeri-card img { height: 150px; }
        .galeri-card .caption { padding: 12px 14px; }
        .destinasi-content h3 { font-size: 1.4rem; }
        .cta-btn { padding: 12px 28px; font-size: 0.6rem; }
    }
</style>

<!-- ==================== HERO ==================== -->
<section class="hero-section">
    <div class="hero-slideshow">
        <div class="hero-slide hero-slide-1"></div>
        <div class="hero-slide hero-slide-2"></div>
        <div class="hero-slide hero-slide-3"></div>
        <div class="hero-slide hero-slide-4"></div>
        <div class="hero-slide hero-slide-5"></div>
    </div>
    <div class="hero-overlay"></div>
    
    <div class="hero-content">
        <div class="hero-badge">UNESCO Global Geopark</div>
        <h1 class="hero-title">Balige · Meat <br><span>Batu Basiha · Liang Sipege</span></h1>
        <div class="hero-divider"></div>
        <a href="#destinasi" class="hero-btn">Jelajahi Sekarang →</a>
    </div>
    
    <div class="scroll-indicator" onclick="document.getElementById('destinasi').scrollIntoView({behavior:'smooth'})">
        <span>SCROLL</span>
        <div class="line"></div>
    </div>
</section>

<!-- ==================== STATS ==================== -->
<section class="section section-white">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item" data-aos="zoom-in">
                <div class="stat-number">16</div>
                <div class="stat-label">Geosites</div>
            </div>
            <div class="stat-item" data-aos="zoom-in" data-aos-delay="100">
                <div class="stat-number">74.000</div>
                <div class="stat-label">Tahun Sejarah</div>
            </div>
            <div class="stat-item" data-aos="zoom-in" data-aos-delay="200">
                <div class="stat-number">15</div>
                <div class="stat-label">Warisan Budaya</div>
            </div>
            <div class="stat-item" data-aos="zoom-in" data-aos-delay="300">
                <div class="stat-number">20+</div>
                <div class="stat-label">UMKM Lokal</div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== TENTANG ==================== -->
<section class="section section-light" id="tentang">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Warisan Dunia</span>
            <h2>Tentang Geosite</h2>
            <div class="divider"></div>
            <p>Menjelajahi keajaiban geologi Danau Toba</p>
        </div>
        <div class="tentang-grid">
            <div class="tentang-text" data-aos="fade-right">
                <h3>Warisan Geologi <br>Kelas Dunia</h3>
                <p>Danau Toba, terbentuk dari letusan supervolcano 74.000 tahun lalu, adalah danau vulkanik terbesar di dunia. Diakui UNESCO sebagai <strong>Global Geopark</strong> pada tahun 2020.</p>
                <p>Kawasan ini menyimpan nilai geologi luar biasa, keanekaragaman hayati, dan warisan budaya Batak yang autentik. Empat geosite unggulan di kawasan Balige menanti Anda jelajahi.</p>
            </div>
            <div class="tentang-image" data-aos="fade-left" onclick="openLightbox('/image/meat/danau.jpg', 'Danau Toba', 'Pemandangan indah Danau Toba dari ketinggian')">
                <img src="/image/meat/danau.jpg" alt="Danau Toba" loading="lazy" onerror="this.src='{{ asset('image/default.jpg') }}'">
            </div>
        </div>
    </div>
</section>

<!-- ==================== DESTINASI (SELANG-SELING) ==================== -->
<section id="destinasi" class="section section-white">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Destinasi</span>
            <h2>Destinasi Unggulan</h2>
            <div class="divider"></div>
            <p>Empat geosite terbaik di kawasan Balige, Caldera Toba</p>
        </div>
        
        <!-- BALIGE -->
        <div class="destinasi-item" data-aos="fade-up">
            <div class="destinasi-image" onclick="openLightbox('/image/meat/balige.jpg', 'Balige', 'Pusat peradaban Batak Toba')">
                <img src="/image/meat/balige.jpg" alt="Balige" loading="lazy" onerror="this.src='{{ asset('image/default.jpg') }}'">
            </div>
            <div class="destinasi-content">
                <div class="destinasi-number">#1</div>
                <h3>Balige</h3>
                <div class="location"><i class="fas fa-map-marker-alt"></i> Kabupaten Toba, Sumatera Utara</div>
                <p>Balige adalah pusat peradaban Batak Toba. Kota ini menyimpan sejarah panjang, budaya yang kaya, dan menjadi gerbang utama menuju berbagai destinasi wisata di sekitar Danau Toba.</p>
                <a href="{{ url('/destinasi') }}" class="destinasi-link">Jelajahi Balige →</a>
            </div>
        </div>
        
        <!-- MEAT (reverse) -->
        <div class="destinasi-item reverse" data-aos="fade-up">
            <div class="destinasi-image" onclick="openLightbox('/image/meat/meat-detail.jpg', 'Desa Meat', 'Desa wisata adat Batak di tepi Danau Toba')">
                <img src="/image/meat/meat-detail.jpg" alt="Meat" loading="lazy" onerror="this.src='{{ asset('image/default.jpg') }}'">
            </div>
            <div class="destinasi-content">
                <div class="destinasi-number">#2</div>
                <h3>Meat</h3>
                <div class="location"><i class="fas fa-map-marker-alt"></i> Kecamatan Tampahan, Kabupaten Toba</div>
                <p>Desa Meat adalah desa wisata adat Batak yang terletak di tepi Danau Toba. Dijuluki "New Zealand van Toba" karena keindahan alamnya yang memukau dengan hamparan sawah dan perbukitan hijau.</p>
                <a href="{{ url('/geosite/meat') }}" class="destinasi-link">Jelajahi Meat →</a>
            </div>
        </div>
        
        <!-- BATU BASIHA -->
        <div class="destinasi-item" data-aos="fade-up">
            <div class="destinasi-image" onclick="openLightbox('/image/meat/batubasiha1.png', 'Batu Basiha', 'Situs batu bersejarah di kawasan Balige')">
                <img src="/image/meat/batubasiha1.png" alt="Batu Basiha" loading="lazy" onerror="this.src='{{ asset('image/default.jpg') }}'">
            </div>
            <div class="destinasi-content">
                <div class="destinasi-number">#3</div>
                <h3>Batu Basiha</h3>
                <div class="location"><i class="fas fa-map-marker-alt"></i> Desa Aek Bolon Jae, Balige</div>
                <p>Batu Basiha adalah situs batu bersejarah yang terbentuk dari letusan Gunung Toba 74.000 tahun lalu. Diakui sebagai salah satu dari 16 geosite UNESCO Global Geopark.</p>
                <a href="{{ url('/geosite/batu-bahisan') }}" class="destinasi-link">Jelajahi Batu Basiha →</a>
            </div>
        </div>
        
        <!-- LIANG SIPEGE (reverse) -->
        <div class="destinasi-item reverse" data-aos="fade-up">
            <div class="destinasi-image" onclick="openLightbox('/image/meat/liang-sipege-hero.jpg', 'Liang Sipege', 'Gua alam dengan keindahan stalaktit dan stalakmit')">
                <img src="/image/meat/liang-sipege-hero.jpg" alt="Liang Sipege" loading="lazy" onerror="this.src='{{ asset('image/default.jpg') }}'">
            </div>
            <div class="destinasi-content">
                <div class="destinasi-number">#4</div>
                <h3>Liang Sipege</h3>
                <div class="location"><i class="fas fa-map-marker-alt"></i> Desa Simarmar Pea Talun Hutagaol, Balige</div>
                <p>Liang Sipege adalah gua alam yang menyimpan keindahan stalaktit dan stalakmit. Tempat ini juga memiliki nilai spiritual dan legenda leluhur masyarakat Batak Toba.</p>
                <a href="{{ url('/geosite/liang-sipege') }}" class="destinasi-link">Jelajahi Liang Sipege →</a>
            </div>
        </div>
    </div>
</section>

<!-- ==================== GALERI UNGGULAN (SCROLL) ==================== -->
<section class="section section-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Galeri</span>
            <h2>📸 Galeri Unggulan</h2>
            <div class="divider"></div>
            <p>Koleksi foto terbaik dari Geopark Danau Toba</p>
        </div>
        
        <div class="galeri-scroll-wrapper">
            <div class="galeri-scroll" id="galeriScroll">
                @php
                    $galeriUnggulan = App\Models\Galeri::where('status', true)
                        ->where('is_unggulan', true)
                        ->latest()
                        ->limit(10)
                        ->get();
                @endphp
                
                @forelse($galeriUnggulan as $item)
                @php
                    $imgSrc = asset('image/default.jpg');
                    if (!empty($item->gambar)) {
                        if (str_starts_with($item->gambar, 'http')) {
                            $imgSrc = $item->gambar;
                        } elseif (str_starts_with($item->gambar, 'image/')) {
                            $imgSrc = asset($item->gambar);
                        } elseif (file_exists(public_path('image/galeri/' . $item->gambar))) {
                            $imgSrc = asset('image/galeri/' . $item->gambar);
                        } else {
                            $imgSrc = asset('storage/' . $item->gambar);
                        }
                    }
                @endphp
                <div class="galeri-card" onclick="openLightbox('{{ $imgSrc }}', '{{ addslashes($item->judul) }}', '{{ addslashes($item->kategori ?? 'Galeri') }} · {{ $item->lokasi ?? 'Danau Toba' }}')">
                    <img src="{{ $imgSrc }}" alt="{{ $item->judul }}" loading="lazy" onerror="this.src='{{ asset('image/default.jpg') }}'">
                    <div class="caption">
                        <h4>{{ Str::limit($item->judul, 30) }}</h4>
                        <p>{{ $item->kategori ?? 'Galeri' }} · {{ $item->lokasi ?? 'Danau Toba' }}</p>
                        <span class="badge-unggulan">⭐ Unggulan</span>
                    </div>
                </div>
                @empty
                <div style="padding:50px; text-align:center; color:#94a3b8; width:100%;">
                    <i class="fas fa-images" style="font-size:3rem; opacity:0.2; display:block; margin-bottom:15px;"></i>
                    <p>Belum ada galeri unggulan. <br>Tambahkan di panel admin.</p>
                </div>
                @endforelse
            </div>
            
            <div class="galeri-nav">
                <button onclick="scrollGaleri(-1)" aria-label="Scroll kiri">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button onclick="scrollGaleri(1)" aria-label="Scroll kanan">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
        
        <div style="text-align:center; margin-top:25px;">
            <a href="{{ url('/galeri') }}" class="hero-btn" style="display:inline-block; padding:10px 30px; font-size:0.7rem; background:transparent; border:2px solid var(--gold); color:var(--gold-dark);">
                Lihat Semua Galeri →
            </a>
        </div>
    </div>
</section>

<!-- ==================== TAUTAN CEPAT ==================== -->
<section class="section section-white">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Navigasi</span>
            <h2>🔗 Tautan Cepat</h2>
            <div class="divider"></div>
            <p>Jelajahi berbagai informasi menarik di GeoToba</p>
        </div>
        <div class="quick-grid">
            <a href="{{ url('/destinasi') }}" class="quick-item" data-aos="zoom-in">
                <i class="fas fa-map-marked-alt"></i>
                <span>Destinasi</span>
            </a>
            <a href="{{ route('biodiversitas') }}" class="quick-item" data-aos="zoom-in" data-aos-delay="50">
                <i class="fas fa-leaf"></i>
                <span>Biodiversitas</span>
            </a>
            <a href="{{ route('geodiversitas') }}" class="quick-item" data-aos="zoom-in" data-aos-delay="100">
                <i class="fas fa-gem"></i>
                <span>Geodiversitas</span>
            </a>
            <a href="{{ route('cultural-diversity') }}" class="quick-item" data-aos="zoom-in" data-aos-delay="150">
                <i class="fas fa-people-arrows"></i>
                <span>Cultural Diversity</span>
            </a>
            <a href="{{ url('/berita') }}" class="quick-item" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-newspaper"></i>
                <span>Berita / Event</span>
            </a>
            <a href="{{ url('/galeri') }}" class="quick-item" data-aos="zoom-in" data-aos-delay="250">
                <i class="fas fa-images"></i>
                <span>Galeri</span>
            </a>
        </div>
    </div>
</section>

<!-- ==================== BERITA TERKINI ==================== -->
<section class="section section-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Berita</span>
            <h2> Berita Terkini</h2>
            <div class="divider"></div>
            <p>Informasi dan perkembangan terbaru seputar Geopark Danau Toba</p>
        </div>
        
        <div class="berita-grid">
            @php
                $beritaList = App\Models\Berita::where('status', true)->latest()->limit(3)->get();
            @endphp
            
            @forelse($beritaList as $item)
            @php
                $imgSrc = asset('image/default.jpg');
                if (!empty($item->gambar)) {
                    if (str_starts_with($item->gambar, 'http')) {
                        $imgSrc = $item->gambar;
                    } elseif (str_starts_with($item->gambar, 'image/berita/')) {
                        $imgSrc = asset($item->gambar);
                    } elseif (file_exists(public_path('image/berita/' . $item->gambar))) {
                        $imgSrc = asset('image/berita/' . $item->gambar);
                    } else {
                        $imgSrc = asset('storage/' . $item->gambar);
                    }
                }
            @endphp
            <div class="berita-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" onclick="window.location.href='{{ url('/berita/' . $item->slug) }}'">
                <img src="{{ $imgSrc }}" alt="{{ $item->judul }}" loading="lazy" onerror="this.src='{{ asset('image/default.jpg') }}'">
                <div class="content">
                    <div class="date">
                        <i class="far fa-calendar-alt"></i>
                        {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                    </div>
                    <h3>{{ Str::limit($item->judul, 45) }}</h3>
                    <p>{{ Str::limit(strip_tags($item->konten), 80) }}</p>
                    <a href="{{ url('/berita/' . $item->slug) }}" class="btn-read">Baca Selengkapnya →</a>
                </div>
            </div>
            @empty
            <div style="text-align:center; padding:50px; color:#94a3b8; grid-column:span 3;">
                <i class="fas fa-newspaper" style="font-size:2.5rem; opacity:0.3; display:block; margin-bottom:10px;"></i>
                <p>Belum ada berita terbaru</p>
            </div>
            @endforelse
        </div>
        
        <div style="text-align:center; margin-top:30px;">
            <a href="{{ url('/berita') }}" class="hero-btn" style="display:inline-block; padding:10px 30px; font-size:0.7rem; background:transparent; border:2px solid var(--gold); color:var(--gold-dark);">
                Lihat Semua Berita →
            </a>
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

<!-- ==================== LIGHTBOX ==================== -->
<div id="lightboxOverlay" class="lightbox-overlay" onclick="closeLightbox()">
    <div class="lightbox-close" onclick="closeLightbox()">&times;</div>
    <div class="lightbox-container" onclick="event.stopPropagation()">
        <img id="lightboxImage" class="lightbox-image" src="" alt="">
        <div class="lightbox-caption">
            <h3 id="lightboxTitle"></h3>
            <p id="lightboxDesc"></p>
        </div>
    </div>
</div>

<!-- ==================== SCRIPTS ==================== -->
<script>
    // ==================== LIGHTBOX ====================
    function openLightbox(imgSrc, title, desc) {
        const overlay = document.getElementById('lightboxOverlay');
        const lightboxImg = document.getElementById('lightboxImage');
        const titleEl = document.getElementById('lightboxTitle');
        const descEl = document.getElementById('lightboxDesc');
        
        if (overlay && lightboxImg) {
            lightboxImg.src = imgSrc;
            titleEl.innerText = title || 'Galeri GeoToba';
            descEl.innerText = desc || 'Keindahan Geosite Danau Toba';
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }
    
    function closeLightbox() {
        const overlay = document.getElementById('lightboxOverlay');
        if (overlay) {
            overlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    }
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeLightbox();
    });

    // ==================== GALERI SCROLL ====================
    function scrollGaleri(direction) {
        const container = document.getElementById('galeriScroll');
        if (container) {
            const scrollAmount = 320;
            container.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
        }
    }

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

    // ==================== AOS ====================
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof AOS !== 'undefined') {
            AOS.init({ duration: 800, once: true, offset: 50, easing: 'ease-out-quad' });
        }
    });
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
<script>
    AOS.init({ duration: 800, once: true, offset: 50, easing: 'ease-out-quad' });
</script>

@endsection