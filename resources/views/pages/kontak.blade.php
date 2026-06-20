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
        --primary: #003366;      /* Biru tua seperti di galeri */
        --primary-dark: #1a4a7a;
        --gold: #c6a43b;         /* Kuning emas seperti di galeri */
        --gold-light: #d4b85c;
        --white: #ffffff;
        --gray-light: #f8fafc;
        --gray: #64748b;
        --text-dark: #1e293b;
        --shadow: 0 5px 20px rgba(0,0,0,0.05);
        --shadow-lg: 0 10px 30px rgba(0,0,0,0.08);
        --transition: all 0.3s ease;
        --border-radius: 20px;
    }

    body {
        font-family: 'Inter', sans-serif;
        background: #ffffff;
    }

    /* HERO SECTION - SAMA SEPERTI GALERI */
    .hero-kontak {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        padding: 80px 0 50px;
        margin-top: 70px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .hero-kontak::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
        animation: slowRotate 20s linear infinite;
    }

    @keyframes slowRotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .hero-kontak h1 {
        font-size: 2.8rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
        color: white;
        margin-bottom: 10px;
        letter-spacing: 2px;
        position: relative;
        z-index: 2;
    }

    .hero-kontak p {
        font-size: 0.85rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: rgba(255,255,255,0.8);
        position: relative;
        z-index: 2;
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
        padding: 35px 25px;
        text-align: center;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        transition: var(--transition);
        border: 1px solid #e2e8f0;
    }

    .contact-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
        border-color: var(--gold);
    }

    .contact-icon {
        width: 70px;
        height: 70px;
        background: rgba(0,51,102,0.08);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        transition: var(--transition);
    }

    .contact-card:hover .contact-icon {
        background: var(--gold);
    }

    .contact-card:hover .contact-icon i {
        color: var(--primary);
    }

    .contact-icon i {
        font-size: 28px;
        color: var(--gold);
        transition: var(--transition);
    }

    .contact-card h3 {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 12px;
        color: var(--primary);
    }

    .contact-card p {
        font-size: 0.85rem;
        color: var(--gray);
        line-height: 1.6;
    }

    /* MAPS */
    .map-full {
        margin: 40px 0;
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
    }

    .map-full iframe {
        width: 100%;
        height: 400px;
        border: 0;
        display: block;
    }

    /* Button Style - Seperti filter button di galeri */
    .btn-maps {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: transparent;
        border: 2px solid var(--gold);
        padding: 12px 28px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        color: var(--primary);
        text-decoration: none;
    }

    .btn-maps:hover {
        background: var(--gold);
        color: var(--primary);
        transform: translateY(-2px);
    }

    .btn-maps i {
        font-size: 0.9rem;
    }

    .text-center {
        text-align: center;
    }

    .my-5 {
        margin: 40px 0;
    }

    .mb-3 {
        margin-bottom: 16px;
    }

    .text-primary {
        color: var(--primary);
    }

    /* INFO SECTION */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }

    .info-card {
        background: white;
        border-radius: var(--border-radius);
        padding: 28px;
        box-shadow: var(--shadow);
        border: 1px solid #e2e8f0;
        transition: var(--transition);
    }

    .info-card:hover {
        box-shadow: var(--shadow-lg);
    }

    .info-title {
        font-size: 1.15rem;
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
        gap: 12px;
    }

    .dest-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 12px 15px;
        background: #f8fafc;
        border-radius: 14px;
        cursor: pointer;
        transition: var(--transition);
        border: 1px solid transparent;
    }

    .dest-item:hover {
        background: rgba(198,164,59,0.1);
        transform: translateX(5px);
        border-color: var(--gold);
    }

    .dest-icon {
        width: 48px;
        height: 48px;
        background: white;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        border: 1px solid #e2e8f0;
    }

    .dest-icon i {
        font-size: 1.2rem;
        color: var(--gold);
    }

    .dest-info h4 {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 4px;
    }

    .dest-info p {
        font-size: 0.7rem;
        color: var(--gray);
    }

    /* SOSIAL MEDIA */
    .social-section {
        margin: 20px 0 30px;
        text-align: center;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 15px;
        flex-wrap: wrap;
    }

    .social-icons a {
        width: 42px;
        height: 42px;
        background: #f1f5f9;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        transition: var(--transition);
        text-decoration: none;
        font-size: 1.1rem;
    }

    .social-icons a:hover {
        background: var(--gold);
        color: var(--primary);
        transform: translateY(-3px);
    }

    /* JAM OPERASIONAL - Seperti gradien hero di galeri */
    .hours-box {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        padding: 24px;
        border-radius: 18px;
        text-align: center;
        color: white;
        margin-top: 20px;
        box-shadow: var(--shadow);
        position: relative;
        overflow: hidden;
    }

    .hours-box::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
    }

    .hours-box h4 {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 12px;
        letter-spacing: 0.5px;
        position: relative;
        z-index: 2;
    }

    .hours-box h4 i {
        margin-right: 8px;
    }

    .hours-box p {
        font-size: 0.8rem;
        opacity: 0.92;
        margin: 6px 0;
        position: relative;
        z-index: 2;
    }

    .hours-divider {
        width: 40px;
        height: 2px;
        background: var(--gold);
        margin: 15px auto;
        border-radius: 2px;
        position: relative;
        z-index: 2;
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
        width: 56px;
        height: 56px;
        background: #25D366;
        border-radius: 50%;
        color: white;
        font-size: 1.6rem;
        box-shadow: 0 4px 12px rgba(37,211,102,0.35);
        transition: var(--transition);
        text-decoration: none;
    }

    .whatsapp-btn:hover {
        transform: scale(1.08);
        box-shadow: 0 8px 20px rgba(37,211,102,0.45);
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
        .contact-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .info-grid {
            grid-template-columns: 1fr;
        }
        .map-full iframe {
            height: 320px;
        }
        .hero-kontak h1 {
            font-size: 2.3rem;
        }
    }

    @media (max-width: 768px) {
        .hero-kontak {
            margin-top: 60px;
            padding: 60px 0 40px;
        }
        .hero-kontak h1 {
            font-size: 1.8rem;
        }
        .hero-kontak p {
            font-size: 0.7rem;
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
            height: 250px;
        }
        .info-card {
            padding: 20px;
        }
    }

    @media (max-width: 480px) {
        .hero-kontak h1 {
            font-size: 1.5rem;
        }
        .contact-card {
            padding: 25px 20px;
        }
        .contact-icon {
            width: 55px;
            height: 55px;
        }
        .contact-icon i {
            font-size: 22px;
        }
        .whatsapp-btn {
            width: 48px;
            height: 48px;
            font-size: 1.4rem;
        }
        .btn-maps {
            padding: 10px 20px;
            font-size: 0.75rem;
        }
    }
