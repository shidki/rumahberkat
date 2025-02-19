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
        Schema::create('tujuans', function (Blueprint $table) {
            $table->id();
            $table->string("tujuan_bantuan");
            $table->string("no_hp_pembuat");
            $table->string("nama_kerabat");

            $table->unsignedBigInteger('hubungan_kerabat_id')->nullable();
            $table->foreign('hubungan_kerabat_id')->references('id')->on('hubungan_kerabats');
            $table->string("no_hp_kerabat");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tujuans');
    }
};
