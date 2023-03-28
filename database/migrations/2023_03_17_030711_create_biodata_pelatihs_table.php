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
        Schema::create('biodata_pelatihs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelatih1')->nullable();
            $table->string('nama_pelatih2')->nullable();
            $table->string('nama_pelatih3')->nullable();
            $table->string('nama_asisten1')->nullable();
            $table->string('nama_asisten2')->nullable();
            $table->string('nama_asisten3')->nullable();
            $table->string('nama_ballboy1')->nullable();
            $table->string('nama_ballboy2')->nullable();
            $table->string('nama_ballboy3')->nullable();
            $table->text('materi')->nullable();
            $table->text('peralatan')->nullable();
            $table->unsignedBigInteger('paket_id');
            $table->foreign('paket_id')->references('id')->on('paket_latihans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_pelatihs');
    }
};
