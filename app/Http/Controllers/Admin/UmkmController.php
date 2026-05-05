<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index()
    {
        $umkm = Umkm::orderBy('urutan')->paginate(10);
        return view('admin.umkm.index', compact('umkm'));
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
            'gambar' => 'nullable|image|max:5120',
            'lokasi' => 'nullable|string',
            'kontak' => 'nullable|string',
            'urutan' => 'required|integer'
        ]);

        $data = $request->except('gambar');
        
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $data['gambar'] = 'data:' . $image->getMimeType() . ';base64,' . base64_encode(file_get_contents($image));
        }

        Umkm::create($data);
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $umkm = Umkm::findOrFail($id);
        return view('admin.umkm.edit', compact('umkm'));
    }

    public function update(Request $request, $id)
    {
        $umkm = Umkm::findOrFail($id);
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:5120',
            'lokasi' => 'nullable|string',
            'kontak' => 'nullable|string',
            'urutan' => 'required|integer'
        ]);

        $data = $request->except('gambar');
        
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $data['gambar'] = 'data:' . $image->getMimeType() . ';base64,' . base64_encode(file_get_contents($image));
        }

        $umkm->update($data);
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil diupdate!');
    }

    public function destroy($id)
    {
        Umkm::findOrFail($id)->delete();
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil dihapus!');
    }
}