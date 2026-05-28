@extends('layouts.admin')

@section('title', 'Edit UMKM')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Edit Data UMKM</h5>
            <a href="{{ route('admin.umkm.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.umkm.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label>Nama UMKM <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $data->nama) }}" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                
                <div class="mb-3">
                    <label>Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $data->deskripsi) }}</textarea>
                    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $data->lokasi) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Kontak</label>
                        <input type="text" name="kontak" class="form-control" value="{{ old('kontak', $data->kontak) }}">
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
                            <img src="{{ $data->gambar_url }}" width="80" height="80" style="object-fit: cover; border-radius: 8px;">
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
                    <label>Ganti Gambar</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/jpeg,image/png,image/jpg,image/webp">
                    <small class="text-muted">Format: JPG, PNG, WEBP. Max: 10MB</small>
                    @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                
                <div class="mb-3">
                    <input type="checkbox" name="status" id="status" value="1" {{ old('status', $data->status) ? 'checked' : '' }}>
                    <label for="status"> Aktifkan UMKM</label>
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.umkm.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection