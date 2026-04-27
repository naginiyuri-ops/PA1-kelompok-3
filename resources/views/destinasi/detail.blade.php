@extends('layouts.app')

@section('content')

<style>
.hero-detail {
    height: 75vh;
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    overflow: hidden;
}

.hero-overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.7));
}

.hero-text {
    position: relative;
    z-index: 2;
    text-align: center;
    animation: fadeIn 1.5s ease-in-out;
}

@keyframes fadeIn {
    from {opacity: 0; transform: translateY(20px);}
    to {opacity: 1; transform: translateY(0);}
}

.gallery img {
    height: 220px;
    object-fit: cover;
    border-radius: 15px;
    transition: 0.4s;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

.gallery img:hover {
    transform: scale(1.07);
}

.card-custom {
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    padding: 25px;
    background: white;
    transition: 0.3s;
}

.card-custom:hover {
    transform: translateY(-5px);
}
</style>

<!-- HERO -->
<div class="hero-detail" style="background-image: url('/image/{{ $destinasi['gambar'] }}')">
    <div class="hero-overlay"></div>
    <div class="hero-text">
        <h1 class="display-3 fw-bold">{{ $destinasi['nama'] }}</h1>
        <p class="lead">Geosite Danau Toba</p>
    </div>
</div>

<!-- CONTENT -->
<div class="container py-5">

    <!-- DESKRIPSI -->
    <div class="card-custom mb-5">
        <h2 class="mb-3">Deskripsi</h2>
        <p>{{ $destinasi['deskripsi'] }}</p>
    </div>

    <!-- GALERI -->
    <div class="card-custom mb-5">
        <h2 class="mb-4">Galeri</h2>
        <div class="row gallery">
            @foreach($destinasi['galeri'] as $img)
                <div class="col-md-4 mb-3">
                    <img src="/image/{{ $img }}" class="w-100">
                </div>
            @endforeach
        </div>
    </div>

    <!-- GOOGLE MAPS -->
    <div class="card-custom mb-5">
        <h2 class="mb-3">Lokasi</h2>

        <iframe 
            src="https://www.google.com/maps?q={{ $destinasi['maps'] }}&output=embed"
            width="100%" 
            height="400" 
            style="border:none;">
        </iframe>
    </div>

    <!-- BUTTON -->
    <a href="/" class="btn btn-primary rounded-pill px-4 shadow">
        ← Kembali
    </a>

</div>

@endsection