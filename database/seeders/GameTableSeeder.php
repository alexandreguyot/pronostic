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
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 25, 9, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 27,
                'exterior_team_id' => 28,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 25, 11, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 35,
                'exterior_team_id' => 36,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 25, 14, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 29,
                'exterior_team_id' => 30,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 25, 16, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 31,
                'exterior_team_id' => 32,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 25, 19, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 33,
                'exterior_team_id' => 26,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 25, 21, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 34,
                'exterior_team_id' => 25,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 27, 9, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 37,
                'exterior_team_id' => 38,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 27, 11, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 39,
                'exterior_team_id' => 40,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 27, 14, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 41,
                'exterior_team_id' => 42,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 27, 16, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 43,
                'exterior_team_id' => 44,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 27, 19, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 45,
                'exterior_team_id' => 46,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 27, 21, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 47,
                'exterior_team_id' => 48,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 28, 9, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 30,
                'exterior_team_id' => 34,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 28, 11, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 26,
                'exterior_team_id' => 35,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 28, 14, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 28,
                'exterior_team_id' => 36,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 28, 16, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 31,
                'exterior_team_id' => 32,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 28, 19, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 27,
                'exterior_team_id' => 33,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 28, 21, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 25,
                'exterior_team_id' => 29,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 29, 9, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 45,
                'exterior_team_id' => 38,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 29, 11, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 39,
                'exterior_team_id' => 47,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 29, 14, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 40,
                'exterior_team_id' => 43,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 29, 16, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 41,
                'exterior_team_id' => 46,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 29, 19, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 37,
                'exterior_team_id' => 48,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 29, 21, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 44,
                'exterior_team_id' => 41,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 30, 9, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 26,
                'exterior_team_id' => 28,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 30, 11, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 31,
                'exterior_team_id' => 36,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 30, 14, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 29,
                'exterior_team_id' => 34,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 30, 16, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 32,
                'exterior_team_id' => 30,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 30, 19, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 35,
                'exterior_team_id' => 27,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 30, 21, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 25,
                'exterior_team_id' => 33,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 31, 9, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 43,
                'exterior_team_id' => 39,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 31, 11, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 41,
                'exterior_team_id' => 45,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 31, 14, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 37,
                'exterior_team_id' => 42,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 31, 16, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 38,
                'exterior_team_id' => 46,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 31, 19, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 48,
                'exterior_team_id' => 40,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 7, 31, 21, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 47,
                'exterior_team_id' => 44,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 1, 9, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 30,
                'exterior_team_id' => 34,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 1, 11, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 28,
                'exterior_team_id' => 26,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 1, 14, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 27,
                'exterior_team_id' => 33,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 1, 16, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 32,
                'exterior_team_id' => 25,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 1, 19, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 29,
                'exterior_team_id' => 31,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 1, 21, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 36,
                'exterior_team_id' => 35,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 2, 9, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 39,
                'exterior_team_id' => 40,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 2, 11, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 44,
                'exterior_team_id' => 48,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 2, 14, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 41,
                'exterior_team_id' => 46,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 2, 16, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 45,
                'exterior_team_id' => 37,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 2, 19, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 42,
                'exterior_team_id' => 38,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 2, 21, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 47,
                'exterior_team_id' => 43,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 3, 9, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 25,
                'exterior_team_id' => 30,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 3, 11, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 29,
                'exterior_team_id' => 34,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 3, 14, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 27,
                'exterior_team_id' => 36,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 3, 16, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 31,
                'exterior_team_id' => 33,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 3, 19, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 28,
                'exterior_team_id' => 35,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 3, 21, 0, 0, 'Europe/Paris'),
                'sport_id' => 4,
                'home_team_id' => 26,
                'exterior_team_id' => 32,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 4, 9, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 39,
                'exterior_team_id' => 48,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 4, 11, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 41,
                'exterior_team_id' => 42,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 4, 14, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 44,
                'exterior_team_id' => 45,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 4, 16, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 37,
                'exterior_team_id' => 46,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 4, 19, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 40,
                'exterior_team_id' => 43,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'date_time' => Carbon::create(2024, 8, 4, 21, 0, 0, 'Europe/Paris'),
                'sport_id' => 3,
                'home_team_id' => 47,
                'exterior_team_id' => 38,
                'competition_id' => 1
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 7, 28, 13, 30, 0, 'Europe/Paris'),
                'home_team_id' => 18, // Espagne F
                'exterior_team_id' => 19, // Chine F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 7, 28, 21, 0, 0, 'Europe/Paris'),
                'home_team_id' => 17, // Serbie F
                'exterior_team_id' => 20, // Porto Rico F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 7, 29, 11, 0, 0, 'Europe/Paris'),
                'home_team_id' => 16, // Nigéria F
                'exterior_team_id' => 15, // Australie F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 7, 29, 13, 30, 0, 'Europe/Paris'),
                'home_team_id' => 22, // Allemagne F
                'exterior_team_id' => 21, // Belgique F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 7, 29, 17, 15, 0, 'Europe/Paris'),
                'home_team_id' => 14, // Canada F
                'exterior_team_id' => 13, // France F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 7, 29, 21, 0, 0, 'Europe/Paris'),
                'home_team_id' => 23, // USA F
                'exterior_team_id' => 24, // Japon F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 7, 31, 11, 0, 0, 'Europe/Paris'),
                'home_team_id' => 20, // Porto Rico F
                'exterior_team_id' => 18, // Espagne F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 7, 31, 13, 30, 0, 'Europe/Paris'),
                'home_team_id' => 19, // Chine F
                'exterior_team_id' => 17, // Serbie F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 8, 1, 11, 0, 0, 'Europe/Paris'),
                'home_team_id' => 24, // Japon F
                'exterior_team_id' => 22, // Allemagne F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 8, 1, 13, 30, 0, 'Europe/Paris'),
                'home_team_id' => 15, // Australie F
                'exterior_team_id' => 14, // Canada F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 8, 1, 17, 15, 0, 'Europe/Paris'),
                'home_team_id' => 13, // France F
                'exterior_team_id' => 16, // Nigéria F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 8, 1, 21, 0, 0, 'Europe/Paris'),
                'home_team_id' => 21, // Belgique F
                'exterior_team_id' => 23, // USA F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 8, 3, 11, 0, 0, 'Europe/Paris'),
                'home_team_id' => 19, // Chine F
                'exterior_team_id' => 20, // Porto Rico F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 8, 3, 13, 30, 0, 'Europe/Paris'),
                'home_team_id' => 17, // Serbie F
                'exterior_team_id' => 18, // Espagne F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 8, 4, 11, 0, 0, 'Europe/Paris'),
                'home_team_id' => 24, // Japon F
                'exterior_team_id' => 21, // Belgique F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 8, 4, 13, 30, 0, 'Europe/Paris'),
                'home_team_id' => 14, // Canada F
                'exterior_team_id' => 16, // Nigéria F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 8, 4, 17, 15, 0, 'Europe/Paris'),
                'home_team_id' => 22, // Allemagne F
                'exterior_team_id' => 23, // USA F
                'competition_id' => 1,
            ],
            [
                'tour' => '',
                'sport_id' => 2,
                'date_time' => Carbon::create(2024, 8, 4, 21, 0, 0, 'Europe/Paris'),
                'home_team_id' => 15, // Australie F
                'exterior_team_id' => 13, // France F
                'competition_id' => 1,
            ],

        ];

        Game::insert($games);
    }
}
