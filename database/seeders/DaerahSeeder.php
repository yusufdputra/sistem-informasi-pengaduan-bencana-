<?php

namespace Database\Seeders;

use App\Models\Daerah;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Daerah::insert([
            [
                'nama'          => 'Sungai Pinang',
            ],
            [
                'nama'          => 'Kualu Nenas',
            ],
            [
                'nama'          => 'Danau Bingkuang',
            ],
            [
                'nama'          => 'Aur Sati',
            ],
            [
                'nama'          => 'Balam Jaya',
            ],
            [
                'nama'          => 'Gobah',
            ],
            [
                'nama'          => 'Kemang Indah',
            ],
            [
                'nama'          => 'Kualu',
            ],
            [
                'nama'          => 'Kuapan',
            ],
            [
                'nama'          => 'Padang Luas',
            ],
            [
                'nama'          => 'Palung Raya',
            ],
            [
                'nama'          => 'Parit Baru',
            ],
            
        ]);
    }
}
