<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataKuliahTable extends Migration
{
    public function up()
    {
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_tamu_id')->constrained('dosen_tamu')->onDelete('cascade');
            $table->string('nama');
            $table->string('foto_dokumen')->nullable();
            $table->integer('jumlah_jpl');
            $table->decimal('honorarium_per_jam', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mata_kuliah');
    }
}