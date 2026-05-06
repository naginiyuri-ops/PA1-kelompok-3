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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:4096', // 4MB
            'urutan' => 'required|integer',
            'lokasi' => 'nullable|string',
            'kontak' => 'nullable|string',
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

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageData = file_get_contents($image->getRealPath());
            $base64 = base64_encode($imageData);
            $mimeType = $image->getMimeType();
            $data['gambar'] = 'data:' . $mimeType . ';base64,' . $base64;
        }

        Umkm::create($data);
        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil ditambahkan! (Gambar max 4MB)');
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:4096', // 4MB
            'urutan' => 'required|integer',
            'lokasi' => 'nullable|string',
            'kontak' => 'nullable|string',
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

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageData = file_get_contents($image->getRealPath());
            $base64 = base64_encode($imageData);
            $mimeType = $image->getMimeType();
            $input['gambar'] = 'data:' . $mimeType . ';base64,' . $base64;
        }

        $data->update($input);
        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil diupdate!');
    }

    public function destroy($id)
    {
        $data = Umkm::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil dihapus!');
    }
}