{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<style>
    /* ==================== CORE DECORATIONS ==================== */
    .dash-welcome {
        margin-bottom: 20px;
    }
    .dash-welcome h4 {
        margin: 0;
        font-size: 1.2rem;
        color: #003366;
        font-weight: 700;
    }
    .dash-welcome p {
        margin: 3px 0 0 0;
        font-size: 0.8rem;
        color: #64748b;
    }

    /* ==================== STATS GRID (COMPACT) ==================== */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 12px;
        margin-bottom: 24px;
    }
    
    .stat-card {
        background: white;
        padding: 14px 16px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        display: flex;
        flex-direction: column;
        justify-content: center;
        transition: transform 0.2s;
    }
    
    .stat-card:hover {
        transform: translateY(-2px);
    }

    .stat-number {
        font-size: 1.35rem;
        font-weight: 700;
        color: #003366;
        line-height: 1;
        margin-bottom: 4px;
    }
    
    .stat-label {
        font-size: 0.75rem;
        color: #64748b;
        font-weight: 500;
    }

    /* ==================== CARD TABLE STYLES ==================== */
    .card-table {
        background: white;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        margin-bottom: 20px;
        overflow: hidden;
    }
    
    .card-header {
        padding: 12px 16px;
        border-bottom: 1px solid #e2e8f0;
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .card-header h5 {
        font-size: 0.85rem;
        font-weight: 700;
        color: #003366;
        margin: 0;
    }
    
    .card-header h5 i {
        color: #003366;
        margin-right: 6px;
    }

    /* ==================== BUTTONS (PROPORSIONAL) ==================== */
    .btn-primary-sm {
        background: #003366;
        color: white;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    .btn-primary-sm:hover {
        background: #1a4a7a;
        color: white;
    }

    .btn-group-action {
        display: flex;
        gap: 6px;
    }

    .btn-action-edit {
        background: #eff6ff;
        color: #2563eb;
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 0.725rem;
        font-weight: 600;
        text-decoration: none;
    }
    .btn-action-edit:hover { background: #dbeafe; }

    .btn-action-delete {
        background: #fee2e2;
        color: #dc2626;
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 0.725rem;
        font-weight: 600;
        border: none;
        cursor: pointer;
    }
    .btn-action-delete:hover { background: #fecaca; }

    /* ==================== COMPACT TABLE STYLES ==================== */
    table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }
    
    th {
        background: #f8fafc;
        color: #475569;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 10px 16px;
        border-bottom: 1px solid #e2e8f0;
        text-transform: uppercase;
        letter-spacing: 0.02em;
    }
    
    td {
        padding: 10px 16px;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        font-size: 0.8rem;
        white-space: nowrap;
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover td {
        background-color: #f8fafc;
    }

    /* ==================== BADGES ==================== */
    .badge-status {
        display: inline-flex;
        padding: 2px 8px;
        font-size: 0.7rem;
        font-weight: 600;
        border-radius: 12px;
    }
    .badge-active { background: #dcfce7; color: #166534; }
    .badge-inactive { background: #f1f5f9; color: #475569; }

    .empty-state {
        text-align: center;
        color: #94a3b8;
        font-size: 0.775rem;
        padding: 20px !important;
    }

    /* ==================== QUICK ACTIONS DOCK ==================== */
    .quick-actions-bar {
        background: #f8fafc;
        border: 1px dashed #cbd5e1;
        padding: 12px;
        border-radius: 10px;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 24px;
        align-items: center;
    }
    .quick-actions-bar span {
        font-size: 0.75rem;
        font-weight: 700;
        color: #475569;
        margin-right: 4px;
    }
</style>

<div class="dash-welcome">
    <h4>Dashboard Admin</h4>
    <p>Ringkasan data operasional website GeoToba Desa Meat.</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-number">{{ $totalGaleri ?? 0 }}</div>
        <div class="stat-label">Total Galeri</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalBerita ?? 0 }}</div>
        <div class="stat-label">Total Berita</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalInformasi ?? 0 }}</div>
        <div class="stat-label">Total Informasi</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalSejarah ?? 0 }}</div>
        <div class="stat-label">Total Sejarah Wisata</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalUmkm ?? 0 }}</div>
        <div class="stat-label">Lapak UMKM</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalFasilitas ?? 0 }}</div>
        <div class="stat-label">Fasilitas Desa</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalPenginapan ?? 0 }}</div>
        <div class="stat-label">Penginapan</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalBiodiversitas ?? 0 }}</div>
        <div class="stat-label">Biodiversitas</div>
    </div>
</div>

