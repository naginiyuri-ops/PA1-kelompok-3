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
use App\Http\Controllers\Admin\SejarahWisataController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TentangGeositeController;
use App\Http\Controllers\BiodiversitasController;
use App\Http\Controllers\GeodiversitasController;
use App\Http\Controllers\CulturalDiversityController;
use App\Http\Controllers\FasilitasUtamaController;
use Illuminate\Support\Facades\DB;

// ========================================
// ========== FRONTEND ROUTES (PUBLIC) ==========
// ========================================

Route::get('/', [HomeController::class, 'index'])->name('home');

// ========================================
// ========== GLOBAL SEARCH ==========
// ========================================
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Language Route
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

// ========================================
// ========== TENTANG GEOSITE (PUBLIC) ==========
// ========================================
Route::get('/tentang-geosite', [TentangGeositeController::class, 'index'])->name('tentang-geosite');

// ========================================
// ========== DESTINASI ROUTES ==========
// ========================================
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi');
Route::get('/destinasi/alam', [DestinasiController::class, 'alam'])->name('destinasi.alam');
Route::get('/destinasi/buatan', [DestinasiController::class, 'buatan'])->name('destinasi.buatan');
Route::get('/destinasi/budaya', [DestinasiController::class, 'budaya'])->name('destinasi.budaya');
Route::get('/destinasi/{kategori}/{slug}', [DestinasiController::class, 'detail'])->name('destinasi.detail');

// ========================================
// ========== DIVERSITY ROUTES ==========
// ========================================

// BIODIVERSITAS
Route::get('/biodiversitas', [BiodiversitasController::class, 'index'])->name('biodiversitas');
Route::get('/biodiversitas/{slug}', [BiodiversitasController::class, 'show'])->name('biodiversitas.detail');
Route::get('/biodiversitas/kategori/{kategori}', [BiodiversitasController::class, 'kategori'])->name('biodiversitas.kategori');

// GEODIVERSITAS
Route::get('/geodiversitas', [GeodiversitasController::class, 'index'])->name('geodiversitas');
Route::get('/geodiversitas/{slug}', [GeodiversitasController::class, 'show'])->name('geodiversitas.detail');

// CULTURAL DIVERSITY
Route::get('/cultural-diversity', [CulturalDiversityController::class, 'index'])->name('cultural-diversity');
Route::get('/cultural-diversity/{slug}', [CulturalDiversityController::class, 'show'])->name('cultural-diversity.detail');

// ========================================
// ========== BERITA ==========
// ========================================
Route::get('/berita', function () {
    $berita = App\Models\Berita::where('status', true)->latest()->paginate(9);
    return view('pages.berita', compact('berita'));
})->name('berita');

Route::get('/berita/{slug}', function ($slug) {
    $berita = App\Models\Berita::where('slug', $slug)->where('status', true)->firstOrFail();
    $berita->increment('views');
    return view('pages.berita-detail', compact('berita'));
})->name('berita.detail');

// ========================================
// ========== FASILITAS ==========
// ========================================

// FASILITAS UTAMA (halaman dengan 2 card: UMKM & Penginapan)
Route::get('/fasilitas', [FasilitasUtamaController::class, 'index'])->name('fasilitas');

// UMKM
Route::get('/fasilitas/umkm', [FasilitasUtamaController::class, 'umkm'])->name('fasilitas.umkm');
Route::get('/fasilitas/umkm/{id}', [FasilitasUtamaController::class, 'umkmDetail'])->name('fasilitas.umkm.detail');

// PENGINAPAN
Route::get('/fasilitas/penginapan', [FasilitasUtamaController::class, 'penginapan'])->name('fasilitas.penginapan');
Route::get('/fasilitas/penginapan/{id}', [FasilitasUtamaController::class, 'penginapanDetail'])->name('fasilitas.penginapan.detail');

// ========================================
// ========== GALERI ==========
// ========================================
Route::get('/galeri', [PublicGaleriController::class, 'index'])->name('galeri');
Route::get('/galeri/{slug}', function ($slug) {
    $galeri = App\Models\Galeri::where('slug', $slug)->firstOrFail();
    $galeri->increment('views');
    return view('pages.galeri-detail', compact('galeri'));
})->name('galeri.detail');

// ========================================
// ========== INFORMASI ==========
// ========================================
Route::get('/informasi', [PublicInformasiController::class, 'index'])->name('informasi');
Route::post('/informasi/{id}/view', function ($id) {
    $informasi = App\Models\Informasi::find($id);
    if ($informasi) {
        $informasi->increment('views');
        return response()->json(['success' => true, 'views' => $informasi->views]);
    }
    return response()->json(['success' => false], 404);
});

// ========================================
// ========== KONTAK ==========
// ========================================
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');

