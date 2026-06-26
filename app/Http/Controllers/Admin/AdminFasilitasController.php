<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminFasilitasController extends Controller
{
    public function index(Request $request)
    {
        $group = $request->query('group'); // 'akomodasi' | 'kuliner' | null

        $query = Fasilitas::query();

        if ($group === 'kuliner') {
            $query->where('jenis', 'kuliner');
        } elseif ($group === 'akomodasi') {
            $query->where(function($q) {
                $q->where('jenis', '!=', 'kuliner')->orWhereNull('jenis');
            });
        }

        $data = $query->latest()->paginate(10)->withQueryString();

        // counts for badges
        $countKuliner = Fasilitas::where('jenis', 'kuliner')->count();
        $countAkomodasi = Fasilitas::where('jenis', '!=', 'kuliner')->orWhereNull('jenis')->count();

        return view('admin.fasilitas.index', compact('data', 'countKuliner', 'countAkomodasi', 'group'));
    }

   public function create()
    {
    $jenisList = [
        'akomodasi',
        'kuliner',
        'pusat informasi',
        'toilet',
        'parkir',
        'akses jalan',
        'pemandu lokal'
    ];

    return view('admin.fasilitas.create', compact('jenisList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'nullable|string|max:100',
            'lokasi' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:100',
            'urutan' => 'nullable|integer',
            'status' => 'nullable|boolean',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        // Determine display group: if admin explicitly selected 'tampil_as', prefer it.
        $displayPref = $request->input('tampil_as');
        if ($displayPref) {
            $jenisNormalized = strtolower(trim($displayPref)) === 'kuliner' ? 'kuliner' : 'akomodasi';
        } else {
            $jenisValue = strtolower(trim($request->jenis));
            $jenisNormalized = $jenisValue === 'kuliner' ? 'kuliner' : 'akomodasi';
        }

        $data = [
            'nama' => $request->nama,
            'nama_en' => \App\Helpers\TranslateHelper::translateToEnglish($request->nama),
            'jenis' => $jenisNormalized,
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
            
            // Simpan ke public/image/fasilitas/
            $destinationPath = public_path('image/fasilitas');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $image->move($destinationPath, $filename);
            $data['gambar'] = 'image/fasilitas/' . $filename;
        }

        Fasilitas::create($data);

        $groupLabel = $jenisNormalized === 'kuliner' ? 'Kuliner / Restoran' : 'Akomodasi';
        return redirect()->route('admin.fasilitas.index')
            ->with('success', "Fasilitas berhasil ditambahkan! Ditampilkan pada: {$groupLabel}");
    }

    public function edit($id)
    {
    $data = Fasilitas::findOrFail($id);

    $jenisList = [
        'akomodasi',
        'kuliner',
        'pusat informasi',
        'toilet',
        'parkir',
        'akses jalan',
        'pemandu lokal'
    ];

    return view('admin.fasilitas.edit', compact('data', 'jenisList'));
    }

    public function update(Request $request, $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'nullable|string|max:100',
            'lokasi' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:100',
            'urutan' => 'nullable|integer',
            'status' => 'nullable|boolean',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $displayPref = $request->input('tampil_as');
        if ($displayPref) {
            $jenisNormalized = strtolower(trim($displayPref)) === 'kuliner' ? 'kuliner' : 'akomodasi';
        } else {
            $jenisValue = strtolower(trim($request->jenis));
            $jenisNormalized = $jenisValue === 'kuliner' ? 'kuliner' : 'akomodasi';
        }

        $updateData = [
            'nama' => $request->nama,
            'nama_en' => \App\Helpers\TranslateHelper::translateToEnglish($request->nama),
            'jenis' => $jenisNormalized,
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

        // Handle upload gambar baru
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->nama) . '.' . $image->getClientOriginalExtension();
            
            // Simpan ke public/image/fasilitas/
            $destinationPath = public_path('image/fasilitas');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $image->move($destinationPath, $filename);
            $updateData['gambar'] = 'image/fasilitas/' . $filename;
        }

        $fasilitas->update($updateData);

        $groupLabel = $jenisNormalized === 'kuliner' ? 'Kuliner / Restoran' : 'Akomodasi';
        return redirect()->route('admin.fasilitas.index')
            ->with('success', "Fasilitas berhasil diupdate! Ditampilkan pada: {$groupLabel}");
    }

    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->delete();

        return redirect()->route('admin.fasilitas.index')
            ->with('success', 'Fasilitas berhasil dihapus!');
    }

    public function toggleStatus($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->status = !$fasilitas->status;
        $fasilitas->save();

        return response()->json(['success' => true, 'status' => $fasilitas->status]);
    }
}
