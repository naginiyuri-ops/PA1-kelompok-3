<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index()
    {
        $data = Umkm::orderBy('urutan')->paginate(10);
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'urutan' => 'required|integer',
            'lokasi' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'status' => 'nullable|boolean'
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0
        ];

        // Simpan gambar sebagai BASE64 ke database
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageData = base64_encode(file_get_contents($file));
            $extension = $file->getClientOriginalExtension();
            $data['gambar'] = 'data:image/' . $extension . ';base64,' . $imageData;
        }

        Umkm::create($data);
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Umkm::findOrFail($id);
        return view('admin.umkm.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Umkm::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'urutan' => 'required|integer',
            'lokasi' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'status' => 'nullable|boolean'
        ]);

        $input = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0
        ];

        // Hapus gambar jika dicentang
        if ($request->has('hapus_gambar')) {
            $input['gambar'] = null;
        }

        // Upload gambar baru sebagai BASE64
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageData = base64_encode(file_get_contents($file));
            $extension = $file->getClientOriginalExtension();
            $input['gambar'] = 'data:image/' . $extension . ';base64,' . $imageData;
        }

        $data->update($input);
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil diupdate!');
    }

    public function destroy($id)
    {
        $data = Umkm::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil dihapus!');
    }
}