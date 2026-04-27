@extends('layouts.app')

@section('title', 'Sejarah Caldera Toba - Geosite Danau Toba')

@section('content')

<style>
    /* ========== LOGO ========== */
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
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }
    .logo-container:hover {
        background: #0a4a7a;
        box-shadow: 0 12px 30px rgba(0, 51, 102, 0.4);
        transform: translateY(-2px);
    }
    .flag-img { width: 100px; height: auto; border-radius: 6px; }
    .logo-divider { width: 2px; height: 35px; background: rgba(255,255,255,0.3); }
    .del-img { width: 50px; height: auto; border-radius: 8px; }
    .geotoba-text { 
        font-size: 1.5rem; 
        font-weight: 800; 
        letter-spacing: 1px; 
        color: white;
        font-family: 'Inter', 'Poppins', sans-serif;
    }
    .geotoba-sub { 
        font-size: 0.7rem; 
        font-weight: 500; 
        color: rgba(255,255,255,0.8);
        letter-spacing: 0.5px;
    }
    @media (max-width: 768px) { 
        .flag-img { width: 60px; } 
        .del-img { width: 35px; } 
        .geotoba-text { font-size: 1.2rem; } 
    }
    @media (max-width: 576px) { 
        .flag-img { width: 45px; } 
        .del-img { width: 28px; } 
        .geotoba-text { font-size: 0.9rem; } 
    }

    /* ========== HERO ========== */
    .sejarah-hero {
        height: 45vh;
        background: linear-gradient(rgba(0, 51, 102, 0.6), rgba(0, 102, 153, 0.4)), url('/image/sejarah-hero.jpg');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
    }
    .sejarah-hero h1 { 
        font-size: 3.5rem; 
        font-family: 'Cormorant Garamond', serif; 
        margin-bottom: 12px;
        text-shadow: 0 2px 15px rgba(0, 0, 0, 0.3);
    }
    .sejarah-hero p { 
        font-size: 0.9rem; 
        letter-spacing: 0.2em; 
        text-transform: uppercase; 
        opacity: 0.85;
    }

    /* ========== SECTION ========== */
    .section { padding: 60px 0; }
    .bg-light { background: linear-gradient(135deg, #e0ecf7 0%, #d4e4f2 100%); }
    .container { max-width: 1100px; margin: 0 auto; padding: 0 24px; }
    .section-title { text-align: center; margin-bottom: 45px; }
    .section-title h2 { 
        font-size: 2rem; 
        font-family: 'Cormorant Garamond', serif; 
        color: #003366; 
    }
    .divider { width: 50px; height: 2px; background: #c6a43b; margin: 10px auto 0; }
    .section-title p { color: #2c5f8a; margin-top: 15px; }

    /* ========== SEJARAH BERSILANG ========== */
    .sejarah-grid { display: flex; flex-direction: column; gap: 45px; }
    .sejarah-item { display: flex; align-items: center; gap: 50px; flex-wrap: wrap; }
    .sejarah-item.reverse { flex-direction: row-reverse; }
    .sejarah-text { flex: 1; line-height: 1.8; color: #2c5f8a; font-size: 0.95rem; }
    .sejarah-text p { margin-bottom: 15px; }
    .sejarah-image { 
        flex: 1; 
        border-radius: 16px; 
        overflow: hidden; 
        box-shadow: 0 10px 25px rgba(0, 51, 102, 0.15); 
    }
    .sejarah-image img { width: 100%; height: 260px; object-fit: cover; transition: 0.3s; }
    .sejarah-image:hover img { transform: scale(1.02); }

    /* ========== TIMELINE ========== */
    .timeline {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 30px;
    }
    .timeline-item {
        flex: 1;
        background: white;
        border-radius: 16px;
        padding: 20px;
        text-align: center;
        border: 1px solid rgba(0, 51, 102, 0.1);
        transition: 0.3s;
        box-shadow: 0 5px 15px rgba(0, 51, 102, 0.05);
    }
    .timeline-item:hover { 
        transform: translateY(-5px); 
        box-shadow: 0 15px 30px rgba(0, 51, 102, 0.15);
        border-color: #c6a43b;
    }
    .timeline-year { 
        font-size: 1.3rem; 
        font-weight: 700; 
        color: #c6a43b; 
        margin-bottom: 8px; 
    }
    .timeline-title { 
        font-weight: 600; 
        margin-bottom: 8px; 
        color: #003366; 
    }
    .timeline-desc { font-size: 0.75rem; color: #2c5f8a; }

    /* ========== FAKTA ========== */
    .fakta-grid { 
        display: grid; 
        grid-template-columns: repeat(3, 1fr); 
        gap: 25px; 
        margin-top: 30px; 
    }
    .fakta-card {
        background: white;
        border-radius: 16px;
        padding: 25px;
        text-align: center;
        border: 1px solid rgba(0, 51, 102, 0.1);
        transition: 0.3s;
        box-shadow: 0 5px 15px rgba(0, 51, 102, 0.05);
    }
    .fakta-card:hover { 
        transform: translateY(-5px); 
        box-shadow: 0 15px 30px rgba(0, 51, 102, 0.15);
        background: linear-gradient(135deg, #ffffff 0%, #f0f7ff 100%);
    }
    .fakta-number { 
        font-size: 2rem; 
        font-weight: 700; 
        color: #c6a43b; 
        margin-bottom: 8px; 
    }
    .fakta-title { 
        font-weight: 600; 
        margin-bottom: 8px; 
        color: #003366; 
    }
    .fakta-desc { font-size: 0.8rem; color: #2c5f8a; }

    /* ========== CTA BIRU ========== */
    .cta-section {
        background: linear-gradient(135deg, #003366 0%, #0a4a7a 50%, #005c8a 100%);
        padding: 60px 0;
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
        padding: 12px 35px;
        font-size: 0.7rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        transition: all 0.4s ease;
        text-decoration: none;
        border-radius: 40px;
        font-weight: 600;
    }
    .cta-btn:hover {
        background: white;
        transform: translateY(-3px);
        letter-spacing: 0.25em;
    }

    @media (max-width: 768px) {
        .sejarah-hero h1 { font-size: 2.2rem; }
        .section { padding: 40px 0; }
        .sejarah-item, .sejarah-item.reverse { flex-direction: column; text-align: center; }
        .sejarah-image img { height: 220px; }
        .timeline { flex-direction: column; }
        .fakta-grid { grid-template-columns: 1fr; }
        .cta-content h3 { font-size: 1.6rem; }
        .cta-btn { padding: 10px 28px; font-size: 0.65rem; }
    }
    @media (max-width: 576px) {
        .sejarah-hero h1 { font-size: 1.8rem; }
    }
</style>

<!-- LOGO -->

<!-- HERO -->
<section class="sejarah-hero">
    <div data-aos="fade-up">
        <h1>Sejarah Caldera Toba</h1>
        <p>Warisan Geologi Kelas Dunia</p>
    </div>
</section>

<!-- SEJARAH BERSILANG -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Terbentuknya Danau Toba</h2>
            <div class="divider"></div>
        </div>
        <div class="sejarah-grid">
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image"><img src="/image/sejarah1.jpg" alt="Letusan Supervolcano"></div>
                <div class="sejarah-text">
                    <p>Danau Toba terbentuk akibat letusan gunung berapi super (supervolcano) yang terjadi sekitar 74.000 tahun lalu. Letusan ini merupakan salah satu letusan terbesar dalam sejarah bumi yang meninggalkan kaldera raksasa yang kini dikenal sebagai Danau Toba. Material vulkanik dari letusan ini tersebar hingga ke berbagai belahan dunia, termasuk India dan Afrika.</p>
                </div>
            </div>
            <div class="sejarah-item reverse" data-aos="fade-left">
                <div class="sejarah-image"><img src="/image/sejarah2.jpg" alt="Kaldera Toba"></div>
                <div class="sejarah-text">
                    <p>Letusan supervolcano Toba menghasilkan kaldera dengan panjang 100 km dan lebar 30 km. Setelah letusan, kaldera perlahan terisi air dan membentuk Danau Toba yang kita kenal sekarang. Proses pengangkatan kembali dasar kaldera kemudian menciptakan Pulau Samosir di tengah danau, yang menjadikan Danau Toba unik di dunia.</p>
                </div>
            </div>
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image"><img src="/image/sejarah3.jpg" alt="Geopark Toba"></div>
                <div class="sejarah-text">
                    <p>Kawasan Danau Toba kini diakui UNESCO sebagai Global Geopark pada tahun 2020. Pengakuan ini diberikan karena nilai geologi yang luar biasa, keanekaragaman hayati, serta warisan budaya Batak yang masih terjaga hingga saat ini.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TIMELINE 4 LETUSAN -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>4 Periode Letusan</h2>
            <div class="divider"></div>
            <p>Proses pembentukan Kaldera Toba melalui 4 letusan besar</p>
        </div>
        <div class="timeline">
            <div class="timeline-item" data-aos="fade-up">
                <div class="timeline-year">1,2 Juta Tahun</div>
                <div class="timeline-title">Letusan Pertama</div>
                <div class="timeline-desc">Menghasilkan batuan Haranggaol Dacite Tuff (HDT) di Kaldera Haranggaol</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="50">
                <div class="timeline-year">840.000 Tahun</div>
                <div class="timeline-title">Letusan Kedua</div>
                <div class="timeline-desc">Menghasilkan batuan Tuff Toba Tertua (OTT) di Kaldera Porsea</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                <div class="timeline-year">450.000 Tahun</div>
                <div class="timeline-title">Letusan Ketiga</div>
                <div class="timeline-desc">Menghasilkan batuan Tuff Toba Tengah (MTT) di Kaldera Haranggaol</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="150">
                <div class="timeline-year">74.000 Tahun</div>
                <div class="timeline-title">Letusan Keempat</div>
                <div class="timeline-desc">Letusan supervolcano yang membentuk Kaldera Toba (YTT)</div>
            </div>
        </div>
    </div>
</section>

<!-- FAKTA UNIK -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Fakta Unik Danau Toba</h2>
            <div class="divider"></div>
        </div>
        <div class="fakta-grid">
            <div class="fakta-card" data-aos="fade-up">
                <div class="fakta-number">#1</div>
                <div class="fakta-title">Danau Vulkanik Terbesar</div>
                <div class="fakta-desc">Danau Toba adalah danau vulkanik terbesar di dunia</div>
            </div>
            <div class="fakta-card" data-aos="fade-up" data-aos-delay="50">
                <div class="fakta-number">#2</div>
                <div class="fakta-title">Pulau di Tengah Danau</div>
                <div class="fakta-desc">Pulau Samosir adalah pulau di tengah danau terbesar di dunia</div>
            </div>
            <div class="fakta-card" data-aos="fade-up" data-aos-delay="100">
                <div class="fakta-number">#3</div>
                <div class="fakta-title">UNESCO Global Geopark</div>
                <div class="fakta-desc">Diakui UNESCO sejak tahun 2020</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h3>Jelajahi Geosite Lainnya</h3>
            <div class="divider"></div>
            <p>Temukan keajaiban geologi lainnya di Geopark Danau Toba</p>
            <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init({ duration: 700, once: true, offset: 50 });</script>

@endsection