<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    
    protected $table = 'wisata';
    protected $primaryKey = 'id_wisata';
    
    protected $fillable = [
        'admin_id',
        'nama_wisata',
        'tipe_wisata',
        'sejarah',
        'deskripsi',
        'keunikan',
        'lokasi',
        'gambar',
        'latitude',
        'longitude',
        'status',
        'views',
    ];
    
    protected $casts = [
        'status' => 'boolean',
        'latitude' => 'double',
        'longitude' => 'double',
    ];
    
    // Relasi ke Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    
    // Accessor untuk URL gambar
    public function getGambarUrlAttribute()
    {
        if (empty($this->gambar)) {
            return asset('image/wisata/default.jpg');
        }
        
        if (file_exists(public_path($this->gambar))) {
            return asset($this->gambar);
        }
        
        return asset('image/wisata/default.jpg');
    }
    
    // Scope filter by tipe
    public function scopeByTipe($query, $tipe)
    {
        return $query->where('tipe_wisata', $tipe);
    }
    
    // Scope aktif
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}