@extends('layouts.app')

@section('title', $item->nama . ' - Biodiversitas')

@section('content')
<style>
    .detail-hero {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        padding: 120px 0 50px;
        margin-top: 60px;
        color: white;
    }
    .detail-hero h1 {
        font-size: 2.2rem;
        font-family: 'Playfair Display', serif;
    }
    .detail-content {
        padding: 50px 0;
    }
    .detail-content img {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 20px;
        margin-bottom: 30px;
    }
    .detail-content .info {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 30px;
        padding: 20px;
        background: #f8fafc;
        border-radius: 16px;
    }
    .detail-content .info span {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.85rem;
        color: #475569;
    }
    .detail-content .info i {
        color: #c6a43b;
    }
    .detail-content .body {
        font-size: 1rem;
        line-height: 1.8;
        color: #1e293b;
    }
    @media (max-width: 768px) {
        .detail-hero h1 { font-size: 1.6rem; }
        .detail-content img { max-height: 250px; }
    }
</style>

<div class="detail-hero">
    <div class="container">
        <h1>{{ $item->nama }}</h1>
        <p style="color:rgba(255,255,255,0.8);">
            <i class="fas fa-tag"></i> {{ ucfirst($item->kategori) }}
            @if($item->status_keberadaan)
                · {{ $item->status_keberadaan }}
            @endif
        </p>
    </div>
</div>

<div class="detail-content">
    <div class="container">
        @php
            $imgSrc = $item->gambar ? asset($item->gambar) : asset('image/default.jpg');
        @endphp
        <img src="{{ $imgSrc }}" alt="{{ $item->nama }}" onerror="this.src='{{ asset('image/default.jpg') }}'">

        <div class="info">
            @if($item->lokasi)
            <span><i class="fas fa-map-marker-alt"></i> {{ $item->lokasi }}</span>
            @endif
            <span><i class="fas fa-eye"></i> {{ number_format($item->views ?? 0) }} dibaca</span>
            @if($item->status_keberadaan)
            <span><i class="fas fa-shield-alt"></i> {{ $item->status_keberadaan }}</span>
            @endif
        </div>

        <div class="body">
            {!! $item->deskripsi !!}
        </div>

        @if(isset($rekomendasi) && $rekomendasi->count() > 0)
        <h3 style="margin-top:50px; font-family:'Playfair Display', serif; color:#003366;">Rekomendasi Lainnya</h3>
        <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:20px; margin-top:20px;">
            @foreach($rekomendasi as $rec)
            <div style="background:white; border-radius:16px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.06); cursor:pointer;" onclick="window.location.href='{{ route('biodiversitas.detail', $rec->slug) }}'">
                <img src="{{ $rec->gambar ? asset($rec->gambar) : asset('image/default.jpg') }}" style="width:100%; height:150px; object-fit:cover;" onerror="this.src='{{ asset('image/default.jpg') }}'">
                <div style="padding:12px;">
                    <h4 style="font-size:0.85rem; font-weight:600; color:#003366; margin:0;">{{ Str::limit($rec->nama, 25) }}</h4>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection