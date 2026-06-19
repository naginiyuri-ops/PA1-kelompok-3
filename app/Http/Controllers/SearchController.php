<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Umkm;
use App\Models\Penginapan;
use App\Models\Biodiversitas;
use App\Models\Geodiversitas;
use App\Models\CulturalDiversity;

class SearchController extends Controller
{
    /**
     * Endpoint pencarian global.
     * Menerima parameter GET ?q=... dan mencari ke seluruh tabel utama.
     * Mengembalikan respons JSON yang berisi kumpulan hasil dari semua tabel.
     */
    public function search(Request $request)
    {
        // Ambil dan bersihkan kata kunci dari request
        $query = trim($request->get('q', ''));

        // Jika query kurang dari 3 karakter, kembalikan array kosong
        // (validasi ini juga ada di frontend, tapi perlu double-check di backend)
        if (mb_strlen($query) < 3) {
            return response()->json([]);
        }

        $results = collect();

        // ============================================================
        // 1. CARI DI TABEL BERITA
        // Hanya cari berita yang berstatus aktif (status = 1)
        // ============================================================
        $berita = Berita::where('status', 1)
            ->where('judul', 'LIKE', "%{$query}%")
            ->select('id', 'judul', 'slug', 'gambar', 'penulis')
            ->limit(4)
            ->get()
            ->map(function ($item) {
                return [
                    'type'        => 'Berita',        // Label kategori hasil
                    'icon'        => 'fa-newspaper',   // Ikon FontAwesome
                    'nama'        => $item->judul,     // Nama yang ditampilkan
                    'sub'         => $item->penulis ?? 'Redaksi', // Info tambahan
                    'url'         => url('/berita/' . $item->slug), // URL tujuan klik
                    'gambar_url'  => $item->gambar_url,
                ];
            });

        // ============================================================
        // 2. CARI DI TABEL UMKM
        // Hanya tampilkan UMKM dengan status aktif
        // ============================================================
        $umkm = Umkm::where('status', 'aktif')
            ->where('nama_usaha', 'LIKE', "%{$query}%")
            ->select('id', 'nama_usaha', 'pemilik', 'alamat', 'foto_utama')
            ->limit(4)
            ->get()
            ->map(function ($item) {
                // Resolusi URL gambar UMKM mengikuti logika yang sama dengan HomeController
                $gambarUrl = null;
                if (!empty($item->foto_utama)) {
                    if (str_starts_with($item->foto_utama, 'image/') || str_starts_with($item->foto_utama, 'storage/')) {
                        $gambarUrl = asset($item->foto_utama);
                    } elseif (file_exists(public_path('image/umkm/' . $item->foto_utama))) {
                        $gambarUrl = asset('image/umkm/' . $item->foto_utama);
                    } else {
                        $gambarUrl = asset($item->foto_utama);
                    }
                }

                return [
                    'type'        => 'UMKM',
                    'icon'        => 'fa-store',
                    'nama'        => $item->nama_usaha,
                    'sub'         => $item->alamat ?? 'Desa Meat',
                    'url'         => url('/umkm/' . $item->id),
                    'gambar_url'  => $gambarUrl,
                ];
            });

        // ============================================================
        // 3. CARI DI TABEL PENGINAPAN
        // Cari berdasarkan nama atau lokasi, hanya yang aktif (status = 1)
        // ============================================================
        $penginapan = Penginapan::where('status', 1)
            ->where(function ($q) use ($query) {
                $q->where('nama', 'LIKE', "%{$query}%")
                  ->orWhere('lokasi', 'LIKE', "%{$query}%");
            })
            ->select('id', 'nama', 'lokasi', 'harga', 'gambar')
            ->limit(4)
            ->get()
            ->map(function ($item) {
                return [
                    'type'        => 'Penginapan',
                    'icon'        => 'fa-hotel',
                    'nama'        => $item->nama,
                    'sub'         => $item->lokasi ?? '-',
                    'url'         => url('/penginapan/' . $item->id),
                    'gambar_url'  => $item->gambar_url, // Menggunakan accessor yang sudah ada di model
                ];
            });

        // ============================================================
        // 4. CARI DI TABEL BIODIVERSITAS
        // Hanya tampilkan yang berstatus aktif (status = true)
        // ============================================================
        $biodiversitas = Biodiversitas::where('status', true)
            ->where(function ($q) use ($query) {
                $q->where('nama', 'LIKE', "%{$query}%")
                  ->orWhere('lokasi', 'LIKE', "%{$query}%");
            })
            ->select('id', 'nama', 'slug', 'kategori', 'lokasi', 'gambar')
            ->limit(4)
            ->get()
            ->map(function ($item) {
                return [
                    'type'        => 'Biodiversitas',
                    'icon'        => 'fa-leaf',
                    'nama'        => $item->nama,
                    'sub'         => $item->kategori ?? $item->lokasi,
                    'url'         => url('/biodiversitas/' . $item->slug),
                    'gambar_url'  => $item->gambar_url,
                ];
            });

        // ============================================================
        // 5. CARI DI TABEL GEODIVERSITAS
        // Hanya tampilkan yang berstatus aktif (status = true)
        // ============================================================
        $geodiversitas = Geodiversitas::where('status', true)
            ->where(function ($q) use ($query) {
                $q->where('nama', 'LIKE', "%{$query}%")
                  ->orWhere('lokasi', 'LIKE', "%{$query}%");
            })
            ->select('id', 'nama', 'slug', 'tipe_geologi', 'lokasi', 'gambar')
            ->limit(4)
            ->get()
            ->map(function ($item) {
                return [
                    'type'        => 'Geodiversitas',
                    'icon'        => 'fa-gem',
                    'nama'        => $item->nama,
                    'sub'         => $item->tipe_geologi ?? $item->lokasi,
                    'url'         => url('/geodiversitas/' . $item->slug),
                    'gambar_url'  => $item->gambar_url,
                ];
            });

        // ============================================================
        // 6. CARI DI TABEL CULTURAL DIVERSITY
        // Hanya tampilkan yang berstatus aktif (status = true)
        // ============================================================
        $cultural = CulturalDiversity::where('status', true)
            ->where(function ($q) use ($query) {
                $q->where('nama', 'LIKE', "%{$query}%")
                  ->orWhere('lokasi', 'LIKE', "%{$query}%");
            })
            ->select('id', 'nama', 'slug', 'kategori', 'lokasi', 'gambar')
            ->limit(4)
            ->get()
            ->map(function ($item) {
                return [
                    'type'        => 'Budaya',
                    'icon'        => 'fa-people-arrows',
                    'nama'        => $item->nama,
                    'sub'         => $item->kategori ?? $item->lokasi,
                    'url'         => url('/cultural-diversity/' . $item->slug),
                    'gambar_url'  => $item->gambar_url,
                ];
            });

        // ============================================================
        // 7. CARI DI DATA DESTINASI (HARDCODED)
        // Data Destinasi berada secara hardcoded di DestinasiController
        // ============================================================
        $hardcodedDestinasi = [
            ['nama' => 'Pantai Meat', 'kategori' => 'alam', 'slug' => 'desa-wisata-meat', 'lokasi' => 'Kec. Tampahan, Kab. Toba Samosir', 'foto' => 'image/meat/meat-detail.jpg'],
            ['nama' => 'Batu Basiha', 'kategori' => 'alam', 'slug' => 'geosite-batu-basiha', 'lokasi' => 'Desa Aek Bolon, Balige', 'foto' => 'image/meat/batubasiha1.png'],
            ['nama' => 'Gua Liang Sipege', 'kategori' => 'alam', 'slug' => 'liang-sipege', 'lokasi' => 'Desa Simarmar Pea Talun Hutagaol', 'foto' => 'image/meat/liang-sipege-hero.jpg'],
            ['nama' => 'Sentra Tenun Ulos', 'kategori' => 'budaya', 'slug' => 'sentra-tenun-ulos', 'lokasi' => 'Desa Meat, Kec. Tampahan', 'foto' => 'image/meat/ulos.jpg'],
            ['nama' => 'Rumah Adat Batak', 'kategori' => 'budaya', 'slug' => 'rumah-adat-batak', 'lokasi' => 'Desa Meat, Kec. Tampahan', 'foto' => 'image/meat/jabubatak.jpg'],
            ['nama' => 'Spot Pantai Meat', 'kategori' => 'buatan', 'slug' => 'spot-pantai-meat', 'lokasi' => 'Desa Meat, Kec. Tampahan', 'foto' => 'image/meat/meat.jpeg'],
            ['nama' => 'Homestay Meat', 'kategori' => 'buatan', 'slug' => 'homestay-meat', 'lokasi' => 'Desa Meat, Kec. Tampahan', 'foto' => 'image/meat/meat1.jpeg'],
            ['nama' => 'Jalur Trekking Sawah', 'kategori' => 'buatan', 'slug' => 'jalur-trekking-sawah', 'lokasi' => 'Desa Meat, Kec. Tampahan', 'foto' => 'image/destinasi/buatan3.jpg'],
        ];

        $destinasiResults = collect($hardcodedDestinasi)->filter(function ($item) use ($query) {
            return stripos($item['nama'], $query) !== false || stripos($item['lokasi'], $query) !== false;
        })->take(4)->map(function ($item) {
            return [
                'type'        => 'Destinasi',
                'icon'        => 'fa-map-marked-alt',
                'nama'        => $item['nama'],
                'sub'         => $item['lokasi'],
                'url'         => url('/destinasi/' . $item['kategori'] . '/' . $item['slug']),
                'gambar_url'  => asset($item['foto']),
            ];
        });

        // ============================================================
        // GABUNGKAN SEMUA HASIL DARI SEMUA TABEL
        // Menggunakan merge() dari Laravel Collection agar rapi dan efisien
        // ============================================================
        $results = $results
            ->merge($destinasiResults)
            ->merge($berita)
            ->merge($umkm)
            ->merge($penginapan)
            ->merge($biodiversitas)
            ->merge($geodiversitas)
            ->merge($cultural);

        // Kembalikan hasil sebagai respons JSON
        return response()->json($results->values()->all());
    }
}
