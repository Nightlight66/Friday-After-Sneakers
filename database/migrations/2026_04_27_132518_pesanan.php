<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create ('pesanan', function (Blueprint $table){
            $table->id('pesanan_id');
            $table->foreignId('sepatu_id')
                ->constrained('sepatu', 'sepatu_id')
                ->onDelete('cascade');
            $table->decimal('total_harga', 12, 2);     
            $table->integer('jumlah_pesanan');
            $table->tinyInteger('bulan');
            $table->year('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
