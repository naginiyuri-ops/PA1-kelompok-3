<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';
    
    protected $fillable = [
        'judul', 'slug', 'konten', 'gambar', 'penulis', 'status', 'views'
    ];

    // ACCESSOR UNTUK URL GAMBAR
    public function getGambarUrlAttribute()
    {
        if (!$this->gambar) {
            return asset('image/default.jpg');
        }

        // Jika sudah URL lengkap
        if (filter_var($this->gambar, FILTER_VALIDATE_URL)) {
            return $this->gambar;
        }

        // Jika path dari image/berita/
        if (file_exists(public_path($this->gambar))) {
            return asset($this->gambar);
        }

        // Jika hanya nama file
        if (file_exists(public_path('image/berita/' . $this->gambar))) {
            return asset('image/berita/' . $this->gambar);
        }

        return asset('image/default.jpg');
    }
}