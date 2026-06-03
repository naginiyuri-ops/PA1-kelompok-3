<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Traits\HasUser; // ← Hapus atau komen dulu

class Penginapan extends Model
{
    // use HasUser; // ← Hapus atau komen dulu
    
    protected $table = 'penginapan';
    
    protected $fillable = [
        'user_id',
        'nama',
        'deskripsi',
        'harga',
        'lokasi',
        'kontak',
        'gambar',
        'status',
        'urutan',
        'informasi_id'
    ];
}