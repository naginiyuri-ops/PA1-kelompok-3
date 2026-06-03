<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::first();
        return view('admin.kontak.index', compact('kontak'));
    }

    public function edit()
    {
        $kontak = Kontak::first();
        return view('admin.kontak.edit', compact('kontak'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'link_maps' => 'nullable|string|max:500',
        ]);

        $kontak = Kontak::first();
        
        if ($kontak) {
            $kontak->update($request->all());
        } else {
            Kontak::create($request->all());
        }

        return redirect()->route('admin.kontak.index')->with('success', 'Data kontak berhasil diperbarui!');
    }
}