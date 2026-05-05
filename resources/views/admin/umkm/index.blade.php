@extends('layouts.admin')

@section('title', 'Manajemen UMKM Meat')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h5>UMKM Meat</h5>
    <a href="{{ route('admin.umkm.create') }}" class="btn btn-primary">+ Tambah UMKM</a>
</div>

<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <table class="table table-bordered">
            <thead>
                <tr><th>No</th><th>Gambar</th><th>Nama</th><th>Lokasi</th><th>Urutan</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @foreach($umkm as $item)
                <tr>
                    <td>{{ $loop->iteration }}</span></td>
                    <td>@if($item->gambar)<img src="{{ $item->gambar }}" width="50">@endif</span></td>
                    <td>{{ $item->nama }}</span></td>
                    <td>{{ $item->lokasi }}</span></td>
                    <td>{{ $item->urutan }}</span></td>
                    <td>
                        <a href="{{ route('admin.umkm.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.umkm.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </span>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $umkm->links() }}
    </div>
</div>
@endsection