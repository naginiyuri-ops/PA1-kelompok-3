<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        // Ambil semua galeri yang statusnya aktif
        $galeri = Galeri::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Kirim variabel $galeri ke view
        return view('pages.galeri', compact('galeri'));
    }
}