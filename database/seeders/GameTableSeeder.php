<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;
use Carbon\Carbon;

class GameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                'tour' => '',
                'competition_id' => 1,
                'sport_id' => 1,
                'home_team_id' => 2,
                'exterior_team_id' => 3,
                'date_time' => Carbon::create(2024, 07, 27, 13, 30, 00, 'Europe/Paris'),
            ],
            [
                'tour' => '',
                'competition_id' => 1,
                'sport_id' => 1,
                'home_team_id' => 6,
                'exterior_team_id' => 7,
                'date_time' => Carbon::create(2024, 07, 28, 17, 15, 00, 'Europe/Paris'),
            ],
            [
                'tour' => '',
                'competition_id' => 1,
                'sport_id' => 1,
                'home_team_id' => 4,
                'exterior_team_id' => 5,
                'date_time' => Carbon::create(2024, 07, 30, 13, 30, 00, 'Europe/Paris'),
            ],
            [
                'tour' => '',
                'competition_id' => 1,
                'sport_id' => 1,
                'home_team_id' => 3,
                'exterior_team_id' => 1,
                'date_time' => Carbon::create(2024, 7, 30, 17, 15, 00, 'Europe/Paris'),
            ],
            [
                'tour' => '',
                'competition_id' => 1,
                'sport_id' => 1,
                'home_team_id' => 7,
                'exterior_team_id' => 8,
                'date_time' => Carbon::create(2024, 7, 31, 21, 00, 00, 'Europe/Paris'),
            ],
            [
                'tour' => '',
                'competition_id' => 1,
                'sport_id' => 1,
                'home_team_id' => 1,
                'exterior_team_id' => 2,
                'date_time' => Carbon::create(2024, 8, 2, 21, 00, 00, 'Europe/Paris'),
            ],
            [
                'tour' => '',
                'competition_id' => 1,
                'sport_id' => 1,
                'home_team_id' => 6,
                'exterior_team_id' => 8,
                'date_time' => Carbon::create(2024, 8, 3, 21, 00, 00, 'Europe/Paris'),
            ],
        ];

        Game::insert($games);
    }
}
