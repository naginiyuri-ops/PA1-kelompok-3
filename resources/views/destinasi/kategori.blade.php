@extends('layouts.app')

@section('title', 'Destinasi ' . ucfirst($kategori) . ' - Geosite Danau Toba')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Cormorant+Garamond:wght@400;500;600;700&display=swap');
    
    .kategori-hero {
        height: 40vh;
        min-height: 350px;
        background: linear-gradient(135deg, rgba(0,51,102,0.8), rgba(0,51,102,0.6));
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
    }
    
    .kategori-hero h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        font-family: 'Cormorant Garamond', serif;
        text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
    }
    
    .kategori-hero p {
        font-size: 0.9rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        opacity: 0.9;
    }
    
    .destinasi-section {
        padding: 60px 0;
        background: #f8f9fa;
    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .destinasi-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }
    
    .dest-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        text-decoration: none;
        display: block;
    }
    
    .dest-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }
    
    .card-image {
        height: 220px;
        overflow: hidden;
        position: relative;
    }
    
    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    
    .dest-card:hover .card-image img {
        transform: scale(1.08);
    }
    
    .card-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        background: #c6a43b;
        color: #003366;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 700;
        z-index: 2;
    }
    
    .card-content {
        padding: 20px;
    }
    
    .card-title {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 8px;
        color: #003366;
        font-family: 'Cormorant Garamond', serif;
    }
    
    .card-location {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 0.7rem;
        color: #c6a43b;
        margin-bottom: 12px;
    }
    
    .card-location i {
        font-size: 0.6rem;
    }
    
    .card-desc {
        font-size: 0.85rem;
        color: #666;
        line-height: 1.6;
        margin-bottom: 15px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .card-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    
    .card-tags span {
        background: #f0f4f0;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        color: #003366;
    }
    
    .back-button {
        text-align: center;
        margin-top: 50px;
    }
    
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #003366;
        color: white;
        padding: 12px 30px;
        border-radius: 50px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-back:hover {
        background: #c6a43b;
        color: #003366;
        transform: translateX(-5px);
    }
    
    @media (max-width: 992px) {
        .destinasi-grid { grid-template-columns: repeat(2, 1fr); gap: 25px; }
    }
    
    @media (max-width: 768px) {
        .kategori-hero { min-height: 280px; }
        .kategori-hero h1 { font-size: 1.8rem; }
        .destinasi-section { padding: 40px 0; }
        .destinasi-grid { grid-template-columns: 1fr; gap: 20px; }
        .card-image { height: 200px; }
    }
</style>

@php
    // ==================== DATA DESTINASI ====================
    $dataDestinasi = [
        'alam' => [
            'judul' => 'Destinasi Alam',
            'deskripsi' => 'Destinasi wisata alam yang menampilkan keindahan geologi, pegunungan, dan keunikan alam Danau Toba.',
            'foto1' => 'image/destinasi/alam1.jpg',
            'foto2' => 'image/destinasi/alam2.jpg',
            'foto3' => 'image/destinasi/alam3.jpg',
            'items' => [
                [
                    'slug' => 'desa-wisata-meat',
                    'nama' => 'Desa Wisata Meat',
                    'lokasi' => 'Kec. Tampahan, Kab. Toba Samosir',
                    'deskripsi' => 'Dikenal sebagai "New Zealand-nya Toba" dengan hamparan sawah hijau terasering yang membentang hingga ke pinggir Danau Toba.',
                    'tags' => ['Sawah Terasering', 'Panorama', 'Spot Foto', 'New Zealand']
                ],
                [
                    'slug' => 'geosite-batu-basiha',
                    'nama' => 'Geosite Batu Basiha',
                    'lokasi' => 'Desa Aek Bolon, Balige',
                    'deskripsi' => 'Tumpukan batu-batu balok raksasa sisa letusan dahsyat Gunung Toba 74.000 tahun lalu.',
                    'tags' => ['Batu Raksasa', 'Geologi', 'Sunrise', 'Sunset']
                ],
                [
                    'slug' => 'liang-sipege',
                    'nama' => 'Liang Sipege',
                    'lokasi' => 'Kawasan Balige',
                    'deskripsi' => 'Goa alami dengan stalaktit dan stalakmit yang terbentuk secara alami, menyimpan nilai sejarah dan geologi.',
                    'tags' => ['Goa Alami', 'Sejarah', 'Geowisata', 'Edukasi']
                ]
            ]
        ],
        'budaya' => [
            'judul' => 'Destinasi Budaya',
            'deskripsi' => 'Destinasi wisata budaya yang menampilkan kearifan lokal, adat istiadat, dan warisan leluhur Batak Toba yang masih lestari.',
            'foto1' => 'image/destinasi/budaya1.jpg',
            'foto2' => 'image/destinasi/budaya2.jpg',
            'foto3' => 'image/destinasi/budaya3.jpg',
            'items' => [
                [
                    'slug' => 'sentra-tenun-ulos',
                    'nama' => 'Sentra Tenun Ulos',
                    'lokasi' => 'Desa Meat, Kec. Tampahan',
                    'deskripsi' => 'Wisatawan dapat melihat langsung proses martonun (menenun) ulos yang dikerjakan oleh kaum wanita setempat.',
                    'tags' => ['Tenun Ulos', 'Kerajinan Tangan', 'Budaya Batak', 'Oleh-oleh']
                ],
                [
                    'slug' => 'rumah-adat-batak',
                    'nama' => 'Rumah Adat Batak',
                    'lokasi' => 'Desa Meat, Kec. Tampahan',
                    'deskripsi' => 'Rumah tradisional Batak Toba yang khas dengan arsitektur dan ornamen penuh makna filosofis.',
                    'tags' => ['Rumah Adat', 'Arsitektur', 'Budaya Batak', 'Sejarah']
                ],
                [
                    'slug' => 'sigale-gale',
                    'nama' => 'Patung Sigale-gale',
                    'lokasi' => 'Tomok, Pulau Samosir',
                    'deskripsi' => 'Patung kayu khas Batak yang dapat menari, simbol ritual kematian dan penghormatan leluhur.',
                    'tags' => ['Sigale-gale', 'Budaya Batak', 'Tari Tradisional', 'Sejarah']
                ]
            ]
        ],
        'buatan' => [
            'judul' => 'Destinasi Buatan',
            'deskripsi' => 'Fasilitas wisata yang dikembangkan untuk mendukung kenyamanan wisatawan di kawasan Danau Toba.',
            'foto1' => 'image/destinasi/buatan1.jpg',
            'foto2' => 'image/destinasi/buatan2.jpg',
            'foto3' => 'image/destinasi/buatan3.jpg',
            'items' => [
                [
                    'slug' => 'spot-pantai-meat',
                    'nama' => 'Spot Pantai Meat',
                    'lokasi' => 'Desa Meat, Kec. Tampahan',
                    'deskripsi' => 'Area pinggir Danau Toba yang ditata untuk bersantai menikmati pemandangan danau dan perbukitan.',
                    'tags' => ['Pantai', 'Santai', 'Keluarga', 'Spot Foto']
                ],
                [
                    'slug' => 'homestay-meat',
                    'nama' => 'Homestay Meat',
                    'lokasi' => 'Desa Meat, Kec. Tampahan',
                    'deskripsi' => 'Penginapan berbasis budaya yang dikelola warga setempat dengan pemandangan sawah dan Danau Toba.',
                    'tags' => ['Homestay', 'Budaya', 'Penginapan', 'Ramah']
                ],
                [
                    'slug' => 'jalur-trekking-sawah',
                    'nama' => 'Jalur Trekking Sawah',
                    'lokasi' => 'Desa Meat, Kec. Tampahan',
                    'deskripsi' => 'Jalur setapak di tengah persawahan terasering dengan pemandangan spektakuler Danau Toba.',
                    'tags' => ['Trekking', 'Sawah Terasering', 'Panorama', 'Olahraga']
                ]
            ]
        ]
    ];
    
    // Ambil data berdasarkan kategori
    $data = $dataDestinasi[$kategori] ?? $dataDestinasi['alam'];
    $bgImage = asset($data['foto1']);
    
    // Siapkan destinasi dengan foto (foto 1,2,3)
    $destinasi = [];
    foreach ($data['items'] as $index => $item) {
        $noFoto = $index + 1;
        $destinasi[] = (object)[
            'id' => $index + 1,
            'slug' => $item['slug'],
            'kategori' => $kategori,
            'nama' => $item['nama'],
            'lokasi' => $item['lokasi'],
            'deskripsi' => $item['deskripsi'],
            'gambar' => 'image/destinasi/' . $kategori . $noFoto . '.jpg',
            'gambar_hero' => 'image/destinasi/' . $kategori . $noFoto . '.jpg',
            'galeri' => [
                'image/destinasi/' . $kategori . '1.jpg',
                'image/destinasi/' . $kategori . '2.jpg',
                'image/destinasi/' . $kategori . '3.jpg'
            ],
            'tags' => $item['tags'],
            'deskripsi_lengkap' => $item['deskripsi'] . ' Kunjungi dan nikmati keindahan ' . $item['nama'] . ' di Danau Toba. Destinasi ini menawarkan pengalaman wisata yang tak terlupakan bagi Anda dan keluarga.',
            'jam_operasional' => $kategori == 'alam' ? '06:00 - 18:00 WIB' : ($kategori == 'budaya' ? '08:00 - 17:00 WIB' : '09:00 - 21:00 WIB'),
            'harga_tiket' => $kategori == 'alam' ? 'Rp 10.000 - Rp 25.000' : ($kategori == 'budaya' ? 'Rp 15.000 - Rp 30.000' : 'Rp 5.000 - Rp 20.000')
        ];
    }
@endphp

<section class="kategori-hero" style="background-image: linear-gradient(135deg, rgba(0,51,102,0.8), rgba(0,51,102,0.6)), url('{{ $bgImage }}');">
    <div data-aos="fade-up">
        <h1>{{ $data['judul'] }}</h1>
        <p>{{ $data['deskripsi'] }}</p>
    </div>
</section>

<section class="destinasi-section">
    <div class="container">
        <div class="destinasi-grid">
            @foreach($destinasi as $index => $item)
            <a href="{{ url('/destinasi/' . $kategori . '/' . $item->slug) }}" class="dest-card" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                <div class="card-image">
                    <img src="{{ asset($item->gambar) }}" alt="{{ $item->nama }}" loading="lazy" onerror="this.src='https://via.placeholder.com/400x300?text=No+Image'">
                    <div class="card-badge">{{ strtoupper($kategori) }}</div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">{{ $item->nama }}</h3>
                    <div class="card-location">
                        <i class="fas fa-map-marker-alt"></i> {{ $item->lokasi }}
                    </div>
                    <p class="card-desc">{{ Str::limit($item->deskripsi, 100) }}</p>
                    <div class="card-tags">
                        @foreach(array_slice($item->tags, 0, 3) as $tag)
                        <span>#{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        
        <div class="back-button">
            <a href="{{ url('/destinasi') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Semua Destinasi
            </a>
        </div>
    </div>
</section>

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true, offset: 50 });
</script>

@endsection 