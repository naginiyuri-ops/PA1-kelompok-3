@extends('layouts.app')

@section('title', $informasi->judul . ' - Geosite Danau Toba')

@section('content')

<style>
    .detail-container {
        margin-top: 100px;
        margin-bottom: 60px;
    }
    .detail-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }
    .detail-image {
        width: 100%;
        height: 400px;
        overflow: hidden;
    }
    .detail-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .detail-content {
        padding: 35px;
    }
    .detail-date {
        font-size: 12px;
        color: #c6a43b;
        display: inline-block;
        margin-bottom: 15px;
    }
    .detail-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #1a3c5e;
        margin-bottom: 20px;
    }
    .detail-body {
        color: #444;
        line-height: 1.8;
        font-size: 1rem;
    }
    .detail-body p {
        margin-bottom: 1em;
    }
    .btn-back {
        display: inline-block;
        background: #003366;
        color: white;
        padding: 10px 25px;
        border-radius: 40px;
        text-decoration: none;
        font-size: 0.8rem;
        margin-top: 30px;
        transition: all 0.3s ease;
    }
    .btn-back:hover {
        background: #c6a43b;
        color: #003366;
    }
    .detail-views {
        font-size: 12px;
        color: #888;
        margin-top: 10px;
    }
    @media (max-width: 768px) {
        .detail-image { height: 250px; }
        .detail-title { font-size: 1.4rem; }
        .detail-content { padding: 20px; }
        .detail-body { font-size: 0.9rem; }
    }
</style>

<div class="container detail-container">
    <div class="detail-card">
        <!-- MENAMPILKAN GAMBAR BASE64 -->
        @php
            $imgSrc = asset('image/default.jpg');
            if (!empty($informasi->gambar)) {
                if (str_starts_with($informasi->gambar, 'data:image')) {
                    $imgSrc = $informasi->gambar;
                } elseif (filter_var($informasi->gambar, FILTER_VALIDATE_URL)) {
                    $imgSrc = $informasi->gambar;
                } else {
                    $imgSrc = asset('storage/' . $informasi->gambar);
                }
            }
        @endphp
        
        @if($informasi->gambar)
        <div class="detail-image">
            <img src="{{ $imgSrc }}" alt="{{ $informasi->judul }}">
        </div>
        @endif
        
        <div class="detail-content">
            <div class="detail-date">
                📅 {{ $informasi->created_at->format('d F Y') }}
            </div>
            <h1 class="detail-title">{{ $informasi->judul }}</h1>
            <div class="detail-body">
                {!! nl2br(e($informasi->konten)) !!}
            </div>
            <div class="detail-views">
                👁️ {{ number_format($informasi->views ?? 0) }} x dibaca
            </div>
            <a href="{{ route('informasi') }}" class="btn-back">← Kembali ke Informasi</a>
        </div>
    </div>
</div>

@endsection