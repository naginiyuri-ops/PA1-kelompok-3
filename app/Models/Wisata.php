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
        'nama_wisata_en',   // [BARU] Nama wisata versi Inggris
        'tipe_wisata',
        'sejarah',
        'sejarah_en',       // [BARU] Sejarah versi Inggris
        'deskripsi',
        'deskripsi_en',     // [BARU] Deskripsi versi Inggris
        'keunikan',
        'keunikan_en',      // [BARU] Keunikan versi Inggris
        'lokasi',
        'gambar',
        'latitude',
        'longitude',
        'status',
        'views',
    ];
    
    protected $casts = [
        'status'    => 'boolean',
        'latitude'  => 'double',
        'longitude' => 'double',
    ];
    
    // =========================================================================
    // RELASI
    // =========================================================================

    /** Relasi ke model Admin */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    
    // =========================================================================
    // ACCESSORS DINAMIS (otomatis memilih bahasa yang aktif)
    // =========================================================================

    /**
     * Mengembalikan nama wisata sesuai locale aktif.
     * Fallback ke Bahasa Indonesia jika versi Inggris kosong.
     */
    public function getNamaWisataTransAttribute(): string
    {
        if (app()->getLocale() === 'en' && ! empty($this->nama_wisata_en)) {
            return $this->nama_wisata_en;
        }
        return $this->nama_wisata ?? '';
    }

    /**
     * Mengembalikan deskripsi sesuai locale aktif.
     * Fallback ke Bahasa Indonesia jika versi Inggris kosong.
     */
    public function getDeskripsiTransAttribute(): string
    {
        if (app()->getLocale() === 'en' && ! empty($this->deskripsi_en)) {
            return $this->deskripsi_en;
        }
        return $this->deskripsi ?? '';
    }

    /**
     * Mengembalikan sejarah sesuai locale aktif.
     */
    public function getSejarahTransAttribute(): string
    {
        if (app()->getLocale() === 'en' && ! empty($this->sejarah_en)) {
            return $this->sejarah_en;
        }
        return $this->sejarah ?? '';
    }

    /**
     * Mengembalikan keunikan sesuai locale aktif.
     */
    public function getKeunikanTransAttribute(): string
    {
        if (app()->getLocale() === 'en' && ! empty($this->keunikan_en)) {
            return $this->keunikan_en;
        }
        return $this->keunikan ?? '';
    }

    // =========================================================================
    // ACCESSOR GAMBAR
    // =========================================================================

    /** Accessor untuk URL gambar */
    public function getGambarUrlAttribute(): string
    {
        if (empty($this->gambar)) {
            return asset('image/wisata/default.jpg');
        }
        if (file_exists(public_path($this->gambar))) {
            return asset($this->gambar);
        }
        return asset('image/wisata/default.jpg');
    }
    
    // =========================================================================
    // SCOPES
    // =========================================================================

    /** Scope filter by tipe */
    public function scopeByTipe($query, $tipe)
    {
        return $query->where('tipe_wisata', $tipe);
    }
    
    /** Scope aktif */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}