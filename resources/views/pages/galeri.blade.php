@extends('layouts.app')

@section('title', 'GeoToba ')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&family=Playfair+Display:wght@700&display=swap');

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
    }

    .gallery-wrapper {
        padding: 80px 20px;
        text-align: center;
        max-width: 1400px;
        margin: 0 auto;
    }

    .gallery-wrapper h1 {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        margin-bottom: 60px;
        color: #1a1a1a;
    }

    /* 1. LAYOUT STACKING (8 per baris) */
    .stack-area {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 40px 0; /* Jarak antar baris */
        padding: 40px 20px;
    }

    .card-item {
        position: relative;
        width: 180px; 
        height: 320px;
        margin-left: -80px; /* Efek tumpuk */
        border-radius: 20px;
        overflow: hidden;
        background: #333;
        box-shadow: -10px 0 30px rgba(0,0,0,0.2);
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        z-index: 1;
        border: 2px solid rgba(255,255,255,0.1);
    }

    .card-item:nth-child(8n+1) { margin-left: 0; }

    .card-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-item:hover {
        z-index: 100 !important;
        transform: translateY(-20px) scale(1.1) rotate(2deg);
        box-shadow: 0 25px 50px rgba(0,0,0,0.4);
        margin-right: 30px;
    }

    /* 2. MODAL PREMIUM (PERBAIKAN TOTAL) */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.9); /* Latar gelap agar foto menonjol */
        backdrop-filter: blur(15px);
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .modal-box {
        background: #1a1a1a; /* Box gelap */
        width: 90%;
        max-width: 1000px;
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 50px 100px rgba(0,0,0,0.5);
        border: 1px solid rgba(255,255,255,0.1);
        position: relative;
        animation: slideUp 0.4s ease-out;
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(50px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .modal-image-part {
        background: #000;
        display: flex;
        align-items: center;
    }

    .modal-image-part img {
        width: 100%;
        height: 100%;
        max-height: 600px;
        object-fit: contain; /* Foto asli tidak terpotong */
    }

    .modal-info-part {
        padding: 60px 40px;
        color: white;
        text-align: left;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .modal-info-part small {
        color: #00d2ff;
        text-transform: uppercase;
        letter-spacing: 4px;
        font-weight: 800;
        font-size: 0.8rem;
        margin-bottom: 15px;
    }

    .modal-info-part h2 {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        margin: 0 0 20px 0;
        line-height: 1.1;
    }

    .modal-info-part p {
        color: #ccc;
        line-height: 1.8;
        font-size: 1.1rem;
        margin: 0;
    }

    .close-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 45px;
        height: 45px;
        background: rgba(255,255,255,0.1);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: 0.3s;
        z-index: 10;
    }

    .close-btn:hover { background: #ff4757; transform: rotate(90deg); }

    /* Mobile */
    @media (max-width: 768px) {
        .modal-box { grid-template-columns: 1fr; }
        .modal-image-part { height: 300px; }
        .modal-info-part { padding: 30px; }
        .modal-info-part h2 { font-size: 2rem; }
        .card-item { width: 120px; height: 200px; margin-left: -50px; }
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
        <div class="close-btn" onclick="closeMe()"><i class="bi bi-x-lg"></i></div>
        <div class="modal-image-part">
            <img src="" id="mImg">
        </div>
        <div class="modal-info-part">
            <small id="mTag"></small>
            <h2 id="mTitle"></h2>
            <div style="width: 50px; height: 3px; background: #00d2ff; margin-bottom: 25px;"></div>
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