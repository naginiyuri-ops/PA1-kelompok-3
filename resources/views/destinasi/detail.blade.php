@extends('layouts.app')

@section('title', $destinasi->nama . ' - Geosite Danau Toba')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Cormorant+Garamond:wght@400;500;600;700&display=swap');
    
    .hero-detail {
        height: 55vh;
        min-height: 450px;
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        margin-top: 76px;
        overflow: hidden;
    }
    
    .hero-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));
    }
    
    .hero-text {
        position: relative;
        z-index: 2;
        text-align: center;
        animation: fadeInUp 0.8s ease;
    }
    
    .hero-text h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 15px;
        font-family: 'Cormorant Garamond', serif;
        text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
    }
    
    .hero-text p {
        font-size: 0.85rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: #c6a43b;
    }
    
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .breadcrumb-section {
        padding: 15px 0;
        background: #f8f9fa;
        border-bottom: 1px solid #eee;
    }
    
    .breadcrumb-custom {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    
    .breadcrumb-custom li {
        display: inline-flex;
        align-items: center;
        font-size: 0.8rem;
    }
    
    .breadcrumb-custom li:not(:last-child):after {
        content: '/';
        margin-left: 8px;
        color: #ccc;
    }
    
    .breadcrumb-custom a {
        color: #003366;
        text-decoration: none;
        transition: color 0.3s;
    }
    
    .breadcrumb-custom a:hover {
        color: #c6a43b;
    }
    
    .breadcrumb-custom .active {
        color: #c6a43b;
    }
    
    .detail-section {
        padding: 60px 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #eef2f8 100%);
    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-bottom: 50px;
    }
    
    /* Gallery Side - 1 FOTO SAJA */
    .gallery-side {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    
    .gallery-side:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 45px rgba(0,0,0,0.15);
    }
    
    .gallery-main {
        position: relative;
        height: 400px;
        overflow: hidden;
        cursor: pointer;
    }
    
    .gallery-main img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .gallery-side:hover .gallery-main img {
        transform: scale(1.05);
    }
    
    .gallery-badge {
        position: absolute;
        bottom: 15px;
        right: 15px;
        background: rgba(0,51,102,0.8);
        backdrop-filter: blur(5px);
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 500;
    }
    
    /* Info Side */
    .info-side {
        background: white;
        border-radius: 24px;
        padding: 30px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    
    .info-side:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 45px rgba(0,0,0,0.15);
    }
    
    .info-category {
        display: inline-block;
        background: linear-gradient(135deg, #c6a43b, #e8c45a);
        color: #003366;
        padding: 5px 15px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 15px;
    }
    
    .info-side h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 15px;
        font-family: 'Cormorant Garamond', serif;
    }
    
    .info-location {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #c6a43b;
        font-size: 0.85rem;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }
    
    .info-description {
        color: #555;
        line-height: 1.8;
        font-size: 0.95rem;
        margin-bottom: 25px;
    }
    
    .info-cards {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-bottom: 25px;
    }
    
    .info-card-item {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 16px;
        text-align: center;
        transition: all 0.3s ease;
    }
    
    .info-card-item:hover {
        background: #eef2f8;
        transform: translateY(-3px);
    }
    
    .info-card-item i {
        font-size: 1.5rem;
        color: #c6a43b;
        margin-bottom: 8px;
    }
    
    .info-card-item .label {
        font-size: 0.7rem;
        color: #999;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .info-card-item .value {
        font-size: 0.9rem;
        font-weight: 600;
        color: #003366;
        margin-top: 5px;
    }
    
    .tags-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }
    
    .tag {
        background: #f0f4f0;
        padding: 6px 14px;
        border-radius: 25px;
        font-size: 0.7rem;
        color: #003366;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .tag:hover {
        background: #c6a43b;
        color: white;
        transform: translateY(-2px);
    }
    
    .full-description {
        background: white;
        border-radius: 24px;
        padding: 35px;
        margin-top: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }
    
    .full-description h3 {
        font-size: 1.3rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #c6a43b;
        display: inline-block;
    }
    
    .full-description p {
        font-size: 0.95rem;
        color: #555;
        line-height: 1.8;
        margin-top: 20px;
    }
    
    .back-button {
        text-align: center;
        margin-top: 40px;
    }
    
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #003366;
        color: white;
        padding: 12px 35px;
        border-radius: 50px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-back:hover {
        background: #c6a43b;
        color: #003366;
        transform: translateX(-8px);
        gap: 15px;
    }
    
    /* Lightbox */
    .lightbox {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.95);
        z-index: 9999;
        cursor: pointer;
        align-items: center;
        justify-content: center;
    }
    
    .lightbox.active {
        display: flex;
        animation: fadeIn 0.3s ease;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    .lightbox img {
        max-width: 90%;
        max-height: 90%;
        object-fit: contain;
        animation: zoomIn 0.3s ease;
    }
    
    @keyframes zoomIn {
        from { opacity: 0; transform: scale(0.8); }
        to { opacity: 1; transform: scale(1); }
    }
    
    .lightbox-close {
        position: absolute;
        top: 20px;
        right: 30px;
        color: white;
        font-size: 2rem;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 40px;
        height: 40px;
        background: rgba(0,0,0,0.5);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .lightbox-close:hover {
        color: #c6a43b;
        transform: rotate(90deg);
    }
    
    @media (max-width: 992px) {
        .detail-grid { grid-template-columns: 1fr; gap: 30px; }
        .gallery-main { height: 350px; }
    }
    
    @media (max-width: 768px) {
        .hero-detail { min-height: 350px; }
        .hero-text h1 { font-size: 1.8rem; }
        .detail-section { padding: 40px 0; }
        .info-side { padding: 20px; }
        .info-side h2 { font-size: 1.4rem; }
        .info-cards { grid-template-columns: 1fr; }
        .full-description { padding: 20px; }
        .gallery-main { height: 280px; }
    }
</style>

<div class="hero-detail" style="background-image: url('{{ asset($destinasi->gambar_hero) }}')">
    <div class="hero-overlay"></div>
    <div class="hero-text">
        <h1>{{ $destinasi->nama }}</h1>
        <p>Destinasi {{ ucfirst($destinasi->kategori) }} - Geosite Danau Toba</p>
    </div>
</div>

<div class="breadcrumb-section">
    <div class="container">
        <ul class="breadcrumb-custom">
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li><a href="{{ url('/destinasi') }}">Destinasi</a></li>
            <li><a href="{{ url('/destinasi/' . $destinasi->kategori) }}">{{ ucfirst($destinasi->kategori) }}</a></li>
            <li class="active">{{ $destinasi->nama }}</li>
        </ul>
    </div>
</div>

<section class="detail-section">
    <div class="container">
        
        <div class="detail-grid">
            <!-- Gallery Side - 1 FOTO -->
            <div class="gallery-side" data-aos="fade-right" data-aos-duration="800">
                <div class="gallery-main" id="mainImage">
                    <img src="{{ asset($destinasi->gambar) }}" alt="{{ $destinasi->nama }}" id="mainImg">
                    <div class="gallery-badge">
                        <i class="fas fa-image"></i> 1 Foto
                    </div>
                </div>
            </div>
            
            <!-- Info Side -->
            <div class="info-side" data-aos="fade-left" data-aos-duration="800" data-aos-delay="100">
                <span class="info-category">
                    <i class="fas fa-tag"></i> {{ ucfirst($destinasi->kategori) }}
                </span>
                <h2>{{ $destinasi->nama }}</h2>
                <div class="info-location">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $destinasi->lokasi }}</span>
                </div>
                <p class="info-description">{{ $destinasi->deskripsi }}</p>
                
                <div class="info-cards">
                    <div class="info-card-item">
                        <i class="fas fa-clock"></i>
                        <div class="label">Jam Operasional</div>
                        <div class="value">{{ $destinasi->jam_operasional }}</div>
                    </div>
                    <div class="info-card-item">
                        <i class="fas fa-ticket-alt"></i>
                        <div class="label">Harga Tiket</div>
                        <div class="value">{{ $destinasi->harga_tiket }}</div>
                    </div>
                </div>
                
                <div class="tags-container">
                    @foreach($destinasi->tags as $tag)
                    <span class="tag">#{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="full-description" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            <h3>Deskripsi Lengkap</h3>
            <p>{{ $destinasi->deskripsi_lengkap }}</p>
        </div>
        
        <div class="back-button">
            <a href="{{ url('/destinasi/' . $destinasi->kategori) }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Destinasi {{ ucfirst($destinasi->kategori) }}
            </a>
        </div>
        
    </div>
</section>

<!-- Lightbox -->
<div class="lightbox" id="lightbox" onclick="closeLightbox()">
    <div class="lightbox-close" onclick="closeLightbox()">&times;</div>
    <img src="" alt="" id="lightboxImg">
</div>

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true, offset: 50 });
    
    // Lightbox untuk 1 foto
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightboxImg');
    
    document.getElementById('mainImg').addEventListener('click', function() {
        lightboxImg.src = this.src;
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
    
    function closeLightbox() {
        lightbox.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && lightbox.classList.contains('active')) {
            closeLightbox();
        }
    });
</script>

@endsection