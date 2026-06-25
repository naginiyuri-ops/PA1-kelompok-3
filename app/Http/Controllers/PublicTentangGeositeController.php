<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SejarahWisata;
use App\Models\PengelolaGeosite;

class PublicTentangGeositeController extends Controller
{
    public function index()
    {
        // Ambil data geosite untuk ditampilkan
        // Map legacy geosite entries into a single 'taman-eden' collection
        $geositeList = [
            'taman-eden' => SejarahWisata::where('geosite', 'taman-eden')->where('status', true)->limit(6)->get(),
        ];

        // Ambil data pengelola
        $pengelolas = PengelolaGeosite::orderBy('urutan', 'asc')->get();

        return view('pages.tentang-geosite', compact('geositeList', 'pengelolas'));
    }
}
