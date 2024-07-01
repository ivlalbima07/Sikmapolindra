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
        Schema::create('tanggung_jawab', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dudi_id')->constrained('dudis')->onDelete('cascade');
            $table->string('nama');
            $table->string('email');
            $table->string('no_hp');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->enum('jenis_identitas', ['KTP', 'SIM', 'Paspor']);
            $table->string('nomor_identitas');
            $table->enum('kewarganegaraan', ['WNI', 'WNA']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tanggung_jawab');
    }
};
