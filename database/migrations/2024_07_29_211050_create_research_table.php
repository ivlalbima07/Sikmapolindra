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
        Schema::create('research', function (Blueprint $table) {
            $table->id();
            $table->string('judul_riset');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('bidang_riset');
            $table->text('nama_peserta_lain')->nullable();
            $table->json('luaran')->nullable();
            $table->integer('tahun_pembiayaan')->nullable();
            $table->decimal('nominal_biaya_dunia_kerja', 15, 2)->nullable();
            $table->decimal('nominal_biaya_satuan_pendidikan', 15, 2)->nullable();
            $table->decimal('nominal_biaya_pemerintah_daerah', 15, 2)->nullable();
            $table->decimal('nominal_biaya_pemerintah_pusat', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research');
    }
};
