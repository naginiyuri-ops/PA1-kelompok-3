@extends('layouts.admin')

@section('title', 'Manajemen UMKM Meat')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5><i class="fas fa-store"></i> UMKM Meat</h5>
            <a href="{{ route('admin.umkm.create') }}" class="btn btn-primary">+ Tambah UMKM</a>
        </div>
        
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th width="50">NO</th>
                            <th width="80">GAMBAR</th>
                            <th>NAMA</th>
                            <th>LOKASI</th>
                            <th>KONTAK</th>
                            <th width="80">URUTAN</th>
                            <th width="100">STATUS</th>
                            <th width="150">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $key => $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                <img src="{{ $item->gambar_url }}" 
                                     width="50" height="50" 
                                     style="object-fit: cover; border-radius: 8px;"
                                     onerror="this.src='{{ asset('image/meat/slide1.jpg') }}'">
                            </td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->lokasi ?? '-' }}</td>
                            <td>{{ $item->kontak ?? '-' }}</td>
                            <td class="text-center">{{ $item->urutan }}</td>
                            <td class="text-center">
                                <span class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }}">
                                    {{ $item->status ? 'Aktif' : 'Tidak' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.umkm.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.umkm.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <i class="fas fa-store fa-2x mb-2 d-block text-muted"></i>
                                Belum ada data UMKM
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection