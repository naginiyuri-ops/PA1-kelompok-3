@extends('layouts.app')

@section('title', $destinasi->nama . ' - Geosite Danau Toba')

@section('content')

<style>
    /* ==================== HERO DETAIL ==================== */
    .hero-detail {
        height: 70vh;
        min-height: 500px;
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
        animation: fadeInUp 1s ease;
    }
    
    .hero-text h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 15px;
        font-family: 'Cormorant Garamond', serif;
        text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
    }
    
    .hero-text p {
        font-size: 0.9rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        opacity: 0.9;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* ==================== BREADCRUMB ==================== */
    .breadcrumb-section {
        padding: 20px 0;
        background: #f8f9fa;
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
    }
    
    .breadcrumb-custom li:not(:last-child):after {
        content: '/';
        margin-left: 8px;
        color: #ccc;
    }
    
    .breadcrumb-custom a {
        color: #003366;
        text-decoration: none;
        font-size: 0.85rem;
    }
    
    .breadcrumb-custom a:hover {
        color: #c6a43b;
    }
    
    .breadcrumb-custom .active {
        color: #c6a43b;
    }
    
    /* ==================== CONTENT SECTION ==================== */
    .detail-section {
        padding: 60px 0;
        background: #f8f9fa;
    }
    
    .card-custom {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        padding: 30px;
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }
    
    .card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.12);
    }
    
    .card-custom h2 {
        font-size: 1.6rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #c6a43b;
        display: inline-block;
        font-family: 'Cormorant Garamond', serif;
    }
    
    .card-custom p {
        font-size: 0.95rem;
        color: #555;
        line-height: 1.8;
    }
    
    /* ==================== GALERI ==================== */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    
    .gallery-item {
        overflow: hidden;
        border-radius: 12px;
        cursor: pointer;
    }
    
    .gallery-item img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform 0.5s ease;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    
    .gallery-item:hover img {
        transform: scale(1.08);
    }
    
    /* ==================== INFO LIST ==================== */
    .info-list {
        list-style: none;
        padding: 0;
    }
    
    .info-list li {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 0;
        border-bottom: 1px solid #eee;
    }
    
    .info-list li:last-child {
        border-bottom: none;
    }
    
    .info-list li i {
        width: 30px;
        color: #c6a43b;
        font-size: 1.1rem;
    }
    
    .info-list li strong {
        width: 100px;
        color: #003366;
    }
    
    .info-list li span {
        color: #666;
        font-size: 0.9rem;
    }
    
    /* ==================== TAGS ==================== */
    .tags-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 15px;
    }
    
    .tag {
        background: #f0f4f0;
        padding: 6px 16px;
        border-radius: 25px;
        font-size: 0.75rem;
        color: #003366;
        font-weight: 500;
    }
    
    /* ==================== MAP ==================== */
    .map-container {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .map-container iframe {
        width: 100%;
        height: 400px;
        border: none;
    }
    
    /* ==================== BACK BUTTON ==================== */
    .back-button {
        text-align: center;
        margin-top: 20px;
    }
    
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #003366;
        color: white;
        padding: 12px 30px;
        border-radius: 50px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-back:hover {
        background: #c6a43b;
        color: #003366;
        transform: translateX(-5px);
    }
    
    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 992px) {
        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 768px) {
        .hero-detail {
            min-height: 350px;
        }
        .hero-text h1 {
            font-size: 1.8rem;
        }
        .detail-section {
            padding: 40px 0;
        }
        .card-custom {
            padding: 20px;
        }
        .card-custom h2 {
            font-size: 1.3rem;
        }
        .gallery-grid {
            grid-template-columns: 1fr;
        }
        .info-list li {
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
        }
        .info-list li i {
            width: auto;
        }
        .map-container iframe {
            height: 250px;
        }
    }
</style>

<!-- HERO DETAIL -->
<div class="hero-detail" style="background-image: url('{{ asset('image/' . ($destinasi->gambar_hero ?? $destinasi->gambar)) }}')">
    <div class="hero-overlay"></div>
    <div class="hero-text">
        <h1>{{ $destinasi->nama }}</h1>
        <p>Geosite Danau Toba</p>
    </div>
</div>

<!-- BREADCRUMB -->
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

<!-- CONTENT SECTION -->
<section class="detail-section">
    <div class="container">
        
        <!-- DESKRIPSI -->
        <div class="card-custom">
            <h2>Deskripsi</h2>
            <p>{{ $destinasi->deskripsi_lengkap ?? $destinasi->deskripsi }}</p>
            
            @if(!empty($destinasi->tags) && count($destinasi->tags) > 0)
            <div class="tags-container">
                @foreach($destinasi->tags as $tag)
                <span class="tag">#{{ $tag }}</span>
                @endforeach
            </div>
            @endif
        </div>
        
        <!-- INFORMASI LENGKAP -->
        <div class="card-custom">
            <h2>Informasi Lengkap</h2>
            <ul class="info-list">
                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    <strong>Lokasi</strong>
                    <span>{{ $destinasi->lokasi }}</span>
                </li>
                <li>
                    <i class="fas fa-tag"></i>
                    <strong>Kategori</strong>
                    <span>{{ ucfirst($destinasi->kategori) }}</span>
                </li>
                @if(isset($destinasi->jam_operasional))
                <li>
                    <i class="fas fa-clock"></i>
                    <strong>Jam Operasional</strong>
                    <span>{{ $destinasi->jam_operasional }}</span>
                </li>
                @endif
                @if(isset($destinasi->harga_tiket))
                <li>
                    <i class="fas fa-ticket-alt"></i>
                    <strong>Harga Tiket</strong>
                    <span>{{ $destinasi->harga_tiket }}</span>
                </li>
                @endif
            </ul>
        </div>
        
        <!-- GALERI -->
        @if(!empty($destinasi->galeri) && count($destinasi->galeri) > 0)
        <div class="card-custom">
            <h2>Galeri Foto</h2>
            <div class="gallery-grid">
                @foreach($destinasi->galeri as $img)
                <div class="gallery-item">
                    <img src="{{ asset('image/' . $img) }}" alt="Galeri {{ $destinasi->nama }}" loading="lazy">
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- LOKASI MAPS -->
        @if(isset($destinasi->maps))
        <div class="card-custom">
            <h2>Lokasi</h2>
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps?q={{ $destinasi->maps }}&output=embed"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
        @endif
        
        <!-- BACK BUTTON -->
        <div class="back-button">
            <a href="{{ url('/destinasi/' . $destinasi->kategori) }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Destinasi {{ ucfirst($destinasi->kategori) }}
            </a>
        </div>
        
    </div>
</section>

<!-- AOS -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50
    });
</script>

@endsection