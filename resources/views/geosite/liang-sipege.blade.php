@extends('layouts.app')

@section('title', 'Liang Sipege - Geosite Danau Toba')

@section('content')

<style>
    /* ==================== FONTS & VARIABLES ==================== */
    @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&family=Playfair+Display:wght@400;500;600;700;800&display=swap');
    
    :root {
        --primary: #0a2a4a;
        --primary-light: #1a4a7a;
        --primary-dark: #003366;
        --gold: #c6a43b;
        --gold-light: #e8c45a;
        --gold-dark: #a8882e;
        --text-dark: #1e293b;
        --text-gray: #475569;
        --text-light: #64748b;
        --white: #ffffff;
        --bg-light: #f8fafc;
        --bg-gray: #f1f5f9;
        --shadow-sm: 0 1px 3px rgba(0,0,0,0.05);
        --shadow-md: 0 4px 12px rgba(0,0,0,0.08);
        --shadow-lg: 0 10px 25px rgba(0,0,0,0.1);
        --shadow-xl: 0 20px 40px rgba(0,0,0,0.15);
    }
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: 'Inter', sans-serif;
        color: var(--text-dark);
    }
    
    /* ==================== ANIMATIONS ==================== */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes fadeInLeft {
        from { opacity: 0; transform: translateX(-40px); }
        to { opacity: 1; transform: translateX(0); }
    }
    
    @keyframes fadeInRight {
        from { opacity: 0; transform: translateX(40px); }
        to { opacity: 1; transform: translateX(0); }
    }
    
    @keyframes zoomIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    
    /* ==================== HERO SECTION ==================== */
    .hero-liang {
        height: 85vh;
        min-height: 600px;
        position: relative;
        overflow: hidden;
        margin-top: 0;
    }
    
    .hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0,51,102,0.5) 0%, rgba(0,0,0,0.4) 100%), url('{{ asset("image/meat/liang-sipege-hero.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    
    .hero-content {
        position: absolute;
        bottom: 20%;
        left: 0;
        right: 0;
        text-align: center;
        z-index: 10;
        color: white;
        padding: 0 20px;
    }
    
    .hero-badge {
        display: inline-block;
        background: var(--gold);
        color: var(--primary-dark);
        padding: 6px 20px;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        margin-bottom: 20px;
        animation: fadeInUp 0.8s ease;
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        font-family: 'Playfair Display', serif;
        margin-bottom: 15px;
        text-shadow: 0 2px 15px rgba(0,0,0,0.3);
        animation: fadeInUp 0.8s ease 0.1s both;
        letter-spacing: 2px;
    }
    
    .hero-subtitle {
        font-size: 0.85rem;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        opacity: 0.9;
        animation: fadeInUp 0.8s ease 0.2s both;
    }
    
    .hero-divider {
        width: 60px;
        height: 2px;
        background: var(--gold);
        margin: 25px auto;
        animation: fadeInUp 0.8s ease 0.3s both;
    }
    
    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 15;
        animation: bounce 2s infinite;
        cursor: pointer;
        color: white;
        font-size: 0.65rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        opacity: 0.7;
    }
    
    .scroll-indicator .line {
        width: 1px;
        height: 35px;
        background: white;
        transition: height 0.3s ease;
    }
    
    .scroll-indicator:hover .line {
        height: 50px;
        background: var(--gold);
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateX(-50%) translateY(0); opacity: 0.7; }
        50% { transform: translateX(-50%) translateY(-8px); opacity: 0.3; }
    }
    
    /* ==================== SECTION STYLES ==================== */
    .section {
        padding: 80px 0;
    }
    
    .section-white {
        background: var(--bg-light);
    }
    
    .section-light {
        background: var(--bg-gray);
    }
    
    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 55px;
    }
    
    .section-header .badge {
        display: inline-block;
        background: rgba(198, 164, 59, 0.12);
        color: var(--gold-dark);
        padding: 5px 16px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 15px;
    }
    
    .section-header h2 {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--primary-dark);
        font-family: 'Playfair Display', serif;
        margin-bottom: 15px;
    }
    
    .divider {
        width: 60px;
        height: 2px;
        background: var(--gold);
        margin: 0 auto 20px;
        border-radius: 2px;
        transition: width 0.4s ease;
    }
    
    .section-header:hover .divider {
        width: 100px;
    }
    
    .section-header p {
        color: var(--text-light);
        font-size: 0.9rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.7;
    }
    
    /* ==================== SEJARAH (TANPA KOTAK, HALUS) ==================== */
    .sejarah-grid {
        display: flex;
        flex-direction: column;
        gap: 60px;
    }
    
    .sejarah-item {
        display: flex;
        align-items: center;
        gap: 60px;
        flex-wrap: wrap;
    }
    
    .sejarah-item.reverse {
        flex-direction: row-reverse;
    }
    
    .sejarah-image {
        flex: 1;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: all 0.4s ease;
    }
    
    .sejarah-image:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }
    
    .sejarah-image img {
        width: 100%;
        height: 340px;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    
    .sejarah-image:hover img {
        transform: scale(1.03);
    }
    
    .sejarah-text {
        flex: 1;
    }
    
    .sejarah-text h3 {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary-dark);
        font-family: 'Playfair Display', serif;
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }
    
    .sejarah-text h3::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 50px;
        height: 2px;
        background: var(--gold);
        transition: width 0.3s ease;
    }
    
    .sejarah-item:hover .sejarah-text h3::after {
        width: 80px;
    }
    
    .sejarah-text p {
        color: var(--text-gray);
        line-height: 1.8;
        font-size: 1rem;
        margin-top: 15px;
    }
    
    /* ==================== CARDS ==================== */
    .grid-2 {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }
    
    .info-card {
        background: var(--white);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        display: flex;
        flex-direction: column;
    }
    
    .info-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }
    
    .info-card-img {
        width: 100%;
        height: 240px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .info-card:hover .info-card-img {
        transform: scale(1.03);
    }
    
    .info-card-content {
        padding: 24px;
    }
    
    .info-card-content h3 {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 12px;
        font-family: 'Playfair Display', serif;
    }
    
    .info-card-content p {
        font-size: 0.9rem;
        color: var(--text-gray);
        line-height: 1.7;
        margin-bottom: 0;
    }
    
    /* ==================== MAPS SECTION ==================== */
    .maps-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }
    
    .maps-container {
        border-radius: 24px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: all 0.4s ease;
    }
    
    .maps-container:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-xl);
    }
    
    .maps-container iframe {
        width: 100%;
        height: 380px;
        border: 0;
    }
    
    .rute-info {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }
    
    .rute-item {
        background: var(--white);
        padding: 22px;
        border-radius: 20px;
        box-shadow: var(--shadow-md);
        transition: all 0.3s ease;
        border-left: 4px solid var(--gold);
    }
    
    .rute-item:hover {
        transform: translateX(8px);
        box-shadow: var(--shadow-lg);
    }
    
    .rute-item h4 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 12px;
    }
    
    .rute-item h4 i {
        color: var(--gold);
        margin-right: 10px;
        width: 24px;
    }
    
    .rute-item p {
        font-size: 0.85rem;
        color: var(--text-gray);
        margin-bottom: 10px;
        line-height: 1.5;
    }
    
    .rute-time {
        font-size: 0.7rem;
        color: var(--gold-dark);
        font-weight: 600;
        display: inline-block;
        padding: 4px 12px;
        background: rgba(198, 164, 59, 0.1);
        border-radius: 20px;
    }
    
    /* ==================== CTA SECTION ==================== */
    .cta-section {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        padding: 70px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
        animation: rotate 25s linear infinite;
    }
    
    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .cta-content {
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    
    .cta-content h3 {
        font-size: 2rem;
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        margin-bottom: 18px;
        color: var(--white);
    }
    
    .cta-content .divider {
        margin: 0 auto 20px;
        background: var(--gold);
    }
    
    .cta-content p {
        color: rgba(255,255,255,0.85);
        margin-bottom: 30px;
        font-size: 0.95rem;
        line-height: 1.7;
    }
    
    .cta-btn {
        display: inline-block;
        background: var(--gold);
        color: var(--primary-dark);
        padding: 12px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        transition: all 0.3s ease;
    }
    
    .cta-btn:hover {
        background: var(--white);
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }
    
    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 1024px) {
        .hero-title { font-size: 3rem; }
    }
    
    @media (max-width: 992px) {
        .sejarah-item, .sejarah-item.reverse { flex-direction: column; text-align: center; }
        .sejarah-text h3::after { left: 50%; transform: translateX(-50%); }
        .sejarah-text { text-align: center; }
        .sejarah-image img { height: 280px; }
        .maps-section { grid-template-columns: 1fr; }
        .hero-title { font-size: 2.8rem; }
        .grid-2 { grid-template-columns: 1fr; }
    }
    
    @media (max-width: 768px) {
        .hero-liang { height: 70vh; min-height: 500px; }
        .hero-title { font-size: 2rem; }
        .hero-subtitle { font-size: 0.65rem; letter-spacing: 0.2em; }
        .hero-badge { font-size: 0.6rem; padding: 4px 14px; }
        .section { padding: 60px 0; }
        .section-header h2 { font-size: 1.6rem; }
        .sejarah-image img { height: 230px; }
        .info-card-img { height: 200px; }
        .maps-container iframe { height: 280px; }
        .cta-section { padding: 50px 0; }
        .cta-content h3 { font-size: 1.5rem; }
    }
    
    @media (max-width: 480px) {
        .hero-title { font-size: 1.6rem; }
        .container { padding: 0 16px; }
        .section-header h2 { font-size: 1.4rem; }
    }
