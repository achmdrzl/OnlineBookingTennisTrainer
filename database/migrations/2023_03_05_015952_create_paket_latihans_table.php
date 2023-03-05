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
        Schema::create('paket_latihans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->integer('jml_pelatih')->nullable();
            $table->integer('jml_asisten')->nullable();
            $table->integer('jml_ballboy')->nullable();
            $table->integer('durasi')->nullable();
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
        Schema::dropIfExists('paket_latihans');
    }
};
