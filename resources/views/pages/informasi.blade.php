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
        background: #f8f9fa;
    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }
    
    .info-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.12);
    }
    
    .info-card-img {
        height: 200px;
        overflow: hidden;
    }
    
    .info-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    
    .info-card:hover .info-card-img img {
        transform: scale(1.05);
    }
    
    .info-card-body {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .info-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
        flex-wrap: wrap;
        gap: 5px;
    }
    
    .info-date {
        font-size: 11px;
        color: #c6a43b;
    }
    
    .info-views {
        font-size: 10px;
        color: #999;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    
    .info-card-body h3 {
        font-size: 1.15rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 12px;
        line-height: 1.4;
    }
    
    .info-excerpt {
        color: #666;
        font-size: 0.8rem;
        line-height: 1.6;
        margin-bottom: 15px;
        flex: 1;
    }
    
    .btn-readmore {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: transparent;
        color: #c6a43b;
        font-size: 0.7rem;
        font-weight: 600;
        text-decoration: none;
        padding: 8px 0;
        transition: all 0.3s ease;
        cursor: pointer;
        border: none;
        width: fit-content;
    }
    
    .btn-readmore:hover {
        gap: 12px;
        color: #003366;
    }
    
    /* ========== MODAL ANIMASI ========== */
    .modal-detail {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.85);
        z-index: 10000;
        overflow-y: auto;
    }
    
    .modal-detail.active {
        display: block;
    }
    
    .modal-detail-container {
        max-width: 1100px;
        margin: 30px auto;
        background: white;
        border-radius: 0;
        overflow: hidden;
        animation: slideUpFade 0.5s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        box-shadow: 0 30px 60px rgba(0,0,0,0.3);
    }
    
    @keyframes slideUpFade {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Header Modal */
    .modal-detail-header {
        position: relative;
        height: 450px;
        overflow: hidden;
    }
    
    .modal-detail-header img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 8s ease;
    }
    
    .modal-detail.active .modal-detail-header img {
        transform: scale(1.05);
    }
    
    .modal-detail-header .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.4) 50%, transparent 100%);
        padding: 60px 50px 40px;
    }
    
    .modal-detail-header .overlay .category {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 6px 18px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        margin-bottom: 15px;
        animation: fadeInUp 0.5s ease 0.2s both;
    }
    
    .modal-detail-header .overlay h2 {
        color: white;
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0 0 15px 0;
        line-height: 1.3;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        animation: fadeInUp 0.5s ease 0.3s both;
    }
    
    .modal-detail-header .overlay .meta {
        display: flex;
        gap: 25px;
        font-size: 0.85rem;
        color: rgba(255,255,255,0.85);
        animation: fadeInUp 0.5s ease 0.4s both;
    }
    
    .modal-detail-header .overlay .meta span {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Body Modal */
    .modal-detail-body {
        padding: 50px;
        background: white;
    }
    
    .modal-intro {
        font-size: 1.1rem;
        line-height: 1.7;
        color: #555;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
        font-style: italic;
    }
    
    .modal-divider {
        width: 80px;
        height: 3px;
        background: #c6a43b;
        margin: 30px 0;
    }
    
    .modal-detail-body .full-content {
        color: #333;
        line-height: 1.9;
        font-size: 1rem;
    }
    
    .modal-detail-body .full-content p {
        margin-bottom: 1.2em;
    }
    
    .modal-detail-body .full-content h1,
    .modal-detail-body .full-content h2,
    .modal-detail-body .full-content h3 {
        color: #003366;
        margin-top: 1.8em;
        margin-bottom: 0.8em;
        font-weight: 700;
    }
    
    .modal-detail-body .full-content h2 {
        font-size: 1.5rem;
        border-left: 4px solid #c6a43b;
        padding-left: 18px;
    }
    
    .modal-detail-body .full-content h3 {
        font-size: 1.2rem;
    }
    
    .modal-detail-body .full-content ul,
    .modal-detail-body .full-content ol {
        margin: 1em 0;
        padding-left: 1.8em;
    }
    
    .modal-detail-body .full-content li {
        margin-bottom: 0.5em;
    }
    
    .modal-detail-body .full-content blockquote {
        border-left: 4px solid #c6a43b;
        padding: 15px 30px;
        margin: 25px 0;
        background: #f8f9fa;
        border-radius: 0 16px 16px 0;
        font-style: italic;
        color: #003366;
    }
    
    /* Info Box */
    .info-box {
        background: #f0f7ff;
        padding: 20px 25px;
        border-radius: 12px;
        margin: 25px 0;
        border-left: 4px solid #c6a43b;
    }
    
    .info-box h4 {
        color: #003366;
        margin-bottom: 10px;
        font-size: 1rem;
    }
    
    .info-box p {
        margin-bottom: 0 !important;
    }
    
    /* Footer Modal */
    .modal-detail-footer {
        padding: 25px 50px 40px;
        border-top: 1px solid #eee;
        background: #fafafa;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .btn-back-modal {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #003366;
        color: white;
        padding: 10px 28px;
        border-radius: 40px;
        font-size: 0.8rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
        border: none;
    }
    
    .btn-back-modal:hover {
        background: #c6a43b;
        color: #003366;
        gap: 12px;
    }
    
    .btn-share {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: transparent;
        color: #003366;
        padding: 10px 28px;
        border-radius: 40px;
        font-size: 0.8rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1px solid #ddd;
        cursor: pointer;
    }
    
    .btn-share:hover {
        background: #c6a43b;
        color: white;
        gap: 12px;
        border-color: #c6a43b;
    }
    
    /* Close Button */
    .modal-detail-close {
        position: fixed;
        top: 20px;
        right: 30px;
        background: white;
        color: #003366;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.5rem;
        transition: all 0.3s ease;
        z-index: 10001;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        border: none;
    }
    
    .modal-detail-close:hover {
        background: #c6a43b;
        color: white;
        transform: rotate(90deg);
    }
    
    body.modal-open {
        overflow: hidden;
    }
    
    .empty-state {
        text-align: center;
        padding: 50px 20px;
        background: white;
        border-radius: 16px;
    }
    
    @media (max-width: 992px) {
        .info-grid { grid-template-columns: repeat(2, 1fr); gap: 25px; }
        .modal-detail-header { height: 350px; }
        .modal-detail-header .overlay h2 { font-size: 1.8rem; }
        .modal-detail-body { padding: 30px; }
        .modal-detail-footer { padding: 20px 30px 30px; }
    }
    
    @media (max-width: 768px) {
        .info-hero h1 { font-size: 1.6rem; }
        .info-section { padding: 35px 0; }
        .info-grid { grid-template-columns: 1fr; }
        .info-card-img { height: 180px; }
        .modal-detail-header { height: 280px; }
        .modal-detail-header .overlay { padding: 30px 25px 20px; }
        .modal-detail-header .overlay h2 { font-size: 1.4rem; }
        .modal-detail-body { padding: 20px; }
        .modal-detail-body .full-content { font-size: 0.9rem; }
        .modal-detail-footer { flex-direction: column; }
        .modal-detail-close { width: 40px; height: 40px; font-size: 1.2rem; top: 15px; right: 20px; }
    }
</style>

<div class="info-hero">
    <div data-aos="fade-up">
        <h1>Informasi Geopark</h1>
        <p>Jelajahi Pengetahuan Tentang Geopark Danau Toba</p>
    </div>
</div>

<section class="info-section">
    <div class="container">
        <div class="info-grid">
            @forelse($informasiList as $item)
            <div class="info-card" data-id="{{ $item->id }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="info-card-img">
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
                    <img src="{{ $imgSrc }}" alt="{{ $item->judul }}" loading="lazy">
                </div>
                <div class="info-card-body">
                    <div class="info-meta">
                        <span class="info-date">📅 {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}</span>
                        <span class="info-views" id="views-{{ $item->id }}">Views {{ number_format($item->views ?? 0) }}  dilihat</span>
                    </div>
                    <h3>{{ $item->judul }}</h3>
                    <p class="info-excerpt">{{ Str::limit(strip_tags($item->konten), 120) }}</p>
                    <button class="btn-readmore" onclick="openDetail({{ $item->id }})">Baca Selengkapnya →</button>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-database fa-3x text-muted mb-3"></i>
                <h3>Belum Ada Informasi</h3>
                <p>Belum ada data informasi yang tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- MODAL ANIMASI FULL KONTEN -->
<div id="modalDetail" class="modal-detail">
    <div class="modal-detail-close" onclick="closeDetail()">&times;</div>
    <div class="modal-detail-container">
        <div class="modal-detail-header">
            <img src="" alt="" id="modalImg">
            <div class="overlay">
                <span class="category">INFORMASI GEOPARK</span>
                <h2 id="modalTitle"></h2>
                <div class="meta" id="modalMeta"></div>
            </div>
        </div>
        <div class="modal-detail-body">
            <div class="full-content" id="modalContent"></div>
            <div class="modal-divider"></div>
            <div class="info-box">
                <h4><i class="fas fa-info-circle"></i> Informasi Tambahan</h4>
                <p>Artikel ini merupakan bagian dari kumpulan informasi Geopark Danau Toba yang bertujuan untuk mengedukasi masyarakat tentang warisan geologi dan budaya.</p>
            </div>
        </div>
        <div class="modal-detail-footer">
            <button class="btn-back-modal" onclick="closeDetail()">
                <i class="fas fa-arrow-left"></i> Kembali
            </button>
            <button class="btn-share" onclick="shareArticle()">
                <i class="fas fa-share-alt"></i> Bagikan Artikel
            </button>
        </div>
    </div>
</div>

<script>
    const infoData = @json($informasiList);
    
    async function openDetail(id) {
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
            <span><i class="fas fa-calendar-alt"></i> ${new Date(item.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}</span>
            <span><i class="fas fa-eye"></i> ${(item.views || 0).toLocaleString()} x dibaca</span>
        `;
        document.getElementById('modalContent').innerHTML = item.konten;
        
        // Tampilkan modal dengan animasi
        document.getElementById('modalDetail').classList.add('active');
        document.body.classList.add('modal-open');
        
        // Increment views
        try {
            const response = await fetch('/api/informasi/' + id + '/view', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            });
            const data = await response.json();
            if (data.success) {
                const viewsSpan = document.getElementById('views-' + id);
                if (viewsSpan) {
                    viewsSpan.innerHTML = `👁️ ${data.views.toLocaleString()} x dibaca`;
                }
                document.getElementById('modalMeta').innerHTML = `
                    <span><i class="fas fa-calendar-alt"></i> ${new Date(item.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}</span>
                    <span><i class="fas fa-eye"></i> ${data.views.toLocaleString()} x dibaca</span>
                `;
            }
        } catch (err) {
            console.log('View increment error:', err);
        }
    }
    
    function closeDetail() {
        document.getElementById('modalDetail').classList.remove('active');
        document.body.classList.remove('modal-open');
    }
    
    function shareArticle() {
        const title = document.getElementById('modalTitle').innerText;
        if (navigator.share) {
            navigator.share({
                title: title,
                url: window.location.href
            });
        } else {
            alert('Bagikan artikel: ' + title + '\n' + window.location.href);
        }
    }
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('modalDetail');
            if (modal.classList.contains('active')) closeDetail();
        }
    });
    
    document.getElementById('modalDetail').addEventListener('click', function(e) {
        if (e.target === this) closeDetail();
    });
</script>

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({ duration: 600, once: true, offset: 50 });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

@endsection