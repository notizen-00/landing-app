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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->integer('mitra_id');
            $table->string('nama_produk');
            $table->string('deskripsi_produk');
            $table->integer('harga_produk');
            $table->integer('stok_produk');
            $table->string('foto_produk')->nullable();
            $table->integer('status_produk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
