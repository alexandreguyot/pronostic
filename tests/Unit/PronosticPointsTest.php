<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Pronostic;
use App\Models\Game;
use App\Models\Sport;
use App\Models\User;
use App\Models\League;
use Carbon\Carbon;

class PronosticPointsTest extends TestCase
{
    use RefreshDatabase;

   /** @test */
   public function test_calculate_points_for_handball_with_draw()
   {
       $league = League::factory()->create(['id' => 1, 'title' => 'Wiztivi Pronostic']);
       $sport = Sport::factory()->create(['id' => 3, 'title' => 'Handball']);
       $game = Game::factory()->create([
           'sport_id' => $sport->id,
           'home_score' => 25,
           'exterior_score' => 25,
           'date_time' => Carbon::now()->subDay()->format('d/m/Y H:i:s')
       ]);
       $user = User::factory()->create();
       $pronostic = Pronostic::factory()->create([
           'user_id' => $user->id,
           'game_id' => $game->id,
           'score_home' => 25,
           'score_exterior' => 25,
           'points' => null
       ]);

       // Call the function to calculate points
       $this->calculatePoints();

       $pronostic->refresh();
       $this->assertEquals(10, $pronostic->points); // 2 for correct draw + 4 for exact score + 4 for exact score
   }

   /** @test */
   public function test_calculate_points_for_basketball()
   {
       $league = League::factory()->create(['id' => 1, 'title' => 'Wiztivi Pronostic']);
       $sport = Sport::factory()->create(['id' => 2, 'title' => 'Basketball']);
       $game = Game::factory()->create([
           'sport_id' => $sport->id,
           'home_score' => 90,
           'exterior_score' => 85,
           'date_time' => Carbon::now()->subDay()->format('d/m/Y H:i:s')
       ]);
       $user = User::factory()->create();
       $pronostic = Pronostic::factory()->create([
           'user_id' => $user->id,
           'game_id' => $game->id,
           'score_home' => 88,
           'score_exterior' => 84,
           'points' => null
       ]);

       // Call the function to calculate points
       $this->calculatePoints();

       $pronostic->refresh();
       $this->assertEquals(6, $pronostic->points); // 2 for correct winner + 2 + 2
   }


    /** @test */
    public function test_calculate_points_for_medals()
    {
        $league = League::factory()->create(['id' => 1, 'title' => 'Wiztivi Pronostic']);
        $sport = Sport::factory()->create(['id' => 5, 'title' => 'Médailles']);
        $game = Game::factory()->create([
            'sport_id' => $sport->id,
            'home_score' => 10,
            'exterior_score' => 0,
            'date_time' => Carbon::now()->subDay()->format('d/m/Y H:i:s')
        ]);
        $user = User::factory()->create();
        $pronostic = Pronostic::factory()->create([
            'user_id' => $user->id,
            'game_id' => $game->id,
            'score_home' => 9,
            'score_exterior' => 0,
            'points' => null
        ]);

        // Call the function to calculate points
        $this->calculatePoints();

        $pronostic->refresh();
        $this->assertEquals(8, $pronostic->points); // 8 points for +/- 5 medals
    }



    private function calculatePoints()
    {
        // Get the current date and time
        $now = Carbon::now();

        // Fetch pronostics for matches that have passed and have scores
        $pronostics = Pronostic::whereHas('game', function ($query) use ($now) {
            $query->where('date_time', '<=', $now);
        })
        ->whereHas('game', function ($query) {
            $query->whereNotNull('home_score')
                ->whereNotNull('exterior_score');
        })
        ->get();

        foreach ($pronostics as $pronostic) {
            $game = $pronostic->game;

            if ($game->sport) {
                $sportId = $game->sport->id;
                $homeScore = $game->home_score;
                $awayScore = $game->exterior_score;
                $predictedHomeScore = $pronostic->score_home;
                $predictedAwayScore = $pronostic->score_exterior;

                // Determine the actual winner or if it's a draw
                $actualWinner = $homeScore > $awayScore ? $game->home_team_id : ($homeScore < $awayScore ? $game->exterior_team_id : 'draw');
                // Determine the predicted winner or if it's a draw
                $predictedWinner = $predictedHomeScore > $predictedAwayScore ? $game->home_team_id : ($predictedHomeScore < $predictedAwayScore ? $game->exterior_team_id : 'draw');


                // Initialize points
                $points = 0;

                if (in_array($sportId, [1, 2])) { // Basketball
                    // Points for home score
                    $homeScorePoints = 0;
                    if (abs($homeScore - $predictedHomeScore) <= 7) {
                        $homeScorePoints = 1;
                    }
                    if (abs($homeScore - $predictedHomeScore) <= 5) {
                        $homeScorePoints = max($homeScorePoints, 2);
                    }
                    if ($homeScore == $predictedHomeScore) {
                        $homeScorePoints = max($homeScorePoints, 4);
                    }

                    // Points for away score
                    $awayScorePoints = 0;
                    if (abs($awayScore - $predictedAwayScore) <= 7) {
                        $awayScorePoints = 1;
                    }
                    if (abs($awayScore - $predictedAwayScore) <= 5) {
                        $awayScorePoints = max($awayScorePoints, 2);
                    }
                    if ($awayScore == $predictedAwayScore) {
                        $awayScorePoints = max($awayScorePoints, 4);
                    }

                    // Sum of points for basketball
                    $points = $homeScorePoints + $awayScorePoints;

                } elseif (in_array($sportId, [3, 4])) { // Handball
                    // Points for home score
                    $homeScorePoints = 0;
                    if (abs($homeScore - $predictedHomeScore) <= 3) {
                        $homeScorePoints = 1;
                    }
                    if (abs($homeScore - $predictedHomeScore) <= 1) {
                        $homeScorePoints = max($homeScorePoints, 2);
                    }
                    if ($homeScore == $predictedHomeScore) {
                        $homeScorePoints = max($homeScorePoints, 4);
                    }

                    // Points for away score
                    $awayScorePoints = 0;
                    if (abs($awayScore - $predictedAwayScore) <= 3) {
                        $awayScorePoints = 1;
                    }
                    if (abs($awayScore - $predictedAwayScore) <= 1) {
                        $awayScorePoints = max($awayScorePoints, 2);
                    }
                    if ($awayScore == $predictedAwayScore) {
                        $awayScorePoints = max($awayScorePoints, 4);
                    }

                    // Sum of points for handball
                    $points = $homeScorePoints + $awayScorePoints;

                } elseif (in_array($sportId, [5, 6, 7])) { // Médailles
                    $medalDifference = abs($homeScore - $predictedHomeScore);

                    // Reset points for medals
                    $points = 0;
                    if ($homeScore == $predictedHomeScore) {
                        $points = 15;
                    }
                    if ($medalDifference <= 5) {
                        $points = max($points, 8);
                    }
                    if ($medalDifference <= 7) {
                        $points = max($points, 5);
                    }
                }

                // Check for correct winner or draw
                if (in_array($sportId, [1, 2])) { // Basketball
                    if ($actualWinner === $predictedWinner) {
                        $points += 2; // 2 points for correct winner
                    }
                } elseif (in_array($sportId, [3, 4])) { // Handball
                    if ($actualWinner === $predictedWinner) {
                        $points += 2; // 2 points for correct draw
                    }
                }

                // Update pronostic with points
                $pronostic->update(['points' => $points]);
            }
        }
    }
}
