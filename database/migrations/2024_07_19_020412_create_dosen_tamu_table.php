<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenTamuTable extends Migration
{
    public function up()
    {
        Schema::create('dosen_tamu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kerjasama_id');
            $table->string('no_dokumen');
            $table->string('nib');
            $table->string('nama_dudi');
            $table->string('program_studi');
            $table->timestamps();

            $table->foreign('kerjasama_id')->references('id')->on('datakerjasama')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosen_tamu');
    }
}