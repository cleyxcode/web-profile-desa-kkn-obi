<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ProfilDesa extends Model
{
    use HasFactory;

    protected $table = 'profil_desa';

    protected $fillable = [
        'nama_desa',
        'alamat',
        'kontak',
        'email',
        'website',
        'kode_pos',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'nama_kepala_desa',
        'nip_kepala_desa',
        'masa_jabatan_mulai',
        'masa_jabatan_selesai',
        'foto_kepala_desa',
        'sejarah',
        'visi',
        'misi',
        'struktur_pemerintahan',
        'struktur_image',
        'banner',
        'logo_desa',
        'galeri',
        'video_profil_url',
        'video_profil_deskripsi',
        'latitude',
        'longitude',
        'zoom_level',
        'luas_wilayah',
        'ketinggian',
        'tagline',
        'sambutan_kepala_desa',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'tiktok',
        'is_published',
        'jumlah_dusun',
        'jumlah_rt',
        'jumlah_rw',
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'zoom_level' => 'integer',
        'luas_wilayah' => 'decimal:2',
        'ketinggian' => 'integer',
        'masa_jabatan_mulai' => 'date',
        'masa_jabatan_selesai' => 'date',
        'is_published' => 'boolean',
        'galeri' => 'array',
        'jumlah_dusun' => 'integer',
        'jumlah_rt' => 'integer',
        'jumlah_rw' => 'integer',
    ];

    /**
     * Check if kepala desa masih aktif
     */
    public function getIsKepalaDesaAktifAttribute(): bool
    {
        if (!$this->masa_jabatan_selesai) {
            return true;
        }

        return Carbon::parse($this->masa_jabatan_selesai)->isFuture();
    }

    /**
     * Get sisa masa jabatan dalam hari
     */
    public function getSisaMasaJabatanAttribute(): ?int
    {
        if (!$this->masa_jabatan_selesai) {
            return null;
        }

        $selesai = Carbon::parse($this->masa_jabatan_selesai);
        
        if ($selesai->isPast()) {
            return 0;
        }

        return now()->diffInDays($selesai);
    }

    /**
     * Get YouTube video ID from URL
     */
    public function getYoutubeVideoIdAttribute(): ?string
    {
        if (!$this->video_profil_url) {
            return null;
        }

        // Parse YouTube URL untuk mendapatkan video ID
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $this->video_profil_url, $matches);
        
        return $matches[1] ?? null;
    }

    /**
     * Get embed URL untuk YouTube
     */
    public function getYoutubeEmbedUrlAttribute(): ?string
    {
        $videoId = $this->youtube_video_id;
        
        return $videoId ? "https://www.youtube.com/embed/{$videoId}" : null;
    }

    /**
     * Get alamat lengkap
     */
    public function getAlamatLengkapAttribute(): string
    {
        $parts = array_filter([
            $this->alamat,
            $this->kecamatan ? "Kec. {$this->kecamatan}" : null,
            $this->kabupaten,
            $this->provinsi,
            $this->kode_pos,
        ]);

        return implode(', ', $parts);
    }

    /**
     * Get social media links yang terisi
     */
    public function getSocialMediaAttribute(): array
    {
        return array_filter([
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'youtube' => $this->youtube,
            'tiktok' => $this->tiktok,
        ]);
    }

    /**
     * Scope untuk yang dipublish
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}