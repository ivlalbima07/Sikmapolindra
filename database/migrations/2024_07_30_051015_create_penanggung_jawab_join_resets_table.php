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
        Schema::create('penanggung_jawab_join_resets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('join_reset_id')->constrained('join_resets')->onDelete('cascade');
            $table->string('nama');
            $table->string('nidn');
            $table->string('prodi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penanggung_jawab_join_resets');
    }
};
