@extends('layouts.app')

@section('title', 'Batu Basiha - Geosite Danau Toba')

@section('content')

<style>
    /* ==================== FONTS & VARIABLES ==================== */
    @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&family=Playfair+Display:wght@400;500;600;700;800&display=swap');
    
    :root {
        --primary: #0a2a4a;
        --primary-light: #1a4a7a;
        --primary-dark: #003366;
        --gold: #c6a43b;
        --gold-light: #e8c45a;
        --gold-dark: #a8882e;
        --text-dark: #1e293b;
        --text-gray: #475569;
        --text-light: #64748b;
        --white: #ffffff;
        --bg-light: #f8fafc;
        --bg-gray: #f1f5f9;
        --shadow-sm: 0 1px 3px rgba(0,0,0,0.05);
        --shadow-md: 0 4px 12px rgba(0,0,0,0.08);
        --shadow-lg: 0 10px 25px rgba(0,0,0,0.1);
        --shadow-xl: 0 20px 40px rgba(0,0,0,0.15);
    }
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: 'Inter', sans-serif;
        color: var(--text-dark);
        overflow-x: hidden;
    }
    
    /* ==================== ANIMATIONS ==================== */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateY(0); opacity: 0.6; }
        50% { transform: translateY(-8px); opacity: 0.3; }
    }
    
    /* ==================== HERO SECTION ==================== */
    .hero-batu {
        height: 100vh;
        max-height: 700px;
        min-height: 500px;
        position: relative;
        overflow: hidden;
        margin-top: 0;
    }
    
    .hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0,51,102,0.5) 0%, rgba(0,0,0,0.4) 100%), url('{{ asset("image/meat/batubasiha1.png") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    
    .hero-content {
        position: absolute;
        bottom: 15%;
        left: 0;
        right: 0;
        text-align: center;
        z-index: 10;
        color: white;
        padding: 0 20px;
    }
    
    .hero-badge {
        display: inline-block;
        background: var(--gold);
        color: var(--primary-dark);
        padding: 6px 20px;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        margin-bottom: 20px;
        animation: fadeInUp 0.8s ease;
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        font-family: 'Playfair Display', serif;
        margin-bottom: 15px;
        text-shadow: 0 2px 15px rgba(0,0,0,0.3);
        animation: fadeInUp 0.8s ease 0.1s both;
        letter-spacing: 2px;
    }
    
    .hero-subtitle {
        font-size: 0.85rem;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        opacity: 0.9;
        animation: fadeInUp 0.8s ease 0.2s both;
    }
    
    .hero-divider {
        width: 60px;
        height: 2px;
        background: var(--gold);
        margin: 25px auto;
        animation: fadeInUp 0.8s ease 0.3s both;
    }
    
    .scroll-indicator {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 15;
        animation: bounce 2s infinite;
        cursor: pointer;
        color: white;
        font-size: 0.6rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
        opacity: 0.7;
    }
    
    .scroll-indicator .line {
        width: 1px;
        height: 30px;
        background: white;
    }
    
    /* ==================== SECTION STYLES ==================== */
    .section {
        padding: 60px 0;
    }
    
    .section-white {
        background: var(--bg-light);
    }
    
    .section-light {
        background: var(--bg-gray);
    }
    
    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .section-header .badge {
        display: inline-block;
        background: rgba(198, 164, 59, 0.12);
        color: var(--gold-dark);
        padding: 4px 14px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 12px;
    }
    
    .section-header h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary-dark);
        font-family: 'Playfair Display', serif;
        margin-bottom: 12px;
    }
    
    .divider {
        width: 50px;
        height: 2px;
        background: var(--gold);
        margin: 0 auto 16px;
        border-radius: 2px;
        transition: width 0.4s ease;
    }
    
    .section-header:hover .divider {
        width: 80px;
    }
    
    .section-header p {
        color: var(--text-light);
        font-size: 0.85rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }
    
    /* ==================== SEJARAH ==================== */
    .sejarah-intro {
        margin-bottom: 40px;
        line-height: 1.8;
        color: var(--text-gray);
        font-size: 0.95rem;
        text-align: justify;
    }
    
    .sejarah-grid {
        display: flex;
        flex-direction: column;
        gap: 50px;
    }
    
    .sejarah-item {
        display: flex;
        align-items: center;
        gap: 40px;
        flex-wrap: wrap;
    }
    
    .sejarah-item.reverse {
        flex-direction: row-reverse;
    }
    
    .sejarah-image {
        flex: 1;
        min-width: 280px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: all 0.4s ease;
        cursor: pointer;
    }
    
    .sejarah-image:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-xl);
    }
    
    .sejarah-image img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    
    .sejarah-image:hover img {
        transform: scale(1.03);
    }
    
    .sejarah-text {
        flex: 1;
        min-width: 280px;
    }
    
    .sejarah-text h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-dark);
        font-family: 'Playfair Display', serif;
        margin-bottom: 16px;
        position: relative;
        display: inline-block;
    }
    
    .sejarah-text h3::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 40px;
        height: 2px;
        background: var(--gold);
        transition: width 0.3s ease;
    }
    
    .sejarah-item:hover .sejarah-text h3::after {
        width: 60px;
    }
    
    .sejarah-text p {
        color: var(--text-gray);
        line-height: 1.7;
        font-size: 0.9rem;
        margin-top: 12px;
        text-align: justify;
    }
    
    .sejarah-text ul {
        padding-left: 1.5rem;
        margin-top: 12px;
        text-align: left;
    }
    
    .sejarah-text ul li {
        margin-bottom: 8px;
        color: var(--text-gray);
        font-size: 0.9rem;
        line-height: 1.6;
    }
    
    /* ==================== FACTS CARDS ==================== */
    .facts-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 50px;
    }
    
    .fact-card {
        background: var(--white);
        padding: 20px 16px;
        border-radius: 18px;
        text-align: center;
        box-shadow: var(--shadow-md);
        transition: all 0.4s ease;
        border-left: 3px solid var(--gold);
        cursor: pointer;
    }
    
    .fact-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-xl);
    }
    
    .fact-card i {
        font-size: 1.8rem;
        color: var(--gold);
        margin-bottom: 12px;
        display: inline-block;
    }
    
    .fact-card h4 {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 6px;
    }
    
    .fact-card p {
        font-size: 0.75rem;
        color: var(--text-light);
        line-height: 1.4;
    }
    
    /* ==================== TIPS CARDS ==================== */
    .tips-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-top: 40px;
    }
    
    .tip-card {
        background: var(--white);
        padding: 18px 15px;
        border-radius: 18px;
        text-align: center;
        box-shadow: var(--shadow-md);
        transition: all 0.4s ease;
        cursor: pointer;
    }
    
    .tip-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-xl);
    }
    
    .tip-card i {
        font-size: 1.6rem;
        color: var(--gold);
        margin-bottom: 10px;
        display: inline-block;
    }
    
    .tip-card h4 {
        font-size: 0.85rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 6px;
    }
    
    .tip-card p {
        font-size: 0.7rem;
        color: var(--text-light);
        line-height: 1.4;
    }
    
    /* ==================== SACRED BOX ==================== */
    .sacred-box {
        background: linear-gradient(135deg, #fef9e6, #fdf4d6);
        border: 1px solid var(--gold-light);
        border-radius: 20px;
        padding: 28px 32px;
        margin-top: 40px;
        text-align: center;
        transition: all 0.4s ease;
    }
    
    .sacred-box:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
        border-color: var(--gold);
    }
    
    .sacred-box h3 {
        color: var(--gold-dark);
        font-family: 'Playfair Display', serif;
        font-size: 1.2rem;
        margin-bottom: 14px;
    }
    
    .sacred-box h3 i {
        margin-right: 8px;
    }
    
    .sacred-box p {
        color: var(--text-gray);
        font-size: 0.85rem;
        line-height: 1.7;
    }
    
    /* ==================== MAPS SECTION ==================== */
    .maps-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
    }
    
    .maps-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: all 0.4s ease;
    }
    
    .maps-container:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-xl);
    }
    
    .maps-container iframe {
        width: 100%;
        height: 320px;
        border: 0;
    }
    
    .rute-info {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .rute-item {
        background: var(--white);
        padding: 18px;
        border-radius: 18px;
        box-shadow: var(--shadow-md);
        transition: all 0.3s ease;
        border-left: 3px solid var(--gold);
    }
    
    .rute-item:hover {
        transform: translateX(5px);
        box-shadow: var(--shadow-lg);
    }
    
    .rute-item h4 {
        font-size: 0.9rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 10px;
    }
    
    .rute-item h4 i {
        color: var(--gold);
        margin-right: 8px;
        width: 22px;
    }
    
    .rute-item p {
        font-size: 0.8rem;
        color: var(--text-gray);
        margin-bottom: 8px;
        line-height: 1.5;
    }
    
    .rute-time {
        font-size: 0.65rem;
        color: var(--gold-dark);
        font-weight: 600;
        display: inline-block;
        padding: 3px 10px;
        background: rgba(198, 164, 59, 0.1);
        border-radius: 20px;
    }
    
    /* ==================== CTA SECTION ==================== */
    .cta-section {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        padding: 50px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .cta-content {
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
        padding: 0 20px;
    }
    
    .cta-content h3 {
        font-size: 1.6rem;
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        margin-bottom: 14px;
        color: var(--white);
    }
    
    .cta-content .divider {
        margin: 0 auto 16px;
        background: var(--gold);
    }
    
    .cta-content p {
        color: rgba(255,255,255,0.85);
        margin-bottom: 25px;
        font-size: 0.85rem;
        line-height: 1.6;
    }
    
    .cta-btn {
        display: inline-block;
        background: var(--gold);
        color: var(--primary-dark);
        padding: 10px 32px;
        border-radius: 50px;
        text-decoration: none;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        transition: all 0.3s ease;
    }
    
    .cta-btn:hover {
        background: var(--white);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    
    /* ==================== LIGHTBOX ==================== */
    .lightbox-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.96);
        z-index: 20000;
        backdrop-filter: blur(12px);
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }
    
    .lightbox-overlay.active {
        display: flex;
    }
    
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
    }
    
    .lightbox-caption {
        margin-top: 15px;
    }
    
    .lightbox-caption h3 {
        color: var(--gold);
        font-size: 1rem;
        font-family: 'Playfair Display', serif;
    }
    
    .lightbox-caption p {
        color: rgba(255,255,255,0.7);
        font-size: 0.75rem;
    }
    
    .lightbox-close {
        position: absolute;
        top: 20px;
        right: 30px;
        color: white;
        font-size: 2rem;
        cursor: pointer;
        background: rgba(0,0,0,0.5);
        width: 45px;
        height: 45px;
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
        .facts-grid { grid-template-columns: repeat(2, 1fr); }
        .tips-grid { grid-template-columns: repeat(2, 1fr); }
        .sejarah-item, .sejarah-item.reverse { 
            flex-direction: column; 
            text-align: center; 
        }
        .sejarah-text h3::after { 
            left: 50%; 
            transform: translateX(-50%); 
        }
        .sejarah-text { 
            text-align: center; 
        }
        .sejarah-text p, .sejarah-intro {
            text-align: center;
        }
        .sejarah-text ul {
            text-align: left;
            display: inline-block;
        }
        .maps-section { 
            grid-template-columns: 1fr; 
        }
    }
    
    @media (max-width: 768px) {
        .hero-batu { 
            height: 80vh; 
            max-height: 600px;
            min-height: 450px;
        }
        .hero-title { 
            font-size: 2rem; 
        }
        .hero-subtitle { 
            font-size: 0.55rem; 
            letter-spacing: 0.15em; 
        }
        .hero-badge { 
            font-size: 0.55rem; 
            padding: 4px 12px; 
            margin-bottom: 12px;
        }
        .hero-divider {
            margin: 15px auto;
            width: 40px;
        }
        .section { 
            padding: 50px 0; 
        }
        .section-header h2 { 
            font-size: 1.4rem; 
        }
        .section-header .badge {
            font-size: 0.6rem;
        }
        .facts-grid { 
            grid-template-columns: 1fr; 
        }
        .tips-grid { 
            grid-template-columns: 1fr; 
        }
        .sejarah-image img { 
            height: 220px; 
        }
        .sejarah-text h3 {
            font-size: 1.3rem;
        }
        .sejarah-text p, .sejarah-intro {
            font-size: 0.85rem;
        }
        .fact-card { 
            padding: 16px 12px; 
        }
        .tip-card { 
            padding: 16px 12px; 
        }
        .sacred-box { 
            padding: 20px 16px; 
        }
        .sacred-box h3 {
            font-size: 1rem;
        }
        .maps-container iframe { 
            height: 250px; 
        }
        .cta-section { 
            padding: 40px 0; 
        }
        .cta-content h3 { 
            font-size: 1.3rem; 
        }
        .lightbox-close {
            top: 10px;
            right: 15px;
            width: 35px;
            height: 35px;
            font-size: 1.5rem;
        }
        .lightbox-caption h3 {
            font-size: 0.9rem;
        }
    }
    
    @media (max-width: 480px) {
        .hero-title { 
            font-size: 1.6rem; 
        }
        .hero-subtitle {
            font-size: 0.5rem;
            letter-spacing: 0.1em;
        }
        .hero-badge {
            font-size: 0.5rem;
            padding: 3px 10px;
        }
        .container { 
            padding: 0 16px; 
        }
        .section-header h2 { 
            font-size: 1.2rem; 
        }
        .section-header p {
            font-size: 0.8rem;
        }
        .sejarah-image img { 
            height: 180px; 
        }
        .sejarah-text h3 {
            font-size: 1.1rem;
        }
        .sejarah-text p, .sejarah-intro {
            font-size: 0.8rem;
        }
        .sejarah-text ul li {
            font-size: 0.8rem;
        }
        .rute-item {
            padding: 14px;
        }
        .rute-item h4 {
            font-size: 0.85rem;
        }
        .rute-item p {
            font-size: 0.75rem;
        }
        .cta-content h3 {
            font-size: 1.2rem;
        }
        .cta-btn {
            padding: 8px 20px;
            font-size: 0.6rem;
        }
    }
