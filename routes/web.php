<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\PenginapanController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\GaleriController as PublicGaleriController;
use App\Http\Controllers\GeositeController;
use App\Http\Controllers\InformasiController as PublicInformasiController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\DB;

Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi');

// ==================== LANGUAGE ROUTE ====================
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

// ==================== API ROUTES ====================
Route::post('/api/informasi/{id}/view', function ($id) {
    $informasi = App\Models\Informasi::find($id);
    if ($informasi) {
        $informasi->increment('views');
        return response()->json(['success' => true, 'views' => $informasi->views]);
    }
    return response()->json(['success' => false], 404);
});

Route::post('/api/berita/{id}/view', function ($id) {
    $berita = App\Models\Berita::find($id);
    if ($berita) {
        $berita->increment('views');
        return response()->json(['success' => true, 'views' => $berita->views]);
    }
    return response()->json(['success' => false], 404);
});

// ==================== FRONTEND ROUTES ====================
Route::get('/', [HomeController::class, 'index'])->name('home');

// Destinasi Routes
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi');
Route::get('/destinasi/alam', [DestinasiController::class, 'alam'])->name('destinasi.alam');
Route::get('/destinasi/buatan', [DestinasiController::class, 'buatan'])->name('destinasi.buatan');
Route::get('/destinasi/budaya', [DestinasiController::class, 'budaya'])->name('destinasi.budaya');
Route::get('/destinasi/{kategori}/{slug}', [DestinasiController::class, 'detail'])->name('destinasi.detail');

// Informasi Publik
Route::get('/informasi', [PublicInformasiController::class, 'index'])->name('informasi');

// Galeri Publik
Route::get('/galeri', [PublicGaleriController::class, 'index'])->name('galeri');

// Detail Galeri
Route::get('/galeri/{slug}', function ($slug) {
    $galeri = App\Models\Galeri::where('slug', $slug)->firstOrFail();
    $galeri->increment('views');
    return view('pages.galeri-detail', compact('galeri'));
})->name('galeri.detail');

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

// UMKM Publik
Route::get('/umkm', [HomeController::class, 'umkm'])->name('umkm');

// Budaya
Route::get('/budaya', [HomeController::class, 'budaya'])->name('budaya');

// Kontak
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');

// ==================== GEOSITE ROUTES ====================
Route::get('/geosite/meat', [GeositeController::class, 'meat'])->name('geosite.meat');
Route::get('/geosite/batu-basiha', [GeositeController::class, 'batuBasiha'])->name('geosite.batu-basiha');
Route::get('/geosite/batu-bahisan', [GeositeController::class, 'batuBasiha'])->name('geosite.batu-bahisan'); // ← TAMBAHAN untuk sinkron dengan link home
Route::get('/geosite/liang-sipege', [GeositeController::class, 'liangSipege'])->name('geosite.liang-sipege');

// ==================== AUTH ROUTES ====================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Lupa Password Routes
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// ==================== ADMIN ROUTES ====================
Route::prefix('admin')->middleware(['auth'])->group(function () {
    
    // ========== MANAJEMEN ADMIN ==========
    Route::get('/create-admin', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/store-admin', [AdminController::class, 'store'])->name('admin.store');

    // ========== DASHBOARD ==========
    Route::get('/', function () {
        $totalGaleri = DB::table('galeri')->count();
        $totalBerita = DB::table('berita')->count();
        $totalInformasi = DB::table('informasi')->count();
        $totalUmkm = DB::table('umkm')->count();
        $totalFasilitas = DB::table('fasilitas')->count();
        $totalPenginapan = DB::table('penginapan')->count();
        $totalViews = 0;
        $beritaTerbaru = App\Models\Berita::latest()->limit(5)->get();
        
        return view('admin.dashboard', compact('totalGaleri', 'totalBerita', 'totalInformasi', 'totalUmkm', 'totalFasilitas', 'totalPenginapan', 'totalViews', 'beritaTerbaru'));
    })->name('admin.dashboard');
    
    // ========== RESOURCE ROUTES (CRUD) ==========
    Route::resource('galeri', GaleriController::class)->names('admin.galeri');
    Route::resource('berita', BeritaController::class)->names('admin.berita');
    Route::resource('informasi', InformasiController::class)->names('admin.informasi');
    Route::resource('umkm', UmkmController::class)->names('admin.umkm');
    Route::resource('fasilitas', FasilitasController::class)->names('admin.fasilitas');
    Route::resource('penginapan', PenginapanController::class)->names('admin.penginapan');
    
    // ========== TOGGLE STATUS ==========
    Route::post('galeri/toggle-status/{id}', [GaleriController::class, 'toggleStatus'])->name('admin.galeri.toggle-status');
    Route::post('berita/toggle-status/{id}', [BeritaController::class, 'toggleStatus'])->name('admin.berita.toggle-status');
    Route::post('informasi/toggle-status/{id}', [InformasiController::class, 'toggleStatus'])->name('admin.informasi.toggle-status');

    // kontak web
    Route::get('/kontak', [KontakController::class, 'edit'])->name('admin.kontak.edit');
    Route::put('/kontak', [KontakController::class, 'update'])->name('admin.kontak.update');
});