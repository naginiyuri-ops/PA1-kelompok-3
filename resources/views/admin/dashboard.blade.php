@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<style>
    /* ==================== STATS GRID ==================== */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 20px 15px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        border-left: 4px solid #c6a43b;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: #003366;
        margin-bottom: 8px;
        font-family: 'Playfair Display', serif;
    }
    
    .stat-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #64748b;
        font-weight: 600;
    }
    
    /* ==================== CARD TABLE ==================== */
    .card-table {
        background: white;
        border-radius: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 25px;
        overflow: hidden;
    }
    
    .card-header {
        padding: 16px 20px;
        border-bottom: 1px solid #e2e8f0;
        background: #f8fafc;
    }
    
    .card-header h5 {
        font-size: 1rem;
        font-weight: 700;
        color: #003366;
        margin: 0;
    }
    
    .card-header h5 i {
        color: #c6a43b;
        margin-right: 8px;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
    }
    
    th {
        text-align: left;
        padding: 12px 16px;
        background: #f1f5f9;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #475569;
        border-bottom: 1px solid #e2e8f0;
    }
    
    td {
        padding: 12px 16px;
        font-size: 0.85rem;
        color: #1e293b;
        border-bottom: 1px solid #f1f5f9;
    }
    
    tr:hover {
        background: #f8fafc;
    }
    
    .badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.65rem;
        font-weight: 600;
    }
    
    .badge-success {
        background: #dcfce7;
        color: #166534;
    }
    
    .badge-danger {
        background: #fee2e2;
        color: #991b1b;
    }
    
    .empty-state {
        text-align: center;
        padding: 40px !important;
        color: #94a3b8;
        font-size: 0.85rem;
    }
    
    /* ==================== QUICK ACTIONS ==================== */
    .quick-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 16px;
        padding-bottom: 20px;
    }
    
    .btn-action {
        background: #f1f5f9;
        color: #003366;
        padding: 10px 20px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-action i {
        color: #c6a43b;
        font-size: 0.85rem;
    }
    
    .btn-action:hover {
        background: #c6a43b;
        color: #003366;
        transform: translateY(-2px);
    }
    
    .btn-action:hover i {
        color: #003366;
    }
    
    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }
        
        .stat-number {
            font-size: 1.8rem;
        }
        
        th, td {
            padding: 10px 12px;
            font-size: 0.75rem;
        }
        
        .card-header {
            padding: 12px 16px;
        }
        
        .quick-actions {
            justify-content: center;
        }
        
        .btn-action {
            padding: 8px 14px;
            font-size: 0.7rem;
        }
    }
    
    @media (max-width: 480px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .stat-card {
            padding: 15px;
        }
        
        .stat-number {
            font-size: 1.5rem;
        }
    }
</style>

<!-- ==================== STATISTIK ==================== -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-number">{{ $totalGaleri ?? 0 }}</div>
        <div class="stat-label">Galeri</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalBerita ?? 0 }}</div>
        <div class="stat-label">Berita</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalInformasi ?? 0 }}</div>
        <div class="stat-label">Informasi</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalUmkm ?? 0 }}</div>
        <div class="stat-label">UMKM</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalFasilitas ?? 0 }}</div>
        <div class="stat-label">Fasilitas</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $totalPenginapan ?? 0 }}</div>
        <div class="stat-label">Penginapan</div>
    </div>
</div>

<!-- ==================== UMKM TERBARU (READ ONLY) ==================== -->
<div class="card-table">
    <div class="card-header">
        <h5><i class="fas fa-store"></i> UMKM Terbaru</h5>
    </div>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Kontak</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php $umkmList = App\Models\Umkm::latest()->limit(5)->get(); @endphp
                @forelse($umkmList as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->lokasi ?? '-' }}</td>
                    <td>{{ $item->kontak ?? '-' }}</td>
                    <td><span class="badge {{ $item->status ? 'badge-success' : 'badge-danger' }}">{{ $item->status ? 'Aktif' : 'Tidak' }}</span></td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty-state">📭 Belum ada data UMKM</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ==================== FASILITAS TERBARU (READ ONLY) ==================== -->
<div class="card-table">
    <div class="card-header">
        <h5><i class="fas fa-tools"></i> Fasilitas Terbaru</h5>
    </div>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php $fasilitasList = App\Models\Fasilitas::latest()->limit(5)->get(); @endphp
                @forelse($fasilitasList as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->harga ?? 'Gratis' }}</td>
                    <td><span class="badge {{ $item->status ? 'badge-success' : 'badge-danger' }}">{{ $item->status ? 'Aktif' : 'Tidak' }}</span></td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="empty-state">📭 Belum ada data Fasilitas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ==================== PENGINAPAN TERBARU (READ ONLY) ==================== -->
<div class="card-table">
    <div class="card-header">
        <h5><i class="fas fa-hotel"></i> Penginapan Terbaru</h5>
    </div>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Kontak</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php $penginapanList = App\Models\Penginapan::latest()->limit(5)->get(); @endphp
                @forelse($penginapanList as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->harga ?? '-' }}</td>
                    <td>{{ $item->kontak ?? '-' }}</td>
                    <td><span class="badge {{ $item->status ? 'badge-success' : 'badge-danger' }}">{{ $item->status ? 'Aktif' : 'Tidak' }}</span></td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty-state">📭 Belum ada data Penginapan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ==================== QUICK ACTIONS (CARD UI ONLY - TOMBOL DICABUT) ==================== -->
<div class="quick-actions">
    <div class="btn-action">
        <i class="fas fa-images"></i> Galeri
    </div>
    <div class="btn-action">
        <i class="fas fa-newspaper"></i> Berita
    </div>
    <div class="btn-action">
        <i class="fas fa-info-circle"></i> Informasi
    </div>
    <div class="btn-action">
        <i class="fas fa-store"></i> UMKM
    </div>
    <div class="btn-action">
        <i class="fas fa-tools"></i> Fasilitas
    </div>
    <div class="btn-action">
        <i class="fas fa-hotel"></i> Penginapan
    </div>
    <div class="btn-action">
        <i class="fas fa-user-plus"></i> Tambah Admin
    </div>
</div>

@endsection