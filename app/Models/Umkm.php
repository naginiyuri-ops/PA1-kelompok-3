<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;
    
    protected $table = 'umkm';
    
    protected $fillable = [
        'nama_usaha',
        'pemilik',
        'alamat',
        'no_telepon',
        'deskripsi',
        'foto_utama',
        'status',
    ];
    
    protected $casts = [
        'status' => 'string',
    ];
    
    // Accessor untuk URL foto
    public function getFotoUtamaUrlAttribute()
    {
        if (empty($this->foto_utama)) {
            return asset('image/umkm/default.jpg');
        }
        
        if (file_exists(public_path($this->foto_utama))) {
            return asset($this->foto_utama);
        }
        
        return asset('image/umkm/default.jpg');
    }
    
    // Scope untuk filter status aktif
    public function scopeActive($query)
    {
        return $query->where('status', 'aktif');
    }
    
    // Scope untuk filter status nonaktif
    public function scopeInactive($query)
    {
        return $query->where('status', 'nonaktif');
    }
}