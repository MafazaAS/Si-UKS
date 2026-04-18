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
        Schema::create('kunjungan_uks', function (Blueprint $table) {
            $table->id('id_kunjungan');
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_user');
            $table->text('keluhan');
            $table->text('penanganan');
            $table->dateTime('jam_masuk')->useCurrent();
            $table->dateTime('jam_keluar')->nullable();
            $table->text('keterangan')->nullable();

            $table->foreign('id_pasien')->references('id_pasien')->on('pasien');
            $table->foreign('id_user')->references('id_users')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungan_uks');
    }
};