</style>

<!-- ==================== HERO SECTION ==================== -->
<section class="hero-liang" id="home">
    <div class="hero-bg"></div>
    <div class="hero-content" data-aos="fade-up">
        <div class="hero-badge">UNESCO Global Geopark</div>
        <h1 class="hero-title">LIANG SIPEGE</h1>
        <p class="hero-subtitle">Gua Bersejarah · Desa Simarmar Pea Talun Hutagaol · Balige</p>
        <div class="hero-divider"></div>
    </div>
    <div class="scroll-indicator" onclick="document.getElementById('sejarah').scrollIntoView({behavior:'smooth'})">
        <span>SCROLL</span>
        <div class="line"></div>
    </div>
</section>

<!-- ==================== SEJARAH & LEGENDA ==================== -->
<section id="sejarah" class="section section-white">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Warisan Budaya</span>
            <h2>Sejarah & Legenda</h2>
            <div class="divider"></div>
            <p>Menyimpan cerita leluhur dan nilai spiritual yang mendalam</p>
        </div>
        
        <div class="sejarah-grid">
            <div class="sejarah-item" data-aos="fade-up">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/liang-sipege-hero.jpg') }}" alt="Liang Sipege">
                </div>
                <div class="sejarah-text">
                    <h3>Legenda Liang Sipege</h3>
                    <p>Masyarakat setempat meyakini bahwa Liang Sipege adalah bekas tempat bertapa dan tempat persembunyian leluhur mereka. Cerita turun-temurun menceritakan bahwa gua ini merupakan asal-usul leluhur marga Panjaitan. Ibunya diasingkan karena tidak kunjung melahirkan setelah hamil lebih dari sembilan bulan, kondisi yang dianggap aib pada saat itu. Akhirnya, sang leluhur bernama Si Lundu Ni Pahu (yang dibesarkan oleh tanaman pakis) lahir di Liang Sipege dan tumbuh menjadi pemuda yang cerdas dan tangkas.</p>
                </div>
            </div>
            
            <div class="sejarah-item reverse" data-aos="fade-up" data-aos-delay="100">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/liang-sipege-hero.jpg') }}" alt="Raja Sijorat Paraliman Panjaitan">
                </div>
                <div class="sejarah-text">
                    <h3>Raja Sijorat Paraliman Panjaitan</h3>
                    <p>Si Lundu Ni Pahu kemudian dikenal sebagai Raja Sijorat Paraliman Panjaitan, seorang tokoh yang dianggap memiliki kekuatan dan keberanian luar biasa. Raja ini terkenal di kalangan penggembala dan sering memenangkan berbagai perlombaan. Salah satu kisah legendanya adalah ketika ia berhasil menangkap kuda liar milik Raja Sisingamangaraja XII yang kabur, dari mana ia mendapat gelar "Raja Si Jorat" yang berarti raja yang mampu menangkap kuda liar.</p>
                </div>
            </div>
            
            <div class="sejarah-item" data-aos="fade-up" data-aos-delay="200">
                <div class="sejarah-image">
                    <img src="{{ asset('image/meat/liang-sipege-hero.jpg') }}" alt="Tempat Spiritual">
                </div>
                <div class="sejarah-text">
                    <h3>Tempat Spiritual & Habitat Alami</h3>
                    <p>Hingga hari ini, gua ini dijadikan sebagai tempat mencari kekuatan spiritual oleh para raja dan tokoh adat setempat. Para pengunjung masih selalu menemukan persembahan atau sesajen di altar batu yang sengaja dibuat untuk tujuan itu. Liang Sipege juga terkenal sebagai habitat kelelawar, yang kotorannya (guano) dimanfaatkan oleh penduduk setempat sebagai pupuk organik untuk sawah, kebun, dan tanaman mereka, memberikan manfaat ekonomi yang berkelanjutan bagi masyarakat sekitar.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== INFORMASI PRAKTIS ==================== -->
