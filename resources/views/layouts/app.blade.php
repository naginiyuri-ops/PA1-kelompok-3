<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Geosite Danau Toba')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        * { font-family: 'Inter', sans-serif; }
        
        :root {
            --blue-dark: #003366;
            --blue-medium: #1a4a7a;
            --gold: #c6a43b;
            --white: #ffffff;
        }
        
        /* Navbar Mobile Optimization */
        .navbar {
            transition: all 0.4s ease;
            padding: 0.5rem 0;
            background: rgba(0, 51, 102, 0.92);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(198, 164, 59, 0.25);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        
        /* Efek saat Navbar Scroll */
        .navbar.scrolled {
            background: var(--white) !important;
            padding: 0.3rem 0;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.12);
        }

        .navbar.scrolled .nav-link, 
        .navbar.scrolled .navbar-brand { color: var(--blue-dark) !important; }

        .navbar.scrolled .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(0, 51, 102, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        .navbar .container { 
            max-width: 1400px; 
            margin: 0 auto; 
            padding: 0 20px; 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            width: 100%; 
        }
        
        /* Logo wrapper responsive */
        .logo-wrapper { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            flex-wrap: wrap;
        }
        
        .logo-img { 
            height: 50px; 
            width: auto; 
            border-radius: 8px;
            object-fit: cover; 
            transition: all 0.3s ease; 
            box-shadow: 0 8px 16px -6px rgba(0, 0, 0, 0.2); 
        }
        
        /* Responsive logo size untuk HP */
        @media (max-width: 576px) {
            .logo-img { 
                height: 35px; 
            }
            .logo-divider {
                height: 30px;
            }
            .navbar-brand { 
                font-size: 1.1rem !important; 
            }
            .logo-wrapper { 
                gap: 5px; 
            }
        }
        
        @media (min-width: 577px) and (max-width: 768px) {
            .logo-img { 
                height: 40px; 
            }
            .navbar-brand { 
                font-size: 1.3rem; 
            }
        }
        
        .logo-divider { 
            width: 1.5px; 
            height: 40px; 
            background: linear-gradient(145deg, rgba(255,255,255,0.5), rgba(255,255,255,0.1)); 
            border-radius: 2px; 
        }
        
        .navbar-brand { 
            font-size: 1.65rem; 
            font-weight: 800; 
            color: white !important; 
            margin: 0; 
            padding: 0 0 0 6px; 
            white-space: nowrap;
        }
        
        .navbar-brand span { 
            color: var(--gold); 
            font-weight: 800; 
        }
        
        /* Navbar Toggler untuk HP */
        .navbar-toggler {
            border: none;
            padding: 8px 10px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
        }
        
        .navbar-toggler:focus {
            box-shadow: 0 0 0 2px var(--gold);
            outline: none;
        }
        
        .navbar-toggler-icon {
            width: 24px;
            height: 24px;
        }
        
        /* Mobile Menu Styles */
        @media (max-width: 991px) {
            .navbar-collapse {
                background: rgba(0, 51, 102, 0.98);
                backdrop-filter: blur(20px);
                border-radius: 20px;
                padding: 15px;
                margin-top: 12px;
                max-height: 80vh;
                overflow-y: auto;
            }
            
            .navbar.scrolled .navbar-collapse {
                background: rgba(255, 255, 255, 0.98);
                box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            }
            
            .nav-link {
                padding: 12px 16px !important;
                margin: 4px 0;
                border-radius: 12px;
                text-align: center;
            }
            
            .dropdown-menu {
                background: rgba(0, 51, 102, 0.96);
                border: none;
                border-radius: 16px;
                margin: 8px 0;
                padding: 8px 0;
                position: static !important;
                transform: none !important;
                width: 100%;
            }
            
            .navbar.scrolled .dropdown-menu {
                background: rgba(245, 245, 245, 0.98);
            }
            
            .dropdown-item {
                padding: 10px 20px;
                text-align: center;
            }
            
            .dropdown-header {
                text-align: center;
            }
        }
        
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
        
        /* ============ FOOTER YANG LEBIH RAPI KE SUDUT ============ */
        .footer { 
            background: var(--blue-dark); 
            color: white; 
            padding: 50px 0 30px;
            margin-top: auto;
            width: 100%;
        }
        
        /* Container footer lebih lebar dan menempel ke pinggir */
        .footer .container {
            max-width: 1400px;
            width: 100%;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Mengatur jarak antar kolom footer */
        .footer .row {
            margin: 0 -15px;
        }
        
        .footer [class*="col-"] {
            padding: 0 15px;
        }
        
        /* Kolom pertama (Geo Toba) lebih ke kiri di laptop */
        @media (min-width: 992px) {
            .footer .col-lg-4:first-child {
                padding-right: 40px;
            }
            
            /* Kolom tautan lebih rapat ke kiri */
            .footer .col-lg-2,
            .footer .col-lg-3 {
                padding-left: 10px;
                padding-right: 10px;
            }
        }
        
        .footer h5 { 
            font-size: 1.1rem; 
            font-weight: 600; 
            margin-bottom: 1.2rem; 
            position: relative; 
            display: inline-block; 
        }
        
        .footer h5::after { 
            content: ''; 
            position: absolute; 
            bottom: -8px; 
            left: 0; 
            width: 40px; 
            height: 2px; 
            background: var(--gold); 
            border-radius: 4px; 
        }
        
        .footer p { 
            font-size: 0.85rem; 
            color: rgba(255,255,255,0.7); 
            line-height: 1.5;
            margin-bottom: 1rem;
        }
        
        .footer ul {
            padding-left: 0;
            list-style: none;
        }
        
        .footer ul li { 
            margin-bottom: 10px; 
        }
        
        .footer a { 
            color: rgba(255, 255, 255, 0.7); 
            text-decoration: none; 
            transition: all 0.3s ease; 
            font-size: 0.85rem; 
            display: inline-block;
        }
        
        .footer a:hover { 
            color: var(--gold); 
            transform: translateX(5px); 
        }
        
        /* Social Icons */
        .social-icons { 
            display: flex; 
            gap: 12px; 
            margin-top: 20px; 
        }
        
        .social-icons a { 
            display: inline-flex; 
            align-items: center; 
            justify-content: center; 
            width: 36px; 
            height: 36px; 
            border-radius: 50%; 
            background: rgba(255, 255, 255, 0.1); 
            transition: all 0.3s ease; 
        }
        
        .social-icons a i {
            font-size: 1rem;
        }
        
        .social-icons a:hover { 
            background: var(--gold); 
            transform: translateY(-3px); 
        }
        
        .social-icons a:hover i { 
            color: var(--blue-dark); 
        }
        
        /* Copyright */
        .copyright { 
            border-top: 1px solid rgba(255, 255, 255, 0.1); 
            padding-top: 20px; 
            margin-top: 35px; 
            text-align: center; 
            font-size: 0.75rem; 
            color: rgba(255, 255, 255, 0.5); 
        }
        
        .copyright p {
            margin-bottom: 0;
            font-size: 0.75rem;
        }
        
        /* Back to Top Mobile */
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
        
        @media (max-width: 576px) {
            .back-to-top {
                bottom: 15px;
                right: 15px;
                width: 38px;
                height: 38px;
            }
            
            .back-to-top i {
                font-size: 0.9rem;
            }
            
            /* Footer responsif HP */
            .footer {
                padding: 35px 0 20px;
            }
            
            .footer h5 { 
                font-size: 1rem; 
                margin-bottom: 1rem;
                display: block;
                text-align: center;
            }
            
            .footer h5::after {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .footer p, .footer a, .footer li {
                text-align: center;
            }
            
            .social-icons {
                justify-content: center;
            }
            
            .footer .col-lg-4,
            .footer .col-lg-2,
            .footer .col-lg-3,
            .footer .col-md-6 {
                text-align: center;
                margin-bottom: 30px;
            }
            
            .footer ul li {
                text-align: center;
            }
        }
        
        @media (min-width: 577px) and (max-width: 991px) {
            .footer {
                padding: 40px 0 25px;
            }
            
            .footer .col-md-6 {
                margin-bottom: 30px;
            }
        }
        
        .back-to-top.show { 
            opacity: 1; 
            visibility: visible; 
        }
        
        .back-to-top:hover { 
            background: white; 
            transform: translateY(-4px); 
        }
        
        /* Main content padding untuk fixed navbar */
        main {
            padding-top: 76px;
        }
        
        @media (max-width: 991px) {
            main {
                padding-top: 68px;
            }
        }
        
        @media (max-width: 576px) {
            main {
                padding-top: 62px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        <div class="container">
            <div class="logo-wrapper">
                <img src="{{ asset('image/Logo/logobankindonesia.jpg') }}" alt="Bank Indonesia" class="logo-img" loading="lazy">
                <div class="logo-divider"></div>
                <img src="{{ asset('image/Logo/del.jpg') }}" alt="Logo Del" class="logo-img" loading="lazy">
                <div class="logo-divider"></div>
                <a class="navbar-brand" href="{{ url('/') }}">Geo<span>Toba</span></a>
            </div>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('informasi') ? 'active' : '' }}" href="{{ url('/informasi') }}">Informasi</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('destinasi*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">Destinasi</a>
                        <ul class="dropdown-menu">
                            <li><h6 class="dropdown-header"><i class="fas fa-tag me-1"></i> KATEGORI DESTINASI</h6></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi/alam') }}">Destinasi Alam</a></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi/buatan') }}">Destinasi Buatan</a></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi/budaya') }}">Destinasi Budaya</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi') }}">Semua Destinasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}" href="{{ url('/galeri') }}">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('berita') ? 'active' : '' }}" href="{{ url('/berita') }}">Berita</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ url('/kontak') }}">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>@yield('content')</main>

    <!-- FOOTER YANG LEBIH RAPI KE SUDUT -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Kolom 1: Geo Toba - lebih mepet ke kiri -->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5>Geo<span style="color: #c6a43b;">Toba</span></h5>
                    <p>Sistem Informasi Geosite Danau Toba - Menyajikan informasi lengkap tentang keindahan geologi dan budaya Batak di kawasan Danau Toba.</p>
                    <div class="social-icons">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <!-- Kolom 2: Tautan - lebih rapat -->
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5>Tautan</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="{{ url('/informasi') }}">Informasi</a></li>
                        <li><a href="{{ url('/galeri') }}">Galeri</a></li>
                        <li><a href="{{ url('/berita') }}">Berita</a></li>
                        <li><a href="{{ url('/kontak') }}">Kontak</a></li>
                    </ul>
                </div>
                
                <!-- Kolom 3: Destinasi -->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5>Destinasi</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/destinasi/alam') }}">Destinasi Alam</a></li>
                        <li><a href="{{ url('/destinasi/buatan') }}">Destinasi Buatan</a></li>
                        <li><a href="{{ url('/destinasi/budaya') }}">Destinasi Budaya</a></li>
                        <li><a href="{{ url('/destinasi') }}">Semua Destinasi</a></li>
                    </ul>
                </div>
                
                <!-- Kolom 4: Kontak -->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5>Kontak</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2" style="color: #c6a43b;"></i> Danau Toba, Sumatera Utara</li>
                        <li class="mt-2"><i class="fas fa-phone me-2" style="color: #c6a43b;"></i> +62 812 3456 7890</li>
                        <li class="mt-2"><i class="fas fa-envelope me-2" style="color: #c6a43b;"></i> info@geotoba.com</li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2026 GeoToba - Geopark Danau Toba. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <div class="back-to-top" id="backToTop" aria-label="Back to top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        AOS.init({ duration: 1000, once: true });
        
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) navbar.classList.add('scrolled');
            else navbar.classList.remove('scrolled');
        });
        
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) backToTop.classList.add('show');
            else backToTop.classList.remove('show');
        });
        
        backToTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        
        // Auto close mobile menu after clicking a link
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link, .dropdown-item');
        const navbarCollapse = document.getElementById('navbarNav');
        
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 991) {
                    const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                    if (bsCollapse) {
                        bsCollapse.hide();
                    }
                }
            });
        });
        
        // Fix dropdown pada mobile
        if (window.innerWidth <= 991) {
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    if (window.innerWidth <= 991) {
                        e.preventDefault();
                        const parent = this.parentElement;
                        const menu = parent.querySelector('.dropdown-menu');
                        if (menu) {
                            menu.classList.toggle('show');
                        }
                    }
                });
            });
        }
    </script>
    
    @stack('scripts')
</body>
</html>