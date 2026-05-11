@extends('layouts.app')

@section('title', 'GeoToba - Gallery')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    /* UI PREMIUM STACKING */
    .gallery-wrapper { padding: 80px 20px; text-align: center; max-width: 1400px; margin: 0 auto; }
    .stack-area { display: flex; flex-wrap: wrap; justify-content: center; gap: 60px 0; padding: 40px 20px; }
    .card-item {
        position: relative;
        width: 180px; 
        height: 300px;
        margin-left: -80px; 
        border-radius: 20px;
        overflow: hidden; 
        background: #333;
        box-shadow: -10px 0 30px rgba(0,0,0,0.15);
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer; 
        z-index: 1; 
        border: 2px solid rgba(255,255,255,0.1);
    }
    .card-item:nth-child(8n+1) { margin-left: 0; }
    .card-item img { width: 100%; height: 100%; object-fit: cover; }
    .card-item:hover {
        z-index: 100 !important; 
        transform: translateY(-25px) scale(1.15) rotate(2deg);
        box-shadow: 0 25px 50px rgba(0,0,0,0.4); 
        margin-right: 40px;
    }

    /* MODAL STYLE */
    .modal-overlay { 
        position: fixed; 
        inset: 0; 
        background: rgba(0,0,0,0.95); 
        z-index: 9999; 
        display: none; 
        align-items: center; 
        justify-content: center; 
        backdrop-filter: blur(10px); 
    }
    .modal-box { 
        background: #1a1a1a; 
        width: 90%; 
        max-width: 1000px; 
        display: grid; 
        grid-template-columns: 1.2fr 1fr; 
        border-radius: 20px; 
        overflow: hidden; 
    }
    .modal-img-part img { width: 100%; max-height: 80vh; object-fit: contain; }
    .modal-text-part { padding: 40px; color: white; text-align: left; }
    .close-btn { 
        position: absolute; 
        top: 20px; 
        right: 20px; 
        color: white; 
        font-size: 2rem; 
        cursor: pointer; 
        transition: all 0.3s ease;
        z-index: 10000;
    }
    .close-btn:hover { color: #c6a43b; transform: rotate(90deg); }
    
    /* Music Control Button */
    .music-control {
        position: fixed;
        bottom: 25px;
        right: 25px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(0, 51, 102, 0.8);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(198, 164, 59, 0.3);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 1000;
        transition: all 0.3s ease;
        font-size: 1.2rem;
    }
    .music-control:hover {
        background: #c6a43b;
        color: #003366;
        transform: scale(1.1);
    }
    
    @media (max-width: 768px) { 
        .modal-box { grid-template-columns: 1fr; }
        .music-control { bottom: 15px; right: 15px; width: 42px; height: 42px; font-size: 1rem; }
    }
</style>

<!-- Audio Background -->
<audio id="bgMusic" loop preload="auto">
    <source src="{{ asset('audio/GONDANG.mp4') }}" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<!-- Music Control Button -->
<div class="music-control" id="musicControl">
    <i class="fas fa-music" id="musicIcon"></i>
</div>

<div class="gallery-wrapper">
    <h1 style="font-family: serif; font-size: 3.5rem;">Explore...</h1>

    <div class="stack-area">
        @foreach($galeriByKategori as $kategori => $items)
            @foreach($items as $item)
                @php
                    // DETEKSI SUMBER GAMBAR
                    if (strlen($item->gambar) > 500) {
                        $src = 'data:image/jpeg;base64,' . base64_encode($item->gambar);
                    } else {
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
            <small id="mTag" style="color: #c6a43b; letter-spacing: 2px;"></small>
            <h2 id="mTitle" style="font-size: 2rem; margin: 10px 0;"></h2>
            <p id="mDesc" style="color: #bbb; line-height: 1.6;"></p>
        </div>
    </div>
</div>

<script>
    // ========== AUDIO CONTROL ==========
    const audio = document.getElementById('bgMusic');
    const musicControl = document.getElementById('musicControl');
    const musicIcon = document.getElementById('musicIcon');
    let isPlaying = false;
    
    // Fungsi untuk memutar audio
    function playAudio() {
        audio.play().then(() => {
            isPlaying = true;
            musicIcon.className = 'fas fa-music';
        }).catch(error => {
            console.log('Audio play error:', error);
            isPlaying = false;
            musicIcon.className = 'fas fa-volume-mute';
        });
    }
    
    // Fungsi pause audio
    function pauseAudio() {
        audio.pause();
        isPlaying = false;
        musicIcon.className = 'fas fa-volume-mute';
    }
    
    // ========== MEMASANG EVENT LISTENER UNTUK AUTO PLAY ==========
    let audioStarted = false;
    
    function startAudioOnFirstInteraction() {
        if (!audioStarted) {
            playAudio();
            audioStarted = true;
            document.removeEventListener('click', startAudioOnFirstInteraction);
            document.removeEventListener('touchstart', startAudioOnFirstInteraction);
        }
    }
    
    // Pasang listener untuk memulai audio pada interaksi pertama user
    document.addEventListener('click', startAudioOnFirstInteraction);
    document.addEventListener('touchstart', startAudioOnFirstInteraction);
    
    // ========== MODAL FUNCTIONS (MUSIK HIDUP SAAT BUKA MODAL) ==========
    function openPhoto(src, title, desc, tag) {
        // HIDUPKAN MUSIK saat modal DIBUKA
        if (!audioStarted) {
            audioStarted = true;
        }
        playAudio();
        
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
        
        // MATIKAN MUSIK saat modal DITUTUP
        pauseAudio();
    }
    
    // Tombol kontrol musik manual
    musicControl.addEventListener('click', function(e) {
        e.stopPropagation();
        if (isPlaying) {
            pauseAudio();
        } else {
            if (!audioStarted) {
                audioStarted = true;
            }
            playAudio();
        }
    });
    
    // ========== KEYBOARD CONTROL ==========
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePhoto();
        }
        // Spasi untuk play/pause musik
        if (e.key === ' ' || e.key === 'Space') {
            e.preventDefault();
            if (isPlaying) {
                pauseAudio();
            } else {
                if (!audioStarted) {
                    audioStarted = true;
                }
                playAudio();
            }
        }
    });
    
    // Pastikan audio siap
    audio.load();
</script>
@endsection