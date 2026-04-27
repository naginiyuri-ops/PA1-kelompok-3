{{-- resources/views/admin/galeri/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('content')
<style>
    .preview-container {
        margin-top: 10px;
    }
    .preview-image {
        max-width: 200px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .current-image {
        border-radius: 8px;
        border: 2px solid #c6a43b;
        padding: 5px;
    }
    .required:after {
        content: " *";
        color: red;
    }
</style>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-edit me-2" style="color: #c6a43b;"></i>
            Edit Galeri
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Judul</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                           value="{{ old('judul', $galeri->judul) }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Kategori</label>
                    <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Balige" {{ old('kategori', $galeri->kategori) == 'Balige' ? 'selected' : '' }}>🏙️ Balige</option>
                        <option value="Meat" {{ old('kategori', $galeri->kategori) == 'Meat' ? 'selected' : '' }}>🏝️ Meat</option>
                        <option value="Batu Bahisan" {{ old('kategori', $galeri->kategori) == 'Batu Bahisan' ? 'selected' : '' }}>🪨 Batu Bahisan</option>
                        <option value="Liang Sipege" {{ old('kategori', $galeri->kategori) == 'Liang Sipege' ? 'selected' : '' }}>🕳️ Liang Sipege</option>
                    </select>
                    <small class="text-muted">Mengubah kategori akan memindahkan gambar ke folder baru</small>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" 
                              rows="4" required>{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar Saat Ini</label>
                    <div class="current-image">
                        <img src="{{ asset($galeri->gambar) }}" class="preview-image" alt="Current Image">
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Ganti Gambar (Opsional)</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" 
                               accept="image/jpeg,image/png,image/jpg" id="inputGambar">
                        <small class="text-muted">Format: JPG, PNG. Max: 2MB. Kosongkan jika tidak ingin mengubah</small>
                        <div class="preview-container mt-2" id="previewContainer" style="display: none;">
                            <label>Preview Gambar Baru:</label>
                            <img id="previewImage" class="preview-image" alt="Preview Gambar Baru">
                        </div>
                    </div>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" 
                           value="{{ old('lokasi', $galeri->lokasi) }}" placeholder="Contoh: Desa Sibandang, Pulau Samosir">
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Foto</label>
                    <input type="date" name="tanggal_foto" class="form-control @error('tanggal_foto') is-invalid @enderror" 
                           value="{{ old('tanggal_foto', $galeri->tanggal_foto) }}">
                    @error('tanggal_foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" name="status" value="1" 
                               id="statusCheck" {{ old('status', $galeri->status) ? 'checked' : '' }}>
                        <label class="form-check-label" for="statusCheck">
                            <i class="fas fa-check-circle text-success me-1"></i> Aktifkan
                        </label>
                        <br>
                        <small class="text-muted">Jika diaktifkan, galeri akan ditampilkan di halaman publik</small>
                    </div>
                </div>
            </div>
            
            <hr>
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn" style="background: #c6a43b; border: none; color: white;">
                    <i class="fas fa-save me-2"></i> Update
                </button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // Preview gambar baru sebelum upload
    document.getElementById('inputGambar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewContainer = document.getElementById('previewContainer');
        const previewImage = document.getElementById('previewImage');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                previewImage.src = event.target.result;
                previewContainer.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = 'none';
        }
    });
</script>
@endsection