@extends('layouts.admin')

@section('title', 'Manajemen UMKM Meat')

@section('content')
<div class="card">
    <div class="card-header">
        <h5><i class="fas fa-store"></i> UMKM Meat</h5>
        <a href="{{ route('admin.umkm.create') }}" class="btn btn-primary">+ Tambah UMKM</a>
    </div>
    
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>GAMBAR</th>
                    <th>NAMA</th>
                    <th>LOKASI</th>
                    <th>KONTAK</th>
                    <th>URUTAN</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        @if($item->gambar)
                            <img src="{{ $item->gambar }}" width="50" height="50" style="object-fit: cover;">
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->lokasi ?? '-' }}</td>
                    <td>{{ $item->kontak ?? '-' }}</td>
                    <td>{{ $item->urutan }}</td>
                    <td>
                        <span class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }}">
                            {{ $item->status ? 'Aktif' : 'Tidak' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.umkm.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.umkm.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center">Belum ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection