@extends('layouts.app')

@section('title', 'Berita - Geosite Danau Toba')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap');
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --blue-dark: #003366;
        --blue-medium: #1a4a7a;
        --blue-light: #e8f0f7;
        --gold: #c6a43b;
        --gold-light: #e8c45a;
        --gold-dark: #a8882e;
        --white: #ffffff;
        --black: #1a1a2e;
        --gray: #6c757d;
        --shadow-sm: 0 5px 20px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 10px 30px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 20px 50px rgba(0, 0, 0, 0.15);
        --shadow-xl: 0 30px 60px rgba(0, 0, 0, 0.2);
        --transition-fast: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        --transition-slow: all 0.6s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }

    /* HERO SECTION with PARALLAX */
    .berita-hero {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 0;
        overflow: hidden;
        isolation: isolate;
    }

    /* Animated Background Particles */
    .hero-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    .particle {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        pointer-events: none;
        animation: floatParticle linear infinite;
    }

    @keyframes floatParticle {
        0% {
            transform: translateY(100vh) rotate(0deg);
            opacity: 0;
        }
        10% { opacity: 0.5; }
        90% { opacity: 0.5; }
        100% {
            transform: translateY(-100vh) rotate(360deg);
            opacity: 0;
        }
    }

    .berita-hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('{{ asset("image/berita.jpg") }}') center/cover no-repeat;
        transform: scale(1);
        transition: transform 10s ease-out;
        animation: heroZoom 20s ease-out infinite alternate;
    }

    @keyframes heroZoom {
        0% { transform: scale(1); }
        100% { transform: scale(1.15); }
    }

    .berita-hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0, 51, 102, 0.85) 0%, rgba(0, 51, 102, 0.6) 50%, rgba(0, 51, 102, 0.8) 100%);
        z-index: 1;
    }

    .berita-hero-content {
        position: relative;
        z-index: 3;
        max-width: 900px;
        padding: 0 20px;
        animation: heroContentIn 1.2s cubic-bezier(0.2, 0.9, 0.4, 1.1) forwards;
    }

    @keyframes heroContentIn {
        0% {
            opacity: 0;
            transform: translateY(60px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hero-badge {
        display: inline-block;
        background: rgba(198, 164, 59, 0.2);
        backdrop-filter: blur(10px);
        padding: 8px 24px;
        border-radius: 50px;
        font-size: 0.7rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 25px;
        border: 1px solid rgba(198, 164, 59, 0.4);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { box-shadow: 0 0 0 0 rgba(198, 164, 59, 0.4); }
        50% { box-shadow: 0 0 0 15px rgba(198, 164, 59, 0); }
    }

    .berita-hero h1 {
        font-size: 5rem;
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        margin-bottom: 20px;
        background: linear-gradient(135deg, #fff 0%, var(--gold-light) 50%, #fff 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: 2px;
    }

    .hero-divider {
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, var(--gold), var(--gold-light));
        margin: 20px auto;
        border-radius: 3px;
        animation: expandWidth 1s ease-out 0.5s both;
    }

    @keyframes expandWidth {
        0% { width: 0; opacity: 0; }
        100% { width: 80px; opacity: 1; }
    }

    .berita-hero p {
        font-size: 1.1rem;
        letter-spacing: 4px;
        text-transform: uppercase;
        font-weight: 400;
        opacity: 0;
        animation: fadeInUp 0.8s ease-out 0.8s forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 0.9;
            transform: translateY(0);
        }
    }

    .hero-scroll {
        position: absolute;
        bottom: 40px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 3;
        cursor: pointer;
        transition: var(--transition-fast);
    }

    .mouse {
        width: 30px;
        height: 50px;
        border: 2px solid rgba(255, 255, 255, 0.5);
        border-radius: 20px;
        position: relative;
        margin: 0 auto;
    }

    .mouse::before {
        content: '';
        position: absolute;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        width: 4px;
        height: 10px;
        background: white;
        border-radius: 2px;
        animation: scrollWheel 2s infinite;
    }

    @keyframes scrollWheel {
        0% { opacity: 1; transform: translateX(-50%) translateY(0); }
        80% { opacity: 0; transform: translateX(-50%) translateY(15px); }
        100% { opacity: 0; transform: translateX(-50%) translateY(0); }
    }

    /* SECTION BERITA */
    .section-berita {
        padding: 100px 0;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        position: relative;
        overflow: hidden;
    }

    .section-berita::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(198, 164, 59, 0.03) 0%, transparent 70%);
        animation: rotateBg 30s linear infinite;
        pointer-events: none;
    }

    @keyframes rotateBg {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        position: relative;
        z-index: 2;
    }

    /* Section Header */
    .section-header {
        text-align: center;
        margin-bottom: 70px;
    }

    .section-subtitle {
        font-size: 0.8rem;
        color: var(--gold);
        text-transform: uppercase;
        letter-spacing: 4px;
        font-weight: 600;
        margin-bottom: 15px;
        display: inline-block;
        position: relative;
    }

    .section-subtitle::before,
    .section-subtitle::after {
        content: '';
        position: absolute;
        top: 50%;
        width: 40px;
        height: 1px;
        background: var(--gold);
        opacity: 0.5;
    }

    .section-subtitle::before {
        right: -55px;
    }

    .section-subtitle::after {
        left: -55px;
    }

    .section-title {
        font-size: 2.8rem;
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: var(--blue-dark);
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .section-title span {
        color: var(--gold);
    }

    .section-divider {
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, var(--gold), var(--gold-light));
        margin: 20px auto 0;
        border-radius: 3px;
    }

    /* BERITA GRID - MODERN MAGAZINE STYLE */
    .berita-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
    }

    /* Featured Card - First card gets larger */
    .berita-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: var(--transition-slow);
        cursor: pointer;
        position: relative;
        animation: cardReveal 0.8s cubic-bezier(0.2, 0.9, 0.4, 1.1) backwards;
        animation-delay: calc(var(--order) * 0.1s);
    }

    .berita-card:nth-child(1) { --order: 1; }
    .berita-card:nth-child(2) { --order: 2; }
    .berita-card:nth-child(3) { --order: 3; }
    .berita-card:nth-child(4) { --order: 4; }
    .berita-card:nth-child(5) { --order: 5; }
    .berita-card:nth-child(6) { --order: 6; }

    @keyframes cardReveal {
        0% {
            opacity: 0;
            transform: translateY(50px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .berita-card:hover {
        transform: translateY(-15px);
        box-shadow: var(--shadow-xl);
    }

    /* Image Container with Overlay */
    .berita-image {
        position: relative;
        height: 260px;
        overflow: hidden;
        background: linear-gradient(135deg, var(--blue-dark), var(--blue-medium));
    }

    .berita-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }

    .berita-card:hover .berita-image img {
        transform: scale(1.1);
    }

    .image-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 51, 102, 0.8), transparent);
        opacity: 0;
        transition: var(--transition-fast);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .berita-card:hover .image-overlay {
        opacity: 1;
    }

    .overlay-icon {
        width: 50px;
        height: 50px;
        background: var(--gold);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transform: scale(0);
        transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .berita-card:hover .overlay-icon {
        transform: scale(1);
    }

    .overlay-icon i {
        font-size: 1.5rem;
        color: var(--blue-dark);
    }

    .berita-category {
        position: absolute;
        top: 20px;
        left: 20px;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(10px);
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--gold);
        z-index: 2;
        transition: var(--transition-fast);
    }

    .berita-card:hover .berita-category {
        background: var(--gold);
        color: var(--blue-dark);
    }

    /* Content Area */
    .berita-content {
        padding: 24px;
        position: relative;
        background: white;
    }

    .berita-date {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.7rem;
        color: var(--gold);
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 12px;
        font-weight: 600;
        transition: var(--transition-fast);
    }

    .berita-date i {
        font-size: 0.7rem;
    }

    .berita-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--blue-dark);
        margin-bottom: 12px;
        line-height: 1.4;
        transition: var(--transition-fast);
        font-family: 'Playfair Display', serif;
    }

    .berita-card:hover .berita-title {
        color: var(--gold);
    }

    .berita-excerpt {
        font-size: 0.85rem;
        color: #666;
        line-height: 1.7;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Read More Button */
    .readmore-wrapper {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: var(--transition-fast);
    }

    .readmore-text {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: var(--blue-dark);
        transition: var(--transition-fast);
    }

    .readmore-icon {
        width: 28px;
        height: 28px;
        background: var(--gold);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition-fast);
    }

    .readmore-icon i {
        font-size: 0.7rem;
        color: var(--blue-dark);
        transition: transform 0.3s ease;
    }

    .readmore-wrapper:hover .readmore-text {
        color: var(--gold);
        letter-spacing: 2px;
    }

    .readmore-wrapper:hover .readmore-icon {
        background: var(--blue-dark);
    }

    .readmore-wrapper:hover .readmore-icon i {
        transform: translateX(3px);
        color: var(--gold);
    }

    /* Stats Bar */
    .berita-stats {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        display: flex;
        gap: 15px;
    }

    .stat-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 0.7rem;
        color: #999;
    }

    .stat-item i {
        font-size: 0.7rem;
    }

    /* Pagination */
    .pagination-wrapper {
        margin-top: 70px;
        text-align: center;
    }

    .pagination {
        display: inline-flex;
        gap: 10px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .pagination .page-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 44px;
        height: 44px;
        padding: 0 16px;
        background: white;
        border: none;
        border-radius: 14px;
        color: var(--blue-dark);
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition-fast);
        box-shadow: var(--shadow-sm);
    }

    .pagination .page-link:hover {
        background: var(--gold);
        color: white;
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
    }

    .pagination .active .page-link {
        background: var(--blue-dark);
        color: white;
        box-shadow: var(--shadow-md);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 80px 40px;
        background: white;
        border-radius: 32px;
        animation: fadeInScale 0.8s ease;
    }

    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .empty-state-icon {
        font-size: 5rem;
        margin-bottom: 25px;
        animation: floatIcon 3s ease-in-out infinite;
    }

    @keyframes floatIcon {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }

    .empty-state h3 {
        font-size: 2rem;
        font-family: 'Playfair Display', serif;
        color: var(--blue-dark);
        margin-bottom: 15px;
    }

    /* MODAL - LUXURY DESIGN */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.97);
        z-index: 10001;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        backdrop-filter: blur(20px);
    }

    .modal.active {
        display: flex;
        animation: modalFadeIn 0.4s ease;
    }

    @keyframes modalFadeIn {
        from { opacity: 0; backdrop-filter: blur(0); }
        to { opacity: 1; backdrop-filter: blur(20px); }
    }

    .modal-content {
        background: white;
        max-width: 950px;
        width: 90%;
        max-height: 85vh;
        border-radius: 32px;
        overflow-y: auto;
        position: relative;
        cursor: default;
        transform: scale(0.95);
        opacity: 0;
        animation: modalContentIn 0.4s ease 0.1s forwards;
    }

    @keyframes modalContentIn {
        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    .modal-close {
        position: sticky;
        top: 20px;
        right: 20px;
        float: right;
        width: 44px;
        height: 44px;
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(10px);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition-fast);
        z-index: 10;
        margin: 15px 15px 0 0;
    }

    .modal-close i {
        font-size: 1.2rem;
        color: white;
    }

    .modal-close:hover {
        background: var(--gold);
        transform: rotate(90deg);
    }

    .modal-body {
        padding: 35px;
        clear: both;
    }

    .modal-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 24px;
        margin-bottom: 30px;
        box-shadow: var(--shadow-lg);
    }

    .modal-date {
        font-size: 0.75rem;
        color: var(--gold);
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom: 12px;
        display: inline-block;
    }

    .modal-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--blue-dark);
        margin-bottom: 20px;
        font-family: 'Playfair Display', serif;
        line-height: 1.3;
    }

    .modal-text {
        font-size: 1rem;
        line-height: 1.9;
        color: #444;
    }

    .modal-text p {
        margin-bottom: 20px;
    }

    /* RESPONSIVE */
    @media (max-width: 992px) {
        .berita-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }
        .berita-hero h1 {
            font-size: 3.5rem;
        }
        .section-title {
            font-size: 2.2rem;
        }
        .modal-title {
            font-size: 1.8rem;
        }
        .modal-image {
            height: 300px;
        }
    }

    @media (max-width: 768px) {
        .berita-hero {
            min-height: 70vh;
        }
        .berita-hero h1 {
            font-size: 2.2rem;
        }
        .berita-hero p {
            font-size: 0.8rem;
            letter-spacing: 2px;
        }
        .hero-badge {
            font-size: 0.6rem;
            padding: 5px 18px;
        }
        .section-berita {
            padding: 60px 0;
        }
        .section-title {
            font-size: 1.8rem;
        }
        .berita-grid {
            grid-template-columns: 1fr;
            gap: 25px;
        }
        .berita-image {
            height: 220px;
        }
        .modal-body {
            padding: 20px;
        }
        .modal-image {
            height: 200px;
        }
        .modal-title {
            font-size: 1.4rem;
        }
        .modal-text {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 480px) {
        .berita-hero h1 {
            font-size: 1.6rem;
        }
        .section-title {
            font-size: 1.5rem;
        }
        .berita-title {
            font-size: 1.1rem;
        }
        .pagination .page-link {
            min-width: 38px;
            height: 38px;
            font-size: 0.8rem;
        }
    }

    /* Loading Skeleton */
    .skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: skeletonLoading 1.5s infinite;
    }

    @keyframes skeletonLoading {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }
