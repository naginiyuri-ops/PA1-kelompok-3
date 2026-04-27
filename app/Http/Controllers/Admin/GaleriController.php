<?php
// app/Http/Controllers/Admin/GaleriController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    // Index untuk admin
    public function index()
    {
        $galeri = Galeri::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.galeri.index', compact('galeri'));
    }
    
    // Form create
    public function create()
    {
        return view('admin.galeri.create');
    }
    
    // Store data galeri
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:Meat,Batu Bahisan,Liang Sipege',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'lokasi' => 'nullable|string',
            'tanggal_foto' => 'nullable|date',
            'status' => 'nullable|boolean'
        ]);
        
        // Upload gambar ke folder sesuai kategori
        $kategori = $request->kategori;
        $folderPath = Galeri::getPathByKategori($kategori);
        
        $gambar = $request->file('gambar');
        $filename = time() . '_' . Str::slug($request->judul) . '.' . $gambar->getClientOriginalExtension();
        
        // Simpan ke storage/app/public/...
        $path = $gambar->storeAs($folderPath, $filename, 'public');
        
        // Path untuk akses publik
        $gambarPath = '/storage/' . $path;
        
        Galeri::create([
            'judul' => $request->judul,
            'kategori' => $kategori,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
            'lokasi' => $request->lokasi,
            'tanggal_foto' => $request->tanggal_foto,
            'status' => $request->has('status'),
        ]);
        
        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan');
    }
    
    // Edit form
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }
    
    // Update data
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:Meat,Batu Bahisan,Liang Sipege',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'lokasi' => 'nullable|string',
            'tanggal_foto' => 'nullable|date',
            'status' => 'nullable|boolean'
        ]);
        
        $data = [
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'tanggal_foto' => $request->tanggal_foto,
            'status' => $request->has('status'),
        ];
        
        // Upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage
            $oldPath = str_replace('/storage/', '', $galeri->gambar);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
            
            // Upload gambar baru
            $kategori = $request->kategori;
            $folderPath = Galeri::getPathByKategori($kategori);
            
            $gambar = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs($folderPath, $filename, 'public');
            $data['gambar'] = '/storage/' . $path;
        }
        
        $galeri->update($data);
        
        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil diupdate');
    }
    
    // Delete data
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        
        // Hapus file gambar dari storage
        $gambarPath = str_replace('/storage/', '', $galeri->gambar);
        if (Storage::disk('public')->exists($gambarPath)) {
            Storage::disk('public')->delete($gambarPath);
        }
        
        $galeri->delete();
        
        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil dihapus');
    }
}