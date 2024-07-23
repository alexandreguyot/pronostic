<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sport;

class SportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sports = [
            [
                'id'                => 1,
                'title'             => 'Basket-ball (H)',
            ],
            [
                'id'                => 2,
                'title'             => 'Basket-ball (F)',
            ],
            [
                'id'                => 3,
                'title'             => 'Handball (H)',
            ],
            [
                'id'                => 4,
                'title'             => 'Handball (F)',
            ],
            [
                'id'                => 5,
                'title'             => "Médaille d'or",
            ],
            [
                'id'                => 6,
                'title'             => "Médaille d'argent",
            ],
            [
                'id'                => 7,
                'title'             => "Médaille de bronze",
            ],
        ];

        Sport::insert($sports);
    }
}
