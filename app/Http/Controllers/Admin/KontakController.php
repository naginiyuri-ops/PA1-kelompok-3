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
        return view('admin.kontak.edit', compact('kontak'));
    }

    public function edit()
    {
        $kontak = Kontak::first();
        return view('admin.kontak.edit', compact('kontak'));
    }

    public function update(Request $request)
    {
      $request->validate([
    'alamat'     => 'required',
    'telepon'    => 'required',
    'email'      => 'required|email',
    'link_maps'  => 'nullable',
    'embed_maps' => 'nullable',
    ]);

        $kontak = Kontak::first();

        if (!$kontak) {
            Kontak::create($request->all());
        } else {
            $kontak->update($request->all());
        }
        
        return back()->with(
            'success',
            'Data kontak berhasil diperbarui'
        );
    }
}