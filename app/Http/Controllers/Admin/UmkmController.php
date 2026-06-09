<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UmkmController extends Controller
{
    // Halaman index (daftar UMKM)
    public function index()
    {
        $data = Umkm::latest()->paginate(10);
        return view('admin.umkm.index', compact('data'));
    }

    // Halaman create (form tambah)
    public function create()
    {
        return view('admin.umkm.create');
    }

    // Proses simpan data
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
            'deskripsi' => 'nullable|string',
            'status' => 'nullable|in:aktif,nonaktif',
            'foto_utama' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        // Data yang akan disimpan
        $data = [
            'nama_usaha' => $request->nama_usaha,
            'pemilik' => $request->pemilik,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status ?? 'aktif',
        ];

        // Upload foto_utama
        if ($request->hasFile('foto_utama')) {
            $file = $request->file('foto_utama');
            $filename = time() . '_umkm_' . Str::slug($request->nama_usaha) . '.' . $file->getClientOriginalExtension();
            
            // Buat folder jika belum ada
            if (!file_exists(public_path('image/umkm'))) {
                mkdir(public_path('image/umkm'), 0777, true);
            }
            
            // Pindahkan file ke public/image/umkm/
            $file->move(public_path('image/umkm'), $filename);
            $data['foto_utama'] = 'image/umkm/' . $filename;
        }

        // Simpan ke database
        Umkm::create($data);
        
        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil ditambahkan!');
    }

    // Halaman edit
    public function edit($id)
    {
        $data = Umkm::findOrFail($id);
        return view('admin.umkm.edit', compact('data'));
    }

    // Proses update data
    public function update(Request $request, $id)
    {
        $data = Umkm::findOrFail($id);

        // Validasi
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
            'deskripsi' => 'nullable|string',
            'status' => 'nullable|in:aktif,nonaktif',
            'foto_utama' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        // Data yang akan diupdate
        $input = [
            'nama_usaha' => $request->nama_usaha,
            'pemilik' => $request->pemilik,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status ?? 'aktif',
        ];

        // Hapus foto lama jika dicentang
        if ($request->has('hapus_gambar') && $request->hapus_gambar == 1) {
            if ($data->foto_utama && file_exists(public_path($data->foto_utama))) {
                unlink(public_path($data->foto_utama));
            }
            $input['foto_utama'] = null;
        }

        // Upload foto baru
        if ($request->hasFile('foto_utama')) {
            // Hapus foto lama jika ada
            if ($data->foto_utama && file_exists(public_path($data->foto_utama))) {
                unlink(public_path($data->foto_utama));
            }
            
            $file = $request->file('foto_utama');
            $filename = time() . '_umkm_' . Str::slug($request->nama_usaha) . '.' . $file->getClientOriginalExtension();
            
            // Buat folder jika belum ada
            if (!file_exists(public_path('image/umkm'))) {
                mkdir(public_path('image/umkm'), 0777, true);
            }
            
            $file->move(public_path('image/umkm'), $filename);
            $input['foto_utama'] = 'image/umkm/' . $filename;
        }

        // Update ke database
        $data->update($input);
        
        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil diupdate!');
    }

    // Proses hapus data
    public function destroy($id)
    {
        $data = Umkm::findOrFail($id);
        
        // Hapus file foto jika ada
        if ($data->foto_utama && file_exists(public_path($data->foto_utama))) {
            unlink(public_path($data->foto_utama));
        }
        
        $data->delete();
        
        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil dihapus!');
    }

    // Toggle status (aktif/nonaktif)
    public function toggleStatus($id)
    {
        $umkm = Umkm::findOrFail($id);
        $umkm->status = $umkm->status == 'aktif' ? 'nonaktif' : 'aktif';
        $umkm->save();

        return response()->json([
            'success' => true, 
            'status' => $umkm->status
        ]);
    }
}