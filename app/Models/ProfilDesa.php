<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    use HasFactory;

    protected $table = 'profil_desa';

    protected $fillable = [
        'nama_desa',
        'sejarah',
        'struktur_pemerintahan',
        'banner',
        'struktur_image',
        'visi',
        'misi',
        'alamat',
        'kontak',
        'latitude',
        'longitude',
        'zoom_level',
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'zoom_level' => 'integer',
    ];
}