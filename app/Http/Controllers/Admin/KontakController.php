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
<<<<<<< HEAD
        return view('admin.kontak.index', compact('kontak'));
=======
        return view('admin.kontak.edit', compact('kontak'));
>>>>>>> 384823c974c6615786cd9a2e042cad1e558fd3e6
    }

    public function edit()
    {
        $kontak = Kontak::first();
        return view('admin.kontak.edit', compact('kontak'));
    }

    public function update(Request $request)
    {
<<<<<<< HEAD
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
=======
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
>>>>>>> 384823c974c6615786cd9a2e042cad1e558fd3e6
    }
}