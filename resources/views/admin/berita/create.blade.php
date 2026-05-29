@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<style>
    .form-container {
        max-width: 900px;
        margin: 0 auto;
    }
    
    .card-form {
        background: white;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }
    
    .card-header {
        padding: 20px 28px;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-bottom: 1px solid #e2e8f0;
    }
    
    .card-header h4 {
        margin: 0;
        font-size: 1.3rem;
        font-weight: 700;
        color: #003366;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .card-header h4 i {
        color: #c6a43b;
        font-size: 1.4rem;
    }
    
    .card-header p {
        margin: 8px 0 0 0;
        font-size: 0.85rem;
        color: #64748b;
    }
    
    .card-body {
        padding: 28px;
    }
    
    .form-group {
        margin-bottom: 24px;
    }
    
    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        font-size: 0.85rem;
        color: #1e293b;
    }
    
    .form-label .required {
        color: #dc2626;
        margin-left: 3px;
    }
    
    .form-label small {
        font-weight: normal;
        color: #94a3b8;
        font-size: 0.7rem;
    }
    
    .form-control, .form-select {
        width: 100%;
        padding: 10px 14px;
        font-size: 0.85rem;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        transition: all 0.3s ease;
        font-family: inherit;
    }
    
    .form-control:focus, .form-select:focus {
        outline: none;
        border-color: #003366;
        box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
    }
    
    textarea.form-control {
        resize: vertical;
        min-height: 200px;
    }
    
    .file-input-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;
    }
    
    .file-input {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }
    
    .file-label {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 16px;
        background: #f8fafc;
        border: 1.5px dashed #cbd5e1;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .file-label:hover {
        border-color: #003366;
        background: #f1f5f9;
    }
    
    .file-label i {
        font-size: 1.2rem;
        color: #64748b;
    }
    
    .file-label span {
        font-size: 0.85rem;
        color: #64748b;
    }
    
    .file-name {
        margin-top: 8px;
        font-size: 0.75rem;
        color: #94a3b8;
    }
    
    .form-text {
        font-size: 0.7rem;
        color: #94a3b8;
        margin-top: 6px;
    }
    
    .form-text i {
        margin-right: 4px;
    }
    
    .preview-image {
        margin-top: 12px;
        display: none;
    }
    
    .preview-image img {
        max-width: 150px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        padding: 4px;
    }
    
    .switch-wrapper {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 0;
    }
    
    .switch-label {
        font-weight: 600;
        font-size: 0.85rem;
        color: #1e293b;
    }
    
    .switch-label small {
        font-weight: normal;
        color: #94a3b8;
        font-size: 0.7rem;
        display: block;
        margin-top: 4px;
    }
    
    .switch {
        position: relative;
        display: inline-block;
        width: 52px;
        height: 28px;
    }
    
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }
    
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #cbd5e1;
        transition: 0.3s;
        border-radius: 34px;
    }
    
    .slider:before {
        position: absolute;
        content: "";
        height: 22px;
        width: 22px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: 0.3s;
        border-radius: 50%;
    }
    
    input:checked + .slider {
        background-color: #003366;
    }
    
    input:checked + .slider:before {
        transform: translateX(24px);
    }
    
    .btn-group {
        display: flex;
        gap: 12px;
        margin-top: 32px;
        flex-wrap: wrap;
    }
    
    .btn-save {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        color: white;
        padding: 10px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.85rem;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    
    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0, 51, 102, 0.3);
    }
    
    .btn-cancel {
        background: #f1f5f9;
        color: #475569;
        padding: 10px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.85rem;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .btn-cancel:hover {
        background: #e2e8f0;
        transform: translateY(-2px);
    }
    
    .alert-error {
        background: #ffebee;
        color: #c62828;
        padding: 12px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        border-left: 4px solid #c62828;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.85rem;
    }
    
    @media (max-width: 768px) {
        .card-header {
            padding: 16px 20px;
        }
        
        .card-body {
            padding: 20px;
        }
        
        .card-header h4 {
            font-size: 1.1rem;
        }
        
        .btn-save, .btn-cancel {
            padding: 8px 20px;
            font-size: 0.8rem;
        }
        
        textarea.form-control {
            min-height: 150px;
        }
    }
</style>

<div class="form-container">
    <div class="card-form">
        <div class="card-header">
            <h4>
                <i class="fas fa-newspaper"></i>
                Tambah Berita
            </h4>
            <p>Isi formulir di bawah untuk menambahkan berita baru</p>
        </div>
        
        <div class="card-body">
            @if($errors->any())
            <div class="alert-error">
                <i class="fas fa-exclamation-triangle"></i>
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">
                        Judul <span class="required">*</span>
                    </label>
                    <input type="text" name="judul" class="form-control" 
                           placeholder="Masukkan judul berita" 
                           value="{{ old('judul') }}" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        Penulis
                        <small>(Opsional)</small>
                    </label>
                    <input type="text" name="penulis" class="form-control" 
                           placeholder="Admin" 
                           value="{{ old('penulis', 'Admin') }}">
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        Konten <span class="required">*</span>
                    </label>
                    <textarea name="konten" class="form-control" 
                              placeholder="Tulis konten berita di sini..." required>{{ old('konten') }}</textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Gambar</label>
                    <div class="file-input-wrapper">
                        <input type="file" name="gambar" id="gambar" class="file-input" accept="image/jpeg,image/png">
                        <div class="file-label" onclick="document.getElementById('gambar').click()">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Choose file</span>
                        </div>
                    </div>
                    <div id="fileName" class="file-name">No file chosen</div>
                    <div class="form-text">
                        <i class="fas fa-info-circle"></i> Format: JPG, PNG. Max: 2MB
                    </div>
                    <div id="preview" class="preview-image"></div>
                </div>
                
                <div class="switch-wrapper">
                    <div class="switch-label">
                        Aktifkan
                        <small>Jika diaktifkan, berita akan ditampilkan di halaman publik</small>
                    </div>
                    <label class="switch">
                        <input type="checkbox" name="status" value="1" checked>
                        <span class="slider"></span>
                    </label>
                </div>
                
                <div class="btn-group">
                    <button type="submit" class="btn-save">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.berita.index') }}" class="btn-cancel">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('gambar').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || 'No file chosen';
        document.getElementById('fileName').innerHTML = fileName;
        
        const preview = document.getElementById('preview');
        if (e.target.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(e.target.files[0]);
        } else {
            preview.innerHTML = '';
            preview.style.display = 'none';
        }
    });
</script>
@endsection