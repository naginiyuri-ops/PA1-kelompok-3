@extends('layouts.admin')

@section('title', 'Tambah Penginapan')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Tambah Data Penginapan</h5>
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
            
            <form action="{{ route('admin.penginapan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label>Nama Penginapan <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                
                <div class="mb-3">
                    <label>Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', 'Desa Meat') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Kontak</label>
                        <input type="text" name="kontak" class="form-control" value="{{ old('kontak') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control" value="{{ old('harga') }}" placeholder="Rp 250.000/malam">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Urutan <span class="text-danger">*</span></label>
                        <input type="number" name="urutan" class="form-control @error('urutan') is-invalid @enderror" value="{{ old('urutan', $nextUrutan ?? 1) }}" required>
                        <small class="text-muted">Semakin kecil angka, semakin atas tampilannya</small>
                        @error('urutan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Gambar (Max 5MB)</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/jpeg,image/png,image/jpg,image/webp">
                        <small class="text-muted">Format: JPG, PNG, WEBP. Max: 5MB</small>
                        @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <input type="checkbox" name="status" id="status" value="1" {{ old('status', 1) ? 'checked' : '' }}>
                    <label for="status"> Aktifkan Penginapan</label>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.penginapan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection