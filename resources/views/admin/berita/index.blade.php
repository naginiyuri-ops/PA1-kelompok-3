@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')
<style>
    .btn-add {
        background: #003366;
        color: white;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        display: inline-block;
        font-weight: 500;
        border: none;
        cursor: pointer;
    }
    .btn-add:hover {
        background: #002244;
    }
    .table-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
    }
    .badge-active {
        background: #28a745;
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        display: inline-block;
    }
    .badge-inactive {
        background: #dc3545;
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        display: inline-block;
    }
    
    /* TOMBOL SERAGAM UNTUK SEMUA ADMIN */
    .btn-edit {
        background: #ffc107;
        color: #333;
        padding: 5px 12px;
        border-radius: 4px;
        font-size: 0.7rem;
        text-decoration: none;
        display: inline-block;
        border: none;
        cursor: pointer;
    }
    .btn-delete {
        background: #dc3545;
        color: white;
        padding: 5px 12px;
        border-radius: 4px;
        font-size: 0.7rem;
        border: none;
        cursor: pointer;
    }
    .btn-status {
        background: #6c757d;
        color: white;
        padding: 5px 12px;
        border-radius: 4px;
        font-size: 0.7rem;
        border: none;
        cursor: pointer;
    }
    .btn-status-active {
        background: #28a745;
    }
    
    .table-responsive {
        overflow-x: auto;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 12px 10px;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }
    th {
        background: #f8f9fa;
        font-weight: 600;
    }
    .action-buttons {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }
    @media (max-width: 768px) {
        th, td {
            padding: 8px 6px;
            font-size: 0.75rem;
        }
        .table-img {
            width: 40px;
            height: 40px;
        }
        .btn-edit, .btn-delete, .btn-status {
            padding: 3px 8px;
            font-size: 0.65rem;
        }
    }
</style>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">
    <h4 style="margin: 0;">📰 Kelola Berita</h4>
    <a href="{{ route('admin.berita.create') }}" class="btn-add">+ Tambah Berita</a>
</div>

<div style="background: white; border-radius: 8px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 12px; border-radius: 6px; margin-bottom: 15px;">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 6px; margin-bottom: 15px;">
            ❌ {{ session('error') }}
        </div>
    @endif

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th width="50">NO</th>
                    <th width="70">GAMBAR</th>
                    <th>JUDUL</th>
                    <th>PENULIS</th>
                    <th>STATUS</th>
                    <th width="180">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($berita as $key => $item)
                <tr>
                    <td>{{ $key + $berita->firstItem() }}</td>
                    <td>
                        @php
                            $imgSrc = asset('image/default.jpg');
                            if (!empty($item->gambar)) {
                                if (str_starts_with($item->gambar, 'data:image')) {
                                    $imgSrc = $item->gambar;
                                } elseif (filter_var($item->gambar, FILTER_VALIDATE_URL)) {
                                    $imgSrc = $item->gambar;
                                } else {
                                    $imgSrc = asset('storage/' . $item->gambar);
                                }
                            }
                        @endphp
                        <img src="{{ $imgSrc }}" class="table-img">
                    </td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->penulis ?? 'Admin' }}</td>
                    <td>
                        <span class="{{ $item->status ? 'badge-active' : 'badge-inactive' }}">
                            {{ $item->status ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td class="action-buttons">
                        <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Yakin hapus berita ini?')">Hapus</button>
                        </form>
                        <button type="button" class="btn-status {{ $item->status ? '' : 'btn-status-active' }}" 
                                onclick="toggleStatus({{ $item->id }}, {{ $item->status }})">
                            Status
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 40px;">
                        📭 Belum ada berita
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div style="margin-top: 15px;">
        {{ $berita->links() }}
    </div>
</div>

<script>
    function toggleStatus(id, currentStatus) {
        const action = currentStatus ? 'nonaktifkan' : 'aktifkan';
        if (confirm(`Yakin ingin ${action} berita ini?`)) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `{{ url('admin/berita/toggle-status') }}/${id}`;
            form.innerHTML = `@csrf`;
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
@endsection