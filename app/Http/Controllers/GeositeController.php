<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Fasilitas;
use App\Models\Penginapan;

class GeositeController extends Controller
{
    public function meat()
    {
        $umkm = Umkm::where('status', 1)->orderBy('urutan', 'asc')->get();
        $fasilitas = Fasilitas::where('status', 1)->orderBy('urutan', 'asc')->get();
        $penginapan = Penginapan::where('status', 1)->orderBy('urutan', 'asc')->get();
        
        return view('geosite.meat', compact('umkm', 'fasilitas', 'penginapan'));
    }
    
    public function batuBahisan()
    {
        return view('geosite.batu-bahisan');
    }
    
    public function liangSipege()
    {
        return view('geosite.liang-sipege');
    }
}