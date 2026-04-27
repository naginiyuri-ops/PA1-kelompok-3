<?php
// app/Http/Controllers/BeritaController.php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // Halaman berita publik
    public function index()
    {
        $berita = Berita::where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        
        return view('berita', compact('berita'));
    }
    
    // Detail berita
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();
        
        // Increment views
        $berita->incrementViews();
        
        // Berita terkait
        $related = Berita::where('status', true)
            ->where('id', '!=', $berita->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        
        return view('berita-detail', compact('berita', 'related'));
    }
}