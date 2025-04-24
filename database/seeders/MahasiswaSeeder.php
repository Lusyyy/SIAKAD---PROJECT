<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $mahasiswa = [
            [
                'NIM' => '2022001',
                'Nama' => 'Ahmad Fauzi',
                'Alamat' => 'Jl. Kenanga No. 5',
                'Nohp' => '081234567893',
                'Semester' => 3,
                'id_Gol' => 1
            ],
            [
                'NIM' => '2022002',
                'Nama' => 'Ratna Dewi',
                'Alamat' => 'Jl. Dahlia No. 8',
                'Nohp' => '081234567894',
                'Semester' => 3,
                'id_Gol' => 1
            ],
            [
                'NIM' => '2022003',
                'Nama' => 'Bayu Prasetyo',
                'Alamat' => 'Jl. Cempaka No. 12',
                'Nohp' => '081234567895',
                'Semester' => 3,
                'id_Gol' => 2
            ],
        ];

        foreach ($mahasiswa as $mahasiswa) {
            Mahasiswa::create($mahasiswa);
        }
    }
}