<section id="informasi" class="section section-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Informasi</span>
            <h2>Informasi Praktis</h2>
            <div class="divider"></div>
            <p>Panduan lengkap sebelum mengunjungi Liang Sipege</p>
        </div>
        
        <div class="grid-2">
            <div class="info-card" data-aos="fade-up" data-aos-delay="0">
                <img src="{{ asset('image/meat/liang-sipege-hero.jpg') }}" class="info-card-img" alt="Habitat Kelelawar">
                <div class="info-card-content">
                    <h3>Habitat Kelelawar & Manfaat Ekonomi</h3>
                    <p>Gua ini adalah koloni alami bagi ribuan kelelawar. Kotoran kelelawar (guano) yang terkumpul di dasar gua dimanfaatkan oleh masyarakat setempat sebagai pupuk organik berkualitas tinggi untuk pertanian mereka, menciptakan harmoni antara konservasi dan kesejahteraan ekonomi lokal.</p>
                </div>
            </div>
            
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('image/meat/liang-sipege-hero.jpg') }}" class="info-card-img" alt="Misteri dan Penelitian">
                <div class="info-card-content">
                    <h3>Misteri dan Penelitian</h3>
                    <p>Beberapa lorong Liang Sipege masih belum sepenuhnya terpetakan. Mitos menyebutkan bahwa ada jalur bawah tanah yang menghubungkan gua ini dengan daerah lain di luar Kabupaten Toba. Cerita penduduk tentang serbuk padi yang terbawa angin masuk ke gua memperkuat kepercayaan ini, membuat Liang Sipege menjadi objek penelitian yang menarik.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== LOKASI & AKSES ==================== -->
