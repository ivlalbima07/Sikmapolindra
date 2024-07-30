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
        Schema::create('join_resets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_joint_research');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('bidang_riset');
            $table->string('produk_riset');
            $table->string('dokumen');
            $table->string('sumber_biaya');
            $table->decimal('nominal_biaya_luar_negeri', 15, 2)->nullable();
            $table->decimal('nominal_biaya_apbn', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('join_resets');
    }
};