</style>

<!-- HERO SECTION -->
<section class="berita-hero">
    <div class="hero-particles" id="particles"></div>
    <div class="berita-hero-bg"></div>
    <div class="berita-hero-overlay"></div>
    <div class="berita-hero-content">
        <div class="hero-badge">✨ Latest News ✨</div>
        <h1>Berita & Event</h1>
        <div class="hero-divider"></div>
        <p>Informasi terkini seputar Geopark Danau Toba</p>
    </div>
    <div class="hero-scroll" onclick="document.querySelector('.section-berita').scrollIntoView({behavior:'smooth'})">
        <div class="mouse"></div>
    </div>
</section>

<!-- BERITA GRID SECTION -->
<section class="section-berita" id="berita-section">
    <div class="container">
        <div class="section-header">
            <div class="section-subtitle">Our Journal</div>
            <h2 class="section-title">Cerita <span>Terbaru</span></h2>
            <div class="section-divider"></div>
        </div>

        @if($berita->count() > 0)
        <div class="berita-grid">
            @foreach($berita as $index => $item)
            <div class="berita-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="berita-image">
                    @if($item->gambar)
                        <img src="{{ $item->gambar }}" alt="{{ $item->judul }}" loading="lazy">
                    @else
                        <img src="{{ asset('image/berita-default.jpg') }}" alt="Berita">
                    @endif
                    <div class="image-overlay">
                        <div class="overlay-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                    </div>
                    <span class="berita-category">
                        <i class="fas fa-newspaper"></i> Berita
                    </span>
                </div>
                <div class="berita-content">
                    <div class="berita-date">
                        <i class="far fa-calendar-alt"></i>
                        {{ $item->created_at->isoFormat('DD MMMM YYYY') }}
                    </div>
                    <h3 class="berita-title">{{ $item->judul }}</h3>
                    <p class="berita-excerpt">{!! Str::limit(strip_tags($item->konten), 120) !!}</p>
                    <div class="readmore-wrapper" onclick="event.stopPropagation(); openModal({{ $item->id }})">
                        <span class="readmore-text">Baca Selengkapnya</span>
                        <div class="readmore-icon">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                    <div class="berita-stats">
                        <div class="stat-item">
                            <i class="far fa-eye"></i>
                            <span>{{ number_format($item->views ?? 0) }} views</span>
                        </div>
                        <div class="stat-item">
                            <i class="far fa-heart"></i>
                            <span>0 likes</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="pagination-wrapper">
            {{ $berita->links('pagination::bootstrap-5') }}
        </div>
        @else
        <div class="empty-state" data-aos="zoom-in">
            <div class="empty-state-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <h3>Belum Ada Berita</h3>
            <p>Saat ini belum ada berita yang tersedia. Silakan cek kembali nanti untuk informasi terbaru.</p>
        </div>
        @endif
    </div>
