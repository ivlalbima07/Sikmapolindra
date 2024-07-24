<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenPenanggungJawabBaruTable extends Migration
{
    public function up()
    {
        Schema::create('dosen_penanggung_jawab_baru', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_tamu_id')->constrained('dosen_tamu')->onDelete('cascade');
            $table->string('nama');
            $table->string('nidn');
            $table->string('prodi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosen_penanggung_jawab_baru');
    }
}