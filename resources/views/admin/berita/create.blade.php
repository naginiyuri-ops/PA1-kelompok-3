{{-- resources/views/admin/galeri/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Galeri')

@section('content')
<style>
    .preview-image {
        max-width: 250px;
        border-radius: 8px;
        margin-top: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .required:after {
        content: " *";
        color: red;
    }
</style>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-plus-circle me-2" style="color: #c6a43b;"></i>
            Tambah Galeri Baru
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Judul Foto</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                           value="{{ old('judul') }}" required placeholder="Contoh: Pantai Meat Sunset">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Kategori</label>
                    <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Meat" {{ old('kategori') == 'Meat' ? 'selected' : '' }}>🌾 Meat</option>
                        <option value="Batu Bahisan" {{ old('kategori') == 'Batu Bahisan' ? 'selected' : '' }}>⛰️ Batu Bahisan</option>
                        <option value="Liang Sipege" {{ old('kategori') == 'Liang Sipege' ? 'selected' : '' }}>🕳️ Liang Sipege</option>
                    </select>
                    <small class="text-muted">Pilih kategori untuk menentukan folder penyimpanan gambar</small>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" 
                              rows="4" required placeholder="Deskripsikan foto ini...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Gambar</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" 
                           accept="image/jpeg,image/png,image/jpg" id="inputGambar" required>
                    <small class="text-muted">Format: JPG, JPEG, PNG. Max: 5MB</small>
                    <div id="previewContainer" class="mt-2"></div>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}" 
                           placeholder="Contoh: Desa Meat, Pulau Sibandang">
                    <small class="text-muted">Opsional, lokasi spesifik foto</small>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Foto</label>
                    <input type="date" name="tanggal_foto" class="form-control" value="{{ old('tanggal_foto', date('Y-m-d')) }}">
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" name="status" value="1" id="statusCheck" checked>
                        <label class="form-check-label" for="statusCheck">
                            <i class="fas fa-check-circle text-success me-1"></i> Aktifkan (ditampilkan di website)
                        </label>
                    </div>
                </div>
            </div>
            
            <hr>
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn" style="background: #c6a43b; color: #003366;">
                    <i class="fas fa-save me-2"></i> Simpan
                </button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // Preview gambar sebelum upload
    document.getElementById('inputGambar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewContainer = document.getElementById('previewContainer');
        
        if (file) {
            // Cek ukuran file (max 5MB)
            if (file.size > 5 * 1024 * 1024) {
                previewContainer.innerHTML = `
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-triangle me-2"></i> 
                        Ukuran file terlalu besar! Maksimal 5MB.
                    </div>
                `;
                this.value = '';
                return;
            }
            
            // Cek tipe file
            if (!file.type.match('image.*')) {
                previewContainer.innerHTML = `
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-triangle me-2"></i> 
                        Hanya file gambar yang diperbolehkan!
                    </div>
                `;
                this.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(event) {
                previewContainer.innerHTML = `
                    <div class="alert alert-info mt-2">
                        <strong>Preview Gambar:</strong><br>
                        <img src="${event.target.result}" class="preview-image">
                        <br>
                        <small class="text-muted">Ukuran: ${(file.size / 1024).toFixed(2)} KB</small>
                    </div>
                `;
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.innerHTML = '';
        }
    });
</script>
@endsection