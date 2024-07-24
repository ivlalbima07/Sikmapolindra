<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenTamuTable extends Migration
{
    public function up()
    {
        Schema::create('dosen_tamu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_kerjasama_id')->constrained('item_kerjasama')->onDelete('cascade');
            $table->string('nama');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->decimal('nominal_biaya_dunia_kerja', 15, 2)->nullable();
            $table->decimal('nominal_biaya_satuan_pendidikan', 15, 2)->nullable();
            $table->decimal('nominal_biaya_pemerintah_daerah', 15, 2)->nullable();
            $table->decimal('nominal_biaya_pemerintah_pusat', 15, 2)->nullable();
            $table->decimal('nominal_biaya_dudi', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosen_tamu');
    }
}