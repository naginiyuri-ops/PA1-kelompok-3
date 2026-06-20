@extends('layouts.admin')

@section('title', 'Tambah Penginapan')

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
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
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
        min-height: 100px;
    }
    
    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }
    
    .col-third {
        flex: 1;
        min-width: 180px;
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
        margin: 20px 0;
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
        margin-top: 24px;
    }
    
    .btn-save {
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
    
    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 51, 102, 0.3);
    }
    
    .btn-cancel {
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
    
    .btn-cancel:hover {
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
    
    .price-wrapper {
        display: flex;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .price-wrapper .form-control {
        flex: 1;
    }
    
    .free-checkbox {
        display: flex;
        align-items: center;
        gap: 8px;
        white-space: nowrap;
    }
    
    .free-checkbox input {
        width: 18px;
        height: 18px;
        cursor: pointer;
        margin: 0;
    }
    
    .free-checkbox label {
        margin: 0;
        cursor: pointer;
        font-weight: 500;
        color: #c6a43b;
    }
    
    @media (max-width: 768px) {
        .card-header {
            padding: 12px 18px;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .card-body {
            padding: 18px;
        }
        
        .row {
            flex-direction: column;
            gap: 0;
        }
        
        .btn-save, .btn-cancel {
            padding: 8px 18px;
            font-size: 0.8rem;
        }
        
        .price-wrapper {
            flex-direction: column;
            align-items: stretch;
        }
        
        .free-checkbox {
            justify-content: flex-start;
        }
    }
</style>

<div class="card">
    <div class="card-header">
        <h5>
            <i class="fas fa-hotel"></i>
            Tambah Data Penginapan
        </h5>
        <a href="{{ route('admin.penginapan.index') }}" class="btn-cancel" style="padding: 6px 16px;">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
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
        
        <form action="{{ route('admin.penginapan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label>Nama Penginapan <span class="text-danger">*</span></label>
                <input type="text" name="nama" id="penginapan_create_nama" class="form-control" value="{{ old('nama') }}" placeholder="Masukkan nama penginapan" required>
            </div>
            
            <div class="mb-3">
                <label>Deskripsi <span class="text-danger">*</span></label>
                <textarea name="deskripsi" id="penginapan_create_deskripsi" class="form-control" rows="5" placeholder="Masukkan deskripsi penginapan" required>{{ old('deskripsi') }}</textarea>
            </div>

            {{-- BLOK TERJEMAHAN BAHASA INGGRIS --}}
            @include('admin.partials.translation-fields', [
                'labelId'        => 'Nama Penginapan',
                'nameId'         => 'nama_en',
                'labelDesc'      => 'Deskripsi',
                'nameDesc'       => 'deskripsi_en',
                'rowsDesc'       => 5,
                'sourceJudulId'  => 'penginapan_create_nama',
                'sourceKontenId' => 'penginapan_create_deskripsi',
            ])


            <div class="row">
                <div class="col-third">
                    <div class="mb-3">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', 'Desa Meat') }}" placeholder="Contoh: Desa Meat, Balige">
                    </div>
                </div>
                
                <div class="col-third">
                    <div class="mb-3">
                        <label>Kontak</label>
                        <input type="text" name="kontak" class="form-control" value="{{ old('kontak') }}" placeholder="Contoh: 081234567890 atau -">
                        <div class="form-text">
                            <i class="fas fa-info-circle"></i> Isi dengan "-" jika tidak ada, atau 12 digit angka
                        </div>
                    </div>
                </div>
                
                <div class="col-third">
                    <div class="mb-3">
                        <label>Harga</label>
                        <div class="price-wrapper">
                            <input type="text" name="harga" id="hargaInput" class="form-control" value="{{ old('harga') }}" placeholder="Contoh: Rp250.000/malam, Free, 200000">
                            <div class="free-checkbox">
                                <input type="checkbox" name="free_harga" id="freeHarga" value="1">
                                <label for="freeHarga">✅ Free</label>
                            </div>
                        </div>
                        <div class="form-text">
                            <i class="fas fa-info-circle"></i> Centang Free untuk mengisi otomatis "Free", atau isi manual dengan harga sesuai keinginan
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-third">
                    <div class="mb-3">
                        <label>Urutan <span class="text-danger">*</span></label>
                        <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $nextUrutan ?? 1) }}" required>
                        <div class="form-text">
                            <i class="fas fa-info-circle"></i> Semakin kecil angka, semakin atas tampilannya
                        </div>
                    </div>
                </div>
                
                <div class="col-third">
                    <div class="mb-3">
                        <label>Gambar Utama</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*" id="inputGambar">
                        <div class="form-text">
                            <i class="fas fa-info-circle"></i> Format: JPG, PNG, WEBP. Max: 5MB
                        </div>
                        <img id="previewImage" class="preview-image">
                    </div>
                </div>
                
                <div class="col-third">
                    <div class="mb-3">
                        <label>Gambar Tambahan (Opsional)</label>
                        <input type="file" name="gambar_tambahan" class="form-control" accept="image/*" id="inputGambarTambahan">
                        <div class="form-text">
                            <i class="fas fa-info-circle"></i> Format: JPG, PNG, WEBP. Max: 5MB
                        </div>
                        <img id="previewGambarTambahan" class="preview-image">
                    </div>
                </div>
            </div>
            
            <div class="checkbox-group">
                <input type="checkbox" name="status" value="1" id="status" {{ old('status', 1) ? 'checked' : '' }}>
                <label for="status">Aktifkan Penginapan</label>
            </div>
            
            <div class="btn-group">
                <button type="submit" class="btn-save">Simpan</button>
                <a href="{{ route('admin.penginapan.index') }}" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
    // Preview gambar utama
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

    // Preview gambar tambahan
    document.getElementById('inputGambarTambahan').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewImage = document.getElementById('previewGambarTambahan');
        
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
    
    // Free checkbox handler
    const freeCheckbox = document.getElementById('freeHarga');
    const hargaInput = document.getElementById('hargaInput');
    
    if (freeCheckbox) {
        freeCheckbox.addEventListener('change', function() {
            if (this.checked) {
                hargaInput.disabled = true;
                hargaInput.value = 'Free';
                hargaInput.placeholder = 'Free';
            } else {
                hargaInput.disabled = false;
                hargaInput.value = '';
                hargaInput.placeholder = 'Contoh: Rp250.000/malam, Free, 200000';
            }
        });
    }
</script>
@endsection