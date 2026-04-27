<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meat - Geosite Danau Toba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/meat.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar" id="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="[GANTI_LINK_BENDERA]" alt="Bendera" class="flag-img">
            <div class="logo-divider"></div>
            <img src="[GANTI_LINK_DEL]" alt="D el" class="del-img">
            <div class="logo-divider"></div>
            <div class="logo-text">
                <h4>GEOTOBA</h4>
                <p>Geopark Danau Toba</p>
            </div>
        </div>
        <div class="nav-menu">
            <a href="{{ url('/') }}" class="nav-link home-btn">Home</a>
            <a href="#sejarah" class="nav-link">Sejarah</a>
            <a href="#umkm" class="nav-link">UMKM</a>
            <a href="#penginapan" class="nav-link">Penginapan</a>
            <a href="#fasilitas" class="nav-link">Fasilitas</a>
            <a href="#galeri" class="nav-link">Galeri</a>
            <a href="#lokasi" class="nav-link">Lokasi</a>
        </div>
        <div class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </div>
    </div>
</div>

<div class="mobile-overlay" id="mobileOverlay">
    <div class="mobile-close" id="mobileClose">×</div>
    <a href="{{ url('/') }}" class="mobile-link mobile-home">Home</a>
    <a href="#sejarah" class="mobile-link">Sejarah</a>
    <a href="#umkm" class="mobile-link">UMKM</a>
    <a href="#penginapan" class="mobile-link">Penginapan</a>
    <a href="#fasilitas" class="mobile-link">Fasilitas</a>
    <a href="#galeri" class="mobile-link">Galeri</a>
    <a href="#lokasi" class="mobile-link">Lokasi</a>
</div>

<!-- HERO -->
<section class="hero">
    <div>
        <h1 class="hero-title">M E A T</h1>
        <p class="hero-subtitle">Pulau Sibandang · Danau Toba</p>
    </div>
</section>

<!-- SEJARAH -->
<section id="sejarah" class="section">
    <div class="container">
        <div class="section-title">
            <h2>Sejarah</h2>
            <div class="divider"></div>
        </div>
        <div class="sejarah-item">
            <div class="sejarah-image"><img src="/image/meat/sejarah1.jpg"></div>
            <div class="sejarah-text">
                <p>Meat adalah salah satu desa di Kecamatan Tampahan,Kabupaten Toba, Provinsi Sumatra Utara,Indonesia.</p>
            </div>
        </div>
        <div class="sejarah-item reverse">
            <div class="sejarah-image"><img src="/image/meat/sejarah2.jpg"></div>
            <div class="sejarah-text">
                <p>Hingga kini, masyarakat Meat menjaga tradisi leluhur seperti upacara adat, tarian Tortor, pembuatan ulos, dan Gondang. Nilai luhur ini terus diwariskan.</p>
            </div>
        </div>
        <div class="sejarah-item">
            <div class="sejarah-image"><img src="/image/meat/sejarah3.jpg"></div>
            <div class="sejarah-text">
                <p>Budaya dan kearifan lokal yang masih terjaga menjadikan Meat destinasi wisata budaya menarik di Geopark Danau Toba.</p>
            </div>
        </div>
    </div>
</section>

<!-- UMKM -->
<section id="umkm" class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>UMKM Lokal</h2>
            <div class="divider"></div>
        </div>
        <div class="grid-3">
            <div class="card">
                <img src="/image/meat/umkm-ulos.jpg" class="card-img">
                <div class="card-content">
                    <h3>Tenun Ulos</h3>
                    <p>Kain tenun khas Batak dengan motif tradisional.</p>
                    <div class="card-location">📍 Desa Meat</div>
                    <div class="card-contact">📞 [KONTAK_UMKM1]</div>
                </div>
            </div>
            <div class="card">
                <img src="/image/meat/umkm-anyaman.jpg" class="card-img">
                <div class="card-content">
                    <h3>Anyaman Bambu</h3>
                    <p>Kerajinan tangan dari bambu.</p>
                    <div class="card-location">📍 Desa Meat</div>
                    <div class="card-contact">📞 [KONTAK_UMKM2]</div>
                </div>
            </div>
            <div class="card">
                <img src="/image/meat/umkm-madu.jpg" class="card-img">
                <div class="card-content">
                    <h3>Madu Hutan</h3>
                    <p>Madu alami premium dari hutan sekitar.</p>
                    <div class="card-location">📍 Kawasan Hutan</div>
                    <div class="card-contact">📞 [KONTAK_UMKM3]</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PENGINAPAN -->
