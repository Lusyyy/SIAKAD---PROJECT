<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            GolonganSeeder::class,
            RuangSeeder::class,
            DosenSeeder::class,
            MatakuliahSeeder::class,
            MahasiswaSeeder::class,
        ]);
    }
}