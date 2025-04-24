<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiAkademik extends Model
{
    use HasFactory;
    protected $table = 'presensi_akademik';
    protected $fillable = ['hari', 'tanggal', 'status_kehadiran', 'NIM', 'Kode_mk'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'NIM');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'Kode_mk');
    }
}