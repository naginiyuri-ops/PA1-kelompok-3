@extends('layouts.app')

@section('title', 'Galeri - Geosite Danau Toba')

@section('content')

<style>
   * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* ==================== WARNA BIRU ==================== */
:root {
    --blue-dark: #003366;
    --blue-medium: #1a4a7a;
    --blue-light: #e8f0f7;
    --gold: #c6a43b;
}

/* LOGO */
.logo-container {
    position: fixed;
    top: 20px;
    left: 20px;
    z-index: 9999;
    display: flex;
    align-items: center;
    gap: 20px;
    background: rgba(0, 51, 102, 0.98);
    padding: 8px 24px;
    border-radius: 60px;
    backdrop-filter: blur(8px);
    box-shadow: 0 8px 25px rgba(0, 51, 102, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.logo-container:hover {
    background: #1a4a7a;
    transform: translateY(-2px);
}

.flag-img {
    width: 100px;
    height: auto;
    border-radius: 6px;
}

.logo-divider {
    width: 2px;
    height: 35px;
    background: rgba(255,255,255,0.3);
}

.del-img {
    width: 50px;
    height: auto;
    border-radius: 8px;
}

.geotoba-text {
    font-size: 1.5rem;
    font-weight: 800;
    letter-spacing: 1px;
    color: white;
}

.geotoba-sub {
    font-size: 0.7rem;
    font-weight: 500;
    color: rgba(255,255,255,0.8);
}

/* HERO */
.galeri-hero {
    height: auto;
    min-height: 400px;
    background: url('{{ asset("image/galeri.jpg") }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    margin-top: 76px;
    padding: 80px 20px;
    position: relative;
}

.galeri-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 51, 102, 0.6);
    z-index: 1;
}

.galeri-hero > div {
    position: relative;
    z-index: 2;
}

.galeri-hero h1 {
    font-size: 3rem;
    font-family: 'Cormorant Garamond', serif;
    margin-bottom: 10px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.galeri-hero p {
    font-size: 0.9rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    text-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
    opacity: 0.9;
}

/* SECTION */
.section {
    padding: 60px 0;
    background: var(--blue-light);
}

.container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 20px;
}

/* TABS */
.galeri-tabs {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 35px;
    flex-wrap: wrap;
}

.tab-btn {
    background: transparent;
    border: 1px solid rgba(0, 51, 102, 0.2);
    padding: 8px 28px;
    font-size: 0.8rem;
    font-weight: 500;
    color: var(--blue-dark);
    cursor: pointer;
    border-radius: 40px;
    transition: 0.3s;
}

.tab-btn:hover,
.tab-btn.active {
    background: var(--gold);
    border-color: var(--gold);
    color: white;
}

/* GALERI GRID */
.galeri-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.galeri-item {
    aspect-ratio: 1/1;
    overflow: hidden;
    border-radius: 16px;
    cursor: pointer;
    background: white;
    box-shadow: 0 5px 15px rgba(0, 51, 102, 0.1);
    transition: all 0.3s ease;
}

.galeri-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 51, 102, 0.2);
}

.galeri-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.3s;
}

.galeri-item:hover img {
    transform: scale(1.03);
}

/* LIGHTBOX */
.lightbox {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.95);
    z-index: 10000;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.lightbox.active {
    display: flex;
}

.lightbox img {
    max-width: 90%;
    max-height: 85vh;
    border-radius: 8px;
}

.lightbox-close {
    position: absolute;
    top: 20px;
    right: 30px;
    color: white;
    font-size: 35px;
    cursor: pointer;
    transition: 0.3s;
}

.lightbox-close:hover {
    color: var(--gold);
}

/* COUNTER */
.gallery-counter {
    text-align: center;
    margin-top: 25px;
    color: var(--blue-dark);
    font-size: 0.8rem;
    font-weight: 500;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .flag-img {
        width: 60px;
    }
    .del-img {
        width: 35px;
    }
    .geotoba-text {
        font-size: 1.2rem;
    }
    .galeri-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    .galeri-hero h1 {
        font-size: 2rem;
    }
    .section {
        padding: 40px 0;
    }
    .galeri-hero {
        min-height: 300px;
        padding: 60px 20px;
    }
}

