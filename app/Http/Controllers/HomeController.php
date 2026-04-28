<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class HomeController extends Controller
{
    public function index()
    {
        // DEBUG: Ambil SEMUA data dari tabel galeris dulu
        $allGaleri = Galeri::where('status', 1)->get();
        
        // Ambil slide hero (cari gambar yang mengandung kata 'slide')
        $slides = Galeri::where('gambar', 'like', '%slide%')
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();
        
        // Jika slides kosong, gunakan data dari kategori 'meat'
        if ($slides->isEmpty()) {
            $slides = Galeri::where('kategori', 'meat')
                ->where('status', 1)
                ->orderBy('id', 'asc')
                ->take(5)
                ->get();
        }
        
        // Ambil about image (kategori 'about')
        $aboutImage = Galeri::where('kategori', 'about')
            ->where('status', 1)
            ->first();
        
        // Ambil gambar destinasi dari database
        $destinasiMeat = Galeri::where('kategori', 'meat')
            ->where('gambar', 'like', '%meat-detail%')
            ->first();
        
        $destinasiBatu = Galeri::where('kategori', 'batu-bahisan')
            ->where('gambar', 'like', '%batu-detail%')
            ->first();
        
        $destinasiLiang = Galeri::where('kategori', 'liang-sipege')
            ->where('gambar', 'like', '%liang-detail%')
            ->first();
        
        // Data destinasi
        $destinasi = [
            (object)[
                'slug' => 'meat',
                'nama' => 'Meat',
                'gambar' => $destinasiMeat ? $destinasiMeat->gambar : 'image/meat/meat-detail.jpg',
            ],
            (object)[
                'slug' => 'batu-bahisan',
                'nama' => 'Batu Bahisan',
                'gambar' => $destinasiBatu ? $destinasiBatu->gambar : 'image/meat/batu-detail.jpg',
            ],
            (object)[
                'slug' => 'liang-sipege',
                'nama' => 'Liang Sipege',
                'gambar' => $destinasiLiang ? $destinasiLiang->gambar : 'image/meat/liang-detail.jpg',
            ],
        ];
        
        // DEBUG: Cek di terminal
        \Illuminate\Support\Facades\Log::info('Jumlah slide: ' . $slides->count());
        \Illuminate\Support\Facades\Log::info('Jumlah all galeri: ' . $allGaleri->count());
        
        return view('pages.home', compact('slides', 'aboutImage', 'destinasi'));
    }
}