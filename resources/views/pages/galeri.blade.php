@extends('layouts.app')

@section('title', 'GeoToba - Premium Unified Gallery')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&family=Playfair+Display:wght@700&display=swap');

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #ffffff;
        margin: 0;
    }

    .gallery-wrapper {
        padding: 80px 20px;
        text-align: center;
    }

    .gallery-wrapper h1 {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        margin-bottom: 50px;
    }

    /* 1. LAYOUT STACKING (Sesuai image_cee21e.jpg) */
    .stack-area {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 500px;
        padding-bottom: 100px;
    }

    .card-item {
        position: relative;
        width: 300px;
        height: 450px;
        margin-left: -150px; /* Efek Bertumpuk */
        border-radius: 24px;
        overflow: hidden;
        background: #eee;
        box-shadow: -15px 0 40px rgba(0,0,0,0.15);
        transition: all 0.6s cubic-bezier(0.2, 1, 0.3, 1);
        cursor: pointer;
        z-index: 1;
    }

    .card-item:first-child { margin-left: 0; }

    .card-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        image-rendering: -webkit-optimize-contrast;
    }

    /* Hover Effect: Naik & Fokus */
    .card-item:hover {
        z-index: 100 !important;
        transform: translateY(-40px) scale(1.05);
        box-shadow: 0 40px 80px rgba(0,0,0,0.3);
        margin-right: 30px;
    }

    /* 2. MODAL PREMIUM (Sesuai image_cee225.png) */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(255,255,255,0.98);
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .modal-box {
        background: white;
        width: 100%;
        max-width: 1100px;
        display: grid;
        grid-template-columns: 1fr 1fr; /* Image kiri, Info kanan */
        border-radius: 32px;
        overflow: hidden;
        box-shadow: 0 30px 100px rgba(0,0,0,0.15);
        position: relative;
    }

    .modal-image-part img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        min-height: 450px;
    }

    .modal-info-part {
        padding: 60px 40px;
        text-align: left;
    }

    .modal-info-part small {
        text-transform: uppercase;
        letter-spacing: 3px;
        color: #999;
        font-weight: 800;
        font-size: 0.75rem;
    }

    .modal-info-part h2 {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        margin: 10px 0 20px;
        color: #1a1a1a;
    }

    .modal-info-part p {
        color: #555;
        line-height: 1.8;
        font-size: 1.1rem;
    }

    .close-btn {
        position: absolute;
        top: 25px;
        right: 25px;
        width: 40px;
        height: 40px;
        background: #f1f3f4;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 20px;
    }

    /* 3. MOBILE RESPONSIVE (Sesuai image_d0283d.png) */
    @media (max-width: 768px) {
        .stack-area {
            flex-direction: column;
            gap: 25px;
            padding-top: 20px;
        }
        .card-item {
            margin-left: 0;
            width: 90%;
            height: 400px;
        }
        .card-item:hover { transform: scale(1.02); margin-right: 0; }
        
        .modal-box { grid-template-columns: 1fr; }
        .modal-image-part { height: 250px; }
        .modal-info-part { padding: 30px 20px; }
        .modal-info-part h2 { font-size: 2.5rem; }
    }
</style>

<div class="gallery-wrapper">
    <h1>Explore...</h1>

    <div class="stack-area">
        @foreach(['Meat', 'Batu Bahisan', 'Liang Sipege'] as $kategori)
            @if(isset($galeriByKategori[Str::slug($kategori)]))
                @foreach($galeriByKategori[Str::slug($kategori)] as $item)
                <div class="card-item" onclick="openMe('{{ base64_encode($item->gambar) }}', '{{ $item->judul }}', '{{ addslashes($item->deskripsi) }}', '{{ $kategori }}')">
                    <img src="data:image/jpeg;base64,{{ base64_encode($item->gambar) }}" alt="{{ $item->judul }}">
                </div>
                @endforeach
            @endif
        @endforeach
    </div>
</div>

<div id="premiumModal" class="modal-overlay" onclick="closeMe()">
    <div class="modal-box" onclick="event.stopPropagation()">
        <div class="close-btn" onclick="closeMe()"><i class="bi bi-x"></i></div>
        <div class="modal-image-part">
            <img src="" id="mImg">
        </div>
        <div class="modal-info-part">
            <small id="mTag"></small>
            <h2 id="mTitle"></h2>
            <p id="mDesc"></p>
        </div>
    </div>
</div>

<script>
    function openMe(img, title, desc, tag) {
        const modal = document.getElementById('premiumModal');
        document.getElementById('mImg').src = 'data:image/jpeg;base64,' + img;
        document.getElementById('mTitle').innerText = title;
        document.getElementById('mTag').innerText = tag;
        document.getElementById('mDesc').innerHTML = desc.replace(/\n/g, '<br>');

        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeMe() {
        const modal = document.getElementById('premiumModal');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
</script>

@endsection