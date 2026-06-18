<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CulturalDiversity extends Model
{
    use HasFactory;

    protected $table = 'cultural_diversities';

    protected $fillable = [
        'nama', 'slug', 'kategori', 'deskripsi', 'lokasi', 
        'gambar', 'video_url', 'status', 'views'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function getGambarUrlAttribute()
    {
        if (!$this->gambar) return asset('image/default.jpg');
        if (filter_var($this->gambar, FILTER_VALIDATE_URL)) return $this->gambar;
        if (file_exists(public_path($this->gambar))) return asset($this->gambar);
        return asset('image/default.jpg');
    }

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value) . '-' . time();
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}