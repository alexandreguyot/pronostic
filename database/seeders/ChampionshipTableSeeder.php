<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Championship;

class ChampionshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $championship = [
            [
                'id'                => 1,
                'title'             => 'Wiztivi Pronostic',
            ]
        ];

        Championship::insert($championship);
    }
}
