@extends('layouts.admin')

@section('title', 'Manajemen Penginapan Meat')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5><i class="fas fa-hotel"></i> Penginapan Meat</h5>
            <a href="{{ route('admin.penginapan.create') }}" class="btn btn-primary">+ Tambah Penginapan</a>
        </div>
        
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th width="50">NO</th>
                            <th width="80">GAMBAR</th>
                            <th>NAMA</th>
                            <th>LOKASI</th>
                            <th>KONTAK</th>
                            <th>HARGA</th>
                            <th width="80">URUTAN</th>
                            <th width="80">STATUS</th>
                            <th width="120">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $key => $item)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">
                                <img src="{{ $item->gambar_url ?? asset('image/meat/slide2.jpg') }}" 
                                     width="50" height="50" 
                                     style="object-fit: cover; border-radius: 8px;"
                                     onerror="this.src='{{ asset('image/meat/slide2.jpg') }}'">
                            </td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->lokasi ?? 'Desa Meat' }}</td>
                            <td>{{ $item->kontak ?? '-' }}</td>
                            <td>{{ $item->harga ?? 'Hubungi pengelola' }}</td>
                            <td class="text-center">{{ $item->urutan }}</td>
                            <td class="text-center">
                                @if($item->status)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.penginapan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.penginapan.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <i class="fas fa-hotel fa-2x mb-2 d-block text-muted"></i>
                                Belum ada data Penginapan. Silakan tambahkan data.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
@endsection