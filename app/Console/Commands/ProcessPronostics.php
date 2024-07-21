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
        $pronostics = Pronostic::whereHas('game', function ($query) use ($now) {
            $query->where('date_time', '<=', $now);
        })
        ->whereNotNull('game.home_score')
        ->whereNotNull('game.exterior_score')
        ->get();

        foreach ($pronostics as $pronostic) {
            $game = $pronostic->game;

            if ($game->sport) {
                $sportId = $game->sport->id;
                $homeScore = $game->home_score;
                $awayScore = $game->exterior_score;
                $predictedHomeScore = $pronostic->score_home;
                $predictedAwayScore = $pronostic->score_exterior;

                // Determine the actual winner
                $actualWinner = $homeScore > $awayScore ? $game->home_team_id : $game->exterior_team_id;

                // Determine the predicted winner
                $predictedWinner = $predictedHomeScore > $predictedAwayScore ? $game->home_team_id : $game->exterior_team_id;

                // Check if the predicted winner is correct
                $correctWinner = $actualWinner === $predictedWinner;

                // Calculate points based on the sport and scoring rules
                $points = $correctWinner ? 2 : 0;

                if ($sportId == 2) { // Basketball
                    if (abs($homeScore - $pronostic->score_home) <= 5 && abs($awayScore - $pronostic->score_exterior) <= 5) {
                        $points += 1;
                    }
                    if (abs($homeScore - $pronostic->score_home) <= 2 && abs($awayScore - $pronostic->score_exterior) <= 2) {
                        $points += 2;
                    }
                    if ($homeScore == $pronostic->score_home && $awayScore == $pronostic->score_exterior) {
                        $points += 4;
                    }
                } elseif ($sportId == 3) { // Handball
                    if (abs($homeScore - $pronostic->score_home) <= 3 && abs($awayScore - $pronostic->score_exterior) <= 3) {
                        $points += 1;
                    }
                    if (abs($homeScore - $pronostic->score_home) <= 1 && abs($awayScore - $pronostic->score_exterior) <= 1) {
                        $points += 2;
                    }
                    if ($homeScore == $pronostic->score_home && $awayScore == $pronostic->predicted_exterior_score) {
                        $points += 4;
                    }
                }

                // Update pronostic with points
                $pronostic->update(['points' => $points]);
            }
        }

        $this->info('Pronostics processed successfully.');
    }
}