<!-- SEJARAH WISATA TERBARU -->
<div class="card-table">
    <div class="card-header">
        <h5><i class="fas fa-history"></i> Sejarah Wisata Terbaru</h5>
        <a href="{{ route('admin.sejarah-wisata.create') }}" class="btn-primary-sm">+ Tambah</a>
    </div>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Judul</th>
                    <th>Geosite</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th style="width: 120px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $sejarahList = App\Models\SejarahWisata::latest()->limit(5)->get(); @endphp
                @forelse($sejarahList as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td style="font-weight: 600; color: #003366;">{{ Str::limit($item->judul, 30) }}</td>
                    <td>
                        <span class="badge-status" style="background: #e3f2fd; color: #1565c0;">
                            {{ $item->geosite_label }}
                        </span>
                    </td>
                    <td>
                        <span class="badge-status" style="background: #f3e5f5; color: #7b1fa2;">
                            {{ $item->kategori_label }}
                        </span>
                    </td>
                    <td>
                        <span class="badge-status {{ $item->status ? 'badge-active' : 'badge-inactive' }}">
                            {{ $item->status ? 'Aktif' : 'Tidak' }}
                        </span>
                    </td>
                    <td>
                        <div class="btn-group-action" style="justify-content: center;">
                            <a href="{{ route('admin.sejarah-wisata.show', $item->id) }}" class="btn-action-edit" style="background: #e8f5e9; color: #2e7d32;">Lihat</a>
                            <a href="{{ route('admin.sejarah-wisata.edit', $item->id) }}" class="btn-action-edit">Edit</a>
                            <form action="{{ route('admin.sejarah-wisata.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="empty-state">📭 Belum ada data Sejarah Wisata</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="card-table">
    <div class="card-header">
        <h5><i class="fas fa-store"></i> UMKM Terbaru</h5>
        <a href="{{ route('admin.umkm.create') }}" class="btn-primary-sm">+ UMKM</a>
    </div>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Nama Lapak</th>
                    <th>Lokasi</th>
                    <th>Kontak</th>
                    <th>Status</th>
                    <th style="width: 120px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $umkmList = App\Models\Umkm::latest()->limit(5)->get(); @endphp
                @forelse($umkmList as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td style="font-weight: 600; color: #003366;">{{ $item->nama }}</td>
                    <td>{{ $item->lokasi ?? '-' }}</td>
                    <td>{{ $item->kontak ?? '-' }}</td>
                    <td>
                        <span class="badge-status {{ $item->status ? 'badge-active' : 'badge-inactive' }}">
                            {{ $item->status ? 'Aktif' : 'Tidak' }}
                        </span>
                    </td>
                    <td>
                        <div class="btn-group-action" style="justify-content: center;">
                            <a href="{{ route('admin.umkm.edit', $item->id) }}" class="btn-action-edit">Edit</a>
                            <form action="{{ route('admin.umkm.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus UMKM {{ $item->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="empty-state">📭 Belum ada data UMKM baru</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="card-table">
    <div class="card-header">
        <h5><i class="fas fa-tools"></i> Fasilitas Terbaru</h5>
        <a href="{{ route('admin.fasilitas.create') }}" class="btn-primary-sm">+ Fasilitas</a>
    </div>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Nama Fasilitas</th>
                    <th>Harga / Tarif</th>
                    <th>Status</th>
                    <th style="width: 120px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $fasilitasList = App\Models\Fasilitas::latest()->limit(5)->get(); @endphp
                @forelse($fasilitasList as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td style="font-weight: 600; color: #003366;">{{ $item->nama }}</td>
                    <td>{{ $item->harga ?? 'Gratis' }}</td>
                    <td>
                        <span class="badge-status {{ $item->status ? 'badge-active' : 'badge-inactive' }}">
                            {{ $item->status ? 'Aktif' : 'Tidak' }}
                        </span>
                    </td>
                    <td>
                        <div class="btn-group-action" style="justify-content: center;">
                            <a href="{{ route('admin.fasilitas.edit', $item->id) }}" class="btn-action-edit">Edit</a>
                            <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus fasilitas {{ $item->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="empty-state">📭 Belum ada data Fasilitas baru</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="card-table">
    <div class="card-header">
        <h5><i class="fas fa-hotel"></i> Penginapan Terbaru</h5>
        <a href="{{ route('admin.penginapan.create') }}" class="btn-primary-sm">+ Penginapan</a>
    </div>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Nama Penginapan</th>
                    <th>Harga / Malam</th>
                    <th>Kontak Pemilik</th>
                    <th>Status</th>
                    <th style="width: 120px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $penginapanList = App\Models\Penginapan::latest()->limit(5)->get(); @endphp
                @forelse($penginapanList as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td style="font-weight: 600; color: #003366;">{{ $item->nama }}</td>
                    <td>{{ $item->harga ?? '-' }}</td>
                    <td>{{ $item->kontak ?? '-' }}</td>
                    <td>
                        <span class="badge-status {{ $item->status ? 'badge-active' : 'badge-inactive' }}">
                            {{ $item->status ? 'Aktif' : 'Tidak' }}
                        </span>
                    </td>
                    <td>
                        <div class="btn-group-action" style="justify-content: center;">
                            <a href="{{ route('admin.penginapan.edit', $item->id) }}" class="btn-action-edit">Edit</a>
                            <form action="{{ route('admin.penginapan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus penginapan {{ $item->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="empty-state">📭 Belum ada data Penginapan baru</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="quick-actions-bar">
    <span><i class="fas fa-bolt"></i> Pintasan:</span>
    <a href="{{ route('admin.sejarah-wisata.create') }}" class="btn-primary-sm"><i class="fas fa-plus"></i> Sejarah</a>
    <a href="{{ route('admin.galeri.create') }}" class="btn-primary-sm"><i class="fas fa-plus"></i> Galeri</a>
    <a href="{{ route('admin.berita.create') }}" class="btn-primary-sm"><i class="fas fa-plus"></i> Berita</a>
    <a href="{{ route('admin.informasi.create') }}" class="btn-primary-sm"><i class="fas fa-plus"></i> Info</a>
    <a href="{{ route('admin.create') }}" class="btn-primary-sm" style="background-color: #475569;"><i class="fas fa-user-plus"></i> Admin Baru</a>
</div>

@endsection