@extends('layouts.app')

@section('title', 'Desa Wisata Meat - Geosite Danau Toba')

@section('content')
@php use Illuminate\Support\Facades\Storage; @endphp

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
    
    @keyframes bounce {
        0%, 100% { transform: translateY(0); opacity: 0.6; }
        50% { transform: translateY(-8px); opacity: 0.3; }
    }
    
    /* ==================== HERO SLIDER ==================== */
    .hero-meat {
        height: 85vh;
        min-height: 600px;
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
        transition: opacity 1.2s ease-in-out;
        z-index: 1;
    }
    
    .slide.active {
        opacity: 1;
        z-index: 2;
    }
    
    .slide::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0,51,102,0.5) 0%, rgba(0,0,0,0.4) 100%);
    }
    
    .slide-1 { background-image: url('{{ asset("image/meat/slide1.jpg") }}'); }
    .slide-2 { background-image: url('{{ asset("image/meat/slide2.jpg") }}'); }
    .slide-3 { background-image: url('{{ asset("image/meat/slide3.jpg") }}'); }
    .slide-4 { background-image: url('{{ asset("image/meat/slide4.jpg") }}'); }
    .slide-5 { background-image: url('{{ asset("image/meat/slide5.jpg") }}'); }
    
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
        font-size: 4rem;
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
        background: rgba(255,255,255,0.5);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .dot.active {
        background: var(--gold);
        width: 28px;
        border-radius: 10px;
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
    
    /* ==================== SEJARAH ==================== */
    .sejarah-grid {
        display: flex;
        flex-direction: column;
        gap: 70px;
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
        cursor: pointer;
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
    
    /* ==================== CARDS ==================== */
    .grid-umkm {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
    }
    
    .grid-3 {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
    }
    
    .grid-2 {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
    }
    
    .card {
        background: var(--white);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        display: flex;
        flex-direction: column;
        cursor: pointer;
    }
    
    .card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }
    
    .card-img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform 0.5s ease;
        cursor: pointer;
    }
    
    .card:hover .card-img {
        transform: scale(1.05);
    }
    
    .card-content {
        padding: 22px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .card-content h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 10px;
        font-family: 'Playfair Display', serif;
    }
    
    .card-content p {
        font-size: 0.85rem;
        color: var(--text-gray);
        line-height: 1.6;
        margin-bottom: 15px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .card-location, .card-contact, .card-price {
        font-size: 0.75rem;
        color: var(--gold-dark);
        margin-top: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .fasilitas-item {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: all 0.4s ease;
        display: flex;
        gap: 0;
        cursor: pointer;
    }
    
    .fasilitas-item:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-xl);
    }
    
    .fasilitas-img {
        width: 130px;
        height: 130px;
        object-fit: cover;
        transition: transform 0.4s ease;
        cursor: pointer;
    }
    
    .fasilitas-item:hover .fasilitas-img {
        transform: scale(1.05);
    }
    
    .fasilitas-content {
        padding: 18px 18px 18px 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .fasilitas-content h4 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 8px;
        font-family: 'Playfair Display', serif;
    }
    
    .fasilitas-content p {
        font-size: 0.8rem;
        color: var(--text-gray);
        margin-bottom: 10px;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .fasilitas-price {
        font-size: 0.7rem;
        color: var(--gold-dark);
        font-weight: 600;
        display: inline-block;
        padding: 4px 12px;
        background: rgba(198, 164, 59, 0.1);
        border-radius: 20px;
        margin-bottom: 10px;
    }
    
    .btn-readmore {
        margin-top: 15px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: transparent;
        border: none;
        color: var(--gold-dark);
        font-size: 0.75rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 8px 0;
        width: fit-content;
    }
    
    .btn-readmore:hover {
        gap: 12px;
        color: var(--primary-dark);
    }
    
    /* ==================== MODAL ==================== */
    .detail-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.85);
        z-index: 10000;
        overflow-y: auto;
        justify-content: center;
        align-items: center;
    }
    
    .detail-modal.active {
        display: flex;
    }
    
    .detail-modal-container {
        background: white;
        max-width: 800px;
        width: 90%;
        margin: 50px auto;
        border-radius: 24px;
        overflow: hidden;
        animation: zoomIn 0.3s ease;
    }
    
    .detail-modal-header {
        position: relative;
        height: 250px;
        overflow: hidden;
    }
    
    .detail-modal-header img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .detail-modal-header .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        padding: 30px 30px 20px;
    }
    
    .detail-modal-header .overlay h3 {
        color: white;
        font-size: 1.5rem;
        font-family: 'Playfair Display', serif;
        margin-bottom: 8px;
    }
    
    .detail-modal-header .overlay .type {
        display: inline-block;
        background: var(--gold);
        color: var(--primary-dark);
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
    }
    
    .detail-modal-body {
        padding: 30px;
    }
    
    .detail-modal-body .detail-info {
        margin-bottom: 20px;
    }
    
    .detail-modal-body .detail-info p {
        margin-bottom: 8px;
        font-size: 0.85rem;
        color: var(--text-gray);
    }
    
    .detail-modal-body .detail-info i {
        width: 24px;
        color: var(--gold);
    }
    
    .detail-modal-body .full-description {
        color: var(--text-dark);
        line-height: 1.8;
        font-size: 0.95rem;
        border-top: 1px solid #eee;
        padding-top: 20px;
        margin-top: 10px;
    }
    
    .detail-modal-close {
        position: fixed;
        top: 20px;
        right: 30px;
        background: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        cursor: pointer;
        transition: all 0.3s;
        z-index: 10001;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }
    
    .detail-modal-close:hover {
        background: var(--gold);
        transform: rotate(90deg);
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
    
    .empty-state {
        text-align: center;
        padding: 60px;
        background: var(--white);
        border-radius: 24px;
        box-shadow: var(--shadow-sm);
    }
    
    .empty-state i {
        font-size: 3rem;
        color: var(--gold);
        margin-bottom: 16px;
        opacity: 0.5;
    }
    
    .empty-state p {
        color: var(--text-light);
        font-size: 0.9rem;
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
        .grid-3 { grid-template-columns: repeat(2, 1fr); }
    }
    
    @media (max-width: 992px) {
        .sejarah-item, .sejarah-item.reverse { flex-direction: column; text-align: center; }
        .sejarah-text h3::after { left: 50%; transform: translateX(-50%); }
        .sejarah-text { text-align: center; }
        .sejarah-image img { height: 280px; }
        .maps-section { grid-template-columns: 1fr; }
        .hero-title { font-size: 2.5rem; }
    }
    
    @media (max-width: 768px) {
        .hero-meat { height: 70vh; min-height: 500px; }
        .hero-title { font-size: 2rem; }
        .hero-subtitle { font-size: 0.65rem; letter-spacing: 0.2em; }
        .hero-badge { font-size: 0.6rem; padding: 4px 14px; }
        .section { padding: 60px 0; }
        .section-header h2 { font-size: 1.6rem; }
        .sejarah-image img { height: 230px; }
        .card-img { height: 200px; }
        .fasilitas-item { flex-direction: column; }
        .fasilitas-img { width: 100%; height: 180px; }
        .fasilitas-content { padding: 18px; text-align: center; }
        .maps-container iframe { height: 280px; }
        .cta-section { padding: 50px 0; }
        .cta-content h3 { font-size: 1.5rem; }
        .empty-state { grid-column: span 1; }
        .detail-modal-header { height: 200px; }
        .detail-modal-header .overlay h3 { font-size: 1.2rem; }
        .detail-modal-body { padding: 20px; }
        .grid-umkm, .grid-3, .grid-2 {
            grid-template-columns: 1fr;
        }
    }
    
    @media (max-width: 480px) {
        .hero-title { font-size: 1.6rem; }
        .container { padding: 0 16px; }
        .section-header h2 { font-size: 1.4rem; }
    }
</style>

<!-- ==================== HERO SLIDER ==================== -->
<section class="hero-meat">
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
    
    <div class="hero-content" data-aos="fade-up">
        <div class="hero-badge">UNESCO Global Geopark</div>
        <h1 class="hero-title">MEAT</h1>
        <p class="hero-subtitle">Kec. Tampahan · Kab. Toba · "New Zealand van Toba"</p>
        <div class="hero-divider"></div>
    </div>
    
    <div class="scroll-indicator" onclick="document.getElementById('sejarah').scrollIntoView({behavior:'smooth'})">
        <span>SCROLL</span>
        <div class="line"></div>
    </div>
</section>

<!-- ==================== SEJARAH & BUDAYA ==================== -->
<section id="sejarah" class="section section-white">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Warisan Budaya</span>
            <h2>Sejarah & Budaya</h2>
            <div class="divider"></div>
            <p>Warisan budaya Batak yang autentik dan masih hidup</p>
        </div>
        
        <div class="sejarah-grid">
            <div class="sejarah-item" data-aos="fade-up">
                <div class="sejarah-image" onclick="openImageModal('{{ asset('image/meat/slide1.jpg') }}')">
                    <img src="{{ asset('image/meat/slide1.jpg') }}" alt="Desa Meat">
                </div>
                <div class="sejarah-text">
                    <h3>Desa Meat - Jantung Budaya Batak</h3>
                    <p>Meat adalah salah satu desa adat tertua di Kecamatan Tampahan, Kabupaten Toba, Provinsi Sumatra Utara. Terletak tepat di bibir Danau Toba dan dikelilingi bentangan perbukitan hijau yang menjulang, desa ini menjadi pusat pelestarian budaya Batak yang otentik. Perpaduan hamparan sawah bertingkat yang menghadap langsung ke Danau Toba dan suasana perbukitan yang dramatis menjadikan Meat dijuluki <strong>"New Zealand van Toba"</strong> oleh para wisatawan yang terpesona.</p>
                </div>
            </div>
            
            <div class="sejarah-item reverse" data-aos="fade-up" data-aos-delay="100">
                <div class="sejarah-image" onclick="openImageModal('{{ asset('image/meat/slide2.jpg') }}')">
                    <img src="{{ asset('image/meat/slide2.jpg') }}" alt="Tradisi Batak">
                </div>
                <div class="sejarah-text">
                    <h3>Tradisi Hidup yang Diwariskan</h3>
                    <p>Hingga kini, masyarakat Meat tetap menjaga tradisi leluhur dengan penuh dedikasi. Sekitar 80% wanita di desa ini berprofesi sebagai penenun kain Ulos secara tradisional di kolong Ruma Bolon — rumah adat Batak berusia ratusan tahun. Selain tenun Ulos, tarian Tor-tor yang penuh makna filosofis dan musik Gondang yang merdu masih menjadi bagian integral kehidupan sehari-hari masyarakat Meat.</p>
                </div>
            </div>
            
            <div class="sejarah-item" data-aos="fade-up" data-aos-delay="200">
                <div class="sejarah-image" onclick="openImageModal('{{ asset('image/meat/slide3.jpg') }}')">
                    <img src="{{ asset('image/meat/slide3.jpg') }}" alt="Wisata Budaya">
                </div>
                <div class="sejarah-text">
                    <h3>Destinasi Wisata Budaya Unggulan</h3>
                    <p>Budaya dan kearifan lokal yang masih terjaga dengan baik menjadikan Meat sebagai destinasi wisata unggulan di kawasan Geopark Kaldera Toba. Desa ini memiliki 4 unit Ruma Bolon yang telah direhab oleh Kementerian Pariwisata RI, serta area camping ground yang dapat menampung hingga 1.000 tenda di tepi Danau Toba. Pengunjung dapat berinteraksi langsung dengan masyarakat, belajar menenun Ulos, menikmati kuliner khas Batak, dan menyaksikan sunrise terbaik menghadap Danau Toba.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== UMKM ==================== -->
<section id="umkm" class="section section-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Produk Lokal</span>
            <h2>UMKM Lokal</h2>
            <div class="divider"></div>
            <p>Produk autentik dan berkualitas dari pengrajin lokal Meat</p>
        </div>
        
        <div class="grid-umkm">
            @forelse($umkm as $index => $item)
            <div class="card" data-aos="fade-up" data-aos-delay="{{ min(($index % 5) * 100, 400) }}" onclick="openDetailModal('umkm', {{ $index }})">
                @php
                    $imgSrc = asset('image/meat/slide1.jpg');
                    
                    if (!empty($item->gambar)) {
                        if (str_starts_with($item->gambar, 'data:image')) {
                            $imgSrc = $item->gambar;
                        } 
                        elseif (filter_var($item->gambar, FILTER_VALIDATE_URL)) {
                            $imgSrc = $item->gambar;
                        }
                        elseif (Storage::disk('public')->exists($item->gambar)) {
                            $imgSrc = asset('storage/' . $item->gambar);
                        }
                        elseif (file_exists(public_path('storage/' . $item->gambar))) {
                            $imgSrc = asset('storage/' . $item->gambar);
                        }
                        elseif (file_exists(public_path($item->gambar))) {
                            $imgSrc = asset($item->gambar);
                        }
                    }
                @endphp
                <img src="{{ $imgSrc }}" class="card-img" alt="{{ $item->nama }}" onclick="event.stopPropagation(); openImageModal('{{ $imgSrc }}')" onerror="this.src='{{ asset('image/meat/slide1.jpg') }}'">
                <div class="card-content">
                    <h3>{{ $item->nama }}</h3>
                    <p>{{ Str::limit($item->deskripsi ?? 'Belum ada deskripsi', 90) }}</p>
                    <div class="card-location"><i class="fas fa-map-marker-alt"></i> {{ $item->lokasi ?? 'Desa Meat' }}</div>
                    <div class="card-contact"><i class="fas fa-phone"></i> {{ $item->kontak ?? 'Hubungi pengrajin' }}</div>
                    <button class="btn-readmore" onclick="event.stopPropagation(); openDetailModal('umkm', {{ $index }})">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            @empty
            <div class="empty-state" data-aos="fade-up">
                <i class="fas fa-store"></i>
                <p>Belum ada data UMKM. Silakan tambahkan melalui admin.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ==================== PENGINAPAN ==================== -->
<section id="penginapan" class="section section-white">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Akomodasi</span>
            <h2>Penginapan</h2>
            <div class="divider"></div>
            <p>Pilihan menginap dengan nuansa budaya Batak yang autentik</p>
        </div>
        
        <div class="grid-3">
            @forelse($penginapan ?? [] as $index => $item)
            <div class="card" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}" onclick="openDetailModal('penginapan', {{ $index }})">
                @php
                    $imgSrc = asset('image/meat/slide2.jpg');
                    if (!empty($item->gambar)) {
                        if (str_starts_with($item->gambar, 'data:image')) {
                            $imgSrc = $item->gambar;
                        } 
                        elseif (filter_var($item->gambar, FILTER_VALIDATE_URL)) {
                            $imgSrc = $item->gambar;
                        }
                        elseif (Storage::disk('public')->exists($item->gambar)) {
                            $imgSrc = asset('storage/' . $item->gambar);
                        }
                        elseif (file_exists(public_path('storage/' . $item->gambar))) {
                            $imgSrc = asset('storage/' . $item->gambar);
                        }
                        elseif (file_exists(public_path($item->gambar))) {
                            $imgSrc = asset($item->gambar);
                        }
                    }
                @endphp
                <img src="{{ $imgSrc }}" class="card-img" alt="{{ $item->nama }}" onclick="event.stopPropagation(); openImageModal('{{ $imgSrc }}')" onerror="this.src='{{ asset('image/meat/slide2.jpg') }}'">
                <div class="card-content">
                    <h3>{{ $item->nama }}</h3>
                    <p>{{ Str::limit($item->deskripsi ?? 'Belum ada deskripsi', 90) }}</p>
                    <div class="card-price"><i class="fas fa-tag"></i> {{ $item->harga ?? 'Hubungi pengelola' }}</div>
                    <div class="card-contact"><i class="fas fa-phone"></i> {{ $item->kontak ?? 'Hubungi pengelola' }}</div>
                    <button class="btn-readmore" onclick="event.stopPropagation(); openDetailModal('penginapan', {{ $index }})">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            @empty
            <div class="empty-state" data-aos="fade-up">
                <i class="fas fa-hotel"></i>
                <p>Belum ada data penginapan. Silakan tambahkan melalui admin.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ==================== FASILITAS ==================== -->
