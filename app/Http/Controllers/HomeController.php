<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Berita;
use App\Models\Informasi;
use App\Models\Umkm;
use App\Models\Fasilitas;
use App\Models\Penginapan;
use App\Models\Kontak;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data untuk ditampilkan di home
        $galeri = Galeri::where('status', true)->latest()->limit(6)->get();
        $berita = Berita::where('status', true)->latest()->limit(3)->get();
        $umkm = Umkm::where('status', 'aktif')->latest()->limit(4)->get();
        $penginapan = Penginapan::where('status', true)->latest()->limit(4)->get();
        $fasilitas = Fasilitas::where('status', true)->latest()->limit(4)->get();
        
        // Data kontak
        $kontak = Kontak::first();

        // Data untuk statistik (opsional)
        $totalGaleri = Galeri::count();
        $totalBerita = Berita::count();
        $totalUmkm = Umkm::count();
        $totalPenginapan = Penginapan::count();

        return view('pages.home', compact(
            'galeri', 
            'berita', 
            'umkm', 
            'penginapan', 
            'fasilitas',
            'kontak',
            'totalGaleri',
            'totalBerita',
            'totalUmkm',
            'totalPenginapan'
        ));
    }

    public function kontak()
    {
        $kontak = Kontak::first();
        return view('pages.kontak', compact('kontak'));
    }

    public function budaya()
    {
        return view('pages.budaya');
    }
}