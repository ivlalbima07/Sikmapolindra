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
        Schema::create('riset_penanggung_jawab', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('research_id');
            $table->string('nama');
            $table->string('nidn');
            $table->string('prodi');
            $table->timestamps();

            $table->foreign('research_id')->references('id')->on('research')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riset_penanggung_jawabs');
    }
};
