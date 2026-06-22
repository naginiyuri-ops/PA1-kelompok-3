<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PenginapanController extends Controller
{
    public function index()
    {
        $data = Penginapan::latest()->paginate(10);
        return view('admin.penginapan.index', compact('data'));
    }

    public function create()
    {
        return view('admin.penginapan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required_without:free_harga|nullable|integer|min:0',
            'lokasi' => 'nullable|string|max:255',
            'kontak' => 'nullable|regex:/^[0-9]{12,15}$/',
            'urutan' => 'nullable|integer',
            'status' => 'nullable|boolean',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'gambar_tambahan' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ], [

     'harga.required_without' =>
        'Harga wajib diisi jika tidak memilih Free.',

       'harga.integer' =>
        'Harga hanya boleh berisi angka. Contoh: 5000',

      'harga.min' =>
        'Harga tidak boleh kurang dari 0.',

        'kontak.regex' =>
        'Kontak harus terdiri dari 12 sampai 15 angka tanpa spasi atau huruf.',
        ]
        
        );

        $data = [
            'nama' => $request->nama,
            'nama_en' => \App\Helpers\TranslateHelper::translateToEnglish($request->nama),
            'deskripsi' => $request->deskripsi,
            'deskripsi_en' => \App\Helpers\TranslateHelper::translateToEnglish($request->deskripsi),
            'harga' => $request->harga,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'urutan' => $request->urutan ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->nama) . '.' . $image->getClientOriginalExtension();
            
            // Simpan ke public/image/penginapan/
            $destinationPath = public_path('image/penginapan');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $image->move($destinationPath, $filename);
            $data['gambar'] = 'image/penginapan/' . $filename;
        }

        if ($request->hasFile('gambar_tambahan')) {
            $image2 = $request->file('gambar_tambahan');
            $filename2 = time() . '_2_' . Str::slug($request->nama) . '.' . $image2->getClientOriginalExtension();
            
            $destinationPath = public_path('image/penginapan');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $image2->move($destinationPath, $filename2);
            $data['gambar_tambahan'] = 'image/penginapan/' . $filename2;
        }

        Penginapan::create($data);

        return redirect()->route('admin.penginapan.index')
            ->with('success', 'Penginapan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Penginapan::findOrFail($id);
        return view('admin.penginapan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $penginapan = Penginapan::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'nullable|string|max:100',
            'lokasi' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:100',
            'urutan' => 'nullable|integer',
            'status' => 'nullable|boolean',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'gambar_tambahan' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $updateData = [
            'nama' => $request->nama,
            'nama_en' => \App\Helpers\TranslateHelper::translateToEnglish($request->nama),
            'deskripsi' => $request->deskripsi,
            'deskripsi_en' => \App\Helpers\TranslateHelper::translateToEnglish($request->deskripsi),
            'harga' => $request->harga,
            'lokasi' => $request->lokasi,
            'kontak' => $request->kontak,
            'urutan' => $request->urutan ?? 0,
            'status' => $request->has('status') ? 1 : 0,
        ];

        // Handle hapus gambar
        if ($request->has('hapus_gambar') && $request->hapus_gambar == 1) {
            $updateData['gambar'] = null;
        }

        // Handle hapus gambar tambahan
        if ($request->has('hapus_gambar_tambahan') && $request->hapus_gambar_tambahan == 1) {
            $updateData['gambar_tambahan'] = null;
        }

        // Handle upload gambar baru
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->nama) . '.' . $image->getClientOriginalExtension();
            
            // Simpan ke public/image/penginapan/
            $destinationPath = public_path('image/penginapan');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $image->move($destinationPath, $filename);
            $updateData['gambar'] = 'image/penginapan/' . $filename;
        }

        // Handle upload gambar tambahan baru
        if ($request->hasFile('gambar_tambahan')) {
            $image2 = $request->file('gambar_tambahan');
            $filename2 = time() . '_2_' . Str::slug($request->nama) . '.' . $image2->getClientOriginalExtension();
            
            $destinationPath = public_path('image/penginapan');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $image2->move($destinationPath, $filename2);
            $updateData['gambar_tambahan'] = 'image/penginapan/' . $filename2;
        }

        $penginapan->update($updateData);

        return redirect()->route('admin.penginapan.index')
            ->with('success', 'Penginapan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $penginapan = Penginapan::findOrFail($id);
        $penginapan->delete();

        return redirect()->route('admin.penginapan.index')
            ->with('success', 'Penginapan berhasil dihapus!');
    }

    public function toggleStatus($id)
    {
        $penginapan = Penginapan::findOrFail($id);
        $penginapan->status = !$penginapan->status;
        $penginapan->save();

        return response()->json(['success' => true, 'status' => $penginapan->status]);
    }
}