</style>

<!-- ==================== HERO SECTION ==================== -->
<section class="hero-batu" id="home">
    <div class="hero-bg"></div>
    <div class="hero-content" data-aos="fade-up">
        <div class="hero-badge">UNESCO Global Geopark</div>
        <h1 class="hero-title">BATU BASIHA</h1>
        <p class="hero-subtitle">Desa Aek Bolon Jae · Balige · UNESCO Global Geopark</p>
        <div class="hero-divider"></div>
    </div>
    <div class="scroll-indicator" onclick="document.getElementById('sejarah').scrollIntoView({behavior:'smooth'})">
        <span>SCROLL</span>
        <div class="line"></div>
    </div>
</section>

<!-- ==================== SEJARAH & LEGENDA ==================== -->
<section id="sejarah" class="section section-white">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Warisan Geologi</span>
            <h2>Sejarah & Legenda</h2>
            <div class="divider"></div>
            <p>Menyimpan bukti letusan dahsyat 74.000 tahun lalu dan legenda yang hidup di masyarakat</p>
        </div>
        
        <div class="sejarah-intro" data-aos="fade-up">
            <p>Geosite Batu Basiha adalah bebatuan yang berada di <strong>Desa Aek Bolon Jae, Kecamatan Balige, Kabupaten Toba, Provinsi Sumatera Utara</strong>. Situs ini merupakan salah satu peninggalan sejarah yang terbentuk dari <strong>pecahan batu akibat letusan Gunung Api Toba</strong> yang terjadi sekitar <strong>74.000 tahun lalu</strong> — salah satu letusan supervolcano terdahsyat dalam sejarah bumi.</p>
            <p style="margin-top: 12px;">Batu Basiha merupakan <strong>satu di antara 16 geosite</strong> yang telah diakui Dewan Eksekutif UNESCO pada <strong>7 Juli 2020</strong>, menjadikan Danau Toba sebagai anggota resmi <strong>UNESCO Global Geopark</strong>. Pengakuan ini menempatkan Batu Basiha sebagai warisan geologi bertaraf internasional yang wajib dijaga kelestariannya.</p>
        </div>
        
        <div class="facts-grid" data-aos="fade-up">
            <div class="fact-card" onclick="openLightbox('{{ asset('image/meat/batubasiha1.png') }}', 'Lokasi Batu Basiha', 'Desa Aek Bolon Jae, Kecamatan Balige, Kabupaten Toba')">
                <i class="fas fa-map-marker-alt"></i>
                <h4>Lokasi</h4>
                <p>Desa Aek Bolon Jae, Kecamatan Balige, Kabupaten Toba</p>
            </div>
            <div class="fact-card" onclick="openLightbox('{{ asset('image/meat/batubasiha1.png') }}', 'Status UNESCO', '1 dari 16 geosite, diakui 7 Juli 2020')">
                <i class="fas fa-globe-asia"></i>
                <h4>Status UNESCO</h4>
                <p>1 dari 16 geosite, diakui 7 Juli 2020</p>
            </div>
            <div class="fact-card" onclick="openLightbox('{{ asset('image/meat/batubasiha1.png') }}', 'Terbentuk', 'Letusan Gunung Toba ~74.000 tahun lalu')">
                <i class="fas fa-mountain"></i>
                <h4>Terbentuk</h4>
                <p>Letusan Gunung Toba ~74.000 tahun lalu</p>
            </div>
            <div class="fact-card" onclick="openLightbox('{{ asset('image/meat/batubasiha1.png') }}', 'Pengembangan', 'Kawasan ekowisata dan agrowisata')">
                <i class="fas fa-tree"></i>
                <h4>Pengembangan</h4>
                <p>Kawasan ekowisata dan agrowisata</p>
            </div>
        </div>
        
        <div class="sejarah-grid">
            <div class="sejarah-item" data-aos="fade-up">
                <div class="sejarah-image" onclick="openLightbox('{{ asset('image/meat/batu-bahisan.jpg') }}', 'Legenda Batu Basiha', 'Batu dari kayu yang berubah menjadi batu')">
                    <img src="{{ asset('image/meat/batu-bahisan.jpg') }}" alt="Batu Basiha - Asal Usul Nama" loading="lazy">
                </div>
                <div class="sejarah-text">
                    <h3>Legenda "Batu Sian Hau"</h3>
                    <p>Nama <strong>Batu Basiha</strong> diambil dari bahasa Batak, yaitu <em>"Batu Sian Hau"</em> yang berarti <strong>"batu dari kayu"</strong>. Menurut penuturan Tokoh Adat Desa Aek Bolon, Timbul Napitupulu, nama ini merujuk pada cerita turun-temurun yang dipercaya masyarakat selama berabad-abad.</p>
                    <p>Berdasarkan mitologi setempat, bebatuan yang bertumpuk ini dahulu merupakan tumpukan kayu milik leluhur bernama Oppung Manggak Napitupulu. Sebelum pembangunan rumah dimulai, seekor harimau misterius muncul memberikan peringatan — namun peringatan itu diabaikan. Akhirnya petir menyambar tumpukan kayu tersebut dan mengubahnya menjadi batu seketika.</p>
                </div>
            </div>
            
            <div class="sejarah-item reverse" data-aos="fade-up" data-aos-delay="100">
                <div class="sejarah-image" onclick="openLightbox('{{ asset('image/meat/batubasiha1.png') }}', 'Batuan Andesit Kekar Kolom', 'Formasi batuan unik hasil letusan Gunung Toba')">
                    <img src="{{ asset('image/meat/batubasiha1.png') }}" alt="Batuan Andesit Kekar Kolom Batu Basiha" loading="lazy">
                </div>
                <div class="sejarah-text">
                    <h3>Warisan Geologi 74.000 Tahun</h3>
                    <p>Secara ilmiah, Batu Basiha adalah <strong>bukti nyata letusan maha dahsyat Gunung Api Toba</strong> yang terjadi sekitar <strong>74.000 tahun yang lalu</strong>. Letusan supervolcano ini merupakan salah satu yang terbesar dalam sejarah bumi dan membentuk Kaldera Toba.</p>
                    <p>Formasi batuan di lokasi ini berupa <strong>batuan andesit kekar kolom horizontal</strong> — tumpukan balok batu besar yang tersusun rapi. Struktur ini terbentuk dari magma yang mengalir saat letusan, kemudian membeku perlahan dan mengalami kontraksi teratur, menciptakan pola retakan geometris yang langka.</p>
                </div>
            </div>
            
            <div class="sejarah-item" data-aos="fade-up" data-aos-delay="200">
                <div class="sejarah-image" onclick="openLightbox('{{ asset('image/meat/batubasiha2.jpg') }}', 'Pengakuan UNESCO', 'Batu Basiha sebagai UNESCO Global Geopark')">
                    <img src="{{ asset('image/meat/batubasiha2.jpg') }}" alt="Batu Basiha UNESCO Global Geopark" loading="lazy">
                </div>
                <div class="sejarah-text">
                    <h3>Pengakuan UNESCO</h3>
                    <p>Batu Basiha secara resmi telah diakui sebagai <strong>satu dari 16 geosite</strong> dalam kawasan Danau Toba oleh UNESCO pada <strong>7 Juli 2020</strong>. Pengakuan ini menjadikan Danau Toba sebagai <strong>UNESCO Global Geopark</strong> — penghargaan bergengsi bagi kawasan dengan nilai geologi, kebudayaan, dan keanekaragaman hayati yang luar biasa.</p>
                    <p>Pemerintah kabupaten akan mengembangkan Geosite Batu Basiha menjadi <strong>lokasi ekowisata dan agrowisata</strong>, menggabungkan keindahan alam dengan kehidupan sehari-hari masyarakat. Jalan setapak menuju kawasan juga telah dibangun untuk memudahkan akses wisatawan.</p>
                </div>
            </div>
        </div>
        
        <div class="sacred-box" data-aos="fade-up">
            <h3><i class="fas fa-star"></i> Situs Keramat yang Disakralkan Masyarakat</h3>
            <p>Batu Basiha bukan sekadar formasi batuan biasa. Situs ini merupakan lokasi keramat yang sangat disakralkan masyarakat setempat secara turun-temurun. Mitos tentang harimau dan petir yang mengubah kayu menjadi batu telah menjadi warisan lisan yang hidup dan terus dilestarikan oleh warga Desa Aek Bolon. Kepercayaan ini mencerminkan kearifan lokal Batak dalam konservasi lingkungan — bahwa alam harus dihormati dan dijaga, bukan dieksploitasi sembarangan.</p>
        </div>
    </div>
