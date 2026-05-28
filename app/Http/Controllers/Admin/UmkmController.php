<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UmkmController extends Controller
{
    public function index()
    {
        $data = Umkm::orderBy('urutan')->paginate(10);
        return view('admin.umkm.index', compact('data'));
    }

    public function create()
    {
        $lastUrutan = Umkm::max('urutan');
        $nextUrutan = $lastUrutan ? $lastUrutan + 1 : 1;
        return view('admin.umkm.create', compact('nextUrutan'));
    }

    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'urutan' => 'required|integer|unique:umkm,urutan',
            'lokasi' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'status' => 'nullable|boolean'
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0,
            'gambar' => null
        ];

        // PROSES UPLOAD GAMBAR
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            
            // Cek apakah file valid
            if ($file->isValid()) {
                // Buat nama file unik
                $filename = time() . '_umkm_' . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
                
                // Simpan ke storage/public/umkm
                $path = $file->storeAs('umkm', $filename, 'public');
                
                // Simpan PATH ke database
                $data['gambar'] = $path;
                
                // Debug (cek di log)
                \Log::info('Gambar tersimpan di: ' . $path);
            } else {
                \Log::error('File tidak valid: ' . $file->getErrorMessage());
            }
        } else {
            \Log::info('Tidak ada file yang diupload');
        }

        // SIMPAN KE DATABASE
        $umkm = Umkm::create($data);
        
        if ($umkm) {
            return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data!')->withInput();
        }
    }

    public function edit($id)
    {
        $data = Umkm::findOrFail($id);
        return view('admin.umkm.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Umkm::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'urutan' => 'required|integer|unique:umkm,urutan,' . $id,
            'lokasi' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'status' => 'nullable|boolean'
        ]);

        $input = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0
        ];

        // HAPUS GAMBAR LAMA
        if ($request->has('hapus_gambar')) {
            if ($data->gambar && Storage::disk('public')->exists($data->gambar)) {
                Storage::disk('public')->delete($data->gambar);
            }
            $input['gambar'] = null;
        }

        // UPLOAD GAMBAR BARU
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($data->gambar && Storage::disk('public')->exists($data->gambar)) {
                Storage::disk('public')->delete($data->gambar);
            }
            
            $file = $request->file('gambar');
            if ($file->isValid()) {
                $filename = time() . '_umkm_' . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('umkm', $filename, 'public');
                $input['gambar'] = $path;
                \Log::info('Gambar diupdate ke: ' . $path);
            }
        }

        $data->update($input);
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil diupdate!');
    }

    public function destroy($id)
    {
        $data = Umkm::findOrFail($id);
        
        // Hapus file gambar
        if ($data->gambar && Storage::disk('public')->exists($data->gambar)) {
            Storage::disk('public')->delete($data->gambar);
        }
        
        $data->delete();
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil dihapus!');
    }
}