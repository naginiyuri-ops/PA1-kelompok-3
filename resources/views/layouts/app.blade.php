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
        * { font-family: 'Inter', sans-serif; box-sizing: border-box; }
        
        :root {
            --blue-dark: #003366;
            --blue-medium: #1a4a7a;
            --gold: #c6a43b;
            --white: #ffffff;
        }

        /* ===== NAVBAR ===== */
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

        /* ===== LOGO ===== */
        .logo-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: nowrap;
            min-width: 0; /* allow shrink */
        }

        .logo-img {
            height: 42px;
            width: auto;
            border-radius: 6px;
            object-fit: cover;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px -4px rgba(0, 0, 0, 0.15);
            flex-shrink: 0;
        }

        .logo-divider {
            width: 1.5px;
            height: 30px;
            background: linear-gradient(145deg, rgba(255,255,255,0.5), rgba(255,255,255,0.1));
            border-radius: 2px;
            flex-shrink: 0;
        }

        .navbar.scrolled .logo-divider {
            background: linear-gradient(145deg, rgba(0,51,102,0.3), rgba(0,51,102,0.1));
        }

        .navbar-brand {
            font-size: 1.35rem;
            font-weight: 800;
            color: white !important;
            margin: 0;
            padding: 0 0 0 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .navbar-brand span { color: var(--gold); font-weight: 800; }

        /* ===== TOGGLER ===== */
        .navbar-toggler {
            border: none;
            padding: 7px 9px;
            background: rgba(255, 255, 255, 0.12);
            border-radius: 10px;
            flex-shrink: 0;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 2px var(--gold);
            outline: none;
        }

        .navbar-toggler-icon { width: 22px; height: 22px; }

        /* ===== NAV LINKS (desktop) ===== */
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

        /* ===== DROPDOWN (desktop) ===== */
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

        /* ===== MOBILE BREAKPOINTS ===== */

        /* Tablet / small desktop */
        @media (max-width: 991px) {
            .navbar-collapse {
                background: rgba(0, 51, 102, 0.98);
                backdrop-filter: blur(20px);
                border-radius: 16px;
                padding: 10px 8px;
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
                margin: 2px 0;
                border-radius: 10px;
                text-align: center;
                font-size: 0.88rem;
            }

            .dropdown-menu {
                background: rgba(0, 51, 102, 0.96);
                border: none;
                border-radius: 12px;
                margin: 4px 0;
                padding: 6px 0;
                position: static !important;
                transform: none !important;
                width: 100%;
                box-shadow: none;
                backdrop-filter: none;
            }

            .navbar.scrolled .dropdown-menu {
                background: rgba(245, 245, 245, 0.98);
            }

            .dropdown-item {
                padding: 9px 16px;
                text-align: center;
                font-size: 0.82rem;
                border-radius: 8px;
                margin: 2px 6px;
            }

            .dropdown-header {
                text-align: center;
                font-size: 0.65rem;
            }
        }

        /* Handphone ukuran sedang (576px - 767px) */
        @media (max-width: 767px) {
            .navbar { padding: 0.45rem 0; }

            .logo-img { height: 36px; }
            .logo-divider { height: 26px; }
            .logo-wrapper { gap: 6px; }
            .navbar-brand { font-size: 1.15rem; padding-left: 2px; }

            .navbar .container { padding: 0 12px; }
        }

        /* Handphone kecil (< 576px) */
        @media (max-width: 575px) {
            .navbar { padding: 0.38rem 0; }

            .logo-img { height: 30px; }
            .logo-divider { height: 22px; width: 1px; }
            .logo-wrapper { gap: 5px; }
            .navbar-brand { font-size: 1rem; }
            .navbar-toggler { padding: 5px 7px; }
            .navbar-toggler-icon { width: 20px; height: 20px; }

            .navbar .container { padding: 0 10px; }

            .nav-link { font-size: 0.84rem; padding: 9px 12px !important; }
            .dropdown-item { font-size: 0.79rem; }
        }

        /* HP sangat kecil (< 380px) */
        @media (max-width: 380px) {
            .logo-img { height: 26px; }
            .logo-divider { display: none; }  /* sembunyikan satu divider jika terlalu sempit */
            .logo-divider:first-of-type { display: block; }
            .navbar-brand { font-size: 0.92rem; }
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
            flex-wrap: nowrap;
            gap: 40px;
            margin-bottom: 35px;
            overflow-x: auto;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: thin;
            padding-bottom: 8px;
        }

        .footer-menu::-webkit-scrollbar { height: 4px; }
        .footer-menu::-webkit-scrollbar-track { background: rgba(255,255,255,0.15); border-radius: 4px; }
        .footer-menu::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 4px; }

        .footer-menu a {
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            position: relative;
            padding: 8px 0;
            white-space: nowrap;
        }

        .footer-menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2.5px;
            background: var(--gold);
            transition: all 0.3s ease;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .footer-menu a:hover { color: var(--gold); transform: translateY(-2px); }
        .footer-menu a:hover::after { width: 100%; }

        .footer-divider {
            width: 70px;
            height: 2.5px;
            background: rgba(198, 164, 59, 0.6);
            margin: 0 auto 28px;
            border-radius: 3px;
        }

        .footer-copyright { text-align: center; }

        .footer-copyright p {
            margin: 0;
            color: rgba(255, 255, 255, 0.55);
            font-size: 0.85rem;
            letter-spacing: 0.8px;
            font-weight: 400;
        }

        @media (max-width: 768px) {
            .footer { padding: 40px 0 28px; margin-top: 60px; }
            .footer-menu { gap: 28px; margin-bottom: 28px; }
            .footer-menu a { font-size: 0.9rem; padding: 6px 0; }
            .footer-divider { width: 55px; margin-bottom: 22px; }
            .footer-copyright p { font-size: 0.78rem; }
        }

        @media (max-width: 480px) {
            .footer { padding: 32px 0 22px; margin-top: 50px; }
            .footer-container { padding: 0 14px; }
            .footer-menu { gap: 20px; }
            .footer-menu a { font-size: 0.82rem; }
            .footer-divider { width: 45px; margin-bottom: 18px; }
            .footer-copyright p { font-size: 0.72rem; letter-spacing: 0.5px; }
        }

        @media (max-width: 380px) {
            .footer-menu { justify-content: flex-start; gap: 16px; }
            .footer-menu a { font-size: 0.78rem; }
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
        }

        .back-to-top i { font-size: 1.2rem; }

        .back-to-top:hover {
            background: white;
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.25);
        }

        .back-to-top.show { opacity: 1; visibility: visible; }

        @media (max-width: 576px) {
            .back-to-top { bottom: 15px; right: 15px; width: 42px; height: 42px; }
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
            padding-top: 70px;
            min-height: calc(100vh - 200px);
        }

        @media (max-width: 991px) { main { padding-top: 63px; } }
        @media (max-width: 575px) { main { padding-top: 56px; } }
        @media (max-width: 380px) { main { padding-top: 52px; } }
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

        const navbarCollapse = document.getElementById('navbarNav');

        // Tutup navbar saat klik link biasa (bukan dropdown toggle) di mobile
        const regularLinks = document.querySelectorAll('.navbar-nav .nav-link:not(.dropdown-toggle), .dropdown-item');
        regularLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 991) {
                    const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                    if (bsCollapse) bsCollapse.hide();
                }
            });
        });

        // Dropdown handler — mobile manual, desktop pakai Bootstrap API
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
        dropdownToggles.forEach(function(toggle) {
            // Desktop: inisialisasi Bootstrap Dropdown manual (karena data-bs-toggle sudah dihapus)
            var bsDropdown = new bootstrap.Dropdown(toggle, { autoClose: true });

            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                if (window.innerWidth > 991) {
                    // Desktop: pakai Bootstrap Dropdown toggle
                    bsDropdown.toggle();
                } else {
                    // Mobile: toggle class show manual
                    var menu = this.parentElement.querySelector('.dropdown-menu');
                    if (!menu) return;
                    var isOpen = menu.classList.contains('show');

                    // Tutup semua dropdown lain
                    document.querySelectorAll('.navbar-nav .dropdown-menu.show').forEach(function(m) {
                        m.classList.remove('show');
                    });

                    if (!isOpen) menu.classList.add('show');
                }
            });
        });

        // Klik di luar → tutup dropdown mobile
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 991 && !e.target.closest('.navbar')) {
                document.querySelectorAll('.navbar-nav .dropdown-menu.show').forEach(function(m) {
                    m.classList.remove('show');
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>