<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfilDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profil_desa')->insert([
            // Informasi Dasar Desa
            'nama_desa' => 'Ocimalaleo',
            'kecamatan' => 'Obi',
            'kabupaten' => 'Halmahera Selatan',
            'provinsi' => 'Maluku Utara',
            'kode_pos' => '97782',
            'alamat' => 'Jl. Trans Obi',
            'email' => 'desa.ocimalaleo@gmail.com',
            'kontak' => '082198765432', // Pakai 'kontak', bukan 'telepon'
            'website' => 'https://ocimalaleo-desa.id',
            'tagline' => 'Desa Maju, Mandiri, dan Sejahtera',
            
            // Kepala Desa
            'nama_kepala_desa' => 'Ahmad Hidayat, S.Sos',
            'nip_kepala_desa' => '197505152005011003',
            'foto_kepala_desa' => 'kepala-desa/ahmad-hidayat.jpg',
            'masa_jabatan_mulai' => '2021-08-17',
            'masa_jabatan_selesai' => '2027-08-16',
            
            // Sambutan (opsional)
            'sambutan_kepala_desa' => 'Assalamualaikum Warahmatullahi Wabarakatuh. Selamat datang di website resmi Desa Ocimalaleo. Semoga website ini dapat memberikan informasi yang bermanfaat bagi masyarakat dan meningkatkan transparansi pemerintahan desa.',
            
            // Visi Misi
            'visi' => 'Terwujudnya Desa Ocimalaleo yang Maju, Mandiri, Sejahtera, dan Berbudaya Berbasis Potensi Lokal',
            'misi' => json_encode([
                'Meningkatkan kualitas pelayanan publik yang profesional dan transparan',
                'Mengembangkan potensi ekonomi lokal berbasis pertanian, perikanan, dan pariwisata',
                'Meningkatkan kualitas pendidikan dan kesehatan masyarakat',
                'Memperkuat nilai-nilai budaya lokal dan kearifan lokal',
                'Mengembangkan infrastruktur desa yang berkelanjutan',
                'Memberdayakan masyarakat melalui pelatihan dan pendampingan'
            ]),
            
            // Sejarah (gunakan 'sejarah', bukan 'sejarah_singkat')
            'sejarah' => 'Desa Ocimalaleo merupakan salah satu desa di Pulau Obi, Kabupaten Halmahera Selatan. Nama Ocimalaleo berasal dari bahasa lokal yang berarti "Air Jernih yang Mengalir". Desa ini didirikan pada tahun 1965 oleh sekelompok masyarakat yang bermigrasi dari pulau-pulau sekitar. Seiring perkembangan waktu, Desa Ocimalaleo berkembang menjadi pusat aktivitas ekonomi dan sosial di wilayah Pulau Obi bagian selatan.',
            
            // Wilayah Administratif
            'jumlah_dusun' => 4,
            'jumlah_rt' => 12,
            'jumlah_rw' => 4,
            
            // Lokasi & Geografis
            'latitude' => -1.5845,
            'longitude' => 127.4920,
            'zoom_level' => 13,
            'luas_wilayah' => 12.45,
            'ketinggian' => 25,
            
            // Media Sosial
            'facebook' => 'https://facebook.com/desaocimalaleo',
            'instagram' => 'https://instagram.com/desa_ocimalaleo',
            'twitter' => null,
            'youtube' => 'https://youtube.com/@desaocimalaleo',
            'tiktok' => '@desaocimalaleo',
            
            // Video Profil
            'video_profil_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'video_profil_deskripsi' => 'Video profil Desa Ocimalaleo yang menampilkan keindahan alam dan potensi desa',
            
            // Galeri
            'galeri' => json_encode([
                'kantor-desa.jpg',
                'pantai-ocimalaleo.jpg',
                'pertanian-pala.jpg',
                'upacara-adat.jpg',
                'pelabuhan-nelayan.jpg'
            ]),
            
            // Media/Images (opsional)
            'banner' => null,
            'logo_desa' => null,
            'struktur_image' => null,
            'struktur_pemerintahan' => null,
            
            // Status
            'is_published' => true,
            
            // Timestamps
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}