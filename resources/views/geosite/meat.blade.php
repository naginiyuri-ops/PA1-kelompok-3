<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Meat - Geosite Danau Toba</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/meat.css') }}">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar" id="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="{{ asset('image/Logo/logobankindonesia.jpg') }}" alt="Logo">
            <div class="logo-divider"></div>
            <img src="{{ asset('image/Logo/del.jpg') }}" alt="Logo Del">
            <div class="logo-divider"></div>
            <div class="logo-text">
                <h4>GEO<span>TOBA</span></h4>
                <p>Geopark Danau Toba</p>
            </div>
        </div>
        <div class="nav-menu">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
            <a href="#sejarah" class="nav-link">Sejarah</a>
            <a href="#umkm" class="nav-link">UMKM</a>
            <a href="#penginapan" class="nav-link">Penginapan</a>
            <a href="#fasilitas" class="nav-link">Fasilitas</a>
            <a href="#lokasi" class="nav-link">Lokasi</a>
        </div>
        <button class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </button>
    </div>
</div>

<div class="mobile-overlay" id="mobileOverlay">
    <div class="mobile-close" id="mobileClose">&times;</div>
    <a href="{{ url('/') }}" class="mobile-link">Home</a>
    <a href="#sejarah" class="mobile-link">Sejarah</a>
    <a href="#umkm" class="mobile-link">UMKM</a>
    <a href="#penginapan" class="mobile-link">Penginapan</a>
    <a href="#fasilitas" class="mobile-link">Fasilitas</a>
    <a href="#lokasi" class="mobile-link">Lokasi</a>
</div>

<!-- HERO -->
<section class="hero">
    <div class="hero-content">
        <div class="hero-badge">UNESCO Global Geopark</div>
        <h1 class="hero-title">MEAT</h1>
        <p class="hero-subtitle">Pulau Sibandang · Danau Toba</p>
    </div>
</section>

<!-- SEJARAH -->
<section id="sejarah" class="section">
    <div class="container">
        <div class="section-header">
            <div class="badge">Warisan Budaya</div>
            <h2>Desa Meat<br>Jantung Wisata Batak</h2>
            <div class="divider"></div>
            <p>Desa bersejarah dengan panorama alam indah dan budaya autentik</p>
        </div>
        <div class="sejarah-grid">
            <div class="sejarah-item">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/meat-detail.jpg') }}" alt="Desa Meat">
                </div>
                <div class="sejarah-text">
                    <h3>Pantai satu</h3>
                    <p>Desa Meat di Kecamatan Tampahan, Kabupaten Toba, terletak di pinggiran Danau Toba. Sejak 2017, Meat menjadi desa wisata unggulan Kabupaten Toba dengan pemandangan sawah bertangga, perbukitan hijau, dan pantai pasir putih.</p>
                </div>
            </div>
            <div class="sejarah-item reverse">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/meat-hero.jpg') }}" alt="Tenun Ulos">
                </div>
                <div class="sejarah-text">
                    <h3>Pantai  tiga </h3>
                    <p>Ulos Ragi Hotang adalah tenun paling sakral, digunakan dalam upacara pernikahan adat. Ratusan pengrajin perempuan Meat menghasilkan ulos berkualitas premium.</p>
                </div>
            </div>
            <div class="sejarah-item">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/slide1.jpg') }}" alt="Penenun">
                </div>
                <div class="sejarah-text">
                    <h3>Pantai dua</h3>
                    <p>Sejak jadi desa wisata, penenun meningkat dari 87 KK jadi 120-140 KK dengan pendapatan naik lebih dari 100%. Ulos Meat dipasarkan hingga ke berbagai daerah.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- UMKM -->
<section id="umkm" class="section section-light">
    <div class="container">
        <div class="section-header">
            <div class="badge">Produk Lokal</div>
            <h2>UMKM Meat</h2>
            <div class="divider"></div>
            <p>Produk berkualitas dari pengrajin lokal</p>
        </div>
        <div class="grid-3">
            @forelse($umkm as $item)
            <div class="card">
                @if($item->gambar && str_starts_with($item->gambar, 'data:image'))
                    <img src="{{ $item->gambar }}" class="card-img" alt="{{ $item->nama }}">
                @else
                    <div style="height:200px; background:#e2e8f0; display:flex; align-items:center; justify-content:center;">
                        <i class="fas fa-image" style="font-size:2rem; color:#94a3b8;"></i>
                    </div>
                @endif
                <div class="card-content">
                    <h3>{{ $item->nama }}</h3>
                    <p>{{ Str::limit($item->deskripsi, 90) }}</p>
                    <div class="card-location"><i class="fas fa-map-marker-alt"></i> {{ $item->lokasi ?? 'Desa Meat' }}</div>
                    <div class="card-contact"><i class="fas fa-phone"></i> {{ $item->kontak ?? 'Hubungi pengrajin' }}</div>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-store"></i>
                <p>Belum ada data UMKM</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- PENGINAPAN -->
