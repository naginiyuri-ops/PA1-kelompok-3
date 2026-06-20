@extends('layouts.app')

@section('title', $item->nama_trans . ' - Penginapan Geosite Danau Toba')

@section('content')

<style>
    :root {
        --primary:      #003366;
        --primary-light:#1a4a7a;
        --primary-dark: #001f3f;
        --gold:         #c6a43b;
        --gold-light:   #f1d26b;
        --gold-dark:    #967a28;
        --text-dark:    #0f172a;
        --text-gray:    #334155;
        --text-light:   #64748b;
        --white:        #ffffff;
        --bg-light:     #f8fafc;
        --shadow-xl:    0 25px 50px -12px rgba(15,23,42,0.15);
    }
    body { font-family: 'Inter', sans-serif; background: var(--bg-light); }

    .detail-hero {
        position: relative; margin-top: 60px;
        height: 480px; overflow: hidden;
    }
    .detail-hero img { width: 100%; height: 100%; object-fit: cover; }
    .detail-hero-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to bottom, rgba(0,31,63,0.15) 0%, rgba(0,31,63,0.75) 100%);
        display: flex; align-items: flex-end; padding: 40px;
    }
    .detail-hero-content { color: white; max-width: 800px; }
    .detail-hero-badge {
        display: inline-block; background: var(--gold); color: var(--primary-dark);
        padding: 5px 16px; border-radius: 30px; font-size: 0.72rem;
        font-weight: 700; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 14px;
    }
    .detail-hero-content h1 {
        font-size: 2.5rem; font-weight: 700;
        font-family: 'Playfair Display', serif;
        line-height: 1.25; text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .detail-body { padding: 60px 0 90px; }
    .container { max-width: 1240px; margin: 0 auto; padding: 0 24px; }
    .detail-layout {
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 40px; align-items: start;
    }
    .detail-main {
        background: var(--white); border-radius: 20px;
        padding: 36px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        border: 1px solid rgba(15,23,42,0.04);
    }
    .detail-main h2 {
        font-size: 1.6rem; font-weight: 700;
        font-family: 'Playfair Display', serif;
        color: var(--primary-dark); margin-bottom: 20px;
        padding-bottom: 16px; border-bottom: 2px solid #f1f5f9;
    }
    .detail-main .deskripsi {
        font-size: 0.95rem; color: var(--text-gray);
        line-height: 1.85; white-space: pre-line; text-align: justify;
    }
    .detail-sidebar { display: flex; flex-direction: column; gap: 20px; }
    .sidebar-card {
        background: var(--white); border-radius: 18px;
        padding: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        border: 1px solid rgba(15,23,42,0.04);
    }
    .sidebar-card h4 {
        font-size: 0.85rem; font-weight: 700;
        color: var(--primary); margin-bottom: 16px;
        padding-bottom: 12px; border-bottom: 1px solid #f1f5f9;
        display: flex; align-items: center; gap: 8px;
        text-transform: uppercase; letter-spacing: 0.5px;
    }
    .sidebar-card h4 i { color: var(--gold); }
    .info-row {
        display: flex; gap: 12px; align-items: flex-start;
        margin-bottom: 12px; padding-bottom: 12px;
        border-bottom: 1px solid #f8fafc;
    }
    .info-row:last-child { margin-bottom: 0; padding-bottom: 0; border-bottom: none; }
    .info-row i { color: var(--gold); width: 18px; flex-shrink: 0; margin-top: 2px; font-size: 0.85rem; }
    .info-row .info-text { font-size: 0.85rem; color: var(--text-gray); }
    .info-row .info-label { font-size: 0.72rem; color: var(--text-light); text-transform: uppercase; letter-spacing: 0.5px; }
    .btn-back {
        display: inline-flex; align-items: center; gap: 8px;
        background: var(--primary); color: white;
        padding: 12px 24px; border-radius: 12px;
        text-decoration: none; font-weight: 700;
        font-size: 0.88rem; transition: all 0.3s ease;
        width: 100%; justify-content: center;
    }
    .btn-back:hover { background: var(--primary-light); transform: translateY(-2px); color: white; }

    .related-section { margin-top: 60px; }
    .related-section h3 {
        font-size: 1.4rem; font-weight: 700;
        font-family: 'Playfair Display', serif;
        color: var(--primary-dark); margin-bottom: 28px;
    }
    .related-section h3 span { color: var(--gold); }
    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 24px;
    }
    .related-card {
        background: var(--white); border-radius: 16px; overflow: hidden;
        box-shadow: 0 4px 16px rgba(0,0,0,0.05);
        transition: all 0.3s ease; text-decoration: none; color: inherit;
        display: flex; flex-direction: column;
        border: 1px solid rgba(15,23,42,0.04);
    }
    .related-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-xl); }
    .related-card img { width: 100%; height: 160px; object-fit: cover; }
    .related-card .related-content { padding: 16px; }
    .related-card .related-title {
        font-size: 0.95rem; font-weight: 700;
        color: var(--primary-dark); margin-bottom: 6px;
        font-family: 'Playfair Display', serif;
        display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2;
        -webkit-box-orient: vertical; overflow: hidden;
    }
    .related-card .related-link {
        font-size: 0.75rem; color: var(--gold-dark);
        font-weight: 600; display: flex; align-items: center; gap: 5px;
    }

    @media (max-width: 992px) { .detail-layout { grid-template-columns: 1fr; } .detail-hero { height: 380px; } .detail-hero-content h1 { font-size: 2rem; } }
    @media (max-width: 768px) { .detail-hero { height: 300px; } .detail-hero-overlay { padding: 24px; } .detail-hero-content h1 { font-size: 1.6rem; } .detail-body { padding: 40px 0 70px; } .detail-main { padding: 24px; } }
    @media (max-width: 576px) { .detail-hero { height: 250px; } .detail-hero-content h1 { font-size: 1.3rem; } }
