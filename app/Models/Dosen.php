<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';

    protected $primaryKey = 'NIP';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = ['NIP', 'Nama', 'Alamat', 'Nohp'];

    public function pengampu()
    {
        return $this->hasMany(Pengampu::class, 'NIP');
    }
    
    public function matakuliah()
    {
        return $this->belongsToMany(Matakuliah::class, 'pengampu', 'NIP', 'Kode_mk');
    }
}