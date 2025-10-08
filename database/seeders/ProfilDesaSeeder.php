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
        DB::table('profil_desas')->insert([
            'nama_desa' => 'Ocimalaleo',
            'kecamatan' => 'Obi',
            'kabupaten' => 'Halmahera Selatan',
            'provinsi' => 'Maluku Utara',
            'kode_pos' => '97782',
            'alamat' => 'Jl. Trans Obi',
            'email' => 'desa.ocimalaleo@gmail.com',
            'telepon' => '082198765432',
            'website' => 'https://ocimalaleo-desa.id',
            
            // Kepala Desa
            'nama_kepala_desa' => 'Ahmad Hidayat, S.Sos',
            'nip_kepala_desa' => '197505152005011003',
            'foto_kepala_desa' => 'kepala-desa/ahmad-hidayat.jpg',
            
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
            
            // Sejarah
            'sejarah_singkat' => 'Desa Ocimalaleo merupakan salah satu desa di Pulau Obi, Kabupaten Halmahera Selatan. Nama Ocimalaleo berasal dari bahasa lokal yang berarti "Air Jernih yang Mengalir". Desa ini didirikan pada tahun 1965 oleh sekelompok masyarakat yang bermigrasi dari pulau-pulau sekitar. Seiring perkembangan waktu, Desa Ocimalaleo berkembang menjadi pusat aktivitas ekonomi dan sosial di wilayah Pulau Obi bagian selatan.',
            
            // Profil
            'deskripsi' => 'Desa Ocimalaleo terletak di Pulau Obi, Kabupaten Halmahera Selatan, Provinsi Maluku Utara. Desa ini memiliki potensi alam yang luar biasa dengan hutan tropis, pantai yang indah, dan kekayaan laut yang melimpah. Mayoritas penduduk bermata pencaharian sebagai petani, nelayan, dan pedagang. Desa Ocimalaleo juga dikenal dengan hasil bumi seperti kelapa, pala, dan cengkeh.',
            
            'jumlah_penduduk' => 2456,
            'jumlah_kk' => 687,
            'jumlah_dusun' => 4,
            'jumlah_rt' => 12,
            'jumlah_rw' => 4,
            
            // Lokasi & Geografis
            'latitude' => -1.5845,
            'longitude' => 127.4920,
            'zoom_level' => 13,
            'luas_wilayah' => 12.45,
            'ketinggian' => 25,
            
            'batas_utara' => 'Desa Kawasi',
            'batas_selatan' => 'Laut Maluku',
            'batas_timur' => 'Desa Wayaloar',
            'batas_barat' => 'Selat Obi',
            
            // Media Sosial
            'facebook' => 'https://facebook.com/desaocimalaleo',
            'instagram' => 'https://instagram.com/desa_ocimalaleo',
            'twitter' => null,
            'youtube' => 'https://youtube.com/@desaocimalaleo',
            'tiktok' => '@desaocimalaleo',
            
            'video_profil_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            
            // Masa Jabatan Kepala Desa
            'masa_jabatan_mulai' => Carbon::parse('2021-08-17'),
            'masa_jabatan_selesai' => Carbon::parse('2027-08-16'),
            
            // Galeri
            'galeri' => json_encode([
                'kantor-desa.jpg',
                'pantai-ocimalaleo.jpg',
                'pertanian-pala.jpg',
                'upacara-adat.jpg',
                'pelabuhan-nelayan.jpg'
            ]),
            
            'is_published' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}