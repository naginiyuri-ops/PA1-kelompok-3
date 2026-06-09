<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    // Halaman utama informasi - LANGSUNG KE pages.informasi
    public function index()
    {
        $informasi = Informasi::active()
            ->orderBy('urutan', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(9);  // Gunakan paginate untuk pagination
        
        // Arahkan ke view yang benar di folder pages
        return view('pages.informasi', compact('informasi'));
    }

    // API untuk update views (untuk AJAX di modal)
    public function updateView($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->increment('views');
        
        return response()->json([
            'success' => true,
            'views' => $informasi->views
        ]);
    }

    // Method untuk detail (opsional, karena Anda pakai modal)
    public function show($slug)
    {
        $informasi = Informasi::where('slug', $slug)->active()->firstOrFail();
        
        return view('pages.informasi-detail', compact('informasi'));
    }
}