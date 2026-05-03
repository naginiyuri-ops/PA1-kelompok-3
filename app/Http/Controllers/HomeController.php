<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\KoleksiFoto;

class HomeController extends Controller
{
    public function index()
    {
        // Hero Slider (5 foto)
        $slide1 = KoleksiFoto::where('nama_foto', 'slide1.jpg')->first();
        $slide2 = KoleksiFoto::where('nama_foto', 'slide2.jpg')->first();
        $slide3 = KoleksiFoto::where('nama_foto', 'slide3.jpg')->first();
        $slide4 = KoleksiFoto::where('nama_foto', 'slide4.jpg')->first();
        $slide5 = KoleksiFoto::where('nama_foto', 'slide5.jpg')->first();
        
        // About Image
        $aboutImage = KoleksiFoto::where('nama_foto', 'berita.jpg')->first();
        
        // Destinasi Images
        $destinasiMeat = KoleksiFoto::where('nama_foto', 'meat-detail.jpg')->first();
        $destinasiBatu = KoleksiFoto::where('nama_foto', 'batu-detail.jpg')->first();
        $destinasiLiang = KoleksiFoto::where('nama_foto', 'liang-detail.jpg')->first();
        
        // Data destinasi
        $destinasi = [
            (object)[
                'slug' => 'meat',
                'nama' => 'Meat',
                'foto' => $destinasiMeat,
                'lokasi' => 'Desa Tampahan, Kecamatan Tampahan, Kabupaten Toba',
                'deskripsi' => 'Desa Meat adalah desa wisata di tepi Danau Toba.',
                'tags' => ['Makam Raja Hunsa', 'Tari Tortor', 'Tenun Ulos'],
                'number' => '01'
            ],
            (object)[
                'slug' => 'batu-bahisan',
                'nama' => 'Batu Bahisan',
                'foto' => $destinasiBatu,
                'lokasi' => 'Desa Aek Bolon Jae, Balige',
                'deskripsi' => 'Situs batu bersejarah dengan nilai budaya Batak.',
                'tags' => ['Formasi Batuan Unik', 'Spot Fotografi'],
                'number' => '02'
            ],
            (object)[
                'slug' => 'liang-sipege',
                'nama' => 'Liang Sipege',
                'foto' => $destinasiLiang,
                'lokasi' => 'Hutagaol Peatalun, Balige',
                'deskripsi' => 'Gua alam dengan stalaktit dan stalakmit.',
                'tags' => ['Goa Alami', 'Caving'],
                'number' => '03'
            ],
        ];
        
        // Galeri untuk CRUD (6 foto terbaru)
        $galeri = Galeri::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        
        return view('pages.home', compact('slide1', 'slide2', 'slide3', 'slide4', 'slide5', 'aboutImage', 'destinasi', 'galeri'));
    }
}