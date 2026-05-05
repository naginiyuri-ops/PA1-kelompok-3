@extends('layouts.app')

@section('title', 'Informasi - Geosite Danau Toba')

@section('content')

<style>
    .info-hero {
        height: 45vh;
        background: linear-gradient(rgba(0, 51, 102, 0.6), rgba(0, 102, 153, 0.4)), url('{{ asset("image/sejarah-hero.jpg") }}');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
    }
    .info-hero h1 { 
        font-size: 3.5rem; 
        font-family: 'Cormorant Garamond', serif; 
        margin-bottom: 12px;
        text-shadow: 0 2px 15px rgba(0, 0, 0, 0.3);
    }
    .info-hero p { 
        font-size: 0.9rem; 
        letter-spacing: 0.2em; 
        text-transform: uppercase; 
        opacity: 0.85;
    }

    .section { padding: 60px 0; }
    .container { max-width: 1100px; margin: 0 auto; padding: 0 24px; }
    .section-title { text-align: center; margin-bottom: 45px; }
    .section-title h2 { 
        font-size: 2rem; 
        font-family: 'Cormorant Garamond', serif; 
        color: #003366; 
    }
    .divider { width: 50px; height: 2px; background: #c6a43b; margin: 10px auto 0; }

    .info-grid { display: flex; flex-direction: column; gap: 45px; }
    .info-item { display: flex; align-items: center; gap: 50px; flex-wrap: wrap; }
    .info-item.reverse { flex-direction: row-reverse; }
    .info-text { flex: 1; line-height: 1.8; color: #2c5f8a; font-size: 0.95rem; }
    .info-text h3 {
        font-size: 1.5rem;
        font-family: 'Cormorant Garamond', serif;
        color: #003366;
        margin-bottom: 15px;
    }
    .info-image { 
        flex: 1; 
        border-radius: 16px; 
        overflow: hidden; 
        box-shadow: 0 10px 25px rgba(0, 51, 102, 0.15); 
    }
    .info-image img { width: 100%; height: 260px; object-fit: cover; transition: 0.3s; }
    .info-image:hover img { transform: scale(1.02); }

    @media (max-width: 768px) {
        .info-hero h1 { font-size: 2.2rem; }
        .info-item, .info-item.reverse { flex-direction: column; text-align: center; }
    }
</style>

<!-- HERO -->
<section class="info-hero">
    <div data-aos="fade-up">
        <h1>Informasi Geopark</h1>
        <p>Berbagai informasi menarik tentang Geopark Danau Toba</p>
    </div>
</section>

<!-- INFORMASI BERSILANG dari DATABASE -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Informasi Lengkap</h2>
            <div class="divider"></div>
        </div>
        <div class="info-grid">
            @forelse($informasiList as $index => $item)
            <div class="info-item {{ $index % 2 == 1 ? 'reverse' : '' }}" data-aos="fade-{{ $index % 2 == 0 ? 'right' : 'left' }}">
                <div class="info-image">
                    @if($item->gambar)
                        <img src="{{ $item->gambar }}" alt="{{ $item->judul }}">
                    @else
                        <img src="{{ asset('image/default.jpg') }}" alt="{{ $item->judul }}">
                    @endif
                </div>
                <div class="info-text">
                    <h3>{{ $item->judul }}</h3>
                    {!! $item->konten !!}
                </div>
            </div>
            @empty
            <div class="text-center py-5">
                <p>Belum ada data informasi. Silakan tambah melalui panel admin.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init({ duration: 700, once: true, offset: 50 });</script>

@endsection