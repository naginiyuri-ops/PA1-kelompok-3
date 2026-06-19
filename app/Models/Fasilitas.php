<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    
    protected $table = 'fasilitas';
    
    protected $fillable = [
    'nama',
    'jenis',
    'deskripsi',
    'harga',
    'lokasi',
    'kontak',
    'urutan',
    'status',
    'gambar',
    ];
    
    protected $casts = [
        'status' => 'boolean',
    ];
    
    // Accessor untuk mendapatkan URL gambar
    public function getGambarUrlAttribute()
    {
        if (empty($this->gambar)) {
            return asset('image/fasilitas/default.jpg');
        }
        
        if (str_starts_with($this->gambar, 'data:image')) {
            return $this->gambar;
        }
        
        if (str_starts_with($this->gambar, 'http')) {
            return $this->gambar;
        }
        
        if (str_starts_with($this->gambar, 'storage/')) {
            return asset($this->gambar);
        }
        
        if (file_exists(public_path($this->gambar))) {
            return asset($this->gambar);
        }
        
        return asset('image/fasilitas/default.jpg');
    }
}