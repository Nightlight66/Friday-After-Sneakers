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
        Schema::create('laporan_penjualan_bulanan', function (Blueprint $table) {
            $table->id('laporan_id');
            $table->tinyInteger('bulan');
            $table->year('tahun');
            $table->integer('total_sepatu_terjual')->default(0);
            $table->decimal('total_omset', 15, 2)->default(0);
            $table->unique(['bulan', 'tahun']); // Gabungan bulan & tahun harus unik
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_penjualan_bulanan');
    }
};
