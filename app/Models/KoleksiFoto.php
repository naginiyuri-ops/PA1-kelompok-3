<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoleksiFoto extends Model
{
    use HasFactory;

    protected $table = 'koleksi_fotos';
    
    protected $fillable = [
        'nama_foto',
        'file_foto'
    ];
    
    // Hapus status karena kolomnya tidak ada
    // protected $casts = [
    //     'status' => 'boolean'
    // ];
    
    public function getBase64Attribute()
    {
        if ($this->file_foto) {
            return 'data:image/jpeg;base64,' . base64_encode($this->file_foto);
        }
        return null;
    }
}