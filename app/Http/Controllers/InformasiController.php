<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasiList = Informasi::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('pages.informasi', compact('informasiList'));
    }
    
    public function show($slug)
    {
        $informasi = Informasi::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();
        
        // Increment views
        $informasi->increment('views');
        
        return view('pages.informasi-detail', compact('informasi'));
    }
}