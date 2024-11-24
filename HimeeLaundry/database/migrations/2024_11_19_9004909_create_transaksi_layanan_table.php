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
        Schema::create('transaksi_layanan', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_layanan')->constrained()->references('id')->on('layanan_laundry');
            $table->foreignId('id_transaksi')->constrained()->references('id')->on('transaksi');
            $table->integer('nilai_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_layanans');
    }
};