@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('content')
<style>
    .preview-image { max-width: 200px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    .current-image { border-radius: 8px; border: 2px solid #c6a43b; padding: 5px; display: inline-block; }
    .required:after { content: " *"; color: red; }
</style>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-edit me-2" style="color: #c6a43b;"></i> Edit Galeri</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $galeri->judul) }}" required>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Kategori</label>
                    <select name="kategori" class="form-control" required>
                        <option value="Balige" {{ $galeri->kategori == 'Balige' ? 'selected' : '' }}>Balige</option>
                        <option value="Meat" {{ $galeri->kategori == 'Meat' ? 'selected' : '' }}>Meat</option>
                        <option value="Batu Bahisan" {{ $galeri->kategori == 'Batu Bahisan' ? 'selected' : '' }}>Batu Bahisan</option>
                        <option value="Liang Sipege" {{ $galeri->kategori == 'Liang Sipege' ? 'selected' : '' }}>Liang Sipege</option>
                    </select>
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar Saat Ini</label><br>
                    <div class="current-image">
                        <img src="data:image/jpeg;base64,{{ base64_encode($galeri->gambar) }}" class="preview-image">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Ganti Gambar (Opsional)</label>
                        <input type="file" name="gambar" class="form-control" id="inputGambar" accept="image/*">
                        <div id="previewContainer" class="mt-2" style="display:none">
                            <small>Preview Baru:</small><br>
                            <img id="previewImage" class="preview-image">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $galeri->lokasi) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Foto</label>
                        <input type="date" name="tanggal_foto" class="form-control" value="{{ old('tanggal_foto', $galeri->tanggal_foto) }}">
                    </div>
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" name="status" id="statusCheck" value="1" {{ $galeri->status ? 'checked' : '' }}>
                        <label class="form-check-label" for="statusCheck">Aktifkan Galeri</label>
                    </div>
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn" style="background: #c6a43b; color: white;">Update Data</button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('inputGambar').addEventListener('change', function(e) {
        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('previewImage').src = event.target.result;
            document.getElementById('previewContainer').style.display = 'block';
        }
        reader.readAsDataURL(e.target.files[0]);
    });
</script>
@endsection