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
        Schema::create('sepatu', function (Blueprint $table){
            $table->id('sepatu_id');
            $table->string('nama_sepatu');
            $table->string('merk_sepatu');
            $table->foreignId('kategori_id')
                ->constrained('kategori_sepatu', 'kategori_id')
                ->onDelete('cascade');
            $table->string('ukuran_sepatu');
            $table->integer('jumlah_stok');
            $table->text('deskripsi_sepatu');
            $table->decimal('harga_sepatu', 12, 2);
            $table->string('gambar_sepatu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sepatu');
    }
};
