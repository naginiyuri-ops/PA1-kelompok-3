@extends('layouts.app')

@section('title', 'Desa Wisata Meat - Geosite Danau Toba')

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
        overflow-x: hidden;
    }
    
    /* ==================== ANIMATIONS ==================== */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateY(0); opacity: 0.6; }
        50% { transform: translateY(-8px); opacity: 0.3; }
    }
    
    /* ==================== HERO SLIDER ==================== */
    .hero-meat {
        height: 100vh;
        max-height: 700px;
        min-height: 500px;
        position: relative;
        overflow: hidden;
        margin-top: 0;
    }
    
    .slides-container {
        position: relative;
        width: 100%;
        height: 100%;
    }
    
    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0;
        transition: opacity 1.2s ease-in-out;
        z-index: 1;
    }
    
    .slide.active {
        opacity: 1;
        z-index: 2;
    }
    
    .slide::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0,51,102,0.5) 0%, rgba(0,0,0,0.4) 100%);
    }
    
    .hero-content {
        position: absolute;
        bottom: 15%;
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
        font-size: 4rem;
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
    
    .slider-dots {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 12px;
        z-index: 15;
    }
    
    .dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(255,255,255,0.5);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .dot.active {
        background: var(--gold);
        width: 24px;
        border-radius: 10px;
    }
    
    .scroll-indicator {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 15;
        animation: bounce 2s infinite;
        cursor: pointer;
        color: white;
        font-size: 0.6rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
        opacity: 0.7;
    }
    
    .scroll-indicator .line {
        width: 1px;
        height: 30px;
        background: white;
    }
    
    /* ==================== SECTION STYLES ==================== */
    .section {
        padding: 60px 0;
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
        padding: 0 20px;
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .section-header .badge {
        display: inline-block;
        background: rgba(198, 164, 59, 0.12);
        color: var(--gold-dark);
        padding: 4px 14px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 12px;
    }
    
    .section-header h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary-dark);
        font-family: 'Playfair Display', serif;
        margin-bottom: 12px;
    }
    
    .divider {
        width: 50px;
        height: 2px;
        background: var(--gold);
        margin: 0 auto 16px;
        border-radius: 2px;
        transition: width 0.4s ease;
    }
    
    .section-header p {
        color: var(--text-light);
        font-size: 0.85rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }
    
    /* ==================== SEJARAH ==================== */
    .sejarah-grid {
        display: flex;
        flex-direction: column;
        gap: 50px;
    }
    
    .sejarah-item {
        display: flex;
        align-items: center;
        gap: 40px;
        flex-wrap: wrap;
    }
    
    .sejarah-item.reverse {
        flex-direction: row-reverse;
    }
    
    .sejarah-image {
        flex: 1;
        min-width: 280px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: all 0.4s ease;
        cursor: pointer;
    }
    
    .sejarah-image:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-xl);
    }
    
    .sejarah-image img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    
    .sejarah-text {
        flex: 1;
        min-width: 280px;
    }
    
    .sejarah-text h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-dark);
        font-family: 'Playfair Display', serif;
        margin-bottom: 16px;
        position: relative;
        display: inline-block;
    }
    
    .sejarah-text h3::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 40px;
        height: 2px;
        background: var(--gold);
        transition: width 0.3s ease;
    }
    
    .sejarah-text p {
        color: var(--text-gray);
        line-height: 1.7;
        font-size: 0.9rem;
        margin-top: 12px;
        text-align: justify;
    }
    
    /* ==================== CARDS ==================== */
    .grid-umkm, .grid-3, .grid-2 {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 25px;
    }
    
    .card {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        display: flex;
        flex-direction: column;
        cursor: pointer;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-xl);
    }
    
    .card-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.5s ease;
        cursor: pointer;
    }
    
    .card-content {
        padding: 18px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .card-content h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 8px;
        font-family: 'Playfair Display', serif;
    }
    
    .card-content p {
        font-size: 0.8rem;
        color: var(--text-gray);
        line-height: 1.5;
        margin-bottom: 12px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .card-location, .card-contact, .card-price {
        font-size: 0.7rem;
        color: var(--gold-dark);
        margin-top: 6px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .fasilitas-item {
        background: var(--white);
        border-radius: 18px;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: all 0.4s ease;
        display: flex;
        gap: 0;
        cursor: pointer;
    }
    
    .fasilitas-img {
        width: 110px;
        height: 110px;
        object-fit: cover;
        transition: transform 0.4s ease;
        cursor: pointer;
    }
    
    .fasilitas-content {
        padding: 14px 16px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .fasilitas-content h4 {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 6px;
        font-family: 'Playfair Display', serif;
    }
    
    .fasilitas-content p {
        font-size: 0.75rem;
        color: var(--text-gray);
        margin-bottom: 8px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .fasilitas-price {
        font-size: 0.65rem;
        color: var(--gold-dark);
        font-weight: 600;
        display: inline-block;
        padding: 3px 10px;
        background: rgba(198, 164, 59, 0.1);
        border-radius: 20px;
        margin-bottom: 8px;
        width: fit-content;
    }
    
    .btn-readmore {
        margin-top: 12px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: transparent;
        border: none;
        color: var(--gold-dark);
        font-size: 0.7rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 6px 0;
        width: fit-content;
    }
    
    .btn-readmore:hover {
        gap: 10px;
        color: var(--primary-dark);
    }
    
    /* ==================== MODAL ==================== */
    .detail-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--bg-light);
        z-index: 10000;
        overflow-y: auto;
        opacity: 0;
        transition: opacity 0.4s ease;
    }
    
    .detail-modal.active {
        display: block;
        opacity: 1;
    }
    
    .detail-modal-container {
        max-width: 900px;
        margin: 80px auto 40px;
        padding: 0 16px;
    }
    
    .detail-modal-close {
        position: sticky;
        top: 16px;
        margin-bottom: 16px;
        text-align: right;
        z-index: 10001;
    }
    
    .close-modal-btn {
        background: white;
        border: 1px solid #e2e8f0;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-sm);
        color: var(--text-dark);
    }
    
    .close-modal-btn:hover {
        background: var(--primary-dark);
        color: white;
        transform: rotate(90deg);
    }
    
    .detail-modal-wrapper {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
    }
    
    .detail-modal-header {
        position: relative;
        height: 300px;
        overflow: hidden;
    }
    
    .detail-modal-header img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .detail-modal-header .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        padding: 30px 25px 20px;
    }
    
    .detail-modal-header .overlay .type {
        display: inline-block;
        background: var(--gold);
        color: var(--primary-dark);
        padding: 4px 14px;
        border-radius: 30px;
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }
    
    .detail-modal-header .overlay h2 {
        color: white;
        font-size: 1.5rem;
        font-family: 'Playfair Display', serif;
        margin-bottom: 6px;
    }
    
    .detail-modal-body {
        padding: 25px;
    }
    
    .detail-info {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--bg-gray);
    }
    
    .detail-info p {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.8rem;
        color: var(--text-gray);
    }
    
    .detail-info i {
        width: 20px;
        color: var(--gold);
    }
    
    .full-description {
        color: var(--text-gray);
        line-height: 1.7;
        font-size: 0.9rem;
    }
    
    /* ==================== MAPS SECTION ==================== */
    .maps-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
    }
    
    .maps-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: all 0.4s ease;
    }
    
    .maps-container iframe {
        width: 100%;
        height: 320px;
        border: 0;
    }
    
    .rute-info {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .rute-item {
        background: var(--white);
        padding: 18px;
        border-radius: 18px;
        box-shadow: var(--shadow-md);
        transition: all 0.3s ease;
        border-left: 3px solid var(--gold);
    }
    
    .rute-item h4 {
        font-size: 0.9rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 10px;
    }
    
    .rute-item h4 i {
        color: var(--gold);
        margin-right: 8px;
        width: 22px;
    }
    
    .rute-item p {
        font-size: 0.8rem;
        color: var(--text-gray);
        margin-bottom: 8px;
        line-height: 1.5;
    }
    
    .rute-time {
        font-size: 0.65rem;
        color: var(--gold-dark);
        font-weight: 600;
        display: inline-block;
        padding: 3px 10px;
        background: rgba(198, 164, 59, 0.1);
        border-radius: 20px;
    }
    
    .empty-state {
        text-align: center;
        padding: 40px;
        background: var(--white);
        border-radius: 20px;
        box-shadow: var(--shadow-sm);
    }
    
    .empty-state i {
        font-size: 2.5rem;
        color: var(--gold);
        margin-bottom: 12px;
        opacity: 0.5;
    }
    
    /* ==================== CTA SECTION ==================== */
    .cta-section {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        padding: 50px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .cta-content {
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
        padding: 0 20px;
    }
    
    .cta-content h3 {
        font-size: 1.6rem;
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        margin-bottom: 14px;
        color: var(--white);
    }
    
    .cta-content .divider {
        margin: 0 auto 16px;
        background: var(--gold);
    }
    
    .cta-content p {
        color: rgba(255,255,255,0.85);
        margin-bottom: 25px;
        font-size: 0.85rem;
        line-height: 1.6;
    }
    
    .cta-btn {
        display: inline-block;
        background: var(--gold);
        color: var(--primary-dark);
        padding: 10px 32px;
        border-radius: 50px;
        text-decoration: none;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        transition: all 0.3s ease;
    }
    
    .cta-btn:hover {
        background: var(--white);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    
    /* ==================== LIGHTBOX ==================== */
    .lightbox-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.96);
        z-index: 20000;
        backdrop-filter: blur(12px);
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }
    
    .lightbox-overlay.active {
        display: flex;
    }
    
    .lightbox-container {
        max-width: 90%;
        max-height: 90%;
        text-align: center;
    }
    
    .lightbox-image {
        max-width: 100%;
        max-height: 80vh;
        object-fit: contain;
        border-radius: 12px;
    }
    
    .lightbox-close {
        position: absolute;
        top: 20px;
        right: 30px;
        color: white;
        font-size: 2rem;
        cursor: pointer;
        background: rgba(0,0,0,0.5);
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .lightbox-close:hover {
        background: var(--gold);
        transform: rotate(90deg);
    }
    /* ==================== RESPONSIVE PREMIUM ==================== */

@media (max-width: 992px) {

    .hero-meat{
        height:85vh;
    }

    .hero-title{
        font-size:3rem;
    }

    .hero-content{
        bottom:12%;
    }

    .sejarah-item,
    .sejarah-item.reverse{
        flex-direction:column;
        text-align:center;
        gap:25px;
    }

    .sejarah-text{
        text-align:center;
    }

    .sejarah-text h3::after{
        left:50%;
        transform:translateX(-50%);
    }

    .maps-section{
        grid-template-columns:1fr;
    }

    .detail-info{
        flex-direction:column;
        align-items:flex-start;
    }
}

/* ==================== TABLET & HP ==================== */

@media (max-width: 768px) {

    html,
    body{
        overflow-x:hidden;
    }

    .container{
        padding:0 18px;
    }

    .hero-meat{
        height:70vh;
        max-height:none;
        min-height:420px;
    }

    .hero-content{
        bottom:14%;
        padding:0 15px;
    }

    .hero-title{
        font-size:2.2rem;
        line-height:1.2;
        letter-spacing:1px;
    }

    .hero-subtitle{
        font-size:.68rem;
        letter-spacing:2px;
        line-height:1.6;
    }

    .hero-badge{
        font-size:.55rem;
        padding:6px 14px;
        margin-bottom:12px;
    }

    .hero-divider{
        margin:15px auto;
        width:45px;
    }

    .section{
        padding:45px 0;
    }

    .section-header{
        margin-bottom:30px;
    }

    .section-header h2{
        font-size:1.6rem;
    }

    .section-header p{
        font-size:.85rem;
        line-height:1.7;
    }

    .sejarah-grid{
        gap:35px;
    }

    .sejarah-image{
        width:100%;
        min-width:100%;
    }

    .sejarah-image img{
        height:230px;
        width:100%;
    }

    .sejarah-text h3{
        font-size:1.3rem;
    }

    .sejarah-text p{
        text-align:center;
        font-size:.9rem;
    }

    .grid-umkm,
    .grid-3,
    .grid-2{
        grid-template-columns:1fr;
        gap:20px;
    }

    .card{
        border-radius:18px;
    }

    .card-img{
        height:220px;
    }

    .card-content{
        padding:16px;
    }

    .card-content h3{
        font-size:1rem;
        line-height:1.4;
    }

    .card-content p{
        font-size:.82rem;
    }

    .card-location,
    .card-contact,
    .card-price{
        font-size:.75rem;
    }

    .fasilitas-item{
        flex-direction:column;
    }

    .fasilitas-img{
        width:100%;
        height:180px;
    }

    .fasilitas-content{
        text-align:center;
        padding:16px;
    }

    .fasilitas-price{
        margin:0 auto 10px;
    }

    .btn-readmore{
        margin:10px auto 0;
        min-height:42px;
    }

    .maps-container iframe{
        height:280px;
    }

    .rute-item{
        padding:16px;
    }

    .rute-item h4{
        font-size:.95rem;
    }

    .rute-item p{
        font-size:.82rem;
    }

    .detail-modal-container{
        margin:20px auto;
        padding:0 10px;
    }

    .detail-modal-wrapper{
        border-radius:18px;
    }

    .detail-modal-header{
        height:220px;
    }

    .detail-modal-header .overlay{
        padding:20px;
    }

    .detail-modal-header .overlay h2{
        font-size:1.25rem;
    }

    .detail-modal-body{
        padding:18px;
    }

    .detail-info{
        gap:10px;
    }

    .detail-info p{
        width:100%;
        font-size:.8rem;
    }

    .full-description{
        font-size:.9rem;
    }

    .close-modal-btn{
        width:42px;
        height:42px;
    }

    .slider-dots{
        bottom:15px;
    }

    .dot{
        width:10px;
        height:10px;
    }

    .dot.active{
        width:28px;
    }

    .lightbox-close{
        top:10px;
        right:10px;
    }

    .cta-section{
        padding:45px 0;
    }

    .cta-content h3{
        font-size:1.4rem;
    }

    .cta-btn{
        width:100%;
        max-width:280px;
        text-align:center;
    }
}

/* ==================== HP KECIL ==================== */

@media (max-width: 480px) {

    .container{
        padding:0 15px;
    }

    .hero-meat{
        height:65vh;
        min-height:380px;
    }

    .hero-title{
        font-size:1.8rem;
    }

    .hero-subtitle{
        font-size:.55rem;
        letter-spacing:1px;
    }

    .hero-badge{
        font-size:.5rem;
    }

    .section{
        padding:40px 0;
    }

    .section-header h2{
        font-size:1.35rem;
    }

    .section-header p{
        font-size:.8rem;
    }

    .sejarah-image img{
        height:190px;
    }

    .sejarah-text h3{
        font-size:1.15rem;
    }

    .card-img{
        height:190px;
    }

    .card-content{
        padding:14px;
    }

    .fasilitas-img{
        height:160px;
    }

    .maps-container iframe{
        height:220px;
    }

    .detail-modal-header{
        height:180px;
    }

    .detail-modal-header .overlay h2{
        font-size:1.05rem;
    }

    .detail-modal-body{
        padding:15px;
    }

    .detail-info p{
        font-size:.75rem;
    }

    .full-description{
        font-size:.85rem;
    }

    .cta-content h3{
        font-size:1.2rem;
    }
}

/* ==================== HP SANGAT KECIL ==================== */

@media (max-width: 360px) {

    .hero-title{
        font-size:1.5rem;
    }

    .hero-subtitle{
        font-size:.5rem;
    }

    .section-header h2{
        font-size:1.15rem;
    }

    .card-img{
        height:170px;
    }

    .sejarah-image img{
        height:170px;
    }

    .fasilitas-img{
        height:140px;
    }

    .detail-modal-header{
        height:160px;
    }
}
</style>

<!-- ==================== HERO SLIDER ==================== -->
<section class="hero-meat">
    <div class="slides-container">
        <div class="slide slide-1 active" style="background-image: url('{{ asset('image/meat/slide1.jpg') }}');"></div>
        <div class="slide slide-2" style="background-image: url('{{ asset('image/meat/slide2.jpg') }}');"></div>
        <div class="slide slide-3" style="background-image: url('{{ asset('image/meat/slide3.jpg') }}');"></div>
        <div class="slide slide-4" style="background-image: url('{{ asset('image/meat/slide4.jpg') }}');"></div>
        <div class="slide slide-5" style="background-image: url('{{ asset('image/meat/slide5.jpg') }}');"></div>
    </div>
    
    <div class="slider-dots">
        <div class="dot active" data-slide="0"></div>
        <div class="dot" data-slide="1"></div>
        <div class="dot" data-slide="2"></div>
        <div class="dot" data-slide="3"></div>
        <div class="dot" data-slide="4"></div>
    </div>
    
    <div class="hero-content" data-aos="fade-up">
        <div class="hero-badge">UNESCO Global Geopark</div>
        <h1 class="hero-title">MEAT</h1>
        <p class="hero-subtitle">Kec. Tampahan · Kab. Toba · "New Zealand van Toba"</p>
        <div class="hero-divider"></div>
    </div>
    
    <div class="scroll-indicator" onclick="document.getElementById('sejarah').scrollIntoView({behavior:'smooth'})">
        <span>SCROLL</span>
        <div class="line"></div>
    </div>
</section>

<!-- ==================== SEJARAH & BUDAYA ==================== -->
<section id="sejarah" class="section section-white">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Warisan Budaya</span>
            <h2>Sejarah & Budaya</h2>
            <div class="divider"></div>
            <p>Warisan budaya Batak yang autentik dan masih hidup</p>
        </div>
        
        <div class="sejarah-grid">
            <div class="sejarah-item" data-aos="fade-up">
                <div class="sejarah-image" onclick="openLightbox('{{ asset('image/meat/slide1.jpg') }}', 'Desa Meat', 'Desa wisata adat Batak di tepi Danau Toba')">
                    <img src="{{ asset('image/meat/slide1.jpg') }}" alt="Desa Meat" loading="lazy">
                </div>
                <div class="sejarah-text">
                    <h3>Desa Meat - Jantung Budaya Batak</h3>
                    <p>Meat adalah salah satu desa adat tertua di Kecamatan Tampahan, Kabupaten Toba, Provinsi Sumatra Utara. Terletak tepat di bibir Danau Toba dan dikelilingi bentangan perbukitan hijau yang menjulang, desa ini menjadi pusat pelestarian budaya Batak yang otentik. Perpaduan hamparan sawah bertingkat yang menghadap langsung ke Danau Toba dan suasana perbukitan yang dramatis menjadikan Meat dijuluki <strong>"New Zealand van Toba"</strong> oleh para wisatawan yang terpesona.</p>
                </div>
            </div>
            
            <div class="sejarah-item reverse" data-aos="fade-up" data-aos-delay="100">
                <div class="sejarah-image" onclick="openLightbox('{{ asset('image/meat/slide2.jpg') }}', 'Tradisi Batak', 'Tradisi menenun Ulos dan budaya Batak yang masih lestari')">
                    <img src="{{ asset('image/meat/slide2.jpg') }}" alt="Tradisi Batak" loading="lazy">
                </div>
                <div class="sejarah-text">
                    <h3>Tradisi Hidup yang Diwariskan</h3>
                    <p>Hingga kini, masyarakat Meat tetap menjaga tradisi leluhur dengan penuh dedikasi. Sekitar 80% wanita di desa ini berprofesi sebagai penenun kain Ulos secara tradisional di kolong Ruma Bolon — rumah adat Batak berusia ratusan tahun. Selain tenun Ulos, tarian Tor-tor yang penuh makna filosofis dan musik Gondang yang merdu masih menjadi bagian integral kehidupan sehari-hari masyarakat Meat.</p>
                </div>
            </div>
            
            <div class="sejarah-item" data-aos="fade-up" data-aos-delay="200">
                <div class="sejarah-image" onclick="openLightbox('{{ asset('image/meat/slide3.jpg') }}', 'Wisata Budaya', 'Destinasi wisata budaya unggulan di Geopark Toba')">
                    <img src="{{ asset('image/meat/slide3.jpg') }}" alt="Wisata Budaya" loading="lazy">
                </div>
                <div class="sejarah-text">
                    <h3>Destinasi Wisata Budaya Unggulan</h3>
                    <p>Budaya dan kearifan lokal yang masih terjaga dengan baik menjadikan Meat sebagai destinasi wisata unggulan di kawasan Geopark Kaldera Toba. Desa ini memiliki 4 unit Ruma Bolon yang telah direhab oleh Kementerian Pariwisata RI, serta area camping ground yang dapat menampung hingga 1.000 tenda di tepi Danau Toba. Pengunjung dapat berinteraksi langsung dengan masyarakat, belajar menenun Ulos, menikmati kuliner khas Batak, dan menyaksikan sunrise terbaik menghadap Danau Toba.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== UMKM ==================== -->
<section id="umkm" class="section section-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Produk Lokal</span>
            <h2>UMKM Lokal</h2>
            <div class="divider"></div>
            <p>Produk autentik dan berkualitas dari pengrajin lokal Meat</p>
        </div>
        
        <div class="grid-umkm">
            @forelse($umkm as $index => $item)
            <div class="card" data-aos="fade-up" data-aos-delay="{{ min(($index % 5) * 100, 400) }}" onclick="openDetailModal('umkm', {{ $index }})">
                @php
                    // Fungsi helper untuk mendapatkan URL gambar dari public/image/
                    $imgSrc = asset('image/meat/slide1.jpg');
                    if (!empty($item->gambar)) {
                        if (str_starts_with($item->gambar, 'data:image')) {
                            $imgSrc = $item->gambar;
                        } elseif (str_starts_with($item->gambar, 'http')) {
                            $imgSrc = $item->gambar;
                        } elseif (str_starts_with($item->gambar, 'image/')) {
                            $imgSrc = asset($item->gambar);
                        } elseif (file_exists(public_path('image/umkm/' . $item->gambar))) {
                            $imgSrc = asset('image/umkm/' . $item->gambar);
                        } elseif (file_exists(public_path('image/umkm/' . basename($item->gambar)))) {
                            $imgSrc = asset('image/umkm/' . basename($item->gambar));
                        } else {
                            $imgSrc = asset('storage/' . $item->gambar);
                        }
                    }
                @endphp
                <img src="{{ $imgSrc }}" 
                     class="card-img" 
                     alt="{{ $item->nama }}" 
                     onclick="event.stopPropagation(); openLightbox('{{ $imgSrc }}', '{{ addslashes($item->nama) }}', '{{ addslashes(Str::limit($item->deskripsi ?? '', 100)) }}')" 
                     onerror="this.src='{{ asset('image/meat/slide1.jpg') }}'"
                     loading="lazy">
                <div class="card-content">
                    <h3>{{ Str::limit($item->nama, 35) }}</h3>
                    <p>{{ Str::limit($item->deskripsi ?? 'Belum ada deskripsi', 80) }}</p>
                    <div class="card-location"><i class="fas fa-map-marker-alt"></i> {{ $item->lokasi ?? 'Desa Meat' }}</div>
                    <div class="card-contact"><i class="fas fa-phone"></i> {{ $item->kontak ?? 'Hubungi pengrajin' }}</div>
                    <button class="btn-readmore" onclick="event.stopPropagation(); openDetailModal('umkm', {{ $index }})">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            @empty
            <div class="empty-state" data-aos="fade-up">
                <i class="fas fa-store"></i>
                <p>Belum ada data UMKM. Silakan tambahkan melalui admin.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ==================== PENGINAPAN ==================== -->
<section id="penginapan" class="section section-white">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Akomodasi</span>
            <h2>Penginapan</h2>
            <div class="divider"></div>
            <p>Pilihan menginap dengan nuansa budaya Batak yang autentik</p>
        </div>
        
        <div class="grid-3">
            @forelse($penginapan ?? [] as $index => $item)
            <div class="card" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}" onclick="openDetailModal('penginapan', {{ $index }})">
                @php
                    $imgSrc = asset('image/meat/slide2.jpg');
                    if (!empty($item->gambar)) {
                        if (str_starts_with($item->gambar, 'data:image')) {
                            $imgSrc = $item->gambar;
                        } elseif (str_starts_with($item->gambar, 'http')) {
                            $imgSrc = $item->gambar;
                        } elseif (str_starts_with($item->gambar, 'image/')) {
                            $imgSrc = asset($item->gambar);
                        } elseif (file_exists(public_path('image/penginapan/' . $item->gambar))) {
                            $imgSrc = asset('image/penginapan/' . $item->gambar);
                        } elseif (file_exists(public_path('image/penginapan/' . basename($item->gambar)))) {
                            $imgSrc = asset('image/penginapan/' . basename($item->gambar));
                        } else {
                            $imgSrc = asset('storage/' . $item->gambar);
                        }
                    }
                @endphp
                <img src="{{ $imgSrc }}" 
                     class="card-img" 
                     alt="{{ $item->nama }}" 
                     onclick="event.stopPropagation(); openLightbox('{{ $imgSrc }}', '{{ addslashes($item->nama) }}', 'Penginapan di Desa Meat')" 
                     onerror="this.src='{{ asset('image/meat/slide2.jpg') }}'"
                     loading="lazy">
                <div class="card-content">
                    <h3>{{ Str::limit($item->nama, 35) }}</h3>
                    <p>{{ Str::limit($item->deskripsi ?? 'Belum ada deskripsi', 80) }}</p>
                    <div class="card-price"><i class="fas fa-tag"></i> {{ $item->harga ?? 'Hubungi pengelola' }}</div>
                    <div class="card-contact"><i class="fas fa-phone"></i> {{ $item->kontak ?? 'Hubungi pengelola' }}</div>
                    <button class="btn-readmore" onclick="event.stopPropagation(); openDetailModal('penginapan', {{ $index }})">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            @empty
            <div class="empty-state" data-aos="fade-up">
                <i class="fas fa-hotel"></i>
                <p>Belum ada data penginapan. Silakan tambahkan melalui admin.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ==================== FASILITAS ==================== -->
<section id="fasilitas" class="section section-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="badge">Layanan</span>
            <h2>Fasilitas</h2>
            <div class="divider"></div>
            <p>Fasilitas lengkap untuk kenyamanan wisatawan</p>
        </div>
        
        <div class="grid-2">
            @forelse($fasilitas ?? [] as $index => $item)
            <div class="fasilitas-item" data-aos="fade-up" data-aos-delay="{{ ($index % 2) * 50 }}" onclick="openDetailModal('fasilitas', {{ $index }})">
                @php
                    $imgSrc = asset('image/meat/slide3.jpg');
                    if (!empty($item->gambar)) {
                        if (str_starts_with($item->gambar, 'data:image')) {
                            $imgSrc = $item->gambar;
                        } elseif (str_starts_with($item->gambar, 'http')) {
                            $imgSrc = $item->gambar;
                        } elseif (str_starts_with($item->gambar, 'image/')) {
                            $imgSrc = asset($item->gambar);
                        } elseif (file_exists(public_path('image/fasilitas/' . $item->gambar))) {
                            $imgSrc = asset('image/fasilitas/' . $item->gambar);
                        } elseif (file_exists(public_path('image/fasilitas/' . basename($item->gambar)))) {
                            $imgSrc = asset('image/fasilitas/' . basename($item->gambar));
                        } else {
                            $imgSrc = asset('storage/' . $item->gambar);
                        }
                    }
                @endphp
                <img src="{{ $imgSrc }}" 
                     class="fasilitas-img" 
                     alt="{{ $item->nama }}" 
                     onclick="event.stopPropagation(); openLightbox('{{ $imgSrc }}', '{{ addslashes($item->nama) }}', 'Fasilitas di Desa Meat')" 
                     onerror="this.src='{{ asset('image/meat/slide3.jpg') }}'"
                     loading="lazy">
                <div class="fasilitas-content">
                    <h4>{{ Str::limit($item->nama, 30) }}</h4>
                    <p>{{ Str::limit($item->deskripsi ?? 'Belum ada deskripsi', 60) }}</p>
                    <div class="fasilitas-price"><i class="fas fa-tag"></i> {{ $item->harga ?? 'Gratis' }}</div>
                    <button class="btn-readmore" onclick="event.stopPropagation(); openDetailModal('fasilitas', {{ $index }})">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            @empty
            <div class="empty-state" data-aos="fade-up" style="grid-column: span 2;">
                <i class="fas fa-building"></i>
                <p>Belum ada data fasilitas. Silakan tambahkan melalui admin.</p>
            </div>
            @endforelse
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
            <p>Desa Meat, Kecamatan Tampahan, Kabupaten Toba — mudah dijangkau dari Kota Balige maupun Bandara Silangit</p>
        </div>
        
        <div class="maps-section">
            <div class="maps-container" data-aos="fade-right">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0!2d99.0835095!3d2.3339262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0415b8f7da39%3A0xc6beb74287f355a5!2sBalige%2C%20Toba%20Samosir%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" allowfullscreen loading="lazy" title="Peta Lokasi Desa Meat"></iframe>
            </div>
            <div class="rute-info" data-aos="fade-left">
                <div class="rute-item">
                    <h4><i class="fas fa-car"></i> Dari Kota Balige</h4>
                    <p>Kota Balige → Desa Meat melalui jalan darat menuruni bukit yang indah namun cukup curam. Jarak sekitar 10–15 km dengan jalur yang berkelok melewati persawahan hijau.</p>
                    <span class="rute-time">⏱️ ± 20–30 menit</span>
                </div>
                <div class="rute-item">
                    <h4><i class="fas fa-plane-arrival"></i> Dari Bandara Silangit</h4>
                    <p>Bandara Sisingamangaraja XII (Silangit) terhubung dari Jakarta (Garuda, Citilink, Batik Air) dan Malaysia (AirAsia, Malindo Air). Dari bandara menuju Desa Meat melalui jalur darat.</p>
                    <span class="rute-time">⏱️ ± 30–45 menit</span>
                </div>
                <div class="rute-item">
                    <h4><i class="fas fa-sun"></i> Waktu Terbaik Berkunjung</h4>
                    <p>Datanglah sebelum pukul 07.00 WIB untuk menikmati sunrise terbaik. Desa menghadap ke timur langsung ke Danau Toba. Mei–Oktober adalah musim terbaik berkunjung.</p>
                    <span class="rute-time">🌅 Sunrise ± 05.30 WIB</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== CTA SECTION ==================== -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h3>Jelajahi Keindahan Meat</h3>
            <div class="divider"></div>
            <p>Rasakan pengalaman wisata budaya Batak yang autentik, nikmati keindahan alam Danau Toba yang memukau, dan ciptakan kenangan indah bersama keluarga tercinta di Meat</p>
            <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
        </div>
    </div>
</section>

<!-- ==================== LIGHTBOX ZOOM ==================== -->
<div id="lightboxOverlay" class="lightbox-overlay" onclick="closeLightbox()">
    <div class="lightbox-close" onclick="closeLightbox()">&times;</div>
    <div class="lightbox-container" onclick="event.stopPropagation()">
        <img id="lightboxImage" class="lightbox-image" src="" alt="">
        <div class="lightbox-caption">
            <h3 id="lightboxTitle" style="color: var(--gold); margin-top: 15px; font-size: 1rem;"></h3>
            <p id="lightboxDesc" style="color: rgba(255,255,255,0.7); font-size: 0.8rem; margin-top: 8px;"></p>
        </div>
    </div>
</div>

<!-- ==================== MODAL DETAIL ==================== -->
<div id="detailModal" class="detail-modal">
    <div class="detail-modal-container">
        <div class="detail-modal-close">
            <button class="close-modal-btn" onclick="closeDetailModal()">&times;</button>
        </div>
        <div class="detail-modal-wrapper">
            <div class="detail-modal-header">
                <img id="detailImg" src="" alt="">
                <div class="overlay">
                    <span class="type" id="detailType"></span>
                    <h2 id="detailTitle"></h2>
                </div>
            </div>
            <div class="detail-modal-body">
                <div class="detail-info">
                    <p><i class="fas fa-map-marker-alt"></i> <strong>Lokasi:</strong> <span id="detailLokasi"></span></p>
                    <p><i class="fas fa-phone"></i> <strong>Kontak:</strong> <span id="detailKontak"></span></p>
                    <p><i class="fas fa-tag"></i> <strong>Harga:</strong> <span id="detailHarga"></span></p>
                </div>
                <div class="full-description" id="detailDeskripsi"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    // Data dari backend
    const umkmData = @json($umkm ?? []);
    const penginapanData = @json($penginapan ?? []);
    const fasilitasData = @json($fasilitas ?? []);
    
    // ==================== HERO SLIDER ====================
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    let slideInterval;
    
    function showSlide(index) {
        slides.forEach((s, i) => {
            s.classList.remove('active');
            if (dots[i]) dots[i].classList.remove('active');
        });
        slides[index].classList.add('active');
        if (dots[index]) dots[index].classList.add('active');
        currentSlide = index;
    }
    
    function nextSlide() {
        showSlide((currentSlide + 1) % slides.length);
    }
    
    function startSlider() {
        if (slideInterval) clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 5000);
    }
    
    if (dots.length) {
        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => {
                clearInterval(slideInterval);
                showSlide(i);
                startSlider();
            });
            // Touch support untuk HP
            dot.addEventListener('touchstart', (e) => {
                e.preventDefault();
                clearInterval(slideInterval);
                showSlide(i);
                startSlider();
            });
        });
    }
    
    startSlider();
    
    // ==================== SMOOTH SCROLL ====================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
    
    // ==================== LIGHTBOX ====================
    function openLightbox(src, title, desc) {
        const overlay = document.getElementById('lightboxOverlay');
        const lightboxImg = document.getElementById('lightboxImage');
        const titleEl = document.getElementById('lightboxTitle');
        const descEl = document.getElementById('lightboxDesc');
        
        if (overlay && lightboxImg) {
            lightboxImg.src = src;
            titleEl.innerText = title || 'Galeri GeoToba';
            descEl.innerText = desc || 'Keindahan Geosite Danau Toba';
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }
    
    function closeLightbox() {
        const overlay = document.getElementById('lightboxOverlay');
        if (overlay) {
            overlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    }
    
    // Fungsi helper untuk mendapatkan URL gambar yang benar
    function getImageUrl(item) {
        if (!item.gambar) return null;
        
        if (item.gambar.startsWith('data:image')) {
            return item.gambar;
        }
        if (item.gambar.startsWith('http')) {
            return item.gambar;
        }
        if (item.gambar.startsWith('image/')) {
            return '{{ asset("") }}' + item.gambar;
        }
        return null;
    }
    
    // ==================== DETAIL MODAL ====================
    function openDetailModal(type, index) {
        let item = null;
        let typeName = '';
        
        if (type === 'umkm' && umkmData[index]) {
            item = umkmData[index];
            typeName = 'UMKM';
        } else if (type === 'penginapan' && penginapanData[index]) {
            item = penginapanData[index];
            typeName = 'PENGINAPAN';
        } else if (type === 'fasilitas' && fasilitasData[index]) {
            item = fasilitasData[index];
            typeName = 'FASILITAS';
        }
        
        if (!item) return;
        
        let imgSrc = '{{ asset("image/meat/slide1.jpg") }}';
        
        // Cek gambar dari berbagai lokasi
        if (item.gambar) {
            if (item.gambar.startsWith('data:image')) {
                imgSrc = item.gambar;
            } else if (item.gambar.startsWith('http')) {
                imgSrc = item.gambar;
            } else if (item.gambar.startsWith('image/')) {
                imgSrc = '{{ asset("") }}' + item.gambar;
            } else if (type === 'umkm' && fileExists('image/umkm/' + item.gambar)) {
                imgSrc = '{{ asset("image/umkm") }}/' + item.gambar;
            } else if (type === 'penginapan' && fileExists('image/penginapan/' + item.gambar)) {
                imgSrc = '{{ asset("image/penginapan") }}/' + item.gambar;
            } else if (type === 'fasilitas' && fileExists('image/fasilitas/' + item.gambar)) {
                imgSrc = '{{ asset("image/fasilitas") }}/' + item.gambar;
            } else {
                imgSrc = '{{ asset("storage") }}/' + item.gambar;
            }
        }
        
        document.getElementById('detailImg').src = imgSrc;
        document.getElementById('detailType').innerText = typeName;
        document.getElementById('detailTitle').innerText = item.nama || '-';
        document.getElementById('detailLokasi').innerText = item.lokasi || 'Desa Meat';
        document.getElementById('detailKontak').innerText = item.kontak || '-';
        document.getElementById('detailHarga').innerText = item.harga || (typeName === 'UMKM' ? 'Hubungi langsung' : 'Gratis');
        document.getElementById('detailDeskripsi').innerHTML = '<p>' + (item.deskripsi || 'Belum ada deskripsi lengkap untuk item ini.') + '</p>';
        
        const modal = document.getElementById('detailModal');
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    
    function closeDetailModal() {
        const modal = document.getElementById('detailModal');
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
    
    // ==================== EVENT LISTENERS ====================
    const lightboxOverlay = document.getElementById('lightboxOverlay');
    if (lightboxOverlay) {
        lightboxOverlay.addEventListener('click', function(e) {
            if (e.target === this || e.target.classList.contains('lightbox-close')) {
                closeLightbox();
            }
        });
        // Touch support untuk HP
        lightboxOverlay.addEventListener('touchstart', function(e) {
            if (e.target === this || e.target.classList.contains('lightbox-close')) {
                closeLightbox();
            }
        });
    }
    
    const detailModal = document.getElementById('detailModal');
    if (detailModal) {
        detailModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeDetailModal();
            }
        });
        // Touch support untuk HP
        detailModal.addEventListener('touchstart', function(e) {
            if (e.target === this) {
                closeDetailModal();
            }
        });
    }
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox();
            closeDetailModal();
        }
    });
    
    // Helper function fileExists (tidak bisa di JS, hanya fallback)
    function fileExists(path) {
        // Ini hanya fallback, akan tetap menggunakan onerror di img
        return true;
    }
    
    // Inisialisasi AOS
    AOS.init({
        duration: 600,
        once: true,
        offset: 40,
        easing: 'ease-out-quad'
    });
    
    // Perbaikan untuk touch event di HP agar tidak double fire
    document.querySelectorAll('.card, .fasilitas-item, .sejarah-image').forEach(el => {
        el.addEventListener('touchstart', function(e) {
            // Biarkan event tetap berjalan, hanya prevent default jika perlu
        }, { passive: true });
    });
</script>

@endsection