@extends('layouts.admin')

@section('title', 'Tambah Informasi')

@section('content')
<style>
    .form-group { margin-bottom: 1.5rem; }
    .form-label { font-weight: 600; margin-bottom: 0.5rem; }
    .form-label.required::after { content: '*'; color: #dc3545; margin-left: 4px; }
    .preview-image { max-width: 200px; border-radius: 8px; margin-top: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
</style>

<div class="d-flex align-items-center mb-4">
    <a href="{{ route('admin.informasi.index') }}" class="btn btn-sm btn-secondary me-3">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
    <h4 class="mb-0"><i class="fas fa-plus-circle me-2"></i> Tambah Informasi</h4>
</div>

<div class="card">
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label class="form-label required">Judul Informasi</label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                       value="{{ old('judul') }}" placeholder="Masukkan judul informasi" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" 
                       accept="image/jpeg,image/png,image/jpg" id="inputGambar">
                <small class="text-muted d-block mt-1">
                    <i class="fas fa-info-circle me-1"></i> Format: JPG, PNG. Maksimal 5MB
                </small>
                <div id="previewContainer" style="display: none;">
                    <img id="previewImage" class="preview-image">
                </div>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label class="form-label required">Konten</label>
                <textarea name="konten" class="form-control @error('konten') is-invalid @enderror" 
                          rows="12" placeholder="Masukkan konten informasi lengkap" required>{{ old('konten') }}</textarea>
                @error('konten')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="1" 
                           id="statusCheck" {{ old('status', '1') ? 'checked' : '' }}>
                    <label class="form-check-label" for="statusCheck">
                        <i class="fas fa-check-circle text-success me-1"></i> Aktifkan (ditampilkan di website)
                    </label>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i> Simpan ke Database
                </button>
                <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
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