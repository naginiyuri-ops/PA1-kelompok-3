<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Destination merepresentasikan data destinasi wisata.
 * Satu model ini digunakan untuk ketiga sub-kategori (alam, buatan, budaya)
 * sehingga kode lebih DRY (Don't Repeat Yourself).
 */
class Destination extends Model
{
    use HasFactory;

    /** Nama tabel di database */
    protected $table = 'destinations';

    /**
     * Atribut yang boleh diisi secara massal (mass assignment).
     * Penting: 'category' selalu wajib diisi saat create/update.
     */
    protected $fillable = [
        'category',     // Nilai enum: 'alam' | 'buatan' | 'budaya'
        'title',        // Judul destinasi
        'description',  // Deskripsi lengkap
        'image_path',   // Path gambar relatif terhadap public/
        'status',       // Boolean: true = aktif, false = nonaktif
    ];

    /** Casting tipe data otomatis */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Scope untuk memfilter hanya data aktif.
     * Penggunaan: Destination::active()->get()
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope untuk memfilter berdasarkan kategori.
     * Penggunaan: Destination::ofCategory('alam')->get()
     */
    public function scopeOfCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Accessor: mendapatkan URL gambar lengkap.
     * Mengembalikan URL asset jika image_path ada, atau gambar default jika tidak ada.
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image_path && file_exists(public_path($this->image_path))) {
            return asset($this->image_path);
        }
        return asset('image/default.jpg');
    }

    /**
     * Accessor: mendapatkan label kategori yang sudah diformat dengan huruf kapital.
     */
    public function getCategoryLabelAttribute(): string
    {
        return ucfirst($this->category);
    }
}
