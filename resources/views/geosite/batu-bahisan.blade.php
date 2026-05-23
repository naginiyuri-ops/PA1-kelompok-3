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
    }
    
    /* ==================== ANIMATIONS ==================== */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes fadeInLeft {
        from { opacity: 0; transform: translateX(-40px); }
        to { opacity: 1; transform: translateX(0); }
    }
    
    @keyframes fadeInRight {
        from { opacity: 0; transform: translateX(40px); }
        to { opacity: 1; transform: translateX(0); }
    }
    
    @keyframes zoomIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.02); }
    }
    
    /* ==================== HERO SECTION ==================== */
    .hero-batu {
        height: 85vh;
        min-height: 600px;
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
        bottom: 20%;
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
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 15;
        animation: bounce 2s infinite;
        cursor: pointer;
        color: white;
        font-size: 0.65rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        opacity: 0.7;
    }
    
    .scroll-indicator .line {
        width: 1px;
        height: 35px;
        background: white;
        transition: height 0.3s ease;
    }
    
    .scroll-indicator:hover .line {
        height: 50px;
        background: var(--gold);
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateX(-50%) translateY(0); opacity: 0.7; }
        50% { transform: translateX(-50%) translateY(-8px); opacity: 0.3; }
    }
    
    /* ==================== SECTION STYLES ==================== */
    .section {
        padding: 80px 0;
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
        padding: 0 24px;
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 55px;
    }
    
    .section-header .badge {
        display: inline-block;
        background: rgba(198, 164, 59, 0.12);
        color: var(--gold-dark);
        padding: 5px 16px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 15px;
    }
    
    .section-header h2 {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--primary-dark);
        font-family: 'Playfair Display', serif;
        margin-bottom: 15px;
    }
    
    .divider {
        width: 60px;
        height: 2px;
        background: var(--gold);
        margin: 0 auto 20px;
        border-radius: 2px;
        transition: width 0.4s ease;
    }
    
    .section-header:hover .divider {
        width: 100px;
    }
    
    .section-header p {
        color: var(--text-light);
        font-size: 0.9rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.7;
    }
    
    /* ==================== SEJARAH (TANPA KOTAK, HALUS) ==================== */
    .sejarah-grid {
        display: flex;
        flex-direction: column;
        gap: 60px;
    }
    
    .sejarah-item {
        display: flex;
        align-items: center;
        gap: 60px;
        flex-wrap: wrap;
    }
    
    .sejarah-item.reverse {
        flex-direction: row-reverse;
    }
    
    .sejarah-image {
        flex: 1;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: all 0.4s ease;
    }
    
    .sejarah-image:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }
    
    .sejarah-image img {
        width: 100%;
        height: 340px;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    
    .sejarah-image:hover img {
        transform: scale(1.03);
    }
    
    .sejarah-text {
        flex: 1;
    }
    
    .sejarah-text h3 {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary-dark);
        font-family: 'Playfair Display', serif;
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }
    
    .sejarah-text h3::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 50px;
        height: 2px;
        background: var(--gold);
        transition: width 0.3s ease;
    }
    
    .sejarah-item:hover .sejarah-text h3::after {
        width: 80px;
    }
    
    .sejarah-text p {
        color: var(--text-gray);
        line-height: 1.8;
        font-size: 1rem;
        margin-top: 15px;
    }
    
    /* ==================== FACTS CARDS ==================== */
    .facts-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        margin-bottom: 60px;
    }
    
    .fact-card {
        background: var(--white);
        padding: 24px 20px;
        border-radius: 20px;
        text-align: center;
        box-shadow: var(--shadow-md);
        transition: all 0.4s ease;
        border-left: 4px solid var(--gold);
    }
    
    .fact-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }
    
    .fact-card i {
        font-size: 2rem;
        color: var(--gold);
        margin-bottom: 15px;
        display: inline-block;
        transition: transform 0.3s ease;
    }
    
    .fact-card:hover i {
        transform: scale(1.1);
    }
    
    .fact-card h4 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 8px;
    }
    
    .fact-card p {
        font-size: 0.8rem;
        color: var(--text-light);
        line-height: 1.5;
    }
    
    /* ==================== TIPS CARDS ==================== */
    .tips-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        margin-top: 40px;
    }
    
    .tip-card {
        background: var(--white);
        padding: 22px 18px;
        border-radius: 20px;
        text-align: center;
        box-shadow: var(--shadow-md);
        transition: all 0.4s ease;
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    .tip-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-xl);
        border-color: var(--gold-light);
    }
    
    .tip-card i {
        font-size: 1.8rem;
        color: var(--gold);
        margin-bottom: 12px;
        display: inline-block;
    }
    
    .tip-card h4 {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 8px;
    }
    
    .tip-card p {
        font-size: 0.75rem;
        color: var(--text-light);
        line-height: 1.5;
    }
    
    /* ==================== SACRED BOX ==================== */
    .sacred-box {
        background: linear-gradient(135deg, #fef9e6, #fdf4d6);
        border: 1px solid var(--gold-light);
        border-radius: 24px;
        padding: 32px 40px;
        margin-top: 50px;
        text-align: center;
        transition: all 0.4s ease;
    }
    
    .sacred-box:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
        border-color: var(--gold);
    }
    
    .sacred-box h3 {
        color: var(--gold-dark);
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        margin-bottom: 16px;
    }
    
    .sacred-box h3 i {
        margin-right: 8px;
    }
    
    .sacred-box p {
        color: var(--text-gray);
        font-size: 0.95rem;
        line-height: 1.8;
    }
    
    /* ==================== MAPS SECTION ==================== */
    .maps-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }
    
    .maps-container {
        border-radius: 24px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: all 0.4s ease;
    }
    
    .maps-container:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-xl);
    }
    
    .maps-container iframe {
        width: 100%;
        height: 380px;
        border: 0;
    }
    
    .rute-info {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }
    
    .rute-item {
        background: var(--white);
        padding: 22px;
        border-radius: 20px;
        box-shadow: var(--shadow-md);
        transition: all 0.3s ease;
        border-left: 4px solid var(--gold);
    }
    
    .rute-item:hover {
        transform: translateX(8px);
        box-shadow: var(--shadow-lg);
    }
    
    .rute-item h4 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 12px;
    }
    
    .rute-item h4 i {
        color: var(--gold);
        margin-right: 10px;
        width: 24px;
    }
    
    .rute-item p {
        font-size: 0.85rem;
        color: var(--text-gray);
        margin-bottom: 10px;
        line-height: 1.5;
    }
    
    .rute-time {
        font-size: 0.7rem;
        color: var(--gold-dark);
        font-weight: 600;
        display: inline-block;
        padding: 4px 12px;
        background: rgba(198, 164, 59, 0.1);
        border-radius: 20px;
    }
    
    /* ==================== CTA SECTION ==================== */
    .cta-section {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
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
        background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
        animation: rotate 25s linear infinite;
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
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        margin-bottom: 18px;
        color: var(--white);
    }
    
    .cta-content .divider {
        margin: 0 auto 20px;
        background: var(--gold);
    }
    
    .cta-content p {
        color: rgba(255,255,255,0.85);
        margin-bottom: 30px;
        font-size: 0.95rem;
        line-height: 1.7;
    }
    
    .cta-btn {
        display: inline-block;
        background: var(--gold);
        color: var(--primary-dark);
        padding: 12px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        transition: all 0.3s ease;
    }
    
    .cta-btn:hover {
        background: var(--white);
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }
    
    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 1024px) {
        .hero-title { font-size: 3rem; }
        .facts-grid { grid-template-columns: repeat(2, 1fr); }
        .tips-grid { grid-template-columns: repeat(2, 1fr); }
    }
    
    @media (max-width: 992px) {
        .sejarah-item, .sejarah-item.reverse { flex-direction: column; text-align: center; }
        .sejarah-text h3::after { left: 50%; transform: translateX(-50%); }
        .sejarah-text { text-align: center; }
        .sejarah-image img { height: 280px; }
        .maps-section { grid-template-columns: 1fr; }
        .hero-title { font-size: 2.8rem; }
    }
    
    @media (max-width: 768px) {
        .hero-batu { height: 70vh; min-height: 500px; }
        .hero-title { font-size: 2rem; }
        .hero-subtitle { font-size: 0.65rem; letter-spacing: 0.2em; }
        .hero-badge { font-size: 0.6rem; padding: 4px 14px; }
        .section { padding: 60px 0; }
        .section-header h2 { font-size: 1.6rem; }
        .facts-grid { grid-template-columns: 1fr; }
        .tips-grid { grid-template-columns: 1fr; }
        .sejarah-image img { height: 230px; }
        .maps-container iframe { height: 280px; }
        .cta-section { padding: 50px 0; }
        .cta-content h3 { font-size: 1.5rem; }
        .sacred-box { padding: 24px 20px; }
    }
    
    @media (max-width: 480px) {
        .hero-title { font-size: 1.6rem; }
        .container { padding: 0 16px; }
        .section-header h2 { font-size: 1.4rem; }
        .fact-card { padding: 18px 15px; }
        .tip-card { padding: 18px 15px; }
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
        
        <!-- Paragraf Pengantar -->
        <div class="sejarah-intro" style="margin-bottom: 50px; line-height: 1.9; color: var(--text-gray); font-size: 1rem;" data-aos="fade-up">
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
        <div class="facts-grid" data-aos="fade-up">
            <div class="fact-card">
                <i> </i>
                <h4>Lokasi</h4>
                <p>Desa Aek Bolon Jae, Kecamatan Balige, Kabupaten Toba, Sumatera Utara</p>
            </div>
            <div class="fact-card">
                <i ></i>
                <h4>Status UNESCO</h4>
                <p>1 dari 16 geosite UNESCO Global Geopark, diakui 7 Juli 2020</p>
            </div>
            <div class="fact-card">
                <i ></i>
                <h4>Terbentuk</h4>
                <p>Letusan Gunung Api Toba ~74.000 tahun lalu — batuan andesit kekar kolom horizontal</p>
            </div>
            <div class="fact-card">
                <i></i>
                <h4>Pengembangan</h4>
                <p>Dikembangkan sebagai kawasan ekowisata dan agrowisata oleh Pemkab Toba</p>
            </div>
        </div>
        
        <!-- Blok Sejarah: Layout Bersilang -->
        <div class="sejarah-grid">
            
            <!-- 1: Asal-usul Nama & Legenda -->
            <div class="sejarah-item" data-aos="fade-up">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/batu-bahisan.jpg') }}" alt="Batu Basiha - Asal Usul Nama">
                </div>
                <div class="sejarah-text">
                    <h3>Legenda "Batu Sian Hau" — Batu dari Kayu</h3>
                    <p>Nama <strong>Batu Basiha</strong> diambil dari bahasa Batak, yaitu <em>"Batu Sian Hau"</em> yang berarti <strong>"batu dari kayu"</strong>. 
                        Menurut penuturan Tokoh Adat Desa Aek Bolon, Timbul Napitupulu, nama ini merujuk pada cerita turun-temurun 
                        yang dipercaya masyarakat selama berabad-abad.</p>
                    <p>Berdasarkan mitologi masyarakat setempat, bebatuan yang bertumpuk di lokasi ini dahulu merupakan 
                        <strong>tumpukan kayu milik leluhur bernama Oppung Manggak Napitupulu</strong>, yang dipersiapkan untuk membangun 
                        sebuah rumah adat Batak. Sebelum pembangunan dimulai, seekor <strong>harimau misterius</strong> muncul memberikan 
                        peringatan agar nenek moyang tidak membangun rumah di tempat tersebut — namun peringatan itu diabaikan. 
                        Akhirnya petir menyambar tumpukan kayu tersebut, dan secara ajaib mengubahnya menjadi batu seketika.</p>
                    <p>Kisah ini kemudian dipercaya oleh segenap warga Aek Bolon dan terus dilestarikan secara turun-temurun. 
                        Kepala Desa Aek Bolon, Dapot Simanjuntak, menyebutkan bahwa sebagian besar masyarakat meyakini 
                        mitos ini sebagai <strong>peringatan untuk menjaga alam dan tidak merusak lingkungan</strong>.</p>
                </div>
            </div>
            
            <!-- 2: Nilai Geologi -->
            <div class="sejarah-item reverse" data-aos="fade-up" data-aos-delay="100">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/batubasiha1.png') }}" alt="Batuan Andesit Kekar Kolom Batu Basiha">
                </div>
                <div class="sejarah-text">
                    <h3>Warisan Geologi: Bukti Letusan Purba Gunung Toba</h3>
                    <p>Secara ilmiah, Batu Basiha adalah <strong>bukti nyata letusan maha dahsyat Gunung Api Toba</strong> yang terjadi 
                        sekitar <strong>74.000 tahun yang lalu</strong>. Letusan supervolcano ini merupakan salah satu yang terbesar 
                        dalam sejarah bumi dan membentuk Kaldera Toba — cekungan raksasa yang kini menjadi Danau Toba.</p>
                    <p>Formasi batuan di lokasi ini berupa <strong>batuan andesit kekar kolom horizontal</strong> — tumpukan balok batu 
                        besar yang tersusun rapi dengan variasi bentuk yang unik. Struktur kekar kolom ini terbentuk dari 
                        magma yang mengalir keluar saat letusan, kemudian membeku perlahan dan mengalami kontraksi teratur, 
                        menciptakan pola retakan geometris yang khas dan langka. Batu Basiha berada di <strong>Perbukitan Sibodiala</strong>, 
                        menjadikannya salah satu situs geologi paling menarik di kawasan Danau Toba.</p>
                    <p>Keunikan geologis ini selaras dengan keanekaragaman hayati dan kebudayaan masyarakat sekitarnya, 
                        memperkuat posisi Batu Basiha sebagai geosite dengan nilai multidimensi — geologi, ekologi, dan budaya.</p>
                </div>
            </div>
            
            <!-- 3: Pengakuan UNESCO & Pengembangan -->
            <div class="sejarah-item" data-aos="fade-up" data-aos-delay="200">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/batubasiha2.jpg') }}" alt="Batu Basiha UNESCO Global Geopark">
                </div>
                <div class="sejarah-text">
                    <h3>Pengakuan UNESCO Global Geopark & Pengembangan Wisata</h3>
                    <p>Batu Basiha secara resmi telah diakui sebagai <strong>satu dari 16 geosite</strong> dalam kawasan Danau Toba 
                        oleh Dewan Eksekutif UNESCO pada <strong>7 Juli 2020</strong>. Pengakuan ini menjadikan Danau Toba sebagai 
                        <strong>UNESCO Global Geopark</strong> — sebuah penghargaan bergengsi bagi kawasan dengan nilai geologi, 
                        kebudayaan, dan keanekaragaman hayati yang luar biasa.</p>
                    <p>Kepala Dinas Pariwisata dan Kebudayaan Kabupaten Toba, <strong>Jhon Piter Silalahi</strong>, menyatakan bahwa 
                        pemerintah kabupaten akan mengembangkan Geosite Batu Basiha dan kawasan sekitarnya menjadi 
                        <strong>lokasi ekowisata dan agrowisata</strong>. 
                        <em>"Di sana ada sawah, ada juga kehidupan sehari-hari masyarakat. Jadi, ini akan digabungkan dengan 
                        agrowisata maupun ekowisata yang ada di sana,"</em> kata Jhon Piter.</p>
                    <p>Sebagai bagian dari pengembangan, pemerintah daerah juga telah membangun <strong>jalan setapak menuju 
                        kawasan Geosite Batu Basiha</strong> untuk memudahkan akses wisatawan. Warisan geologi yang dulunya hanya 
                        dikenal dalam lingkup lokal, kini terbuka bagi wisatawan nusantara maupun mancanegara.</p>
                </div>
            </div>
        </div>
        
        <!-- Kotak Nilai Kesakralan -->
        <div class="sacred-box" data-aos="fade-up">
            <h3><i class="fas fa-star"></i> Situs Keramat yang Disakralkan Masyarakat</h3>
            <p>Batu Basiha bukan sekadar formasi batuan biasa. Situs ini merupakan <strong>lokasi keramat yang sangat disakralkan 
                masyarakat setempat secara turun-temurun hingga saat ini</strong>. Mitos tentang harimau dan petir yang mengubah kayu 
                menjadi batu telah menjadi warisan lisan yang hidup dan terus dilestarikan oleh warga Desa Aek Bolon kepada 
                anak-cucu mereka. Kepercayaan ini sekaligus mencerminkan kearifan lokal Batak dalam konservasi lingkungan — 
                bahwa alam harus dihormati dan dijaga, bukan dieksploitasi sembarangan.</p>
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
    
            
            <!-- Ekowisata & Agrowisata -->
            <div class="sejarah-item reverse" data-aos="fade-up" data-aos-delay="100">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/batu-bahisan.jpg') }}" alt="Ekowisata Agrowisata Batu Basiha">
                </div>
                <div class="sejarah-text">
                    <h3>Ekowisata & Agrowisata</h3>
                    <p>Kawasan sekitar Batu Basiha dikembangkan oleh Pemerintah Kabupaten Toba menjadi 
                        <strong>destinasi ekowisata dan agrowisata</strong>. Di sekitar situs, wisatawan dapat menikmati:</p>
                    <ul style="padding-left: 1.5rem; margin-top: 15px;">
                        <li style="margin-bottom: 8px;">Hamparan <strong>sawah dan ladang</strong> milik masyarakat lokal</li>
                        <li style="margin-bottom: 8px;">Kehidupan sehari-hari masyarakat Batak di Desa Aek Bolon</li>
                        <li style="margin-bottom: 8px;">Panorama perbukitan hijau khas kawasan Danau Toba</li>
                        <li style="margin-bottom: 8px;">Pembelajaran langsung tentang <strong>geologi vulkanik</strong> dari pemandu lokal</li>
                        <li style="margin-bottom: 8px;">Interaksi budaya dengan masyarakat Suku Batak Toba</li>
                    </ul>
                </div>
            </div>
            
            <!-- Balige & Museum Batak -->
            <div class="sejarah-item" data-aos="fade-up" data-aos-delay="200">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/batubasiha1.png') }}" alt="Balige Pusat Peradaban Toba">
                </div>
                <div class="sejarah-text">
                    <h3> Balige: Jantung Peradaban Toba</h3>
                    <p>Kunjungan ke Batu Basiha dapat dikombinasikan dengan menjelajahi <strong>Kota Balige</strong>, 
                        salah satu pusat peradaban Batak Toba dengan ragam warisan sejarah dan budaya. 
                        Di Balige terdapat <strong>Museum Batak TB Silalahi</strong> yang memiliki koleksi terlengkap tentang 
                        kebudayaan Batak Toba — mulai dari ulos, senjata tradisional, hingga dokumen sejarah.</p>
                    <p>Dari Balige, wisatawan juga dapat melanjutkan perjalanan ke berbagai geosite lain 
                        dalam jaringan <strong>UNESCO Global Geopark Danau Toba</strong>, seperti Bukit Tarabunga, 
                        Lumban Silintong, hingga Desa Meat yang terkenal dengan sawah terasering dan tenun ulosnya.</p>
                </div>
            </div>
        </div>
        
        <!-- Tips Kunjungan -->
        <div class="tips-grid" data-aos="fade-up">
            <div class="tip-card">
                <i></i>
                <h4>Waktu Kunjungan</h4>
                <p>Pagi hingga sore hari. Pagi hari disarankan untuk menikmati udara segar perbukitan dan cahaya terbaik untuk fotografi.</p>
            </div>
            <div class="tip-card">
                <h4>Persiapan Fisik</h4>
                <p>Gunakan alas kaki yang nyaman. Jalan setapak telah dibangun, namun medan perbukitan tetap memerlukan kewaspadaan.</p>
            </div>
            <div class="tip-card">
                <i></i>
                <h4>Hormati Adat Setempat</h4>
                <p>Batu Basiha adalah situs keramat. Harap bersikap sopan, tidak membuang sampah, dan tidak merusak formasi batuan.</p>
            </div>
            <div class="tip-card">
                <h4>Fotografi</h4>
                <p>Formasi batu balok andesit yang tersusun rapi menawarkan latar foto yang unik dan langka dengan latar perbukitan.</p>
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0!2d99.0835095!3d2.3339262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0415b8f7da39%3A0xc6beb74287f355a5!2sBalige%2C%20Toba%20Samosir%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" allowfullscreen loading="lazy"></iframe>
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

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50,
        easing: 'ease-out-quad'
    });
    
    // Smooth scroll for anchor links
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

@endsection