<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jadwal_akademik', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->string('Kode_mk', 10);
            $table->unsignedBigInteger('id_ruang');
            $table->unsignedBigInteger('id_Gol');
            
            $table->foreign('Kode_mk')->references('Kode_mk')->on('matakuliah');
            $table->foreign('id_ruang')->references('id_ruang')->on('ruang');
            $table->foreign('id_Gol')->references('id_Gol')->on('golongan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_akademik');
    }
};