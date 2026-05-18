@extends('layouts.app')

@section('title', 'Informasi - Geosite Danau Toba')

@section('content')

<style>
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
    
    .info-date {
        font-size: 11px;
        color: #c6a43b;
        display: inline-block;
        margin-bottom: 10px;
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
        gap: 6px;
        color: #c6a43b;
        font-size: 0.7rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-top: 10px;
        cursor: pointer;
        background: none;
        border: none;
    }
    
    .btn-readmore:hover {
        gap: 10px;
        color: #003366;
    }
    
    /* Modal */
    .modal {
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
    
    .modal.active {
        display: block;
    }
    
    .modal-container {
        max-width: 800px;
        margin: 0 auto;
        background: white;
        border-radius: 20px;
        overflow: hidden;
        animation: fadeIn 0.3s ease;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    
    .modal-header {
        position: relative;
        height: 250px;
        overflow: hidden;
    }
    
    .modal-header img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .modal-header .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        padding: 30px 25px 20px;
    }
    
    .modal-header .overlay h2 {
        color: white;
        font-size: 1.5rem;
        margin: 0;
    }
    
    .modal-body {
        padding: 25px;
    }
    
    .modal-body .meta {
        font-size: 0.75rem;
        color: #888;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }
    
    .modal-body .full-content {
        color: #444;
        line-height: 1.8;
        font-size: 0.9rem;
    }
    
    .modal-body .full-content p {
        margin-bottom: 1em;
    }
    
    .modal-close {
        position: fixed;
        top: 20px;
        right: 30px;
        background: rgba(0,0,0,0.7);
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.3rem;
        transition: all 0.3s ease;
        z-index: 10001;
    }
    
    .modal-close:hover {
        background: #c6a43b;
        color: #003366;
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
        .info-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }
    }
    
    @media (max-width: 768px) {
        .info-hero h1 {
            font-size: 1.6rem;
        }
        .info-section {
            padding: 35px 0;
        }
        .info-grid {
            grid-template-columns: 1fr;
        }
        .info-card-img {
            height: 180px;
        }
        .modal-header {
            height: 200px;
        }
        .modal-header .overlay h2 {
            font-size: 1.2rem;
        }
        .modal-body {
            padding: 20px;
        }
    }
</style>

<!-- HERO SECTION -->
<div class="info-hero">
    <div data-aos="fade-up">
        <h1>Informasi Geopark</h1>
        <p>Jelajahi Pengetahuan Tentang Geopark Danau Toba</p>
    </div>
</div>

<!-- MAIN CONTENT -->
<section class="info-section">
    <div class="container">
        <div class="info-grid">
            @forelse($informasiList as $item)
            <div class="info-card" data-aos="fade-up">
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
                    <span class="info-date">
                        📅 {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                    </span>
                    <h3>{{ $item->judul }}</h3>
                    <p class="info-excerpt">
                        {{ Str::limit(strip_tags($item->konten), 100) }}
                    </p>
                    <button class="btn-readmore" onclick="showDetail({{ $item->id }})">
                        Baca Selengkapnya →
                    </button>
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

<!-- MODAL -->
<div id="infoModal" class="modal">
    <div class="modal-close" onclick="closeModal()">&times;</div>
    <div class="modal-container">
        <div class="modal-header">
            <img src="" alt="" id="modalImg">
            <div class="overlay">
                <h2 id="modalTitle"></h2>
            </div>
        </div>
        <div class="modal-body">
            <div class="meta" id="modalMeta"></div>
            <div class="full-content" id="modalContent"></div>
        </div>
    </div>
</div>

<script>
    // Data informasi dari server
    const infoData = @json($informasiList);
    
    function showDetail(id) {
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
            📅 ${new Date(item.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}
        `;
        document.getElementById('modalContent').innerHTML = item.konten;
        
        // Tampilkan modal
        document.getElementById('infoModal').classList.add('active');
        document.body.classList.add('modal-open');
    }
    
    function closeModal() {
        document.getElementById('infoModal').classList.remove('active');
        document.body.classList.remove('modal-open');
    }
    
    // ESC key to close
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('infoModal');
            if (modal.classList.contains('active')) {
                closeModal();
            }
        }
    });
    
    // Klik di luar modal container untuk close
    document.getElementById('infoModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
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

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

@endsection