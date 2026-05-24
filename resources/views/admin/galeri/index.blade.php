@extends('layouts.admin')

@section('title', 'Galeri')

@section('content')
<div class="card-table">
    <div class="card-header">
        <h5><i class="fas fa-images"></i> Data Galeri</h5>
        <a href="{{ route('admin.galeri.create') }}" class="btn-primary">+ Tambah Galeri</a>
    </div>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeri as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        @if($item->gambar)
                            <img src="{{ $item->gambar }}" class="img-preview" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                        @else
                            <div class="img-placeholder" style="width: 50px; height: 50px; background: #f1f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 10px;">No Image</div>
                        @endif
                    </td>
                    <td>{{ Str::limit($item->judul, 30) }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>
                        <span class="badge {{ $item->status ? 'badge-success' : 'badge-danger' }}">
                            {{ $item->status ? 'Aktif' : 'Tidak' }}
                        </span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('admin.galeri.edit', $item->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="empty-state" style="text-align: center; padding: 40px;">📭 Belum ada data galeri</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pagination">
        {{ $galeri->links() }}
    </div>
</div>
@endsection