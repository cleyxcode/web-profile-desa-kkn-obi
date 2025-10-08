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
            'nama_sd' => 'SD Negeri 1 Ocimalaleo, SD Negeri 2 Ocimalaleo',
            'jumlah_smp' => 1,
            'nama_smp' => 'SMP Negeri 1 Obi',
            'jumlah_sma' => 1,
            'nama_sma' => 'SMA Negeri 1 Obi',
            
            // ⛪ Tempat Ibadah
            'jumlah_gereja' => 2,
            'nama_gereja' => 'Gereja Protestan Maluku (GPM) Ocimalaleo, Gereja Katolik Santo Yoseph',
            'jumlah_masjid' => 3,
            'nama_masjid' => 'Masjid Al-Ikhlas, Masjid Nurul Huda, Masjid Baitul Amin',
            
            // 🏥 Fasilitas Kesehatan
            'jumlah_puskesmas' => 1,
            'nama_puskesmas' => 'Puskesmas Pembantu Ocimalaleo',
            'jumlah_posyandu' => 4,
            
            // 🌍 Data Wilayah
            'luas_wilayah' => 12.45,
            'batas_wilayah' => 'Utara: Desa Kawasi, Selatan: Laut Maluku, Timur: Desa Wayaloar, Barat: Selat Obi',
            'mata_pencaharian_utama' => 'Pertanian (kelapa, pala, cengkeh), Perikanan, dan Perdagangan',
            
            // 🏆 Produk Unggulan
            'produk_unggulan' => '
                1. Kelapa - Pertanian - Kelapa berkualitas tinggi dengan hasil melimpah - produk/kelapa.jpg
                2. Pala - Pertanian - Pala premium khas Maluku dengan aroma khas - produk/pala.jpg
                3. Cengkeh - Pertanian - Cengkeh asli Maluku berkualitas ekspor - produk/cengkeh.jpg
                4. Ikan Laut Segar - Perikanan - Hasil tangkapan segar dari laut Maluku - produk/ikan-laut.jpg
                5. Kerajinan Anyaman - Kerajinan - Kerajinan tangan anyaman dari bahan lokal - produk/anyaman.jpg
                6. Madu Hutan - Hasil Hutan - Madu asli dari hutan Pulau Obi - produk/madu.jpg
            ',
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
