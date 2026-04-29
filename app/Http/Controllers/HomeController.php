<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil slide hero (cari gambar yang mengandung kata 'slide')
        $heroSlides = Galeri::where('gambar', 'like', '%slide%')
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();
        
        // Jika slides kosong, gunakan data dari kategori 'meat'
        if ($heroSlides->isEmpty()) {
            $heroSlides = Galeri::where('kategori', 'meat')
                ->where('status', 1)
                ->orderBy('id', 'asc')
                ->take(5)
                ->get();
        }
        
        // Jika masih kosong, gunakan data dari kategori 'hero_slider'
        if ($heroSlides->isEmpty()) {
            $heroSlides = Galeri::where('kategori', 'hero_slider')
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
        
        // Data destinasi lengkap
        $destinasi = [
            (object)[
                'slug' => 'meat',
                'nama' => 'Meat',
                'gambar' => $destinasiMeat ? $destinasiMeat->gambar : 'image/meat/meat-detail.jpg',
                'lokasi' => 'Desa Tampahan, Kecamatan Tampahan, Kabupaten Toba, Provinsi Sumatera Utara',
                'deskripsi' => 'Desa Meat adalah salah satu desa wisata yang terletak di Kecamatan Balige, Kabupaten Toba, di tepi Danau Toba. Desa ini terkenal dengan keindahan alamnya yang memadukan perbukitan hijau, persawahan, dan panorama danau yang menenangkan.',
                'tags' => ['Makam Raja Hunsa', 'Tari Tortor', 'Tenun Ulos', 'Rumah Adat Batak'],
                'number' => '01'
            ],
            (object)[
                'slug' => 'batu-bahisan',
                'nama' => 'Batu Bahisan',
                'gambar' => $destinasiBatu ? $destinasiBatu->gambar : 'image/meat/batu-detail.jpg',
                'lokasi' => 'Desa Aek Bolon Jae, Balige, Toba, Kecamatan Balige, Kabupaten Toba',
                'deskripsi' => 'Batu Basiha merupakan salah satu situs batu bersejarah di kawasan Balige yang memiliki nilai budaya dan legenda dalam masyarakat Batak Toba. Batu ini dikenal sebagai simbol kekuatan, kepercayaan, dan kearifan lokal.',
                'tags' => ['Formasi Batuan Unik', 'Spot Fotografi', 'Sunrise View', 'Sunset View'],
                'number' => '02'
            ],
            (object)[
                'slug' => 'liang-sipege',
                'nama' => 'Liang Sipege',
                'gambar' => $destinasiLiang ? $destinasiLiang->gambar : 'image/meat/liang-detail.jpg',
                'lokasi' => 'Hutagaol Peatalun, Kec. Balige, Toba, Sumatera Utara',
                'deskripsi' => 'Gua Liang Sipege adalah destinasi wisata alam yang terletak di Desa Simarmar Pea Talun Hutagaol, Kecamatan Balige, Kabupaten Toba. Gua ini dikenal sebagai habitat kelelawar yang menghasilkan guano, dimanfaatkan masyarakat sebagai pupuk organik.',
                'tags' => ['Goa Alami', 'Caving', 'Stalaktit dan Stalakmit', 'Edukasi Geologi'],
                'number' => '03'
            ],
        ];
        
        // Ambil semua galeri untuk ditampilkan di home (6 foto terbaru)
        $galeri = Galeri::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        
        return view('pages.home', compact('heroSlides', 'aboutImage', 'destinasi', 'galeri'));
    }
}