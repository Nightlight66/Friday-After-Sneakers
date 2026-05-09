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
        Schema::create ('detail_pesanan', function (Blueprint $table){
            $table->id('detail_id');
            $table->foreignId('pesanan_id')
                  ->constrained('pesanan', 'pesanan_id')
                  ->onDelete('cascade');
            $table->foreignId('sepatu_id')
                  ->constrained('sepatu', 'sepatu_id')
                  ->onDelete('cascade');
            $table->string('ukuran_sepatu', 5);
            $table->integer('jumlah')->default(1);
            $table->decimal('harga_saat_beli', 12, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('detail_pesanan');
    }
};
