<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KRS extends Model
{
    use HasFactory;
    
    protected $table = 'krs';
    protected $fillable = ['NIM', 'Kode_mk'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'NIM');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'Kode_mk');
    }
}