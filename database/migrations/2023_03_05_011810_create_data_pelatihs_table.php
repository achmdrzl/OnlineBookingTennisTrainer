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
        Schema::create('data_pelatihs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelatih', 50);
            $table->text('pengalaman');
            $table->string('img_pelatih', 100);
            $table->string('status', 25)->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pelatihs');
    }
};
