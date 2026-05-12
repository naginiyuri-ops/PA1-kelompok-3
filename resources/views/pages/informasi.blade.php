@extends('layouts.app')

@section('title', 'Informasi - Geosite Danau Toba')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
    
    /* Hero Section */
    .info-hero {
        height: 35vh;
        min-height: 280px;
        background: linear-gradient(135deg, rgba(0,51,102,0.75), rgba(0,51,102,0.55)), url('{{ asset("image/sejarah-hero.jpg") }}');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
    }
    
    .info-hero h1 { 
        font-size: 2rem; 
        font-weight: 700;
        margin-bottom: 8px;
    }
    
    .info-hero p { 
        font-size: 0.7rem; 
        letter-spacing: 0.2em; 
        text-transform: uppercase; 
        opacity: 0.85;
    }
    
    /* Main Content */
    .info-section {
        padding: 50px 0;
        background: #f5f7fa;
    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .section-header h2 {
        font-size: 1.6rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 8px;
    }
    
    .divider {
        width: 50px;
        height: 2px;
        background: #c6a43b;
        margin: 10px auto 0;
    }
    
    .section-header p {
        font-size: 0.8rem;
        color: #2c5f8a;
        margin-top: 10px;
    }
    
    /* Info Grid */
    .info-grid {
        display: flex;
        flex-direction: column;
        gap: 40px;
    }
    
    /* Info Card */
    .info-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }
    
    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
    }
    
    /* Layout Flex untuk selang-seling */
    .info-card-wrapper {
        display: flex;
        flex-wrap: wrap;
    }
    
    /* FOTO - UKURAN SAMA BESAR */
    .info-card-image {
        flex: 1;
        min-width: 350px;
        background: #f0f2f5;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    
    .info-card-image img {
        width: 100%;
        height: 380px;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease;
    }
    
    .info-card:hover .info-card-image img {
        transform: scale(1.02);
    }
    
    /* Konten - UKURAN SAMA BESAR */
    .info-card-content {
        flex: 1;
        padding: 30px;
        background: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    
    /* Selang-seling: ganjil foto kiri, genap foto kanan */
    .info-card-wrapper.reverse {
        flex-direction: row-reverse;
    }
    
    /* Badge */
    .info-badge {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 4px 14px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        margin-bottom: 15px;
    }
    
    /* Title */
    .info-card-content h3 {
        font-size: 1.6rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 15px;
    }
    
    /* Meta */
    .info-meta {
        display: flex;
        gap: 12px;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eef2f8;
        font-size: 0.75rem;
        color: #888;
    }
    
    /* Konten */
    .info-full-content {
        color: #444;
        line-height: 1.8;
        font-size: 0.95rem;
    }
    
    .info-full-content p {
        margin-bottom: 1em;
    }
    
    /* List style */
    .info-full-content ul,
    .info-full-content ol {
        margin: 1em 0;
        padding-left: 1.8em;
    }
    
    .info-full-content li {
        margin-bottom: 0.5em;
        line-height: 1.7;
    }
    
    .info-full-content ol {
        list-style-type: decimal;
    }
    
    .info-full-content strong,
    .info-full-content b {
        color: #003366;
        font-weight: 600;
    }
    
    /* Tags - SEMBUNYIKAN */
    .info-tags {
        display: none;
    }
    
    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 50px 20px;
        background: white;
        border-radius: 16px;
    }
    
    /* Responsive */
    @media (max-width: 992px) {
        .info-card-image {
            min-width: 300px;
        }
        .info-card-image img {
            height: 320px;
        }
    }
    
    @media (max-width: 768px) {
        .info-hero {
            min-height: 220px;
        }
        .info-hero h1 {
            font-size: 1.6rem;
        }
        .info-card-wrapper {
            flex-direction: column !important;
        }
        .info-card-image {
            min-width: 100%;
            padding: 15px;
        }
        .info-card-image img {
            height: 280px;
        }
        .info-card-content {
            padding: 20px;
        }
        .info-card-content h3 {
            font-size: 1.4rem;
        }
        .info-full-content {
            font-size: 0.9rem;
        }
    }
    
    @media (max-width: 480px) {
        .info-card-content {
            padding: 15px;
        }
        .info-card-content h3 {
            font-size: 1.3rem;
        }
        .info-full-content {
            font-size: 0.85rem;
        }
        .info-card-image img {
            height: 220px;
        }
        .info-meta {
            font-size: 0.65rem;
        }
    }
</style>

<!-- HERO SECTION -->
<section class="info-hero">
    <div data-aos="fade-up">
        <h1>Informasi Geopark</h1>
        <p>Jelajahi Pengetahuan Tentang Geopark Danau Toba</p>
    </div>
</section>

<!-- MAIN CONTENT -->
<section class="info-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Informasi Lengkap</h2>
            <div class="divider"></div>
            <p>Temukan berbagai informasi menarik seputar Geopark Danau Toba</p>
        </div>
        
        <div class="info-grid">
            @forelse($informasiList as $index => $item)
            <div class="info-card" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                <!-- SELANG-SELING: ganjil foto kiri, genap foto kanan -->
                <div class="info-card-wrapper {{ $index % 2 == 1 ? 'reverse' : '' }}">
                    <div class="info-card-image">
                        @php
                            $gambarSrc = asset('image/default.jpg');
                            if (!empty($item->gambar)) {
                                if (str_starts_with($item->gambar, 'data:image')) {
                                    $gambarSrc = $item->gambar;
                                } elseif (filter_var($item->gambar, FILTER_VALIDATE_URL)) {
                                    $gambarSrc = $item->gambar;
                                } else {
                                    $gambarSrc = asset('storage/' . $item->gambar);
                                }
                            }
                        @endphp
                        <img src="{{ $gambarSrc }}" alt="{{ $item->judul }}" loading="lazy">
                    </div>
                    <div class="info-card-content">
                        <span class="info-badge">INFORMASI GEOPARK</span>
                        <h3>{{ $item->judul }}</h3>
                        
                        <div class="info-meta">
                            <span>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}</span>
                            <span>•</span>
                            <span>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                        </div>
                        
                        <div class="info-full-content">
                            {!! nl2br(e($item->konten)) !!}
                        </div>
                        
                        <div class="info-tags"></div>
                    </div>
                </div>
            </div>
            @empty
            <div class="empty-state" data-aos="fade-up">
                <i class="fas fa-database"></i>
                <h3>Belum Ada Informasi</h3>
                <p>Belum ada data informasi yang tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- AOS Animation -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 600,
        once: true,
        offset: 50
    });
</script>

@endsection