<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkm';
    
    protected $fillable = [
        'nama', 'deskripsi', 'gambar', 'lokasi', 'kontak', 'urutan', 'status'
    ];

    // Accessor untuk URL gambar
    public function getGambarUrlAttribute()
    {
        if (!$this->gambar) {
            return asset('image/umkm/default.jpg');
        }

        // Jika sudah URL lengkap
        if (filter_var($this->gambar, FILTER_VALIDATE_URL)) {
            return $this->gambar;
        }

        // Jika dari public/image/umkm/
        if (file_exists(public_path($this->gambar))) {
            return asset($this->gambar);
        }

        // Jika hanya nama file
        if (file_exists(public_path('image/umkm/' . $this->gambar))) {
            return asset('image/umkm/' . $this->gambar);
        }

        return asset('image/umkm/default.jpg');
    }

    // Scope untuk filter aktif
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}