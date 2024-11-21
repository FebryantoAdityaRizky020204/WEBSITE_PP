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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_pelanggan')->constrained()->references('id')->on('pelanggan');
            $table->foreignId('id_layanan_laundry')->constrained()->references('id')->on('layanan_laundry');
            $table->foreignId('id_pemasukan')->constrained()->references('id')->on('pemasukan');
            $table->string('status_laundry');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};