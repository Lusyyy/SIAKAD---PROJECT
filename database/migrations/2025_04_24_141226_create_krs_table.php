<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('krs', function (Blueprint $table) {
            $table->id();
            $table->string('NIM', 20);
            $table->string('Kode_mk', 10);
            
            $table->foreign('NIM')->references('NIM')->on('mahasiswa');
            $table->foreign('Kode_mk')->references('Kode_mk')->on('matakuliah');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('krs');
    }
};