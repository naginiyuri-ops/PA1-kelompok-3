@extends('layouts.admin')

@section('title', 'Tambah Fasilitas')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0 rounded-4">
                
                <div class="card-header bg-primary text-white rounded-top-4 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0 fw-bold">
                                <i class="fas fa-plus-circle me-2"></i> Tambah Fasilitas
                            </h4>
                            <small>Lengkapi data fasilitas dengan benar</small>
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

                    <form action="{{ route('admin.fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Fasilitas <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Kontak</label>
                                <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror" placeholder="Contoh: 0812xxxx" value="{{ old('kontak') }}">
                                @error('kontak') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Harga</label>
                                <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Contoh: Gratis / Rp 50.000" value="{{ old('harga') }}">
                                @error('harga') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Urutan Tampil <span class="text-danger">*</span></label>
                                <input type="number" name="urutan" class="form-control @error('urutan') is-invalid @enderror" value="{{ old('urutan', $nextUrutan) }}" required>
                                <small class="text-muted">Semakin kecil, semakin atas</small>
                                @error('urutan') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Upload Gambar</label>
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/jpeg,image/png,image/jpg" id="inputGambar">
                            <small class="text-muted">Format: JPG, PNG. Maksimal 2MB</small>
                            @error('gambar') <small class="text-danger">{{ $message }}</small> @enderror
                            
                            <div class="mt-3 text-center" id="previewContainer" style="display: none;">
                                <p class="text-muted mb-2">Preview Gambar</p>
                                <img id="previewImage" class="img-thumbnail rounded-4 shadow-sm" style="max-width: 200px;">
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="status" value="1" class="form-check-input" id="status" {{ old('status', '1') ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="status">Aktifkan Fasilitas</label>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-outline-secondary rounded-3 px-4">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary rounded-3 px-4">
                                <i class="fas fa-save me-1"></i> Simpan
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