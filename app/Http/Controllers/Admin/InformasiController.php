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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'status' => 'nullable|boolean'
        ]);
        
        try {
            $gambarBase64 = null;
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $gambarBase64 = 'data:' . $file->getMimeType() . ';base64,' . base64_encode(file_get_contents($file));
            }
            
            Informasi::create([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'konten' => $request->konten,
                'gambar' => $gambarBase64,
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
            $data = [
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'konten' => $request->konten,
                'status' => $request->has('status') ? 1 : 0
            ];
            
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $data['gambar'] = 'data:' . $file->getMimeType() . ';base64,' . base64_encode(file_get_contents($file));
            }
            
            $informasi->update($data);
            
            return redirect()->route('admin.informasi.index')
                ->with('success', 'Informasi "' . $request->judul . '" berhasil diupdate!');
                
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
}