<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Galeri extends Model
{
    protected $table = 'galeris';
    
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'deskripsi',
        'gambar',
        'lokasi',
        'tanggal_foto',
        'status'
    ];
    
    protected $casts = [
        'status' => 'boolean',
        'tanggal_foto' => 'date'
    ];
    
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($galeri) {
            $galeri->slug = Str::slug($galeri->judul);
        });
        
        static::updating(function ($galeri) {
            $galeri->slug = Str::slug($galeri->judul);
        });
    }
}