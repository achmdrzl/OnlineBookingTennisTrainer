<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('metode_pemb')->nullable();
            $table->string('status_pemb')->default('belum-bayar');
            $table->string('status_bo')->default('waiting');
            $table->string('bukti_bayar');
            $table->integer('jml_ballboy')->nullable();
            $table->integer('jml_asisten')->nullable();
            $table->integer('jml_pelatih')->nullable();
            $table->integer('durasiLat')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->date('tgl_transaksi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('lap_id');
            $table->foreign('lap_id')->references('id')->on('data_lapangans')->onDelete('cascade');
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
