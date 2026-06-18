@extends('layouts.app')

@section('title', ($item->nama_usaha ?? 'Detail UMKM') . ' - UMKM Geosite Toba')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800&display=swap');

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
    }

    body {
        font-family: 'Inter', sans-serif;
        color: var(--text-dark);
        background-color: var(--bg-light);
        -webkit-font-smoothing: antialiased;
    }

    /* ==================== HERO ==================== */
    .detail-hero {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-light) 100%);
        padding: 120px 0 50px;
        margin-top: 60px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .detail-hero::before {
        content: '';
        position: absolute;
        top: -50%; left: -50%;
        width: 200%; height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.03) 0%, transparent 60%);
        animation: slowRotate 40s linear infinite;
    }

    @keyframes slowRotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .detail-hero .container { position: relative; z-index: 2; }

    .breadcrumb-link {
        color: rgba(255,255,255,0.65);
        text-decoration: none;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: color 0.2s ease;
        margin-bottom: 20px;
    }
    .breadcrumb-link:hover { color: var(--gold-light); }

    .detail-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: 2.4rem;
        font-weight: 700;
        margin-bottom: 16px;
        line-height: 1.3;
    }

    .hero-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 16px;
    }

    .hero-meta-item {
        font-size: 0.85rem;
        color: rgba(255,255,255,0.78);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .hero-meta-item i { color: var(--gold); }

    .hero-divider {
        width: 50px; height: 3px;
        background: var(--gold);
        margin: 20px 0 0;
        border-radius: 4px;
    }

    /* ==================== DETAIL CONTENT ==================== */
    .detail-content {
        padding: 60px 0;
        background: var(--bg-light);
    }

    .container {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 24px;
    }

    .content-grid {
        display: grid;
        grid-template-columns: 1fr 360px;
        gap: 40px;
        align-items: start;
    }

    /* Main image */
    .main-img-wrapper {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-xl);
        margin-bottom: 32px;
        aspect-ratio: 16/9;
    }

    .main-img-wrapper img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .main-img-wrapper:hover img { transform: scale(1.03); }

    /* Deskripsi */
    .deskripsi-box {
        background: var(--white);
        border-radius: 18px;
        padding: 36px;
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(15,23,42,0.04);
    }

    .deskripsi-box h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        color: var(--primary);
        margin-bottom: 16px;
        padding-bottom: 12px;
        border-bottom: 2px solid rgba(198,164,59,0.2);
    }

    .deskripsi-text {
        font-size: 0.96rem;
        line-height: 1.9;
        color: var(--text-gray);
    }

    /* Info sidebar */
    .info-sidebar {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .info-card {
        background: var(--white);
        border-radius: 18px;
        padding: 28px;
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(15,23,42,0.04);
    }

    .info-card h4 {
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem;
        color: var(--primary);
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 2px solid rgba(198,164,59,0.2);
    }

    .info-row {
        margin-bottom: 16px;
    }

    .info-label {
        font-size: 0.68rem;
        font-weight: 700;
        color: var(--text-light);
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 4px;
    }

    .info-value {
        font-size: 0.94rem;
        color: var(--text-dark);
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .info-value i { color: var(--gold); font-size: 0.85rem; }

    .badge-aktif {
        display: inline-block;
        padding: 4px 14px;
        border-radius: 20px;
        background: #dcfce7;
        color: #166534;
        font-weight: 700;
        font-size: 0.75rem;
    }

    .badge-nonaktif {
        display: inline-block;
        padding: 4px 14px;
        border-radius: 20px;
        background: #fee2e2;
        color: #991b1b;
        font-weight: 700;
        font-size: 0.75rem;
    }

    /* Contact button */
    .contact-btn {
        display: block;
        text-align: center;
        background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        color: var(--primary-dark);
        padding: 14px 24px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.9rem;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(198,164,59,0.25);
        margin-top: 8px;
    }

    .contact-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(198,164,59,0.35);
        color: var(--primary-dark);
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--bg-gray);
        color: var(--text-gray);
        padding: 12px 24px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.88rem;
        transition: all 0.3s ease;
        width: 100%;
        justify-content: center;
    }

    .btn-back:hover {
        background: #e2e8f0;
        transform: translateY(-2px);
        color: var(--primary);
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 992px) {
        .content-grid { grid-template-columns: 1fr; }
        .info-sidebar { order: -1; }
        .detail-hero h1 { font-size: 1.9rem; }
    }

    @media (max-width: 576px) {
        .detail-hero { padding: 110px 0 40px; }
        .detail-hero h1 { font-size: 1.5rem; }
        .deskripsi-box { padding: 24px; }
        .info-card { padding: 22px; }
        .detail-content { padding: 40px 0; }
    }
