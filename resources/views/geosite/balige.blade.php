@extends('layouts.app')

@section('title', 'Balige - Geosite Danau Toba')

@section('content')

<style>
    /* ==================== FONTS & VARIABLES ==================== */
    @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap');
    
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
    
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Inter', sans-serif; color: var(--text-dark); overflow-x: hidden; }
    
    /* ==================== ANIMATIONS ==================== */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInLeft {
        from { opacity: 0; transform: translateX(-50px); }
        to { opacity: 1; transform: translateX(0); }
    }
    @keyframes fadeInRight {
        from { opacity: 0; transform: translateX(50px); }
        to { opacity: 1; transform: translateX(0); }
    }
    @keyframes zoomIn {
        from { opacity: 0; transform: scale(0.8); }
        to { opacity: 1; transform: scale(1); }
    }
    @keyframes bounce {
        0%, 100% { transform: translateY(0); opacity: 0.6; }
        50% { transform: translateY(-8px); opacity: 0.3; }
    }
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    @keyframes slideInUp {
        from { opacity: 0; transform: translateY(60px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* ==================== HERO SECTION ==================== */
    .hero-balige {
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
        background: linear-gradient(135deg, rgba(0,51,102,0.6) 0%, rgba(0,0,0,0.5) 100%), url('{{ asset("image/meat/balige.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        animation: zoomIn 1.5s ease;
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
    .scroll-indicator .line { width: 1px; height: 30px; background: white; }

    /* ==================== SECTION ==================== */
    .section { padding: 60px 0; }
    .section-white { background: var(--bg-light); }
    .section-light { background: var(--bg-gray); }
    .container { max-width: 1280px; margin: 0 auto; padding: 0 20px; }
    
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
    .section-header:hover .divider { width: 80px; }
    .section-header p {
        color: var(--text-light);
        font-size: 0.85rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ==================== SEJARAH CARDS ==================== */
    .sejarah-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }
    
    .sejarah-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        cursor: pointer;
    }
    
    .sejarah-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }
    
    .sejarah-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .sejarah-card:hover img { transform: scale(1.03); }
    
    .sejarah-card .content {
        padding: 20px;
    }
    
    .sejarah-card .content .badge-kategori {
        display: inline-block;
        padding: 3px 12px;
        border-radius: 20px;
        font-size: 0.6rem;
        font-weight: 600;
        margin-bottom: 8px;
    }
    .badge-sejarah { background: #e3f2fd; color: #1565c0; }
    .badge-legenda { background: #fff3e0; color: #e65100; }
    .badge-budaya { background: #fce4ec; color: #c62828; }
    .badge-informasi { background: #e8f5e9; color: #2e7d32; }
    .badge-tokoh { background: #f3e5f5; color: #7b1fa2; }
    
    .sejarah-card .content h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--primary-dark);
        font-family: 'Playfair Display', serif;
        margin-bottom: 8px;
    }
    
    .sejarah-card .content p {
        font-size: 0.85rem;
        color: var(--text-gray);
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .sejarah-card .content .btn-detail {
        display: inline-block;
        margin-top: 12px;
        font-size: 0.7rem;
        font-weight: 600;
        color: var(--gold-dark);
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .sejarah-card .content .btn-detail:hover {
        color: var(--primary);
        letter-spacing: 0.5px;
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
    }
    .lightbox-caption {
        margin-top: 15px;
    }
    .lightbox-caption h3 {
        color: var(--gold);
        font-size: 1.1rem;
        font-family: 'Playfair Display', serif;
    }
    .lightbox-caption p {
        color: rgba(255,255,255,0.7);
        font-size: 0.8rem;
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

    /* ==================== EMPTY STATE ==================== */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #94a3b8;
        grid-column: span 2;
    }
    .empty-state i {
        font-size: 3rem;
        opacity: 0.3;
        display: block;
        margin-bottom: 15px;
        color: var(--gold);
    }

    /* ==================== CTA ==================== */
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

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 992px) {
        .hero-title { font-size: 2.8rem; }
        .sejarah-grid { grid-template-columns: 1fr; }
        .empty-state { grid-column: span 1; }
    }
    
    @media (max-width: 768px) {
        .hero-balige { height: 80vh; max-height: 600px; min-height: 450px; }
        .hero-title { font-size: 2rem; }
        .hero-subtitle { font-size: 0.55rem; letter-spacing: 0.15em; }
        .hero-badge { font-size: 0.55rem; padding: 4px 12px; margin-bottom: 12px; }
        .hero-divider { margin: 15px auto; width: 40px; }
        .section { padding: 50px 0; }
        .section-header h2 { font-size: 1.4rem; }
        .sejarah-card img { height: 180px; }
        .cta-content h3 { font-size: 1.3rem; }
        .lightbox-close { top: 10px; right: 15px; width: 35px; height: 35px; font-size: 1.5rem; }
    }
    
    @media (max-width: 480px) {
        .hero-title { font-size: 1.6rem; }
        .container { padding: 0 16px; }
        .section-header h2 { font-size: 1.2rem; }
        .sejarah-card img { height: 160px; }
        .sejarah-card .content { padding: 16px; }
        .cta-btn { padding: 8px 24px; font-size: 0.6rem; }
    }
</style>

<!-- ==================== HERO ==================== -->
<section class="hero-balige" id="home">
    <div class="hero-bg"></div>
    <div class="hero-content" data-aos="fade-up">
        <div class="hero-badge">UNESCO Global Geopark</div>
        <h1 class="hero-title">BALIGE</h1>
        <p class="hero-subtitle">Pusat Peradaban Batak Toba · Kabupaten Toba</p>
        <div class="hero-divider"></div>
    </div>
    <div class="scroll-indicator" onclick="document.getElementById('sejarah').scrollIntoView({behavior:'smooth'})">
        <span>SCROLL</span>
        <div class="line"></div>
    </div>
</section>

<!-- ==================== SEJARAH ==================== -->
<section id="sejarah" class="section section-white">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Warisan Budaya</span>
            <h2>Sejarah & Informasi Balige</h2>
            <div class="divider"></div>
            <p>Menyimpan cerita leluhur, peradaban Batak Toba, dan nilai sejarah yang mendalam</p>
        </div>
        
        <div class="sejarah-grid">
            @forelse($sejarahList as $item)
            <div class="sejarah-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" onclick="openLightbox('{{ $item->gambar_url }}', '{{ addslashes($item->judul) }}', '{{ addslashes($item->kategori_label) }} · {{ $item->lokasi ?? 'Balige' }}')">
                <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}" loading="lazy" onerror="this.src='{{ asset('image/default.jpg') }}'">
                <div class="content">
                    <span class="badge-kategori badge-{{ $item->kategori }}">
                        {{ $item->kategori_label }}
                    </span>
                    <h3>{{ Str::limit($item->judul, 45) }}</h3>
                    <p>{{ Str::limit(strip_tags($item->konten), 120) }}</p>
                    <a href="#" class="btn-detail" onclick="event.stopPropagation(); openLightbox('{{ $item->gambar_url }}', '{{ addslashes($item->judul) }}', '{{ addslashes($item->kategori_label) }} · {{ $item->lokasi ?? 'Balige' }}')">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-history"></i>
                <p>Belum ada data sejarah untuk Balige. Silakan tambahkan melalui panel admin.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ==================== CTA ==================== -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h3>Jelajahi Keindahan Balige</h3>
            <div class="divider"></div>
            <p>Temukan warisan budaya dan sejarah Batak Toba yang kaya di Balige, gerbang menuju Danau Toba.</p>
            <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
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
    function openLightbox(imgSrc, title, desc) {
        const overlay = document.getElementById('lightboxOverlay');
        const lightboxImg = document.getElementById('lightboxImage');
        const titleEl = document.getElementById('lightboxTitle');
        const descEl = document.getElementById('lightboxDesc');
        
        if (overlay && lightboxImg) {
            lightboxImg.src = imgSrc;
            titleEl.innerText = title || 'Balige';
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