</section>

<!-- MODAL DETAIL BERITA -->
<div class="modal" id="modal">
    <div class="modal-content">
        <div class="modal-close" onclick="closeModal()">
            <i class="fas fa-times"></i>
        </div>
        <div class="modal-body">
            <img id="modalImage" class="modal-image" src="" alt="">
            <span id="modalDate" class="modal-date"></span>
            <h2 id="modalTitle" class="modal-title"></h2>
            <div id="modalText" class="modal-text"></div>
        </div>
    </div>
</div>

<script>
    // Data berita dari server
    const beritaData = @json($berita->items());
    
    function openModal(id) {
        const berita = beritaData.find(b => b.id === id);
        if (!berita) return;
        
        document.getElementById('modalImage').src = berita.gambar || '{{ asset("image/berita-default.jpg") }}';
        document.getElementById('modalDate').innerText = new Date(berita.created_at).toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });
        document.getElementById('modalTitle').innerText = berita.judul;
        document.getElementById('modalText').innerHTML = berita.konten;
        document.getElementById('modal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    
    function closeModal() {
        document.getElementById('modal').classList.remove('active');
        document.body.style.overflow = '';
    }
    
    // ESC key to close modal
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
    
    // Particle Background
    function createParticles() {
        const container = document.getElementById('particles');
        if (!container) return;
        
        for (let i = 0; i < 50; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            const size = Math.random() * 6 + 2;
            particle.style.width = size + 'px';
            particle.style.height = size + 'px';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDuration = Math.random() * 15 + 8 + 's';
            particle.style.animationDelay = Math.random() * 10 + 's';
            container.appendChild(particle);
        }
    }
    
    createParticles();
</script>

<!-- AOS Animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50,
        easing: 'ease-out-quad'
    });
</script>

@endsection