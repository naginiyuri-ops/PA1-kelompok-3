@extends('layouts.app')

@section('title', 'Galeri - Geosite Danau Toba')

@section('content')

<style>
    :root {
        --blue-dark: #003366;
        --gold: #c6a43b;
        --bg-light: #e8f0f7;
    }

    .section-stack {
        min-height: 100vh;
        background: var(--bg-light);
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 100px 20px;
        overflow: hidden;
    }

    /* TABS */
    .galeri-tabs {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 60px;
        flex-wrap: wrap;
        z-index: 100;
    }

    .tab-btn {
        background: white;
        border: 2px solid var(--blue-dark);
        padding: 10px 25px;
        border-radius: 40px;
        cursor: pointer;
        font-weight: 600;
        color: var(--blue-dark);
        transition: 0.3s;
    }

    .tab-btn.active {
        background: var(--blue-dark);
        color: white;
    }

    /* STACK CONTAINER */
    .stack-container {
        position: relative;
        width: 350px;
        height: 450px;
        perspective: 1000px;
    }

    .card {
        position: absolute;
        width: 100%;
        height: 100%;
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        display: flex;
        flex-direction: column;
        padding: 15px;
        transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1), opacity 0.6s;
        cursor: pointer;
        user-select: none;
    }

    .card img {
        width: 100%;
        height: 80%;
        object-fit: cover;
        border-radius: 12px;
        pointer-events: none;
    }

    .card-info {
        padding-top: 15px;
        text-align: center;
    }

    .card-info h3 {
        font-size: 1.2rem;
        color: var(--blue-dark);
        margin: 0;
    }

    /* Animasi Keluar (Swap) */
    .card.swap {
        transform: translate(150%, -50px) rotate(20deg) !important;
        opacity: 0;
    }

    .hint {
        margin-top: 40px;
        color: var(--blue-dark);
        font-size: 0.9rem;
        opacity: 0.7;
    }
</style>

<div class="section-stack">
    <h1 style="margin-bottom: 30px; color: var(--blue-dark); font-family: serif;">Koleksi Geosite</h1>

    <div class="galeri-tabs">
        <button class="tab-btn active" data-tab="Meat">Meat</button>
        <button class="tab-btn" data-tab="Batu Bahisan">Batu Bahisan</button>
        <button class="tab-btn" data-tab="Liang Sipege">Liang Sipege</button>
    </div>

    <div class="stack-container" id="stackContainer">
        </div>

    <p class="hint">Klik kartu untuk melihat foto berikutnya</p>
</div>

<script>
    // Data dari Laravel (Tetap pakai logika Base64 kamu)
    const galeriData = {
        'Meat': @json($galeriByKategori['meat']->map(function($item) {
            return [
                'src' => 'data:image/jpeg;base64,' . base64_encode($item->gambar),
                'caption' => $item->judul
            ];
        })),
        'Batu Bahisan': @json($galeriByKategori['batu-bahisan']->map(function($item) {
            return [
                'src' => 'data:image/jpeg;base64,' . base64_encode($item->gambar),
                'caption' => $item->judul
            ];
        })),
        'Liang Sipege': @json($galeriByKategori['liang-sipege']->map(function($item) {
            return [
                'src' => 'data:image/jpeg;base64,' . base64_encode($item->gambar),
                'caption' => $item->judul
            ];
        }))
    };

    function renderStack(tab) {
        const container = document.getElementById('stackContainer');
        const photos = galeriData[tab] || [];
        container.innerHTML = '';

        if (photos.length === 0) {
            container.innerHTML = '<p style="text-align:center; padding-top:100px;">Tidak ada foto.</p>';
            return;
        }

        // Render terbalik supaya foto pertama ada di paling atas (z-index tertinggi)
        photos.forEach((photo, index) => {
            const card = document.createElement('div');
            card.className = 'card';
            
            // Mengatur posisi tumpukan (sedikit miring/geser agar terlihat menumpuk)
            const waitTime = index * 0.1;
            const tilt = (index % 2 === 0 ? 1 : -1) * (index * 2);
            const translateY = index * -8;
            const scale = 1 - (index * 0.04);
            
            card.style.zIndex = photos.length - index;
            card.style.transform = `translateY(${translateY}px) scale(${scale}) rotate(${tilt}deg)`;
            
            card.innerHTML = `
                <img src="${photo.src}" alt="${photo.caption}">
                <div class="card-info">
                    <h3>${photo.caption}</h3>
                </div>
            `;

            // Event klik untuk ganti kartu
            card.onclick = function() {
                moveCard(this);
            };

            container.appendChild(card);
        });
    }

    function moveCard(card) {
        const container = document.getElementById('stackContainer');
        
        // Tambahkan class animasi swap (geser ke samping)
        card.classList.add('swap');

        // Tunggu animasi selesai, lalu pindahkan kartu ke paling belakang
        setTimeout(() => {
            card.classList.remove('swap');
            
            // Turunkan z-index kartu yang baru dipindah
            const cards = container.querySelectorAll('.card');
            let minZ = 999;
            cards.forEach(c => {
                const z = parseInt(c.style.zIndex);
                if (z < minZ) minZ = z;
            });
            
            card.style.zIndex = minZ - 1;
            
            // Atur ulang posisi visual tumpukan untuk semua kartu
            rearrangeStack();
            
            // Pindahkan elemen ke paling awal di DOM agar urutan z-index visual sinkron
            container.prepend(card);
        }, 600);
    }

    function rearrangeStack() {
        const container = document.getElementById('stackContainer');
        // Ambil kartu dan urutkan berdasarkan z-index (tertinggi di depan)
        const cards = Array.from(container.querySelectorAll('.card'))
                           .sort((a, b) => b.style.zIndex - a.style.zIndex);

        cards.forEach((card, index) => {
            const tilt = (index % 2 === 0 ? 1 : -1) * (index * 2);
            const translateY = index * -8;
            const scale = 1 - (index * 0.04);
            
            card.style.transform = `translateY(${translateY}px) scale(${scale}) rotate(${tilt}deg)`;
            card.style.opacity = index > 4 ? 0 : 1; // Sembunyikan kartu jika terlalu dalam
        });
    }

    // Tab Logic
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            renderStack(this.dataset.tab);
        });
    });

    // Inisialisasi awal
    renderStack('Meat');
</script>

@endsection