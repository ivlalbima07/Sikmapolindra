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
        Schema::create('penyerapan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_kerjasama_id')->constrained('item_kerjasama')->onDelete('cascade');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('status_serapan');
            $table->string('gaji');
            $table->string('jabatan');
            $table->date('tanggal_mulai_kerja');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyerapan');
    }
};
