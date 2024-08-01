<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companions', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->nullable();
            $table->string('no_telefon')->nullable();
            $table->foreignId('dudi_id')->constrained('dudis')->onDelete('cascade');
            $table->string('jabatan_dudi')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('keahlian')->nullable();
            $table->timestamps();

            // Foreign key constraint
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companions');
    }
};