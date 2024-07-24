<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePkldoseninstrukturTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pkldoseninstruktur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pkldosen_id')->constrained('pkldosen')->onDelete('cascade');
            $table->integer('no_id');
            $table->string('nama');
            $table->string('jabatan')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pkldoseninstruktur');
    }
}