<section id="penginapan" class="section">
    <div class="container">
        <div class="section-title">
            <h2>Penginapan</h2>
            <div class="divider"></div>
        </div>
        <div class="grid-3">
            <div class="card">
                <img src="/image/meat/homestay.jpg" class="card-img">
                <div class="card-content">
                    <h3>Homestay Desa Meat</h3>
                    <p>Menginap di rumah adat Batak.</p>
                    <div class="card-price">💰 [HARGA1] / malam</div>
                    <div class="card-contact">📞 [KONTAK_HOMESTAY]</div>
                </div>
            </div>
            <div class="card">
                <img src="/image/meat/lakeview.jpg" class="card-img">
                <div class="card-content">
                    <h3>Sibandang Lake View</h3>
                    <p>Pemandangan langsung Danau Toba.</p>
                    <div class="card-price">💰 [HARGA2] / malam</div>
                    <div class="card-contact">📞 [KONTAK_LAKEVIEW]</div>
                </div>
            </div>
            <div class="card">
                <img src="/image/meat/lodge.jpg" class="card-img">
                <div class="card-content">
                    <h3>Meat Traditional Lodge</h3>
                    <p>Tradisional dengan fasilitas modern.</p>
                    <div class="card-price">💰 [HARGA3] / malam</div>
                    <div class="card-contact">📞 [KONTAK_LODGE]</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FASILITAS -->
<section id="fasilitas" class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Fasilitas</h2>
            <div class="divider"></div>
        </div>
        <div class="grid-2">
            <div class="fasilitas-item">
                <img src="/image/meat/fasilitas-parkir.jpg" class="fasilitas-img">
                <div class="fasilitas-content">
                    <h4>Area Parkir</h4>
                    <p>Luas dan aman</p>
                    <div class="fasilitas-price">[PARKIR]</div>
                </div>
            </div>
            <div class="fasilitas-item">
                <img src="/image/meat/fasilitas-toilet.jpg" class="fasilitas-img">
                <div class="fasilitas-content">
                    <h4>Toilet</h4>
                    <p>Bersih</p>
                    <div class="fasilitas-price">[TOILET]</div>
                </div>
            </div>
            <div class="fasilitas-item">
                <img src="/image/meat/fasilitas-warung.jpg" class="fasilitas-img">
                <div class="fasilitas-content">
                    <h4>Warung Makan</h4>
                    <p>Kuliner khas</p>
                    <div class="fasilitas-price">Mulai [WARUNG]</div>
                </div>
            </div>
            <div class="fasilitas-item">
                <img src="/image/meat/fasilitas-camping.jpg" class="fasilitas-img">
                <div class="fasilitas-content">
                    <h4>Area Camping</h4>
                    <p>View danau</p>
                    <div class="fasilitas-price">[CAMPING]</div>
                </div>
            </div>
            <div class="fasilitas-item">
                <img src="/image/meat/fasilitas-spotfoto.jpg" class="fasilitas-img">
                <div class="fasilitas-content">
                    <h4>Spot Foto</h4>
                    <p>Instagramable</p>
                    <div class="fasilitas-price">Gratis</div>
                </div>
            </div>
            <div class="fasilitas-item">
                <img src="/image/meat/fasilitas-musholla.jpg" class="fasilitas-img">
                <div class="fasilitas-content">
                    <h4>Musholla</h4>
                    <p>Tempat ibadah</p>
                    <div class="fasilitas-price">Gratis</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- GALERI -->