<section id="fasilitas" class="section section-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Layanan</span>
            <h2>Fasilitas</h2>
            <div class="divider"></div>
            <p>Fasilitas lengkap untuk kenyamanan wisatawan</p>
        </div>
        
        <div class="grid-2">
            @forelse($fasilitas ?? [] as $index => $item)
            <div class="fasilitas-item" data-aos="fade-up" data-aos-delay="{{ ($index % 2) * 50 }}" onclick="openDetailModal('fasilitas', {{ $index }})">
                @php
                    $imgSrc = asset('image/meat/slide3.jpg');
                    if (!empty($item->gambar)) {
                        if (str_starts_with($item->gambar, 'data:image')) {
                            $imgSrc = $item->gambar;
                        } 
                        elseif (filter_var($item->gambar, FILTER_VALIDATE_URL)) {
                            $imgSrc = $item->gambar;
                        }
                        elseif (Storage::disk('public')->exists($item->gambar)) {
                            $imgSrc = asset('storage/' . $item->gambar);
                        }
                        elseif (file_exists(public_path('storage/' . $item->gambar))) {
                            $imgSrc = asset('storage/' . $item->gambar);
                        }
                        elseif (file_exists(public_path($item->gambar))) {
                            $imgSrc = asset($item->gambar);
                        }
                    }
                @endphp
                <img src="{{ $imgSrc }}" class="fasilitas-img" alt="{{ $item->nama }}" onclick="event.stopPropagation(); openImageModal('{{ $imgSrc }}')" onerror="this.src='{{ asset('image/meat/slide4.jpg') }}'">
                <div class="fasilitas-content">
                    <h4>{{ $item->nama }}</h4>
                    <p>{{ Str::limit($item->deskripsi ?? 'Belum ada deskripsi', 70) }}</p>
                    <div class="fasilitas-price"><i class="fas fa-tag"></i> {{ $item->harga ?? 'Gratis' }}</div>
                    <button class="btn-readmore" onclick="event.stopPropagation(); openDetailModal('fasilitas', {{ $index }})">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            @empty
            <div class="empty-state" data-aos="fade-up" style="grid-column: span 2;">
                <i class="fas fa-building"></i>
                <p>Belum ada data fasilitas. Silakan tambahkan melalui admin.</p>
            </div>
            @endforelse
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
            <p>Desa Meat, Kecamatan Tampahan, Kabupaten Toba — mudah dijangkau dari Kota Balige maupun Bandara Silangit</p>
        </div>
        
        <div class="maps-section">
            <div class="maps-container" data-aos="fade-right">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0!2d99.0835095!3d2.3339262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0415b8f7da39%3A0xc6beb74287f355a5!2sBalige%2C%20Toba%20Samosir%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" allowfullscreen loading="lazy"></iframe>
            </div>
            <div class="rute-info" data-aos="fade-left">
                <div class="rute-item">
                    <h4><i class="fas fa-car"></i> Dari Kota Balige</h4>
                    <p>Kota Balige → Desa Meat melalui jalan darat menuruni bukit yang indah namun cukup curam. Jarak sekitar 10–15 km dengan jalur yang berkelok melewati persawahan hijau.</p>
                    <span class="rute-time">⏱️ ± 20–30 menit</span>
                </div>
                <div class="rute-item">
                    <h4><i class="fas fa-plane-arrival"></i> Dari Bandara Silangit</h4>
                    <p>Bandara Sisingamangaraja XII (Silangit) terhubung dari Jakarta (Garuda, Citilink, Batik Air) dan Malaysia (AirAsia, Malindo Air). Dari bandara menuju Desa Meat melalui jalur darat.</p>
                    <span class="rute-time">⏱️ ± 30–45 menit</span>
                </div>
                <div class="rute-item">
                    <h4><i class="fas fa-sun"></i> Waktu Terbaik Berkunjung</h4>
                    <p>Datanglah sebelum pukul 07.00 WIB untuk menikmati sunrise terbaik. Desa menghadap ke timur langsung ke Danau Toba. Mei–Oktober adalah musim terbaik berkunjung.</p>
                    <span class="rute-time">🌅 Sunrise ± 05.30 WIB</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== CTA SECTION ==================== -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h3>Jelajahi Keindahan Meat</h3>
            <div class="divider"></div>
            <p>Rasakan pengalaman wisata budaya Batak yang autentik, nikmati keindahan alam Danau Toba yang memukau, dan ciptakan kenangan indah bersama keluarga tercinta di Meat</p>
            <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
        </div>
    </div>
