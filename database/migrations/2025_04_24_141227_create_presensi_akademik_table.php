<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('presensi_akademik', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->date('tanggal');
            $table->string('status_kehadiran');
            $table->string('NIM', 20);
            $table->string('Kode_mk', 10);
            
            $table->foreign('NIM')->references('NIM')->on('mahasiswa');
            $table->foreign('Kode_mk')->references('Kode_mk')->on('matakuliah');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presensi_akademik');
    }
};