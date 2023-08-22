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
            $table->integer('user_id');
            $table->integer('program_id');
            $table->string('nama_mitra');
            $table->string('deskripsi_mitra')->nullable();
            $table->string('nama_kecamatan');
            $table->string('alamat');
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
