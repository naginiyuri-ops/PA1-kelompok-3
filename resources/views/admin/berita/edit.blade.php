@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<style>
    .card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }
    
    .card-header {
        padding: 16px 24px;
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
        min-height: 150px;
    }
    
    .current-image {
        margin-top: 8px;
    }
    
    .current-image img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid #c6a43b;
        padding: 2px;
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
            Edit Berita
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul', $berita->judul) }}" required>
            </div>
            
            <div class="mb-3">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $berita->penulis) }}">
            </div>
            
            <div class="mb-3">
                <label>Konten</label>
                <textarea name="konten" class="form-control" rows="8" required>{{ old('konten', $berita->konten) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label>Gambar Saat Ini</label><br>
                @if($berita->gambar)
                    <div class="current-image">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Current image">
                    </div>
                @else
                    <span class="text-muted">Tidak ada gambar</span>
                @endif
                <input type="file" name="gambar" class="form-control mt-2" accept="image/*">
            </div>
            
            <div class="checkbox-group">
                <input type="checkbox" name="status" value="1" id="status" {{ $berita->status ? 'checked' : '' }}>
                <label for="status">Aktifkan</label>
            </div>
            
            <div class="btn-group">
                <button type="submit" class="btn-primary">Update</button>
                <a href="{{ route('admin.berita.index') }}" class="btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection