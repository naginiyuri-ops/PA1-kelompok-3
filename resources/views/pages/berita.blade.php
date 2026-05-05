@extends('layouts.app')

@section('title', 'Berita Terkini - Geosite Danau Toba')

@section('content')

<style>
    /* 
    ============================================================
    PREMIUM DESIGN FOR NEWS
    ============================================================
    */
    @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&family=Playfair+Display:wght@400;500;600;700&display=swap');

    :root {
        --primary: #003366;
        --primary-light: #1a4a7a;
        --gold: #c6a43b;
        --gold-light: #e8c45a;
        --text-dark: #1a1a1a;
        --text-gray: #666;
        --text-light: #999;
        --white: #ffffff;
        --bg-light: #f8f9fa;
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
        --shadow-md: 0 8px 24px rgba(0,0,0,0.08);
        --shadow-lg: 0 16px 40px rgba(0,0,0,0.12);
        --transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }

    /* HERO SECTION */
    .news-hero {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
        padding: 100px 0 60px;
        margin-top: 70px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .news-hero::before {
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

    .news-hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
        animation: fadeInUp 0.8s ease;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .news-hero h1 {
        font-size: 3rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
        color: var(--white);
        margin-bottom: 15px;
    }

    .news-hero p {
        font-size: 0.9rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: rgba(255,255,255,0.8);
    }

    /* SLIDER WRAPPER */
    .slider-wrapper {
        max-width: 1400px;
        margin: -50px auto 80px;
        position: relative;
        padding: 0 40px;
        z-index: 10;
    }

    .news-track {
        display: flex;
        overflow-x: auto;
        gap: 30px;
        padding: 30px 10px 40px;
        scrollbar-width: thin;
        scrollbar-color: var(--gold) #e0e0e0;
    }

    .news-track::-webkit-scrollbar {
        height: 5px;
    }

    .news-track::-webkit-scrollbar-track {
        background: #e0e0e0;
        border-radius: 10px;
    }

    .news-track::-webkit-scrollbar-thumb {
        background: var(--gold);
        border-radius: 10px;
    }

    /* CIRCLE CARD */
    .circle-card {
        min-width: 200px;
        text-align: center;
        cursor: pointer;
        transition: var(--transition);
        animation: cardReveal 0.6s ease backwards;
    }

    .circle-card:nth-child(1) { animation-delay: 0.05s; }
    .circle-card:nth-child(2) { animation-delay: 0.1s; }
    .circle-card:nth-child(3) { animation-delay: 0.15s; }
    .circle-card:nth-child(4) { animation-delay: 0.2s; }
    .circle-card:nth-child(5) { animation-delay: 0.25s; }
    .circle-card:nth-child(6) { animation-delay: 0.3s; }

    @keyframes cardReveal {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .circle-card:hover {
        transform: translateY(-10px);
    }

    .img-circle-frame {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto 20px;
        border: 4px solid var(--white);
        box-shadow: var(--shadow-md);
        transition: var(--transition);
    }

    .circle-card:hover .img-circle-frame {
        border-color: var(--gold);
        box-shadow: var(--shadow-lg);
    }

    .img-circle-frame img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .circle-card:hover .img-circle-frame img {
        transform: scale(1.08);
    }

    .meta-tag {
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: var(--gold);
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .title-main {
        font-size: 14px;
        font-weight: 600;
        line-height: 1.5;
        color: var(--text-dark);
        margin: 8px 0;
    }

    .card-date {
        font-size: 10px;
        color: var(--text-light);
    }

    /* EMPTY STATE */
    .empty-news {
        text-align: center;
        padding: 60px;
        background: var(--white);
        border-radius: 24px;
        margin: 40px auto;
        box-shadow: var(--shadow-sm);
    }

    .empty-news i {
        font-size: 3rem;
        color: var(--text-light);
        margin-bottom: 15px;
    }

    /* ============================================================
    FULL READER - PREMIUM MODAL
    ============================================================ */
    #fullReader {
        position: fixed;
        top: 100%;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--white);
        z-index: 99999;
        transition: top 0.7s cubic-bezier(0.86, 0, 0.07, 1);
        overflow-y: auto;
        visibility: hidden;
    }

    #fullReader.active {
        top: 0;
        visibility: visible;
    }

    /* Progress Bar */
    .progress-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: #eee;
        z-index: 100;
    }

    .progress-bar {
        height: 4px;
        background: var(--gold);
        width: 0%;
        transition: width 0.1s ease;
    }

    /* Reader Navigation */
    .reader-nav {
        padding: 20px 5%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: rgba(255,255,255,0.98);
        backdrop-filter: blur(12px);
        position: sticky;
        top: 0;
        z-index: 99;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }

    .reader-logo {
        font-family: 'Playfair Display', serif;
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary);
    }

    .reader-logo span {
        color: var(--gold);
    }

    .btn-close-circle {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #f0f0f0;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition);
        color: var(--text-dark);
    }

    .btn-close-circle:hover {
        background: var(--gold);
        color: var(--primary);
        transform: rotate(90deg);
    }

    /* Reader Content */
    .reader-content-wrap {
        max-width: 850px;
        margin: 0 auto;
        padding: 40px 30px 60px;
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease 0.2s;
    }

    #fullReader.active .reader-content-wrap {
        opacity: 1;
        transform: translateY(0);
    }

    .reader-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .reader-date {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 3px;
        color: var(--gold);
        display: inline-block;
        margin-bottom: 15px;
    }

    .reader-title-display {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        line-height: 1.25;
        color: var(--text-dark);
        margin: 20px 0;
        font-weight: 700;
    }

    .reader-divider {
        width: 50px;
        height: 2px;
        background: var(--gold);
        margin: 20px auto;
    }

    .reader-author {
        font-size: 13px;
        color: var(--text-light);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .reader-hero-img {
        width: 100%;
        height: auto;
        max-height: 500px;
        object-fit: cover;
        border-radius: 16px;
        margin: 30px 0 40px;
        box-shadow: var(--shadow-lg);
    }

    .reader-article-body {
        font-size: 16px;
        line-height: 1.9;
        color: #2c3e50;
        text-align: left;
        font-family: 'Inter', sans-serif;
    }

    .reader-article-body p {
        margin-bottom: 25px;
    }

    .reader-footer {
        margin: 60px 0 0;
        text-align: center;
        border-top: 1px solid #eee;
        padding-top: 40px;
    }

    .btn-back {
        background: var(--primary);
        color: var(--white);
        padding: 12px 32px;
        border-radius: 40px;
        border: none;
        font-size: 12px;
        letter-spacing: 1px;
        cursor: pointer;
        transition: var(--transition);
    }

    .btn-back:hover {
        background: var(--gold);
        color: var(--primary);
        transform: translateY(-3px);
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .news-hero h1 {
            font-size: 2rem;
        }
        .slider-wrapper {
            padding: 0 20px;
        }
        .img-circle-frame {
            width: 140px;
            height: 140px;
        }
        .circle-card {
            min-width: 160px;
        }
        .title-main {
            font-size: 12px;
        }
        .reader-title-display {
            font-size: 1.6rem;
        }
        .reader-hero-img {
            max-height: 300px;
        }
        .reader-article-body {
            font-size: 14px;
        }
        .reader-content-wrap {
            padding: 20px;
        }
    }

    @media (max-width: 480px) {
        .img-circle-frame {
            width: 110px;
            height: 110px;
        }
        .circle-card {
            min-width: 130px;
        }
        .title-main {
            font-size: 11px;
        }
    }
</style>

<!-- HERO SECTION -->
<div class="news-hero">
    <div class="news-hero-content">
        <h1>Berita Terkini</h1>
        <p>Discover Geosite Toba</p>
    </div>
</div>

<!-- SECTION SLIDER -->
<div class="slider-wrapper">
    <div class="news-track" id="newsTrack">
        @forelse($berita as $item)
        <div class="circle-card" onclick="openReader({{ $item->id }})">
            <div class="img-circle-frame">
                @if($item->gambar)
                    <img src="{{ $item->gambar }}" alt="{{ $item->judul }}" loading="lazy">
                @else
                    <img src="{{ asset('image/default.jpg') }}" alt="News">
                @endif
            </div>
            <span class="meta-tag">Jelajahi</span>
            <h3 class="title-main">{{ Str::limit($item->judul, 40) }}</h3>
            <div class="card-date">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}</div>
        </div>
        @empty
        <div class="empty-news">
            <i class="fas fa-newspaper"></i>
            <p class="title-main" style="margin-top: 15px;">Belum Ada Berita</p>
            <p style="font-size: 13px; color: #999;">Silakan tambah berita melalui panel admin.</p>
        </div>
        @endforelse
    </div>
