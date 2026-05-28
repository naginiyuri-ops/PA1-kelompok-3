<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PenginapanController extends Controller
{
    public function index()
    {
        $data = Penginapan::orderBy('urutan')->paginate(10);
        return view('admin.penginapan.index', compact('data'));
    }

    public function create()
    {
        $lastUrutan = Penginapan::max('urutan');
        $nextUrutan = $lastUrutan ? $lastUrutan + 1 : 1;
        return view('admin.penginapan.create', compact('nextUrutan'));
    }

    public function store(Request $request)
    {
        // VALIDASI (5MB MAX)
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // 5MB
            'urutan' => 'required|integer|unique:penginapan,urutan',
            'harga' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'status' => 'nullable|boolean'
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0,
            'gambar' => null
        ];

        // PROSES UPLOAD GAMBAR KE STORAGE
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            
            if ($file->isValid()) {
                $filename = time() . '_penginapan_' . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('penginapan', $filename, 'public');
                $data['gambar'] = $path;
            }
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'urutan' => 'required|integer|unique:penginapan,urutan,' . $id,
            'harga' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'status' => 'nullable|boolean'
        ]);

        $input = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0
        ];

        // HAPUS GAMBAR
        if ($request->has('hapus_gambar')) {
            if ($data->gambar && Storage::disk('public')->exists($data->gambar)) {
                Storage::disk('public')->delete($data->gambar);
            }
            $input['gambar'] = null;
        }

        // UPLOAD GAMBAR BARU
        if ($request->hasFile('gambar')) {
            if ($data->gambar && Storage::disk('public')->exists($data->gambar)) {
                Storage::disk('public')->delete($data->gambar);
            }
            
            $file = $request->file('gambar');
            if ($file->isValid()) {
                $filename = time() . '_penginapan_' . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('penginapan', $filename, 'public');
                $input['gambar'] = $path;
            }
        }

        $data->update($input);
        return redirect()->route('admin.penginapan.index')->with('success', 'Penginapan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $data = Penginapan::findOrFail($id);
        
        if ($data->gambar && Storage::disk('public')->exists($data->gambar)) {
            Storage::disk('public')->delete($data->gambar);
        }
        
        $data->delete();
        return redirect()->route('admin.penginapan.index')->with('success', 'Penginapan berhasil dihapus!');
    }
}