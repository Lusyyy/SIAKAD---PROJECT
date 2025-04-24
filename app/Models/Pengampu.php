<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengampu extends Model
{
    use HasFactory;
    protected $table = 'pengampu';

    protected $fillable = ['Kode_mk', 'NIP'];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'Kode_mk');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'NIP');
    }
}