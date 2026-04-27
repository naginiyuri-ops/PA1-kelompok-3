@extends('layouts.app')

@section('title', 'Berita - Geosite Danau Toba')

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

/* LOGO BIRU */
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

/* HERO dengan background berita.jpg */
.berita-hero {
    height: auto;
    min-height: 400px;
    background: url('{{ asset("image/berita.jpg") }}');
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

/* Overlay BIRU tipis agar teks terbaca */
.berita-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 51, 102, 0.6);
    z-index: 1;
}

.berita-hero > div {
    position: relative;
    z-index: 2;
}

.berita-hero h1 {
    font-size: 3rem;
    font-family: 'Cormorant Garamond', serif;
    margin-bottom: 10px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.berita-hero p {
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

/* BERITA GRID */
.berita-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.berita-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 51, 102, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    cursor: pointer;
}

.berita-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 51, 102, 0.2);
}

.berita-image {
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.berita-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.3s;
}

.berita-card:hover .berita-image img {
    transform: scale(1.05);
}

.berita-content {
    padding: 20px;
}

.berita-date {
    font-size: 0.7rem;
    color: var(--gold);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 8px;
    display: block;
}

.berita-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--blue-dark);
    margin-bottom: 10px;
    line-height: 1.4;
}

.berita-excerpt {
    font-size: 0.85rem;
    color: #666;
    line-height: 1.6;
    margin-bottom: 15px;
}

.berita-readmore {
    font-size: 0.7rem;
    color: var(--gold);
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    font-weight: 600;
    transition: 0.3s;
    display: inline-block;
}

.berita-readmore:hover {
    color: var(--blue-dark);
    transform: translateX(5px);
}

/* MODAL DETAIL BERITA */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    z-index: 10001;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.modal.active {
    display: flex;
}

.modal-content {
    background: white;
    max-width: 800px;
    width: 90%;
    max-height: 85vh;
    border-radius: 16px;
    overflow-y: auto;
    position: relative;
    cursor: default;
}

.modal-close {
    position: absolute;
    top: 15px;
    right: 20px;
    color: #333;
    font-size: 35px;
    cursor: pointer;
    background: rgba(255,255,255,0.9);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.3s;
}

.modal-close:hover {
    background: var(--gold);
    color: white;
}

.modal-body {
    padding: 30px;
}

.modal-image {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 20px;
}

.modal-date {
    font-size: 0.75rem;
    color: var(--gold);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 10px;
    display: block;
}

.modal-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--blue-dark);
    margin-bottom: 20px;
    font-family: 'Cormorant Garamond', serif;
}

.modal-text {
    font-size: 1rem;
    line-height: 1.8;
    color: #444;
}

/* EMPTY STATE */
.empty-state {
    grid-column: 1 / -1;
    text-align: center;
    padding: 80px 20px;
    background: white;
    border-radius: 16px;
}

.empty-state-icon {
    font-size: 4rem;
    margin-bottom: 20px;
}

.empty-state h3 {
    font-size: 1.5rem;
    color: var(--blue-dark);
    margin-bottom: 10px;
}

.empty-state p {
    color: #888;
    margin-bottom: 20px;
}

/* PAGINATION */
.pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 40px;
    flex-wrap: wrap;
}

.pagination button {
    background: transparent;
    border: 1px solid rgba(0, 51, 102, 0.2);
    padding: 8px 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
    color: var(--blue-dark);
}

.pagination button:hover {
    background: var(--gold);
    border-color: var(--gold);
    color: white;
}

.pagination button.active {
    background: var(--blue-dark);
    border-color: var(--blue-dark);
    color: white;
}

.pagination button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

/* FOOTER BIRU */
.footer {
    background: linear-gradient(135deg, #003366 0%, #0a4a7a 50%, #005c8a 100%);
    color: #fff;
    padding: 50px 0 20px;
    position: relative;
    overflow: hidden;
}

.footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, #c6a43b, #e8c45a, #c6a43b);
}

.footer .container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-logo {
    text-align: center;
    margin-bottom: 40px;
}

.footer-logo .logo-icon {
    font-size: 2rem;
    color: #c6a43b;
    margin-bottom: 10px;
}

.footer-logo h3 {
    font-size: 1.5rem;
    font-weight: 700;
    margin: 5px 0;
    color: white;
}

.footer-logo h3 span {
    color: #c6a43b;
}

.footer-logo p {
    font-size: 0.7rem;
    letter-spacing: 2px;
    color: rgba(255,255,255,0.6);
}

.footer-title {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 20px;
    position: relative;
    display: inline-block;
    color: white;
}

.footer-title::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 35px;
    height: 2px;
    background: #c6a43b;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 12px;
}

