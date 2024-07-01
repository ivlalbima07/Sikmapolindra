<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('dudis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rombel');
            $table->string('nama');
            $table->string('nib');
            $table->date('sk_pendirian');
            $table->string('tipe');
            $table->string('alamat');
            $table->char('province_id', 2);
            $table->char('regency_id', 4);
            $table->char('district_id', 7);
            $table->char('village_id', 10);
            $table->string('email_mitra')->nullable();
            $table->string('no_telp_mitra')->nullable();
            $table->enum('kerjasama', ['internasional', 'nasional']);
            $table->foreignId('kriteria_id')->constrained('kriterias');
            $table->foreignId('klasifikasi_id')->constrained('klasifikasis');
            $table->timestamps();

            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('regency_id')->references('id')->on('regencies');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('village_id')->references('id')->on('villages');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dudis');
    }
};
