@extends('layouts.admin')

@section('title', 'Kelola Galeri')

@section('content')
<style>
    .table img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
    }
    .btn-action {
        margin: 0 2px;
    }
    .badge-status {
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.7rem;
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">
        <i class="fas fa-images me-2"></i> Kelola Galeri
    </h4>
    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Galeri
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr class="text-center">
                        <th width="50">NO</th>
                        <th width="80">GAMBAR</th>
                        <th>JUDUL</th>
                        <th>KATEGORI</th>
                        <th width="100">STATUS</th>
                        <th width="150">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galeris as $key => $item)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-center">
                            @php
                                $gambarSrc = asset('image/default.jpg');
                                if (!empty($item->gambar)) {
                                    if (str_starts_with($item->gambar, 'data:image')) {
                                        $gambarSrc = $item->gambar;
                                    } else {
                                        $gambarSrc = asset('storage/' . $item->gambar);
                                    }
                                }
                            @endphp
                            <img src="{{ $gambarSrc }}" alt="{{ $item->judul }}">
                        </td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            <span class="badge bg-secondary">{{ ucfirst($item->kategori) }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge-status {{ $item->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $item->status ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.galeri.edit', $item->id) }}" class="btn btn-sm btn-warning btn-action">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger btn-action" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            <button type="button" class="btn btn-sm {{ $item->status ? 'btn-secondary' : 'btn-success' }} btn-action" 
                                    onclick="toggleStatus({{ $item->id }}, {{ $item->status }})">
                                <i class="fas {{ $item->status ? 'fa-ban' : 'fa-check' }}"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-images fa-2x text-muted mb-2 d-block"></i>
                            Belum ada data galeri
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-end">
            {{ $galeris->links() }}
        </div>
    </div>
</div>

<script>
    function toggleStatus(id, currentStatus) {
        const action = currentStatus ? 'nonaktifkan' : 'aktifkan';
        if (confirm(`Yakin ingin ${action} galeri ini?`)) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `{{ url('admin/galeri/toggle-status') }}/${id}`;
            form.innerHTML = `@csrf`;
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
@endsection