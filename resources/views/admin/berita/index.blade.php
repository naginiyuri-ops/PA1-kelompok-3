{{-- resources/views/admin/berita/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manajemen Berita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">
        <i class="fas fa-newspaper me-2" style="color: #c6a43b;"></i>
        Manajemen Berita
    </h5>
    <a href="{{ route('admin.berita.create') }}" class="btn" style="background: #c6a43b; color: #003366;">
        <i class="fas fa-plus me-2"></i> Tambah Berita
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
        
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th width="5%">#</th>
                        <th width="15%">Gambar</th>
                        <th width="30%">Judul</th>
                        <th width="15%">Penulis</th>
                        <th width="10%">Views</th>
                        <th width="10%">Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($berita as $item)
                    <tr>
                        <td>{{ $loop->iteration + ($berita->currentPage() - 1) * $berita->perPage() }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ $item->gambar }}" width="60" height="50" style="object-fit: cover; border-radius: 8px;">
                            @else
                                <div style="width:60px;height:50px;background:#e8e8e8;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ Str::limit($item->judul, 50) }}</strong>
                            <br>
                            <small class="text-muted">{{ Str::limit($item->excerpt, 60) }}</small>
                        </td>
                        <td>{{ $item->penulis }}</td>
                        <td>{{ number_format($item->views) }}</td>
                        <td>
                            @if($item->status)
                                <span class="badge bg-success">Publish</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" class="d-inline" 
                                      onsubmit="return confirm('Yakin ingin menghapus berita {{ $item->judul }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ url('/berita/' . $item->slug) }}" target="_blank" class="btn btn-sm btn-outline-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="fas fa-newspaper fa-3x text-muted mb-3 d-block"></i>
                            <p class="text-muted">Belum ada data berita</p>
                            <a href="{{ route('admin.berita.create') }}" class="btn btn-sm" style="background: #c6a43b; color: #003366;">
                                <i class="fas fa-plus me-1"></i> Tambah Berita Pertama
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            {{ $berita->links() }}
        </div>
    </div>
</div>
@endsection