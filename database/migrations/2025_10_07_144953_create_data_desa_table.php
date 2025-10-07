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
            $table->integer('jumlah_sma')->default(0); // Tambahan SMA
            $table->text('nama_sma')->nullable();
            
            // Data Tempat Ibadah
            $table->integer('jumlah_gereja')->default(0);
            $table->text('nama_gereja')->nullable();
            $table->integer('jumlah_masjid')->default(0);
            $table->text('nama_masjid')->nullable();
            
            // Data Fasilitas Umum (Tambahan)
            $table->integer('jumlah_puskesmas')->default(0);
            $table->text('nama_puskesmas')->nullable();
            $table->integer('jumlah_posyandu')->default(0);
            
            // Data Produk Unggulan
            $table->json('produk_unggulan')->nullable(); // Array produk unggulan
            
            // Data Ekonomi
            $table->text('mata_pencaharian_utama')->nullable();
            $table->decimal('luas_wilayah', 10, 2)->nullable(); // dalam hektar
            $table->text('batas_wilayah')->nullable(); // JSON untuk batas utara, selatan, timur, barat
            
            $table->timestamps();
        });

        // Insert default record
        DB::table('data_desa')->insert([
            'jumlah_penduduk' => 0,
            'jumlah_kk' => 0,
            'jumlah_pria' => 0,
            'jumlah_wanita' => 0,
            'jumlah_sd' => 0,
            'jumlah_smp' => 0,
            'jumlah_sma' => 0,
            'jumlah_gereja' => 0,
            'jumlah_masjid' => 0,
            'jumlah_puskesmas' => 0,
            'jumlah_posyandu' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_desa');
    }
};