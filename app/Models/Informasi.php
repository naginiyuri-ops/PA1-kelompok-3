<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    // PERBAIKAN: Ganti dari 'informasi' menjadi 'informasis'
    protected $table = 'informasis';
    
    protected $fillable = [
        'judul', 
        'slug', 
        'konten', 
        'gambar', 
        'status', 
        'urutan', 
        'views',
        'geosite'  // Tambahkan geosite jika ada
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

        // Jika path dari image/informasi/
        if (file_exists(public_path($this->gambar))) {
            return asset($this->gambar);
        }

        // Jika hanya nama file
        if (file_exists(public_path('image/informasi/' . $this->gambar))) {
            return asset('image/informasi/' . $this->gambar);
        }

        // Jika dari storage (data lama)
        if (file_exists(public_path('storage/' . $this->gambar))) {
            return asset('storage/' . $this->gambar);
        }

        return asset('image/default.jpg');
    }

    // SCOPES untuk filter
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeByGeosite($query, $geosite)
    {
        return $query->where('geosite', $geosite);
    }

    // MUTATOR untuk slug otomatis
    public function setJudulAttribute($value)
    {
        $this->attributes['judul'] = $value;
        $this->attributes['slug'] = \Illuminate\Support\Str::slug($value);
    }
}