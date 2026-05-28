@extends('layouts.admin')

@section('title', 'Edit Penginapan')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Edit Data Penginapan</h5>
            <a href="{{ route('admin.penginapan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <form action="{{ route('admin.penginapan.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label>Nama Penginapan <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $data->nama) }}" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                
                <div class="mb-3">
                    <label>Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $data->deskripsi) }}</textarea>
                    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $data->lokasi) }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Kontak</label>
                        <input type="text" name="kontak" class="form-control" value="{{ old('kontak', $data->kontak) }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control" value="{{ old('harga', $data->harga) }}">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Urutan <span class="text-danger">*</span></label>
                        <input type="number" name="urutan" class="form-control @error('urutan') is-invalid @enderror" value="{{ old('urutan', $data->urutan) }}" required>
                        <small class="text-muted">Semakin kecil angka, semakin atas tampilannya</small>
                        @error('urutan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Gambar Saat Ini</label><br>
                        @if($data->gambar)
                            <img src="{{ asset('storage/' . $data->gambar) }}" width="80" height="80" style="object-fit: cover; border-radius: 8px;">
                            <div class="mt-2">
                                <input type="checkbox" name="hapus_gambar" id="hapus_gambar" value="1">
                                <label for="hapus_gambar" class="text-danger"> Hapus gambar ini</label>
                            </div>
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </div>
                </div>
                
                <div class="mb-3">
                    <label>Ganti Gambar (Max 5MB)</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/jpeg,image/png,image/jpg,image/webp">
                    <small class="text-muted">Format: JPG, PNG, WEBP. Max: 5MB</small>
                    @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                
                <div class="mb-3">
                    <input type="checkbox" name="status" id="status" value="1" {{ old('status', $data->status) ? 'checked' : '' }}>
                    <label for="status"> Aktifkan Penginapan</label>
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.penginapan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection