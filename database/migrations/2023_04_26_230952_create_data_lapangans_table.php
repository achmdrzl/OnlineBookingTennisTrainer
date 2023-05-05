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
        Schema::create('data_lapangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lapangan');
            $table->text('alamat_lap');
            $table->string('jenis_lap');
            $table->string('gambar_lap');
            $table->integer('harga')->nullable();
            $table->string('status')->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_lapangans');
    }
};
