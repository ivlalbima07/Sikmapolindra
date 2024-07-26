<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenPenanggungJawabTable extends Migration
{
    public function up()
    {
        Schema::create('dosen_penanggung_jawab', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pkl_mhs_id')->constrained('pkl_mhs')->onDelete('cascade');
            $table->string('nama');
            $table->string('nidn');
            $table->string('prodi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosen_penanggung_jawab');
    }
}