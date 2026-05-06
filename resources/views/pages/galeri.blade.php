@extends('layouts.app')

@section('title', 'GeoToba - Gallery')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    /* UI PREMIUM STACKING KAMU */
    .gallery-wrapper { padding: 80px 20px; text-align: center; max-width: 1400px; margin: 0 auto; }
    .stack-area { display: flex; flex-wrap: wrap; justify-content: center; gap: 60px 0; padding: 40px 20px; }
    .card-item {
        position: relative;
        
         width: 180px; 
         height: 300px;
          margin-left: -80px; 
        border-radius: 20px;
         overflow: hidden; background: #333;
        box-shadow: -10px 0 30px rgba(0,0,0,0.15);
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer; z-index: 1; border: 2px solid rgba(255,255,255,0.1);
    }
    .card-item:nth-child(8n+1) { margin-left: 0; }
    .card-item img { width: 100%; height: 100%; object-fit: cover; }
    .card-item:hover {
        z-index: 100 !important; transform: translateY(-25px) scale(1.15) rotate(2deg);
        box-shadow: 0 25px 50px rgba(0,0,0,0.4); margin-right: 40px;
    }

    /* MODAL STYLE */
    .modal-overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.9); z-index: 9999; display: none; align-items: center; justify-content: center; backdrop-filter: blur(10px); }
    .modal-box { background: #1a1a1a; width: 90%; max-width: 1000px; display: grid; grid-template-columns: 1.2fr 1fr; border-radius: 20px; overflow: hidden; }
    .modal-img-part img { width: 100%; max-height: 80vh; object-fit: contain; }
    .modal-text-part { padding: 40px; color: white; text-align: left; }
    .close-btn { position: absolute; top: 20px; right: 20px; color: white; font-size: 2rem; cursor: pointer; }
    @media (max-width: 768px) { .modal-box { grid-template-columns: 1fr; } }
</style>

    <audio id="bgMusic" loop>
        <source src="{{ asset('audio/GONDANG.mp4') }}" type="audio/mpeg">
         Your browser does not support the audio element.
    </audio>

<div class="gallery-wrapper">
    <h1 style="font-family: serif; font-size: 3.5rem;">Explore...</h1>

    <div class="stack-area">
        @foreach($galeriByKategori as $kategori => $items)
            @foreach($items as $item)
                @php
                    // DETEKSI SUMBER GAMBAR
                    // 1. Cek apakah biner (panjang data > 500)
                    if (strlen($item->gambar) > 500) {
                        $src = 'data:image/jpeg;base64,' . base64_encode($item->gambar);
                    } 
                    // 2. Cek apakah itu path file di storage
                    else {
                        $src = asset('storage/' . $item->gambar);
                    }
                @endphp
                
                <div class="card-item" onclick="openPhoto('{{ $src }}', '{{ $item->judul }}', '{{ addslashes($item->deskripsi) }}', '{{ strtoupper($kategori) }}')">
                    <img src="{{ $src }}" onerror="this.src='https://via.placeholder.com/300x500?text=Upload+Ulang+Foto'">
                </div>
                
            @endforeach
        @endforeach
    </div>
</div>

<div id="pModal" class="modal-overlay" onclick="closePhoto()">
    <div class="close-btn">&times;</div>
    <div class="modal-box" onclick="event.stopPropagation()">
        <div class="modal-img-part"><img src="" id="mImg"></div>
        <div class="modal-text-part">
            <small id="mTag" style="color: cyan; letter-spacing: 2px;"></small>
            <h2 id="mTitle" style="font-size: 2rem; margin: 10px 0;"></h2>
            <p id="mDesc" style="color: #bbb; line-height: 1.6;"></p>
        </div>
    </div>
</div>

<script>
    document.body.addEventListener('click', function() {
        var audio = document.getElementById('bgMusic');
        audio.play();
    }, { once: true });

    function openPhoto(src, title, desc, tag) {
        document.getElementById('mImg').src = src;
        document.getElementById('mTitle').innerText = title;
        document.getElementById('mTag').innerText = tag;
        document.getElementById('mDesc').innerText = desc || 'Tidak ada deskripsi.';
        document.getElementById('pModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    function closePhoto() {
        document.getElementById('pModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }
</script>
@endsection