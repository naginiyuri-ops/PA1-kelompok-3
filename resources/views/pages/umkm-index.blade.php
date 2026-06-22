@extends('layouts.app')

@section('title', 'Sovenir & UMKM - Geosite Danau Toba')

@section('content')

<style>
    /* ==================== FONTS & VARIABLES ==================== */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap');
    
    :root {
        --primary: #003366;
        --primary-light: #1a4a7a;
        --primary-dark: #001f3f;
        --gold: #c6a43b;
        --gold-light: #f1d26b;
        --gold-dark: #967a28;
        --text-dark: #0f172a;
        --text-gray: #334155;
        --text-light: #64748b;
        --white: #ffffff;
        --bg-light: #f8fafc;
        --bg-gray: #f1f5f9;
        
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
        --shadow-md: 0 10px 30px rgba(0,0,0,0.06);
        --shadow-xl: 0 25px 50px -12px rgba(15, 23, 42, 0.15);
        
        --radius-lg: 20px;
        --radius-md: 14px;
        --radius-sm: 8px;
    }
    
    body {
        font-family: 'Inter', sans-serif;
        color: var(--text-dark);
        background-color: var(--bg-light);
        -webkit-font-smoothing: antialiased;
    }
    
    /* ==================== HERO SECTION ==================== */
    .hero-berita {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-light) 100%);
        padding: 120px 0 80px;
        margin-top: 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .hero-berita::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.03) 0%, transparent 60%);
        animation: slowRotate 40s linear infinite;
    }
    
    @keyframes slowRotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .hero-berita .container {
        position: relative;
        z-index: 2;
    }
    
    .hero-badge {
        display: inline-block;
        background: rgba(198, 164, 59, 0.12);
        border: 1px solid rgba(198, 164, 59, 0.3);
        color: var(--gold-light);
        padding: 6px 20px;
        border-radius: 50px;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 20px;
    }
    
    .hero-berita h1 {
        font-size: 3rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
        color: var(--white);
        margin-bottom: 14px;
        letter-spacing: -0.5px;
    }
    
    .hero-berita p {
        font-size: 0.92rem;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: rgba(255,255,255,0.75);
    }
    
    .hero-divider {
        width: 50px;
        height: 3px;
        background: var(--gold);
        margin: 24px auto 0;
        border-radius: 4px;
    }
    
    /* ==================== SECTION ==================== */
    .berita-section {
        padding: 80px 0;
        background: var(--bg-light);
    }
    
    .container {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 24px;
    }
    
    .berita-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 380px));
        gap: 35px;
        justify-content: center;
    }
    
    .berita-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        display: flex;
        flex-direction: column;
        border: 1px solid rgba(15, 23, 42, 0.04);
        text-decoration: none;
        color: inherit;
    }
    
    .berita-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
        border-color: rgba(198, 164, 59, 0.15);
    }
    
    .card-image-wrapper {
        position: relative;
        height: 230px;
        overflow: hidden;
    }
    
    .card-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    .berita-card:hover .card-image-wrapper img {
        transform: scale(1.06);
    }
    
    .card-image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 31, 63, 0.35);
        opacity: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        z-index: 1;
        backdrop-filter: blur(2px);
    }
    
    .card-image-overlay i {
        color: var(--white);
        font-size: 1.3rem;
        background: var(--gold);
        padding: 14px;
        border-radius: 50%;
        box-shadow: 0 6px 15px rgba(198, 164, 59, 0.3);
        transform: scale(0.8);
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .card-image-wrapper:hover .card-image-overlay {
        opacity: 1;
    }
    
    .card-image-wrapper:hover .card-image-overlay i {
        transform: scale(1);
    }
    
    .card-category {
        position: absolute;
        top: 15px;
        left: 15px;
        background: var(--white);
        color: var(--primary-dark);
        padding: 5px 14px;
        border-radius: 30px;
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        z-index: 2;
        box-shadow: var(--shadow-sm);
    }
    
    .card-content {
        padding: 26px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--primary-dark);
        font-family: 'Playfair Display', serif;
        margin-bottom: 12px;
        line-height: 1.4;
        transition: color 0.2s ease;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .card-title:hover {
        color: var(--gold-dark);
    }
    
    .card-excerpt {
        font-size: 0.88rem;
        color: var(--text-gray);
        line-height: 1.6;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .card-footer {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        margin-top: auto;
        padding-top: 18px;
        border-top: 1px solid var(--bg-gray);
    }
    
    .read-more {
        font-size: 0.8rem;
        font-weight: 700;
        color: var(--gold-dark);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s ease;
    }
    
    .read-more:hover {
        gap: 10px;
        color: var(--primary);
    }

    .empty-state { grid-column: 1 / -1; text-align: center; padding: 80px 20px; }
    .empty-state i { font-size: 3rem; color: var(--gold); opacity: 0.25; display: block; margin-bottom: 16px; }
    .empty-state p { color: var(--text-light); }
    .pagination-wrapper { display: flex; justify-content: center; margin-top: 50px; }

    @media (max-width: 992px) { .hero-berita h1 { font-size: 2.4rem; } }
    @media (max-width: 768px) { 
        .hero-berita { padding: 100px 0 60px; } 
        .hero-berita h1 { font-size: 2rem; } 
        .berita-section { padding: 60px 0; } 
    }
    @media (max-width: 576px) { 
        .hero-berita h1 { font-size: 1.7rem; } 
        .card-content { padding: 20px; } 
    }
</style>

<div class="hero-berita">
    <div class="container">
        <div class="hero-badge">{{ __('app.umkm.title') }}</div>
        <h1>{{ app()->getLocale() == 'en' ? 'Explore Souvenirs & MSMEs' : 'Jelajahi Sovenir & UMKM' }}</h1>
        <p>{{ __('app.umkm.subtitle') }}</p>
        <div class="hero-divider"></div>
    </div>
</div>

<section class="berita-section">
    <div class="container">
        <div class="berita-grid">
            @forelse($umkm as $item)
            <a href="{{ route('fasilitas.umkm.detail', $item->id) }}" class="berita-card" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                <div class="card-image-wrapper">
                    <img src="{{ $item->foto_utama ? asset($item->foto_utama) : asset('image/default.jpg') }}" alt="{{ $item->nama_usaha_trans }}" loading="lazy" onerror="this.src='{{ asset('image/default.jpg') }}'">
                    <div class="card-image-overlay">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                    <span class="card-category">UMKM</span>
                </div>
                
                <div class="card-content">
                    <h3 class="card-title">{{ $item->nama_usaha_trans }}</h3>
                    <p class="card-excerpt">{{ Str::limit(strip_tags($item->deskripsi_trans ?? '-'), 110) }}</p>
                    <div class="card-footer">
                        <span class="read-more">
                            {{ __('app.common.read_more') }} <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>
                </div>
            </a>
            @empty
            <div class="empty-state">
                <i class="fas fa-store"></i>
                <p>{{ __('app.umkm.no_data') }}</p>
            </div>
            @endforelse
        </div>
        
        @if($umkm->hasPages())
        <div class="pagination-wrapper mt-5 d-flex justify-content-center">
            {{ $umkm->links() }}
        </div>
        @endif
    </div>
</section>

@endsection