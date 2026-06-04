<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
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
            'kontak' => [
                'nullable',
                'string',
                'max:255',
                'regex:/^(-|[0-9]{12})$/',
            ],
            'status' => 'nullable|boolean'
        ], [
            'kontak.regex' => 'Nomor kontak harus diisi "-" atau 12 digit angka (contoh: 081234567890)',
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

        // ========== UBAH: UPLOAD KE public/image/umkm/ ==========
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_umkm_' . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
            
            // Buat folder jika belum ada
            if (!file_exists(public_path('image/umkm'))) {
                mkdir(public_path('image/umkm'), 0777, true);
            }
            
            // Pindahkan file ke public/image/umkm/
            $file->move(public_path('image/umkm'), $filename);
            $data['gambar'] = 'image/umkm/' . $filename;
        }
        // ========== END UBAH ==========

        Umkm::create($data);
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil ditambahkan!');
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
            'kontak' => [
                'nullable',
                'string',
                'max:255',
                'regex:/^(-|[0-9]{12})$/',
            ],
            'status' => 'nullable|boolean'
        ], [
            'kontak.regex' => 'Nomor kontak harus diisi "-" atau 12 digit angka (contoh: 081234567890)',
        ]);

        $input = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0
        ];

        // ========== UBAH: HAPUS GAMBAR LAMA DARI public/image/umkm/ ==========
        if ($request->has('hapus_gambar')) {
            if ($data->gambar && file_exists(public_path($data->gambar))) {
                unlink(public_path($data->gambar));
            }
            $input['gambar'] = null;
        }

        // ========== UBAH: UPLOAD GAMBAR BARU KE public/image/umkm/ ==========
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($data->gambar && file_exists(public_path($data->gambar))) {
                unlink(public_path($data->gambar));
            }
            
            $file = $request->file('gambar');
            $filename = time() . '_umkm_' . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
            
            // Buat folder jika belum ada
            if (!file_exists(public_path('image/umkm'))) {
                mkdir(public_path('image/umkm'), 0777, true);
            }
            
            $file->move(public_path('image/umkm'), $filename);
            $input['gambar'] = 'image/umkm/' . $filename;
        }
        // ========== END UBAH ==========

        $data->update($input);
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil diupdate!');
    }

    public function destroy($id)
    {
        $data = Umkm::findOrFail($id);
        
        // ========== UBAH: HAPUS FILE DARI public/image/umkm/ ==========
        if ($data->gambar && file_exists(public_path($data->gambar))) {
            unlink(public_path($data->gambar));
        }
        // ========== END UBAH ==========
        
        $data->delete();
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil dihapus!');
    }
}