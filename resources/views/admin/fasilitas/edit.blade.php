@extends('layouts.admin')

@section('title','Edit Fasilitas')

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

.row{
    display:flex;
    gap:15px;
}

.col{
    flex:1;
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

.preview{
    width:150px;
    margin-top:10px;
    border-radius:10px;
}
</style>

<div class="card">

<form action="{{ route('admin.fasilitas.update',$data->id) }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="mb-3">

<label>Jenis Fasilitas</label>

<select name="jenis" class="form-control" required>

<option value="akomodasi" {{ $data->jenis=='akomodasi'?'selected':'' }}>Akomodasi</option>

<option value="kuliner" {{ $data->jenis=='kuliner'?'selected':'' }}>Kuliner</option>

<option value="pusat informasi" {{ $data->jenis=='pusat informasi'?'selected':'' }}>Pusat Informasi</option>

<option value="toilet" {{ $data->jenis=='toilet'?'selected':'' }}>Toilet</option>

<option value="parkir" {{ $data->jenis=='parkir'?'selected':'' }}>Parkir</option>

<option value="akses jalan" {{ $data->jenis=='akses jalan'?'selected':'' }}>Akses Jalan</option>

<option value="pemandu lokal" {{ $data->jenis=='pemandu lokal'?'selected':'' }}>Pemandu Lokal</option>

</select>

</div>

<div class="mb-3">
<label>Nama</label>

<input type="text"
       name="nama"
       class="form-control"
       value="{{ $data->nama }}"
       required>
</div>

<div class="mb-3">
<label>Deskripsi</label>

<textarea
name="deskripsi"
rows="5"
class="form-control"
required>{{ $data->deskripsi }}</textarea>
</div>

<div class="row">

<div class="col">
<label>Lokasi</label>

<input type="text"
       name="lokasi"
       class="form-control"
       value="{{ $data->lokasi }}">
</div>

<div class="col">
<label>Kontak</label>

<input type="text"
       name="kontak"
       class="form-control"
       value="{{ $data->kontak }}">
</div>

<div class="col">
<label>Harga</label>

<input type="text"
       name="harga"
       class="form-control"
       value="{{ $data->harga }}">
</div>

</div>

<br>

<div class="row">

<div class="col">
<label>Urutan</label>

<input type="number"
       name="urutan"
       class="form-control"
       value="{{ $data->urutan }}">
</div>

<div class="col">
<label>Gambar Baru</label>

<input type="file"
       name="gambar"
       class="form-control">

@if($data->gambar)
<img src="{{ $data->gambar_url }}" class="preview">
@endif

</div>

</div>

<br>

<label>
<input type="checkbox"
       name="status"
       value="1"
       {{ $data->status ? 'checked':'' }}>

Aktifkan Fasilitas
</label>

<br><br>

<button class="btn-save">
    Update
</button>

<a href="{{ route('admin.fasilitas.index') }}"
   class="btn-cancel">
    Batal
</a>

</form>

</div>

@endsection