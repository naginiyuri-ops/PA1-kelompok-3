<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UmkmController extends Controller
{
    public function index()
    {
        $data = Umkm::latest()->paginate(10);
        return view('admin.umkm.index', compact('data'));
    }

    public function create()
    {
        return view('admin.umkm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:100',
            'urutan' => 'nullable|integer',
            'status' => 'nullable|boolean',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $data = [
            'nama_usaha' => $request->nama,
            'pemilik' => $request->pemilik ?? 'Admin',
            'alamat' => $request->lokasi ?? 'Desa Meat',
            'no_telepon' => $request->kontak ?? '-',
            'deskripsi' => $request->deskripsi,
            'urutan' => $request->urutan ?? 0,
            'status' => $request->has('status') ? 'aktif' : 'nonaktif',
        ];

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->nama) . '.' . $image->getClientOriginalExtension();
            
            $destinationPath = public_path('image/umkm');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $image->move($destinationPath, $filename);
            $data['foto_utama'] = 'image/umkm/' . $filename;
        }

        Umkm::create($data);

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Umkm::findOrFail($id);
        // Mapping untuk form edit
        $data->nama = $data->nama_usaha;
        $data->lokasi = $data->alamat;
        $data->kontak = $data->no_telepon;
        $data->gambar = $data->foto_utama;
        return view('admin.umkm.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $umkm = Umkm::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:100',
            'urutan' => 'nullable|integer',
            'status' => 'nullable|boolean',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $updateData = [
            'nama_usaha' => $request->nama,
            'pemilik' => $request->pemilik ?? 'Admin',
            'alamat' => $request->lokasi ?? 'Desa Meat',
            'no_telepon' => $request->kontak ?? '-',
            'deskripsi' => $request->deskripsi,
            'urutan' => $request->urutan ?? 0,
            'status' => $request->has('status') ? 'aktif' : 'nonaktif',
        ];

        // Handle hapus gambar
        if ($request->has('hapus_gambar') && $request->hapus_gambar == 1) {
            $updateData['foto_utama'] = null;
        }

        // Handle upload gambar baru
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->nama) . '.' . $image->getClientOriginalExtension();
            
            $destinationPath = public_path('image/umkm');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $image->move($destinationPath, $filename);
            $updateData['foto_utama'] = 'image/umkm/' . $filename;
        }

        $umkm->update($updateData);

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil diupdate!');
    }

    public function destroy($id)
    {
        $umkm = Umkm::findOrFail($id);
        $umkm->delete();

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil dihapus!');
    }

    public function toggleStatus($id)
    {
        $umkm = Umkm::findOrFail($id);
        $umkm->status = $umkm->status == 'aktif' ? 'nonaktif' : 'aktif';
        $umkm->save();

        return response()->json(['success' => true, 'status' => $umkm->status]);
    }
}