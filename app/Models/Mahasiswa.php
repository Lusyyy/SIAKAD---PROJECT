<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';

    protected $primaryKey = 'NIM';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = ['NIM', 'Nama', 'Alamat', 'Nohp', 'Semester', 'id_Gol'];

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_Gol');
    }

    public function krs()
    {
        return $this->hasMany(KRS::class, 'NIM');
    }

    public function presensiAkademik()
    {
        return $this->hasMany(PresensiAkademik::class, 'NIM');
    }

    public function matakuliah()
    {
        return $this->belongsToMany(Matakuliah::class, 'krs', 'NIM', 'Kode_mk');
    }
}