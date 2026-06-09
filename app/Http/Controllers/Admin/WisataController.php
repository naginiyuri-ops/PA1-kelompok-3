<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WisataController extends Controller
{
    public function index()
    {
        $data = Wisata::latest()->paginate(10);
        return view('admin.wisata.index', compact('data'));
    }

    public function create()
    {
        return view('admin.wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'tipe_wisata' => 'required|in:alam,budaya,sejarah,buatan',
            'deskripsi' => 'required|string',
            'sejarah' => 'nullable|string',
            'keunikan' => 'nullable|string',
            'lokasi' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'status' => 'nullable|boolean',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $data = [
            'admin_id' => auth()->id(),
            'nama_wisata' => $request->nama_wisata,
            'tipe_wisata' => $request->tipe_wisata,
            'deskripsi' => $request->deskripsi,
            'sejarah' => $request->sejarah,
            'keunikan' => $request->keunikan,
            'lokasi' => $request->lokasi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_wisata_' . Str::slug($request->nama_wisata) . '.' . $file->getClientOriginalExtension();
            
            if (!file_exists(public_path('image/wisata'))) {
                mkdir(public_path('image/wisata'), 0777, true);
            }
            
            $file->move(public_path('image/wisata'), $filename);
            $data['gambar'] = 'image/wisata/' . $filename;
        }

        Wisata::create($data);

        return redirect()->route('admin.wisata.index')
            ->with('success', 'Wisata berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Wisata::findOrFail($id);
        return view('admin.wisata.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $wisata = Wisata::findOrFail($id);

        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'tipe_wisata' => 'required|in:alam,budaya,sejarah,buatan',
            'deskripsi' => 'required|string',
            'sejarah' => 'nullable|string',
            'keunikan' => 'nullable|string',
            'lokasi' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'status' => 'nullable|boolean',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $input = [
            'nama_wisata' => $request->nama_wisata,
            'tipe_wisata' => $request->tipe_wisata,
            'deskripsi' => $request->deskripsi,
            'sejarah' => $request->sejarah,
            'keunikan' => $request->keunikan,
            'lokasi' => $request->lokasi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => $request->has('status') ? 1 : 0,
        ];

        if ($request->has('hapus_gambar') && $request->hapus_gambar == 1) {
            if ($wisata->gambar && file_exists(public_path($wisata->gambar))) {
                unlink(public_path($wisata->gambar));
            }
            $input['gambar'] = null;
        }

        if ($request->hasFile('gambar')) {
            if ($wisata->gambar && file_exists(public_path($wisata->gambar))) {
                unlink(public_path($wisata->gambar));
            }
            
            $file = $request->file('gambar');
            $filename = time() . '_wisata_' . Str::slug($request->nama_wisata) . '.' . $file->getClientOriginalExtension();
            
            if (!file_exists(public_path('image/wisata'))) {
                mkdir(public_path('image/wisata'), 0777, true);
            }
            
            $file->move(public_path('image/wisata'), $filename);
            $input['gambar'] = 'image/wisata/' . $filename;
        }

        $wisata->update($input);

        return redirect()->route('admin.wisata.index')
            ->with('success', 'Wisata berhasil diupdate!');
    }

    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);
        
        if ($wisata->gambar && file_exists(public_path($wisata->gambar))) {
            unlink(public_path($wisata->gambar));
        }
        
        $wisata->delete();
        
        return redirect()->route('admin.wisata.index')
            ->with('success', 'Wisata berhasil dihapus!');
    }

    public function toggleStatus($id)
    {
        $wisata = Wisata::findOrFail($id);
        $wisata->status = !$wisata->status;
        $wisata->save();

        return response()->json(['success' => true, 'status' => $wisata->status]);
    }
}