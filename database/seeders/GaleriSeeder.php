<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galeri = [
            [
                'judul' => 'Kantor Desa Ocimalaleo',
                'gambar' => 'galeri/kantor-desa-ocimalaleo.jpg',
                'deskripsi' => 'Kantor Desa Ocimalaleo yang menjadi pusat pemerintahan dan pelayanan masyarakat. Kantor ini dilengkapi dengan ruang pelayanan, ruang kepala desa, ruang rapat, dan fasilitas penunjang lainnya.',
            ],
            [
                'judul' => 'Pantai Ocimalaleo',
                'gambar' => 'galeri/pantai-ocimalaleo.jpg',
                'deskripsi' => 'Keindahan pantai Ocimalaleo dengan pasir putih dan air laut yang jernih. Pantai ini menjadi salah satu destinasi wisata unggulan dan tempat rekreasi favorit warga.',
            ],
            [
                'judul' => 'Perkebunan Pala',
                'gambar' => 'galeri/perkebunan-pala.jpg',
                'deskripsi' => 'Perkebunan pala yang menjadi komoditas unggulan Desa Ocimalaleo. Pala yang dihasilkan memiliki kualitas ekspor dengan aroma yang khas dan kandungan minyak atsiri yang tinggi.',
            ],
            [
                'judul' => 'Aktivitas Nelayan',
                'gambar' => 'galeri/aktivitas-nelayan.jpg',
                'deskripsi' => 'Para nelayan Desa Ocimalaleo sedang mempersiapkan perahu untuk melaut. Perikanan menjadi salah satu sumber mata pencaharian utama masyarakat dengan hasil tangkapan ikan cakalang dan tuna.',
            ],
            [
                'judul' => 'Pasar Tradisional Desa',
                'gambar' => 'galeri/pasar-desa.jpg',
                'deskripsi' => 'Suasana pasar tradisional Desa Ocimalaleo yang ramai dengan aktivitas jual beli. Berbagai hasil bumi dan laut diperdagangkan di pasar ini setiap hari.',
            ],
            [
                'judul' => 'Masjid Al-Ikhlas',
                'gambar' => 'galeri/masjid-al-ikhlas.jpg',
                'deskripsi' => 'Masjid Al-Ikhlas yang menjadi pusat kegiatan keagamaan umat Islam di Desa Ocimalaleo. Masjid ini dapat menampung hingga 500 jamaah dan dilengkapi dengan fasilitas wudhu yang memadai.',
            ],
            [
                'judul' => 'SDN 1 Ocimalaleo',
                'gambar' => 'galeri/sdn-1-ocimalaleo.jpg',
                'deskripsi' => 'Gedung SDN 1 Ocimalaleo yang menjadi tempat pendidikan bagi anak-anak desa. Sekolah ini memiliki 6 ruang kelas dan dilengkapi dengan perpustakaan serta lapangan olahraga.',
            ],
            [
                'judul' => 'Festival Budaya Obi',
                'gambar' => 'galeri/festival-budaya.jpg',
                'deskripsi' => 'Penampilan tarian tradisional pada Festival Budaya Obi yang diselenggarakan di Desa Ocimalaleo. Festival ini menampilkan berbagai kesenian dan budaya lokal Maluku Utara.',
            ],
            [
                'judul' => 'Panen Raya Pala',
                'gambar' => 'galeri/panen-pala.jpg',
                'deskripsi' => 'Momen panen raya pala yang menjadi kebanggaan petani Desa Ocimalaleo. Panen kali ini menghasilkan 15 ton pala kering dengan kualitas premium.',
            ],
            [
                'judul' => 'Posyandu Balita',
                'gambar' => 'galeri/posyandu-balita.jpg',
                'deskripsi' => 'Kegiatan posyandu balita yang rutin dilaksanakan setiap bulan. Posyandu ini memberikan pelayanan imunisasi, penimbangan, dan konsultasi kesehatan ibu dan anak.',
            ],
            [
                'judul' => 'Jalan Desa yang Baru',
                'gambar' => 'galeri/jalan-desa-baru.jpg',
                'deskripsi' => 'Jalan desa yang baru selesai dibangun menggunakan Dana Desa. Pembangunan infrastruktur ini memperlancar akses warga dan distribusi hasil pertanian.',
            ],
            [
                'judul' => 'Sunset di Pelabuhan',
                'gambar' => 'galeri/sunset-pelabuhan.jpg',
                'deskripsi' => 'Pemandangan sunset yang indah di pelabuhan nelayan Desa Ocimalaleo. Lokasi ini menjadi spot favorit untuk menikmati sore hari dengan view laut yang menakjubkan.',
            ],
            [
                'judul' => 'Kelompok Tani Makmur Jaya',
                'gambar' => 'galeri/kelompok-tani.jpg',
                'deskripsi' => 'Anggota Kelompok Tani Makmur Jaya sedang mengikuti pelatihan pertanian organik. Kelompok ini aktif mengembangkan inovasi pertanian untuk meningkatkan produktivitas.',
            ],
            [
                'judul' => 'Upacara HUT RI ke-79',
                'gambar' => 'galeri/upacara-hut-ri.jpg',
                'deskripsi' => 'Upacara peringatan HUT RI ke-79 di lapangan Desa Ocimalaleo. Seluruh warga, perangkat desa, dan pelajar mengikuti upacara dengan hikmat.',
            ],
            [
                'judul' => 'Pelatihan Pengolahan Ikan',
                'gambar' => 'galeri/pelatihan-olahan-ikan.jpg',
                'deskripsi' => 'Kelompok nelayan mengikuti pelatihan pengolahan hasil laut menjadi produk bernilai tambah seperti abon ikan, nugget ikan, dan kerupuk ikan.',
            ],
            [
                'judul' => 'Musyawarah Desa',
                'gambar' => 'galeri/musyawarah-desa.jpg',
                'deskripsi' => 'Suasana musyawarah desa untuk membahas program pembangunan tahun 2025. Kegiatan ini dihadiri oleh perangkat desa, BPD, tokoh masyarakat, dan perwakilan dusun.',
            ],
            [
                'judul' => 'Hutan Lindung Ocimalaleo',
                'gambar' => 'galeri/hutan-lindung.jpg',
                'deskripsi' => 'Kawasan hutan lindung yang menjadi paru-paru desa dan sumber mata air bagi masyarakat. Hutan ini dijaga kelestariannya melalui program konservasi desa.',
            ],
            [
                'judul' => 'Pengrajin Anyaman Bambu',
                'gambar' => 'galeri/pengrajin-bambu.jpg',
                'deskripsi' => 'Ibu-ibu pengrajin anyaman bambu sedang membuat produk kerajinan tangan. Anyaman bambu dari Desa Ocimalaleo sudah dipasarkan hingga ke luar daerah.',
            ],
            [
                'judul' => 'Kegiatan Gotong Royong',
                'gambar' => 'galeri/gotong-royong.jpg',
                'deskripsi' => 'Warga bergotong royong membersihkan jalan desa dan saluran air. Budaya gotong royong masih kental dipraktikkan oleh masyarakat Desa Ocimalaleo.',
            ],
            [
                'judul' => 'Perahu Tradisional Nelayan',
                'gambar' => 'galeri/perahu-tradisional.jpg',
                'deskripsi' => 'Perahu tradisional yang masih digunakan nelayan untuk melaut. Perahu ini dibuat dengan teknik tradisional yang diwariskan turun temurun.',
            ],
            [
                'judul' => 'Puskesmas Pembantu',
                'gambar' => 'galeri/puskesmas-pembantu.jpg',
                'deskripsi' => 'Gedung Puskesmas Pembantu Ocimalaleo yang memberikan pelayanan kesehatan dasar kepada masyarakat. Fasilitas ini buka setiap hari kerja.',
            ],
            [
                'judul' => 'Anak-anak Bermain di Pantai',
                'gambar' => 'galeri/anak-bermain-pantai.jpg',
                'deskripsi' => 'Keceriaan anak-anak Desa Ocimalaleo bermain di pantai saat sore hari. Pantai menjadi tempat rekreasi alami yang aman dan menyenangkan.',
            ],
            [
                'judul' => 'Kebun Cengkeh',
                'gambar' => 'galeri/kebun-cengkeh.jpg',
                'deskripsi' => 'Kebun cengkeh yang sedang berbunga. Cengkeh menjadi salah satu komoditas ekspor unggulan desa dengan harga jual yang menguntungkan petani.',
            ],
            [
                'judul' => 'Pemuda Desa Berlatih Musik',
                'gambar' => 'galeri/pemuda-musik.jpg',
                'deskripsi' => 'Para pemuda Desa Ocimalaleo berlatih musik tradisional Totobuang. Mereka aktif melestarikan seni budaya lokal melalui sanggar seni desa.',
            ],
        ];

        foreach ($galeri as $item) {
            DB::table('galeri')->insert([
                'judul' => $item['judul'],
                'gambar' => $item['gambar'],
                'deskripsi' => $item['deskripsi'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}