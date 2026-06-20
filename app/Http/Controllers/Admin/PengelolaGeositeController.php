<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengelolaGeosite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengelolaGeositeController extends Controller
{
    public function index()
    {
        $pengelolas = PengelolaGeosite::orderBy('urutan', 'asc')->get();
        return view('admin.pengelola_geosite.index', compact('pengelolas'));
    }

    public function create()
    {
        return view('admin.pengelola_geosite.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'urutan' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('image');
        $data['urutan'] = $request->urutan ?? 0;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image/pengelola', 'public');
            $data['image'] = $imagePath;
        }

        PengelolaGeosite::create($data);

        return redirect()->route('admin.pengelola-geosite.index')
            ->with('success', 'Data pengelola berhasil ditambahkan.');
    }

    public function edit(PengelolaGeosite $pengelolaGeosite)
    {
        return view('admin.pengelola_geosite.edit', compact('pengelolaGeosite'));
    }

    public function update(Request $request, PengelolaGeosite $pengelolaGeosite)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'urutan' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('image');
        $data['urutan'] = $request->urutan ?? 0;

        if ($request->hasFile('image')) {
            if ($pengelolaGeosite->image) {
                Storage::disk('public')->delete($pengelolaGeosite->image);
            }
            $imagePath = $request->file('image')->store('image/pengelola', 'public');
            $data['image'] = $imagePath;
        }

        $pengelolaGeosite->update($data);

        return redirect()->route('admin.pengelola-geosite.index')
            ->with('success', 'Data pengelola berhasil diperbarui.');
    }

    public function destroy(PengelolaGeosite $pengelolaGeosite)
    {
        if ($pengelolaGeosite->image) {
            Storage::disk('public')->delete($pengelolaGeosite->image);
        }
        
        $pengelolaGeosite->delete();

        return redirect()->route('admin.pengelola-geosite.index')
            ->with('success', 'Data pengelola berhasil dihapus.');
    }
}