</style>

{{-- HERO GAMBAR --}}
<div class="detail-hero">
    <img src="{{ $item->gambar_url }}"
         alt="{{ $item->nama_trans }}"
         onerror="this.src='{{ asset('image/default.jpg') }}'">
    <div class="detail-hero-overlay">
        <div class="detail-hero-content">
            <div class="detail-hero-badge">🏨 Penginapan</div>
            <h1>{{ $item->nama_trans }}</h1>
        </div>
    </div>
</div>

{{-- KONTEN UTAMA --}}
<section class="detail-body">
    <div class="container">
        <div class="detail-layout">

            {{-- Kolom kiri: Deskripsi --}}
            <div class="detail-main">
                @if($item->gambar_tambahan && file_exists(public_path($item->gambar_tambahan)))
                    <div style="margin-bottom: 30px; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                        <img src="{{ asset($item->gambar_tambahan) }}" alt="Gambar Tambahan {{ $item->nama_trans }}" style="width: 100%; height: auto; display: block; object-fit: cover; max-height: 500px;">
                    </div>
                @endif
                <h2><i class="fas fa-bed" style="color:var(--gold);margin-right:10px;"></i>Tentang Penginapan Ini</h2>
                <div class="deskripsi">{{ $item->deskripsi_trans ?? 'Deskripsi belum tersedia.' }}</div>
            </div>

            {{-- Kolom kanan: Sidebar info --}}
            <div class="detail-sidebar">
                <div class="sidebar-card">
                    <h4><i class="fas fa-info-circle"></i> Informasi</h4>
                    <div class="info-row">
                        <i class="fas fa-tag"></i>
                        <div>
                            <div class="info-label">Kategori</div>
                            <div class="info-text">Penginapan</div>
                        </div>
                    </div>
                    @if($item->lokasi)
                    <div class="info-row">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <div class="info-label">Lokasi</div>
                            <div class="info-text">{{ $item->lokasi }}</div>
                        </div>
                    </div>
                    @endif
                    @if($item->kontak)
                    <div class="info-row">
                        <i class="fas fa-phone"></i>
                        <div>
                            <div class="info-label">Kontak</div>
                            <div class="info-text">{{ $item->kontak }}</div>
                        </div>
                    </div>
                    @endif
                    @if($item->harga)
                    <div class="info-row">
                        <i class="fas fa-money-bill-wave"></i>
                        <div>
                            <div class="info-label">Harga</div>
                            <div class="info-text">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                        </div>
                    </div>
                    @endif
                    <div class="info-row">
                        <i class="fas fa-calendar-alt"></i>
                        <div>
                            <div class="info-label">Terakhir Diperbarui</div>
                            <div class="info-text">{{ $item->updated_at->format('d M Y') }}</div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-card">
                    <h4><i class="fas fa-list"></i> Navigasi</h4>
                    <a href="{{ route('fasilitas.penginapan') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i>
                        Kembali ke Daftar Penginapan
                    </a>
                </div>
            </div>
        </div>

        {{-- Penginapan Lainnya --}}
        @if($related->count() > 0)
        <div class="related-section">
            <h3>Penginapan <span>Lainnya</span></h3>
            <div class="related-grid">
                @foreach($related as $rel)
                <a href="{{ route('fasilitas.penginapan.detail', $rel->id) }}" class="related-card">
                    <img src="{{ $rel->gambar_url }}"
                         alt="{{ $rel->nama_trans }}" loading="lazy"
                         onerror="this.src='{{ asset('image/default.jpg') }}'">
                    <div class="related-content">
                        <div class="related-title">{{ $rel->nama_trans }}</div>
                        <div class="related-link">Lihat Detail <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>

@endsection
