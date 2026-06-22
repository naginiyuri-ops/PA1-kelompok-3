<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Berita;
use App\Models\Informasi;
use App\Models\Umkm;
use App\Models\Fasilitas;
use App\Models\Penginapan;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalGaleri' => Galeri::count(),
            'totalBerita' => Berita::count(),
            'totalInformasi' => Informasi::count(),
            'totalUmkm' => Umkm::count(),
            'totalFasilitas' => Fasilitas::count(),
            'totalPenginapan' => Penginapan::count(),
        ]);
    }
}