</style>

<!-- HERO -->
<section class="detail-hero">
    <div class="container">
        <a href="{{ route('umkm') }}" class="breadcrumb-link">
            <i class="fas fa-arrow-left"></i> Kembali ke UMKM
        </a>
        <h1>{{ $item->nama_usaha }}</h1>
        <div class="hero-meta">
            @if($item->alamat)
                <div class="hero-meta-item">
                    <i class="fas fa-map-marker-alt"></i> {{ $item->alamat }}
                </div>
            @endif
            @if($item->no_telepon)
                <div class="hero-meta-item">
                    <i class="fas fa-phone-alt"></i> {{ $item->no_telepon }}
                </div>
            @endif
            @if($item->harga)
                <div class="hero-meta-item">
                    <i class="fas fa-tag"></i> {{ $item->harga }}
                </div>
            @endif
        </div>
        <div class="hero-divider"></div>
    </div>
</section>

<!-- CONTENT -->
<section class="detail-content">
    <div class="container">
        <div class="content-grid">
            <!-- MAIN LEFT COLUMN -->
            <div>
                @php
                    $imgSrc = asset('image/default.jpg');
                    if (!empty($item->foto_utama)) {
                        if (file_exists(public_path($item->foto_utama))) {
                            $imgSrc = asset($item->foto_utama);
                        } elseif (file_exists(public_path('image/umkm/' . $item->foto_utama))) {
                            $imgSrc = asset('image/umkm/' . $item->foto_utama);
                        } else {
                            $imgSrc = asset($item->foto_utama);
                        }
                    }
                @endphp
                <div class="main-img-wrapper">
                    <img src="{{ $imgSrc }}" alt="{{ $item->nama_usaha }}"
                         onerror="this.src='{{ asset('image/default.jpg') }}'">
                </div>

                <div class="deskripsi-box">
                    <h3><i class="fas fa-info-circle" style="color:var(--gold); margin-right:8px;"></i>Tentang UMKM Ini</h3>
                    <div class="deskripsi-text">
                        {!! $item->deskripsi ?? '<p style="color:#94a3b8;">Deskripsi belum tersedia.</p>' !!}
                    </div>
                </div>
            </div>

            <!-- SIDEBAR RIGHT COLUMN -->
            <div class="info-sidebar">
                <div class="info-card">
                    <h4><i class="fas fa-store" style="color:var(--gold); margin-right:8px;"></i>Informasi Usaha</h4>

                    <div class="info-row">
                        <div class="info-label">Nama Usaha</div>
                        <div class="info-value">{{ $item->nama_usaha }}</div>
                    </div>

                    @if($item->alamat)
                        <div class="info-row">
                            <div class="info-label">Alamat</div>
                            <div class="info-value">
                                <i class="fas fa-map-marker-alt"></i> {{ $item->alamat }}
                            </div>
                        </div>
                    @endif

                    @if($item->no_telepon)
                        <div class="info-row">
                            <div class="info-label">No. Telepon</div>
                            <div class="info-value">
                                <i class="fas fa-phone-alt"></i> {{ $item->no_telepon }}
                            </div>
                        </div>
                    @endif

                    @if($item->harga)
                        <div class="info-row">
                            <div class="info-label">Kisaran Harga</div>
                            <div class="info-value">
                                <i class="fas fa-tag"></i> {{ $item->harga }}
                            </div>
                        </div>
                    @endif

                    <div class="info-row">
                        <div class="info-label">Status</div>
                        <div class="info-value">
                            @if($item->status === 'aktif')
                                <span class="badge-aktif">Aktif</span>
                            @else
                                <span class="badge-nonaktif">Nonaktif</span>
                            @endif
                        </div>
                    </div>
                </div>

                @if($item->no_telepon)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->no_telepon) }}"
                       target="_blank" class="contact-btn">
                        <i class="fab fa-whatsapp" style="font-size:1.1rem;"></i> Hubungi via WhatsApp
                    </a>
                @endif

                <a href="{{ route('umkm') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar UMKM
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
