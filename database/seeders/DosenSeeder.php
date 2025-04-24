<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    public function run()
    {
        $dosen = [
            [
                'NIP' => '198001012010011001',
                'Nama' => 'Dr. Budi Santoso, M.Kom',
                'Alamat' => 'Jl. Mawar No. 10',
                'Nohp' => '081234567890'
            ],
            [
                'NIP' => '198201022010022002',
                'Nama' => 'Dr. Siti Rahayu, M.Sc',
                'Alamat' => 'Jl. Melati No. 15',
                'Nohp' => '081234567891'
            ],
            [
                'NIP' => '198403032010033003',
                'Nama' => 'Prof. Ahmad Wijaya, Ph.D',
                'Alamat' => 'Jl. Anggrek No. 20',
                'Nohp' => '081234567892'
            ],
        ];

        foreach ($dosen as $dosen) {
            Dosen::create($dosen);
        }
    }
}