<?php

// database/migrations/xxxx_xx_xx_create_item_kerjasama_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemKerjasamaTable extends Migration
{
    public function up()
    {
        Schema::create('item_kerjasama', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kerjasama_id');
            $table->string('jurusan');
            $table->string('jenis_kerjasama');
            $table->timestamps();

            $table->foreign('kerjasama_id')->references('id')->on('datakerjasama')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_kerjasama');
    }
}