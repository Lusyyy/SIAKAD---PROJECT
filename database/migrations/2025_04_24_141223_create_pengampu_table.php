<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengampu', function (Blueprint $table) {
            $table->id();
            $table->string('Kode_mk', 10);
            $table->string('NIP', 20);
            $table->foreign('Kode_mk')->references('Kode_mk')->on('matakuliah');
            $table->foreign('NIP')->references('NIP')->on('dosen');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengampu');
    }
};