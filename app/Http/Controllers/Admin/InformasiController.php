<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'status' => 'nullable|boolean'
        ]);

        // Cek apakah slug sudah ada
        $slug = Str::slug($request->judul);
        $originalSlug = $slug;
        $counter = 1;
        
        while (Informasi::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $data = [
            'judul' => $request->judul,
            'slug' => $slug,
            'konten' => $request->konten,
            'status' => $request->has('status') ? 1 : 0,
            'urutan' => 0,
            'views' => 0
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            
            // Pastikan folder image/informasi ada
            if (!file_exists(public_path('image/informasi'))) {
                mkdir(public_path('image/informasi'), 0777, true);
            }
            
            // Simpan ke public/image/informasi/
            $file->move(public_path('image/informasi'), $filename);
            $data['gambar'] = 'image/informasi/' . $filename;
        }

        Informasi::create($data);
        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'status' => 'nullable|boolean'
        ]);

        // Cek apakah slug sudah ada (kecuali untuk record saat ini)
        $slug = Str::slug($request->judul);
        $originalSlug = $slug;
        $counter = 1;
        
        while (Informasi::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $data = [
            'judul' => $request->judul,
            'slug' => $slug,
            'konten' => $request->konten,
            'status' => $request->has('status') ? 1 : 0
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($informasi->gambar && file_exists(public_path($informasi->gambar))) {
                unlink(public_path($informasi->gambar));
            }
            
            $file = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('image/informasi'), $filename);
            $data['gambar'] = 'image/informasi/' . $filename;
        }

        $informasi->update($data);
        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil diupdate!');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        
        // Hapus file gambar jika ada
        if ($informasi->gambar && file_exists(public_path($informasi->gambar))) {
            unlink(public_path($informasi->gambar));
        }
        
        $informasi->delete();
        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil dihapus!');
    }
    
    public function toggleStatus($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->status = !$informasi->status;
        $informasi->save();
        
        return response()->json(['success' => true, 'status' => $informasi->status]);
    }
}