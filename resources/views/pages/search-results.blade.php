@extends('layouts.app')

@section('title', 'Hasil Pencarian: ' . $query)

@section('content')

<style>
    .search-hero {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        padding: 120px 0 50px;
        margin-top: 60px;
        text-align: center;
        color: white;
    }
    .search-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 700;
    }
    .search-hero h1 span { color: #c6a43b; }
    .search-hero p { color: rgba(255,255,255,0.8); font-size: 0.95rem; }
    .search-divider { width: 50px; height: 2px; background: #c6a43b; margin: 15px auto; }

    .search-results-section {
        padding: 50px 0;
        background: #f8fafc;
        min-height: 50vh;
    }

    .result-item {
        background: white;
        border-radius: 12px;
        padding: 18px 22px;
        margin-bottom: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.04);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 16px;
        text-decoration: none;
        color: #1e293b;
        border: 1px solid rgba(0,0,0,0.03);
    }
    .result-item:hover {
        transform: translateX(6px);
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border-color: #c6a43b;
    }
    .result-item .icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
        background: rgba(0,51,102,0.06);
        color: #003366;
    }
    .result-item .info { flex: 1; }
    .result-item .info .title {
        font-weight: 600;
        font-size: 0.95rem;
        color: #0f172a;
        margin-bottom: 2px;
    }
    .result-item .info .sub {
        font-size: 0.8rem;
        color: #94a3b8;
    }
    .result-item .badge-type {
        font-size: 0.6rem;
        font-weight: 700;
        padding: 3px 12px;
        border-radius: 20px;
        background: rgba(0,51,102,0.08);
        color: #003366;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        flex-shrink: 0;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #94a3b8;
    }
    .empty-state i {
        font-size: 3.5rem;
        opacity: 0.25;
        display: block;
        margin-bottom: 16px;
        color: #c6a43b;
    }
    .empty-state h3 {
        font-family: 'Playfair Display', serif;
        color: #003366;
        margin-bottom: 8px;
    }

    .back-link {
        display: inline-block;
        margin-top: 20px;
        color: #c6a43b;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .back-link:hover { color: #003366; letter-spacing: 0.5px; }

    @media (max-width: 768px) {
        .search-hero { padding: 100px 0 30px; }
        .search-hero h1 { font-size: 1.6rem; }
        .result-item { flex-wrap: wrap; padding: 14px 16px; }
        .result-item .badge-type { margin-left: auto; }
    }
</style>

<!-- HERO -->
<section class="search-hero">
    <div class="container">
        <h1>🔍 Hasil Pencarian</h1>
        <div class="search-divider"></div>
        <p>Menampilkan hasil untuk <strong>"{{ $query }}"</strong></p>
    </div>
</section>

<!-- RESULTS -->
<section class="search-results-section">
    <div class="container">
        @if($results->count() > 0)
            <p style="color:#94a3b8; font-size:0.85rem; margin-bottom:20px;">
                Ditemukan <strong>{{ $results->count() }}</strong> hasil
            </p>
            @foreach($results as $item)
            <a href="{{ $item->url }}" class="result-item">
                <div class="icon">
                    <i class="fas 
                        @if($item->type == 'Berita') fa-newspaper
                        @elseif($item->type == 'Galeri') fa-images
                        @elseif($item->type == 'UMKM') fa-store
                        @elseif($item->type == 'Penginapan') fa-hotel
                        @elseif($item->type == 'Biodiversitas') fa-leaf
                        @elseif($item->type == 'Geodiversitas') fa-gem
                        @elseif($item->type == 'Cultural Diversity') fa-people-arrows
                        @elseif($item->type == 'Sejarah Wisata') fa-history
                        @else fa-link
                        @endif
                    "></i>
                </div>
                <div class="info">
                    <div class="title">
                        @if($item->type == 'UMKM')
                            {{ $item->nama_usaha ?? $item->judul ?? $item->nama }}
                        @elseif($item->type == 'Berita' || $item->type == 'Sejarah Wisata')
                            {{ $item->judul }}
                        @else
                            {{ $item->nama ?? $item->judul }}
                        @endif
                    </div>
                    <div class="sub">
                        @if($item->type == 'UMKM')
                            {{ $item->alamat ?? 'Desa Meat' }}
                        @elseif($item->type == 'Penginapan')
                            {{ $item->lokasi ?? 'Desa Meat' }}
                        @else
                            {{ $item->lokasi ?? 'Geopark Danau Toba' }}
                        @endif
                    </div>
                </div>
                <span class="badge-type">{{ $item->type }}</span>
            </a>
            @endforeach
        @else
            <div class="empty-state">
                <i class="fas fa-search-minus"></i>
                <h3>Tidak Ditemukan</h3>
                <p>Maaf, tidak ada hasil yang ditemukan untuk <strong>"{{ $query }}"</strong></p>
                <p style="font-size:0.8rem; margin-top:8px;">Coba gunakan kata kunci lain atau periksa ejaan Anda.</p>
                <a href="{{ url('/') }}" class="back-link">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        @endif
    </div>
</section>

@endsection