@extends('layouts.app')

@section('title', 'Biodiversitas - Geosite Danau Toba')

@section('content')
<style>
    .hero-biodiversitas {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        padding: 120px 0 60px;
        margin-top: 0;
        text-align: center;
        color: white;
    }
    .hero-biodiversitas h1 {
        font-size: 2.8rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
    }
    .hero-biodiversitas p {
        color: rgba(255,255,255,0.8);
        font-size: 0.9rem;
    }
    .grid-biodiversitas {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 380px));
        gap: 30px;
        padding: 60px 0;
        justify-content: center;
    }
    .card-biodiversitas {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .card-biodiversitas:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.12);
    }
    .card-biodiversitas img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .card-biodiversitas .content {
        padding: 20px;
    }
    .card-biodiversitas .content h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 8px;
    }
    .card-biodiversitas .content p {
        font-size: 0.85rem;
        color: #64748b;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .badge-kategori {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.65rem;
        font-weight: 600;
        margin-bottom: 10px;
    }
    .badge-flora { background: #dcfce7; color: #166534; }
    .badge-fauna { background: #fef3c7; color: #92400e; }
    .badge-ekosistem { background: #dbeafe; color: #1e40af; }
    @media (max-width: 768px) {
        .grid-biodiversitas { grid-template-columns: 1fr; }
        .hero-biodiversitas h1 { font-size: 2rem; }
    }
</style>

<div class="hero-biodiversitas">
    <h1>{{ __('app.biodiversity.title') }}</h1>
    <p>{{ __('app.biodiversity.subtitle') }}</p>
</div>

<div class="container">
    <div class="grid-biodiversitas">
        @forelse($data as $item)
        <div class="card-biodiversitas" onclick="window.location.href='{{ route('biodiversitas.detail', $item->slug) }}'">
            @php
                $imgSrc = $item->gambar ? asset($item->gambar) : asset('image/default.jpg');
            @endphp
            <img src="{{ $imgSrc }}" alt="{{ $item->nama_trans }}" loading="lazy" onerror="this.onerror=null; this.src='{{ asset('image/default.jpg') }}'">
            <div class="content">
                <span class="badge-kategori badge-{{ $item->kategori }}">
                    {{ ucfirst($item->kategori) }}
                </span>
                <h3>{{ Str::limit($item->nama_trans, 40) }}</h3>
                <p>{{ Str::limit(strip_tags($item->deskripsi_trans), 100) }}</p>
                @if($item->lokasi)
                    <p style="font-size:0.7rem; color:#94a3b8; margin-top:6px;">
                        <i class="fas fa-map-marker-alt"></i> {{ $item->lokasi }}
                    </p>
                @endif
            </div>
        </div>
        @empty
        <div style="grid-column: span 3; text-align:center; padding:60px;">
            <i class="fas fa-leaf" style="font-size:3rem; color:#c6a43b; opacity:0.3;"></i>
            <p style="margin-top:16px; color:#94a3b8;">{{ __('app.common.no_data') }}</p>
        </div>
        @endforelse
    </div>

    @if($data->hasPages())
    <div style="display:flex; justify-content:center; margin-bottom:40px;">
        {{ $data->links() }}
    </div>
    @endif
</div>
@endsection
