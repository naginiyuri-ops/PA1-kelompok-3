@extends('layouts.admin')

@section('title', 'Manajemen Fasilitas')

@section('content')
@php use Illuminate\Support\Facades\Storage; @endphp

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">🗂️ Manajemen Fasilitas</h5>
    <a href="{{ route('admin.fasilitas.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Fasilitas
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th width="80">Gambar</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Harga</th>
                        <th width="80">Urutan</th>
                        <th width="80">Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $index => $item)
                    <tr>
                        <td>{{ $data->firstItem() + $index }}</td>
                        <td>
                            @php
                                $gambarUrl = null;
                                
                                if (!empty($item->gambar)) {
                                    if (str_starts_with($item->gambar, 'data:image')) {
                                        $gambarUrl = $item->gambar;
                                    }
                                    elseif (Storage::disk('public')->exists($item->gambar)) {
                                        $gambarUrl = asset('storage/' . $item->gambar);
                                    }
                                    elseif (filter_var($item->gambar, FILTER_VALIDATE_URL)) {
                                        $gambarUrl = $item->gambar;
                                    }
                                    elseif (file_exists(public_path($item->gambar))) {
                                        $gambarUrl = asset($item->gambar);
                                    }
                                }
                            @endphp
                            
                            @if($gambarUrl)
                                <img src="{{ $gambarUrl }}" 
                                     width="50" 
                                     height="50" 
                                     style="object-fit: cover; border-radius: 8px;"
                                     onerror="this.src='{{ asset('image/meat/slide3.jpg') }}'">
                            @else
                                <div class="bg-secondary text-white text-center" 
                                     style="width: 50px; height: 50px; line-height: 50px; border-radius: 8px;">
                                    <i class="fas fa-building"></i>
                                </div>
                            @endif
                        </td>
                        <td><strong>{{ $item->nama }}</strong></td>
                        <td>{{ $item->kontak ?? '-' }}</td>
                        <td>{{ $item->harga ?? 'Gratis' }}</td>
                        <td>{{ $item->urutan }}</td>
                        <td>
                            @if($item->status)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.fasilitas.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus fasilitas {{ $item->nama }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <i class="fas fa-building fa-2x text-muted mb-2 d-block"></i>
                                Belum ada data fasilitas
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3">
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection