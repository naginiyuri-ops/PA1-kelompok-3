@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 20px;
        margin-bottom: 35px;
    }
    
    .stat-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border-radius: 20px;
        padding: 20px 15px;
        text-align: center;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        border: 1px solid rgba(0, 51, 102, 0.08);
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 51, 102, 0.12);
        border-color: rgba(198, 164, 59, 0.3);
    }
    
    .stat-number {
        font-size: 2rem;
        font-weight: 800;
        color: #003366;
        margin-bottom: 6px;
        font-family: 'Inter', sans-serif;
    }
    
    .stat-label {
        font-size: 0.7rem;
        color: #64748b;
        letter-spacing: 0.5px;
        font-weight: 600;
        text-transform: uppercase;
    }
    
    .card-table {
        background: white;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        margin-bottom: 30px;
    }
    
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 18px 24px;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-bottom: 1px solid #e2e8f0;
        flex-wrap: wrap;
        gap: 12px;
    }
    
    .card-header h5 {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 700;
        color: #003366;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .card-header h5 i {
        color: #c6a43b;
        font-size: 1.2rem;
    }
    
    .table-wrapper {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
    }
    
    thead {
        background: #f8fafc;
    }
    
    th {
        padding: 14px 16px;
        text-align: left;
        font-weight: 700;
        font-size: 0.75rem;
        color: #003366;
        border-bottom: 2px solid #e2e8f0;
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    td {
        padding: 14px 16px;
        border-bottom: 1px solid #eef2f6;
        vertical-align: middle;
        font-size: 0.85rem;
        color: #1e293b;
    }
    
    tbody tr:hover {
        background: #fafcff;
    }
    
    .badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 600;
    }
    
    .badge-success {
        background: #e8f5e9;
        color: #2e7d32;
        border: 1px solid #a5d6a7;
    }
    
    .badge-danger {
        background: #ffebee;
        color: #c62828;
        border: 1px solid #ef9a9a;
    }
    
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #94a3b8;
        font-size: 0.85rem;
    }
    
    .btn-action {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        color: white;
        padding: 10px 24px;
        border-radius: 12px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.8rem;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }
    
    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0, 51, 102, 0.3);
        color: white;
    }
    
    .footer-actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 20px;
        padding: 20px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    }
    
    @media (max-width: 1200px) {
        .stats-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }
    }
    
    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .card-header {
            padding: 14px 16px;
            flex-direction: column;
            align-items: flex-start;
        }
        
        th, td {
            padding: 10px 12px;
            font-size: 0.75rem;
        }
        
        .footer-actions {
            justify-content: center;
        }
    }
    
    @media (max-width: 480px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- STATISTIK -->
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

<!-- UMKM (HANYA TAMPIL) -->
<div class="card-table">
    <div class="card-header">
        <h5><i class="fas fa-store"></i> UMKM Terbaru</h5>
    </div>
    <div class="table-wrapper">
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
                    <td><strong>{{ $item->nama }}</strong></td>
                    <td>{{ $item->lokasi ?? '-' }}</td>
                    <td>{{ $item->kontak ?? '-' }}</td>
                    <td><span class="badge {{ $item->status ? 'badge-success' : 'badge-danger' }}">{{ $item->status ? 'Aktif' : 'Tidak' }}</span></td>
                </tr>
                @empty
                <tr><td colspan="5" class="empty-state">📭 Belum ada data UMKM</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- FASILITAS (HANYA TAMPIL) -->
<div class="card-table">
    <div class="card-header">
        <h5><i class="fas fa-building"></i> Fasilitas Terbaru</h5>
    </div>
    <div class="table-wrapper">
        <tr>
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
                    <td><strong>{{ $item->nama }}</strong></td>
                    <td>{{ $item->harga ?? 'Gratis' }}</td>
                    <td><span class="badge {{ $item->status ? 'badge-success' : 'badge-danger' }}">{{ $item->status ? 'Aktif' : 'Tidak' }}</span></td>
                </tr>
                @empty
                <tr><td colspan="4" class="empty-state">📭 Belum ada data Fasilitas</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- PENGINAPAN (HANYA TAMPIL) -->
<div class="card-table">
    <div class="card-header">
        <h5><i class="fas fa-hotel"></i> Penginapan Terbaru</h5>
    </div>
    <div class="table-wrapper">
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
                    <td><strong>{{ $item->nama }}</strong></td>
                    <td>{{ $item->harga ?? '-' }}</td>
                    <td>{{ $item->kontak ?? '-' }}</td>
                    <td><span class="badge {{ $item->status ? 'badge-success' : 'badge-danger' }}">{{ $item->status ? 'Aktif' : 'Tidak' }}</span></td>
                </tr>
                @empty
                <tr><td colspan="5" class="empty-state">📭 Belum ada data Penginapan</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- INFORMASI KONTAK -->
<div class="card-table">
    <div class="card-header">
        <h5><i class="fas fa-address-book"></i> Informasi Kontak</h5>
    </div>
    <div class="table-wrapper">
        @php $kontak = App\Models\Kontak::first(); @endphp
        <table>
            <tbody>
                <tr>
                    <td style="width: 130px; font-weight: 700; color: #003366;"><i class="fas fa-map-marker-alt me-2"></i> Alamat</td>
                    <td>{{ $kontak->alamat ?? 'Belum diisi' }}</td>
                </tr>
                <tr>
                    <td style="font-weight: 700; color: #003366;"><i class="fas fa-phone me-2"></i> Telepon</td>
                    <td>{{ $kontak->telepon ?? 'Belum diisi' }}</td>
                </tr>
                <tr>
                    <td style="font-weight: 700; color: #003366;"><i class="fas fa-envelope me-2"></i> Email</td>
                    <td>{{ $kontak->email ?? 'Belum diisi' }}</td>
                </tr>
                <tr>
                    <td style="font-weight: 700; color: #003366;"><i class="fas fa-map me-2"></i> Google Maps</td>
                    <td>
                        @if($kontak && $kontak->link_maps)
                            <a href="{{ $kontak->link_maps }}" target="_blank" style="color: #c6a43b;">Lihat Lokasi →</a>
                        @else
                            Belum diisi
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- FOOTER ACTIONS (TAMBAH ADMIN DI BAWAH KONTAK) -->
<div class="footer-actions">
    <a href="{{ route('admin.create') }}" class="btn-action">
        <i class="fas fa-user-plus"></i> Tambah Admin
    </a>
</div>

@endsection