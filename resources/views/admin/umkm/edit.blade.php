@extends('layouts.admin')

@section('title', 'Edit UMKM')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow border-0 rounded-4">
                
                <!-- Header -->
                <div class="card-header bg-primary text-white rounded-top-4 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0 fw-bold">
                                <i class="fas fa-store me-2"></i> Edit Data UMKM
                            </h4>
                            <small>Perbarui informasi UMKM dengan lengkap</small>
                        </div>
                    </div>
                </div>

                <!-- Body -->
                <div class="card-body p-4">

                    <form action="{{ route('admin.umkm.update', $data->id) }}" 
                          method="POST" 
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <!-- Nama -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Nama UMKM
                            </label>
                            <input type="text" 
                                   name="nama" 
                                   class="form-control rounded-3"
                                   placeholder="Masukkan nama UMKM"
                                   value="{{ $data->nama }}" 
                                   required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Deskripsi
                            </label>
                            <textarea name="deskripsi" 
                                      class="form-control rounded-3"
                                      rows="5"
                                      placeholder="Masukkan deskripsi UMKM"
                                      required>{{ $data->deskripsi }}</textarea>
                        </div>

                        <!-- Lokasi & Kontak -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">
                                    Lokasi
                                </label>
                                <input type="text" 
                                       name="lokasi" 
                                       class="form-control rounded-3"
                                       placeholder="Masukkan lokasi"
                                       value="{{ $data->lokasi }}">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">
                                    Kontak
                                </label>
                                <input type="text" 
                                       name="kontak" 
                                       class="form-control rounded-3"
                                       placeholder="Masukkan kontak"
                                       value="{{ $data->kontak }}">
                            </div>
                        </div>

                        <!-- Urutan -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Urutan
                            </label>
                            <input type="number" 
                                   name="urutan" 
                                   class="form-control rounded-3"
                                   placeholder="Masukkan nomor urutan"
                                   value="{{ $data->urutan }}" 
                                   required>
                        </div>

                        <!-- Gambar -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Gambar UMKM
                            </label>

                            <div class="border rounded-4 p-3 bg-light">

                                @if($data->gambar)
                                    <div class="mb-3">
                                        <p class="text-muted mb-2">
                                            Gambar Saat Ini
                                        </p>

                                        <img src="{{ $data->gambar }}" 
                                             alt="Gambar UMKM"
                                             class="img-thumbnail rounded-4 shadow-sm"
                                             width="180">
                                    </div>
                                @endif

                                <input type="file" 
                                       name="gambar" 
                                       class="form-control rounded-3"
                                       accept="image/*"
                                       id="inputGambar">

                                <!-- Preview -->
                                <div class="mt-3 text-center" 
                                     id="previewContainer" 
                                     style="display: none;">

                                    <p class="text-muted mb-2">
                                        Preview Gambar Baru
                                    </p>

                                    <img id="previewImage"
                                         class="img-fluid rounded-4 shadow-sm border"
                                         style="max-width: 220px;">
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="status"
                                       value="1"
                                       id="statusSwitch"
                                       {{ $data->status ? 'checked' : '' }}>

                                <label class="form-check-label fw-semibold"
                                       for="statusSwitch">
                                    Aktifkan UMKM
                                </label>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('admin.umkm.index') }}" 
                               class="btn btn-outline-secondary rounded-3 px-4">
                                <i class="fas fa-arrow-left me-1"></i> Batal
                            </a>

                            <button type="submit" 
                                    class="btn btn-primary rounded-3 px-4">
                                <i class="fas fa-save me-1"></i> Update Data
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Preview Image -->
<script>
    document.getElementById('inputGambar')?.addEventListener('change', function(e) {

        const file = e.target.files[0];
        const preview = document.getElementById('previewContainer');
        const previewImg = document.getElementById('previewImage');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        }
    });
</script>
@endsection