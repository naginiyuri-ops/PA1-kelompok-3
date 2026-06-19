@extends('layouts.admin')

@section('title','Tambah Fasilitas')

@section('content')

<style>
.card{
    background:white;
    padding:25px;
    border-radius:12px;
}

.form-control{
    width:100%;
    padding:10px;
    border:1px solid #ddd;
    border-radius:8px;
}

.mb-3{
    margin-bottom:15px;
}

.btn-save{
    background:#003366;
    color:white;
    border:none;
    padding:10px 18px;
    border-radius:8px;
}

.btn-cancel{
    background:#dc2626;
    color:white;
    text-decoration:none;
    padding:10px 18px;
    border-radius:8px;
}

.row{
    display:flex;
    gap:15px;
}

.col{
    flex:1;
}
</style>

<div class="card">

<form action="{{ route('admin.fasilitas.store') }}"
      method="POST"
      enctype="multipart/form-data">

@csrf

<div class="mb-3">
<label>Jenis Fasilitas</label>

<select name="jenis" class="form-control" required>

<option value="">Pilih Jenis</option>
<option value="akomodasi">Akomodasi</option>
<option value="kuliner">Kuliner</option>
<option value="pusat informasi">Pusat Informasi</option>
<option value="toilet">Toilet</option>
<option value="parkir">Parkir</option>
<option value="akses jalan">Akses Jalan</option>
<option value="pemandu lokal">Pemandu Lokal</option>

</select>

</div>

<div class="mb-3">
<label>Nama</label>
<input type="text"
       name="nama"
       class="form-control"
       required>
</div>

<div class="mb-3">
<label>Deskripsi</label>

<textarea
    name="deskripsi"
    rows="5"
    class="form-control"
    required></textarea>
</div>

<div class="row">

<div class="col">
<label>Lokasi</label>
<input type="text"
       name="lokasi"
       class="form-control">
</div>

<div class="col">
<label>Kontak</label>
<input type="text"
       name="kontak"
       class="form-control">
</div>

<div class="col">
<label>Harga</label>
<input type="text"
       name="harga"
       class="form-control">
</div>

</div>

<br>

<div class="row">

<div class="col">
<label>Urutan</label>
<input type="number"
       name="urutan"
       class="form-control"
       value="0">
</div>

<div class="col">
<label>Gambar</label>
<input type="file"
       name="gambar"
       class="form-control">
</div>

</div>

<br>

<label>
<input type="checkbox"
       name="status"
       value="1"
       checked>

Aktifkan Fasilitas
</label>

<br><br>

<button class="btn-save">
    Simpan
</button>

<a href="{{ route('admin.fasilitas.index') }}"
   class="btn-cancel">
    Batal
</a>

</form>

</div>

@endsection