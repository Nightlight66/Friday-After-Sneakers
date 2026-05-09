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
        Schema::create ('stok_sepatu', function (Blueprint $table){
            $table->id('stok_id');
            $table->foreignId('sepatu_id')
                    ->constrained('sepatu', 'sepatu_id')
                    ->onDelete('cascade');
            $table->string('ukuran_sepatu', 5);
            $table->integer('jumlah_stok')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_sepatu');
    }
};
