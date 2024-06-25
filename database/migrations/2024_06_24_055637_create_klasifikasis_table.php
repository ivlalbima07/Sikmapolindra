<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlasifikasisTable extends Migration
{
    public function up()
    {
        Schema::create('klasifikasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_klasifikasi');
            $table->foreignId('kriteria_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('klasifikasis');
    }
}