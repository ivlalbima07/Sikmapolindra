<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pkl_mhs_id')->constrained('pkl_mhs')->onDelete('cascade');
            $table->string('nama');
            $table->string('nim');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('gender', ['Laki-Laki', 'Perempuan']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropForeign(['pkl_mhs_id']);
            $table->dropColumn('pkl_mhs_id');
        });
        Schema::dropIfExists('mahasiswa');
    }
}