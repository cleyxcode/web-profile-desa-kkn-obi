<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $berita = [
            [
                'judul' => 'Musyawarah Desa Membahas Program Pembangunan 2025',
                'isi' => 'Desa Ocimalaleo menggelar Musyawarah Desa (Musdes) untuk membahas program pembangunan tahun 2025. Kegiatan yang dihadiri oleh seluruh perangkat desa, BPD, tokoh masyarakat, dan perwakilan dusun ini membahas prioritas pembangunan infrastruktur desa seperti perbaikan jalan desa, pembangunan sarana air bersih, dan peningkatan fasilitas pendidikan.

Kepala Desa Ocimalaleo, Ahmad Hidayat, S.Sos menyampaikan bahwa pembangunan akan difokuskan pada peningkatan kesejahteraan masyarakat. "Kita akan prioritaskan program yang langsung menyentuh kebutuhan masyarakat, seperti perbaikan infrastruktur dan pemberdayaan ekonomi," ujarnya.

Musdes juga membahas alokasi Dana Desa yang akan digunakan untuk berbagai program pembangunan dan pemberdayaan masyarakat. Diharapkan dengan musyawarah ini, program pembangunan dapat berjalan sesuai dengan kebutuhan dan aspirasi masyarakat Desa Ocimalaleo.',
                'tanggal' => Carbon::now()->subDays(5),
                'gambar' => 'berita/musyawarah-desa-2025.jpg',
            ],
            [
                'judul' => 'Panen Raya Pala di Desa Ocimalaleo Capai 15 Ton',
                'isi' => 'Petani Desa Ocimalaleo merayakan panen raya pala dengan hasil mencapai 15 ton. Panen kali ini dinilai sangat memuaskan karena cuaca yang mendukung dan perawatan tanaman yang optimal.

Ketua Kelompok Tani "Makmur Jaya", Bapak Rahman, mengatakan bahwa harga pala saat ini cukup bagus di pasaran. "Alhamdulillah, harga pala sedang bagus. Petani bisa mendapatkan hasil yang lumayan untuk memenuhi kebutuhan keluarga," jelasnya.

Pemerintah Desa Ocimalaleo terus mendorong pengembangan pertanian pala sebagai salah satu komoditas unggulan. Berbagai pelatihan dan pendampingan telah diberikan kepada petani untuk meningkatkan kualitas dan produktivitas hasil panen. Selain pala, desa ini juga mengembangkan komoditas cengkeh dan kelapa sebagai sumber ekonomi masyarakat.',
                'tanggal' => Carbon::now()->subDays(12),
                'gambar' => 'berita/panen-pala.jpg',
            ],
            [
                'judul' => 'Posyandu Remaja Diluncurkan untuk Tingkatkan Kesehatan Generasi Muda',
                'isi' => 'Puskesmas Obi bekerja sama dengan Pemerintah Desa Ocimalaleo meluncurkan program Posyandu Remaja. Program ini bertujuan untuk meningkatkan kesadaran remaja tentang pentingnya kesehatan reproduksi, gizi, dan pola hidup sehat.

Kegiatan perdana Posyandu Remaja diikuti oleh 45 remaja usia 12-18 tahun dari berbagai dusun di Desa Ocimalaleo. Mereka mendapatkan pemeriksaan kesehatan gratis, penyuluhan tentang bahaya narkoba dan pergaulan bebas, serta edukasi gizi seimbang.

Bidan Desa, Ibu Siti Fatimah, menjelaskan bahwa Posyandu Remaja akan digelar setiap bulan. "Kami ingin memastikan generasi muda kita tumbuh sehat dan memiliki pengetahuan yang baik tentang kesehatan. Program ini juga menjadi wadah konseling bagi remaja yang membutuhkan," ujarnya.

Kepala Desa mengapresiasi program ini dan berharap partisipasi remaja terus meningkat. Posyandu Remaja akan menjadi salah satu program unggulan desa dalam bidang kesehatan.',
                'tanggal' => Carbon::now()->subDays(20),
                'gambar' => 'berita/posyandu-remaja.jpg',
            ],
            [
                'judul' => 'Festival Budaya Obi Memukau Ribuan Pengunjung',
                'isi' => 'Desa Ocimalaleo menjadi tuan rumah Festival Budaya Obi yang diikuti oleh seluruh desa di Kecamatan Obi. Festival yang berlangsung selama tiga hari ini menampilkan berbagai atraksi budaya, tarian tradisional, kuliner khas, dan pameran kerajinan lokal.

Acara dibuka dengan pawai budaya yang melibatkan ratusan peserta mengenakan pakaian adat. Pengunjung dapat menyaksikan pertunjukan tari Cakalele, musik tradisional Totobuang, dan berbagai seni budaya Maluku Utara lainnya.

Bupati Halmahera Selatan yang hadir sebagai tamu kehormatan mengapresiasi penyelenggaraan festival ini. "Festival budaya seperti ini sangat penting untuk melestarikan warisan budaya kita. Saya bangga dengan Desa Ocimalaleo yang mampu menyelenggarakan acara berkelas," ujarnya.

Selain pertunjukan seni, festival juga menggelar bazar kuliner dan UMKM lokal. Berbagai produk olahan hasil laut, rempah-rempah, dan kerajinan tangan dipamerkan dan dijual. Festival Budaya Obi ditutup dengan malam puncak berupa konser musik daerah dan kembang api.',
                'tanggal' => Carbon::now()->subDays(28),
                'gambar' => 'berita/festival-budaya-obi.jpg',
            ],
            [
                'judul' => 'Pelatihan Pengolahan Hasil Laut untuk Kelompok Nelayan',
                'isi' => 'Dinas Kelautan dan Perikanan Kabupaten Halmahera Selatan menggelar pelatihan pengolahan hasil laut bagi kelompok nelayan Desa Ocimalaleo. Pelatihan ini bertujuan meningkatkan nilai tambah produk perikanan dan membuka peluang usaha baru bagi masyarakat pesisir.

Sebanyak 30 peserta dari kelompok nelayan mengikuti pelatihan pembuatan berbagai produk olahan seperti abon ikan, kerupuk ikan, nugget ikan, dan ikan asap. Instruktur dari Balai Pelatihan Perikanan memberikan teori dan praktik langsung kepada peserta.

Ketua Kelompok Nelayan "Bahari Jaya", Bapak Usman, menyambut baik program ini. "Selama ini kami hanya menjual ikan segar. Dengan pelatihan ini, kami bisa mengolah hasil tangkapan menjadi produk yang lebih tahan lama dan bernilai ekonomi tinggi," katanya.

Pemerintah Desa Ocimalaleo berkomitmen mendampingi kelompok nelayan dalam mengembangkan usaha pengolahan hasil laut. Rencananya, akan dibentuk UMKM khusus produk olahan laut yang akan dipasarkan hingga ke luar daerah.',
                'tanggal' => Carbon::now()->subDays(35),
                'gambar' => 'berita/pelatihan-pengolahan-ikan.jpg',
            ],
            [
                'judul' => 'Pembangunan Jalan Desa Fase II Dimulai',
                'isi' => 'Pemerintah Desa Ocimalaleo memulai pembangunan jalan desa fase II yang menghubungkan Dusun Selatan dengan pusat desa. Proyek yang menggunakan Dana Desa tahun 2024 ini menargetkan pengaspalan sepanjang 2 kilometer.

Kepala Desa, Ahmad Hidayat, menjelaskan bahwa pembangunan jalan ini merupakan prioritas karena kondisi jalan yang rusak sering menyulitkan akses masyarakat, terutama saat musim hujan. "Dengan jalan yang baik, mobilitas masyarakat akan lebih lancar, distribusi hasil pertanian juga lebih mudah," ujarnya.

Pembangunan jalan dikerjakan oleh kontraktor lokal dengan melibatkan tenaga kerja dari masyarakat setempat. Proyek direncanakan selesai dalam waktu tiga bulan. Selain pengaspalan, juga akan dibangun saluran drainase untuk mencegah genangan air.

Masyarakat Dusun Selatan sangat antusias menyambut pembangunan ini. Mereka berharap dengan infrastruktur yang baik, perekonomian desa akan semakin berkembang dan kesejahteraan meningkat.',
                'tanggal' => Carbon::now()->subDays(42),
                'gambar' => 'berita/pembangunan-jalan-desa.jpg',
            ],
            [
                'judul' => 'Vaksinasi Massal untuk Ternak di Desa Ocimalaleo',
                'isi' => 'Dinas Peternakan dan Kesehatan Hewan Kabupaten Halmahera Selatan menggelar vaksinasi massal untuk ternak di Desa Ocimalaleo. Program ini merupakan upaya pencegahan penyebaran penyakit mulut dan kuku (PMK) yang sempat mewabah di beberapa daerah.

Sebanyak 250 ekor ternak sapi, kambing, dan kerbau mendapatkan vaksinasi gratis. Tim medis veteriner juga melakukan pemeriksaan kesehatan ternak dan memberikan vitamin untuk meningkatkan daya tahan tubuh hewan ternak.

Peternak sangat mengapresiasi program ini. Bapak Hasan, salah seorang peternak, mengatakan bahwa vaksinasi ini sangat membantu menjaga kesehatan ternaknya. "Kami sangat terbantu dengan program vaksinasi gratis ini. Kesehatan ternak terjaga, produktivitas juga meningkat," ungkapnya.

Kepala Desa mendorong semua peternak untuk memanfaatkan program pemerintah ini. Selain vaksinasi, juga akan ada program pendampingan teknis untuk meningkatkan pengetahuan peternak dalam manajemen peternakan yang baik.',
                'tanggal' => Carbon::now()->subDays(50),
                'gambar' => 'berita/vaksinasi-ternak.jpg',
            ],
            [
                'judul' => 'Peringatan HUT RI ke-79 Meriah dengan Berbagai Lomba',
                'isi' => 'Desa Ocimalaleo merayakan HUT Kemerdekaan RI ke-79 dengan berbagai kegiatan dan lomba yang meriah. Seluruh warga dari empat dusun berpartisipasi aktif dalam perayaan yang dimulai dengan upacara bendera di lapangan desa.

Berbagai lomba tradisional digelar seperti balap karung, tarik tambang, lomba makan kerupuk, panjat pinang, dan lomba volley antar dusun. Lomba khusus anak-anak juga diadakan seperti lomba mewarnai, lomba membaca puisi, dan lomba menyanyi lagu nasional.

Kepala Desa menyampaikan amanat dalam upacara bahwa kemerdekaan yang dinikmati saat ini adalah hasil perjuangan pahlawan. "Mari kita isi kemerdekaan dengan pembangunan desa dan peningkatan kesejahteraan bersama," ajaknya.

Perayaan ditutup dengan malam hiburan rakyat yang menampilkan pentas seni dari sanggar-sanggar lokal dan orkes melayu. Panitia juga membagikan doorprize untuk masyarakat yang hadir. Antusiasme warga sangat tinggi, menjadikan perayaan HUT RI tahun ini sebagai yang paling meriah.',
                'tanggal' => Carbon::parse('2024-08-17'),
                'gambar' => 'berita/peringatan-hut-ri.jpg',
            ],
        ];

        foreach ($berita as $item) {
            DB::table('berita')->insert([
                'judul' => $item['judul'],
                'isi' => $item['isi'],
                'tanggal' => $item['tanggal'],
                'gambar' => $item['gambar'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}