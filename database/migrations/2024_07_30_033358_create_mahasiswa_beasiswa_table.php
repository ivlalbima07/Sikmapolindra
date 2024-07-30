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
        Schema::create('mahasiswa_beasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beasiswa_id');
            $table->string('nama');
            $table->string('nim');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->timestamps();

            $table->foreign('beasiswa_id')->references('id')->on('beasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_beasiswa');
    }
};
