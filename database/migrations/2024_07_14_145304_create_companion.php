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
        Schema::create('companion', function (Blueprint $table) {
           $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('email');
            $table->string('no_telefon');
            $table->foreignId('dudi_id')->constrained('dudis');
            $table->string('jabatan_di_dudi');
            $table->string('pendidikan_terakhir');
            $table->string('keahlian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companion');
    }
};