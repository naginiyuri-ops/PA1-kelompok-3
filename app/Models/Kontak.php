<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'kontak';

    protected $fillable = [
        'alamat',
        'telepon',
        'email',
        'link_maps',
        'embed_maps'
    ];
}