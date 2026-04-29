@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- Stats Row -->
<div class="row g-3">
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $totalGaleri ?? 0 }}</div>
            <div class="stat-label">Total Galeri</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $totalBerita ?? 0 }}</div>
            <div class="stat-label">Total Berita</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $totalInformasi ?? 0 }}</div>
            <div class="stat-label">Total Informasi</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ number_format($totalViews ?? 0) }}</div>
            <div class="stat-label">Total Views</div>
        </div>
    </div>
</div>

<!-- Recent News -->
<div class="card-table">
    <h5>Berita Terbaru</h5>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr><th>Judul</th><th>Tanggal</th><th>Status</th><th></th></tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Berita::latest()->limit(5)->get() as $item)
                <tr>
                    <td>{{ Str::limit($item->judul, 30) }}</td>
                    <td>{{ $item->tanggal_terbit ? \Carbon\Carbon::parse($item->tanggal_terbit)->format('d/m/Y') : '-' }}</td>
                    <td>@if($item->status)<span class="badge-success badge">Publish</span>@else<span class="badge-danger badge">Draft</span>@endif</td>
                    <td><a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Quick Actions -->
<div class="action-buttons">
    <a href="{{ route('admin.galeri.create') }}" class="action-btn"><i class="fas fa-plus-circle"></i> Galeri</a>
    <a href="{{ route('admin.berita.create') }}" class="action-btn"><i class="fas fa-plus-circle"></i> Berita</a>
    <a href="{{ route('admin.informasi.create') }}" class="action-btn"><i class="fas fa-plus-circle"></i> Informasi</a>
    <a href="{{ url('/') }}" target="_blank" class="action-btn"><i class="fas fa-globe"></i> Website</a>
</div>
@endsection