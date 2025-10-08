<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_desa', function (Blueprint $table) {
            $table->id();
            
            // Data Kependudukan
            $table->integer('jumlah_penduduk')->default(0);
            $table->integer('jumlah_kk')->default(0); // Kepala Keluarga
            $table->integer('jumlah_pria')->default(0);
            $table->integer('jumlah_wanita')->default(0);
            
            // Data Pendidikan
            $table->integer('jumlah_sd')->default(0);
            $table->text('nama_sd')->nullable();
            $table->integer('jumlah_smp')->default(0);
            $table->text('nama_smp')->nullable();
            $table->integer('jumlah_sma')->default(0);
            $table->text('nama_sma')->nullable();
            
            // Data Tempat Ibadah
            $table->integer('jumlah_gereja')->default(0);
            $table->text('nama_gereja')->nullable();
            $table->integer('jumlah_masjid')->default(0);
            $table->text('nama_masjid')->nullable();
            
            // Data Fasilitas Kesehatan
            $table->integer('jumlah_puskesmas')->default(0);
            $table->text('nama_puskesmas')->nullable();
            $table->integer('jumlah_posyandu')->default(0);
            
            // Data Produk Unggulan
            $table->string('produk_unggulan')->nullable();
            
            // Data Ekonomi & Wilayah
            $table->text('mata_pencaharian_utama')->nullable();
            $table->decimal('luas_wilayah', 10, 2)->nullable(); // dalam hektar
            $table->string('batas_wilayah')->nullable(); // UBAH dari text ke json
            
            $table->timestamps();
        });

        // HAPUS insert default record dari migration
        // Biarkan seeder yang handle ini
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_desa');
    }
};