</section>

<!-- ==================== INFORMASI PRAKTIS ==================== -->
<section id="informasi" class="section section-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Panduan Wisata</span>
            <h2>Informasi Praktis</h2>
            <div class="divider"></div>
            <p>Panduan lengkap sebelum mengunjungi Geosite Batu Basiha</p>
        </div>
        
        <div class="sejarah-grid">
            <div class="sejarah-item" data-aos="fade-up">
                <div class="sejarah-image" onclick="openLightbox('{{ asset('image/meat/batubasiha1.png') }}', 'Balige Kota Toba', 'Pusat peradaban Batak Toba')">
                    <img src="{{ asset('image/meat/batubasiha1.png') }}" alt="Balige Pusat Peradaban Toba" loading="lazy">
                </div>
                <div class="sejarah-text">
                    <h3>Balige: Jantung Peradaban Toba</h3>
                    <p>Kunjungan ke Batu Basiha dapat dikombinasikan dengan menjelajahi <strong>Kota Balige</strong>, salah satu pusat peradaban Batak Toba dengan ragam warisan sejarah dan budaya. Di Balige terdapat <strong>Museum Batak TB Silalahi</strong> yang memiliki koleksi terlengkap tentang kebudayaan Batak Toba.</p>
                    <p>Dari Balige, wisatawan juga dapat melanjutkan perjalanan ke berbagai geosite lain dalam jaringan <strong>UNESCO Global Geopark Danau Toba</strong>, seperti Bukit Tarabunga, Lumban Silintong, hingga Desa Meat.</p>
                </div>
            </div>
            
            <div class="sejarah-item reverse" data-aos="fade-up" data-aos-delay="100">
                <div class="sejarah-image" onclick="openLightbox('{{ asset('image/meat/batu-bahisan.jpg') }}', 'Ekowisata Batu Basiha', 'Perpaduan geologi dan agrowisata')">
                    <img src="{{ asset('image/meat/batu-bahisan.jpg') }}" alt="Ekowisata Agrowisata Batu Basiha" loading="lazy">
                </div>
                <div class="sejarah-text">
                    <h3>Ekowisata & Agrowisata</h3>
                    <p>Kawasan sekitar Batu Basiha dikembangkan menjadi <strong>destinasi ekowisata dan agrowisata</strong>. Di sekitar situs, wisatawan dapat menikmati:</p>
                    <ul>
                        <li>Hamparan <strong>sawah dan ladang</strong> milik masyarakat lokal</li>
                        <li>Kehidupan sehari-hari masyarakat Batak di Desa Aek Bolon</li>
                        <li>Panorama perbukitan hijau khas Danau Toba</li>
                        <li>Pembelajaran <strong>geologi vulkanik</strong> dari pemandu lokal</li>
                        <li>Interaksi budaya dengan masyarakat Suku Batak Toba</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="tips-grid" data-aos="fade-up">
            <div class="tip-card" onclick="openLightbox('{{ asset('image/meat/batubasiha1.png') }}', 'Waktu Kunjungan', 'Pagi hingga sore hari')">
                <i class="fas fa-sun"></i>
                <h4>Waktu Kunjungan</h4>
                <p>Pagi hingga sore hari. Pagi hari disarankan untuk udara segar dan cahaya terbaik untuk fotografi.</p>
            </div>
            <div class="tip-card" onclick="openLightbox('{{ asset('image/meat/batubasiha1.png') }}', 'Persiapan Fisik', 'Gunakan alas kaki nyaman')">
                <i class="fas fa-shoe-prints"></i>
                <h4>Persiapan Fisik</h4>
                <p>Gunakan alas kaki nyaman. Jalan setapak tersedia namun medan perbukitan perlu kewaspadaan.</p>
            </div>
            <div class="tip-card" onclick="openLightbox('{{ asset('image/meat/batubasiha1.png') }}', 'Hormati Adat', 'Situs keramat yang disakralkan')">
                <i class="fas fa-hand-sparkles"></i>
                <h4>Hormati Adat</h4>
                <p>Situs keramat, harap bersikap sopan, tidak membuang sampah, dan tidak merusak formasi batuan.</p>
            </div>
            <div class="tip-card" onclick="openLightbox('{{ asset('image/meat/batubasiha1.png') }}', 'Fotografi', 'Spot foto unik')">
                <i class="fas fa-camera"></i>
                <h4>Fotografi</h4>
                <p>Formasi batu andesit menawarkan latar foto unik dan langka dengan latar perbukitan.</p>
            </div>
        </div>
    </div>
