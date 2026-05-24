<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penginapan;
use Illuminate\Http\Request;

class PenginapanController extends Controller
{
    public function index()
    {
        $data = Penginapan::orderBy('urutan')->paginate(10);
        return view('admin.penginapan.index', compact('data'));
    }

    public function create()
    {
        return view('admin.penginapan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'urutan' => 'required|integer',
            'harga' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'status' => 'nullable|boolean'
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'kontak' => $request->kontak,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $data['gambar'] = 'data:' . $file->getMimeType() . ';base64,' . base64_encode(file_get_contents($file));
        }

        Penginapan::create($data);
        return redirect()->route('admin.penginapan.index')->with('success', 'Penginapan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Penginapan::findOrFail($id);
        return view('admin.penginapan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Penginapan::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'urutan' => 'required|integer',
            'harga' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'status' => 'nullable|boolean'
        ]);

        $input = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'kontak' => $request->kontak,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $input['gambar'] = 'data:' . $file->getMimeType() . ';base64,' . base64_encode(file_get_contents($file));
        }

        $data->update($input);
        return redirect()->route('admin.penginapan.index')->with('success', 'Penginapan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $data = Penginapan::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.penginapan.index')->with('success', 'Penginapan berhasil dihapus!');
    }
}