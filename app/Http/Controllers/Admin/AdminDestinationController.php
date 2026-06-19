<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * AdminDestinationController menangani semua operasi CRUD untuk ketiga
 * sub-kategori destinasi (Alam, Buatan, Budaya) menggunakan parameter
 * $category agar kode tetap DRY (satu controller, tiga tampilan berbeda).
 */
class AdminDestinationController extends Controller
{
    /**
     * Batas maksimal jumlah data per kategori.
     * Jika sudah mencapai batas ini, penambahan data baru akan ditolak.
     */
    const MAX_DATA_PER_KATEGORI = 24;

    /**
     * Daftar kategori yang valid beserta konfigurasi tampilannya.
     * Digunakan untuk validasi dan konfigurasi UI setiap kategori.
     */
    protected array $kategoriConfig = [
        'alam'   => ['label' => 'Destinasi Alam',   'icon' => 'fa-tree',     'route_prefix' => 'admin.destination.alam'],
        'buatan' => ['label' => 'Destinasi Buatan',  'icon' => 'fa-building', 'route_prefix' => 'admin.destination.buatan'],
        'budaya' => ['label' => 'Destinasi Budaya',  'icon' => 'fa-landmark', 'route_prefix' => 'admin.destination.budaya'],
    ];

    // ==============================================================
    // HELPER PRIVATE: Validasi kategori yang diterima
    // ==============================================================

    /**
     * Memvalidasi bahwa $category yang diterima adalah nilai yang sah.
     * Jika tidak valid, lempar 404 agar tidak ada akses URL sembarangan.
     */
    private function validateKategori(string $category): array
    {
        if (!array_key_exists($category, $this->kategoriConfig)) {
            abort(404, 'Kategori destinasi tidak ditemukan.');
        }
        return $this->kategoriConfig[$category];
    }

    // ==============================================================
    // INDEX: Daftar semua data berdasarkan kategori
    // ==============================================================

    public function index(Request $request, string $category)
    {
        // Validasi kategori yang diterima dari URL
        $config = $this->validateKategori($category);

        // Bangun query dasar untuk kategori ini
        $query = Destination::ofCategory($category)->latest();

        // Fitur pencarian berdasarkan judul atau deskripsi
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Paginasi 10 data per halaman untuk performa optimal
        $data = $query->paginate(10)->withQueryString();

        // Hitung total data di kategori ini untuk ditampilkan di UI
        $totalKategori = Destination::ofCategory($category)->count();

        return view('admin.destination.index', compact(
            'data',
            'category',
            'config',
            'totalKategori'
        ));
    }

    // ==============================================================
    // CREATE: Form tambah data baru
    // ==============================================================

    public function create(string $category)
    {
        $config = $this->validateKategori($category);
        return view('admin.destination.create', compact('category', 'config'));
    }

    // ==============================================================
    // STORE: Simpan data baru ke database
    // ==============================================================

    public function store(Request $request, string $category)
    {
        // Validasi kategori terlebih dahulu
        $this->validateKategori($category);

        // ============================================================
        // ATURAN KRITIS: Cek batas maksimal data per kategori
        // Jika sudah mencapai 24 data, tolak penambahan baru
        // ============================================================
        $jumlahSaatIni = Destination::ofCategory($category)->count();

        if ($jumlahSaatIni >= self::MAX_DATA_PER_KATEGORI) {
            return back()->withErrors([
                'limit' => "Kategori " . ucfirst($category) . " sudah mencapai batas maksimal "
                    . self::MAX_DATA_PER_KATEGORI . " data. Hapus data lama terlebih dahulu untuk menambah data baru."
            ])->withInput();
        }

        // Validasi input dari form
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'status'      => 'nullable|boolean',
        ], [
            // Pesan error dalam Bahasa Indonesia
            'title.required'       => 'Judul destinasi wajib diisi.',
            'description.required' => 'Deskripsi destinasi wajib diisi.',
            'image.image'          => 'File yang diunggah harus berupa gambar.',
            'image.max'            => 'Ukuran gambar maksimal 5MB.',
        ]);

        // Siapkan data yang akan disimpan
        $dataToSave = [
            'category'    => $category,
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->has('status') ? 1 : 0,
        ];

        // Proses upload gambar jika ada file yang dikirim
        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $filename = time() . '_dest_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();

            // Buat direktori tujuan jika belum ada
            $destinationPath = public_path('image/destinations/' . $category);
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Pindahkan file ke direktori tujuan
            $file->move($destinationPath, $filename);

            // Simpan path relatif terhadap folder public/ ke database
            $dataToSave['image_path'] = 'image/destinations/' . $category . '/' . $filename;
        }

        // Simpan ke database
        Destination::create($dataToSave);

        return redirect()
            ->route("admin.destination.{$category}.index")
            ->with('success', 'Data Destinasi ' . ucfirst($category) . ' berhasil ditambahkan!');
    }

    // ==============================================================
    // EDIT: Form edit data yang sudah ada
    // ==============================================================

    public function edit(string $category, int $id)
    {
        $config      = $this->validateKategori($category);

        // Cari data berdasarkan ID dan kategorinya sekaligus agar aman
        $destination = Destination::ofCategory($category)->findOrFail($id);

        return view('admin.destination.edit', compact('destination', 'category', 'config'));
    }

    // ==============================================================
    // UPDATE: Perbarui data yang sudah ada
    // ==============================================================

    public function update(Request $request, string $category, int $id)
    {
        $this->validateKategori($category);

        // Cari data yang akan diperbarui
        $destination = Destination::ofCategory($category)->findOrFail($id);

        // Validasi input
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'status'      => 'nullable|boolean',
        ], [
            'title.required'       => 'Judul destinasi wajib diisi.',
            'description.required' => 'Deskripsi destinasi wajib diisi.',
            'image.max'            => 'Ukuran gambar maksimal 5MB.',
        ]);

        // Data yang akan diperbarui
        $dataToUpdate = [
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->has('status') ? 1 : 0,
        ];

        // Logika hapus gambar lama jika pengguna mencentang opsi hapus gambar
        if ($request->has('hapus_gambar') && $request->hapus_gambar == 1) {
            if ($destination->image_path && file_exists(public_path($destination->image_path))) {
                unlink(public_path($destination->image_path));
            }
            $dataToUpdate['image_path'] = null;
        }

        // Proses upload gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama terlebih dahulu untuk menghemat ruang penyimpanan
            if ($destination->image_path && file_exists(public_path($destination->image_path))) {
                unlink(public_path($destination->image_path));
            }

            $file     = $request->file('image');
            $filename = time() . '_dest_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path('image/destinations/' . $category);
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $file->move($destinationPath, $filename);
            $dataToUpdate['image_path'] = 'image/destinations/' . $category . '/' . $filename;
        }

        $destination->update($dataToUpdate);

        return redirect()
            ->route("admin.destination.{$category}.index")
            ->with('success', 'Data Destinasi ' . ucfirst($category) . ' berhasil diperbarui!');
    }

    // ==============================================================
    // DESTROY: Hapus data beserta gambarnya
    // ==============================================================

    public function destroy(string $category, int $id)
    {
        $this->validateKategori($category);

        $destination = Destination::ofCategory($category)->findOrFail($id);

        // Hapus file gambar dari filesystem sebelum menghapus record dari DB
        if ($destination->image_path && file_exists(public_path($destination->image_path))) {
            unlink(public_path($destination->image_path));
        }

        $destination->delete();

        return redirect()
            ->route("admin.destination.{$category}.index")
            ->with('success', 'Data Destinasi ' . ucfirst($category) . ' berhasil dihapus!');
    }
}
