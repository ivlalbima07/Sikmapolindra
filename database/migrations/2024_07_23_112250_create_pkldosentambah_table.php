<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePkldosentambahTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pkldosentambah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pkldosen_id')->constrained('pkldosen')->onDelete('cascade');
            $table->string('nama');
            $table->integer('nidn');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Male', 'Female']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pkldosentambah');
    }
}