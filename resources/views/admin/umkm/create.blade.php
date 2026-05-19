@extends('layouts.admin')

@section('title', 'Tambah UMKM')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow border-0 rounded-4">

                <!-- Header -->
                <div class="card-header bg-success text-white rounded-top-4 py-3">
                    <div class="d-flex align-items-center">
                        <div>
                            <h4 class="mb-0 fw-bold">
                                <i class="fas fa-store me-2"></i>
                                Tambah Data UMKM
                            </h4>
                            <small>
                                Lengkapi informasi UMKM dengan benar
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Body -->
                <div class="card-body p-4">

                    <form action="{{ route('admin.umkm.store') }}" 
                          method="POST" 
                          enctype="multipart/form-data">

                        @csrf

                        <!-- Nama UMKM -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Nama UMKM
                            </label>

                            <input type="text" 
                                   name="nama"
                                   class="form-control rounded-3"
                                   placeholder="Masukkan nama UMKM"
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
                                      required></textarea>
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
                                       placeholder="Masukkan lokasi UMKM">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">
                                    Kontak
                                </label>

                                <input type="text"
                                       name="kontak"
                                       class="form-control rounded-3"
                                       placeholder="Masukkan nomor kontak">
                            </div>

                        </div>

                        <!-- Urutan -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Urutan Tampil
                            </label>

                            <input type="number"
                                   name="urutan"
                                   class="form-control rounded-3"
                                   placeholder="Masukkan nomor urutan"
                                   required>

                            <small class="text-muted">
                                Semakin kecil angka, semakin atas tampilannya.
                            </small>
                        </div>

                        <!-- Upload Gambar -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Upload Gambar
                            </label>

                            <div class="border rounded-4 p-3 bg-light">

                                <input type="file"
                                       name="gambar"
                                       class="form-control rounded-3"
                                       accept="image/*"
                                       id="inputGambar">

                                <small class="text-muted">
                                    Format gambar: JPG, PNG, JPEG
                                </small>

                                <!-- Preview -->
                                <div class="mt-4 text-center"
                                     id="previewContainer"
                                     style="display: none;">

                                    <p class="text-muted mb-2">
                                        Preview Gambar
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
                                       checked>

                                <label class="form-check-label fw-semibold"
                                       for="statusSwitch">
                                    Aktifkan UMKM
                                </label>

                            </div>

                        </div>

                        <!-- Button -->
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('admin.umkm.index') }}"
                               class="btn btn-outline-secondary rounded-3 px-4">

                                <i class="fas fa-arrow-left me-1"></i>
                                Batal

                            </a>

                            <button type="submit"
                                    class="btn btn-success rounded-3 px-4">

                                <i class="fas fa-save me-1"></i>
                                Simpan Data

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

        } else {

            preview.style.display = 'none';

        }
    });
</script>
@endsection