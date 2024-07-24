<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePkldosenpjTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pkldosenpj', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pkldosen_id')->constrained('pkldosen')->onDelete('cascade');
            $table->string('nama');
            $table->integer('nidn');
            $table->string('prodi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pkldosenpj');
    }
}