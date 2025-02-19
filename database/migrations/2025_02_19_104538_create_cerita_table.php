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
        Schema::create('ceritas', function (Blueprint $table) {
            $table->id();
            $table->text('cerita_pasien');
            $table->text('foto_diri_pasien'); // menyimpan path foto
            $table->text('kondisi_pasien');
            $table->text('foto_kondisi_pasien');
            $table->text('detail_pengobatan');
            $table->text('foto_detail_pengobatan');
            $table->text("kondisi_pasien_setelah_mengidap");
            $table->text("foto_kondisi_pasien_setelah_mengidap");
            $table->text("rencana_penggunaan_biaya");
            $table->text("alasan_pasien");
            $table->text("doa");
            $table->text("foto_doa");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ceritas');
    }
};
