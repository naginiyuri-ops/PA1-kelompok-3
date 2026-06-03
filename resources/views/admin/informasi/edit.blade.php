@extends('layouts.admin')

@section('title', 'Edit Informasi')

@section('content')
<style>
    .card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }
    
    .card-header {
        padding: 18px 24px;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-bottom: 1px solid #e2e8f0;
    }
    
    .card-header h5 {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 700;
        color: #003366;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .card-header h5 i {
        color: #c6a43b;
    }
    
    .card-body {
        padding: 24px;
    }
    
    .mb-3 {
        margin-bottom: 20px;
    }
    
    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        font-size: 0.85rem;
        color: #1e293b;
    }
    
    .form-control {
        width: 100%;
        padding: 10px 14px;
        font-size: 0.85rem;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #003366;
        box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
    }
    
    textarea.form-control {
        resize: vertical;
        min-height: 200px;
    }
    
    .current-image {
        margin-top: 8px;
    }
    
    .current-image img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid #c6a43b;
        padding: 2px;
    }
    
    .preview-image {
        margin-top: 10px;
        max-width: 120px;
        border-radius: 10px;
        display: none;
    }
    
    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 24px;
    }
    
    .checkbox-group input {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }
    
    .checkbox-group label {
        margin: 0;
        cursor: pointer;
    }
    
    .checkbox-delete {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 8px;
    }
    
    .checkbox-delete input {
        width: 16px;
        height: 16px;
        cursor: pointer;
    }
    
    .checkbox-delete label {
        margin: 0;
        font-weight: normal;
        color: #dc2626;
        cursor: pointer;
    }
    
    .btn-group {
        display: flex;
        gap: 12px;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        color: white;
        padding: 10px 24px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.85rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 51, 102, 0.3);
    }
    
    .btn-secondary {
        background: #f1f5f9;
        color: #475569;
        padding: 10px 24px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.85rem;
        border: none;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
    }
    
    .btn-secondary:hover {
        background: #e2e8f0;
        transform: translateY(-2px);
    }
    
    .alert-danger {
        background: #ffebee;
        color: #c62828;
        padding: 12px 16px;
        border-radius: 10px;
        margin-bottom: 20px;
        border-left: 4px solid #c62828;
        font-size: 0.85rem;
    }
    
    .alert-danger ul {
        margin: 0;
        padding-left: 20px;
    }
    
    .form-text {
        font-size: 0.7rem;
        color: #94a3b8;
        margin-top: 5px;
    }
    
    .form-text i {
        margin-right: 4px;
    }
    
    @media (max-width: 768px) {
        .card-header {
            padding: 12px 18px;
        }
        
        .card-body {
            padding: 18px;
        }
        
        .btn-primary, .btn-secondary {
            padding: 8px 18px;
            font-size: 0.8rem;
        }
    }
</style>

<div class="card">
    <div class="card-header">
        <h5>
            <i class="fas fa-edit"></i>
            Edit Informasi
        </h5>
    </div>
    
    <div class="card-body">
        @if($errors->any())
            <div class="alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('error'))
            <div class="alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.informasi.update', $informasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label>Judul Informasi <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul', $informasi->judul) }}" required>
            </div>
            
            <div class="mb-3">
                <label>Gambar</label>
                @if($informasi->gambar)
                    @php
                        $imgSrc = asset('image/default.jpg');
                        if (str_starts_with($informasi->gambar, 'image/informasi/')) {
                            $imgSrc = asset($informasi->gambar);
                        } elseif (file_exists(public_path('image/informasi/' . $informasi->gambar))) {
                            $imgSrc = asset('image/informasi/' . $informasi->gambar);
                        } else {
                            $imgSrc = asset('storage/' . $informasi->gambar);
                        }
                    @endphp
                    <div class="current-image">
                        <img src="{{ $imgSrc }}" alt="Current image">
                    </div>
                    <div class="checkbox-delete">
                        <input type="checkbox" name="hapus_gambar" id="hapus_gambar" value="1">
                        <label for="hapus_gambar" class="text-danger">Hapus gambar ini</label>
                    </div>
                @else
                    <div class="form-text">Tidak ada gambar</div>
                @endif
                
                <label style="margin-top: 12px;">Ganti Gambar (Opsional)</label>
                <input type="file" name="gambar" class="form-control mt-2" accept="image/*" id="inputGambar">
                <div class="form-text">
                    <i class="fas fa-info-circle"></i> Format: JPG, PNG, WEBP. Max: 5MB
                </div>
                <img id="previewImage" class="preview-image">
            </div>
            
            <div class="mb-3">
                <label>Konten <span class="text-danger">*</span></label>
                <textarea name="konten" class="form-control" rows="10" required>{{ old('konten', $informasi->konten) }}</textarea>
                <div class="form-text">
                    <i class="fas fa-info-circle"></i> Gunakan HTML untuk formatting teks
                </div>
            </div>
            
            <div class="checkbox-group">
                <input type="checkbox" name="status" value="1" id="status" {{ $informasi->status ? 'checked' : '' }}>
                <label for="status">Aktifkan</label>
            </div>
            
            <div class="btn-group">
                <button type="submit" class="btn-primary">Update</button>
                <a href="{{ route('admin.informasi.index') }}" class="btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('inputGambar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewImage = document.getElementById('previewImage');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                previewImage.src = event.target.result;
                previewImage.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            previewImage.style.display = 'none';
        }
    });
</script>
@endsection