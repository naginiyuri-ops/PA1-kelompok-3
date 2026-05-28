<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkm';
    
    protected $fillable = [
        'nama', 'deskripsi', 'gambar', 'urutan', 'lokasi', 'kontak', 'status'
    ];

    // Accessor untuk ambil URL gambar
    public function getGambarUrlAttribute()
    {
        if (!$this->gambar) {
            return asset('image/meat/slide1.jpg');
        }
        return asset('storage/' . $this->gambar);
    }
}