</section>

<!-- ==================== MODALS ==================== -->
<div id="imageModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.95); z-index: 9999; cursor: pointer; align-items: center; justify-content: center;">
    <span style="position: absolute; top: 20px; right: 30px; color: white; font-size: 40px; cursor: pointer; z-index: 10000;">&times;</span>
    <img id="modalImage" style="max-width: 90%; max-height: 90%; object-fit: contain;">
</div>

<div id="detailModal" class="detail-modal">
    <div class="detail-modal-close" onclick="closeDetailModal()">&times;</div>
    <div class="detail-modal-container">
        <div class="detail-modal-header">
            <img id="detailImg" src="" alt="">
            <div class="overlay">
                <span class="type" id="detailType"></span>
                <h3 id="detailTitle"></h3>
            </div>
        </div>
        <div class="detail-modal-body">
            <div class="detail-info">
                <p><i class="fas fa-map-marker-alt"></i> <strong>Lokasi:</strong> <span id="detailLokasi"></span></p>
                <p><i class="fas fa-phone"></i> <strong>Kontak:</strong> <span id="detailKontak"></span></p>
                <p><i class="fas fa-tag"></i> <strong>Harga:</strong> <span id="detailHarga"></span></p>
            </div>
            <div class="full-description" id="detailDeskripsi"></div>
        </div>
    </div>