</style>

<!-- HERO SECTION - SAMA STYLENYA DENGAN GALERI -->
<div class="hero-kontak">
    <div>
        <h1>{{ app()->getLocale() == 'en' ? 'CONTACT US' : 'HUBUNGI KAMI' }}</h1>
        <p>{{ app()->getLocale() == 'en' ? 'Glad to hear from you' : 'Senang mendengar dari Anda' }}</p>
    </div>
</div>

<!-- CONTACT CARDS -->
<section class="section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3>{{ __('app.umkm.address') }}</h3>
                <p>{{ $kontak->alamat ?? 'Desa Meat, Kabupaten Toba, Sumatera Utara' }}</p>
            </div>

            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3>{{ __('app.umkm.phone') }}</h3>
                <p>{{ $kontak->telepon ?? '0622-123456' }}</p>
            </div>

            <div class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Email</h3>
                <p>{{ $kontak->email ?? 'info@geositeparumputan.com' }}</p>
            </div>
        </div>

        <!-- MAPS FULL WIDTH -->
        <div class="map-full">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.544029529995!2d99.0011203!3d2.3213969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e1b14a5be37ed%3A0x22b416e0db744d4a!2sDesa%20Meat!5e0!3m2!1sid!2sid!4v1780156234277!5m2!1sid!2sid"
                width="100%"
                height="400"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>

      
               
            </a>
        </div>
    </div>
</section>

<!-- INFO SECTION -->
<section class="section" style="padding-top: 0;">
    <div class="container">
        <div class="info-grid">
            <!-- DESTINASI -->
            <div class="info-card">
                <h3 class="info-title">{{ app()->getLocale() == 'en' ? 'Top Destinations' : 'Destinasi Unggulan' }}</h3>
                <div class="dest-list">
                    <div class="dest-item" onclick="window.location.href='{{ url('/geosite/meat') }}'">
                        <div class="dest-icon"><i class="fas fa-umbrella-beach"></i></div>
                        <div class="dest-info">
                            <h4>Meat Village</h4>
                            <p>{{ app()->getLocale() == 'en' ? 'Cultural tourism village on the shores of Lake Toba' : 'Desa wisata budaya di tepi Danau Toba' }}</p>
                        </div>
                    </div>
                    <div class="dest-item" onclick="window.location.href='{{ url('/geosite/batu-bahisan') }}'">
                        <div class="dest-icon"><i class="fas fa-mountain"></i></div>
                        <div class="dest-info">
                            <h4>Batu Bahisan</h4>
                            <p>{{ app()->getLocale() == 'en' ? 'Historic stone site with beautiful views' : 'Situs batu bersejarah dengan pemandangan indah' }}</p>
                        </div>
                    </div>
                    <div class="dest-item" onclick="window.location.href='{{ url('/geosite/liang-sipege') }}'">
                        <div class="dest-icon"><i class="fas fa-cave"></i></div>
                        <div class="dest-info">
                            <h4>Liang Sipege</h4>
                            <p>{{ app()->getLocale() == 'en' ? 'Natural cave with stalactites and stalagmites' : 'Gua alami dengan stalaktit dan stalakmit' }}</p>
                        </div>
                    </div>
                    <div class="dest-item" onclick="window.location.href='{{ url('/galeri') }}'">
                        <div class="dest-icon"><i class="fas fa-camera"></i></div>
                        <div class="dest-info">
                            <h4>{{ __('app.gallery.title') }}</h4>
                            <p>{{ __('app.gallery.subtitle') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SOSIAL & JAM OPERASIONAL -->
            <div class="info-card">
                <h3 class="info-title">{{ app()->getLocale() == 'en' ? 'Follow Us' : 'Ikuti Kami' }}</h3>
                <div class="social-section">
                    <div class="social-icons">
                        <a href="https://www.facebook.com/dispartoba"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@BonaPasogitID"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="hours-box">
                    <h4><i class="far fa-clock"></i> {{ app()->getLocale() == 'en' ? 'Operational Hours' : 'Jam Operasional' }}</h4>
                    <p>{{ app()->getLocale() == 'en' ? 'Monday - Friday: 08:00 - 17:00 WIB' : 'Senin - Jumat: 08:00 - 17:00 WIB' }}</p>
                    <p>{{ app()->getLocale() == 'en' ? 'Saturday - Sunday: 08:00 - 18:00 WIB' : 'Sabtu - Minggu: 08:00 - 18:00 WIB' }}</p>
                    <div class="hours-divider"></div>
                    <p><i class="fas fa-map-marker-alt"></i> Desa Meat, Kabupaten Toba</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Floating WhatsApp -->
<div class="whatsapp-float">
    <a href="https://wa.me/6281234567890" class="whatsapp-btn" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

@endsection