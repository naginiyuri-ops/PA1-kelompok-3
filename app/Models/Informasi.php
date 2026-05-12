<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Informasi extends Model
{
    protected $table = 'informasi';
    
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'status'
    ];
    
    protected $casts = [
        'status' => 'boolean'
    ];
    
    public $timestamps = true;
    
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($informasi) {
            $informasi->slug = Str::slug($informasi->judul);
        });
        
        static::updating(function ($informasi) {
            $informasi->slug = Str::slug($informasi->judul);
        });
    }
    
    // Accessor untuk mendapatkan URL gambar
    public function getGambarUrlAttribute()
    {
        if ($this->gambar && !Str::startsWith($this->gambar, 'data:image')) {
            return asset('storage/' . $this->gambar);
        }
        return asset('image/default.jpg');
    }
}