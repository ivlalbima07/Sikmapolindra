<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrukturTable extends Migration
{
    public function up()
    {
        Schema::create('instruktur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pkl_mhs_id')->constrained('pkl_mhs')->onDelete('cascade');
            $table->string('nama');
            $table->string('no_id');
            $table->string('jabatan');
            $table->string('no_telepon');
            $table->string('email');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('instruktur');
    }
}