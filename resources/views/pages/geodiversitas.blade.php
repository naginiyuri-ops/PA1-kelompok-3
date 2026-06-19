@extends('layouts.app')

@section('title', 'Geodiversitas - Geosite Danau Toba')

@section('content')

<style>
    .hero-geodiversitas {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        padding: 120px 0 60px;
        margin-top: 60px;
        text-align: center;
        color: white;
    }
    .hero-geodiversitas h1 {
        font-size: 2.8rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
    }
    .hero-geodiversitas h1 span { color: #c6a43b; }
    .hero-geodiversitas p {
        color: rgba(255,255,255,0.8);
        font-size: 0.9rem;
    }
    .hero-divider {
        width: 50px;
        height: 2px;
        background: #c6a43b;
        margin: 15px auto;
        border-radius: 2px;
    }

    .grid-geodiversitas {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 380px));
        gap: 30px;
        padding: 60px 0;
        justify-content: center;
    }
    .card-geodiversitas {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        transition: all 0.4s ease;
        cursor: pointer;
    }
    .card-geodiversitas:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.12);
    }
    .card-geodiversitas img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .card-geodiversitas:hover img { transform: scale(1.03); }
    .card-geodiversitas .content {
        padding: 20px;
    }
    .card-geodiversitas .content .badge-tipe {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.65rem;
        font-weight: 600;
        margin-bottom: 10px;
    }
    .badge-batuan { background: #e8f5e9; color: #2e7d32; }
    .badge-mineral { background: #fff3e0; color: #e65100; }
    .badge-fosil { background: #f3e5f5; color: #7b1fa2; }
    .badge-formasi { background: #e3f2fd; color: #1565c0; }
    .badge-other { background: #f1f5f9; color: #475569; }

    .card-geodiversitas .content h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 6px;
        font-family: 'Playfair Display', serif;
    }
    .card-geodiversitas .content .lokasi {
        font-size: 0.75rem;
        color: #94a3b8;
        margin-bottom: 8px;
    }
    .card-geodiversitas .content .lokasi i { color: #c6a43b; margin-right: 4px; }
    .card-geodiversitas .content p {
        font-size: 0.85rem;
        color: #64748b;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .card-geodiversitas .content .btn-detail {
        display: inline-block;
        margin-top: 10px;
        font-size: 0.7rem;
        font-weight: 600;
        color: #c6a43b;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .card-geodiversitas .content .btn-detail:hover {
        color: #003366;
        letter-spacing: 0.5px;
    }

    .empty-state {
        text-align: center;
        padding: 60px;
        color: #94a3b8;
        grid-column: span 3;
    }
    .empty-state i {
        font-size: 3rem;
        opacity: 0.3;
        display: block;
        margin-bottom: 15px;
        color: #c6a43b;
    }

    @media (max-width: 992px) {
        .grid-geodiversitas { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 768px) {
        .hero-geodiversitas { padding: 100px 0 30px; }
        .hero-geodiversitas h1 { font-size: 2rem; }
        .grid-geodiversitas { grid-template-columns: 1fr; }
    }
    @media (max-width: 480px) {
        .hero-geodiversitas h1 { font-size: 1.6rem; }
        .container { padding: 0 16px; }
    }
</style>

<!-- HERO -->
<div class="hero-geodiversitas">
    <div class="container">
        <h1>⛰️ <span>Geodiversitas</span></h1>
        <div class="hero-divider"></div>
        <p>Keanekaragaman Geologi di Geopark Danau Toba</p>
    </div>
</div>

<!-- GRID -->
<section style="background: #f8fafc; padding-bottom: 50px;">
    <div class="container">
        <div class="grid-geodiversitas">
            @forelse($data as $item)
            <div class="card-geodiversitas" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}" onclick="window.location.href='{{ route('geodiversitas.detail', $item->slug) }}'">
                @php
                    $imgSrc = asset('image/default.jpg');
                    if (!empty($item->gambar)) {
                        if (str_starts_with($item->gambar, 'http')) {
                            $imgSrc = $item->gambar;
                        } elseif (str_starts_with($item->gambar, 'image/')) {
                            $imgSrc = asset($item->gambar);
                        } elseif (file_exists(public_path('image/geodiversitas/' . $item->gambar))) {
                            $imgSrc = asset('image/geodiversitas/' . $item->gambar);
                        } else {
                            $imgSrc = asset('storage/' . $item->gambar);
                        }
                    }
                @endphp
                <img src="{{ $imgSrc }}" alt="{{ $item->nama }}" loading="lazy" onerror="this.src='{{ asset('image/default.jpg') }}'">
                <div class="content">
                    <span class="badge-tipe badge-{{ $item->tipe_geologi ?? 'other' }}">
                        {{ ucfirst($item->tipe_geologi ?? 'Lainnya') }}
                    </span>
                    <h3>{{ Str::limit($item->nama, 40) }}</h3>
                    <div class="lokasi"><i class="fas fa-map-marker-alt"></i> {{ $item->lokasi ?? 'Danau Toba' }}</div>
                    <p>{{ Str::limit(strip_tags($item->deskripsi), 100) }}</p>
                    <a href="{{ route('geodiversitas.detail', $item->slug) }}" class="btn-detail">Baca Selengkapnya →</a>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-gem"></i>
                <p>Belum ada data Geodiversitas</p>
                <p style="font-size:0.8rem; margin-top:8px;">Silakan tambahkan melalui panel admin.</p>
            </div>
            @endforelse
        </div>

        @if($data->hasPages())
        <div style="display:flex; justify-content:center; margin-top:20px;">
            {{ $data->links() }}
        </div>
        @endif
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 600, once: true, offset: 40, easing: 'ease-out-quad' });
</script>

@endsection