<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';

    protected $primaryKey = 'Kode_mk';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = ['Kode_mk', 'Nama_mk', 'sks', 'semester'];

    public function pengampu()
    {
        return $this->hasMany(Pengampu::class, 'Kode_mk');
    }

    public function dosens()
    {
        return $this->belongsToMany(Dosen::class, 'pengampu', 'Kode_mk', 'NIP');
    }

    public function jadwalAkademik()
    {
        return $this->hasMany(JadwalAkademik::class, 'Kode_mk');
    }

    public function krs()
    {
        return $this->hasMany(KRS::class, 'Kode_mk');
    }

    public function presensiAkademik()
    {
        return $this->hasMany(PresensiAkademik::class, 'Kode_mk');
    }
}