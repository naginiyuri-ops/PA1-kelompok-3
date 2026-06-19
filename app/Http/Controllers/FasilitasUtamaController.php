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
}
