<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $fillable = [
        'user_id', // ← Pastikan ini ada
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