</section>

<!-- ==================== LOKASI & AKSES ==================== -->
<section id="lokasi" class="section section-white">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Lokasi</span>
            <h2>Lokasi & Akses</h2>
            <div class="divider"></div>
            <p>Lokasi strategis di Perbukitan Sibodiala, mudah diakses dari Balige</p>
        </div>
        
        <div class="maps-section">
            <div class="maps-container" data-aos="fade-right">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0!2d99.0835095!3d2.3339262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0415b8f7da39%3A0xc6beb74287f355a5!2sBalige%2C%20Toba%20Samosir%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" allowfullscreen loading="lazy" title="Peta Lokasi Batu Basiha"></iframe>
            </div>
            <div class="rute-info" data-aos="fade-left">
                <div class="rute-item">
                    <h4><i class="fas fa-motorcycle"></i> Dengan Motor</h4>
                    <p>Balige → Aek Bolon Jae (15 menit) → Perbukitan Sibodiala (5 menit)</p>
                    <span class="rute-time">⏱️ ± 20 menit</span>
                </div>
                <div class="rute-item">
                    <h4><i class="fas fa-car"></i> Dengan Mobil</h4>
                    <p>Balige → Aek Bolon Jae (15 menit) → Parkir → Jalan setapak menuju geosite</p>
                    <span class="rute-time">⏱️ ± 25 menit</span>
                </div>
                <div class="rute-item">
                    <h4><i class="fas fa-bus"></i> Transportasi Umum</h4>
                    <p>Tersedia angkutan umum dari pusat Kota Balige menuju Desa Aek Bolon Jae</p>
                    <span class="rute-time">Setiap hari</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== CTA SECTION ==================== -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h3>Jelajahi Keajaiban Batu Basiha</h3>
            <div class="divider"></div>
            <p>Warisan Geologi 74.000 Tahun — Diakui UNESCO Global Geopark · Desa Aek Bolon, Balige</p>
            <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
        </div>
    </div>
</section>

<!-- ==================== LIGHTBOX ZOOM ==================== -->
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

<script>
    // ==================== LIGHTBOX FUNCTION ====================
    function openLightbox(imgSrc, title, desc) {
        const overlay = document.getElementById('lightboxOverlay');
        const lightboxImg = document.getElementById('lightboxImage');
        const titleEl = document.getElementById('lightboxTitle');
        const descEl = document.getElementById('lightboxDesc');
        
        if (overlay && lightboxImg) {
            lightboxImg.src = imgSrc;
            titleEl.innerText = title || 'Batu Basiha';
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
    
    // Escape key to close
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 600,
        once: true,
        offset: 40,
        easing: 'ease-out-quad'
    });
</script>

@endsection