{{-- resources/views/admin/berita/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<style>
    .preview-image {
        max-width: 200px;
        border-radius: 8px;
        margin-top: 10px;
    }
    .current-image {
        margin-bottom: 15px;
    }
    .current-image img {
        max-width: 150px;
        border-radius: 8px;
        border: 2px solid #c6a43b;
        padding: 3px;
    }
</style>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-edit me-2" style="color: #c6a43b;"></i>
            Edit Berita: {{ $berita->judul }}
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label class="form-label required">Judul Berita</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                           value="{{ old('judul', $berita->judul) }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tanggal Berita</label>
                    <input type="date" name="tanggal_berita" class="form-control" 
                           value="{{ old('tanggal_berita', $berita->tanggal_berita ? $berita->tanggal_berita->format('Y-m-d') : date('Y-m-d')) }}">
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Ringkasan (Excerpt)</label>
                    <textarea name="excerpt" class="form-control @error('excerpt') is-invalid @enderror" 
                              rows="3" required>{{ old('excerpt', $berita->excerpt) }}</textarea>
                    @error('excerpt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Konten Berita</label>
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" 
                              rows="10" id="editor">{{ old('content', $berita->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar Saat Ini</label>
                    @if($berita->gambar)
                        <div class="current-image">
                            <img src="{{ $berita->gambar }}" alt="Current Image">
                        </div>
                    @else
                        <p class="text-muted">Belum ada gambar</p>
                    @endif
                    
                    <label class="form-label">Ganti Gambar (Opsional)</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" 
                           accept="image/jpeg,image/png,image/jpg" id="inputGambar">
                    <small class="text-muted">Format: JPG, PNG. Max: 2MB. Kosongkan jika tidak ingin mengubah</small>
                    <div id="previewContainer" class="mt-2"></div>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="status" value="1" id="statusCheck" 
                               {{ old('status', $berita->status) ? 'checked' : '' }}>
                        <label class="form-check-label" for="statusCheck">
                            <i class="fas fa-check-circle text-success me-1"></i> Publish (langsung tampil di website)
                        </label>
                    </div>
                </div>
            </div>
            
            <hr>
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn" style="background: #c6a43b; color: #003366;">
                    <i class="fas fa-save me-2"></i> Update
                </button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // Preview gambar baru
    document.getElementById('inputGambar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewContainer = document.getElementById('previewContainer');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                previewContainer.innerHTML = `
                    <div class="alert alert-info mt-2">
                        <strong>Preview Gambar Baru:</strong><br>
                        <img src="${event.target.result}" class="preview-image">
                    </div>
                `;
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.innerHTML = '';
        }
    });
</script>

<!-- TinyMCE Editor -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#editor',
        height: 400,
        menubar: true,
        plugins: 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        content_style: 'body { font-family:Inter, sans-serif; font-size:14px; }'
    });
</script>
@endsection