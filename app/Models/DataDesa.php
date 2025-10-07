<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDesa extends Model
{
    use HasFactory;

    protected $table = 'data_desa';

    protected $fillable = [
        'jumlah_penduduk',
        'jumlah_kk',
        'jumlah_pria',
        'jumlah_wanita',
        'jumlah_sd',
        'nama_sd',
        'jumlah_smp',
        'nama_smp',
        'jumlah_sma',
        'nama_sma',
        'jumlah_gereja',
        'nama_gereja',
        'jumlah_masjid',
        'nama_masjid',
        'jumlah_puskesmas',
        'nama_puskesmas',
        'jumlah_posyandu',
        'produk_unggulan',
        'mata_pencaharian_utama',
        'luas_wilayah',
        'batas_wilayah',
    ];

    protected $casts = [
        'jumlah_penduduk' => 'integer',
        'jumlah_kk' => 'integer',
        'jumlah_pria' => 'integer',
        'jumlah_wanita' => 'integer',
        'jumlah_sd' => 'integer',
        'jumlah_smp' => 'integer',
        'jumlah_sma' => 'integer',
        'jumlah_gereja' => 'integer',
        'jumlah_masjid' => 'integer',
        'jumlah_puskesmas' => 'integer',
        'jumlah_posyandu' => 'integer',
        'produk_unggulan' => 'array',
        'batas_wilayah' => 'array',
        'luas_wilayah' => 'decimal:2',
    ];

    /**
     * Get produk unggulan yang aktif
     */
    public function getProdukUnggulanAktifAttribute()
    {
        if (!$this->produk_unggulan) {
            return collect();
        }

        return collect($this->produk_unggulan)->where('is_active', true);
    }

    /**
     * Get total produk unggulan
     */
    public function getTotalProdukUnggulanAttribute()
    {
        return $this->produk_unggulan ? count($this->produk_unggulan) : 0;
    }
}