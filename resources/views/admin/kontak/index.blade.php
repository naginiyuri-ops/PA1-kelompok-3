{{-- resources/views/admin/pengaturan/kontak.blade.php --}}
@extends('layouts.admin')

@section('title', 'Pengaturan Kontak')

@section('content')
<div class="card-table">
    <div class="card-header">
        <h5>
            <i class="fas fa-address-card"></i>
            Pengaturan Kontak
        </h5>
    </div>
    
    @if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div class="form-container">
        <form action="{{ route('admin.kontak.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label>
                    <i class="fas fa-map-marker-alt"></i>
                    Alamat
                </label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" 
                          name="alamat" 
                          rows="4">{{ old('alamat', $kontak->alamat ?? '') }}</textarea>
                <small>Alamat lengkap kantor atau lokasi wisata</small>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>
                    <i class="fas fa-phone"></i>
                    Telepon / WhatsApp
                </label>
                <input type="text" 
                       class="form-control @error('telepon') is-invalid @enderror" 
                       name="telepon" 
                       value="{{ old('telepon', $kontak->telepon ?? '') }}">
                <small>Nomor telepon yang dapat dihubungi</small>
                @error('telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>
                    <i class="fas fa-envelope"></i>
                    Email
                </label>
                <input type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       name="email" 
                       value="{{ old('email', $kontak->email ?? '') }}">
                <small>Email aktif untuk menerima pertanyaan</small>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>
                    <i class="fas fa-map"></i>
                    Link Google Maps
                </label>
                <input type="text" 
                       class="form-control @error('link_maps') is-invalid @enderror" 
                       name="link_maps" 
                       value="{{ old('link_maps', $kontak->link_maps ?? '') }}" 
                       placeholder="https://maps.google.com/...">
                <small>Link embed atau share dari Google Maps</small>
                @error('link_maps')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn-save">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Layout & Container */
    .card-table {
        background: white;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
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

    /* Form Styles */
    .form-container {
        padding: 24px;
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        font-size: 0.85rem;
        color: #1e293b;
    }

    .form-group label i {
        color: #c6a43b;
        margin-right: 6px;
    }

    .form-control {
        width: 100%;
        padding: 10px 14px;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        font-size: 0.9rem;
        transition: all 0.2s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #003366;
        box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    .form-group small {
        font-size: 0.7rem;
        color: #94a3b8;
        display: block;
        margin-top: 6px;
    }

    /* Alert Styles */
    .alert {
        padding: 12px 16px;
        border-radius: 10px;
        margin: 16px 20px;
    }

    .alert-success {
        background: #dcfce7;
        color: #166534;
    }

    .alert-danger {
        background: #fee2e2;
        color: #991b1b;
    }

    .alert i {
        margin-right: 8px;
    }

    .alert ul {
        margin: 0;
        padding-left: 20px;
    }

    /* Button Styles */
    .form-actions {
        margin-top: 32px;
    }

    .btn-save {
        background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%);
        color: white;
        padding: 10px 24px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 51, 102, 0.3);
    }

    .btn-save:active {
        transform: translateY(0);
    }

    /* Error States */
    .is-invalid {
        border-color: #dc2626;
    }

    .invalid-feedback {
        color: #dc2626;
        font-size: 0.75rem;
        margin-top: 4px;
    }
</style>
@endsection