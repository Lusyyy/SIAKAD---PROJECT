<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    public function run()
    {
        $matakuliah = [
            [
                'Kode_mk' => 'MK001',
                'Nama_mk' => 'Pemrograman Web',
                'sks' => 3,
                'semester' => 3
            ],
            [
                'Kode_mk' => 'MK002',
                'Nama_mk' => 'Basis Data',
                'sks' => 4,
                'semester' => 3
            ],
            [
                'Kode_mk' => 'MK003',
                'Nama_mk' => 'Algoritma dan Struktur Data',
                'sks' => 4,
                'semester' => 2
            ],
            [
                'Kode_mk' => 'MK004',
                'Nama_mk' => 'Jaringan Komputer',
                'sks' => 3,
                'semester' => 4
            ],
        ];

        foreach ($matakuliah as $matakuliah) {
            Matakuliah::create($matakuliah);
        }
    }
}