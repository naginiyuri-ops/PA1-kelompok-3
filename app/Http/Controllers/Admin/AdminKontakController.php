<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class AdminKontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::first();
        return view('admin.kontak.index', compact('kontak'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:100',
            'link_maps' => 'nullable|string',
            'jam_operasional' => 'nullable|string',
            'map_iframe' => 'nullable|string',
            'map_lokasi' => 'nullable|string',
            'lokasi_bawah' => 'nullable|string',
            'social_fb' => 'nullable|string',
            'social_ig' => 'nullable|string',
            'social_twitter' => 'nullable|string',
            'social_youtube' => 'nullable|string',
            'social_tiktok' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['alamat'] = $data['alamat'] ?? '';
        $data['telepon'] = $data['telepon'] ?? '';
        $data['email'] = $data['email'] ?? '';

        $kontak = Kontak::first();
        
        if ($kontak) {
            $kontak->update($data);
        } else {
            Kontak::create($data);
        }

        return redirect()->route('admin.kontak.index')->with('success', 'Data kontak berhasil diperbarui!');
    }
}
