<!DOCTYPE html>
<html lang="id">
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
        * { font-family: 'Inter', sans-serif; box-sizing: border-box; }
        
        :root {
            --blue-dark: #003366;
            --blue-medium: #1a4a7a;
            --gold: #c6a43b;
            --white: #ffffff;
        }

        body {
            overflow-x: hidden;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            transition: all 0.4s ease;
            padding: 1rem 0;
            background: rgba(0, 51, 102, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(198, 164, 59, 0.3);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        /* Saat scroll ke bawah - berubah jadi putih */
        .navbar.scrolled-down {
            background: var(--white) !important;
            padding: 0.7rem 0;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.12);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .navbar.scrolled-down .nav-link,
        .navbar.scrolled-down .navbar-brand { 
            color: var(--blue-dark) !important; 
        }

        .navbar.scrolled-down .logo-divider {
            background: linear-gradient(145deg, rgba(0,51,102,0.3), rgba(0,51,102,0.1));
        }

        .navbar.scrolled-down .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(0, 51, 102, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .navbar.scrolled-down .navbar-toggler {
            background: rgba(0, 51, 102, 0.1);
        }

        /* Saat scroll ke atas - kembali ke tampilan awal (biru transparan) */
        .navbar.scrolled-up {
            background: rgba(0, 51, 102, 0.95) !important;
            padding: 1rem 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(198, 164, 59, 0.3);
        }

        .navbar.scrolled-up .nav-link,
        .navbar.scrolled-up .navbar-brand { 
            color: white !important; 
        }

        .navbar.scrolled-up .logo-divider {
            background: linear-gradient(145deg, rgba(255,255,255,0.6), rgba(255,255,255,0.15));
        }

        .navbar.scrolled-up .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .navbar.scrolled-up .navbar-toggler {
            background: rgba(255, 255, 255, 0.15);
        }

        .navbar .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        /* ===== LOGO ===== */
        .logo-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: nowrap;
        }

        .logo-img {
            height: 55px;
            width: auto;
            border-radius: 10px;
            object-fit: cover;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            flex-shrink: 0;
        }

        .logo-divider {
            width: 2px;
            height: 38px;
            background: linear-gradient(145deg, rgba(255,255,255,0.6), rgba(255,255,255,0.15));
            border-radius: 2px;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-size: 1.6rem;
            font-weight: 800;
            color: white !important;
            margin: 0;
            padding: 0 0 0 8px;
            white-space: nowrap;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .navbar-brand span { 
            color: var(--gold); 
            font-weight: 800;
        }

        /* ===== TOGGLER ===== */
        .navbar-toggler {
            border: none;
            padding: 8px 12px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            flex-shrink: 0;
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

        /* ===== NAV LINKS ===== */
        .nav-link {
            color: white !important;
            font-weight: 600;
            margin: 0 0.2rem;
            transition: all 0.25s ease;
            font-size: 1rem;
            padding: 0.6rem 1.1rem;
            border-radius: 40px;
        }

        .nav-link:hover {
            color: var(--gold) !important;
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .nav-link.active {
            color: var(--gold) !important;
            background: rgba(198, 164, 59, 0.2);
        }

        /* ===== DROPDOWN ===== */
        .dropdown-menu {
            background: rgba(0, 51, 102, 0.96);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 0.6rem 0;
            margin-top: 0.7rem;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.3);
        }

        .navbar.scrolled-down .dropdown-menu {
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(0, 51, 102, 0.1);
        }

        .navbar.scrolled-down .dropdown-item {
            color: var(--blue-dark);
        }

        .navbar.scrolled-down .dropdown-header {
            color: var(--gold);
        }

        .dropdown-item {
            color: white;
            padding: 10px 24px;
            font-size: 0.9rem;
            transition: all 0.25s ease;
            border-radius: 16px;
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
            letter-spacing: 1.5px;
        }

        /* ===== MOBILE RESPONSIVE ===== */
        @media (max-width: 991px) {
            .navbar-collapse {
                background: rgba(0, 51, 102, 0.98);
                backdrop-filter: blur(20px);
                border-radius: 20px;
                padding: 15px;
                margin-top: 15px;
                max-height: 80vh;
                overflow-y: auto;
            }

            .navbar.scrolled-down .navbar-collapse {
                background: rgba(255, 255, 255, 0.98);
                box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            }

            .nav-link {
                padding: 12px 16px !important;
                font-size: 1rem;
                text-align: center;
            }

            .dropdown-menu {
                background: rgba(0, 51, 102, 0.5);
                border: none;
                border-radius: 12px;
                margin: 5px 0;
                padding: 6px 0;
                position: static !important;
                transform: none !important;
                width: 100%;
            }

            .navbar.scrolled-down .dropdown-menu {
                background: rgba(255, 255, 255, 0.5);
            }

            .dropdown-item {
                text-align: center;
                padding: 10px 16px;
            }
        }

        @media (max-width: 768px) {
            .navbar { padding: 0.8rem 0; }
            .logo-img { height: 45px; }
            .logo-divider { height: 32px; }
            .navbar-brand { font-size: 1.3rem; }
            .logo-wrapper { gap: 10px; }
            .navbar .container { padding: 0 16px; }
        }

        @media (max-width: 576px) {
            .navbar { padding: 0.6rem 0; }
            .logo-img { height: 38px; }
            .logo-divider { height: 26px; }
            .navbar-brand { font-size: 1.1rem; }
            .logo-wrapper { gap: 8px; }
            .navbar-toggler { padding: 6px 10px; }
            .nav-link { font-size: 0.9rem; padding: 10px 14px !important; }
        }

        @media (max-width: 400px) {
            .logo-img { height: 32px; }
            .navbar-brand { font-size: 0.95rem; }
            .logo-divider { display: none; }
        }

        /* ===== FOOTER ===== */
        .footer {
            background: linear-gradient(135deg, #003366 0%, #001f3f 100%);
            padding: 50px 0 35px;
            margin-top: 80px;
            position: relative;
            border-top: 3px solid rgba(198, 164, 59, 0.5);
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

        .footer-menu {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 40px;
            margin-bottom: 35px;
        }

        .footer-menu a {
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 8px 0;
            position: relative;
        }

        .footer-menu a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gold);
            transition: width 0.3s ease;
        }

        .footer-menu a:hover {
            color: var(--gold);
        }

        .footer-menu a:hover::after {
            width: 100%;
        }

        .footer-divider {
            width: 60px;
            height: 2px;
            background: rgba(198, 164, 59, 0.5);
            margin: 0 auto 25px;
            border-radius: 2px;
        }

        .footer-copyright {
            text-align: center;
        }

        .footer-copyright p {
            margin: 0;
            color: rgba(255, 255, 255, 0.55);
            font-size: 0.85rem;
        }

        @media (max-width: 768px) {
            .footer { padding: 35px 0 25px; margin-top: 60px; }
            .footer-menu { gap: 25px; }
            .footer-menu a { font-size: 0.85rem; }
        }

        @media (max-width: 576px) {
            .footer-menu { gap: 18px; flex-wrap: wrap; }
            .footer-menu a { font-size: 0.8rem; }
        }

        /* ===== BACK TO TOP ===== */
        .back-to-top {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 48px;
            height: 48px;
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
            border: none;
        }

        .back-to-top i { font-size: 1.2rem; }

        .back-to-top:hover {
            background: white;
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.25);
        }

        .back-to-top.show { opacity: 1; visibility: visible; }

        @media (max-width: 576px) {
            .back-to-top { bottom: 15px; right: 15px; width: 40px; height: 40px; }
            .back-to-top i { font-size: 1rem; }
        }

        /* ===== MAIN CONTENT ===== */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            padding-top: 85px;
            min-height: calc(100vh - 200px);
        }

        @media (max-width: 991px) { main { padding-top: 78px; } }
        @media (max-width: 768px) { main { padding-top: 72px; } }
        @media (max-width: 576px) { main { padding-top: 65px; } }
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
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('destinasi*') ? 'active' : '' }}" href="#" id="destinasiDropdown">Destinasi</a>
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

        // Elemen DOM
        const navbar = document.getElementById('navbar');
        const backToTop = document.getElementById('backToTop');
        const navbarCollapse = document.getElementById('navbarNav');
        
        // Variable untuk mendeteksi arah scroll
        let lastScrollTop = 0;
        let scrollTimeout;

        // ==================== FUNGSI SCROLL DENGAN DETEKSI ARAH ====================
        function handleScroll() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Hapus class scrolled-down dan scrolled-up terlebih dahulu
            navbar.classList.remove('scrolled-down', 'scrolled-up');
            
            if (scrollTop > 50) {
                // Deteksi arah scroll
                if (scrollTop > lastScrollTop) {
                    // Scroll ke BAWAH -> navbar berubah jadi putih
                    navbar.classList.add('scrolled-down');
                } 
                else if (scrollTop < lastScrollTop) {
                    // Scroll ke ATAS -> navbar kembali ke tampilan awal (biru transparan)
                    navbar.classList.add('scrolled-up');
                }
                else {
                    // Jika posisi sama (tidak bergerak) -> tetap putih
                    navbar.classList.add('scrolled-down');
                }
            }
            
            // Update lastScrollTop
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
            
            // Tampilkan/sembunyikan tombol back to top
            if (scrollTop > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        }
        
        // Event scroll dengan optimasi
        window.addEventListener('scroll', function() {
            requestAnimationFrame(handleScroll);
        });

        // ==================== BACK TO TOP ====================
        backToTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // ==================== TUTUP MENU SAAT KLIK LINK (HP) ====================
        const regularLinks = document.querySelectorAll('.navbar-nav .nav-link:not(.dropdown-toggle), .dropdown-item');
        regularLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 991) {
                    const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                    if (bsCollapse && navbarCollapse.classList.contains('show')) {
                        bsCollapse.hide();
                    }
                }
            });
        });

        // ==================== DROPDOWN ====================
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
        
        dropdownToggles.forEach(function(toggle) {
            let bsDropdown = null;
            
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                if (window.innerWidth > 991) {
                    // Desktop: gunakan Bootstrap dropdown
                    if (!bsDropdown) {
                        bsDropdown = new bootstrap.Dropdown(toggle, { autoClose: true });
                    }
                    bsDropdown.toggle();
                } else {
                    // Mobile: toggle manual
                    const menu = this.parentElement.querySelector('.dropdown-menu');
                    if (!menu) return;
                    
                    const isOpen = menu.classList.contains('show');
                    
                    // Tutup semua dropdown lain
                    document.querySelectorAll('.navbar-nav .dropdown-menu.show').forEach(function(m) {
                        if (m !== menu) {
                            m.classList.remove('show');
                        }
                    });
                    
                    if (!isOpen) {
                        menu.classList.add('show');
                    } else {
                        menu.classList.remove('show');
                    }
                }
            });
        });
        
        // ==================== TUTUP DROPDOWN SAAT KLIK DI LUAR (MOBILE) ====================
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 991) {
                if (!e.target.closest('.navbar')) {
                    document.querySelectorAll('.navbar-nav .dropdown-menu.show').forEach(function(m) {
                        m.classList.remove('show');
                    });
                }
            }
        });
        
        // ==================== RESET SAAT RESIZE WINDOW ====================
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                // Reset dropdown yang terbuka
                document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
                    menu.classList.remove('show');
                });
                // Reset navbar state
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                navbar.classList.remove('scrolled-down', 'scrolled-up');
                if (scrollTop > 50) {
                    navbar.classList.add('scrolled-down');
                }
            }, 200);
        });
        
        // ==================== INITIAL ====================
        // Panggil handleScroll sekali untuk memastikan state awal
        setTimeout(() => {
            handleScroll();
        }, 100);
    </script>

    @stack('scripts')
</body>
</html>