</div>

<script>
    // Data dari backend untuk SEMUA section
    const umkmData = @json($umkm ?? []);
    const penginapanData = @json($penginapan ?? []);
    const fasilitasData = @json($fasilitas ?? []);
    
    // ==================== HERO SLIDER ====================
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    let slideInterval;
    
    function showSlide(index) {
        slides.forEach((s, i) => {
            s.classList.remove('active');
            if (dots[i]) dots[i].classList.remove('active');
        });
        slides[index].classList.add('active');
        if (dots[index]) dots[index].classList.add('active');
        currentSlide = index;
    }
    
    function nextSlide() {
        showSlide((currentSlide + 1) % slides.length);
    }
    
    function startSlider() {
        if (slideInterval) clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 5000);
    }
    
    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            clearInterval(slideInterval);
            showSlide(i);
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
    
    // ==================== LIGHTBOX MODAL ====================
    function openImageModal(src) {
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        if (modal && modalImg) {
            modal.style.display = 'flex';
            modalImg.src = src;
            document.body.style.overflow = 'hidden';
        }
    }
    
    function closeImageModal() {
        const modal = document.getElementById('imageModal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    }
    
    // ==================== DETAIL MODAL UNTUK SEMUA ====================
    function openDetailModal(type, index) {
        let item = null;
        let typeName = '';
        
        if (type === 'umkm' && umkmData[index]) {
            item = umkmData[index];
            typeName = 'UMKM';
        } else if (type === 'penginapan' && penginapanData[index]) {
            item = penginapanData[index];
            typeName = 'PENGINAPAN';
        } else if (type === 'fasilitas' && fasilitasData[index]) {
            item = fasilitasData[index];
            typeName = 'FASILITAS';
        }
        
        if (!item) return;
        
        // Set gambar
        let imgSrc = '{{ asset("image/meat/slide1.jpg") }}';
        if (item.gambar) {
            if (item.gambar.startsWith('data:image')) {
                imgSrc = item.gambar;
            } else if (item.gambar.startsWith('http')) {
                imgSrc = item.gambar;
            } else {
                imgSrc = '{{ asset("storage") }}/' + item.gambar;
            }
        }
        
        document.getElementById('detailImg').src = imgSrc;
        document.getElementById('detailType').innerText = typeName;
        document.getElementById('detailTitle').innerText = item.nama || '-';
        document.getElementById('detailLokasi').innerText = item.lokasi || 'Desa Meat';
        document.getElementById('detailKontak').innerText = item.kontak || '-';
        document.getElementById('detailHarga').innerText = item.harga || (typeName === 'UMKM' ? 'Hubungi langsung' : 'Gratis');
        document.getElementById('detailDeskripsi').innerHTML = item.deskripsi || '<p>Belum ada deskripsi lengkap untuk item ini.</p>';
        
        const modal = document.getElementById('detailModal');
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    
    function closeDetailModal() {
        const modal = document.getElementById('detailModal');
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
    
    // ==================== EVENT LISTENERS ====================
    const imageModal = document.getElementById('imageModal');
    if (imageModal) {
        imageModal.addEventListener('click', function(e) {
            if (e.target === this || e.target.tagName === 'SPAN') {
                closeImageModal();
            }
        });
    }
    
    const detailModal = document.getElementById('detailModal');
    if (detailModal) {
        detailModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeDetailModal();
            }
        });
    }
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeImageModal();
            closeDetailModal();
        }
    });
</script>

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