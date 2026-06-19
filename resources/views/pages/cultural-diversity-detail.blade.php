@extends('layouts.app')

@section('title', $item->nama . ' - Cultural Diversity')

@section('content')

<style>
    .detail-hero {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        padding: 120px 0 40px;
        margin-top: 60px;
        color: white;
    }
    .detail-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
    }
    .detail-hero .meta {
        font-size: 0.85rem;
        color: rgba(255,255,255,0.7);
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-top: 10px;
    }
    .detail-hero .meta i { color: #c6a43b; margin-right: 4px; }
    .detail-hero .back-link {
        color: rgba(255,255,255,0.6);
        text-decoration: none;
        font-size: 0.85rem;
        display: inline-block;
        margin-bottom: 15px;
        transition: all 0.3s ease;
    }
    .detail-hero .back-link:hover { color: white; transform: translateX(-5px); }

    .detail-content { padding: 50px 0; background: #f8fafc; }
    .detail-content .main-img {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }
    .detail-content .info-box {
        background: white;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        margin-top: 20px;
    }
    .detail-content .info-box .label {
        font-size: 0.7rem;
        font-weight: 600;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }
    .detail-content .info-box .value {
        font-size: 0.95rem;
        color: #1e293b;
        margin-bottom: 14px;
    }
    .detail-content .info-box .value:last-child { margin-bottom: 0; }
    .detail-content .deskripsi {
        font-size: 1rem;
        line-height: 1.8;
        color: #475569;
        margin-top: 20px;
        text-align: justify;
    }
    .detail-content .deskripsi p { margin-bottom: 15px; }
    .btn-back {
        display: inline-block;
        background: #f1f5f9;
        color: #475569;
        padding: 10px 24px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.85rem;
        transition: all 0.3s ease;
        margin-top: 20px;
    }
    .btn-back:hover { background: #e2e8f0; transform: translateY(-2px); }

    .badge-kategori {
        display: inline-block;
        padding: 4px 14px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
    }
    .badge-tarian { background: #fce4ec; color: #c62828; }
    .badge-musik { background: #e8f5e9; color: #2e7d32; }
    .badge-upacara { background: #fff3e0; color: #e65100; }
    .badge-kerajinan { background: #e3f2fd; color: #1565c0; }
    .badge-kuliner { background: #f3e5f5; color: #7b1fa2; }

    .badge-status {
        display: inline-block;
        padding: 2px 12px;
        border-radius: 20px;
        background: #dcfce7;
        color: #166534;
        font-weight: 600;
        font-size: 0.75rem;
    }

    .rekomendasi-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-top: 20px;
    }
    .rekomendasi-item {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.04);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .rekomendasi-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }
    .rekomendasi-item img {
        width: 100%;
        height: 140px;
        object-fit: cover;
    }
    .rekomendasi-item .caption { padding: 12px; }
    .rekomendasi-item .caption h4 {
        font-size: 0.85rem;
        font-weight: 600;
        color: #003366;
        margin: 0;
    }

    .video-container {
        margin-top: 20px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        background: #000;
    }
    .video-container video {
        width: 100%;
        max-height: 400px;
        display: block;
    }

    @media (max-width: 768px) {
        .detail-hero { padding: 100px 0 30px; }
        .detail-hero h1 { font-size: 1.5rem; }
        .detail-content .main-img { max-height: 250px; }
        .rekomendasi-grid { grid-template-columns: repeat(2, 1fr); }
        .detail-content .info-box { padding: 18px; }
        .video-container video { max-height: 250px; }
    }
    @media (max-width: 480px) {
        .rekomendasi-grid { grid-template-columns: 1fr; }
        .detail-hero .meta { gap: 10px; font-size: 0.75rem; }
        .detail-content .deskripsi { font-size: 0.9rem; }
    }
</style>

<!-- HERO -->
<section class="detail-hero">
    <div class="container">
        <a href="{{ route('cultural-diversity') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Kembali ke Cultural Diversity
        </a>
        <h1>{{ $item->nama }}</h1>
        <div class="meta">
            <span><i class="fas fa-tag"></i> {{ ucfirst($item->kategori) }}</span>
            <span><i class="fas fa-map-marker-alt"></i> {{ $item->lokasi ?? 'Danau Toba' }}</span>
            <span><i class="fas fa-eye"></i> {{ number_format($item->views ?? 0) }} dibaca</span>
        </div>
    </div>
</section>

<!-- CONTENT -->
<section class="detail-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @php
                    $imgSrc = asset('image/default.jpg');
                    if (!empty($item->gambar)) {
                        if (str_starts_with($item->gambar, 'http')) {
                            $imgSrc = $item->gambar;
                        } elseif (str_starts_with($item->gambar, 'image/')) {
                            $imgSrc = asset($item->gambar);
                        } elseif (file_exists(public_path('image/cultural-diversity/' . $item->gambar))) {
                            $imgSrc = asset('image/cultural-diversity/' . $item->gambar);
                        } else {
                            $imgSrc = asset('storage/' . $item->gambar);
                        }
                    }
                @endphp
                <img src="{{ $imgSrc }}" alt="{{ $item->nama }}" class="main-img" onerror="this.src='{{ asset('image/default.jpg') }}'">
                
                @if($item->video_url)
                <div class="video-container">
                    <video controls>
                        <source src="{{ $item->video_url }}" type="video/mp4">
                        <source src="{{ $item->video_url }}" type="video/webm">
                        Browser Anda tidak mendukung video.
                    </video>
                </div>
                @endif

                <div class="deskripsi">{!! $item->deskripsi !!}</div>
            </div>
            <div class="col-lg-4">
                <div class="info-box">
                    <div class="label">Kategori</div>
                    <div class="value">
                        <span class="badge-kategori badge-{{ $item->kategori }}">
                            {{ ucfirst($item->kategori) }}
                        </span>
                    </div>

                    <div class="label">Lokasi</div>
                    <div class="value">{{ $item->lokasi ?? 'Danau Toba' }}</div>

                    @if($item->video_url)
                    <div class="label">Video</div>
                    <div class="value">
                        <a href="{{ $item->video_url }}" target="_blank" style="color:#c6a43b; text-decoration:none;">
                            <i class="fas fa-play-circle"></i> Putar Video
                        </a>
                    </div>
                    @endif

                    <div class="label">Status</div>
                    <div class="value">
                        <span class="badge-status">
                            {{ $item->status ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>

                    <div class="label">Views</div>
                    <div class="value">{{ number_format($item->views ?? 0) }} kali dibaca</div>

                    <div class="label">Dibuat</div>
                    <div class="value">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</div>
                </div>
                <a href="{{ route('cultural-diversity') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>

        @if(isset($rekomendasi) && $rekomendasi->count() > 0)
        <div style="margin-top:50px; padding-top:30px; border-top:1px solid #e2e8f0;">
            <h3 style="font-family:'Playfair Display', serif; color:#003366; font-size:1.5rem;">
                🔍 Rekomendasi Lainnya
            </h3>
            <p style="color:#94a3b8; font-size:0.85rem; margin-bottom:20px;">
                Temukan lebih banyak kekayaan budaya Batak di Geopark Danau Toba
            </p>
            <div class="rekomendasi-grid">
                @foreach($rekomendasi as $rec)
                <div class="rekomendasi-item" onclick="window.location.href='{{ route('cultural-diversity.detail', $rec->slug) }}'">
                    @php
                        $recImg = asset('image/default.jpg');
                        if (!empty($rec->gambar)) {
                            if (str_starts_with($rec->gambar, 'http')) {
                                $recImg = $rec->gambar;
                            } elseif (str_starts_with($rec->gambar, 'image/')) {
                                $recImg = asset($rec->gambar);
                            } elseif (file_exists(public_path('image/cultural-diversity/' . $rec->gambar))) {
                                $recImg = asset('image/cultural-diversity/' . $rec->gambar);
                            }
                        }
                    @endphp
                    <img src="{{ $recImg }}" alt="{{ $rec->nama }}" onerror="this.src='{{ asset('image/default.jpg') }}'">
                    <div class="caption">
                        <h4>{{ Str::limit($rec->nama, 30) }}</h4>
                        <p style="font-size:0.65rem; color:#94a3b8; margin:0;">
                            {{ ucfirst($rec->kategori) }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

@endsection