</div>

<!-- READER OVERLAY (ANIMASI SLIDE-UP PREMIUM) -->
<div id="fullReader">
    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
    </div>
    
    <div class="reader-nav">
        <div class="reader-logo">Geo<span>Toba</span></div>
        <button class="btn-close-circle" onclick="closeReader()">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="reader-content-wrap">
        <div class="reader-header">
            <span class="reader-date" id="r-date"></span>
            <h1 id="r-title" class="reader-title-display"></h1>
            <div class="reader-divider"></div>
            <div class="reader-author">
                <i class="far fa-user"></i>
                <span id="r-author">Admin GeoToba</span>
            </div>
        </div>

        <img id="r-img" src="" class="reader-hero-img" alt="">

        <div id="r-content" class="reader-article-body"></div>

        <div class="reader-footer">
            <button class="btn-back" onclick="closeReader()">
                <i class="fas fa-arrow-left"></i> Kembali ke Berita
            </button>
        </div>
    </div>
</div>

<script>
    // Data berita dari server
    const newsData = @json($berita->items());

    function openReader(id) {
        const item = newsData.find(x => x.id === id);
        if(!item) return;

        // Set content
        document.getElementById('r-title').innerText = item.judul;
        document.getElementById('r-content').innerHTML = item.konten;
        document.getElementById('r-img').src = item.gambar || '{{ asset("image/default.jpg") }}';
        document.getElementById('r-date').innerText = new Date(item.created_at).toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });
        document.getElementById('r-author').innerHTML = item.penulis || 'Admin GeoToba';

        // Aktifkan Reader
        const reader = document.getElementById('fullReader');
        reader.classList.add('active');
        document.body.style.overflow = 'hidden';

        // Reset Scroll Progress
        document.getElementById("myBar").style.width = "0%";
        
        // Increment views via AJAX
        fetch(`/api/berita/${id}/view`, { 
            method: 'POST', 
            headers: { 
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            } 
        }).catch(err => console.log('View increment error:', err));
    }

    function closeReader() {
        const reader = document.getElementById('fullReader');
        reader.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // Progress Bar saat scroll
    const readerElement = document.getElementById('fullReader');
    readerElement.onscroll = function() {
        const winScroll = readerElement.scrollTop;
        const height = readerElement.scrollHeight - readerElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        document.getElementById("myBar").style.width = scrolled + "%";
    };

    // ESC key to close
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (document.getElementById('fullReader').classList.contains('active')) {
                closeReader();
            }
        }
    });
</script>

@endsection