@media (max-width: 576px) {
    .flag-img {
        width: 45px;
    }
    .del-img {
        width: 28px;
    }
    .geotoba-text {
        font-size: 0.9rem;
    }
    .galeri-grid {
        grid-template-columns: 1fr;
        gap: 12px;
    }
    .galeri-hero h1 {
        font-size: 1.6rem;
    }
    .galeri-hero p {
        font-size: 0.7rem;
    }
    .galeri-hero {
        min-height: 250px;
        padding: 40px 20px;
    }
    .tab-btn {
        padding: 6px 20px;
        font-size: 0.7rem;
    }
}
</style>

<!-- LOGO -->

<!-- HERO -->
<section class="galeri-hero">
    <div>
        <h1 data-aos="fade-up">Galeri Geosite</h1>
        <p data-aos="fade-up">Dokumentasi keindahan Geopark Danau Toba</p>
    </div>
</section>

<!-- TABS -->
<div class="container">
    <div class="galeri-tabs" data-aos="fade-up">
        <button class="tab-btn active" data-tab="meat">Meat</button>
        <button class="tab-btn" data-tab="batu-bahisan">Batu Bahisan</button>
        <button class="tab-btn" data-tab="liang-sipege">Liang Sipege</button>
    </div>
</div>

<!-- GALLERY GRID -->
<div class="section">
    <div class="container">
        <div class="galeri-grid" id="galeriGrid"></div>
        <div class="gallery-counter" id="galleryCounter"></div>
    </div>
</div>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
    <span class="lightbox-close">&times;</span>
    <img id="lightboxImg">
</div>

<script>
    // Data dari database (dari controller)
    const galeriData = {
        meat: @json($galeriByKategori['meat']->map(function($item) {
            return [
                'src' => $item->gambar,
                'caption' => $item->judul . ' - ' . ($item->deskripsi ?? '')
            ];
        })),
        'batu-bahisan': @json($galeriByKategori['batu-bahisan']->map(function($item) {
            return [
                'src' => $item->gambar,
                'caption' => $item->judul . ' - ' . ($item->deskripsi ?? '')
            ];
        })),
        'liang-sipege': @json($galeriByKategori['liang-sipege']->map(function($item) {
            return [
                'src' => $item->gambar,
                'caption' => $item->judul . ' - ' . ($item->deskripsi ?? '')
            ];
        }))
    };

    let currentTab = 'meat';

    function renderGallery(tab) {
        const grid = document.getElementById('galeriGrid');
        let photos = galeriData[tab] || [];

        if (photos.length === 0) {
            grid.innerHTML = '<div style="grid-column:1/-1; text-align:center; padding:60px"><p style="color:#003366">Belum ada foto di kategori ini. Silakan tambahkan galeri melalui admin panel.</p></div>';
            document.getElementById('galleryCounter').innerHTML = '';
            return;
        }

        grid.innerHTML = photos.map(function(photo) {
            return '<div class="galeri-item" data-src="' + photo.src + '" data-caption="' + photo.caption + '">' +
                '<img src="' + photo.src + '" alt="' + photo.caption + '" loading="lazy">' +
                '</div>';
        }).join('');

        document.getElementById('galleryCounter').innerHTML = '<span>📸 Menampilkan ' + photos.length + ' foto</span>';

        document.querySelectorAll('.galeri-item').forEach(function(item) {
            item.addEventListener('click', function() {
                openLightbox(item.dataset.src, item.dataset.caption);
            });
        });
    }

    function openLightbox(src, caption) {
        var lb = document.getElementById('lightbox');
        document.getElementById('lightboxImg').src = src;
        lb.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('active');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.tab-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.tab-btn').forEach(function(b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            renderGallery(btn.dataset.tab);
        });
    });

    document.getElementById('lightbox').addEventListener('click', function(e) {
        if (e.target === this || e.target.classList.contains('lightbox-close')) {
            closeLightbox();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });

    // Initial render
    renderGallery('meat');
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 700,
        once: true
    });
</script>

@endsection