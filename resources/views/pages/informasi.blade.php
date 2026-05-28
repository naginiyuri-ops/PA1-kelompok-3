@extends('layouts.app')

@section('title', 'Informasi - Geosite Danau Toba')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    /* ==================== VARIABLES ==================== */
    :root {
        --primary: #003366;
        --primary-light: #1a4a7a;
        --primary-dark: #001f3f;
        --gold: #c6a43b;
        --gold-light: #e8c45a;
        --gold-dark: #967a28;
        --text-dark: #0f172a;
        --text-gray: #334155;
        --text-light: #64748b;
        --white: #ffffff;
        --bg-light: #f8fafc;
        --bg-gray: #f1f5f9;
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
        --shadow-md: 0 10px 30px rgba(0,0,0,0.06);
        --shadow-lg: 0 20px 40px rgba(0,0,0,0.08);
        --shadow-xl: 0 25px 50px -12px rgba(0,0,0,0.15);
        --radius-lg: 24px;
        --radius-md: 16px;
        --radius-sm: 12px;
        --header-height: 80px;
    }

    /* ==================== BASE ==================== */
    .geopark-wrapper {
        font-family: 'Inter', sans-serif;
        color: var(--text-dark);
        background: linear-gradient(135deg, var(--bg-light) 0%, #eef2f8 100%);
        min-height: 100vh;
    }

    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* ==================== HERO SECTION ==================== */
    .hero-informasi {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-light) 100%);
        padding: 140px 0 70px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .hero-informasi::before {
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

    .hero-informasi .container {
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
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    .hero-informasi h1 {
        font-size: 3rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
        color: var(--white);
        margin-bottom: 16px;
        letter-spacing: -0.5px;
    }

    .hero-informasi p {
        font-size: 0.95rem;
        color: rgba(255,255,255,0.75);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .hero-divider {
        width: 60px;
        height: 3px;
        background: var(--gold);
        margin: 24px auto 0;
        border-radius: 4px;
    }

    /* ==================== GRID SECTION ==================== */
    .informasi-section {
        padding: 70px 0;
        transition: opacity 0.3s ease;
    }

    .informasi-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 35px;
    }

    /* CARD MODERN */
    .informasi-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        border: 1px solid rgba(15, 23, 42, 0.04);
        cursor: pointer;
    }

    .informasi-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
        border-color: rgba(198, 164, 59, 0.15);
    }

    .informasi-card-img {
        height: 220px;
        overflow: hidden;
        position: relative;
    }

    .informasi-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .informasi-card:hover .informasi-card-img img {
        transform: scale(1.05);
    }

    .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 31, 63, 0.4);
        opacity: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        backdrop-filter: blur(2px);
    }

    .informasi-card-img:hover .card-overlay {
        opacity: 1;
    }

    .card-overlay i {
        color: var(--white);
        font-size: 1.2rem;
        background: var(--gold);
        padding: 12px;
        border-radius: 50%;
        transform: scale(0.8);
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .informasi-card-img:hover .card-overlay i {
        transform: scale(1);
    }

    .card-category-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: var(--gold);
        color: var(--primary-dark);
        padding: 5px 14px;
        border-radius: 30px;
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        z-index: 2;
        box-shadow: var(--shadow-sm);
    }

    .card-date-badge {
        position: absolute;
        bottom: 15px;
        right: 15px;
        background: rgba(15, 23, 42, 0.75);
        backdrop-filter: blur(8px);
        color: white;
        padding: 5px 14px;
        border-radius: 30px;
        font-size: 0.68rem;
        display: flex;
        align-items: center;
        gap: 6px;
        z-index: 2;
    }

    .informasi-card-body {
        padding: 24px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .informasi-card-body h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--primary-dark);
        font-family: 'Playfair Display', serif;
        margin: 8px 0 12px;
        line-height: 1.4;
        transition: color 0.2s ease;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .informasi-card-body h3:hover {
        color: var(--gold-dark);
    }

    .informasi-card-body p {
        color: var(--text-gray);
        font-size: 0.88rem;
        line-height: 1.6;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .btn-read {
        margin-top: auto;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--gold-dark);
        font-size: 0.8rem;
        font-weight: 700;
        text-decoration: none;
        background: none;
        border: none;
        padding: 0;
        cursor: pointer;
        width: fit-content;
        transition: all 0.3s ease;
    }

    .btn-read:hover {
        color: var(--primary);
        gap: 12px;
    }

    /* ==================== FULL ARTICLE MODAL ==================== */
    .article-view-section {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--bg-light);
        z-index: 1050;
        overflow-y: auto;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .article-view-section.active {
        display: block;
        opacity: 1;
    }

    .article-container-box {
        max-width: 900px;
        margin: 100px auto 50px;
        padding: 0 20px;
    }

    .btn-back-container {
        margin-bottom: 30px;
        position: sticky;
        top: 20px;
        z-index: 1060;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: var(--white);
        border: 1px solid #e2e8f0;
        padding: 12px 28px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--primary-dark);
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-sm);
    }

    .btn-back i {
        transition: transform 0.3s ease;
    }

    .btn-back:hover {
        background: var(--primary-dark);
        color: var(--white);
        border-color: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .btn-back:hover i {
        transform: translateX(-6px);
    }

    .article-wrapper {
        background: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        overflow: hidden;
    }

    .article-hero-img {
        width: 100%;
        height: 480px;
        object-fit: cover;
    }

    .article-content-padding {
        padding: 50px 60px;
    }

    .article-meta {
        display: flex;
        gap: 25px;
        color: var(--text-light);
        font-size: 0.85rem;
        margin-bottom: 25px;
        border-bottom: 1px solid var(--bg-gray);
        padding-bottom: 20px;
    }

    .article-meta span {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .article-main-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--primary-dark);
        font-family: 'Playfair Display', serif;
        line-height: 1.3;
        margin-bottom: 30px;
    }

    .article-body-text {
        font-size: 1rem;
        line-height: 1.8;
        color: var(--text-gray);
    }

    .article-body-text p {
        margin-bottom: 1.5rem;
    }

    .article-body-text h1, .article-body-text h2, .article-body-text h3 {
        color: var(--primary-dark);
        font-family: 'Playfair Display', serif;
        margin: 2rem 0 1rem;
    }

    .article-body-text img {
        max-width: 100%;
        border-radius: var(--radius-sm);
        margin: 20px 0;
    }

    /* ==================== PAGINATION ==================== */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }

    .empty-state {
        text-align: center;
        padding: 80px 24px;
        background: var(--white);
        border-radius: var(--radius-lg);
        grid-column: span 3;
        box-shadow: var(--shadow-sm);
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--gold);
        opacity: 0.25;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        font-size: 1.35rem;
        color: var(--primary-dark);
        font-family: 'Playfair Display', serif;
        margin-bottom: 8px;
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 1024px) {
        .informasi-grid { grid-template-columns: repeat(2, 1fr); gap: 25px; }
        .hero-informasi h1 { font-size: 2.5rem; }
        .article-hero-img { height: 380px; }
        .article-content-padding { padding: 35px 40px; }
        .article-main-title { font-size: 1.8rem; }
    }

    @media (max-width: 768px) {
        .hero-informasi { padding: 110px 0 50px; }
        .hero-informasi h1 { font-size: 1.8rem; }
        .informasi-grid { grid-template-columns: 1fr; gap: 20px; }
        .informasi-section { padding: 50px 0; }
        .article-hero-img { height: 250px; }
        .article-content-padding { padding: 25px 20px; }
        .article-main-title { font-size: 1.5rem; }
        .article-meta { flex-wrap: wrap; gap: 15px; }
        .btn-back { padding: 10px 22px; font-size: 0.8rem; }
        .article-container-box { margin: 80px auto 30px; }
    }

    @media (max-width: 480px) {
        .container { padding: 0 16px; }
        .informasi-card-body h3 { font-size: 1.1rem; }
        .article-hero-img { height: 200px; }
        .btn-back { padding: 8px 18px; font-size: 0.75rem; }
        .article-container-box { margin: 70px auto 20px; }
    }
