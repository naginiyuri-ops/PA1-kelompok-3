<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\KoleksiFoto;
use App\Models\Kontak;
use App\Models\Destination;
use App\Models\Umkm;
use App\Models\Penginapan;
use App\Models\Fasilitas;

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

        // Destinasi unggulan dari database
        $featuredDestinations = Destination::active()
            ->where('is_featured', true)
            ->latest()
            ->take(4)
            ->get();
        
        return view('pages.home', compact('slide1', 'slide2', 'slide3', 'slide4', 'slide5', 'aboutImage', 'destinasi', 'galeri', 'featuredDestinations'));
    }
    
    public function kontak()
    {
        $kontak = Kontak::first();
        
        if ($kontak === null) {
            $kontak = new \stdClass();
            $kontak->alamat = 'Desa Meat, Kabupaten Toba, Sumatera Utara';
            $kontak->telepon = '0622-123456';
            $kontak->email = 'info@geositeparumputan.com';
            $kontak->link_maps = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.544029529995!2d99.0011203!2d2.3213969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e1b14a5be37ed%3A0x22b416e0db744d4a!2sDesa%20Meat!5e0!3m2!1sid!2sid!4v1780156234277!5m2!1sid!2sid';
        }
        
        return view('pages.kontak', compact('kontak'));
    }

    public function meat()
    {
        // AMBIL DATA UMKM DARI DATABASE DAN MAPPING KE FORMAT YANG DIHARAPKAN VIEW
        $umkm = Umkm::where('status', 'aktif')
                    ->orderBy('urutan', 'asc')
                    ->get()
                    ->map(function($item) {
                        // Tentukan URL gambar yang benar
                        $gambarUrl = null;
                        
                        if (!empty($item->foto_utama)) {
                            // Jika sudah path lengkap dari public (image/umkm/...)
                            if (str_starts_with($item->foto_utama, 'image/')) {
                                $gambarUrl = asset($item->foto_utama);
                            }
                            // Jika dari storage
                            elseif (str_starts_with($item->foto_utama, 'storage/')) {
                                $gambarUrl = asset($item->foto_utama);
                            }
                            // Jika hanya nama file
                            elseif (file_exists(public_path('image/umkm/' . $item->foto_utama))) {
                                $gambarUrl = asset('image/umkm/' . $item->foto_utama);
                            }
                            // Jika dari path lain
                            else {
                                $gambarUrl = asset($item->foto_utama);
                            }
                        }
                        
                        return (object)[
                            'id' => $item->id,
                            'nama' => $item->nama_usaha,        // mapping: nama_usaha → nama
                            'deskripsi' => $item->deskripsi,
                            'lokasi' => $item->alamat ?? 'Desa Meat',  // mapping: alamat → lokasi
                            'kontak' => $item->no_telepon ?? '-',      // mapping: no_telepon → kontak
                            'gambar' => $gambarUrl,                     // mapping: foto_utama → gambar
                            'harga' => $item->harga ?? 'Hubungi langsung',
                            'urutan' => $item->urutan,
                        ];
                    });
        
        // Ambil data Penginapan
        $penginapan = Penginapan::where('status', 1)
                                ->orderBy('urutan', 'asc')
                                ->get()
                                ->map(function($item) {
                                    $gambarUrl = null;
                                    if (!empty($item->gambar)) {
                                        if (str_starts_with($item->gambar, 'image/')) {
                                            $gambarUrl = asset($item->gambar);
                                        } elseif (file_exists(public_path('image/penginapan/' . $item->gambar))) {
                                            $gambarUrl = asset('image/penginapan/' . $item->gambar);
                                        } else {
                                            $gambarUrl = asset($item->gambar);
                                        }
                                    }
                                    return (object)[
                                        'id' => $item->id,
                                        'nama' => $item->nama,
                                        'deskripsi' => $item->deskripsi,
                                        'lokasi' => $item->lokasi,
                                        'kontak' => $item->kontak,
                                        'gambar' => $gambarUrl,
                                        'harga' => $item->harga,
                                    ];
                                });
        
        // Ambil data Fasilitas
        $fasilitas = Fasilitas::where('status', 1)
                              ->orderBy('urutan', 'asc')
                              ->get()
                              ->map(function($item) {
                                  $gambarUrl = null;
                                  if (!empty($item->gambar)) {
                                      if (str_starts_with($item->gambar, 'image/')) {
                                          $gambarUrl = asset($item->gambar);
                                      } elseif (file_exists(public_path('image/fasilitas/' . $item->gambar))) {
                                          $gambarUrl = asset('image/fasilitas/' . $item->gambar);
                                      } else {
                                          $gambarUrl = asset($item->gambar);
                                      }
                                  }
                                  return (object)[
                                      'id' => $item->id,
                                      'nama' => $item->nama,
                                      'deskripsi' => $item->deskripsi,
                                      'lokasi' => $item->lokasi,
                                      'kontak' => $item->kontak,
                                      'gambar' => $gambarUrl,
                                      'harga' => $item->harga ?? 'Gratis',
                                  ];
                              });
        
        return view('pages.meat', compact('umkm', 'penginapan', 'fasilitas'));
    }
}