@extends('layouts.admin')

@section('title', 'Edit Fasilitas')

@section('content')
@php use Illuminate\Support\Facades\Storage; @endphp

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0 rounded-4">
                
                <div class="card-header bg-primary text-white rounded-top-4 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0 fw-bold">
                                <i class="fas fa-edit me-2"></i> Edit Fasilitas
                            </h4>
                            <small>Perbarui data fasilitas</small>
                        </div>
                        <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>

                <div class="card-body p-4">

                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>❌ Terjadi kesalahan:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form action="{{ route('admin.fasilitas.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Fasilitas <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $data->nama) }}" required>
                            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5" required>{{ old('deskripsi', $data->deskripsi) }}</textarea>
                            @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Kontak</label>
                                <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror" placeholder="Contoh: 0812xxxx" value="{{ old('kontak', $data->kontak) }}">
                                @error('kontak') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Harga</label>
                                <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Contoh: Gratis / Rp 50.000" value="{{ old('harga', $data->harga) }}">
                                @error('harga') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Urutan Tampil <span class="text-danger">*</span></label>
                                <input type="number" name="urutan" class="form-control @error('urutan') is-invalid @enderror" value="{{ old('urutan', $data->urutan) }}" required>
                                @error('urutan') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <!-- GAMBAR SAAT INI -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Gambar Saat Ini</label>
                            <div class="border rounded-4 p-3 bg-light text-center">
                                @php
                                    $currentImage = null;
                                    if (!empty($data->gambar)) {
                                        if (Storage::disk('public')->exists($data->gambar)) {
                                            $currentImage = asset('storage/' . $data->gambar);
                                        } elseif (filter_var($data->gambar, FILTER_VALIDATE_URL)) {
                                            $currentImage = $data->gambar;
                                        }
                                    }
                                @endphp
                                
                                @if($currentImage)
                                    <div class="text-center">
                                        <img src="{{ $currentImage }}" 
                                             class="img-thumbnail rounded-4 shadow-sm mb-3" 
                                             style="max-width: 150px; max-height: 150px; object-fit: cover;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="hapus_gambar" id="hapusGambar" value="1">
                                            <label class="form-check-label text-danger" for="hapusGambar">
                                                <i class="fas fa-trash"></i> Hapus gambar ini
                                            </label>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-muted mb-0 text-center">Belum ada gambar</p>
                                @endif
                            </div>
                        </div>

                        <!-- UPLOAD GAMBAR BARU -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Ganti dengan Gambar Baru</label>
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/jpeg,image/png,image/jpg" id="inputGambar">
                            <small class="text-muted">Format: JPG, PNG. Maksimal 2MB</small>
                            @error('gambar') <small class="text-danger">{{ $message }}</small> @enderror
                            
                            <div class="mt-3 text-center" id="previewContainer" style="display: none;">
                                <p class="text-muted mb-2">Preview Gambar Baru</p>
                                <img id="previewImage" class="img-thumbnail rounded-4 shadow-sm" style="max-width: 200px;">
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="status" value="1" class="form-check-input" id="status" {{ old('status', $data->status) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="status">Aktifkan Fasilitas</label>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-outline-secondary rounded-3 px-4">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary rounded-3 px-4">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('inputGambar')?.addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewContainer = document.getElementById('previewContainer');
        const previewImage = document.getElementById('previewImage');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = 'none';
            previewImage.src = '';
        }
    });
</script>
@endsection