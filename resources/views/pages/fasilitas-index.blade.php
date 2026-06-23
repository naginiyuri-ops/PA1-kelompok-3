@extends('layouts.app')

@section('title', 'Fasilitas Utama - Geosite Danau Toba')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Cormorant+Garamond:wght@400;500;600;700&display=swap');
    
    .fasilitas-hero {
        background: linear-gradient(135deg, var(--blue-dark) 0%, var(--blue-medium) 100%);
        padding: 140px 0 70px;
        margin-top: 0;
        text-align: center;
        position: relative;
        overflow: hidden;
        color: white;
    }
    
    .fasilitas-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
        animation: rotateSlow 25s linear infinite;
    }
    
    @keyframes rotateSlow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .fasilitas-hero .container { position: relative; z-index: 2; }
    
    .fasilitas-hero .badge {
        display: inline-block;
        background: rgba(198, 164, 59, 0.15);
        border: 1px solid rgba(198, 164, 59, 0.3);
        color: var(--gold-light);
        padding: 6px 20px;
        border-radius: 50px;
        font-size: 0.6rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        font-weight: 600;
        margin-bottom: 15px;
    }
    
    .fasilitas-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        font-weight: 800;
        color: white;
        margin-bottom: 12px;
    }
    
    .fasilitas-hero p {
        color: rgba(255,255,255,0.8);
        font-size: 0.9rem;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .hero-divider {
        width: 60px;
        height: 2px;
        background: var(--gold);
        margin: 15px auto 20px;
        border-radius: 2px;
    }
    
    .category-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }
    
    .section-header .subtitle {
        display: inline-block;
        font-size: 0.75rem;
        letter-spacing: 4px;
        text-transform: uppercase;
        color: #c6a43b;
        margin-bottom: 15px;
        font-weight: 600;
    }
    
    .section-header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #003366;
        font-family: 'Cormorant Garamond', serif;
    }
    
    .section-header .divider {
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #c6a43b, #e8c45a);
        margin: 0 auto 20px;
        border-radius: 3px;
    }
    
    .category-grid {
        display: flex;
        justify-content: center;
        gap: 35px;
        max-width: 900px;
        margin: 0 auto;
    }
    
    .category-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        transition: all 0.5s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        text-decoration: none;
        display: block;
        position: relative;
        width: 100%;
        max-width: 420px;
    }
    
    .category-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.15);
    }
    
    .card-img-wrapper {
        height: 250px;
        overflow: hidden;
        position: relative;
    }
    
    .card-img-wrapper::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0) 50%, rgba(0,0,0,0.4) 100%);
    }
    
    .card-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease;
    }
    
    .category-card:hover .card-img-wrapper img {
        transform: scale(1.1);
    }
    
    .card-content {
        padding: 30px;
        text-align: center;
        background: white;
        position: relative;
        z-index: 2;
    }
    
    .card-content h3 {
        color: #003366;
        font-weight: 700;
        margin-bottom: 10px;
        font-size: 1.5rem;
    }
    
    .card-content p {
        color: #64748b;
        font-size: 0.95rem;
        margin-bottom: 0;
        line-height: 1.6;
    }
    
    @media (max-width: 768px) {
        .category-grid {
            grid-template-columns: 1fr;
        }
        .fasilitas-hero { padding: 100px 0 40px; }
        .fasilitas-hero h1 {
            font-size: 1.8rem;
        }
    }
    @media (max-width: 480px) {
        .fasilitas-hero h1 { font-size: 1.4rem; }
    }
</style>

<div class="fasilitas-hero">
    <div class="container" data-aos="fade-up">
        <div class="badge">UNESCO Global Geopark</div>
        <h1>{{ __('app.facility.title') }}</h1>
        <div class="hero-divider"></div>
        <p>{{ __('app.facility.subtitle') }}</p>
    </div>
</div>

<div class="category-section">
    <div class="container">
        <div class="section-header">
            <span class="subtitle">{{ app()->getLocale() == 'en' ? 'Explore' : 'Eksplorasi' }}</span>
            <h2>{{ app()->getLocale() == 'en' ? 'Choose Facility Category' : 'Pilih Kategori Fasilitas' }}</h2>
            <div class="divider"></div>
        </div>
        
        <div class="category-grid">
            
            
            <!-- // Routing langsung menuju halaman index Akomodasi yang ada di web.php -->
            <a href="{{ url('/penginapan') }}" class="category-card">
                <div class="card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop" alt="Akomodasi">
                </div>
                <div class="card-content">
                    <h3>{{ __('app.facility.accommodation') }}</h3>
                    <p>{{ app()->getLocale() == 'en' ? 'Book a comfortable resting place with stunning natural views.' : 'Pesan tempat istirahat yang nyaman dengan pemandangan alam memukau.' }}</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection

