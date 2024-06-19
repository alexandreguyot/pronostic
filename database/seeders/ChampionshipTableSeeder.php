<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\League;

class ChampionshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $league = [
            [
                'id'                => 1,
                'title'             => 'Wiztivi Pronostic',
            ]
        ];

        League::insert($league);
    }
}