// ========================================
// ========== GEOSITE ROUTES ==========
// ========================================
Route::get('/geosite/balige', [GeositeController::class, 'balige'])->name('geosite.balige');
Route::get('/geosite/meat', [GeositeController::class, 'meat'])->name('geosite.meat');
Route::get('/geosite/batu-basiha', [GeositeController::class, 'batuBasiha'])->name('geosite.batu-basiha');
Route::get('/geosite/batu-bahisan', [GeositeController::class, 'batuBahisan'])->name('geosite.batu-bahisan');
Route::get('/geosite/liang-sipege', [GeositeController::class, 'liangSipege'])->name('geosite.liang-sipege');

// Detail artikel sejarah (untuk semua geosite)
Route::get('/sejarah/{slug}', [GeositeController::class, 'detail'])->name('sejarah.detail');

// ========================================
// ========== API ROUTES ==========
// ========================================
Route::post('/api/berita/{id}/view', function ($id) {
    $berita = App\Models\Berita::find($id);
    if ($berita) {
        $berita->increment('views');
        return response()->json(['success' => true, 'views' => $berita->views]);
    }
    return response()->json(['success' => false], 404);
});

// ========================================
// ========== AUTH ROUTES ==========
// ========================================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// ========================================
// ========== ADMIN ROUTES (PROTECTED) ==========
// ========================================
Route::prefix('admin')->middleware(['auth'])->group(function () {

    // ========== MANAJEMEN ADMIN ==========
    Route::get('/create-admin', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/store-admin', [AdminController::class, 'store'])->name('admin.store');

    // ========== DASHBOARD ==========
    Route::get('/', function () {
        $totalGaleri = DB::table('galeri')->count();
        $totalBerita = DB::table('beritas')->count();
        $totalInformasi = DB::table('informasis')->count();
        $totalSejarah = DB::table('sejarah_wisata')->count();
        $totalUmkm = DB::table('umkm')->count();
        $totalFasilitas = DB::table('fasilitas')->count();
        $totalPenginapan = DB::table('penginapan')->count();
        $totalBiodiversitas = DB::table('biodiversitas')->count();
        $totalViews = 0;
        $beritaTerbaru = App\Models\Berita::latest()->limit(5)->get();
        
        return view('admin.dashboard', compact(
            'totalGaleri', 
            'totalBerita', 
            'totalInformasi',
            'totalSejarah',
            'totalUmkm', 
            'totalFasilitas', 
            'totalPenginapan',
            'totalBiodiversitas',
            'totalViews', 
            'beritaTerbaru'
        ));
    })->name('admin.dashboard');

    // ========== DIVERSITY RESOURCES (CRUD) ==========
    
    // BIODIVERSITAS
    Route::resource('biodiversitas', App\Http\Controllers\Admin\BiodiversitasController::class)->names('admin.biodiversitas');
    Route::post('biodiversitas/toggle-status/{id}', [App\Http\Controllers\Admin\BiodiversitasController::class, 'toggleStatus'])->name('admin.biodiversitas.toggle-status');

    // GEODIVERSITAS
    Route::resource('geodiversitas', App\Http\Controllers\Admin\GeodiversitasController::class)->names('admin.geodiversitas');
    Route::post('geodiversitas/toggle-status/{id}', [App\Http\Controllers\Admin\GeodiversitasController::class, 'toggleStatus'])->name('admin.geodiversitas.toggle-status');

    // CULTURAL DIVERSITY
    Route::resource('cultural-diversity', App\Http\Controllers\Admin\CulturalDiversityController::class)->names('admin.cultural-diversity');
    Route::post('cultural-diversity/toggle-status/{id}', [App\Http\Controllers\Admin\CulturalDiversityController::class, 'toggleStatus'])->name('admin.cultural-diversity.toggle-status');

    // ========== SEJARAH WISATA (CRUD) ==========
    Route::resource('sejarah-wisata', SejarahWisataController::class)->names('admin.sejarah-wisata');
    Route::post('sejarah-wisata/toggle-status/{id}', [SejarahWisataController::class, 'toggleStatus'])->name('admin.sejarah-wisata.toggle-status');
    Route::get('sejarah-wisata/filter/{geosite}', [SejarahWisataController::class, 'filter'])->name('admin.sejarah-wisata.filter');

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

    // ========== GALERI UNGGULAN ==========
    Route::post('galeri/toggle-unggulan/{id}', [GaleriController::class, 'toggleUnggulan'])->name('admin.galeri.toggle-unggulan');

    // ========== KONTAK WEB ==========
    Route::get('/kontak', [KontakController::class, 'index'])->name('admin.kontak.index');
    Route::put('/kontak', [KontakController::class, 'update'])->name('admin.kontak.update');
});