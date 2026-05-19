@extends('layouts.app')

@section('title', 'Meat - Geosite Danau Toba')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Cormorant+Garamond:wght@400;500;600;700&display=swap');

    /* Hero Section */
    .hero {
        height: 60vh;
        min-height: 450px;
        background: linear-gradient(135deg, rgba(0,51,102,0.7), rgba(0,51,102,0.5)), url('{{ asset("image/meat/meat-hero.jpg") }}');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
        position: relative;
    }
    
    .hero::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #c6a43b, #e8c45a, #c6a43b);
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        font-family: 'Cormorant Garamond', serif;
        margin-bottom: 15px;
        text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
    }
    
    .hero-subtitle {
        font-size: 0.85rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        opacity: 0.9;
    }
    
    .hero-badge {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 5px 15px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 600;
        margin-bottom: 20px;
    }
    
    /* Section */
    .section {
        padding: 70px 0;
    }
    
    .section-light {
        background: #f8fafc;
    }
    
    .container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }
    
    .section-header .badge {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.65rem;
        font-weight: 600;
        margin-bottom: 15px;
    }
    
    .section-header h2 {
        font-size: 2rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 10px;
        font-family: 'Cormorant Garamond', serif;
    }
    
    .divider {
        width: 50px;
        height: 2px;
        background: #c6a43b;
        margin: 15px auto 0;
    }
    
    .section-header p {
        color: #2c5f8a;
        max-width: 700px;
        margin: 15px auto 0;
        font-size: 0.9rem;
        line-height: 1.6;
    }
    
    /* Info Cards */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 50px;
    }
    
    .info-card {
        background: white;
        border-left: 4px solid #c6a43b;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .info-card i {
        font-size: 1.5rem;
        color: #c6a43b;
        margin-bottom: 10px;
    }
    
    .info-card h4 {
        font-size: 0.9rem;
        font-weight: 700;
        margin-bottom: 5px;
        color: #003366;
    }
    
    .info-card p {
        font-size: 0.8rem;
        color: #666;
    }
    
    /* Sejarah Grid */
    .sejarah-grid {
        display: flex;
        flex-direction: column;
        gap: 60px;
    }
    
    .sejarah-item {
        display: flex;
        gap: 50px;
        flex-wrap: wrap;
        align-items: center;
    }
    
    .sejarah-item.reverse {
        flex-direction: row-reverse;
    }
    
    .sejarah-image {
        flex: 1;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .sejarah-image img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    
    .sejarah-image:hover img {
        transform: scale(1.03);
    }
    
    .sejarah-text {
        flex: 1;
    }
    
    .sejarah-text h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 15px;
        font-family: 'Cormorant Garamond', serif;
    }
    
    .sejarah-text p {
        color: #444;
        line-height: 1.8;
        font-size: 0.95rem;
        margin-bottom: 15px;
    }
    
    /* Activity Cards */
    .activity-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }
    
    .activity-card {
        background: white;
        border-radius: 16px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }
    
    .activity-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.12);
    }
    
    .activity-card i {
        font-size: 2rem;
        color: #c6a43b;
        margin-bottom: 15px;
    }
    
    .activity-card h4 {
        font-size: 1rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 10px;
    }
    
    .activity-card p {
        font-size: 0.8rem;
        color: #666;
        line-height: 1.6;
    }
    
    /* Kuliner Box */
    .kuliner-box {
        background: linear-gradient(135deg, #f8fafc, #eef2f8);
        border-radius: 20px;
        padding: 30px;
        margin-top: 30px;
    }
    
    /* Maps */
    .maps-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }
    
    .maps-container iframe {
        width: 100%;
        height: 400px;
        border: 0;
    }
    
    .rute-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    
    .rute-item {
        background: white;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .rute-item h4 {
        font-size: 1rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 8px;
    }
    
    .rute-item p {
        font-size: 0.85rem;
        color: #666;
        line-height: 1.6;
        margin-bottom: 10px;
    }
    
    .rute-time {
        display: inline-block;
        background: #c6a43b20;
        color: #c6a43b;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
    }
    
    /* CTA */
    .cta {
        background: linear-gradient(135deg, #003366, #0a2a4a);
        padding: 60px 0;
        text-align: center;
        color: white;
    }
    
    .cta h3 {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 15px;
        font-family: 'Cormorant Garamond', serif;
    }
    
    .cta .divider {
        margin: 0 auto 20px;
    }
    
    .cta p {
        opacity: 0.8;
        max-width: 600px;
        margin: 0 auto 25px;
    }
    
    .cta-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .cta-btn {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 12px 30px;
        border-radius: 40px;
        font-size: 0.75rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .cta-btn:hover {
        background: white;
        transform: translateY(-3px);
    }
    
    .cta-btn-outline {
        background: transparent;
        border: 1px solid #c6a43b;
        color: white;
    }
    
    .cta-btn-outline:hover {
        background: #c6a43b;
        color: #003366;
    }
    
    /* Responsive */
    @media (max-width: 992px) {
        .hero-title { font-size: 2.5rem; }
        .activity-grid { grid-template-columns: repeat(2, 1fr); }
        .rute-grid { grid-template-columns: 1fr; }
    }
    
    @media (max-width: 768px) {
        .hero { min-height: 350px; }
        .hero-title { font-size: 1.8rem; }
        .section { padding: 50px 0; }
        .section-header h2 { font-size: 1.5rem; }
        .sejarah-item, .sejarah-item.reverse { flex-direction: column; text-align: center; }
        .sejarah-image img { height: 220px; }
        .activity-grid { grid-template-columns: 1fr; }
        .info-grid { grid-template-columns: 1fr; }
        .maps-container iframe { height: 250px; }
        .cta-buttons { flex-direction: column; align-items: center; }
        .cta-btn { width: 80%; text-align: center; }
    }
</style>

<!-- HERO -->
<section class="hero">
    <div>
        <div class="hero-badge">UNESCO Global Geopark</div>
        <h1 class="hero-title">MEAT</h1>
        <p class="hero-subtitle">Balige · Danau Toba · "New Zealand van Toba"</p>
    </div>
</section>

<!-- SEJARAH -->
<section id="sejarah" class="section">
    <div class="container">
        <div class="section-header">
            <span class="badge">Warisan Budaya</span>
            <h2>Desa Meat<br><em>"New Zealand van Toba"</em></h2>
            <div class="divider"></div>
            <p>Desa Meat merupakan permata tersembunyi di tepi Danau Toba, dengan hamparan sawah hijau terasering yang membentang hingga ke pinggir danau.</p>
        </div>

        <div class="info-grid">
            <div class="info-card">
                <i class="fas fa-users"></i>
                <h4>Penduduk</h4>
                <p>Lebih dari 900 jiwa, mayoritas Suku Batak Toba</p>
            </div>
            <div class="info-card">
                <i class="fas fa-plane"></i>
                <h4>Akses Bandara</h4>
                <p>±40 menit dari Bandara Silangit</p>
            </div>
            <div class="info-card">
                <i class="fas fa-car"></i>
                <h4>Jarak dari Balige</h4>
                <p>20–30 menit berkendara</p>
            </div>
            <div class="info-card">
                <i class="fas fa-star"></i>
                <h4>Status Wisata</h4>
                <p>1 dari 21 destinasi wisata utama Kabupaten Toba</p>
            </div>
        </div>

        <div class="sejarah-grid">
            <div class="sejarah-item">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/meat-detail.jpg') }}" alt="Panorama Desa Meat">
                </div>
                <div class="sejarah-text">
                    <h3>🏞️ Amfiteater Alam yang Memukau</h3>
                    <p>Desa Meat berada di posisi sangat rendah — tepat di bibir Danau Toba — dikelilingi perbukitan hijau yang menjulang di sisi belakangnya. Formasi ini menciptakan kesan seperti sebuah amfiteater alam raksasa. Memandang ke sebelah kiri, pengunjung akan melihat hamparan sawah terasering yang tersusun rapi mengikuti kontur bukit, mirip dengan pemandangan di Bali. Memandang ke sebelah kanan, keindahan biru Danau Toba terbentang luas.</p>
                    <p>Gradasi warna hijaunya perbukitan, kuning keemasan hamparan sawah, dan birunya air danau yang tenang menjadikan Desa Meat sebagai salah satu spot foto terbaik di Kabupaten Toba.</p>
                </div>
            </div>

            <div class="sejarah-item reverse">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/slide1.jpg') }}" alt="Tenun Ulos">
                </div>
                <div class="sejarah-text">
                    <h3>🪡 Sentra Tenun Ulos yang Autentik</h3>
                    <p>Desa Meat dikenal sebagai salah satu sentra pengrajin Ulos Batak terbaik di kawasan Danau Toba. Sebagian besar perempuan desa adalah penenun yang mewarisi keahlian ini secara turun-temurun. Wisatawan dapat menyaksikan langsung para Inang (ibu-ibu) yang menenun kain Ulos secara tradisional menggunakan alat tenun kayu (gedokan).</p>
                    <p>Karena dikerjakan seluruhnya secara tradisional, satu lembar kain Ulos membutuhkan waktu pembuatan sekitar satu minggu penuh. Salah satu jenis Ulos paling sakral yang diproduksi di Desa Meat adalah Ulos Ragi Hotang.</p>
                </div>
            </div>

            <div class="sejarah-item">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/meat-hero.jpg') }}" alt="Rumah Adat Batak">
                </div>
                <div class="sejarah-text">
                    <h3>🏠 Arsitektur Jabu Bolon yang Terjaga</h3>
                    <p>Di Desa Meat terdapat 4 unit rumah adat Batak Toba yang dikenal dengan nama Jabu Bolon (Ruma Bolon). Keempat rumah adat ini telah direnovasi oleh Kementerian Pariwisata untuk keperluan wisata budaya, namun tetap berfungsi sebagai hunian aktif.</p>
                    <p>Selain menjadi objek wisata budaya, Desa Meat juga merupakan salah satu desa adat tertua di kawasan Toba, menambah nilai sebagai bagian dari Geopark Kaldera Toba.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- AKTIVITAS -->
<section class="section section-light">
    <div class="container">
        <div class="section-header">
            <span class="badge">Aktivitas</span>
            <h2>Camping & Festival</h2>
            <div class="divider"></div>
            <p>Surga bagi pecinta alam dan petualangan</p>
        </div>

        <div class="activity-grid">
            <div class="activity-card">
                <i class="fas fa-campground"></i>
                <h4>Camping Ground Tepi Danau</h4>
                <p>Pinggiran danau yang landai dan berumput menjadikan Desa Meat sebagai lokasi berkemah impian. Area camping telah dikelola dengan baik dan mampu menampung lebih dari 1.000 unit tenda.</p>
            </div>
            <div class="activity-card">
                <i class="fas fa-calendar-alt"></i>
                <h4>Festival 1.000 Tenda</h4>
                <p>Desa Meat menjadi tuan rumah Festival 1.000 Tenda, acara tahunan populer yang menggabungkan kegiatan berkemah massal, pertunjukan seni budaya Batak.</p>
            </div>
            <div class="activity-card">
                <i class="fas fa-camera"></i>
                <h4>Spot Foto Bird's Eye View</h4>
                <p>Jalanan aspal yang membelah persawahan menuju desa menjadi jalur favorit fotografer, memberikan view point terbaik melihat keseluruhan desa.</p>
            </div>
        </div>

        <div class="kuliner-box">
            <h3 style="color: #003366; margin-bottom: 15px;">🍽️ Kuliner & Penginapan Tradisional</h3>
            <p style="color: #444; line-height: 1.8;">Wisatawan dapat mencicipi berbagai makanan khas Batak yang disuguhkan di warung-warung tradisional yang nyaman. Desa Meat sudah memiliki homestay dengan nuansa rumah tradisional Batak, memberikan pengalaman menginap yang autentik di tepi Danau Toba.</p>
        </div>
    </div>
</section>

<!-- LOKASI -->
<section id="lokasi" class="section">
    <div class="container">
        <div class="section-header">
            <span class="badge">Lokasi</span>
            <h2>Cara Mencapai Desa Meat</h2>
            <div class="divider"></div>
            <p>Desa Meat terletak di Kecamatan Tampahan, Kabupaten Toba, Sumatera Utara</p>
        </div>

        <div class="maps-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0!2d99.0835095!3d2.3339262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0415b8f7da39%3A0xc6beb74287f355a5!2sBalige%2C%20Toba%20Samosir%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                allowfullscreen loading="lazy">
            </iframe>
        </div>

        <div class="rute-grid">
            <div class="rute-item">
                <h4>🚗 Dari Kota Balige</h4>
                <p>Berkendara dari pusat Kota Balige menuju Kecamatan Tampahan melalui jalan yang berkelok menuruni perbukitan. Sepanjang jalan menawarkan bird's eye view Danau Toba yang spektakuler.</p>
                <span class="rute-time">⏱️ ±20–30 menit</span>
            </div>
            <div class="rute-item">
                <h4>✈️ Dari Bandara Silangit</h4>
                <p>Bandara Sisingamangaraja XII (Silangit) di Siborongborong adalah pintu masuk utama ke kawasan Danau Toba. Dari sini, lanjutkan perjalanan darat menuju Desa Meat.</p>
                <span class="rute-time">⏱️ ±40 menit</span>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container">
        <h3>Kunjungi Desa Meat</h3>
        <div class="divider"></div>
        <p>Rasakan pengalaman wisata budaya Batak yang autentik — alam, tradisi, dan keramahan dalam satu destinasi</p>
        <div class="cta-buttons">
            <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
            <a href="#sejarah" class="cta-btn cta-btn-outline">Sejarah</a>
            <a href="#lokasi" class="cta-btn cta-btn-outline">Lokasi</a>
        </div>
    </div>
</section>

<!-- AOS Animation -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({ duration: 600, once: true, offset: 50 });
</script>

@endsection