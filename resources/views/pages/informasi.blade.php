@extends('layouts.app')

@section('title', 'Informasi - Geosite Danau Toba')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
    
    /* Hero Section - Diperbesar */
    .info-hero {
        height: 40vh;
        min-height: 320px;
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
        font-size: 2.5rem; 
        font-weight: 700;
        margin-bottom: 12px;
    }
    
    .info-hero p { 
        font-size: 0.85rem; 
        letter-spacing: 0.2em; 
        text-transform: uppercase; 
        opacity: 0.85;
    }
    
    /* Main Content */
    .info-section {
        padding: 60px 0;
        background: #f5f7fa;
    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }
    
    .section-header h2 {
        font-size: 2rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 10px;
    }
    
    .divider {
        width: 60px;
        height: 3px;
        background: #c6a43b;
        margin: 12px auto 0;
    }
    
    .section-header p {
        font-size: 0.9rem;
        color: #2c5f8a;
        margin-top: 12px;
    }
    
    /* Info Grid */
    .info-grid {
        display: flex;
        flex-direction: column;
        gap: 50px;
    }
    
    /* Info Card - Lebih besar */
    .info-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }
    
    .info-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.12);
    }
    
    .info-card-wrapper {
        display: flex;
        flex-wrap: wrap;
    }
    
    /* FOTO - Diperbesar */
    .info-card-image {
        flex: 1;
        min-width: 380px;
        background: #f0f2f5;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    
    .info-card-image img {
        width: 100%;
        height: 420px;
        object-fit: cover;
        display: block;
        transition: transform 0.5s ease;
    }
    
    .info-card:hover .info-card-image img {
        transform: scale(1.03);
    }
    
    /* Konten - Diperbesar */
    .info-card-content {
        flex: 1;
        padding: 35px;
        background: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    
    .info-card-wrapper.reverse {
        flex-direction: row-reverse;
    }
    
    /* Badge */
    .info-badge {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 5px 16px;
        border-radius: 25px;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        margin-bottom: 18px;
        width: fit-content;
    }
    
    /* Title */
    .info-card-content h3 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 18px;
        line-height: 1.3;
    }
    
    /* Meta */
    .info-meta {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid #eef2f8;
        font-size: 0.8rem;
        color: #888;
    }
    
    /* Konten Preview - Dipotong */
    .info-content-preview {
        color: #444;
        line-height: 1.8;
        font-size: 0.95rem;
        margin-bottom: 20px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }
    
    /* Tombol Selengkapnya */
    .btn-read-more {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: transparent;
        color: #c6a43b;
        border: 1px solid #c6a43b;
        padding: 10px 24px;
        border-radius: 40px;
        font-size: 0.8rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        width: fit-content;
    }
    
    .btn-read-more:hover {
        background: #c6a43b;
        color: #003366;
        gap: 12px;
        transform: translateY(-2px);
    }
    
    /* Modal Detail */
    .modal-detail {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.95);
        z-index: 10000;
        overflow-y: auto;
        padding: 40px 20px;
    }
    
    .modal-detail.active {
        display: block;
    }
    
    .modal-detail-container {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        border-radius: 24px;
        overflow: hidden;
        animation: modalFadeIn 0.4s ease;
    }
    
    @keyframes modalFadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    
    .modal-detail-header {
        position: relative;
        height: 300px;
        overflow: hidden;
    }
    
    .modal-detail-header img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .modal-detail-header .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        padding: 40px 30px 20px;
    }
    
    .modal-detail-header .overlay h2 {
        color: white;
        font-size: 1.8rem;
        font-weight: 700;
        margin: 0;
    }
    
    .modal-detail-body {
        padding: 30px;
    }
    
    .modal-detail-body .meta {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid #eef2f8;
        font-size: 0.8rem;
        color: #888;
    }
    
    .modal-detail-body .full-content {
        color: #444;
        line-height: 1.8;
        font-size: 0.95rem;
    }
    
    .modal-detail-body .full-content p {
        margin-bottom: 1em;
    }
    
    .modal-detail-body .full-content ul,
    .modal-detail-body .full-content ol {
        margin: 1em 0;
        padding-left: 1.8em;
    }
    
    .modal-detail-body .full-content li {
        margin-bottom: 0.5em;
    }
    
    .modal-detail-close {
        position: fixed;
        top: 20px;
        right: 30px;
        background: rgba(0,0,0,0.7);
        color: white;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.5rem;
        transition: all 0.3s ease;
        z-index: 10001;
    }
    
    .modal-detail-close:hover {
        background: #c6a43b;
        color: #003366;
        transform: rotate(90deg);
    }
    
    body.modal-open {
        overflow: hidden;
    }
    
    /* Tags - HIDDEN */
    .info-tags {
        display: none;
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 20px;
    }
    
    /* Responsive */
    @media (max-width: 992px) {
        .info-card-image {
            min-width: 320px;
        }
        .info-card-image img {
            height: 360px;
        }
        .info-card-content h3 {
            font-size: 1.5rem;
        }
    }
    
    @media (max-width: 768px) {
        .info-hero {
            min-height: 260px;
        }
        .info-hero h1 {
            font-size: 1.8rem;
        }
        .info-section {
            padding: 40px 0;
        }
        .section-header h2 {
            font-size: 1.6rem;
        }
        .info-card-wrapper {
            flex-direction: column !important;
        }
        .info-card-image {
            min-width: 100%;
        }
        .info-card-image img {
            height: 280px;
        }
        .info-card-content {
            padding: 25px;
        }
        .info-card-content h3 {
            font-size: 1.4rem;
        }
        .modal-detail-header {
            height: 220px;
        }
        .modal-detail-header .overlay h2 {
            font-size: 1.4rem;
        }
        .modal-detail-body {
            padding: 20px;
        }
    }
    
    @media (max-width: 480px) {
        .info-card-content {
            padding: 20px;
        }
        .info-card-content h3 {
            font-size: 1.3rem;
        }
        .info-card-image img {
            height: 220px;
        }
        .btn-read-more {
            padding: 8px 20px;
            font-size: 0.7rem;
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
            <div class="info-card" data-aos="fade-up" data-aos-delay="{{ min($index * 50, 300) }}">
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
                        
                        <!-- Preview konten (3 baris) -->
                        <div class="info-content-preview">
                            {!! Str::limit(strip_tags($item->konten), 200) !!}
                        </div>
                        
                        <!-- Tombol Selengkapnya -->
                        <button class="btn-read-more" onclick="openDetail({{ $item->id }})">
                            Selengkapnya <i class="fas fa-arrow-right"></i>
                        </button>
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

<!-- MODAL DETAIL -->
<div id="modalDetail" class="modal-detail">
    <div class="modal-detail-close" onclick="closeDetail()">&times;</div>
    <div class="modal-detail-container">
        <div class="modal-detail-header" id="modalHeader">
            <img src="" alt="" id="modalImg">
            <div class="overlay">
                <h2 id="modalTitle"></h2>
            </div>
        </div>
        <div class="modal-detail-body">
            <div class="meta" id="modalMeta"></div>
            <div class="full-content" id="modalContent"></div>
        </div>
    </div>
</div>

<script>
    // Data informasi dari server
    const infoData = @json($informasiList);
    
    function openDetail(id) {
        const item = infoData.find(x => x.id === id);
        if (!item) return;
        
        // Set gambar
        let imgSrc = '{{ asset("image/default.jpg") }}';
        if (item.gambar) {
            if (item.gambar.startsWith('data:image')) {
                imgSrc = item.gambar;
            } else if (item.gambar.startsWith('http')) {
                imgSrc = item.gambar;
            } else {
                imgSrc = '{{ asset("storage") }}/' + item.gambar;
            }
        }
        
        // Set konten modal
        document.getElementById('modalImg').src = imgSrc;
        document.getElementById('modalTitle').innerText = item.judul;
        document.getElementById('modalMeta').innerHTML = `
            <span>📅 ${new Date(item.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}</span>
            <span>•</span>
            <span>🕐 ${new Date(item.created_at).toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })}</span>
        `;
        document.getElementById('modalContent').innerHTML = item.konten;
        
        // Tampilkan modal
        document.getElementById('modalDetail').classList.add('active');
        document.body.classList.add('modal-open');
    }
    
    function closeDetail() {
        document.getElementById('modalDetail').classList.remove('active');
        document.body.classList.remove('modal-open');
    }
    
    // ESC key to close
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('modalDetail');
            if (modal.classList.contains('active')) {
                closeDetail();
            }
        }
    });
    
    // Klik di luar modal container untuk close
    document.getElementById('modalDetail').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDetail();
        }
    });
</script>

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