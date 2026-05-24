<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';
    
    protected $fillable = [
        'nama',
        'deskripsi',
        'kontak',     // ← TAMBAHKAN INI
        'gambar',
        'harga',
        'urutan',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'urutan' => 'integer'
    ];

    public function getGambarUrlAttribute()
    {
        if ($this->gambar && Storage::disk('public')->exists($this->gambar)) {
            return asset('storage/' . $this->gambar);
        }
        return asset('image/meat/slide3.jpg');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}