@extends('layouts.app')

@section('title', 'Kontak - Geosite Danau Toba')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --primary: #003366;
        --gold: #c6a43b;
        --white: #fff;
        --gray: #666;
        --bg: #f8fafc;
        --shadow: 0 5px 20px rgba(0,0,0,0.05);
        --shadow-lg: 0 10px 30px rgba(0,0,0,0.1);
        --transition: all 0.3s ease;
    }

    body {
        font-family: 'Inter', sans-serif;
        background: var(--bg);
    }

    /* HERO */
    .hero-kontak {
        height: 50vh;
        min-height: 350px;
        background: linear-gradient(rgba(0,51,102,0.7), rgba(0,51,102,0.5)), url('/image/kontak-hero.jpg');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 70px;
    }

    .hero-kontak h1 {
        font-size: 3rem;
        font-family: 'Playfair Display', serif;
        margin-bottom: 10px;
    }

    .hero-kontak p {
        font-size: 0.9rem;
        letter-spacing: 2px;
        opacity: 0.85;
    }

    /* SECTION */
    .section {
        padding: 60px 0;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* CONTACT CARDS */
    .contact-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin-bottom: 50px;
    }

    .contact-card {
        background: white;
        padding: 30px 20px;
        text-align: center;
        border-radius: 20px;
        box-shadow: var(--shadow);
        transition: var(--transition);
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .contact-icon {
        width: 60px;
        height: 60px;
        background: rgba(198,164,59,0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }

    .contact-icon i {
        font-size: 24px;
        color: var(--gold);
    }

    .contact-card h3 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--primary);
    }

    .contact-card p {
        font-size: 0.85rem;
        color: var(--gray);
        line-height: 1.5;
    }

    /* MAPS FULL WIDTH */
    .map-full {
        margin: 40px 0;
    }

    .map-full iframe {
        width: 100%;
        height: 400px;
        border: 0;
        border-radius: 20px;
        box-shadow: var(--shadow-lg);
    }

    /* INFO SECTION (Setelah Peta) */
    .info-section {
        margin-top: 20px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }

    .info-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: var(--shadow);
    }

    .info-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--gold);
        display: inline-block;
    }

    /* DESTINASI LIST */
    .dest-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .dest-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 12px;
        background: var(--bg);
        border-radius: 12px;
        cursor: pointer;
        transition: var(--transition);
    }

    .dest-item:hover {
        background: rgba(198,164,59,0.1);
        transform: translateX(5px);
    }

    .dest-icon {
        width: 45px;
        height: 45px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: var(--shadow);
    }

    .dest-icon i {
        font-size: 1.1rem;
        color: var(--gold);
    }

    .dest-info h4 {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 3px;
    }

    .dest-info p {
        font-size: 0.7rem;
        color: var(--gray);
    }

    /* SOSIAL MEDIA */
    .social-section {
        margin: 25px 0;
        text-align: center;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 10px;
        flex-wrap: wrap;
    }

    .social-icons a {
        width: 38px;
        height: 38px;
        background: var(--bg);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        transition: var(--transition);
        text-decoration: none;
    }

    .social-icons a:hover {
        background: var(--gold);
        color: white;
        transform: translateY(-3px);
    }

    /* JAM OPERASIONAL */
    .hours-box {
        background: linear-gradient(135deg, var(--primary), #1a4a7a);
        padding: 20px;
        border-radius: 16px;
        text-align: center;
        color: white;
        margin-top: 20px;
    }

    .hours-box h4 {
        font-size: 0.9rem;
        margin-bottom: 10px;
    }

    .hours-box p {
        font-size: 0.75rem;
        opacity: 0.9;
    }

    .hours-divider {
        width: 30px;
        height: 1px;
        background: rgba(255,255,255,0.3);
        margin: 10px auto;
    }

    /* FLOATING WHATSAPP */
    .whatsapp-float {
        position: fixed;
        bottom: 25px;
        right: 25px;
        z-index: 100;
    }

    .whatsapp-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 55px;
        height: 55px;
        background: #25D366;
        border-radius: 50%;
        color: white;
        font-size: 1.5rem;
        box-shadow: 0 5px 15px rgba(37,211,102,0.3);
        transition: var(--transition);
        text-decoration: none;
    }

    .whatsapp-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 20px rgba(37,211,102,0.4);
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
        .contact-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .info-grid {
            grid-template-columns: 1fr;
        }
        .map-full iframe {
            height: 320px;
        }
    }

    @media (max-width: 768px) {
        .hero-kontak h1 {
            font-size: 2rem;
        }
        .contact-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .section {
            padding: 40px 0;
        }
        .container {
            padding: 0 20px;
        }
        .map-full iframe {
            height: 280px;
        }
    }

    @media (max-width: 480px) {
        .hero-kontak h1 {
            font-size: 1.5rem;
        }
        .contact-card {
            padding: 20px;
        }
        .info-card {
            padding: 20px;
        }
        .whatsapp-btn {
            width: 48px;
            height: 48px;
            font-size: 1.3rem;
        }
        .map-full iframe {
            height: 220px;
        }
    }
