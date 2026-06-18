<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SejarahWisata extends Model
{
    use HasFactory;

    protected $table = 'sejarah_wisata';

    protected $fillable = [
        'judul', 'slug', 'geosite', 'kategori', 'konten', 
        'gambar', 'lokasi', 'penulis', 'status', 'views'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    // Accessor untuk gambar
    public function getGambarUrlAttribute()
    {
        if (!$this->gambar) {
            return asset('image/default.jpg');
        }
        if (filter_var($this->gambar, FILTER_VALIDATE_URL)) {
            return $this->gambar;
        }
        if (file_exists(public_path($this->gambar))) {
            return asset($this->gambar);
        }
        if (file_exists(public_path('image/sejarah/' . $this->gambar))) {
            return asset('image/sejarah/' . $this->gambar);
        }
        return asset('image/default.jpg');
    }

    // Auto generate slug
    public function setJudulAttribute($value)
    {
        $this->attributes['judul'] = $value;
        $this->attributes['slug'] = Str::slug($value) . '-' . time();
    }

    // Scope aktif
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    // Scope by geosite
    public function scopeByGeosite($query, $geosite)
    {
        return $query->where('geosite', $geosite);
    }

    // Scope by kategori
    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // Helper untuk mendapatkan label geosite
    public function getGeositeLabelAttribute()
    {
        $labels = [
            'balige' => 'Balige',
            'meat' => 'Meat',
            'batu-basiha' => 'Batu Basiha',
            'liang-sipege' => 'Liang Sipege'
        ];
        return $labels[$this->geosite] ?? $this->geosite;
    }

    // Helper untuk mendapatkan label kategori
    public function getKategoriLabelAttribute()
    {
        $labels = [
            'sejarah' => 'Sejarah',
            'legenda' => 'Legenda',
            'budaya' => 'Budaya',
            'informasi' => 'Informasi',
            'tokoh' => 'Tokoh'
        ];
        return $labels[$this->kategori] ?? $this->kategori;
    }
}