</style>

<div class="geopark-wrapper">
    <!-- HERO SECTION -->
    <div class="hero-informasi" id="heroSection">
        <div class="container">
            <div class="hero-badge">PUSAT INFORMASI</div>
            <h1>Informasi & Wawasan</h1>
            <p>Jelajahi wawasan ilmiah, warisan budaya, dan keanekaragaman geologi Geosite Danau Toba.</p>
            <div class="hero-divider"></div>
        </div>
    </div>

    <!-- GRID INFORMASI -->
    <section class="informasi-section" id="gridSection">
        <div class="container">
            <div class="informasi-grid">
                @forelse($informasi as $index => $item)
                <div class="informasi-card" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}" onclick="showArticle({{ $index }})">
                    @php
                        $imgSrc = asset('image/default.jpg');
                        if (!empty($item->gambar)) {
                            if (str_starts_with($item->gambar, 'data:image')) {
                                $imgSrc = $item->gambar;
                            } elseif (filter_var($item->gambar, FILTER_VALIDATE_URL)) {
                                $imgSrc = $item->gambar;
                            } else {
                                $imgSrc = asset('storage/' . $item->gambar);
                            }
                        }
                    @endphp

                    <div class="informasi-card-img">
                        <img src="{{ $imgSrc }}" alt="{{ $item->judul }}" loading="lazy" onerror="this.src='{{ asset('image/default.jpg') }}'">
                        <div class="card-overlay">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <span class="card-category-badge">INFORMASI</span>
                        <span class="card-date-badge">
                            <i class="far fa-calendar-alt"></i>
                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                        </span>
                    </div>
                    
                    <div class="informasi-card-body">
                        <h3>{{ Str::limit($item->judul, 55) }}</h3>
                        <p>{{ Str::limit(strip_tags($item->konten), 120) }}</p>
                        <div class="btn-read">
                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
                @empty
                <div class="empty-state">
                    <i class="far fa-newspaper"></i>
                    <h3>Belum Ada Informasi</h3>
                    <p>Silakan tambahkan informasi terbaru melalui panel admin.</p>
                </div>
                @endforelse
            </div>
            
            @if(method_exists($informasi, 'links'))
            <div class="pagination-wrapper">
                {{ $informasi->links() }}
            </div>
            @endif
        </div>
    </section>
