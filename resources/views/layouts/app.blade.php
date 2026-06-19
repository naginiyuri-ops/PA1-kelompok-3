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

        html, body {
            overflow-x: hidden;
            background: var(--gray-light);
            max-width: 100%;
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
            font-size: 0.9rem;
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

        /* ========================================
                   GLOBAL SEARCH BAR - DI SEBELAH FASILITAS
                ======================================== */
        .search-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            margin-left: 12px;
            flex-shrink: 0;
        }

        .search-input-container {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            padding: 5px 12px;
            transition: all 0.35s ease;
            width: 170px;
        }

        .search-input-container:focus-within {
            background: rgba(255, 255, 255, 0.2);
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(198, 164, 59, 0.15);
            width: 210px;
        }

        .navbar.scrolled-down .search-input-container {
            background: rgba(0, 51, 102, 0.06);
            border-color: rgba(0, 51, 102, 0.2);
        }

        .navbar.scrolled-down .search-input-container:focus-within {
            background: rgba(0, 51, 102, 0.1);
            border-color: var(--blue-dark);
            box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.12);
        }

        .search-icon-btn {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.7);
            transition: color 0.3s ease;
        }

        .search-icon-btn:hover {
            color: var(--gold);
        }

        .navbar.scrolled-down .search-icon-btn {
            color: rgba(0, 51, 102, 0.5);
        }

        .navbar.scrolled-down .search-icon-btn:hover {
            color: var(--blue-dark);
        }

        .search-icon {
            font-size: 0.75rem;
            flex-shrink: 0;
        }

        #globalSearchInput {
            background: transparent;
            border: none;
            outline: none;
            color: white;
            font-size: 0.78rem;
            font-weight: 500;
            width: 100%;
            font-family: 'Inter', sans-serif;
            padding: 3px 6px;
        }

        .navbar.scrolled-down #globalSearchInput {
            color: var(--blue-dark);
        }

        #globalSearchInput::placeholder {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.7rem;
        }

        .navbar.scrolled-down #globalSearchInput::placeholder {
            color: rgba(0, 51, 102, 0.4);
        }

        .search-clear-btn {
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            padding: 0 4px;
            font-size: 0.65rem;
            flex-shrink: 0;
            line-height: 1;
            display: none;
            transition: color 0.2s ease;
        }

        .search-clear-btn:hover { color: white; }

        .navbar.scrolled-down .search-clear-btn {
            color: rgba(0, 51, 102, 0.4);
        }

        .navbar.scrolled-down .search-clear-btn:hover {
            color: var(--blue-dark);
        }

        #searchResultsDropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            min-width: 360px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.18);
            border: 1px solid rgba(0, 51, 102, 0.08);
            overflow: hidden;
            z-index: 9999;
            display: none;
            animation: dropdownFadeIn 0.2s ease;
        }

        @keyframes dropdownFadeIn {
            from { opacity: 0; transform: translateY(-8px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .search-results-header {
            padding: 10px 16px;
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--gold);
            background: rgba(0, 51, 102, 0.03);
            border-bottom: 1px solid rgba(0, 51, 102, 0.06);
        }

        .search-result-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            text-decoration: none;
            color: var(--text-dark);
            transition: background 0.2s ease;
            border-bottom: 1px solid rgba(0, 0, 0, 0.04);
        }

        .search-result-item:last-child { border-bottom: none; }

        .search-result-item:hover {
            background: rgba(0, 51, 102, 0.04);
        }

        .search-result-thumb {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            object-fit: cover;
            flex-shrink: 0;
            background: #f1f5f9;
        }

        .search-result-icon-placeholder {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: linear-gradient(135deg, rgba(0,51,102,0.1), rgba(198,164,59,0.1));
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: var(--blue-dark);
            font-size: 1rem;
        }

        .search-result-info { flex: 1; overflow: hidden; }

        .search-result-name {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--text-dark);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .search-result-sub {
            font-size: 0.75rem;
            color: var(--gray);
            margin-top: 1px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .search-result-badge {
            font-size: 0.62rem;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 20px;
            background: rgba(0, 51, 102, 0.08);
            color: var(--blue-dark);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            flex-shrink: 0;
        }

        .search-empty-state {
            padding: 28px 16px;
            text-align: center;
        }

        .search-empty-state i {
            font-size: 2rem;
            color: #cbd5e1;
            margin-bottom: 10px;
            display: block;
        }

        .search-empty-state p {
            color: #94a3b8;
            font-size: 0.85rem;
            margin: 0;
        }

        .search-loading {
            padding: 20px 16px;
            text-align: center;
            color: #94a3b8;
            font-size: 0.85rem;
        }

        .search-loading i {
            animation: spin 1s linear infinite;
            margin-right: 6px;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }

        /* Responsive Search */
        @media (max-width: 992px) {
            .search-wrapper {
                margin-left: 8px;
            }
            .search-input-container {
                width: 130px;
            }
            .search-input-container:focus-within {
                width: 170px;
            }
            #searchResultsDropdown {
                min-width: 300px;
                right: 0;
                left: auto;
            }
        }

        @media (max-width: 768px) {
            .search-wrapper {
                margin-left: 0;
                margin-right: 6px;
            }
            .search-input-container {
                width: 110px;
                padding: 4px 10px;
            }
            .search-input-container:focus-within {
                width: 150px;
            }
            #globalSearchInput {
                font-size: 0.7rem;
            }
            #globalSearchInput::placeholder {
                font-size: 0.65rem;
            }
        }

        @media (max-width: 576px) {
            .navbar > .container {
                flex-wrap: wrap !important;
                justify-content: space-between !important;
                padding-top: 8px;
                padding-bottom: 8px;
            }
            
            .logo-wrapper {
                justify-content: flex-start !important;
                margin-bottom: 0;
                flex: 1;
            }
            .logo-img {
                height: 32px !important; 
            }
            .navbar-brand {
                font-size: 1rem !important; 
            }
            .logo-divider {
                height: 22px !important;
            }

            /* Search bar di pojok kanan, di samping tombol toggle */
            .search-wrapper {
                margin-left: auto;
                margin-right: 4px;
                flex-shrink: 1;
                max-width: 120px;
            }
            .search-input-container {
                width: 100%;
                padding: 3px 8px;
                border-radius: 30px;
            }
            .search-input-container:focus-within {
                width: 100%;
            }
            #globalSearchInput {
                font-size: 0.65rem;
                padding: 2px 4px;
            }
            #globalSearchInput::placeholder {
                font-size: 0.6rem;
            }
            .search-icon {
                font-size: 0.65rem;
            }
            .search-icon-btn {
                padding: 0 2px;
            }
            .navbar-toggler {
                margin-left: 2px !important;
                padding: 4px 6px;
            }
            .navbar-toggler-icon {
                width: 20px;
                height: 20px;
            }
            
            #searchResultsDropdown {
                min-width: 240px;
                width: 90vw;
                max-width: 300px;
                right: -10px;
                left: auto;
                top: calc(100% + 6px);
            }
            .search-result-item {
                padding: 8px 12px;
                gap: 8px;
            }
            .search-result-thumb {
                width: 36px;
                height: 36px;
            }
            .search-result-name {
                font-size: 0.8rem;
            }
            .search-result-sub {
                font-size: 0.65rem;
            }
            .search-result-badge {
                font-size: 0.55rem;
                padding: 1px 6px;
            }
        }

        @media (max-width: 400px) {
            .search-wrapper {
                max-width: 90px;
            }
            .search-input-container {
                padding: 2px 6px;
            }
            #globalSearchInput {
                font-size: 0.6rem;
            }
            #globalSearchInput::placeholder {
                font-size: 0.55rem;
            }
            #searchResultsDropdown {
                min-width: 200px;
                max-width: 240px;
                right: -5px;
            }
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

            <div class="collapse navbar-collapse flex-lg-grow-0" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <!-- HOME -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/') }}">
                            Beranda
                        </a>
                    </li>

                    <!-- TENTANG GEOSITE -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tentang-geosite') ? 'active' : '' }}" href="{{ route('tentang-geosite') }}">
                            Tentang Geosite
                        </a>
                    </li>

                    <!-- DESTINASI -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('destinasi*') ? 'active' : '' }}" href="{{ url('/destinasi') }}">
                            Destinasi
                        </a>
                    </li>

                    <!-- GEODIVERSITY -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('geodiversitas*') ? 'active' : '' }}" href="{{ route('geodiversitas') }}">
                            Geodiversity
                        </a>
                    </li>

                    <!-- BIODIVERSITY -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('biodiversitas*') ? 'active' : '' }}" href="{{ route('biodiversitas') }}">
                            Biodiversity
                        </a>
                    </li>

                    <!-- CULTURAL DIVERSITY -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('cultural-diversity*') ? 'active' : '' }}" href="{{ route('cultural-diversity') }}">
                            Cultural Diversity
                        </a>
                    </li>

                    <!-- BERITA / EVENT -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('berita*') ? 'active' : '' }}" href="{{ url('/berita') }}">
                            Berita / Event
                        </a>
                    </li>

                    <!-- FASILITAS -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('fasilitas*') ? 'active' : '' }}" href="{{ url('/fasilitas') }}">
                            <i class="fas fa-building me-1 d-lg-none"></i>Fasilitas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('umkm.index') ? 'active' : '' }}" href="{{ route('umkm.index') }}">
                            <i class="fas fa-store me-1 d-lg-none"></i>Sovenir & UMKM
                        </a>
                    </li>

                    <!-- ========================================
                    SEARCH BAR - DI SEBELAH FASILITAS (POJOK KANAN)
                    ======================================== -->
                    <li class="nav-item search-wrapper" id="searchWrapper">
                        <form id="globalSearchForm" action="{{ route('search.results') }}" method="GET" style="display:contents;" onsubmit="handleSearchSubmit(event)">
                            <div class="search-input-container">
                                <button type="submit" class="search-icon-btn" aria-label="Cari">
                                    <i class="fas fa-search search-icon"></i>
                                </button>
                                <input
                                    type="text"
                                    id="globalSearchInput"
                                    name="q"
                                    placeholder="Cari..."
                                    autocomplete="off"
                                    aria-label="Pencarian Global"
                                    maxlength="100"
                                    value="{{ request('q') }}"
                                >
                                <button class="search-clear-btn" id="searchClearBtn" type="button" aria-label="Hapus pencarian">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </form>
                        <div id="searchResultsDropdown"></div>
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
                        <a href="{{ url('/') }}"><i class="fas fa-chevron-right"></i> Beranda</a>
                        <a href="{{ route('tentang-geosite') }}"><i class="fas fa-chevron-right"></i> Tentang Geosite</a>
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
        // DROPDOWN FIX
        // ========================================
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            var dropdownList = dropdownElementList.map(function(dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl);
            });

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

    <!-- ========================================
    LIVE SEARCH JAVASCRIPT
    ======================================== -->
    <script>
    (function () {
        const searchInput    = document.getElementById('globalSearchInput');
        const searchDropdown = document.getElementById('searchResultsDropdown');
        const searchClearBtn = document.getElementById('searchClearBtn');
        const searchWrapper  = document.getElementById('searchWrapper');

        const SEARCH_URL     = '{{ route("search") }}';

        let debounceTimer = null;

        function showLoading() {
            searchDropdown.style.display = 'block';
            searchDropdown.innerHTML = `
                <div class="search-loading">
                    <i class="fas fa-circle-notch"></i> Mencari...
                </div>
            `;
        }

        function showEmptyState(query) {
            searchDropdown.innerHTML = `
                <div class="search-empty-state">
                    <i class="fas fa-search-minus"></i>
                    <p>Tidak ada hasil untuk <strong>"${escapeHtml(query)}"</strong></p>
                </div>
            `;
        }

        function hideDropdown() {
            searchDropdown.style.display = 'none';
            searchDropdown.innerHTML = '';
        }

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.appendChild(document.createTextNode(text));
            return div.innerHTML;
        }

        function renderResults(results) {
            if (!results || results.length === 0) {
                showEmptyState(searchInput.value);
                return;
            }

            let html = `<div class="search-results-header"><i class="fas fa-bolt me-1"></i> Hasil Pencarian (${results.length})</div>`;

            results.forEach(function (item) {
                const thumbHtml = item.gambar_url
                    ? `<img src="${escapeHtml(item.gambar_url)}" alt="${escapeHtml(item.nama)}" class="search-result-thumb" loading="lazy" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                       <div class="search-result-icon-placeholder" style="display:none;"><i class="fas ${escapeHtml(item.icon)}"></i></div>`
                    : `<div class="search-result-icon-placeholder"><i class="fas ${escapeHtml(item.icon)}"></i></div>`;

                html += `
                    <a href="${escapeHtml(item.url)}" class="search-result-item">
                        ${thumbHtml}
                        <div class="search-result-info">
                            <div class="search-result-name">${escapeHtml(item.nama)}</div>
                            <div class="search-result-sub">${escapeHtml(item.sub || '')}</div>
                        </div>
                        <span class="search-result-badge">${escapeHtml(item.type)}</span>
                    </a>
                `;
            });

            searchDropdown.innerHTML = html;
            searchDropdown.style.display = 'block';
        }

        function performSearch(query) {
            showLoading();

            fetch(`${SEARCH_URL}?q=${encodeURIComponent(query)}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(function (response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function (data) {
                renderResults(data);
            })
            .catch(function (error) {
                searchDropdown.innerHTML = `
                    <div class="search-empty-state">
                        <i class="fas fa-exclamation-triangle" style="color: #f59e0b;"></i>
                        <p>Terjadi kesalahan. Silakan coba lagi.</p>
                    </div>
                `;
                searchDropdown.style.display = 'block';
                console.error('Search error:', error);
            });
        }

        searchInput.addEventListener('input', function () {
            const query = this.value.trim();

            searchClearBtn.style.display = query.length > 0 ? 'block' : 'none';

            if (query.length === 0) {
                hideDropdown();
                clearTimeout(debounceTimer);
                return;
            }

            if (query.length < 3) {
                hideDropdown();
                clearTimeout(debounceTimer);
                return;
            }

            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(function () {
                performSearch(query);
            }, 300);
        });

        searchClearBtn.addEventListener('click', function () {
            searchInput.value = '';
            searchClearBtn.style.display = 'none';
            hideDropdown();
            searchInput.focus();
        });

        document.addEventListener('click', function (event) {
            if (searchWrapper && !searchWrapper.contains(event.target)) {
                hideDropdown();
            }
        });

        searchInput.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                hideDropdown();
                searchInput.blur();
            }
        });

    })();

    // ========================================
    // FUNGSI SUBMIT FORM PENCARIAN
    // ========================================
    function handleSearchSubmit(event) {
        const input = document.getElementById('globalSearchInput');
        const query = input ? input.value.trim() : '';
        if (query.length < 1) {
            event.preventDefault();
            input.focus();
        }
    }
    </script>

    @stack('scripts')
</body>
</html>