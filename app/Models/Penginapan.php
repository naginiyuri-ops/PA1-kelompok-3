<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    use HasFactory;

    protected $table = 'penginapan';
    
    protected $fillable = [
        'nama', 'deskripsi', 'gambar', 'urutan', 'harga', 'lokasi', 'kontak', 'status'
    ];

    public function getGambarUrlAttribute()
    {
        if (!$this->gambar) {
            return asset('image/meat/slide2.jpg');
        }
        return asset('storage/' . $this->gambar);
    }
}