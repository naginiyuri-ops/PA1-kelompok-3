<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    // ==================== ADMIN METHODS ====================
    
    public function indexAdmin()
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
        // Validasi
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'status' => 'nullable|boolean'
        ]);
        
        try {
            // Upload gambar ke storage
            $gambarPath = null;
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
                $gambarPath = $file->storeAs('informasi', $filename, 'public');
            }
            
            // Simpan ke database
            Informasi::create([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'konten' => $request->konten,
                'gambar' => $gambarPath,
                'status' => $request->has('status') ? 1 : 0
            ]);
            
            return redirect()->route('admin.informasi.index')
                ->with('success', 'Informasi berhasil ditambahkan!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'status' => 'nullable|boolean'
        ]);
        
        try {
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama
                if ($informasi->gambar && Storage::disk('public')->exists($informasi->gambar)) {
                    Storage::disk('public')->delete($informasi->gambar);
                }
                
                $file = $request->file('gambar');
                $filename = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
                $gambarPath = $file->storeAs('informasi', $filename, 'public');
                $informasi->gambar = $gambarPath;
            }
            
            $informasi->judul = $request->judul;
            $informasi->slug = Str::slug($request->judul);
            $informasi->konten = $request->konten;
            $informasi->status = $request->has('status') ? 1 : 0;
            $informasi->save();
            
            return redirect()->route('admin.informasi.index')
                ->with('success', 'Informasi berhasil diupdate!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }
    
    public function destroy($id)
    {
        try {
            $informasi = Informasi::findOrFail($id);
            
            if ($informasi->gambar && Storage::disk('public')->exists($informasi->gambar)) {
                Storage::disk('public')->delete($informasi->gambar);
            }
            
            $informasi->delete();
            
            return redirect()->route('admin.informasi.index')
                ->with('success', 'Informasi berhasil dihapus!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    
    public function toggleStatus($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->status = !$informasi->status;
        $informasi->save();
        
        $statusText = $informasi->status ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->back()->with('success', "Informasi berhasil {$statusText}!");
    }
    
    // ==================== FRONTEND METHODS ====================
    
    public function index()
    {
        $informasiList = Informasi::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('pages.informasi', compact('informasiList'));
    }
    
    public function show($slug)
    {
        $informasi = Informasi::where('slug', $slug)->where('status', 1)->firstOrFail();
        return view('pages.informasi-detail', compact('informasi'));
    }
}