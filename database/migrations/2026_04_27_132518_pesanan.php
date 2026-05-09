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
        Schema::create ('pesanan', function (Blueprint $table){
            $table->id('pesanan_id');
            $table->foreignId('users_id')
                  ->constrained('users', 'users_id')
                  ->onDelete('cascade');
            $table->string('kode_pesanan', 50)->unique();
            $table->text('alamat');
            $table->enum('status_pesanan', ['pending', 'settlement', 'expired', 'completed'])->default('pending');
            $table->string('snap_token');
            $table->dateTime('tanggal_pesan')->useCurrent();
            $table->date('tanggal_kirim')->nullable();
            $table->date('tanggal_selesai')->nullable();
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
