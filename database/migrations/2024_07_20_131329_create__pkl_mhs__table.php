<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePklMhsTable extends Migration
{
    public function up()
    {
        Schema::create('pkl_mhs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_kerjasama_id')->constrained('item_kerjasama');
            $table->string('nama_rombongan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('foto_dokumen')->nullable();
            $table->decimal('biaya_per_mahasiswa', 15, 2);
            $table->decimal('biaya_dunia_kerja', 15, 2)->nullable();
            $table->decimal('biaya_satuan_pendidikan', 15, 2)->nullable();
            $table->decimal('biaya_pemerintah_daerah', 15, 2)->nullable();
            $table->decimal('biaya_pemerintah_pusat', 15, 2)->nullable();
            $table->decimal('biaya_cost_sharing', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('pkl_mhs', function (Blueprint $table) {
            $table->dropForeign(['item_kerjasama_id']);
            $table->dropColumn('item_kerjasama_id');
        });
        Schema::dropIfExists('pkl_mhs');
    }
}