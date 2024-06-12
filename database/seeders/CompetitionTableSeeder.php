<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competition;

class CompetitionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $competitions = [
            [
                'id'                => 1,
                'title'             => 'JO Paris 2024',
            ]
        ];

        Competition::insert($competitions);
    }
}
