<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('NIM', 20)->primary();
            $table->string('Nama');
            $table->text('Alamat')->nullable();
            $table->string('Nohp', 15)->nullable();
            $table->integer('Semester');
            $table->unsignedBigInteger('id_Gol');
            $table->foreign('id_Gol')->references('id_Gol')->on('golongan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
};