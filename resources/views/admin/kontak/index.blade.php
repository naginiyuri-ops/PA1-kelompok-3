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
    <div class="alert alert-success" style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 10px; margin: 16px 20px;">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif
    
    @if ($errors->any())
    <div class="alert alert-danger" style="background: #fee2e2; color: #991b1b; padding: 12px 16px; border-radius: 10px; margin: 16px 20px;">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div style="padding: 24px;">
        <form action="{{ route('admin.kontak.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.85rem; color: #1e293b;">
                    <i class="fas fa-map-marker-alt" style="color: #c6a43b; margin-right: 6px;"></i>
                    Alamat
                </label>
                <textarea class="form-control" name="alamat" rows="4" style="width: 100%; padding: 10px 14px; border: 1.5px solid #e2e8f0; border-radius: 10px;">{{ $kontak->alamat ?? '' }}</textarea>
                <small class="text-muted" style="font-size: 0.7rem; color: #94a3b8;">Alamat lengkap kantor atau lokasi wisata</small>
            </div>
            
            <div class="mb-3">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.85rem; color: #1e293b;">
                    <i class="fas fa-phone" style="color: #c6a43b; margin-right: 6px;"></i>
                    Telepon / WhatsApp
                </label>
                <input type="text" class="form-control" name="telepon" value="{{ $kontak->telepon ?? '' }}" style="width: 100%; padding: 10px 14px; border: 1.5px solid #e2e8f0; border-radius: 10px;">
                <small class="text-muted" style="font-size: 0.7rem; color: #94a3b8;">Nomor telepon yang dapat dihubungi</small>
            </div>
            
            <div class="mb-3">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.85rem; color: #1e293b;">
                    <i class="fas fa-envelope" style="color: #c6a43b; margin-right: 6px;"></i>
                    Email
                </label>
                <input type="email" class="form-control" name="email" value="{{ $kontak->email ?? '' }}" style="width: 100%; padding: 10px 14px; border: 1.5px solid #e2e8f0; border-radius: 10px;">
                <small class="text-muted" style="font-size: 0.7rem; color: #94a3b8;">Email aktif untuk menerima pertanyaan</small>
            </div>
            
            <div class="mb-3">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.85rem; color: #1e293b;">
                    <i class="fas fa-map" style="color: #c6a43b; margin-right: 6px;"></i>
                    Link Google Maps
                </label>
                <input type="text" class="form-control" name="link_maps" value="{{ $kontak->link_maps ?? '' }}" style="width: 100%; padding: 10px 14px; border: 1.5px solid #e2e8f0; border-radius: 10px;" placeholder="https://maps.google.com/...">
                <small class="text-muted" style="font-size: 0.7rem; color: #94a3b8;">Link embed atau share dari Google Maps</small>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn-primary" style="background: linear-gradient(135deg, #003366 0%, #1a4a7a 100%); color: white; padding: 10px 24px; border-radius: 10px; border: none; cursor: pointer;">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .form-control:focus {
        outline: none;
        border-color: #003366;
        box-shadow: 0 0 0 3px rgba(0, 51, 102, 0.1);
    }
    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }
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
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 51, 102, 0.3);
    }
</style>
@endsection