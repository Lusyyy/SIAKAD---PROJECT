<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ruang;

class RuangSeeder extends Seeder
{
    public function run()
    {
        $ruang = [
            ['nama_ruang' => 'Lab Komputer 1'],
            ['nama_ruang' => 'Lab Komputer 2'],
            ['nama_ruang' => 'Ruang 101'],
            ['nama_ruang' => 'Ruang 102'],
            ['nama_ruang' => 'Ruang 201'],
        ];

        foreach ($ruang as $ruang) {
            Ruang::create($ruang);
        }
    }
}