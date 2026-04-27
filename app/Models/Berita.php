<?php
// app/Models/Berita.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    
    protected $fillable = [
        'judul',
        'slug',
        'excerpt',
        'content',
        'gambar',
        'penulis',
        'views',
        'status',
        'tanggal_berita'
    ];

    protected $casts = [
        'status' => 'boolean',
        'tanggal_berita' => 'date'
    ];

    // Auto generate slug
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($berita) {
            $berita->slug = Str::slug($berita->judul);
        });
        
        static::updating(function ($berita) {
            $berita->slug = Str::slug($berita->judul);
        });
    }
    
    // Increment views
    public function incrementViews()
    {
        $this->increment('views');
    }
}