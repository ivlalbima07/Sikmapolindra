<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenanggungJawabsTable extends Migration
{
    public function up()
    {
        Schema::create('penanggungjawabs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dudi_id')->constrained('dudis')->onDelete('cascade');
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('jenis_identitas')->nullable();
            $table->string('nomor_identitas')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penanggungjawabs');
    }
}