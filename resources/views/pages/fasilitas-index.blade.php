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
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        max-width: 1100px;
        margin: 0 auto;
    }
    
    .category-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        text-decoration: none;
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
    }
    
    .category-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.15);
    }
    
    .card-img-wrapper {
        height: 200px;
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
    
    @media (max-width: 992px) {
        .category-grid { grid-template-columns: repeat(2, 1fr); }
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

    /* ==================== PREMIUM OVERLAY READER MODAL ==================== */
    .reader-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--white);
        z-index: 1060; /* Above navbar */
        overflow-y: auto;
        visibility: hidden;
        opacity: 0;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    .reader-modal.active {
        visibility: visible;
        opacity: 1;
    }
    
    .progress-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: rgba(0,0,0,0.01);
        z-index: 1070;
    }
    
    .progress-bar {
        height: 4px;
        background: linear-gradient(90deg, var(--gold) 0%, var(--gold-light) 100%);
        width: 0%;
        transition: width 0.1s ease;
    }
    
    .reader-nav {
        position: sticky;
        top: 0;
        background: rgba(255, 255, 255, 0.88);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        padding: 14px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid rgba(15, 23, 42, 0.05);
        z-index: 99;
    }
    
    .reader-logo {
        font-family: 'Playfair Display', serif;
        font-size: 1.35rem;
        font-weight: 700;
        color: #003366;
    }
    
    .reader-logo span {
        color: var(--gold);
    }
    
    .btn-close-modal {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #f8fafc;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #0f172a;
        font-size: 0.85rem;
    }
    
    .btn-close-modal:hover {
        background: #003366;
        color: white;
        transform: rotate(90deg);
    }
    
    .reader-content {
        max-width: 740px;
        margin: 0 auto;
        padding: 50px 24px 80px;
        transform: translateY(20px);
        opacity: 0;
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1) 0.05s;
    }
    
    .reader-modal.active .reader-content {
        transform: translateY(0);
        opacity: 1;
    }
    
    .reader-header {
        text-align: center;
        margin-bottom: 35px;
    }
    
    .reader-category {
        display: inline-block;
        background: rgba(198, 164, 59, 0.08);
        color: var(--gold-dark);
        padding: 5px 16px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 20px;
    }
    
    .reader-title {
        font-size: 2.2rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
        color: #003366;
        margin-bottom: 20px;
        line-height: 1.3;
        letter-spacing: -0.3px;
    }
    
    .reader-image-container {
        width: 100%;
        border-radius: 16px;
        overflow: hidden;
        margin: 35px 0;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    
    .reader-image {
        width: 100%;
        max-height: 450px;
        object-fit: cover;
    }
    
    .reader-body {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #334155;
    }
    
    .reader-footer {
        display: flex;
        justify-content: space-between;
        margin-top: 60px;
        padding-top: 30px;
        border-top: 1px solid #f8fafc;
    }
    
    .btn-back-reader, .btn-share-reader {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 24px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
    }
    
    .btn-back-reader {
        background: white;
        color: #64748b;
        border: 1px solid #e2e8f0;
    }
    
    .btn-back-reader:hover {
        background: #f8fafc;
        color: #003366;
        border-color: #cbd5e1;
    }
    
    .btn-share-reader {
        background: rgba(198, 164, 59, 0.1);
        color: var(--gold-dark);
    }
    
    .btn-share-reader:hover {
        background: var(--gold);
        color: white;
    }
    
    @media (max-width: 768px) {
        .reader-nav { padding: 12px 20px; }
        .reader-title { font-size: 1.6rem; }
        .reader-content { padding: 30px 20px 60px; }
        .reader-body { font-size: 1rem; }
        .btn-back-reader span, .btn-share-reader span { display: none; }
        .btn-back-reader, .btn-share-reader { padding: 10px 18px; }
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

            {{-- Kartu Khusus Penginapan --}}
            <a href="{{ route('penginapan.index') }}" class="category-card" data-aos="fade-up" style="text-decoration: none;">
                <div class="card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?q=80&w=2070&auto=format&fit=crop" alt="Penginapan">
                </div>
                <div class="card-content">
                    <h3>{{ __('app.penginapan.title') }}</h3>
                    <p style="margin-bottom: 15px;">{{ __('app.penginapan.subtitle') }}</p>
                    
                    <div style="display: flex; flex-direction: column; gap: 8px; font-size: 0.85rem; color: #64748b; text-align: left; margin-top: 15px; padding-top: 15px; border-top: 1px solid #e2e8f0;">
                        <div><i class="fas fa-arrow-right" style="color: var(--blue-dark); width: 20px;"></i> {{ app()->getLocale() == 'en' ? 'Click to view all accommodations' : 'Klik untuk melihat semua penginapan' }}</div>
                    </div>
                </div>
            </a>
            
            {{-- Hasil CRUD Fasilitas Lainnya --}}
            @forelse($fasilitas as $item)
            <div class="category-card" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}" style="cursor: pointer;" onclick="openFasilitas({{ $item->id }})">
                <div class="card-img-wrapper">
                    @if($item->gambar && file_exists(public_path($item->gambar)))
                        <img src="{{ asset($item->gambar) }}" alt="{{ $item->nama }}">
                    @else
                        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop" alt="Fasilitas">
                    @endif
                    <div style="position: absolute; top: 15px; right: 15px; background: var(--gold); color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; z-index: 3;">
                        {{ ucwords($item->jenis) }}
                    </div>
                </div>
                <div class="card-content">
                    <h3>{{ app()->getLocale() == 'en' ? ($item->nama_en ?? $item->nama) : $item->nama }}</h3>
                    <p style="margin-bottom: 15px;">{{ Str::limit(app()->getLocale() == 'en' ? ($item->deskripsi_en ?? $item->deskripsi) : $item->deskripsi, 80) }}</p>
                    
                    <div style="display: flex; flex-direction: column; gap: 8px; font-size: 0.85rem; color: #64748b; text-align: left; margin-top: 15px; padding-top: 15px; border-top: 1px solid #e2e8f0;">
                        @if($item->lokasi)
                            <div><i class="fas fa-map-marker-alt" style="color: var(--blue-dark); width: 20px;"></i> {{ $item->lokasi }}</div>
                        @endif
                        @if($item->harga)
                            <div><i class="fas fa-tag" style="color: var(--blue-dark); width: 20px;"></i> {{ $item->harga }}</div>
                        @endif
                        @if($item->kontak)
                            <div><i class="fas fa-phone" style="color: var(--blue-dark); width: 20px;"></i> {{ $item->kontak }}</div>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 50px 0;">
                <i class="fas fa-building" style="font-size: 3rem; color: #cbd5e1; margin-bottom: 15px;"></i>
                <h4 style="color: #64748b;">Belum ada data fasilitas</h4>
            </div>
            @endforelse
            
        </div>
    </div>
</div>

<!-- ==================== MODAL READER PREMIUM ==================== -->
<div id="readerModal" class="reader-modal">
    <div class="progress-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>
    
    <div class="reader-nav">
        <div class="reader-logo">Geo<span>Toba</span></div>
        <button class="btn-close-modal" onclick="closeFasilitas()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    
    <div class="reader-content">
        <div class="reader-header">
            <span class="reader-category" id="modalCategory">Fasilitas</span>
            <h1 class="reader-title" id="modalTitle"></h1>
        </div>
        
        <div class="reader-image-container">
            <img id="modalImage" class="reader-image" src="" alt="">
        </div>
        
        <div class="reader-body">
            <div id="modalContent" style="margin-bottom: 30px;"></div>
            
            <div style="background: #f8fafc; border-radius: 16px; padding: 25px; border: 1px solid #e2e8f0;">
                <h4 style="color: #0f172a; font-weight: 700; margin-bottom: 20px; font-family: 'Playfair Display', serif;">Informasi Fasilitas</h4>
                <div id="modalLocation" style="display: flex; align-items: flex-start; gap: 15px; margin-bottom: 15px;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: white; display: flex; align-items: center; justify-content: center; color: #003366; box-shadow: 0 4px 10px rgba(0,0,0,0.05); flex-shrink: 0;">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <div style="font-size: 0.8rem; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Lokasi</div>
                        <div id="modalLocationText" style="color: #334155; font-weight: 500;"></div>
                    </div>
                </div>
                
                <div id="modalPrice" style="display: flex; align-items: flex-start; gap: 15px; margin-bottom: 15px;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: white; display: flex; align-items: center; justify-content: center; color: #003366; box-shadow: 0 4px 10px rgba(0,0,0,0.05); flex-shrink: 0;">
                        <i class="fas fa-tag"></i>
                    </div>
                    <div>
                        <div style="font-size: 0.8rem; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Harga</div>
                        <div id="modalPriceText" style="color: #334155; font-weight: 500;"></div>
                    </div>
                </div>
                
                <div id="modalContact" style="display: flex; align-items: flex-start; gap: 15px;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: white; display: flex; align-items: center; justify-content: center; color: #003366; box-shadow: 0 4px 10px rgba(0,0,0,0.05); flex-shrink: 0;">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <div style="font-size: 0.8rem; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Kontak</div>
                        <a id="modalContactText" href="#" style="color: var(--gold-dark); font-weight: 600; text-decoration: none;"></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="reader-footer">
            <button class="btn-back-reader" onclick="closeFasilitas()">
                <i class="fas fa-arrow-left"></i> <span>Kembali</span>
            </button>
            <button class="btn-share-reader" onclick="bagikanFasilitas()">
                <i class="fas fa-share-alt"></i> <span>Bagikan</span>
            </button>
        </div>
    </div>
</div>

<script>
    const fasilitasData = @json($fasilitas);
    
    function openFasilitas(id) {
        const item = fasilitasData.find(x => x.id === id);
        if (!item) return;
        
        let imgSrc = '{{ asset("image/default.jpg") }}';
        if (item.gambar) {
            if (item.gambar.startsWith('data:image') || item.gambar.startsWith('http')) {
                imgSrc = item.gambar;
            } else if (item.gambar.startsWith('image/')) {
                imgSrc = '{{ asset("") }}' + item.gambar;
            } else {
                imgSrc = '{{ asset("storage") }}/' + item.gambar;
            }
        }
        
        document.getElementById('modalCategory').innerText = item.jenis || 'Fasilitas';
        document.getElementById('modalTitle').innerText = item.nama;
        document.getElementById('modalContent').innerHTML = item.deskripsi;
        document.getElementById('modalImage').src = imgSrc;
        
        // Handle Location
        if (item.lokasi) {
            document.getElementById('modalLocation').style.display = 'flex';
            document.getElementById('modalLocationText').innerText = item.lokasi;
        } else {
            document.getElementById('modalLocation').style.display = 'none';
        }
        
        // Handle Price
        if (item.harga) {
            document.getElementById('modalPrice').style.display = 'flex';
            document.getElementById('modalPriceText').innerText = item.harga;
        } else {
            document.getElementById('modalPrice').style.display = 'none';
        }
        
        // Handle Contact
        if (item.kontak) {
            document.getElementById('modalContact').style.display = 'flex';
            document.getElementById('modalContactText').innerText = item.kontak;
            document.getElementById('modalContactText').href = 'tel:' + item.kontak;
        } else {
            document.getElementById('modalContact').style.display = 'none';
        }
        
        const modal = document.getElementById('readerModal');
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
        
        modal.scrollTop = 0;
        document.getElementById('progressBar').style.width = '0%';
    }
    
    function closeFasilitas() {
        const modal = document.getElementById('readerModal');
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
    
    function bagikanFasilitas() {
        const title = document.getElementById('modalTitle').innerText;
        const url = window.location.href;
        
        if (navigator.share) {
            navigator.share({
                title: title,
                text: 'Cek fasilitas menarik di GeoToba ini:',
                url: url
            }).catch(err => console.log('Share dibatalkan'));
        } else {
            navigator.clipboard.writeText(url).then(() => {
                alert('Tautan berhasil disalin ke clipboard!');
            }).catch(() => {
                alert('Salin tautan berikut: ' + url);
            });
        }
    }
    
    const modalElement = document.getElementById('readerModal');
    if (modalElement) {
        modalElement.addEventListener('scroll', function() {
            const scrollTop = modalElement.scrollTop;
            const scrollHeight = modalElement.scrollHeight - modalElement.clientHeight;
            const scrolled = scrollHeight > 0 ? (scrollTop / scrollHeight) * 100 : 0;
            const progressBar = document.getElementById('progressBar');
            if (progressBar) {
                progressBar.style.width = scrolled + '%';
            }
        });
    }
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeFasilitas();
        }
    });
</script>
@endsection

