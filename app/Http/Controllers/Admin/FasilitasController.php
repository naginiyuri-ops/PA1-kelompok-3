<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
        // VALIDASI (SAMA PERSIS)
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'urutan' => 'required|integer|unique:fasilitas,urutan',
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

        // ========== UBAH BAGIAN INI ==========
        // UPLOAD GAMBAR KE public/image/fasilitas/
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
            
            // Buat folder jika belum ada
            if (!file_exists(public_path('image/fasilitas'))) {
                mkdir(public_path('image/fasilitas'), 0777, true);
            }
            
            // Pindahkan file ke public/image/fasilitas/
            $file->move(public_path('image/fasilitas'), $filename);
            $data['gambar'] = 'image/fasilitas/' . $filename;
        }
        // ========== END UBAH ==========

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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'urutan' => 'required|integer|unique:fasilitas,urutan,' . $id,
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

        // ========== UBAH BAGIAN INI ==========
        // HAPUS GAMBAR LAMA (dari public/image/fasilitas/)
        if ($request->has('hapus_gambar')) {
            if ($data->gambar && file_exists(public_path($data->gambar))) {
                unlink(public_path($data->gambar));
            }
            $input['gambar'] = null;
        }

        // UPLOAD GAMBAR BARU (ke public/image/fasilitas/)
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($data->gambar && file_exists(public_path($data->gambar))) {
                unlink(public_path($data->gambar));
            }
            
            $file = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
            
            // Buat folder jika belum ada
            if (!file_exists(public_path('image/fasilitas'))) {
                mkdir(public_path('image/fasilitas'), 0777, true);
            }
            
            $file->move(public_path('image/fasilitas'), $filename);
            $input['gambar'] = 'image/fasilitas/' . $filename;
        }
        // ========== END UBAH ==========

        $data->update($input);
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diupdate!');
    }

    public function destroy($id)
    {
        $data = Fasilitas::findOrFail($id);
        
        // ========== UBAH BAGIAN INI ==========
        // Hapus file gambar dari public/image/fasilitas/
        if ($data->gambar && file_exists(public_path($data->gambar))) {
            unlink(public_path($data->gambar));
        }
        // ========== END UBAH ==========
        
        $data->delete();
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus!');
    }
}