@extends('layouts.app')

@section('title', 'Destinasi ' . ucfirst($kategori) . ' - Geosite Danau Toba')

@section('content')

<style>
    /* ==================== HERO SECTION ==================== */
    .kategori-hero {
        height: 40vh;
        min-height: 350px;
        background: linear-gradient(135deg, rgba(0,51,102,0.75), rgba(0,51,102,0.55));
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
    }
    
    .kategori-hero h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        font-family: 'Cormorant Garamond', serif;
    }
    
    .kategori-hero p {
        font-size: 0.9rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        opacity: 0.9;
    }
    
    /* ==================== DESTINASI GRID ==================== */
    .destinasi-section {
        padding: 60px 0;
        background: #f8f9fa;
    }
    
    .destinasi-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }
    
    .dest-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        transition: all 0.4s ease;
        cursor: pointer;
        text-decoration: none;
        display: block;
    }
    
    .dest-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 35px rgba(0,0,0,0.12);
    }
    
    .card-image {
        height: 220px;
        overflow: hidden;
    }
    
    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .dest-card:hover .card-image img {
        transform: scale(1.05);
    }
    
    .card-content {
        padding: 20px;
    }
    
    .card-title {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 8px;
        color: #003366;
        font-family: 'Cormorant Garamond', serif;
    }
    
    .card-location {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 0.7rem;
        color: #c6a43b;
        margin-bottom: 12px;
    }
    
    .card-location i {
        font-size: 0.6rem;
    }
    
    .card-desc {
        font-size: 0.85rem;
        color: #666;
        line-height: 1.6;
        margin-bottom: 15px;
    }
    
    .card-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    
    .card-tags span {
        background: #f0f4f0;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        color: #003366;
    }
    
    /* Empty State */
    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 16px;
    }
    
    .empty-state i {
        font-size: 3rem;
        color: #ccc;
        margin-bottom: 15px;
    }
    
    .empty-state h3 {
        font-size: 1.3rem;
        color: #666;
        margin-bottom: 8px;
    }
    
    .empty-state p {
        color: #999;
    }
    
    /* Back Button */
    .back-button {
        margin-top: 30px;
        text-align: center;
    }
    
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #003366;
        color: white;
        padding: 10px 25px;
        border-radius: 50px;
        text-decoration: none;
        font-size: 0.8rem;
        transition: all 0.3s ease;
    }
    
    .btn-back:hover {
        background: #c6a43b;
        color: #003366;
        transform: translateX(-5px);
    }
    
    /* Responsive */
    @media (max-width: 992px) {
        .destinasi-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }
    }
    
    @media (max-width: 768px) {
        .kategori-hero {
            min-height: 280px;
        }
        .kategori-hero h1 {
            font-size: 1.8rem;
        }
        .destinasi-section {
            padding: 40px 0;
        }
        .destinasi-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .card-image {
            height: 200px;
        }
    }
</style>

<!-- HERO SECTION -->
@php
    $bgImage = asset('image/destinasi/' . strtolower($kategori) . '.jpg');
    $deskripsiKategori = [
        'alam' => 'Keindahan Alam Geopark Kaldera Toba',
        'buatan' => 'Fasilitas Wisata Terbaik di Danau Toba',
        'budaya' => 'Warisan Budaya Batak yang Lestari'
    ];
    $currentDesc = $deskripsiKategori[strtolower($kategori)] ?? 'Jelajahi Destinasi Menarik';
@endphp

<section class="kategori-hero" style="background-image: linear-gradient(135deg, rgba(0,51,102,0.75), rgba(0,51,102,0.55)), url('{{ $bgImage }}');">
    <div>
        <h1>Destinasi {{ ucfirst($kategori) }}</h1>
        <p>{{ $currentDesc }}</p>
    </div>
</section>

<!-- DESTINASI GRID -->
<section class="destinasi-section">
    <div class="container">
        <div class="destinasi-grid">
            @forelse($destinasi as $item)
            @php
                // Convert to array if needed (handle both object and array)
                $itemArray = is_object($item) ? (array)$item : $item;
            @endphp
            <a href="{{ url('/destinasi/' . strtolower($kategori) . '/' . ($itemArray['slug'] ?? $itemArray['id'] ?? '')) }}" class="dest-card">
                <div class="card-image">
                    <img src="{{ asset('image/' . ($itemArray['gambar'] ?? 'default.jpg')) }}" alt="{{ $itemArray['nama'] ?? 'Destinasi' }}">
                </div>
                <div class="card-content">
                    <h3 class="card-title">{{ $itemArray['nama'] ?? 'Destinasi' }}</h3>
                    <div class="card-location">
                        <i class="fas fa-map-marker-alt"></i> {{ $itemArray['lokasi'] ?? 'Danau Toba' }}
                    </div>
                    <p class="card-desc">{{ Str::limit($itemArray['deskripsi'] ?? 'Destinasi menarik di Danau Toba', 100) }}</p>
                    <div class="card-tags">
                        @foreach(($itemArray['tags'] ?? []) as $tag)
                        <span>#{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </a>
            @empty
            <div class="empty-state">
                <i class="fas fa-mountain"></i>
                <h3>Belum Ada Destinasi</h3>
                <p>Destinasi pada kategori ini akan segera ditambahkan.</p>
            </div>
            @endforelse
        </div>
        
        <div class="back-button">
            <a href="{{ url('/destinasi') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Semua Destinasi
            </a>
        </div>
    </div>
</section>

<!-- AOS -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50
    });
</script>

@endsection