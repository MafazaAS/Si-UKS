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
        Schema::create('delivery_obat', function (Blueprint $table) {
            $table->id('id_delivery');
            $table->string('nama');
            $table->string('kelas');
            $table->string('ruangan');
            $table->text('keluhan');
            $table->string('status');
            $table->dateTime('waktu_request')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_obat');
    }
};
