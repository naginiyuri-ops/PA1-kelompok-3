<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $data = Fasilitas::orderBy('urutan')->paginate(10);
        return view('admin.fasilitas.index', compact('data'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'urutan' => 'required|integer',
            'harga' => 'nullable|string',
            'status' => 'nullable|boolean'
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $data['gambar'] = 'data:' . $file->getMimeType() . ';base64,' . base64_encode(file_get_contents($file));
        }

        Fasilitas::create($data);
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Fasilitas::findOrFail($id);
        return view('admin.fasilitas.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Fasilitas::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'urutan' => 'required|integer',
            'harga' => 'nullable|string',
            'status' => 'nullable|boolean'
        ]);

        $input = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $input['gambar'] = 'data:' . $file->getMimeType() . ';base64,' . base64_encode(file_get_contents($file));
        }

        $data->update($input);
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diupdate!');
    }

    public function destroy($id)
    {
        $data = Fasilitas::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus!');
    }
}