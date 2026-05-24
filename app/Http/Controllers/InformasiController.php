<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        // Ambil data informasi yang statusnya aktif (1)
        $informasi = Informasi::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        
        return view('pages.informasi', compact('informasi'));
    }
}