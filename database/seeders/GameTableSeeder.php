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
        // id	name	group
        // 1	France	Groupe B
        // 2	Allemagne	Groupe B
        // 3	Japon	Groupe B
        // 4	Canada	Groupe A
        // 5	Australie	Groupe A
        // 6	Serbie	Groupe A
        // 7	USA	Groupe A
        // 8	Soudan du sud	Groupe A
        // 9	Porto Rico	Groupe C
        // 10	Espagne	Groupe A
        // 11	Brésil	Groupe B
        // 12	Grèce	Groupe A

        $games = [
            [
                'tour' => '',
                'competition_id' => 1,
                'sport_id' => 1,
                'home_team_id' => 5,
                'exterior_team_id' => 10,
                'date_time' => Carbon::create(2024, 07, 27, 11, 00, 00, 'Europe/Paris'),
            ],
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
                'home_team_id' => 1,
                'exterior_team_id' => 11,
                'date_time' => Carbon::create(2024, 07, 27, 17, 15, 00, 'Europe/Paris'),
            ],
            [
                'tour' => '',
                'competition_id' => 1,
                'sport_id' => 1,
                'home_team_id' => 12,
                'exterior_team_id' => 4,
                'date_time' => Carbon::create(2024, 07, 27, 21, 00, 00, 'Europe/Paris'),
            ],
            [
                'tour' => '',
                'competition_id' => 1,
                'sport_id' => 1,
                'home_team_id' => 8,
                'exterior_team_id' => 9,
                'date_time' => Carbon::create(2024, 07, 28, 11, 00, 00, 'Europe/Paris'),
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
                'home_team_id' => 10,
                'exterior_team_id' => 12,
                'date_time' => Carbon::create(2024, 07, 30, 11, 00, 00, 'Europe/Paris'),
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
                'home_team_id' => 2,
                'exterior_team_id' => 11,
                'date_time' => Carbon::create(2024, 7, 30, 21, 00, 00, 'Europe/Paris'),
            ],
            [
                'tour' => '',
                'competition_id' => 1,
                'sport_id' => 1,
                'home_team_id' => 9,
                'exterior_team_id' => 6,
                'date_time' => Carbon::create(2024, 7, 31, 17, 15, 00, 'Europe/Paris'),
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
                'home_team_id' => 3,
                'exterior_team_id' => 4,
                'date_time' => Carbon::create(2024, 8, 2, 11, 00, 00, 'Europe/Paris'),
            ],
            [
                'tour' => '',
                'competition_id' => 1,
                'sport_id' => 1,
                'home_team_id' => 5,
                'exterior_team_id' => 12,
                'date_time' => Carbon::create(2024, 8, 2, 13, 30, 00, 'Europe/Paris'),
            ],
            [
                'tour' => '',
                'competition_id' => 1,
                'sport_id' => 1,
                'home_team_id' => 4,
                'exterior_team_id' => 10,
                'date_time' => Carbon::create(2024, 8, 2, 17, 15, 00, 'Europe/Paris'),
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
                'home_team_id' => 9,
                'exterior_team_id' => 7,
                'date_time' => Carbon::create(2024, 8, 3, 17, 15, 00, 'Europe/Paris'),
            ],
            [
                'tour' => '',
                'competition_id' => 1,
                'sport_id' => 1,
                'home_team_id' => 6,
                'exterior_team_id' => 8,
                'date_time' => Carbon::create(2024, 8, 3, 21, 00, 00, 'Europe/Paris'),
            ]
        ];

        Game::insert($games);
    }
}
