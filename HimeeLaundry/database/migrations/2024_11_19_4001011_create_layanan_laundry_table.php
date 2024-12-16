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
        Schema::create('layanan_laundry', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_jenis_laundry')->constrained()->references('id')->on('jenis_laundry');
            $table->string('nama_layanan');
            $table->integer('harga_layanan');
            $table->string('satuan_barang');
            $table->integer('estimasi_pengerjaan');
            $table->string('satuan_waktu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_laundries');
    }
};