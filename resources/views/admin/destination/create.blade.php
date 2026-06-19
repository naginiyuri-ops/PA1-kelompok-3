@extends('layouts.admin')

@section('title', 'Tambah ' . $config['label'])

@section('content')
<div style="background:white; border-radius:20px; box-shadow:0 8px 30px rgba(0,0,0,0.08); overflow:hidden;">

    {{-- ── HEADER ── --}}
    <div style="padding:18px 24px; background:linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border-bottom:1px solid #e2e8f0; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px;">
        <h5 style="margin:0; font-size:1.1rem; font-weight:700; color:#003366; display:flex; align-items:center; gap:8px;">
            <i class="fas fa-plus-circle" style="color:#c6a43b;"></i>
            Tambah {{ $config['label'] }}
        </h5>
        <a href="{{ route('admin.destination.' . $category . '.index') }}"
           style="background:#f1f5f9; color:#475569; padding:7px 16px; border-radius:10px; font-size:0.82rem; font-weight:600; text-decoration:none; display:inline-flex; align-items:center; gap:6px;">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div style="padding:28px;">

        {{-- ── TAMPILKAN SEMUA PESAN ERROR ── --}}
        @if($errors->any())
        <div style="background:#ffebee; color:#c62828; padding:14px 18px; border-radius:12px; margin-bottom:24px; border-left:4px solid #c62828;">
            <strong style="font-size:0.85rem; display:flex; align-items:center; gap:8px; margin-bottom:8px;">
                <i class="fas fa-exclamation-triangle"></i> Terdapat kesalahan:
            </strong>
            <ul style="margin:0; padding-left:20px; font-size:0.83rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- ── FORM TAMBAH DATA ── --}}
        <form action="{{ route('admin.destination.' . $category . '.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div style="margin-bottom:22px;">
                <label style="display:block; margin-bottom:8px; font-weight:600; font-size:0.85rem; color:#1e293b;">
                    Judul <span style="color:#dc2626;">*</span>
                </label>
                <input type="text" name="title"
                       value="{{ old('title') }}"
                       placeholder="Contoh: Pantai Meat, Air Terjun Situmurun..."
                       style="width:100%; padding:10px 14px; border:1.5px solid #e2e8f0; border-radius:10px; font-size:0.9rem; outline:none; transition:border-color 0.2s;"
                       onfocus="this.style.borderColor='#003366'" onblur="this.style.borderColor='#e2e8f0'"
                       required>
            </div>

            {{-- Deskripsi --}}
            <div style="margin-bottom:22px;">
                <label style="display:block; margin-bottom:8px; font-weight:600; font-size:0.85rem; color:#1e293b;">
                    Deskripsi <span style="color:#dc2626;">*</span>
                </label>
                <textarea name="description" rows="7"
                          placeholder="Tulis deskripsi lengkap destinasi ini..."
                          style="width:100%; padding:10px 14px; border:1.5px solid #e2e8f0; border-radius:10px; font-size:0.9rem; resize:vertical; outline:none; line-height:1.7; transition:border-color 0.2s;"
                          onfocus="this.style.borderColor='#003366'" onblur="this.style.borderColor='#e2e8f0'"
                          required>{{ old('description') }}</textarea>
                <small style="font-size:0.72rem; color:#94a3b8; margin-top:5px; display:block;">
                    Tulis deskripsi selengkap mungkin untuk meningkatkan kualitas konten.
                </small>
            </div>

            {{-- Upload gambar dengan preview --}}
            <div style="margin-bottom:22px;">
                <label style="display:block; margin-bottom:8px; font-weight:600; font-size:0.85rem; color:#1e293b;">
                    Gambar <span style="font-size:0.75rem; color:#94a3b8; font-weight:400;">(opsional)</span>
                </label>
                <input type="file" name="image" id="inputGambar"
                       accept="image/jpeg,image/png,image/webp"
                       style="width:100%; padding:10px 14px; border:1.5px solid #e2e8f0; border-radius:10px; font-size:0.85rem;">
                <small style="font-size:0.72rem; color:#94a3b8; margin-top:5px; display:block;">
                    Format: JPG, PNG, WEBP. Ukuran maksimal: 5MB.
                </small>
                {{-- Area preview gambar — tampil saat file dipilih --}}
                <div id="previewWrapper" style="display:none; margin-top:12px;">
                    <img id="previewImage"
                         style="max-width:200px; max-height:150px; object-fit:cover; border-radius:10px; border:2px solid #e2e8f0;">
                </div>
            </div>

            {{-- Toggle status aktif --}}
            <div style="display:flex; align-items:center; gap:10px; margin:22px 0; padding:14px 18px; background:#f8fafc; border-radius:12px; border:1px solid #e2e8f0;">
                <input type="checkbox" name="status" value="1" id="status"
                       {{ old('status', 1) ? 'checked' : '' }}
                       style="width:18px; height:18px; cursor:pointer; accent-color:#003366;">
                <div>
                    <label for="status" style="margin:0; cursor:pointer; font-weight:600; font-size:0.85rem; color:#1e293b;">
                        Aktifkan destinasi ini
                    </label>
                    <div style="font-size:0.72rem; color:#94a3b8; margin-top:2px;">
                        Jika dicentang, destinasi akan ditampilkan di halaman publik.
                    </div>
                </div>
            </div>

            {{-- Tombol aksi --}}
            <div style="display:flex; gap:12px; margin-top:28px; padding-top:20px; border-top:1px solid #f1f5f9;">
                <button type="submit"
                        style="background:linear-gradient(135deg, #003366 0%, #1a4a7a 100%); color:white; padding:11px 28px; border-radius:10px; font-weight:700; border:none; cursor:pointer; font-size:0.88rem; display:flex; align-items:center; gap:8px;">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
                <a href="{{ route('admin.destination.' . $category . '.index') }}"
                   style="background:#f1f5f9; color:#475569; padding:11px 24px; border-radius:10px; font-weight:600; text-decoration:none; display:inline-flex; align-items:center; gap:8px; font-size:0.88rem;">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

{{-- Script preview gambar sebelum upload --}}
<script>
    document.getElementById('inputGambar').addEventListener('change', function (e) {
        const file    = e.target.files[0];
        const preview = document.getElementById('previewImage');
        const wrapper = document.getElementById('previewWrapper');

        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                preview.src       = event.target.result;
                wrapper.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            wrapper.style.display = 'none';
        }
    });
</script>
@endsection
