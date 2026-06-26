<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicFasilitasUtamaController extends Controller
{
    /* 
     * Fungsi ini bertugas memanggil tampilan indeks fasilitas.
     * Tidak memerlukan data dinamis dari database karena ini hanya 
     * halaman menu (portal) menuju kategori UMKM atau Penginapan.
     */
    public function index()
    {
        $fasilitas = \App\Models\Fasilitas::where('status', 1)
                        ->orderBy('urutan', 'asc')
                        ->get();
        
        $activeValues = [1, '1', 'aktif', 'on', 'true', true];
        $featuredAkomodasi = \App\Models\Penginapan::whereIn('status', $activeValues)
                                ->orderBy('urutan', 'asc')
                                ->first();
        $featuredKuliner = \App\Models\Kuliner::where('status', 1)
                                ->orderBy('urutan', 'asc')
                                ->first();

        return view('pages.fasilitas-index', compact('fasilitas', 'featuredAkomodasi', 'featuredKuliner'));
    }

    public function umkm()
    {
        $umkm = \App\Models\Umkm::where('status', 'aktif')
                    ->orderBy('urutan', 'asc')
                    ->paginate(6);
        return view('pages.umkm', compact('umkm'));
    }

    public function umkmIndex()
    {
        $umkm = \App\Models\Umkm::where('status', 'aktif')
                    ->orderBy('urutan', 'asc')
                    ->paginate(10);
        return view('pages.umkm-index', compact('umkm'));
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
                $activeValues = [1, '1', 'aktif', 'on', 'true', true];
                $penginapan = \App\Models\Penginapan::whereIn('status', $activeValues)
                                                ->orderBy('urutan', 'asc')
                                                ->paginate(9);
        $fasilitasAkomodasi = \App\Models\Fasilitas::where('status', 1)
                                ->where('jenis', 'akomodasi')
                                ->orderBy('urutan', 'asc')
                                ->get();
        return view('pages.penginapan', compact('penginapan', 'fasilitasAkomodasi'));
    }

    public function penginapanDetail($id)
    {
        $activeValues = [1, '1', 'aktif', 'on', 'true', true];
        $item = \App\Models\Penginapan::whereIn('status', $activeValues)->findOrFail($id);
        $related = \App\Models\Penginapan::where('status', 1)
                        ->where('id', '!=', $id)
                        ->inRandomOrder()
                        ->take(3)
                        ->get();
        return view('pages.penginapan-detail', compact('item', 'related'));
    }

    public function kuliner()
    {
        $kuliner = \App\Models\Kuliner::where('status', 1)
                        ->orderBy('urutan', 'asc')
                        ->paginate(9);
        $fasilitasKuliner = \App\Models\Fasilitas::where('status', 1)
                                ->where('jenis', 'kuliner')
                                ->orderBy('urutan', 'asc')
                                ->get();
        return view('pages.kuliner', compact('kuliner', 'fasilitasKuliner'));
    }

    public function kulinerDetail($id)
    {
        $item = \App\Models\Kuliner::where('status', 1)->findOrFail($id);
        $related = \App\Models\Kuliner::where('status', 1)
                        ->where('id', '!=', $id)
                        ->inRandomOrder()
                        ->take(3)
                        ->get();
        return view('pages.kuliner-detail', compact('item', 'related'));
    }
}

