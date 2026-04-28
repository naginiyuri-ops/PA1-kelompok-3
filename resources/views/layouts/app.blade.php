<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Geosite Danau Toba')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
   <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        /* ==================== WARNA ==================== */
        :root {
            --blue-dark: #003366;
            --blue-medium: #1a4a7a;
            --gold: #c6a43b;
            --white: #ffffff;
        }
        
        /* ==================== NAVBAR ==================== */
        .navbar {
            transition: all 0.4s ease;
            padding: 0.8rem 0;
            background: rgba(0, 51, 102, 0.92);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(198, 164, 59, 0.25);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        
        .navbar.scrolled {
            background: rgba(0, 51, 102, 0.96);
            padding: 0.4rem 0;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.12);
        }
        
        .navbar .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }
        
        /* ========== LOGO SECTION - POJOK KIRI (KE SUDUT) ========== */
        .logo-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0;
            padding: 0;
        }
        
        /* Logo gambar - ukuran besar, sudut lembut, efek melayang */
        .logo-img {
            height: 60px;
            width: auto;
            border-radius: 16px;
            object-fit: cover;
            transition: all 0.3s ease;
            box-shadow: 0 8px 16px -6px rgba(0, 0, 0, 0.2);
            background: rgba(255,255,255,0.05);
        }
        
        .logo-img:hover {
            transform: scale(1.02) translateY(-2px);
            box-shadow: 0 14px 24px -8px rgba(0, 0, 0, 0.3);
        }
        
        /* Pembatas vertikal antar logo */
        .logo-divider {
            width: 1.5px;
            height: 42px;
            background: linear-gradient(145deg, rgba(255,255,255,0.5), rgba(255,255,255,0.1));
            border-radius: 2px;
        }
        
        /* Teks GeoToba - di samping kanan logo */
        .navbar-brand {
            font-size: 1.65rem;
            font-weight: 800;
            color: white !important;
            margin: 0;
            padding: 0 0 0 6px;
            letter-spacing: -0.3px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.2s ease;
        }
        
        .navbar-brand span {
            color: var(--gold);
            font-weight: 800;
        }
        
        /* Navbar Links - menu di kanan */
        .nav-link {
            color: white !important;
            font-weight: 500;
            margin: 0 0.2rem;
            transition: all 0.25s ease;
            font-size: 0.95rem;
            padding: 0.5rem 1rem;
            border-radius: 40px;
        }
        
        .nav-link:hover {
            color: var(--gold) !important;
            background: rgba(255, 255, 255, 0.12);
            transform: translateY(-2px);
        }
        
        .nav-link.active {
            color: var(--gold) !important;
            background: rgba(198, 164, 59, 0.2);
        }
        
        /* Dropdown Menu */
        .dropdown-menu {
            background: rgba(0, 51, 102, 0.96);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 24px;
            padding: 0.6rem 0;
            margin-top: 0.7rem;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.3);
        }
        
        .dropdown-item {
            color: white;
            padding: 10px 24px;
            font-size: 0.85rem;
            transition: all 0.25s ease;
            border-radius: 18px;
            margin: 4px 10px;
        }
        
        .dropdown-item:hover {
            background: rgba(198, 164, 59, 0.2);
            color: var(--gold);
            transform: translateX(5px);
        }
        
        .dropdown-header {
            color: var(--gold);
            padding: 8px 24px;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .dropdown-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.15);
        }
        
        /* Navbar Toggler */
        .navbar-toggler {
            border: none;
            background: rgba(255, 255, 255, 0.15);
            padding: 8px 12px;
            border-radius: 14px;
        }
        
        .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(198, 164, 59, 0.4);
            outline: none;
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        /* ==================== RESPONSIVE ==================== */
        @media (max-width: 991px) {
            .logo-img {
                height: 52px;
            }
            .logo-divider {
                height: 36px;
            }
            .navbar-brand {
                font-size: 1.5rem;
            }
            .logo-wrapper {
                gap: 10px;
            }
            
            .navbar-collapse {
                background: rgba(0, 51, 102, 0.96);
                backdrop-filter: blur(20px);
                padding: 1.2rem;
                border-radius: 28px;
                margin-top: 1rem;
                border: 1px solid rgba(255,255,255,0.15);
            }
            
            .nav-link {
                text-align: center;
                padding: 0.7rem !important;
            }
            .dropdown-item {
                text-align: center;
            }
        }
        
        @media (max-width: 768px) {
            .logo-img {
                height: 46px;
                border-radius: 14px;
            }
            .logo-divider {
                height: 32px;
            }
            .navbar-brand {
                font-size: 1.35rem;
            }
            .logo-wrapper {
                gap: 8px;
            }
        }
        
        @media (max-width: 576px) {
            .logo-img {
                height: 40px;
                border-radius: 12px;
            }
            .logo-divider {
                height: 28px;
            }
            .navbar-brand {
                font-size: 1.2rem;
            }
            .logo-wrapper {
                gap: 6px;
            }
        }
        
        @media (max-width: 400px) {
            .logo-img {
                height: 36px;
            }
            .logo-divider {
                height: 24px;
            }
            .navbar-brand {
                font-size: 1rem;
            }
        }
        
        /* ==================== FOOTER ==================== */
        .footer {
            background: var(--blue-dark);
            color: white;
            padding: 40px 0 20px;
            margin-top: 0;
        }
        
        .footer h5 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }
        
        .footer h5::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 35px;
            height: 2px;
            background: var(--gold);
            border-radius: 4px;
        }
        
        .footer a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.8rem;
        }
        
        .footer a:hover {
            color: var(--gold);
            transform: translateX(5px);
        }
        
        .social-icons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        
        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            background: var(--gold);
            transform: translateY(-3px);
        }
        
        .social-icons a:hover i {
            color: var(--blue-dark);
        }
        
        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 15px;
            margin-top: 25px;
            text-align: center;
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.5);
        }
        
        .back-to-top {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 44px;
            height: 44px;
            border-radius: 22px;
            background: var(--gold);
            color: var(--blue-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        
        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }
        
        .back-to-top:hover {
            background: white;
            transform: translateY(-4px);
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navbar - Logo di pojok kiri (ke sudut) seperti gambar yang Anda maksud -->
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        <div class="container">
            <!-- LOGO SECTION: Diletakkan di pojok kiri/sudut kiri navbar -->
            <div class="logo-wrapper">
                <!-- Logo Bank Indonesia -->
                <img src="{{ asset('image/Logo/logobankindonesia.jpg') }}" alt="Bank Indonesia" class="logo-img" loading="lazy">
                <!-- Pembatas -->
                <div class="logo-divider"></div>
                <!-- Logo Del -->
                <img src="{{ asset('image/Logo/del.jpg') }}" alt="Logo Del" class="logo-img" loading="lazy">
                <!-- Pembatas -->
                <div class="logo-divider"></div>
                <!-- Teks GeoToba di samping kanan logo -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Geo<span>Toba</span>
                </a>
            </div>
            
            <!-- Tombol Hamburger untuk mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Menu Navigasi - diletakkan di kanan -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/') }}">
                            <i></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('informasi') ? 'active' : '' }}" href="{{ url('/informasi') }}">
                            <i></i> Informasi
                        </a>
                    </li>
                    
                    <!-- DESTINASI DROPDOWN -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('destinasi*') ? 'active' : '' }}" 
                           href="#" 
                           id="destinasiDropdown" 
                           role="button" 
                           data-bs-toggle="dropdown" 
                           aria-expanded="false">
                            <i></i> Destinasi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="destinasiDropdown">
                            <li><h6 class="dropdown-header"><i class="fas fa-tag me-1"></i> KATEGORI DESTINASI</h6></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi/alam') }}">
                                <i></i> Destinasi Alam
                            </a></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi/buatan') }}">
                                <i></i> Destinasi Buatan
                            </a></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi/budaya') }}">
                                <i></i> Destinasi Budaya
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi') }}">
                                <i></i> Semua Destinasi
                            </a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}" href="{{ url('/galeri') }}">
                            <i></i> Galeri
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('berita') ? 'active' : '' }}" href="{{ url('/berita') }}">
                            <i></i> Berita
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ url('/kontak') }}">
                            <i></i> Kontak
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Geo<span style="color: #c6a43b;">Toba</span></h5>
                    <p style="font-size: 0.8rem; color: rgba(255,255,255,0.7);">Sistem Informasi Geosite Danau Toba - Menyajikan informasi lengkap tentang keindahan geologi dan budaya Batak di kawasan Danau Toba.</p>
                    <div class="social-icons">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Tautan</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/') }}">Beranda</a></li>
                        <li class="mb-2"><a href="{{ url('/informasi') }}">Informasi</a></li>
                        <li class="mb-2"><a href="{{ url('/galeri') }}">Galeri</a></li>
                        <li class="mb-2"><a href="{{ url('/berita') }}">Berita</a></li>
                        <li class="mb-2"><a href="{{ url('/kontak') }}">Kontak</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Destinasi</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/destinasi/alam') }}">Destinasi Alam</a></li>
                        <li class="mb-2"><a href="{{ url('/destinasi/buatan') }}">Destinasi Buatan</a></li>
                        <li class="mb-2"><a href="{{ url('/destinasi/budaya') }}">Destinasi Budaya</a></li>
                        <li class="mb-2"><a href="{{ url('/destinasi') }}">Semua Destinasi</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Kontak</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-map-marker-alt me-2" style="color: #c6a43b;"></i> 
                            Danau Toba, Sumatera Utara
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-phone me-2" style="color: #c6a43b;"></i> 
                            +62 812 3456 7890
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-envelope me-2" style="color: #c6a43b;"></i> 
                            info@geotoba.com
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2026 GeoToba - Geopark Danau Toba. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <div class="back-to-top" id="backToTop" aria-label="Back to top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        AOS.init({ duration: 1000, once: true });
        
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });
        
        backToTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        
        // Mobile menu close after click
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        const navbarCollapse = document.querySelector('.navbar-collapse');
        if (navbarCollapse) {
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 992 && navbarCollapse.classList.contains('show')) {
                        new bootstrap.Collapse(navbarCollapse, { toggle: false }).hide();
                    }
                });
            });
        }
    </script>
    
    @stack('scripts')
</body>
</html>