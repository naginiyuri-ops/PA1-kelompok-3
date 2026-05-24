<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index()
    {
        $data = Fasilitas::orderBy('urutan')->paginate(10);
        return view('admin.fasilitas.index', compact('data'));
    }

    public function create()
    {
        $lastUrutan = Fasilitas::max('urutan');
        $nextUrutan = $lastUrutan ? $lastUrutan + 1 : 1;
        return view('admin.fasilitas.create', compact('nextUrutan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kontak' => 'nullable|string|max:255',  // ← TAMBAHKAN VALIDASI KONTAK
            'harga' => 'nullable|string|max:255',
            'urutan' => 'required|integer|unique:fasilitas,urutan',
            'status' => 'nullable|boolean'
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,  // ← TAMBAHKAN KONTAK
            'harga' => $request->harga,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9]/', '_', pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $filename = $filename . '.' . strtolower($file->getClientOriginalExtension());
            $path = $file->storeAs('fasilitas', $filename, 'public');
            $data['gambar'] = $path;
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kontak' => 'nullable|string|max:255',  // ← TAMBAHKAN VALIDASI KONTAK
            'harga' => 'nullable|string|max:255',
            'urutan' => 'required|integer|unique:fasilitas,urutan,' . $id,
            'status' => 'nullable|boolean'
        ]);

        $input = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,  // ← TAMBAHKAN KONTAK
            'harga' => $request->harga,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0
        ];

        // Hapus gambar jika dicentang
        if ($request->has('hapus_gambar')) {
            if ($data->gambar && Storage::disk('public')->exists($data->gambar)) {
                Storage::disk('public')->delete($data->gambar);
            }
            $input['gambar'] = null;
        }

        // Upload gambar baru
        if ($request->hasFile('gambar')) {
            if ($data->gambar && Storage::disk('public')->exists($data->gambar)) {
                Storage::disk('public')->delete($data->gambar);
            }
            
            $file = $request->file('gambar');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9]/', '_', pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $filename = $filename . '.' . strtolower($file->getClientOriginalExtension());
            $path = $file->storeAs('fasilitas', $filename, 'public');
            $input['gambar'] = $path;
        }

        $data->update($input);
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diupdate!');
    }

    public function destroy($id)
    {
        $data = Fasilitas::findOrFail($id);
        
        if ($data->gambar && Storage::disk('public')->exists($data->gambar)) {
            Storage::disk('public')->delete($data->gambar);
        }
        
        $data->delete();
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus!');
    }
}