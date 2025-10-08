<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama agar tidak duplikat
        DB::table('data_desa')->truncate();

        DB::table('data_desa')->insert([
            // 🧍‍♂️ Data Kependudukan
            'jumlah_penduduk' => 2456,
            'jumlah_kk' => 687,
            'jumlah_pria' => 1234,
            'jumlah_wanita' => 1222,
            
            // 🏫 Fasilitas Pendidikan
            'jumlah_sd' => 2,
            'nama_sd' => json_encode(['SD Negeri 1 Ocimalaleo', 'SD Negeri 2 Ocimalaleo']),
            'jumlah_smp' => 1,
            'nama_smp' => json_encode(['SMP Negeri 1 Obi']),
            'jumlah_sma' => 1,
            'nama_sma' => json_encode(['SMA Negeri 1 Obi']),
            
            // ⛪ Tempat Ibadah
            'jumlah_gereja' => 2,
            'nama_gereja' => json_encode([
                'Gereja Protestan Maluku (GPM) Ocimalaleo',
                'Gereja Katolik Santo Yoseph'
            ]),
            'jumlah_masjid' => 3,
            'nama_masjid' => json_encode([
                'Masjid Al-Ikhlas',
                'Masjid Nurul Huda',
                'Masjid Baitul Amin'
            ]),
            
            // 🏥 Fasilitas Kesehatan
            'jumlah_puskesmas' => 1,
            'nama_puskesmas' => json_encode(['Puskesmas Pembantu Ocimalaleo']),
            'jumlah_posyandu' => 4,
            
            // 🌍 Data Wilayah
            'luas_wilayah' => 12.45,
            'batas_wilayah' => json_encode([
                'Utara' => 'Desa Kawasi',
                'Selatan' => 'Laut Maluku',
                'Timur' => 'Desa Wayaloar',
                'Barat' => 'Selat Obi',
            ]),
            'mata_pencaharian_utama' => 'Pertanian (kelapa, pala, cengkeh), Perikanan, dan Perdagangan',
            
            // 🏆 Produk Unggulan
            'produk_unggulan' => json_encode([
                [
                    'nama_produk' => 'Kelapa',
                    'kategori' => 'Pertanian',
                    'deskripsi' => 'Kelapa berkualitas tinggi dengan hasil melimpah.',
                    'gambar' => 'produk/kelapa.jpg',
                    'is_active' => true
                ],
                [
                    'nama_produk' => 'Pala',
                    'kategori' => 'Pertanian',
                    'deskripsi' => 'Pala premium khas Maluku dengan aroma khas.',
                    'gambar' => 'produk/pala.jpg',
                    'is_active' => true
                ],
                [
                    'nama_produk' => 'Cengkeh',
                    'kategori' => 'Pertanian',
                    'deskripsi' => 'Cengkeh asli Maluku berkualitas ekspor.',
                    'gambar' => 'produk/cengkeh.jpg',
                    'is_active' => true
                ],
                [
                    'nama_produk' => 'Ikan Laut Segar',
                    'kategori' => 'Perikanan',
                    'deskripsi' => 'Hasil tangkapan segar dari laut Maluku.',
                    'gambar' => 'produk/ikan-laut.jpg',
                    'is_active' => true
                ],
                [
                    'nama_produk' => 'Kerajinan Anyaman',
                    'kategori' => 'Kerajinan',
                    'deskripsi' => 'Kerajinan tangan anyaman dari bahan lokal.',
                    'gambar' => 'produk/anyaman.jpg',
                    'is_active' => true
                ],
                [
                    'nama_produk' => 'Madu Hutan',
                    'kategori' => 'Hasil Hutan',
                    'deskripsi' => 'Madu asli dari hutan Pulau Obi.',
                    'gambar' => 'produk/madu.jpg',
                    'is_active' => true
                ],
            ]),
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
