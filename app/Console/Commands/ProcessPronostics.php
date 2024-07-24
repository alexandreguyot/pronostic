<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pronostic;
use Carbon\Carbon;

class ProcessPronostics extends Command
{
    protected $signature = 'pronostics:process';
    protected $description = 'Process the pronostics for completed matches and apply the scoring rules';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get the current date and time
        $now = Carbon::now();

        // Fetch pronostics for matches that have passed and have scores
        $pronostics = Pronostic::whereNull('points')
        ->whereHas('game', function ($query) use ($now) {
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