<section id="galeri" class="section">
    <div class="container">
        <div class="section-title">
            <h2>Galeri Pantai</h2>
            <div class="divider"></div>
        </div>
        <div class="galeri-tabs">
            <button class="tab-btn active" data-tab="pantai1">Pantai 1</button>
            <button class="tab-btn" data-tab="pantai2">Pantai 2</button>
            <button class="tab-btn" data-tab="pantai3">Pantai 3</button>
        </div>
        <div class="galeri-grid" id="galeriGrid">
            @for($i=1;$i<=4;$i++)<div class="galeri-item pantai1"><img src="/image/meat/pantai1-{{$i}}.jpg"></div>@endfor
            @for($i=1;$i<=4;$i++)<div class="galeri-item pantai2" style="display:none"><img src="/image/meat/pantai2-{{$i}}.jpg"></div>@endfor
            @for($i=1;$i<=4;$i++)<div class="galeri-item pantai3" style="display:none"><img src="/image/meat/pantai3-{{$i}}.jpg"></div>@endfor
        </div>
    </div>
</section>

<!-- LOKASI -->
<section id="lokasi" class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Lokasi & Rute</h2>
            <div class="divider"></div>
        </div>
        <div class="maps-section">
            <div class="maps-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0!2d99.0835095!3d2.3339262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0415b8f7da39%3A0xc6beb74287f355a5!2sBalige%2C%20Toba%20Samosir%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" allowfullscreen loading="lazy"></iframe>
            </div>
            <div class="rute-info">
                <div class="rute-item"><h4>Motor</h4><p>Balige → Ajibata (30m) → Ferry (20m) → Meat (15m)</p></div>
                <div class="rute-item"><h4>Mobil</h4><p>Balige → Ajibata (30m) → Parkir → Ferry → Transportasi lokal</p></div>
                <div class="rute-item"><h4>Estimasi</h4><p>Dari Balige: ± 1.5 jam</p></div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container">
        <h3>Kunjungi Meat Sekarang</h3>
        <div class="divider"></div>
        <p>Rasakan pengalaman wisata budaya Batak yang autentik</p>
        <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-logo">
            <img src="[GANTI_LINK_BENDERA]" class="footer-logo-img">
            <div class="footer-logo-divider"></div>
            <img src="[GANTI_LINK_DEL]" class="footer-logo-img">
            <div class="footer-logo-divider"></div>
            <div class="footer-logo-text">
                <h4>GEOTOBA</h4>
                <p>Geopark Danau Toba</p>
            </div>
        </div>
        <div class="footer-nav">
            <a href="{{ url('/') }}">Home</a>
            <a href="#sejarah">Sejarah</a>
            <a href="#umkm">UMKM</a>
            <a href="#penginapan">Penginapan</a>
            <a href="#fasilitas">Fasilitas</a>
            <a href="#galeri">Galeri</a>
            <a href="#lokasi">Lokasi</a>
        </div>
        <div class="footer-copyright">
            <p>&copy; 2024 GEOTOBA. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
    <div class="lightbox-close" onclick="closeLightbox()">×</div>
    <img id="lightboxImg">
</div>

<script>
    // Hamburger Menu
    var hamburger = document.getElementById('hamburger');
    var mobileOverlay = document.getElementById('mobileOverlay');
    var mobileClose = document.getElementById('mobileClose');

    hamburger.addEventListener('click', function() {
        mobileOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

    function closeMenu() {
        mobileOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    mobileClose.addEventListener('click', closeMenu);
    document.querySelectorAll('.mobile-link').forEach(function(link) {
        link.addEventListener('click', closeMenu);
    });

    // Galeri tabs
    document.querySelectorAll('.tab-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.tab-btn').forEach(function(b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            var tab = btn.dataset.tab;
            document.querySelectorAll('.galeri-item').forEach(function(item) {
                item.style.display = item.classList.contains(tab) ? 'block' : 'none';
            });
        });
    });

    // Lightbox
    var lightbox = document.getElementById('lightbox');
    document.querySelectorAll('.galeri-item img').forEach(function(img) {
        img.addEventListener('click', function() {
            lightbox.classList.add('active');
            document.getElementById('lightboxImg').src = img.src;
        });
    });

    function closeLightbox() {
        lightbox.classList.remove('active');
    }
    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) closeLightbox();
    });

    // Smooth scroll
    document.querySelectorAll('.nav-link[href^="#"], .mobile-link[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            var target = document.querySelector(this.getAttribute('href'));
            if (target) target.scrollIntoView({ behavior: 'smooth' });
        });
    });
</script>
</body>
</html>