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
            padding: 0 16px; 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            width: 100%; 
        }
        
        .logo-wrapper { 
            display: flex; 
            align-items: center; 
            gap: 8px; 
            flex-wrap: nowrap;
        }
        
        .logo-img { 
            height: 45px; 
            width: auto; 
            border-radius: 6px;
            object-fit: cover; 
            transition: all 0.3s ease; 
            box-shadow: 0 4px 8px -4px rgba(0, 0, 0, 0.15); 
        }
        
        @media (max-width: 576px) {
            .logo-img { height: 32px; }
            .logo-divider { height: 24px; width: 1px; }
            .navbar-brand { font-size: 1rem !important; }
            .logo-wrapper { gap: 4px; }
            .navbar { padding: 0.4rem 0; }
        }
        
        @media (min-width: 577px) and (max-width: 768px) {
            .logo-img { height: 38px; }
            .navbar-brand { font-size: 1.2rem; }
            .logo-wrapper { gap: 6px; }
        }
        
        .logo-divider { 
            width: 1.5px; 
            height: 32px; 
            background: linear-gradient(145deg, rgba(255,255,255,0.5), rgba(255,255,255,0.1)); 
            border-radius: 2px; 
        }
        
        .navbar.scrolled .logo-divider {
            background: linear-gradient(145deg, rgba(0,51,102,0.3), rgba(0,51,102,0.1));
        }
        
        .navbar-brand { 
            font-size: 1.4rem; 
            font-weight: 800; 
            color: white !important; 
            margin: 0; 
            padding: 0 0 0 4px; 
            white-space: nowrap;
        }
        
        .navbar-brand span { color: var(--gold); font-weight: 800; }
        
        .navbar-toggler {
            border: none;
            padding: 6px 8px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }
        
        .navbar-toggler:focus {
            box-shadow: 0 0 0 2px var(--gold);
            outline: none;
        }
        
        .navbar-toggler-icon { width: 22px; height: 22px; }
        
        @media (max-width: 991px) {
            .navbar-collapse {
                background: rgba(0, 51, 102, 0.98);
                backdrop-filter: blur(20px);
                border-radius: 16px;
                padding: 12px;
                margin-top: 10px;
                max-height: 80vh;
                overflow-y: auto;
            }
            
            .navbar.scrolled .navbar-collapse {
                background: rgba(255, 255, 255, 0.98);
                box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            }
            
            .nav-link {
                padding: 10px 14px !important;
                margin: 3px 0;
                border-radius: 10px;
                text-align: center;
                font-size: 0.85rem;
            }
            
            .dropdown-menu {
                background: rgba(0, 51, 102, 0.96);
                border: none;
                border-radius: 12px;
                margin: 6px 0;
                padding: 6px 0;
                position: static !important;
                transform: none !important;
                width: 100%;
            }
            
            .navbar.scrolled .dropdown-menu {
                background: rgba(245, 245, 245, 0.98);
            }
            
            .dropdown-item {
                padding: 8px 16px;
                text-align: center;
                font-size: 0.8rem;
            }
            
            .dropdown-header {
                text-align: center;
                font-size: 0.65rem;
            }
        }
        
        .nav-link { 
            color: white !important; 
            font-weight: 500; 
            margin: 0 0.15rem; 
            transition: all 0.25s ease; 
            font-size: 0.9rem; 
            padding: 0.45rem 0.9rem; 
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
            border-radius: 20px; 
            padding: 0.5rem 0; 
            margin-top: 0.6rem; 
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.3); 
        }
        
        .dropdown-item { 
            color: white; 
            padding: 8px 20px; 
            font-size: 0.8rem; 
            transition: all 0.25s ease; 
            border-radius: 16px; 
            margin: 3px 8px; 
        }
        
        .dropdown-item:hover { 
            background: rgba(198, 164, 59, 0.2); 
            color: var(--gold); 
            transform: translateX(5px); 
        }
        
        .dropdown-header { 
            color: var(--gold); 
            padding: 6px 20px; 
            font-size: 0.65rem; 
            text-transform: uppercase; 
            letter-spacing: 1px; 
        }
        
        /* ============ FOOTER MODERN - RESPONSIF TETAP HORIZONTAL ============ */
        .footer {
            background: linear-gradient(135deg, #003366 0%, #001f3f 100%);
            padding: 35px 0 25px;
            margin-top: 60px;
            position: relative;
            border-top: 2px solid rgba(198, 164, 59, 0.4);
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Menu tetap horizontal meskipun di HP */
        .footer-menu {
            display: flex;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 35px;
            margin-bottom: 28px;
            overflow-x: auto;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: thin;
            padding-bottom: 5px;
        }
        
        /* Hide scrollbar for cleaner look but keep functionality */
        .footer-menu::-webkit-scrollbar {
            height: 3px;
        }
        
        .footer-menu::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.1);
            border-radius: 3px;
        }
        
        .footer-menu::-webkit-scrollbar-thumb {
            background: var(--gold);
            border-radius: 3px;
        }
        
        .footer-menu a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            position: relative;
            padding: 5px 0;
            white-space: nowrap;
        }
        
        .footer-menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--gold);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .footer-menu a:hover {
            color: var(--gold);
        }
        
        .footer-menu a:hover::after {
            width: 100%;
        }
        
        .footer-divider {
            width: 50px;
            height: 2px;
            background: rgba(198, 164, 59, 0.5);
            margin: 0 auto 22px;
            border-radius: 2px;
        }
        
        .footer-copyright {
            text-align: center;
        }
        
        .footer-copyright p {
            margin: 0;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }
        
        @media (max-width: 768px) {
            .footer {
                padding: 25px 0 20px;
                margin-top: 40px;
            }
            
            .footer-menu {
                gap: 20px;
                margin-bottom: 22px;
            }
            
            .footer-menu a {
                font-size: 0.8rem;
            }
            
            .footer-divider {
                width: 40px;
                margin-bottom: 18px;
            }
            
            .footer-copyright p {
                font-size: 0.65rem;
            }
        }
        
        @media (max-width: 480px) {
            .footer-menu {
                gap: 16px;
            }
            
            .footer-menu a {
                font-size: 0.75rem;
            }
        }
        
        /* Untuk HP sangat kecil tetap bisa scroll horizontal */
        @media (max-width: 380px) {
            .footer-menu {
                gap: 14px;
                justify-content: flex-start;
            }
        }
        
        .back-to-top { 
            position: fixed; 
            bottom: 25px; 
            right: 25px; 
            width: 44px; 
            height: 44px; 
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
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            text-decoration: none;
        }
        
        .back-to-top:hover {
            background: white;
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.25);
        }
        
        @media (max-width: 576px) {
            .back-to-top {
                bottom: 15px;
                right: 15px;
                width: 38px;
                height: 38px;
            }
            .back-to-top i { font-size: 0.9rem; }
        }
        
        .back-to-top.show { opacity: 1; visibility: visible; }
        
        main { 
            padding-top: 72px;
            min-height: calc(100vh - 200px);
        }
        
        @media (max-width: 991px) { main { padding-top: 65px; } }
        @media (max-width: 576px) { main { padding-top: 58px; } }
        
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        main {
            flex: 1;
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
    
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-menu">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/informasi') }}">Informasi</a>
                <a href="{{ url('/destinasi') }}">Destinasi</a>
                <a href="{{ url('/galeri') }}">Galeri</a>
                <a href="{{ url('/berita') }}">Berita</a>
                <a href="{{ url('/kontak') }}">Kontak</a>
            </div>
            <div class="footer-divider"></div>
            <div class="footer-copyright">
                <p>&copy; 2026 GeoToba - Geopark Danau Toba. Kelompok7.</p>
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
        
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link, .dropdown-item');
        const navbarCollapse = document.getElementById('navbarNav');
        
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 991) {
                    const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                    if (bsCollapse) bsCollapse.hide();
                }
            });
        });
        
        if (window.innerWidth <= 991) {
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    if (window.innerWidth <= 991) {
                        e.preventDefault();
                        const menu = this.parentElement.querySelector('.dropdown-menu');
                        if (menu) menu.classList.toggle('show');
                    }
                });
            });
        }
    </script>
    
    @stack('scripts')
</body>
</html>