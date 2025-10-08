<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'gambar',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Get excerpt dari isi berita
     */
    public function getExcerptAttribute()
    {
        return \Illuminate\Support\Str::limit(strip_tags($this->isi), 150);
    }

    /**
     * Get reading time estimate
     */
    public function getReadingTimeAttribute()
    {
        $words = str_word_count(strip_tags($this->isi));
        $minutes = ceil($words / 200); // Average reading speed: 200 words per minute
        
        return $minutes . ' menit';
    }

    /**
     * Scope untuk berita terbaru
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('tanggal', 'desc');
    }

    /**
     * Scope untuk berita tahun tertentu
     */
    public function scopeYear($query, $year)
    {
        return $query->whereYear('tanggal', $year);
    }

    /**
     * Scope untuk berita bulan tertentu
     */
    public function scopeMonth($query, $month)
    {
        return $query->whereMonth('tanggal', $month);
    }
}