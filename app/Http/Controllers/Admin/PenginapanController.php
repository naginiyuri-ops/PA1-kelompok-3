<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
        // VALIDASI
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'urutan' => 'required|integer|unique:penginapan,urutan',
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

        // PROSES HARGA
        $hargaValue = $request->harga;
        if ($request->has('free_harga')) {
            $hargaValue = 'Free';
        }

        $data = [
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $hargaValue,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0
        ];

        // ========== UBAH: UPLOAD KE public/image/penginapan/ ==========
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_penginapan_' . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
            
            // Buat folder jika belum ada
            if (!file_exists(public_path('image/penginapan'))) {
                mkdir(public_path('image/penginapan'), 0777, true);
            }
            
            // Pindahkan file ke public/image/penginapan/
            $file->move(public_path('image/penginapan'), $filename);
            $data['gambar'] = 'image/penginapan/' . $filename;
        }
        // ========== END UBAH ==========

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

        // PROSES HARGA
        $hargaValue = $request->harga;
        if ($request->has('free_harga')) {
            $hargaValue = 'Free';
        }

        $input = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $hargaValue,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0
        ];

        // ========== UBAH: HAPUS GAMBAR LAMA DARI public/image/penginapan/ ==========
        if ($request->has('hapus_gambar')) {
            if ($data->gambar && file_exists(public_path($data->gambar))) {
                unlink(public_path($data->gambar));
            }
            $input['gambar'] = null;
        }

        // ========== UBAH: UPLOAD GAMBAR BARU KE public/image/penginapan/ ==========
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($data->gambar && file_exists(public_path($data->gambar))) {
                unlink(public_path($data->gambar));
            }
            
            $file = $request->file('gambar');
            $filename = time() . '_penginapan_' . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
            
            // Buat folder jika belum ada
            if (!file_exists(public_path('image/penginapan'))) {
                mkdir(public_path('image/penginapan'), 0777, true);
            }
            
            $file->move(public_path('image/penginapan'), $filename);
            $input['gambar'] = 'image/penginapan/' . $filename;
        }
        // ========== END UBAH ==========

        $data->update($input);
        return redirect()->route('admin.penginapan.index')->with('success', 'Penginapan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $data = Penginapan::findOrFail($id);
        
        // ========== UBAH: HAPUS FILE DARI public/image/penginapan/ ==========
        if ($data->gambar && file_exists(public_path($data->gambar))) {
            unlink(public_path($data->gambar));
        }
        // ========== END UBAH ==========
        
        $data->delete();
        return redirect()->route('admin.penginapan.index')->with('success', 'Penginapan berhasil dihapus!');
    }
}