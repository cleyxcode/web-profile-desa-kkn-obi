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
        // Hapus data default jika ada
        DB::table('data_desa')->truncate();

        DB::table('data_desa')->insert([
            // Data Kependudukan
            'jumlah_penduduk' => 2456,
            'jumlah_kk' => 687,
            'jumlah_pria' => 1268,
            'jumlah_wanita' => 1188,
            
            // Data Pendidikan - SD
            'jumlah_sd' => 2,
            'nama_sd' => json_encode([
                'SDN 1 Ocimalaleo',
                'SDN 2 Ocimalaleo'
            ]),
            
            // Data Pendidikan - SMP
            'jumlah_smp' => 1,
            'nama_smp' => json_encode([
                'SMPN 1 Obi'
            ]),
            
            // Data Pendidikan - SMA
            'jumlah_sma' => 1,
            'nama_sma' => json_encode([
                'SMAN 1 Obi'
            ]),
            
            // Data Tempat Ibadah - Gereja
            'jumlah_gereja' => 1,
            'nama_gereja' => json_encode([
                'Gereja Protestan Maluku (GPM) Ocimalaleo'
            ]),
            
            // Data Tempat Ibadah - Masjid
            'jumlah_masjid' => 3,
            'nama_masjid' => json_encode([
                'Masjid Al-Ikhlas Ocimalaleo',
                'Masjid Nurul Huda Dusun Timur',
                'Musholla Al-Barokah Dusun Selatan'
            ]),
            
            // Data Fasilitas Kesehatan
            'jumlah_puskesmas' => 1,
            'nama_puskesmas' => json_encode([
                'Puskesmas Pembantu Ocimalaleo'
            ]),
            'jumlah_posyandu' => 4,
            
            // Data Produk Unggulan
            'produk_unggulan' => json_encode([
                [
                    'nama' => 'Pala',
                    'deskripsi' => 'Pala kering berkualitas ekspor dengan aroma khas',
                    'produksi_per_tahun' => '45 ton',
                    'kategori' => 'Pertanian'
                ],
                [
                    'nama' => 'Cengkeh',
                    'deskripsi' => 'Cengkeh kering dengan kadar air rendah',
                    'produksi_per_tahun' => '32 ton',
                    'kategori' => 'Pertanian'
                ],
                [
                    'nama' => 'Kelapa',
                    'deskripsi' => 'Kelapa dalam dan kopra',
                    'produksi_per_tahun' => '120 ton',
                    'kategori' => 'Pertanian'
                ],
                [
                    'nama' => 'Ikan Cakalang',
                    'deskripsi' => 'Ikan cakalang segar dan olahan',
                    'produksi_per_tahun' => '80 ton',
                    'kategori' => 'Perikanan'
                ],
                [
                    'nama' => 'Ikan Tuna',
                    'deskripsi' => 'Ikan tuna berkualitas ekspor',
                    'produksi_per_tahun' => '65 ton',
                    'kategori' => 'Perikanan'
                ],
                [
                    'nama' => 'Kerajinan Anyaman Bambu',
                    'deskripsi' => 'Produk anyaman bambu seperti bakul, nyiru, dan tikar',
                    'produksi_per_tahun' => '500 unit',
                    'kategori' => 'UMKM'
                ],
                [
                    'nama' => 'Abon Ikan',
                    'deskripsi' => 'Abon ikan cakalang dan tongkol',
                    'produksi_per_tahun' => '1200 kg',
                    'kategori' => 'UMKM'
                ],
                [
                    'nama' => 'Dodol Pala',
                    'deskripsi' => 'Oleh-oleh khas desa berbahan pala',
                    'produksi_per_tahun' => '800 kg',
                    'kategori' => 'UMKM'
                ]
            ]),
            
            // Data Ekonomi
            'mata_pencaharian_utama' => json_encode([
                [
                    'jenis' => 'Petani',
                    'jumlah' => 312,
                    'persentase' => 45.4
                ],
                [
                    'jenis' => 'Nelayan',
                    'jumlah' => 189,
                    'persentase' => 27.5
                ],
                [
                    'jenis' => 'Pedagang',
                    'jumlah' => 98,
                    'persentase' => 14.3
                ],
                [
                    'jenis' => 'PNS/ASN',
                    'jumlah' => 45,
                    'persentase' => 6.5
                ],
                [
                    'jenis' => 'Wiraswasta',
                    'jumlah' => 28,
                    'persentase' => 4.1
                ],
                [
                    'jenis' => 'Lainnya',
                    'jumlah' => 15,
                    'persentase' => 2.2
                ]
            ]),
            
            // Data Geografis
            'luas_wilayah' => 1245.50, // dalam hektar
            'batas_wilayah' => json_encode([
                'utara' => 'Desa Kawasi',
                'selatan' => 'Laut Maluku',
                'timur' => 'Desa Wayaloar',
                'barat' => 'Selat Obi',
                'detail' => [
                    'ketinggian' => '0 - 150 mdpl',
                    'topografi' => 'Dataran rendah dengan perbukitan kecil',
                    'jenis_tanah' => 'Tanah laterit dan alluvial',
                    'iklim' => 'Tropis dengan curah hujan 2000-3000 mm/tahun'
                ]
            ]),
            
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}