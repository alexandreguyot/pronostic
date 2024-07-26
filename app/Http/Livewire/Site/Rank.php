<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Sport;
use App\Models\Pronostic;
use Illuminate\Support\Collection;

class Rank extends Component
{
    public $leagues;
    public $selectedLeagueId;
    public $selectedSportTitle;
    public $leaguesWithPoints;
    public $sports;

    public function mount()
    {
        $this->leagues = Auth::user()->leagues()->with(['users.pronostics.game.sport', 'sports'])->get();
        $this->selectedLeagueId = $this->leagues->first()->id ?? null;
        $this->updateSports();
        $this->selectedSportTitle = $this->sports->first() ?? null;
        $this->updateLeaguesWithPoints();
    }

    public function updatedSelectedLeagueId()
    {
        $this->updateSports();
        $this->selectedSportTitle = $this->sports->first() ?? null;
        $this->updateLeaguesWithPoints();
    }

    public function updatedSelectedSportTitle()
    {
        $this->updateLeaguesWithPoints();
    }

    private function updateSports()
    {
        $selectedLeague = $this->leagues->firstWhere('id', $this->selectedLeagueId);
        if ($selectedLeague) {
            $this->sports = $selectedLeague->sports->map(function ($sport) {
                return in_array($sport->id, [5, 6, 7]) ? 'Médailles' : $sport->title;
            })->unique()->concat(collect(['Total']));
        } else {
            $this->sports = collect();
        }
    }

    private function updateLeaguesWithPoints()
    {
        $this->leaguesWithPoints = $this->leagues->map(function ($league) {
            $users = $league->users->map(function ($user) use ($league) {
                $totalPoints = 0;
                $sportsPoints = collect();

                foreach ($user->pronostics as $pronostic) {
                    $game = $pronostic->game;
                    if ($league->sports->contains($game->sport)) {
                        $sportTitle = in_array($game->sport->id, [5, 6, 7]) ? 'Médailles' : $game->sport->title;
                        if (!$sportsPoints->has($sportTitle)) {
                            $sportsPoints->put($sportTitle, 0);
                        }

                        if (Carbon::now()->gte(Carbon::createFromFormat(config('project.datetime_format'), $game->date_time)) && $game->home_score !== null && $game->exterior_score !== null) {
                            $points = $pronostic->points ?? 0;
                            $totalPoints += $points;
                            $sportsPoints[$sportTitle] += $points;
                        }
                    }
                }

                // Ajouter les points au modèle utilisateur
                $user->setAttribute('total_points', $totalPoints);
                $user->setAttribute('sports_points', $sportsPoints);

                return $user;
            })->sortByDesc('total_points');

            // Ajouter le groupe "Total" pour les points totaux de tous les sports
            $usersWithTotal = $users->map(function ($user) {
                $totalPoints = $user->total_points;
                $user->sports_points->put('Total', $totalPoints);
                return $user;
            });

            return [
                'league' => $league,
                'users' => $usersWithTotal,
            ];
        });
    }

    public function render()
    {
        return view('livewire.site.rank', [
            'leaguesWithPoints' => $this->leaguesWithPoints,
            'leagues' => $this->leagues,
            'sports' => $this->sports,
        ]);
    }
}
