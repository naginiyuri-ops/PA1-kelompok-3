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
            <div class="stat-number">{{ $totalUmkm ?? 0 }}</div>
            <div class="stat-label">Total UMKM</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $totalFasilitas ?? 0 }}</div>
            <div class="stat-label">Total Fasilitas</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $totalPenginapan ?? 0 }}</div>
            <div class="stat-label">Total Penginapan</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ number_format($totalViews ?? 0) }}</div>
            <div class="stat-label">Total Views</div>
        </div>
    </div>
</div>

<!-- UMKM Terbaru -->
<div class="card-table">
    <h5>🏪 UMKM Terbaru (Meat)</h5>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Kontak</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $umkmList = App\Models\Umkm::latest()->limit(5)->get(); @endphp
                @forelse($umkmList as $item)
                <tr>
                    <td>{{ Str::limit($item->nama, 30) }}</td>
                    <td>{{ $item->lokasi ?? '-' }}</td>
                    <td>{{ $item->kontak ?? '-' }}</td>
                    <td>
                        @if($item->status)
                            <span class="badge-success badge">Aktif</span>
                        @else
                            <span class="badge-danger badge">Tidak</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.umkm.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    </span>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center">Belum ada data UMKM. <a href="{{ route('admin.umkm.create') }}">Tambah UMKM</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Fasilitas Terbaru -->
<div class="card-table">
    <h5>🛠️ Fasilitas Terbaru (Meat)</h5>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $fasilitasList = App\Models\Fasilitas::latest()->limit(5)->get(); @endphp
                @forelse($fasilitasList as $item)
                <tr>
                    <td>{{ Str::limit($item->nama, 40) }}</td>
                    <td>{{ $item->harga ?? 'Gratis' }}</td>
                    <td>
                        @if($item->status)
                            <span class="badge-success badge">Aktif</span>
                        @else
                            <span class="badge-danger badge">Tidak</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.fasilitas.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    </span>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center">Belum ada data Fasilitas. <a href="{{ route('admin.fasilitas.create') }}">Tambah Fasilitas</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Penginapan Terbaru -->
<div class="card-table">
    <h5>🏨 Penginapan Terbaru (Meat)</h5>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <td>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Kontak</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $penginapanList = App\Models\Penginapan::latest()->limit(5)->get(); @endphp
                @forelse($penginapanList as $item)
                <tr>
                    <td>{{ Str::limit($item->nama, 40) }}</td>
                    <td>{{ $item->harga ?? '-' }}</td>
                    <td>{{ $item->kontak ?? '-' }}</td>
                    <td>
                        @if($item->status)
                            <span class="badge-success badge">Aktif</span>
                        @else
                            <span class="badge-danger badge">Tidak</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.penginapan.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    </span>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center">Belum ada data Penginapan. <a href="{{ route('admin.penginapan.create') }}">Tambah Penginapan</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Galeri Terbaru -->
<div class="card-table">
    <h5>🖼️ Galeri Terbaru</h5>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $galeriList = App\Models\Galeri::latest()->limit(5)->get(); @endphp
                @forelse($galeriList as $item)
                <tr>
                    <tr>{{ Str::limit($item->judul, 40) }}</td>
                    <td>{{ $item->kategori ?? '-' }}</td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>
                        @if($item->status)
                            <span class="badge-success badge">Aktif</span>
                        @else
                            <span class="badge-danger badge">Tidak</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.galeri.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    </span>
                </tr>
                @empty
                <td><td colspan="5" class="text-center">Belum ada data Galeri</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Berita Terbaru -->
<div class="card-table">
    <h5>📰 Berita Terbaru</h5>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $beritaList = App\Models\Berita::latest()->limit(5)->get(); @endphp
                @forelse($beritaList as $item)
                <tr>
                    <td>{{ Str::limit($item->judul, 40) }}</td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>{{ $item->penulis ?? '-' }}</td>
                    <td>
                        @if($item->status)
                            <span class="badge-success badge">Publish</span>
                        @else
                            <span class="badge-danger badge">Draft</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    </span>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center">Belum ada data Berita</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Informasi Terbaru -->
<div class="card-table">
    <h5>📜 Informasi Terbaru (Sejarah Caldera Toba)</h5>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $informasiList = App\Models\Informasi::latest()->limit(5)->get(); @endphp
                @forelse($informasiList as $item)
                <tr>
                    <td>{{ Str::limit($item->judul, 50) }}</td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>
                        @if($item->status)
                            <span class="badge-success badge">Aktif</span>
                        @else
                            <span class="badge-danger badge">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.informasi.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    </span>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center">Belum ada data Informasi</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Quick Actions -->
<div class="action-buttons">
    <a href="{{ route('admin.galeri.create') }}" class="action-btn"><i class="fas fa-plus-circle"></i> Galeri</a>
    <a href="{{ route('admin.berita.create') }}" class="action-btn"><i class="fas fa-plus-circle"></i> Berita</a>
    <a href="{{ route('admin.informasi.create') }}" class="action-btn"><i class="fas fa-plus-circle"></i> Informasi</a>
    <a href="{{ route('admin.umkm.create') }}" class="action-btn"><i class="fas fa-plus-circle"></i> UMKM</a>
    <a href="{{ route('admin.fasilitas.create') }}" class="action-btn"><i class="fas fa-plus-circle"></i> Fasilitas</a>
    <a href="{{ route('admin.penginapan.create') }}" class="action-btn"><i class="fas fa-plus-circle"></i> Penginapan</a>
    <a href="{{ url('/') }}" target="_blank" class="action-btn"><i class="fas fa-globe"></i> Website</a>
</div>
@endsection