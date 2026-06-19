<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    use HasFactory;

    protected $table = 'penginapan';
    
    protected $fillable = [
        'user_id', 'nama', 'deskripsi', 'gambar', 'gambar_tambahan', 'harga', 
        'lokasi', 'kontak', 'urutan', 'status'
    ];

    // Accessor untuk URL gambar
    public function getGambarUrlAttribute()
    {
        if (!$this->gambar) {
            return asset('image/penginapan/default.jpg');
        }

        // Jika sudah URL lengkap
        if (filter_var($this->gambar, FILTER_VALIDATE_URL)) {
            return $this->gambar;
        }

        // Jika dari public/image/penginapan/
        if (file_exists(public_path($this->gambar))) {
            return asset($this->gambar);
        }

        // Jika hanya nama file
        if (file_exists(public_path('image/penginapan/' . $this->gambar))) {
            return asset('image/penginapan/' . $this->gambar);
        }

        return asset('image/penginapan/default.jpg');
    }

    // Scope untuk filter aktif
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}