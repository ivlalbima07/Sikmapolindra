<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_kerjasama_id')->constrained('item_kerjasama')->onDelete('cascade');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('penyelenggara');
            $table->string('masa_berlaku');
            $table->date('tanggal_mulai_berlaku');
            $table->decimal('biaya_sertifikasi_peserta', 15, 2)->nullable();
            $table->decimal('nominal_biaya_dunia_kerja', 15, 2)->nullable();
            $table->decimal('nominal_biaya_satuan_pendidikan', 15, 2)->nullable();
            $table->decimal('nominal_biaya_pemerintah_daerah', 15, 2)->nullable();
            $table->decimal('nominal_biaya_pemerintah_pusat', 15, 2)->nullable();
            $table->text('kompetensi');
            $table->string('lampiran_bukti')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certifications');
    }
}