</div>

<!-- FULL ARTICLE VIEW (MODAL) -->
<div id="articleModal" class="article-view-section">
    <div class="article-container-box">
        <div class="btn-back-container">
            <button class="btn-back" onclick="closeArticle()">
                <i class="fas fa-arrow-left"></i> Kembali ke Informasi
            </button>
        </div>

        <div class="article-wrapper">
            <img id="modalImg" class="article-hero-img" src="" alt="">
            <div class="article-content-padding">
                <div class="article-meta">
                    <span><i class="far fa-calendar-alt"></i> <span id="modalDate"></span></span>
                    <span><i class="far fa-eye"></i> <span id="modalViews"></span> Pembaca</span>
                </div>
                <h1 class="article-main-title" id="modalTitle"></h1>
                <div class="article-body-text" id="modalContent"></div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>

<script>
    // Inisialisasi AOS
    AOS.init({ 
        duration: 800, 
        once: true, 
        offset: 60, 
        easing: 'ease-out-quad' 
    });
    
    // Data informasi dari server
    const informasiData = @json($informasi->items());
    
    // DOM Elements
    const heroSection = document.getElementById('heroSection');
    const gridSection = document.getElementById('gridSection');
    const articleModal = document.getElementById('articleModal');
    
    // Variable untuk menyimpan posisi scroll
    let scrollPosition = 0;
    
    // Function untuk menampilkan artikel
    function showArticle(index) {
        const item = informasiData[index];
        if (!item) return;
        
        // Simpan posisi scroll
        scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
        
        // Proses gambar
        let imgSrc = '{{ asset("image/default.jpg") }}';
        if (item.gambar) {
            if (item.gambar.startsWith('data:image') || item.gambar.startsWith('http')) {
                imgSrc = item.gambar;
            } else {
                imgSrc = '{{ asset("storage") }}/' + item.gambar;
            }
        }
        
        // Format tanggal
        const tanggalFormatted = new Date(item.created_at).toLocaleDateString('id-ID', {
            day: 'numeric', 
            month: 'long', 
            year: 'numeric'
        });
        
        // Update konten modal
        document.getElementById('modalImg').src = imgSrc;
        document.getElementById('modalTitle').innerText = item.judul;
        document.getElementById('modalDate').innerText = tanggalFormatted;
        document.getElementById('modalViews').innerText = (item.views || 0).toLocaleString();
        document.getElementById('modalContent').innerHTML = item.konten;
        
        // Sembunyikan hero dan grid
        heroSection.style.display = 'none';
        gridSection.style.display = 'none';
        
        // Tampilkan modal
        articleModal.classList.add('active');
        document.body.style.overflow = 'hidden';
        
        // Scroll ke atas modal
        articleModal.scrollTop = 0;
        
        // Update views
        fetch('/api/informasi/' + item.id + '/view', {
            method: 'POST',
            headers: { 
                'X-CSRF-TOKEN': '{{ csrf_token() }}', 
                'Content-Type': 'application/json' 
            }
        }).catch(err => console.log('Error updating views:', err));
    }
    
    // Function untuk menutup artikel
    function closeArticle() {
        // Sembunyikan modal
        articleModal.classList.remove('active');
        document.body.style.overflow = 'auto';
        
        // Tampilkan kembali hero dan grid
        heroSection.style.display = 'block';
        gridSection.style.display = 'block';
        
        // Kembali ke posisi scroll sebelumnya
        window.scrollTo({ 
            top: scrollPosition, 
            behavior: 'smooth' 
        });
    }
    
    // Event listener untuk tombol back browser
    window.addEventListener('popstate', function(event) {
        if (articleModal.classList.contains('active')) {
            event.preventDefault();
            closeArticle();
            history.pushState(null, '', window.location.href);
        }
    });
    
    // Push initial state
    history.pushState(null, '', window.location.href);
    
    // Escape key to close
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && articleModal.classList.contains('active')) {
            closeArticle();
        }
    });
    
    // Loading effect untuk gambar modal
    const modalImg = document.getElementById('modalImg');
    modalImg.style.opacity = '0';
    modalImg.style.transition = 'opacity 0.3s ease';
    modalImg.addEventListener('load', function() {
        this.style.opacity = '1';
    });
</script>

@endsection