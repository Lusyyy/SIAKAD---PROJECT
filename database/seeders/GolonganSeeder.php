<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Golongan;

class GolonganSeeder extends Seeder
{
    public function run()
    {
        $golongan = [
            ['nama_Gol' => 'Reguler A'],
            ['nama_Gol' => 'Reguler B'],
            ['nama_Gol' => 'Reguler C'],
            ['nama_Gol' => 'Reguler D'],
            ['nama_Gol' => 'Reguler E'],
            ['nama_Gol' => 'Internasional'],
        ];

        foreach ($golongan as $golongan) {
            Golongan::create($golongan);
        }
    }
}