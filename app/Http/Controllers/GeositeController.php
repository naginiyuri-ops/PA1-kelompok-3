<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Penginapan;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class GeositeController extends Controller
{
    public function meat()
    {
        // Ambil data maksimal 20 per kategori
        $umkm = Umkm::where('status', 1)
            ->orderBy('urutan')
            ->limit(20)
            ->get();
        
        $penginapan = Penginapan::where('status', 1)
            ->orderBy('urutan')
            ->limit(20)
            ->get();
        
        $fasilitas = Fasilitas::where('status', 1)
            ->orderBy('urutan')
            ->limit(20)
            ->get();
        
        return view('geosite.meat', compact('umkm', 'penginapan', 'fasilitas'));
    }
    
    public function batuBasiha()
    {
        return view('geosite.batu-basiha');
    }
    
    public function liangSipege()
    {
        return view('geosite.liang-sipege');
    }
}