.footer-links a {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 0.85rem;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.footer-links a i {
    font-size: 0.7rem;
    color: #c6a43b;
}

.footer-links a:hover {
    color: #c6a43b;
    transform: translateX(5px);
}

.contact-info li {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 15px;
    color: rgba(255, 255, 255, 0.7);
    font-size: 0.85rem;
}

.contact-info li i {
    width: 30px;
    height: 30px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #c6a43b;
    transition: all 0.3s ease;
}

.contact-info li:hover i {
    background: #c6a43b;
    color: #003366;
    transform: scale(1.1);
}

.social-icons {
    display: flex;
    gap: 12px;
    margin-top: 20px;
}

.social-icons a {
    width: 35px;
    height: 35px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    transition: all 0.3s ease;
    font-size: 1rem;
}

.social-icons a:hover {
    background: #c6a43b;
    color: #003366;
    transform: translateY(-3px);
}

.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 20px;
    margin-top: 40px;
    text-align: center;
    font-size: 0.7rem;
    color: rgba(255, 255, 255, 0.5);
}

.footer-bottom a {
    color: #c6a43b;
    text-decoration: none;
}

.footer-bottom a:hover {
    text-decoration: underline;
}

/* RESPONSIVE */
@media (max-width: 900px) {
    .berita-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

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
    .berita-hero h1 {
        font-size: 2rem;
    }
    .section {
        padding: 40px 0;
    }
    .berita-hero {
        min-height: 300px;
        padding: 60px 20px;
    }
    .berita-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    .modal-title {
        font-size: 1.4rem;
    }
    .modal-body {
        padding: 20px;
    }
    .modal-image {
        height: 200px;
    }
    .footer {
        padding: 40px 0 20px;
    }
    .footer-logo h3 {
        font-size: 1.3rem;
    }
    .footer-title {
        margin-top: 20px;
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
    .berita-hero h1 {
        font-size: 1.6rem;
    }
    .berita-hero p {
        font-size: 0.7rem;
    }
    .berita-hero {
        min-height: 250px;
        padding: 40px 20px;
    }
    .berita-title {
        font-size: 1rem;
    }
    .modal-title {
        font-size: 1.2rem;
    }
}
</style>

<!-- LOGO -->


<!-- HERO dengan background berita.jpg -->
<section class="berita-hero">
    <div>
        <h1 data-aos="fade-up">Berita & Event</h1>
        <p data-aos="fade-up">Informasi terkini seputar Geopark Danau Toba</p>
    </div>
</section>

<!-- BERITA GRID -->
<section class="section">
    <div class="container">
        <div class="berita-grid" id="beritaGrid"></div>
        <div class="pagination" id="pagination"></div>
    </div>
</section>

<!-- MODAL DETAIL BERITA -->
<div class="modal" id="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <div class="modal-body">
            <img id="modalImage" class="modal-image" src="" alt="">
            <span id="modalDate" class="modal-date"></span>
            <h2 id="modalTitle" class="modal-title"></h2>
            <div id="modalText" class="modal-text"></div>
        </div>
    </div>
</div>

<!-- FOOTER BIRU -->
<footer class="footer">
    <div class="container">
        <div class="footer-logo">
            <div class="logo-icon">
                <i class="fas fa-mountain"></i>
            </div>
            <h3>Geo<span>Toba</span></h3>
            <p>GEOPARK DANAU TOBA • WARISAN DUNIA UNESCO</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="footer-title">Tentang GeoToba</h5>
                <p style="color: rgba(255,255,255,0.6); font-size: 0.85rem; line-height: 1.7; margin-top: 15px;">
                    Sistem Informasi Geosite Danau Toba - Menyajikan informasi lengkap tentang keindahan geologi, budaya Batak, dan pesona alam Caldera Danau Toba.
                </p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="footer-title">Tautan</h5>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                    <li><a href="{{ url('/destinasi') }}"><i class="fas fa-chevron-right"></i> Destinasi</a></li>
                    <li><a href="{{ url('/galeri') }}"><i class="fas fa-chevron-right"></i> Galeri</a></li>
                    <li><a href="{{ url('/berita') }}"><i class="fas fa-chevron-right"></i> Berita</a></li>
                    <li><a href="{{ url('/kontak') }}"><i class="fas fa-chevron-right"></i> Kontak</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="footer-title">Destinasi</h5>
                <ul class="footer-links">
                    <li><a href="{{ url('/destinasi/alam') }}"><i class="fas fa-chevron-right"></i> Destinasi Alam</a></li>
                    <li><a href="{{ url('/destinasi/buatan') }}"><i class="fas fa-chevron-right"></i> Destinasi Buatan</a></li>
                    <li><a href="{{ url('/destinasi/budaya') }}"><i class="fas fa-chevron-right"></i> Destinasi Budaya</a></li>
                    <li><a href="{{ url('/geosite/meat') }}"><i class="fas fa-chevron-right"></i> Meat Village</a></li>
                    <li><a href="{{ url('/geosite/batu-bahisan') }}"><i class="fas fa-chevron-right"></i> Batu Bahisan</a></li>
                    <li><a href="{{ url('/geosite/liang-sipege') }}"><i class="fas fa-chevron-right"></i> Liang Sipege</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="footer-title">Kontak</h5>
                <ul class="footer-links contact-info">
                    <li><i class="fas fa-map-marker-alt"></i> Danau Toba, Sumatera Utara</li>
                    <li><i class="fas fa-phone"></i> +62 812 3456 7890</li>
                    <li><i class="fas fa-envelope"></i> info@geotoba.com</li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2024 GeoToba - Geopark Danau Toba. All rights reserved. | 
                <a href="#">Privacy Policy</a> | 
                <a href="#">Terms of Service</a>
            </p>
            <p style="margin-top: 8px;">
                <i class="fas fa-globe" style="color: #c6a43b;"></i> 
                Warisan Geologi Kelas Dunia - UNESCO Global Geopark
            </p>
        </div>
    </div>
</footer>

<script>
    // DATA BERITA KOSONG - NANTI DIISI DENGAN CRUD
    const beritaData = [];

    let currentPage = 1;
    const itemsPerPage = 6;

    function renderBerita() {
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const beritaToShow = beritaData.slice(startIndex, endIndex);
        
        const grid = document.getElementById('beritaGrid');
        
        if (beritaData.length === 0) {
            // Tampilkan pesan kosong
            grid.innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-icon">📰</div>
                    <h3>Belum Ada Berita</h3>
                    <p>Saat ini belum ada berita yang tersedia.</p>
                    <p style="font-size: 0.8rem;">Silakan cek kembali nanti untuk informasi terbaru.</p>
                </div>
            `;
            document.getElementById('pagination').innerHTML = '';
            return;
        }
        
        if (beritaToShow.length === 0) {
            grid.innerHTML = '<div style="grid-column:1/-1; text-align:center; padding:60px"><p>Tidak ada berita</p></div>';
            return;
        }
        
        grid.innerHTML = beritaToShow.map(berita => `
            <div class="berita-card" onclick="openModal(${berita.id})">
                <div class="berita-image">
                    <img src="${berita.image}" alt="${berita.title}">
                </div>
                <div class="berita-content">
                    <span class="berita-date">${berita.date}</span>
                    <h3 class="berita-title">${berita.title}</h3>
                    <p class="berita-excerpt">${berita.excerpt.substring(0, 100)}${berita.excerpt.length > 100 ? '...' : ''}</p>
                    <span class="berita-readmore">Baca Selengkapnya →</span>
                </div>
            </div>
        `).join('');
        
        renderPagination();
    }
    
    function renderPagination() {
        const totalPages = Math.ceil(beritaData.length / itemsPerPage);
        const paginationDiv = document.getElementById('pagination');
        
        if (totalPages <= 1) {
            paginationDiv.innerHTML = '';
            return;
        }
        
        let paginationHtml = '';
        
        // Tombol Previous
        paginationHtml += `<button onclick="changePage(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''}>« Sebelumnya</button>`;
        
        // Nomor halaman
        for (let i = 1; i <= totalPages; i++) {
            paginationHtml += `<button onclick="changePage(${i})" class="${i === currentPage ? 'active' : ''}">${i}</button>`;
        }
        
        // Tombol Next
        paginationHtml += `<button onclick="changePage(${currentPage + 1})" ${currentPage === totalPages ? 'disabled' : ''}>Selanjutnya »</button>`;
        
        paginationDiv.innerHTML = paginationHtml;
    }
    
    function changePage(page) {
        const totalPages = Math.ceil(beritaData.length / itemsPerPage);
        if (page < 1 || page > totalPages) return;
        currentPage = page;
        renderBerita();
        window.scrollTo({ top: 300, behavior: 'smooth' });
    }
    
    function openModal(id) {
        const berita = beritaData.find(b => b.id === id);
        if (!berita) return;
        
        document.getElementById('modalImage').src = berita.image;
        document.getElementById('modalDate').innerText = berita.date;
        document.getElementById('modalTitle').innerText = berita.title;
        document.getElementById('modalText').innerHTML = berita.content;
        document.getElementById('modal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    
    function closeModal() {
        document.getElementById('modal').classList.remove('active');
        document.body.style.overflow = '';
    }
    
    // Tutup modal dengan ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
    
    renderBerita();
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 700,
        once: true
    });
</script>

@endsection