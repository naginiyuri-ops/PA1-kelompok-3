@extends('layouts.admin')

@section('title', 'Kelola Informasi')

@section('content')
<style>
    .btn-action { margin: 0 2px; }
    .table img { 
        width: 50px; 
        height: 50px; 
        object-fit: cover; 
        border-radius: 8px; 
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">
        <i class="fas fa-info-circle me-2"></i> Kelola Informasi
    </h4>
    <a href="{{ route('admin.informasi.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Informasi
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr class="text-center">
                        <th width="50">NO</th>
                        <th>JUDUL</th>
                        <th width="100">GAMBAR</th>
                        <th width="100">STATUS</th>
                        <th width="150">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($informasi as $key => $item)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $item->judul }}</td>
                        <td class="text-center">
                            @if($item->gambar && str_contains($item->gambar, 'base64'))
                                <img src="{{ $item->gambar }}" alt="{{ $item->judul }}">
                            @elseif($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
                            @else
                                <img src="{{ asset('image/default.jpg') }}" alt="No Image">
                            @endif
                        </td>
                        <td class="text-center">
                            <span class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $item->status ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.informasi.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.informasi.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            <button type="button" class="btn btn-sm {{ $item->status ? 'btn-secondary' : 'btn-success' }}" 
                                    onclick="toggleStatus({{ $item->id }}, {{ $item->status }})">
                                <i class="fas {{ $item->status ? 'fa-ban' : 'fa-check' }}"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <i class="fas fa-database fa-2x text-muted mb-2 d-block"></i>
                            Belum ada data informasi
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-end">
            {{ $informasi->links() }}
        </div>
    </div>
</div>

<script>
    function toggleStatus(id, currentStatus) {
        const action = currentStatus ? 'nonaktifkan' : 'aktifkan';
        if (confirm(`Yakin ingin ${action} informasi ini?`)) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `{{ url('admin/informasi/toggle-status') }}/${id}`;
            form.innerHTML = `@csrf`;
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
@endsection