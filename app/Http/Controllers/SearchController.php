<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Umkm;
use App\Models\Penginapan;
use App\Models\Fasilitas;
use App\Models\Biodiversitas;
use App\Models\Geodiversitas;
use App\Models\CulturalDiversity;
use App\Models\SejarahWisata;
use App\Models\Destinasi;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Live search - mengembalikan JSON untuk dropdown
     */
    public function search(Request $request)
    {
        $query = $request->get('q');

        if (empty($query) || strlen($query) < 2) {
            return response()->json([]);
        }

        $results = [];

        // Search Berita
        $berita = Berita::where('status', true)
            ->where(function($q) use ($query) {
                $q->where('judul', 'LIKE', "%{$query}%")
                  ->orWhere('konten', 'LIKE', "%{$query}%");
            })
            ->limit(3)
            ->get();

        foreach ($berita as $item) {
            $results[] = [
                'nama' => $item->judul,
                'sub' => 'Berita',
                'url' => route('berita.detail', $item->slug),
                'gambar_url' => $item->gambar_url ?? null,
                'icon' => 'fa-newspaper',
                'type' => 'Berita'
            ];
        }

        // Search Galeri
        $galeri = Galeri::where('status', true)
            ->where(function($q) use ($query) {
                $q->where('judul', 'LIKE', "%{$query}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$query}%");
            })
            ->limit(3)
            ->get();

        foreach ($galeri as $item) {
            $results[] = [
                'nama' => $item->judul,
                'sub' => 'Galeri',
                'url' => route('galeri.detail', $item->slug),
                'gambar_url' => $item->gambar_url ?? null,
                'icon' => 'fa-images',
                'type' => 'Galeri'
            ];
        }

        // Search UMKM
        $umkm = Umkm::where('status', 'aktif')
            ->where(function($q) use ($query) {
                $q->where('nama_usaha', 'LIKE', "%{$query}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$query}%");
            })
            ->limit(3)
            ->get();

        foreach ($umkm as $item) {
            $results[] = [
                'nama' => $item->nama_usaha,
                'sub' => 'UMKM',
                'url' => route('fasilitas.umkm.detail', $item->id),
                'gambar_url' => $item->foto_utama ? asset($item->foto_utama) : null,
                'icon' => 'fa-store',
                'type' => 'UMKM'
            ];
        }

        // Search Penginapan
        $penginapan = Penginapan::where('status', true)
            ->where(function($q) use ($query) {
                $q->where('nama', 'LIKE', "%{$query}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$query}%");
            })
            ->limit(3)
            ->get();

        foreach ($penginapan as $item) {
            $results[] = [
                'nama' => $item->nama,
                'sub' => 'Penginapan',
                'url' => route('fasilitas.penginapan.detail', $item->id),
                'gambar_url' => $item->gambar_url ?? null,
                'icon' => 'fa-hotel',
                'type' => 'Penginapan'
            ];
        }

        // Search Biodiversitas
        $biodiversitas = Biodiversitas::where('status', true)
            ->where(function($q) use ($query) {
                $q->where('nama', 'LIKE', "%{$query}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$query}%");
            })
            ->limit(2)
            ->get();

        foreach ($biodiversitas as $item) {
            $results[] = [
                'nama' => $item->nama,
                'sub' => 'Biodiversitas',
                'url' => route('biodiversitas.detail', $item->slug),
                'gambar_url' => $item->gambar_url ?? null,
                'icon' => 'fa-leaf',
                'type' => 'Biodiversitas'
            ];
        }

        // Search Geodiversitas
        $geodiversitas = Geodiversitas::where('status', true)
            ->where(function($q) use ($query) {
                $q->where('nama', 'LIKE', "%{$query}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$query}%");
            })
            ->limit(2)
            ->get();

        foreach ($geodiversitas as $item) {
            $results[] = [
                'nama' => $item->nama,
                'sub' => 'Geodiversitas',
                'url' => route('geodiversitas.detail', $item->slug),
                'gambar_url' => $item->gambar_url ?? null,
                'icon' => 'fa-gem',
                'type' => 'Geodiversitas'
            ];
        }

        // Search Cultural Diversity
        $cultural = CulturalDiversity::where('status', true)
            ->where(function($q) use ($query) {
                $q->where('nama', 'LIKE', "%{$query}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$query}%");
            })
            ->limit(2)
            ->get();

        foreach ($cultural as $item) {
            $results[] = [
                'nama' => $item->nama,
                'sub' => 'Cultural Diversity',
                'url' => route('cultural-diversity.detail', $item->slug),
                'gambar_url' => $item->gambar_url ?? null,
                'icon' => 'fa-people-arrows',
                'type' => 'Cultural Diversity'
            ];
        }

        // Search Sejarah Wisata
        $sejarah = SejarahWisata::where('status', true)
            ->where(function($q) use ($query) {
                $q->where('judul', 'LIKE', "%{$query}%")
                  ->orWhere('konten', 'LIKE', "%{$query}%");
            })
            ->limit(2)
            ->get();

        foreach ($sejarah as $item) {
            $results[] = [
                'nama' => $item->judul,
                'sub' => 'Sejarah Wisata',
                'url' => route('sejarah.detail', $item->slug),
                'gambar_url' => $item->gambar_url ?? null,
                'icon' => 'fa-history',
                'type' => 'Sejarah'
            ];
        }

        return response()->json($results);
    }

    /**
     * Halaman hasil pencarian
     */
    public function searchResults(Request $request)
    {
        $query = $request->get('q');

        if (empty($query) || strlen($query) < 2) {
            return redirect()->back()->with('error', 'Masukkan kata kunci pencarian minimal 2 karakter.');
        }

        // Kumpulkan hasil dari semua model
        $results = [];

        // Berita
        $berita = Berita::where('status', true)
            ->where(function($q) use ($query) {
                $q->where('judul', 'LIKE', "%{$query}%")
                  ->orWhere('konten', 'LIKE', "%{$query}%");
            })
            ->get();
        foreach ($berita as $item) {
            $item->type = 'Berita';
            $item->url = route('berita.detail', $item->slug);
            $results[] = $item;
        }

        // Galeri
        $galeri = Galeri::where('status', true)
            ->where(function($q) use ($query) {
                $q->where('judul', 'LIKE', "%{$query}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$query}%");
            })
            ->get();
        foreach ($galeri as $item) {
            $item->type = 'Galeri';
            $item->url = route('galeri.detail', $item->slug);
            $results[] = $item;
        }

        // UMKM
        $umkm = Umkm::where('status', 'aktif')
            ->where(function($q) use ($query) {
                $q->where('nama_usaha', 'LIKE', "%{$query}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$query}%");
            })
            ->get();
        foreach ($umkm as $item) {
            $item->type = 'UMKM';
            $item->url = route('fasilitas.umkm.detail', $item->id);
            $results[] = $item;
        }

        // Penginapan
        $penginapan = Penginapan::where('status', true)
            ->where(function($q) use ($query) {
                $q->where('nama', 'LIKE', "%{$query}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$query}%");
            })
            ->get();
        foreach ($penginapan as $item) {
            $item->type = 'Penginapan';
            $item->url = route('fasilitas.penginapan.detail', $item->id);
            $results[] = $item;
        }

        // Biodiversitas
        $biodiversitas = Biodiversitas::where('status', true)
            ->where(function($q) use ($query) {
                $q->where('nama', 'LIKE', "%{$query}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$query}%");
            })
            ->get();
        foreach ($biodiversitas as $item) {
            $item->type = 'Biodiversitas';
            $item->url = route('biodiversitas.detail', $item->slug);
            $results[] = $item;
        }

        // Geodiversitas
        $geodiversitas = Geodiversitas::where('status', true)
            ->where(function($q) use ($query) {
                $q->where('nama', 'LIKE', "%{$query}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$query}%");
            })
            ->get();
        foreach ($geodiversitas as $item) {
            $item->type = 'Geodiversitas';
            $item->url = route('geodiversitas.detail', $item->slug);
            $results[] = $item;
        }

        // Cultural Diversity
        $cultural = CulturalDiversity::where('status', true)
            ->where(function($q) use ($query) {
                $q->where('nama', 'LIKE', "%{$query}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$query}%");
            })
            ->get();
        foreach ($cultural as $item) {
            $item->type = 'Cultural Diversity';
            $item->url = route('cultural-diversity.detail', $item->slug);
            $results[] = $item;
        }

        // Sejarah Wisata
        $sejarah = SejarahWisata::where('status', true)
            ->where(function($q) use ($query) {
                $q->where('judul', 'LIKE', "%{$query}%")
                  ->orWhere('konten', 'LIKE', "%{$query}%");
            })
            ->get();
        foreach ($sejarah as $item) {
            $item->type = 'Sejarah Wisata';
            $item->url = route('sejarah.detail', $item->slug);
            $results[] = $item;
        }

        // Urutkan berdasarkan created_at terbaru
        $results = collect($results)->sortByDesc('created_at');

        return view('pages.search-results', compact('query', 'results'));
    }
}