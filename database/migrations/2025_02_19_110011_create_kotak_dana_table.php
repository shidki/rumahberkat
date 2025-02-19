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
        Schema::create('kotak_danas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tujuan_id');
 
            $table->foreign('tujuan_id')->references('id')->on('tujuans');

            $table->unsignedBigInteger('detail_pasien_id');
            $table->foreign('detail_pasien_id')->references('id')->on('detail_pasiens');

            $table->unsignedBigInteger('riwayat_medis_id');
            $table->foreign('riwayat_medis_id')->references('id')->on('riwayat_medis');

            $table->unsignedBigInteger('judul_id');
            $table->foreign('judul_id')->references('id')->on('juduls');

            $table->unsignedBigInteger('cerita_id');
            $table->foreign('cerita_id')->references('id')->on('ceritas');

            $table->unsignedBigInteger('ajakan_id');
            $table->foreign('ajakan_id')->references('id')->on('ajakans');

            $table->unsignedBigInteger('target_donasi_id');
            $table->foreign('target_donasi_id')->references('id')->on('target_donasis');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kotak_danas');
    }
};
