<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GaleriController as PublicGaleriController;
use App\Http\Controllers\GeositeController;

// ==================== FRONTEND ROUTES ====================

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Destinasi Routes
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi');
Route::get('/destinasi/alam', [DestinasiController::class, 'alam'])->name('destinasi.alam');
Route::get('/destinasi/buatan', [DestinasiController::class, 'buatan'])->name('destinasi.buatan');
Route::get('/destinasi/budaya', [DestinasiController::class, 'budaya'])->name('destinasi.budaya');

// Informasi
Route::get('/informasi', function () {
    $informasi = App\Models\Informasi::where('status', true)->latest()->paginate(10);
    return view('pages.informasi', compact('informasi'));
})->name('informasi');

// Galeri Publik (AMBIL DARI DATABASE)
Route::get('/galeri', [PublicGaleriController::class, 'index'])->name('galeri');

// Berita Publik
Route::get('/berita', function () {
    $berita = App\Models\Berita::where('status', true)->latest()->paginate(9);
    return view('pages.berita', compact('berita'));
})->name('berita');

// Detail Berita
Route::get('/berita/{slug}', function ($slug) {
    $berita = App\Models\Berita::where('slug', $slug)->where('status', true)->firstOrFail();
    $berita->increment('views');
    return view('pages.berita-detail', compact('berita'));
})->name('berita.detail');

// Detail Galeri
Route::get('/galeri/{slug}', function ($slug) {
    $galeri = App\Models\Galeri::where('slug', $slug)->firstOrFail();
    $galeri->increment('views');
    return view('pages.galeri-detail', compact('galeri'));
})->name('galeri.detail');

// UMKM
Route::get('/umkm', [HomeController::class, 'umkm'])->name('umkm');

// Budaya
Route::get('/budaya', [HomeController::class, 'budaya'])->name('budaya');

// Kontak
Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('kontak');

// ==================== GEOSITE ROUTES (TIGA GEOSITE) ====================
Route::get('/geosite/meat', [GeositeController::class, 'meat'])->name('geosite.meat');
Route::get('/geosite/batu-bahisan', [GeositeController::class, 'batuBahisan'])->name('geosite.batu-bahisan');
Route::get('/geosite/liang-sipege', [GeositeController::class, 'liangSipege'])->name('geosite.liang-sipege');

// ==================== AUTH ROUTES ====================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==================== ADMIN ROUTES ====================
Route::prefix('admin')->middleware('auth')->group(function () {
    // Dashboard Admin
    Route::get('/', function () {
        $totalGaleri = App\Models\Galeri::count();
        $totalBerita = App\Models\Berita::count();
        $totalInformasi = App\Models\Informasi::count();
        $totalViews = App\Models\Berita::sum('views') + App\Models\Galeri::sum('views') + App\Models\Informasi::sum('views');
        return view('admin.dashboard', compact('totalGaleri', 'totalBerita', 'totalInformasi', 'totalViews'));
    })->name('admin.dashboard');
    
    // Resource Controllers
    Route::resource('galeri', GaleriController::class)->names('admin.galeri');
    Route::resource('berita', BeritaController::class)->names('admin.berita');
    Route::resource('informasi', InformasiController::class)->names('admin.informasi');
    
    // Toggle Status Galeri
    Route::post('galeri/toggle-status/{id}', [GaleriController::class, 'toggleStatus'])->name('admin.galeri.toggle-status');
});