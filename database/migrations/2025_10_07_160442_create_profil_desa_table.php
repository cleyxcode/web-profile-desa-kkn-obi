<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profil_desa', function (Blueprint $table) {
            $table->id();
            
            // Informasi Dasar
            $table->string('nama_desa');
            $table->text('alamat')->nullable();
            $table->string('kontak')->nullable(); // HP/WA/Email
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            
            // Kepala Desa
            $table->string('nama_kepala_desa')->nullable();
            $table->string('nip_kepala_desa')->nullable();
            $table->date('masa_jabatan_mulai')->nullable();
            $table->date('masa_jabatan_selesai')->nullable();
            $table->string('foto_kepala_desa')->nullable();
            
            // Sejarah & Visi Misi
            $table->longText('sejarah')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            
            // Struktur Organisasi
            $table->longText('struktur_pemerintahan')->nullable();
            $table->string('struktur_image')->nullable();
            
            // Media & Banner
            $table->string('banner')->nullable();
            $table->string('logo_desa')->nullable();
            $table->text('galeri')->nullable(); // Array foto-foto desa
            
            // Video Profil
            $table->string('video_profil_url')->nullable(); // URL YouTube
            $table->text('video_profil_deskripsi')->nullable();
            
            // Lokasi & Peta
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->integer('zoom_level')->default(15);
            $table->decimal('luas_wilayah', 10, 2)->nullable(); // dalam km²
            $table->integer('ketinggian')->nullable(); // mdpl
            
            // Informasi Tambahan
            $table->text('tagline')->nullable(); // Motto/Tagline desa
            $table->text('sambutan_kepala_desa')->nullable();
            
            // Social Media
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok')->nullable();
            
            // Status & Metadata
            $table->boolean('is_published')->default(true);
            $table->integer('jumlah_dusun')->default(0);
            $table->integer('jumlah_rt')->default(0);
            $table->integer('jumlah_rw')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_desa');
    }
};