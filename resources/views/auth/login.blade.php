<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - GeoToba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        body {
            background: #001f3f;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            padding: 20px;
        }

        .login-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 900px;
            width: 100%;
            min-height: 580px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 40px 80px rgba(0,0,0,0.5);
        }

        /* ===== PANEL KIRI ===== */
        .left-panel {
            background: #003366;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 40px 36px;
            position: relative;
            overflow: hidden;
        }

     
 

        .left-content { position: relative; z-index: 2; }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: auto;
        }

        .logo-badge {
            background: white;
            border-radius: 12px;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-badge img {
            width: 36px;
            height: 36px;
            object-fit: contain;
        }

        .logo-sep {
            width: 1.5px;
            height: 36px;
            background: rgba(255,255,255,0.3);
        }

        .logo-name {
            color: white;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .logo-name span { color: #c6a43b; }

        .hero-text {
            margin: 40px 0 32px;
        }

        .hero-text h2 {
            color: white;
            font-size: 28px;
            font-weight: 800;
            line-height: 1.25;
            margin-bottom: 14px;
        }

        .hero-text h2 em {
            color: #c6a43b;
            font-style: normal;
            display: block;
        }

        .hero-text p {
            color: rgba(255,255,255,0.65);
            font-size: 13.5px;
            line-height: 1.65;
        }

        .stats-row {
            display: flex;
            gap: 0;
            border-top: 1px solid rgba(255,255,255,0.12);
            padding-top: 24px;
        }

        .stat-b {
            flex: 1;
            text-align: center;
            border-right: 1px solid rgba(255,255,255,0.12);
            padding: 0 10px;
        }

        .stat-b:last-child { border-right: none; }

        .stat-b .num {
            color: #c6a43b;
            font-size: 20px;
            font-weight: 800;
            display: block;
            margin-bottom: 4px;
        }

        .stat-b .lbl {
            color: rgba(255,255,255,0.5);
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        /* ===== PANEL KANAN ===== */
        .right-panel {
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 52px 48px;
        }

        .right-panel .welcome-title {
            font-size: 24px;
            font-weight: 800;
            color: #003366;
            margin-bottom: 6px;
        }

        .right-panel .welcome-sub {
            font-size: 13.5px;
            color: #888;
            margin-bottom: 36px;
        }

        .field-group { margin-bottom: 20px; }

        .field-group label {
            display: block;
            font-size: 11.5px;
            font-weight: 700;
            color: #555;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .field-inner {
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1.5px solid #e0e0e0;
            border-radius: 12px;
            padding: 0 16px;
            height: 50px;
            background: #f8f9fa;
            transition: all 0.25s ease;
        }

        .field-inner:focus-within {
            border-color: #003366;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(0,51,102,0.08);
        }

        .field-inner i {
            font-size: 16px;
            color: #aaa;
            flex-shrink: 0;
        }

        .field-inner input {
            border: none;
            outline: none;
            background: transparent;
            font-size: 14.5px;
            flex: 1;
            color: #222;
            font-family: 'Inter', sans-serif;
        }

        .field-inner input::placeholder { color: #bbb; }

        .forgot-row {
            text-align: right;
            margin-bottom: 28px;
            margin-top: -8px;
        }

        .forgot-row a {
            font-size: 12.5px;
            color: #c6a43b;
            text-decoration: none;
            font-weight: 600;
        }

        .forgot-row a:hover { text-decoration: underline; }

        .btn-login {
            width: 100%;
            height: 52px;
            background: #003366;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.25s ease;
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.3px;
        }

        .btn-login:hover {
            background: #c6a43b;
            color: #003366;
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(198,164,59,0.35);
        }

        .btn-login:active { transform: translateY(0); }

        .secure-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 20px;
            font-size: 12px;
            color: #aaa;
        }

        .secure-badge i { color: #4caf50; font-size: 14px; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .login-wrapper { grid-template-columns: 1fr; }
            .left-panel { min-height: 220px; padding: 30px 28px; }
            .hero-text { margin: 20px 0; }
            .hero-text h2 { font-size: 20px; }
            .right-panel { padding: 36px 28px; }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">

        {{-- PANEL KIRI --}}
        <div class="left-panel">
            <div class="left-content">
                <div class="logo-area">
                    <div class="logo-badge">
                        <img src="{{ asset('image/Logo/logobankindonesia.jpg') }}" alt="Bank Indonesia">
                    </div>
                    <div class="logo-sep"></div>
                    <div class="logo-badge">
                        <img src="{{ asset('image/Logo/del.jpg') }}" alt="Del">
                    </div>
                    <div class="logo-sep"></div>
                    <div class="logo-name">Geo<span>Toba</span></div>
                </div>

                <div class="hero-text">
                    <h2>Selamat Datang <em>di Portal Admin</em></h2>
                    <p>Kelola destinasi, konten, dan data wisata Geosite Danau Toba dari satu dashboard terpadu.</p>
                </div>

                <div class="stats-row">
                    <div class="stat-b">
                        <span class="num">16</span>
                        <span class="lbl">Geosites</span>
                    </div>
                    <div class="stat-b">
                        <span class="num">74rb+</span>
                        <span class="lbl">Thn Sejarah</span>
                    </div>
                    <div class="stat-b">
                        <span class="num">100+</span>
                        <span class="lbl">UMKM Lokal</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- PANEL KANAN --}}
        <div class="right-panel">
            <h2 class="welcome-title">Masuk ke Dashboard</h2>
            <p class="welcome-sub">Masukkan kredensial admin Anda untuk melanjutkan</p>

            @if(session('success'))
                <div class="alert alert-success py-2 mb-3" style="font-size:13px; border-radius:10px;">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger py-2 mb-3" style="font-size:13px; border-radius:10px;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field-group">
                    <label>Email Admin</label>
                    <div class="field-inner">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="admin@geotoba.id"
                               value="{{ old('email') }}" required autofocus>
                    </div>
                </div>

                <div class="field-group">
                    <label>Password</label>
                    <div class="field-inner">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="forgot-row">
                    <a href="{{ route('password.request') }}">Lupa password?</a>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    Masuk Sekarang
                </button>
            </form>

            <div class="secure-badge">
                <i class="fas fa-shield-alt"></i>
                Koneksi aman &amp; terenkripsi SSL
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</body>
</html>