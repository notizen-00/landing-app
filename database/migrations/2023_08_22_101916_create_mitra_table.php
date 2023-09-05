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
        Schema::create('mitra', function (Blueprint $table) {
            $table->id();
            $table->string('no_mitra')->unique();
            $table->integer('user_id');
            $table->integer('program_id');
            $table->string('nama_usaha');
            $table->string('deskripsi_usaha')->nullable();
            $table->string('nama_kecamatan');
            $table->string('alamat_usaha');
            $table->string('jumlah_karyawan');
            $table->string('no_ijin_usaha');
            $table->string('npwp_usaha');
            $table->string('foto_usaha')->nullable();
            $table->string('status_mitra');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra');
    }
};
