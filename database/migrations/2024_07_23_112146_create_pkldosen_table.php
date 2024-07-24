<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePkldosenTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pkldosen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_kerjasama_id')->constrained('item_kerjasama');
            $table->string('nama_rombel');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('file')->nullable();
            $table->decimal('biaya_per_dosen', 10, 2)->nullable();
            $table->decimal('biaya_dari_dunia_kerja', 10, 2)->nullable();
            $table->decimal('biaya_dari_satuan_pendidikan', 10, 2)->nullable();
            $table->decimal('biaya_dari_pemerintah_daerah', 10, 2)->nullable();
            $table->decimal('biaya_dari_pemerintah_pusat', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pkldosen');
    }
}