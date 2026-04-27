<?php
// app/Http/Controllers/Admin/BeritaController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    // Index untuk admin
    public function index()
    {
        $berita = Berita::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }
    
    // Create form
    public function create()
    {
        return view('admin.berita.create');
    }
    
    // Store data
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal_berita' => 'nullable|date',
            'status' => 'nullable|boolean'
        ]);
        
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['penulis'] = auth()->user()->name ?? 'Admin';
        $data['status'] = $request->has('status');
        
        // Upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('berita', $filename, 'public');
            $data['gambar'] = '/storage/' . $path;
        }
        
        Berita::create($data);
        
        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }
    
    // Edit form
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }
    
    // Update data
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal_berita' => 'nullable|date',
            'status' => 'nullable|boolean'
        ]);
        
        $data = $request->all();
        $data['status'] = $request->has('status');
        
        // Upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($berita->gambar && Storage::disk('public')->exists(str_replace('/storage/', '', $berita->gambar))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $berita->gambar));
            }
            
            $gambar = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('berita', $filename, 'public');
            $data['gambar'] = '/storage/' . $path;
        }
        
        $berita->update($data);
        
        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diupdate');
    }
    
    // Delete
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        
        // Hapus gambar
        if ($berita->gambar && Storage::disk('public')->exists(str_replace('/storage/', '', $berita->gambar))) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $berita->gambar));
        }
        
        $berita->delete();
        
        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus');
    }
}