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
        Schema::create('riwayat_medis', function (Blueprint $table) {
            $table->id();
            $table->boolean('isRawatInap')->default(false);
            $table->string("alamat");
            $table->string("provinsi");
            $table->string("kabupaten");
            $table->string("kode_pos");
            $table->string("upaya_pengobatan");
            $table->string("sumber_biaya");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_medis');
    }
};
