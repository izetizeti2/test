<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run()
    {
        DB::table('cities')->insert([
            ['name' => 'Prishtina'],
            ['name' => 'Mitrovica'],
            ['name' => 'Peja'],
            ['name' => 'Prizreni'],
            ['name' => 'Ferizaji'],
            ['name' => 'Gjilani'],
            ['name' => 'Gjakova']
        ]);
    }
}
