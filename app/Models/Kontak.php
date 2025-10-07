<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontak';

    protected $fillable = [
        'nama',
        'email',
        'pesan',
        'sudah_dibaca',
    ];

    protected $casts = [
        'sudah_dibaca' => 'boolean',
        'created_at' => 'datetime',
    ];

    // Scope untuk filter pesan belum dibaca
    public function scopeBelumDibaca($query)
    {
        return $query->where('sudah_dibaca', false);
    }

    // Scope untuk filter pesan sudah dibaca
    public function scopeSudahDibaca($query)
    {
        return $query->where('sudah_dibaca', true);
    }
}