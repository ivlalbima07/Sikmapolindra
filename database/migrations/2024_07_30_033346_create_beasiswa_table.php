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
        Schema::create('beasiswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_kerjasama_id')->constrained('item_kerjasama')->onDelete('cascade');
            $table->string('nama_keterangan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->decimal('nominal_biaya_dudi', 15, 2)->nullable();
            $table->decimal('nominal_biaya_dunia_kerja', 15, 2)->nullable();
            $table->decimal('nominal_biaya_satuan_pendidikan', 15, 2)->nullable();
            $table->decimal('nominal_biaya_pemerintah_daerah', 15, 2)->nullable();
            $table->decimal('nominal_biaya_pemerintah_pusat', 15, 2)->nullable();
            // $table->decimal('nominal_biaya_cost_sharing', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswa');
    }
};
