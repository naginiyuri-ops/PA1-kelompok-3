@extends('layouts.admin')

@section('title', 'Manajemen Fasilitas')

@section('content')

<style>
.alert-success{
    background:#d1fae5;
    color:#065f46;
    padding:12px;
    border-radius:8px;
    margin-bottom:15px;
}

.alert-error{
    background:#fee2e2;
    color:#991b1b;
    padding:12px;
    border-radius:8px;
    margin-bottom:15px;
}

.stats-bar{
    display:flex;
    gap:10px;
    margin-bottom:20px;
}

.stats-badge{
    background:#fff;
    border:1px solid #ddd;
    padding:10px 15px;
    border-radius:8px;
}

.table-wrapper{
    overflow-x:auto;
    background:#fff;
    padding:15px;
    border-radius:12px;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#003366;
    color:white;
    padding:12px;
}

td{
    padding:10px;
    border-bottom:1px solid #eee;
}

.table-img{
    width:70px;
    height:70px;
    object-fit:cover;
    border-radius:8px;
}

.badge{
    padding:6px 10px;
    border-radius:20px;
    font-size:12px;
}

.badge-success{
    background:#dcfce7;
    color:#166534;
}

.badge-danger{
    background:#fee2e2;
    color:#991b1b;
}

.btn-group{
    display:flex;
    gap:5px;
}

.btn-edit{
    background:#2563eb;
    color:white;
    padding:6px 12px;
    border-radius:6px;
    text-decoration:none;
}

.btn-delete{
    background:#dc2626;
    color:white;
    border:none;
    padding:6px 12px;
    border-radius:6px;
    cursor:pointer;
}

.btn-add{
    background:#003366;
    color:white;
    padding:10px 15px;
    border-radius:8px;
    text-decoration:none;
}

.empty-state{
    text-align:center;
    padding:40px;
}
</style>

@if(session('success'))
<div class="alert-success">
    {{ session('success') }}
</div>
@endif

<div style="display:flex;justify-content:space-between;margin-bottom:20px;">
    <h3>Data Fasilitas</h3>

    <a href="{{ route('admin.fasilitas.create') }}" class="btn-add">
        + Tambah Fasilitas
    </a>
</div>

<div class="stats-bar">
    <span class="stats-badge">
        Total : {{ $data->total() }}
    </span>
</div>

<div class="table-wrapper">
<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Jenis</th>
        <th>Nama</th>
        <th>Lokasi</th>
        <th>Harga</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    </thead>

    <tbody>

    @forelse($data as $item)

    <tr>
        <td>{{ $loop->iteration }}</td>

        <td>
            <img src="{{ $item->gambar_url }}" class="table-img">
        </td>

        <td>{{ ucfirst($item->jenis) }}</td>

        <td>{{ $item->nama }}</td>

        <td>{{ $item->lokasi }}</td>

        <td>{{ $item->harga ?? '-' }}</td>

        <td>
            <span class="badge {{ $item->status ? 'badge-success':'badge-danger' }}">
                {{ $item->status ? 'Aktif':'Nonaktif' }}
            </span>
        </td>

        <td>
            <div class="btn-group">

                <a href="{{ route('admin.fasilitas.edit',$item->id) }}"
                   class="btn-edit">
                    Edit
                </a>

                <form action="{{ route('admin.fasilitas.destroy',$item->id) }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn-delete"
                        onclick="return confirm('Yakin hapus data?')">
                        Hapus
                    </button>

                </form>

            </div>
        </td>
    </tr>

    @empty

    <tr>
        <td colspan="8" class="empty-state">
            Belum ada data fasilitas
        </td>
    </tr>

    @endforelse

    </tbody>

</table>
</div>

<div style="margin-top:20px">
    {{ $data->links() }}
</div>

@endsection