<section id="lokasi" class="section section-white">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Lokasi</span>
            <h2>Lokasi & Akses</h2>
            <div class="divider"></div>
            <p>Lokasi strategis di kawasan Balige, mudah diakses</p>
        </div>
        
        <div class="maps-section">
            <div class="maps-container" data-aos="fade-right">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0!2d99.0835095!3d2.3339262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0415b8f7da39%3A0xc6beb74287f355a5!2sBalige%2C%20Toba%20Samosir%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" allowfullscreen loading="lazy"></iframe>
            </div>
            <div class="rute-info" data-aos="fade-left">
                <div class="rute-item">
                    <h4><i class="fas fa-motorcycle"></i> Dengan Motor</h4>
                    <p>Balige → Ajibata (30 menit) → Ferry (20 menit) → Liang Sipege (15 menit)</p>
                    <span class="rute-time">⏱️ ± 1.5 jam</span>
                </div>
                <div class="rute-item">
                    <h4><i class="fas fa-car"></i> Dengan Mobil</h4>
                    <p>Balige → Ajibata (30 menit) → Parkir → Ferry → Transportasi lokal</p>
                    <span class="rute-time">⏱️ ± 2 jam</span>
                </div>
                <div class="rute-item">
                    <h4><i class="fas fa-ship"></i> Ferry Schedule</h4>
                    <p>Operasional setiap hari pukul 06:00 - 17:00 WIB</p>
                    <span class="rute-time">Setiap hari</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==================== CTA SECTION ==================== -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h3>Jelajahi Keindahan Liang Sipege</h3>
            <div class="divider"></div>
            <p>Tempat bersejarah dengan nilai spiritual tinggi, habitat alami kelelawar, dan cerita leluhur yang menakjubkan</p>
            <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50,
        easing: 'ease-out-quad'
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
</script>
@endsection