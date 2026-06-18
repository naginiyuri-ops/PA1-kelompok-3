<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Geosite Danau Toba')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        * { 
            font-family: 'Inter', sans-serif; 
            box-sizing: border-box; 
        }
        
        :root {
            --blue-dark: #003366;
            --blue-medium: #1a4a7a;
            --blue-light: #4a8ab5;
            --gold: #c6a43b;
            --gold-light: #e8c45a;
            --gold-dark: #a8882e;
            --white: #ffffff;
            --gray-light: #f8fafc;
            --gray: #64748b;
            --text-dark: #0f172a;
            --shadow: 0 4px 20px rgba(0,0,0,0.08);
            --shadow-lg: 0 10px 40px rgba(0,0,0,0.12);
            --radius: 16px;
        }

        body {
            overflow-x: hidden;
            background: var(--gray-light);
        }

        /* ========================================
                   NAVBAR MODERN
                ======================================== */
        .navbar {
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            padding: 0.8rem 0;
            background: rgba(0, 51, 102, 0.97);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(198, 164, 59, 0.2);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            z-index: 1050;
        }

        .navbar.scrolled-down {
            background: var(--white) !important;
            padding: 0.5rem 0;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .navbar.scrolled-down .nav-link,
        .navbar.scrolled-down .navbar-brand { 
            color: var(--blue-dark) !important; 
        }

        .navbar.scrolled-down .nav-link:hover {
            color: var(--gold) !important;
        }

        .navbar.scrolled-down .dropdown-menu {
            background: rgba(255, 255, 255, 0.98);
            border: 1px solid rgba(0, 51, 102, 0.08);
        }

        .navbar.scrolled-down .dropdown-item {
            color: var(--blue-dark);
        }

        .navbar .container {
            max-width: 1400px;
            padding: 0 24px;
        }

        /* LOGO */
        .logo-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: nowrap;
            text-decoration: none;
        }

        .logo-img {
            height: 45px;
            width: auto;
            border-radius: 8px;
            object-fit: cover;
            flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .logo-divider {
            width: 2px;
            height: 32px;
            background: linear-gradient(145deg, rgba(255,255,255,0.4), rgba(255,255,255,0.05));
            border-radius: 2px;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .navbar.scrolled-down .logo-divider {
            background: linear-gradient(145deg, rgba(0,51,102,0.3), rgba(0,51,102,0.05));
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 800;
            color: white !important;
            margin: 0;
            padding: 0;
            letter-spacing: 0.5px;
            font-family: 'Playfair Display', serif;
        }

        .navbar-brand span { 
            color: var(--gold); 
        }

        /* NAV LINKS */
        .nav-link {
            color: white !important;
            font-weight: 600;
            font-size: 0.85rem;
            padding: 0.6rem 1rem;
            border-radius: 40px;
            transition: all 0.3s ease;
            position: relative;
            cursor: pointer;
        }

        .nav-link:hover {
            color: var(--gold) !important;
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-1px);
        }

        .nav-link.active {
            color: var(--gold) !important;
            background: rgba(198, 164, 59, 0.15);
        }

        .navbar.scrolled-down .nav-link.active {
            background: rgba(198, 164, 59, 0.12);
        }

        /* DROPDOWN */
        .dropdown-menu {
            background: rgba(0, 51, 102, 0.96);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--radius);
            padding: 0.5rem 0;
            margin-top: 0.5rem;
            box-shadow: var(--shadow-lg);
            min-width: 220px;
            display: none;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-header {
            color: var(--gold);
            padding: 8px 20px;
            font-size: 0.6rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 700;
        }

        .dropdown-item {
            color: white;
            padding: 10px 20px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            border-radius: 12px;
            margin: 2px 8px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .dropdown-item:hover {
            background: rgba(198, 164, 59, 0.15);
            color: var(--gold);
            transform: translateX(5px);
        }

        .dropdown-item i {
            width: 22px;
            color: var(--gold);
            opacity: 0.7;
        }

        .dropdown-divider {
            border-color: rgba(255,255,255,0.08);
            margin: 4px 16px;
        }

        .navbar.scrolled-down .dropdown-item i {
            color: var(--blue-dark);
        }

        /* Dropdown toggle di desktop */
        .dropdown-toggle::after {
            display: inline-block;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
        }

        /* TOGGLER */
        .navbar-toggler {
            border: none;
            padding: 8px 12px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 2px var(--gold);
            outline: none;
        }

        .navbar-toggler-icon { 
            width: 24px; 
            height: 24px;
            transition: all 0.3s ease;
        }

        .navbar.scrolled-down .navbar-toggler {
            background: rgba(0, 51, 102, 0.08);
        }

        .navbar.scrolled-down .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(0, 51, 102, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* ========================================
                   FOOTER MODERN
                ======================================== */
        .footer {
            background: linear-gradient(135deg, #001f3f 0%, #003366 50%, #0a4a7a 100%);
            padding: 60px 0 30px;
            margin-top: 80px;
            position: relative;
            border-top: 3px solid rgba(198, 164, 59, 0.3);
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-brand .logo-footer {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .footer-brand .logo-footer-img {
            height: 40px;
            width: auto;
            border-radius: 8px;
        }

        .footer-brand h4 {
            font-size: 1.4rem;
            font-weight: 800;
            font-family: 'Playfair Display', serif;
            background: linear-gradient(135deg, #fff 0%, var(--gold) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .footer-brand h4 span {
            background: linear-gradient(135deg, var(--gold) 0%, #ffd966 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .footer-brand p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.85rem;
            line-height: 1.7;
            margin-top: 8px;
        }

        .footer-social {
            display: flex;
            gap: 12px;
            margin-top: 18px;
        }

        .footer-social a {
            width: 38px;
            height: 38px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .footer-social a:hover {
            background: var(--gold);
            color: var(--blue-dark);
            transform: translateY(-3px);
        }

        .footer-col h5 {
            color: var(--gold);
            font-size: 0.95rem;
            font-weight: 700;
            margin-bottom: 18px;
            letter-spacing: 0.5px;
            position: relative;
            display: inline-block;
        }

        .footer-col h5::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 30px;
            height: 2px;
            background: var(--gold);
            border-radius: 2px;
        }

        .footer-menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .footer-menu a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .footer-menu a i {
            font-size: 0.65rem;
            opacity: 0;
            transform: translateX(-5px);
            transition: all 0.3s ease;
            color: var(--gold);
        }

        .footer-menu a:hover {
            color: var(--gold);
            transform: translateX(5px);
        }

        .footer-menu a:hover i {
            opacity: 1;
            transform: translateX(0);
        }

        .footer-contact {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .footer-contact .contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.85rem;
        }

        .footer-contact .contact-item i {
            width: 32px;
            height: 32px;
            background: rgba(198, 164, 59, 0.12);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .footer-copyright p {
            margin: 0;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.8rem;
        }

        .footer-credit {
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.75rem;
        }

        .footer-credit a {
            color: var(--gold);
            text-decoration: none;
        }

        .footer-credit a:hover {
            text-decoration: underline;
        }

        /* ========================================
                   BACK TO TOP
                ======================================== */
        .back-to-top {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 46px;
            height: 46px;
            border-radius: 50%;
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
            box-shadow: 0 4px 15px rgba(198, 164, 59, 0.3);
            text-decoration: none;
            border: none;
        }

        .back-to-top i { font-size: 1.2rem; }

        .back-to-top:hover {
            background: white;
            transform: translateY(-5px);
            box-shadow: 0 6px 25px rgba(0,0,0,0.2);
        }

        .back-to-top.show { opacity: 1; visibility: visible; }

        /* ========================================
                   RESPONSIVE
                ======================================== */
        @media (max-width: 992px) {
            .navbar-collapse {
                background: rgba(0, 51, 102, 0.98);
                backdrop-filter: blur(20px);
                border-radius: var(--radius);
                padding: 16px;
                margin-top: 12px;
                max-height: 80vh;
                overflow-y: auto;
            }

            .navbar.scrolled-down .navbar-collapse {
                background: rgba(255, 255, 255, 0.98);
                box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            }

            .nav-link {
                padding: 10px 16px !important;
                text-align: center;
                font-size: 0.9rem;
            }

            .dropdown-menu {
                background: rgba(0, 51, 102, 0.3);
                border: none;
                border-radius: 12px;
                margin: 5px 0;
                padding: 6px 0;
                position: static !important;
                transform: none !important;
                width: 100%;
                box-shadow: none;
                display: none;
            }

            .dropdown-menu.show {
                display: block;
            }

            .navbar.scrolled-down .dropdown-menu {
                background: rgba(255, 255, 255, 0.2);
            }

            .dropdown-item {
                text-align: center;
                padding: 10px 16px;
                justify-content: center;
            }

            .dropdown-item i {
                display: none;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 30px;
            }
        }

        @media (max-width: 768px) {
            .navbar { padding: 0.6rem 0; }
            .logo-img { height: 38px; }
            .logo-divider { height: 28px; }
            .navbar-brand { font-size: 1.2rem; }
            .navbar .container { padding: 0 16px; }
            .footer { padding: 40px 0 25px; margin-top: 60px; }
            .footer-grid { grid-template-columns: 1fr; gap: 25px; text-align: center; }
            .footer-col h5::after { left: 50%; transform: translateX(-50%); }
            .footer-menu a { justify-content: center; }
            .footer-brand .logo-footer { justify-content: center; }
            .footer-social { justify-content: center; }
            .footer-contact .contact-item { justify-content: center; }
            .footer-bottom { flex-direction: column; text-align: center; }
            .back-to-top { bottom: 15px; right: 15px; width: 40px; height: 40px; }
        }

        @media (max-width: 576px) {
            .logo-img { height: 32px; }
            .navbar-brand { font-size: 1rem; }
            .logo-divider { display: none; }
            .footer { padding: 30px 0 20px; }
            .footer-container { padding: 0 16px; }
        }

        /* ========================================
                   MAIN CONTENT
                ======================================== */
        main {
            flex: 1;
            padding-top: 80px;
            min-height: calc(100vh - 200px);
        }

        @media (max-width: 992px) { main { padding-top: 76px; } }
        @media (max-width: 768px) { main { padding-top: 70px; } }
        @media (max-width: 576px) { main { padding-top: 64px; } }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- ========================================
    NAVBAR
    ======================================== -->
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        <div class="container">
            <a class="logo-wrapper" href="{{ url('/') }}">
                <img src="{{ asset('image/logo/logobankindonesia.jpg') }}" alt="Bank Indonesia" class="logo-img" loading="lazy">
                <div class="logo-divider"></div>
                <img src="{{ asset('image/logo/del.jpg') }}" alt="Logo Del" class="logo-img" loading="lazy">
                <div class="logo-divider"></div>
                <span class="navbar-brand">Geo<span>Toba</span></span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- HOME -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/') }}">
                            <i class="fas fa-home d-md-none me-2"></i> Home
                        </a>
                    </li>

                    <!-- TENTANG GEOSITE -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#tentang') }}">
                            <i class="fas fa-info-circle d-md-none me-2"></i> Tentang Geosite
                        </a>
                    </li>

                    <!-- DESTINASI (DROPDOWN) -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('destinasi*') ? 'active' : '' }}" href="#" id="destinasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-map-marked-alt d-md-none me-2"></i> Destinasi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="destinasiDropdown">
                            <li><h6 class="dropdown-header"><i class="fas fa-tag me-1"></i> KATEGORI</h6></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi/alam') }}"><i class="fas fa-mountain"></i> Wisata Alam</a></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi/budaya') }}"><i class="fas fa-theater-masks"></i> Wisata Budaya</a></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi/buatan') }}"><i class="fas fa-city"></i> Wisata Buatan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi') }}"><i class="fas fa-th-list"></i> Semua Destinasi</a></li>
                        </ul>
                    </li>

                    <!-- DIVERSITY (DROPDOWN) -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('geodiversitas*') || request()->routeIs('biodiversitas*') || request()->routeIs('cultural-diversity*') ? 'active' : '' }}" href="#" id="diversityDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-globe-asia d-md-none me-2"></i> Diversity
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="diversityDropdown">
                            <li><a class="dropdown-item" href="{{ route('geodiversitas') }}"><i class="fas fa-gem"></i> Geodiversity</a></li>
                            <li><a class="dropdown-item" href="{{ route('biodiversitas') }}"><i class="fas fa-leaf"></i> Biodiversity</a></li>
                            <li><a class="dropdown-item" href="{{ route('cultural-diversity') }}"><i class="fas fa-people-arrows"></i> Cultural Diversity</a></li>
                        </ul>
                    </li>

                    <!-- BERITA / EVENT -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('berita*') ? 'active' : '' }}" href="{{ url('/berita') }}">
                            <i class="fas fa-newspaper d-md-none me-2"></i> Berita / Event
                        </a>
                    </li>

                    <!-- FASILITAS (DROPDOWN) -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('umkm*') || request()->routeIs('penginapan*') || request()->routeIs('fasilitas*') ? 'active' : '' }}" href="#" id="fasilitasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-building d-md-none me-2"></i> Fasilitas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="fasilitasDropdown">
                            <li><a class="dropdown-item" href="{{ url('/umkm') }}"><i class="fas fa-store"></i> UMKM</a></li>
                            <li><a class="dropdown-item" href="{{ url('/penginapan') }}"><i class="fas fa-hotel"></i> Penginapan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ url('/fasilitas') }}"><i class="fas fa-th-list"></i> Semua Fasilitas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ========================================
    MAIN CONTENT
    ======================================== -->
    <main>@yield('content')</main>

    <!-- ========================================
    FOOTER MODERN
    ======================================== -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-grid">
                <!-- Brand Column -->
                <div class="footer-brand">
                    <div class="logo-footer">
                        <img src="{{ asset('image/logo/logobankindonesia.jpg') }}" alt="Bank Indonesia" class="logo-footer-img" loading="lazy">
                        <img src="{{ asset('image/logo/del.jpg') }}" alt="Logo Del" class="logo-footer-img" loading="lazy">
                    </div>
                    <h4>Geo<span>Toba</span></h4>
                    <p>Menjelajahi keindahan Geopark Danau Toba, warisan geologi dunia yang memukau dengan pesona alam, budaya, dan keanekaragaman hayatinya.</p>
                    <div class="footer-social">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer-col">
                    <h5>Tautan Cepat</h5>
                    <div class="footer-menu">
                        <a href="{{ url('/') }}"><i class="fas fa-chevron-right"></i> Home</a>
                        <a href="{{ url('/#tentang') }}"><i class="fas fa-chevron-right"></i> Tentang Geosite</a>
                        <a href="{{ url('/destinasi') }}"><i class="fas fa-chevron-right"></i> Destinasi</a>
                        <a href="{{ url('/berita') }}"><i class="fas fa-chevron-right"></i> Berita / Event</a>
                        <a href="{{ url('/galeri') }}"><i class="fas fa-chevron-right"></i> Galeri</a>
                    </div>
                </div>

                <!-- Diversity -->
                <div class="footer-col">
                    <h5>Keanekaragaman</h5>
                    <div class="footer-menu">
                        <a href="{{ route('geodiversitas') }}"><i class="fas fa-chevron-right"></i> Geodiversity</a>
                        <a href="{{ route('biodiversitas') }}"><i class="fas fa-chevron-right"></i> Biodiversity</a>
                        <a href="{{ route('cultural-diversity') }}"><i class="fas fa-chevron-right"></i> Cultural Diversity</a>
                    </div>
                </div>

                <!-- Contact -->
                <div class="footer-col">
                    <h5>Kontak</h5>
                    <div class="footer-contact">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Kabupaten Toba Samosir, Sumatera Utara</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>+62 822 1234 5678</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>info@geotoba.com</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom -->
            <div class="footer-bottom">
                <div class="footer-copyright">
                    <p>&copy; {{ date('Y') }} GeoToba - Geopark Danau Toba. All rights reserved.</p>
                </div>
                <div class="footer-credit">
                    <span>Developed by <a href="#">Kelompok 7</a></span>
                </div>
            </div>
        </div>
    </footer>

    <!-- BACK TO TOP -->
    <div class="back-to-top" id="backToTop" aria-label="Back to top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- ========================================
    SCRIPTS
    ======================================== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // ========================================
        // AOS INIT
        // ========================================
        AOS.init({ duration: 800, once: true, offset: 50 });

        // ========================================
        // NAVBAR SCROLL
        // ========================================
        const navbar = document.getElementById('navbar');
        const backToTop = document.getElementById('backToTop');
        let lastScrollTop = 0;

        function handleScroll() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            navbar.classList.remove('scrolled-down');

            if (scrollTop > 50) {
                navbar.classList.add('scrolled-down');
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;

            // Back to top
            if (scrollTop > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        }

        window.addEventListener('scroll', function() {
            requestAnimationFrame(handleScroll);
        });

        // ========================================
        // BACK TO TOP
        // ========================================
        backToTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // ========================================
        // DROPDOWN FIX - PASTIKAN BOOTSTRAP DROPDOWN BISA BERFUNGSI
        // ========================================
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi ulang semua dropdown
            var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            var dropdownList = dropdownElementList.map(function(dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl);
            });

            // Untuk mobile: tutup dropdown saat klik di luar
            document.addEventListener('click', function(e) {
                var isDropdown = e.target.closest('.dropdown');
                if (!isDropdown) {
                    var openDropdowns = document.querySelectorAll('.dropdown-menu.show');
                    openDropdowns.forEach(function(menu) {
                        var dropdown = bootstrap.Dropdown.getInstance(menu.closest('.dropdown').querySelector('.dropdown-toggle'));
                        if (dropdown) {
                            dropdown.hide();
                        }
                    });
                }
            });
        });

        // ========================================
        // CLOSE MENU ON LINK CLICK (MOBILE)
        // ========================================
        document.querySelectorAll('.navbar-nav .nav-link:not(.dropdown-toggle), .dropdown-item').forEach(function(link) {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 991) {
                    var navbarCollapse = document.getElementById('navbarNav');
                    var bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                    if (bsCollapse && navbarCollapse.classList.contains('show')) {
                        bsCollapse.hide();
                    }
                }
            });
        });

        // ========================================
        // RESET ON RESIZE
        // ========================================
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
                    menu.classList.remove('show');
                });
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                navbar.classList.remove('scrolled-down');
                if (scrollTop > 50) {
                    navbar.classList.add('scrolled-down');
                }
            }, 200);
        });

        // ========================================
        // INITIAL
        // ========================================
        setTimeout(function() {
            handleScroll();
        }, 100);
    </script>

    @stack('scripts')
</body>
</html>