</style>

<!-- HERO -->
<section class="hero-kontak">
    <div>
        <h1>Hubungi Kami</h1>
        <p>Senang mendengar dari Anda</p>
    </div>
</section>

<!-- CONTACT CARDS -->
<section class="section">
    <div class="container">
        <div class="contact-grid">

            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3>Alamat</h3>
                <p>{{ $kontak->alamat ?? '-' }}</p>
            </div>

            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3>Telepon</h3>
                <p>{{ $kontak->telepon ?? '-' }}</p>
            </div>

            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Email</h3>
                <p>{{ $kontak->email ?? '-' }}</p>
            </div>
</div>
         <iframe
         src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.544029529995!2d99.0011203!3d2.3213969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e1b14a5be37ed%3A0x22b416e0db744d4a!2sDesa%20Meat!5e0!3m2!1sid!2sid!4v1780156234277!5m2!1sid!2sid"
         width="100%"
         height="400"
         style="border:0;"
         allowfullscreen=""
        loading="lazy">
    </iframe>
        </div>
    </div>
</section>
<!-- MAPS FULL WIDTH -->
<div class="container">
<div class="text-center my-5">
    <i class="fas fa-map-marked-alt fa-3x text-primary mb-3"></i>
    <p>Klik tombol di bawah untuk melihat lokasi wisata pada Google Maps.</p>
    <a href="{{ $kontak->link_maps }}"
       target="_blank"
       class="btn btn-primary btn-lg">
        <i class="fas fa-location-arrow"></i>
        Buka Lokasi
    </a>
</div>
    </div>
</div>

<!-- INFO SECTION (Setelah Peta) -->
<section class="section">
    <div class="container">
        <div class="info-grid">
            <!-- DESTINASI -->
            <div class="info-card">
                <h3 class="info-title">Destinasi Unggulan</h3>
                <div class="dest-list">
                    <div class="dest-item" onclick="window.location.href='{{ url('/geosite/meat') }}'">
                        <div class="dest-icon"><i class="fas fa-umbrella-beach"></i></div>
                        <div class="dest-info">
                            <h4>Meat Village</h4>
                            <p>Desa wisata budaya di tepi Danau Toba</p>
                        </div>
                    </div>
                    <div class="dest-item" onclick="window.location.href='{{ url('/geosite/batu-bahisan') }}'">
                        <div class="dest-icon"><i class="fas fa-mountain"></i></div>
                        <div class="dest-info">
                            <h4>Batu Bahisan</h4>
                            <p>Situs batu bersejarah dengan pemandangan indah</p>
                        </div>
                    </div>
                    <div class="dest-item" onclick="window.location.href='{{ url('/geosite/liang-sipege') }}'">
                        <div class="dest-icon"><i class="fas fa-cave"></i></div>
                        <div class="dest-info">
                            <h4>Liang Sipege</h4>
                            <p>Gua alami dengan stalaktit dan stalakmit</p>
                        </div>
                    </div>
                    <div class="dest-item" onclick="window.location.href='{{ url('/galeri') }}'">
                        <div class="dest-icon"><i class="fas fa-camera"></i></div>
                        <div class="dest-info">
                            <h4>Galeri Foto</h4>
                            <p>Koleksi foto terbaik Geopark Danau Toba</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SOSIAL & JAM OPERASIONAL -->
            <div class="info-card">
                <h3 class="info-title">Ikuti Kami</h3>
                <div class="social-section">
                    <div class="social-icons">
                        <a href="https://www.facebook.com/dispartoba"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@BonaPasogitID"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="hours-box">
                    <h4><i class="far fa-clock"></i> Jam Operasional</h4>
                    <p>Senin - Jumat: 08:00 - 17:00 WIB</p>
                    <p>Sabtu - Minggu: 08:00 - 18:00 WIB</p>
                    <div class="hours-divider"></div>
                    <p><i class="fas fa-map-marker-alt"></i> Desa Meat, Kabupaten Toba</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

@endsection