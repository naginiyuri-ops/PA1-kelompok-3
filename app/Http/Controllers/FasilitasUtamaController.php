<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FasilitasUtamaController extends Controller
{
    /* 
     * Fungsi ini bertugas memanggil tampilan indeks fasilitas.
     * Tidak memerlukan data dinamis dari database karena ini hanya 
     * halaman menu (portal) menuju kategori UMKM atau Penginapan.
     */
    public function index()
    {
        return view('pages.fasilitas-index');
    }

    public function umkm()
    {
        $umkm = \App\Models\Umkm::where('status', 'aktif')
                    ->orderBy('urutan', 'asc')
                    ->paginate(6);
        return view('pages.umkm', compact('umkm'));
    }

    public function umkmDetail($id)
    {
        $item = \App\Models\Umkm::findOrFail($id);
        $related = \App\Models\Umkm::where('status', 'aktif')
                        ->where('id', '!=', $id)
                        ->inRandomOrder()
                        ->take(3)
                        ->get();
        return view('pages.umkm-detail', compact('item', 'related'));
    }

    public function penginapan()
    {
        $penginapan = \App\Models\Penginapan::where('status', 'aktif')
                        ->orderBy('urutan', 'asc')
                        ->paginate(6);
        return view('pages.penginapan', compact('penginapan'));
    }

    public function penginapanDetail($id)
    {
        $item = \App\Models\Penginapan::findOrFail($id);
        $related = \App\Models\Penginapan::where('status', 'aktif')
                        ->where('id', '!=', $id)
                        ->inRandomOrder()
                        ->take(3)
                        ->get();
        return view('pages.penginapan-detail', compact('item', 'related'));
    }
}
