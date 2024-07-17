<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDudisTable extends Migration
{
    public function up()
    {
         Schema::create('dudis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perseroan')->nullable();
            $table->string('nib')->nullable();
            $table->date('tanggal_terbit')->nullable();
            $table->string('tipe')->nullable();
            $table->text('alamat')->nullable();
            $table->char('province_id');        
            $table->char('regency_id');
            $table->char('district_id');
            $table->char('village_id');
            $table->string('email_mitra')->nullable();
            $table->string('no_mitra')->nullable();
            $table->json('klasifikasi_baku')->nullable(); // Menyimpan data multiple select sebagai JSON
            $table->string('lingkupkerjasama')->nullable();
            $table->foreignId('kriteria_id')->constrained('kriterias');
            $table->foreignId('klasifikasi_id')->constrained('klasifikasis');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dudis');
    }
}