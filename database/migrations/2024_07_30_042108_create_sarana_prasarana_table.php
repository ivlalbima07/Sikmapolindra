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
        Schema::create('sarana_prasarana', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('jenis');
            $table->string('nama_alat');
            $table->text('spesifikasi');
            $table->integer('jumlah');
            $table->decimal('nominal_biaya_dunia_kerja', 15, 2)->nullable();
            $table->decimal('nominal_biaya_satuan_pendidikan', 15, 2)->nullable();
            $table->decimal('nominal_biaya_pemerintah_daerah', 15, 2)->nullable();
            $table->decimal('nominal_biaya_pemerintah_pusat', 15, 2)->nullable();
            $table->decimal('nominal_biaya_dudi', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarana_prasarana');
    }
};
