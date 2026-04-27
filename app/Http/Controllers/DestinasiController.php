<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    // Halaman utama destinasi (semua kategori)
    public function index()
    {
        return view('destinasi.index');
    }
    
    // Destinasi Alam
    public function alam()
    {
        $kategori = 'Alam';
        $deskripsi = 'Destinasi wisata alam yang menampilkan keindahan geologi, pegunungan, air terjun, dan keunikan alam Danau Toba.';
        $destinasi = [
            (object)[
                'id' => 1,
                'nama' => 'Liang Sipege',
                'lokasi' => 'Pulau Sibandang, Danau Toba',
                'deskripsi' => 'Goa alami dengan stalaktit dan stalakmit yang indah. Tempat eksplorasi dan edukasi geologi.',
                'gambar' => '/image/liang-sipege/hero.jpg',
                'tags' => ['Goa Alami', 'Caving', 'Stalaktit', 'Geologi'],
                'url' => '/geosite/liang-sipege'
            ],
            (object)[
                'id' => 2,
                'nama' => 'Batu Bahisan',
                'lokasi' => 'Pulau Sibandang, Danau Toba',
                'deskripsi' => 'Formasi batuan unik hasil erosi ribuan tahun. Spot favorit untuk sunrise, sunset, dan fotografi landscape.',
                'gambar' => '/image/batu-bahisan/hero.jpg',
                'tags' => ['Formasi Batuan', 'Sunrise', 'Sunset', 'Fotografi'],
                'url' => '/geosite/batu-bahisan'
            ],
            (object)[
                'id' => 3,
                'nama' => 'Air Terjun Efrata',
                'lokasi' => 'Balige, Danau Toba',
                'deskripsi' => 'Air terjun cantik dengan air jernih dan suasana asri, cocok untuk refreshing keluarga.',
                'gambar' => '/image/destinasi/air-terjun.jpg',
                'tags' => ['Air Terjun', 'Refreshing', 'Keluarga', 'Alam'],
                'url' => '/destinasi/air-terjun-efrata'
            ]
        ];
        
        return view('destinasi.kategori', compact('kategori', 'deskripsi', 'destinasi'));
    }
    
    // Destinasi Buatan
    public function buatan()
    {
        $kategori = 'Buatan';
        $deskripsi = 'Destinasi wisata buatan manusia yang menjadi ikon dan daya tarik wisata di kawasan Danau Toba.';
        $destinasi = [
            (object)[
                'id' => 1,
                'nama' => 'Patung Yesus Memberkati',
                'lokasi' => 'Balige, Danau Toba',
                'deskripsi' => 'Patung Yesus setinggi 30 meter dengan latar belakang Danau Toba yang indah.',
                'gambar' => '/image/destinasi/patung-yesus.jpg',
                'tags' => ['Patung', 'Ikon', 'Wisata Rohani', 'Spot Foto'],
                'url' => '/destinasi/patung-yesus'
            ],
            (object)[
                'id' => 2,
                'nama' => 'Taman Lingga',
                'lokasi' => 'Balige, Danau Toba',
                'deskripsi' => 'Taman kota yang indah dengan pemandangan langsung ke Danau Toba.',
                'gambar' => '/image/destinasi/taman-lingga.jpg',
                'tags' => ['Taman', 'Keluarga', 'Spot Foto', 'Santai'],
                'url' => '/destinasi/taman-lingga'
            ],
            (object)[
                'id' => 3,
                'nama' => 'Jembatan Toba',
                'lokasi' => 'Balige, Danau Toba',
                'deskripsi' => 'Jembatan ikonik dengan pemandangan spektakuler Danau Toba.',
                'gambar' => '/image/destinasi/jembatan-toba.jpg',
                'tags' => ['Jembatan', 'Ikon', 'Fotografi', 'Sunset'],
                'url' => '/destinasi/jembatan-toba'
            ]
        ];
        
        return view('destinasi.kategori', compact('kategori', 'deskripsi', 'destinasi'));
    }
    
    // Destinasi Budaya
    public function budaya()
    {
        $kategori = 'Budaya';
        $deskripsi = 'Destinasi wisata budaya yang menampilkan kearifan lokal, adat istiadat, dan warisan leluhur Batak Toba.';
        $destinasi = [
            (object)[
                'id' => 1,
                'nama' => 'Meat Village',
                'lokasi' => 'Pulau Sibandang, Danau Toba',
                'deskripsi' => 'Desa adat Batak dengan makam Raja Hunsa, rumah adat, dan tenun ulos khas.',
                'gambar' => '/image/meat/hero.jpg',
                'tags' => ['Desa Adat', 'Makam Raja', 'Tenun Ulos', 'Tari Tortor'],
                'url' => '/geosite/meat'
            ],
            (object)[
                'id' => 2,
                'nama' => 'Museum Batak',
                'lokasi' => 'Balige, Danau Toba',
                'deskripsi' => 'Museum yang menyimpan sejarah dan budaya masyarakat Batak Toba.',
                'gambar' => '/image/destinasi/museum-batak.jpg',
                'tags' => ['Museum', 'Sejarah', 'Edukasi', 'Budaya Batak'],
                'url' => '/destinasi/museum-batak'
            ],
            (object)[
                'id' => 3,
                'nama' => 'Desa Ulos Hutaraja',
                'lokasi' => 'Balige, Danau Toba',
                'deskripsi' => 'Pusat kerajinan tenun ulos Batak yang terkenal berkualitas tinggi.',
                'gambar' => '/image/destinasi/desa-ulos.jpg',
                'tags' => ['Ulos', 'Kerajinan', 'UMKM', 'Oleh-oleh'],
                'url' => '/destinasi/desa-ulos'
            ]
        ];
        
        return view('destinasi.kategori', compact('kategori', 'deskripsi', 'destinasi'));
    }
}