<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAkademik extends Model
{
    use HasFactory;
    protected $table = 'jadwal_akademik';

    protected $fillable = ['hari', 'Kode_mk', 'id_ruang', 'id_Gol'];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'Kode_mk');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang');
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_Gol');
    }
}