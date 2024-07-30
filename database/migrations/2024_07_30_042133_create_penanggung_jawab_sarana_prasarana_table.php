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
        Schema::create('penanggung_jawab_sarana_prasarana', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sarana_prasarana_id');
            $table->string('nama');
            $table->string('nidn');
            $table->string('prodi');
            $table->timestamps();

            $table->foreign('sarana_prasarana_id')->references('id')->on('sarana_prasarana')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penanggung_jawab_sarana_prasarana');
    }
};