<section id="penginapan" class="section">
    <div class="container">
        <div class="section-header">
            <div class="badge">Akomodasi</div>
            <h2>Penginapan</h2>
            <div class="divider"></div>
            <p>Tempat menginap dengan nuansa budaya Batak</p>
        </div>
        <div class="grid-3">
            @forelse($penginapan as $item)
            <div class="card">
                @if($item->gambar && str_starts_with($item->gambar, 'data:image'))
                    <img src="{{ $item->gambar }}" class="card-img" alt="{{ $item->nama }}">
                @else
                    <div style="height:200px; background:#e2e8f0; display:flex; align-items:center; justify-content:center;">
                        <i class="fas fa-hotel" style="font-size:2rem; color:#94a3b8;"></i>
                    </div>
                @endif
                <div class="card-content">
                    <h3>{{ $item->nama }}</h3>
                    <p>{{ Str::limit($item->deskripsi, 90) }}</p>
                    <div class="card-price"><i class="fas fa-tag"></i> {{ $item->harga ?? 'Hubungi' }}</div>
                    <div class="card-contact"><i class="fas fa-phone"></i> {{ $item->kontak ?? 'Hubungi' }}</div>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-hotel"></i>
                <p>Belum ada data penginapan</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- FASILITAS -->
<section id="fasilitas" class="section section-light">
    <div class="container">
        <div class="section-header">
            <div class="badge">Layanan</div>
            <h2>Fasilitas</h2>
            <div class="divider"></div>
            <p>Fasilitas lengkap untuk kenyamanan Anda</p>
        </div>
        <div class="grid-2">
            @forelse($fasilitas as $item)
            <div class="fasilitas-item">
                @if($item->gambar && str_starts_with($item->gambar, 'data:image'))
                    <img src="{{ $item->gambar }}" class="fasilitas-img" alt="{{ $item->nama }}">
                @else
                    <div style="width:110px; height:110px; background:#e2e8f0; display:flex; align-items:center; justify-content:center;">
                        <i class="fas fa-tools" style="font-size:1.5rem; color:#94a3b8;"></i>
                    </div>
                @endif
                <div class="fasilitas-content">
                    <h4>{{ $item->nama }}</h4>
                    <p>{{ Str::limit($item->deskripsi, 70) }}</p>
                    <div class="fasilitas-price"><i class="fas fa-tag"></i> {{ $item->harga ?? 'Gratis' }}</div>
                </div>
            </div>
            @empty
            <div class="empty-state" style="grid-column:1/-1;">
                <i class="fas fa-tools"></i>
                <p>Belum ada data fasilitas</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- LOKASI -->
<section id="lokasi" class="section">
    <div class="container">
        <div class="section-header">
            <div class="badge">Lokasi</div>
            <h2>Cara Mencapai</h2>
            <div class="divider"></div>
            <p>Lokasi strategis di Pulau Sibandang</p>
        </div>
        <div class="maps-section">
            <div class="maps-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0!2d99.0835095!3d2.3339262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0415b8f7da39%3A0xc6beb74287f355a5!2sBalige%2C%20Toba%20Samosir%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" allowfullscreen loading="lazy"></iframe>
            </div>
            <div class="rute-info">
                <div class="rute-item">
                    <h4><i class="fas fa-motorcycle"></i> Motor</h4>
                    <p>Balige → Ajibata (30m) → Ferry (20m) → Meat (15m)</p>
                    <span class="rute-time">± 1.5 jam</span>
                </div>
                <div class="rute-item">
                    <h4><i class="fas fa-car"></i> Mobil</h4>
                    <p>Balige → Ajibata (30m) → Parkir → Ferry → Transportasi lokal</p>
                    <span class="rute-time">± 2 jam</span>
                </div>
                <div class="rute-item">
                    <h4><i class="fas fa-ship"></i> Ferry</h4>
                    <p>Operasional setiap hari 06:00 - 17:00 WIB</p>
                    <span class="rute-time">Kapasitas terbatas</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container">
        <h3>Kunjungi Desa Meat</h3>
        <div class="divider"></div>
        <p>Rasakan pengalaman wisata budaya Batak yang autentik</p>
        <div class="cta-buttons">
            <a href="{{ url('/') }}" class="cta-btn">Beranda</a>
            <a href="#penginapan" class="cta-btn cta-btn-outline">Pesan Penginapan</a>
        </div>
    </div>
</section>

<!-- FOOTER -->