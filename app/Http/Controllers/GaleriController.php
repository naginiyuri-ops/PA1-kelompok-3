<?php
// app/Http/Controllers/GaleriController.php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // Halaman galeri publik
    public function index()
    {
        // Ambil data galeri yang status aktif
        $galeri = Galeri::where('status', true)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Kelompokkan berdasarkan kategori
        $galeriByKategori = [
            'meat' => $galeri->where('kategori', 'Meat'),
            'batu-bahisan' => $galeri->where('kategori', 'Batu Bahisan'),
            'liang-sipege' => $galeri->where('kategori', 'Liang Sipege'),
        ];
        
        return view('pages.galeri', compact('galeriByKategori'));
    }
}