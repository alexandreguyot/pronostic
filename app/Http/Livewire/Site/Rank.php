<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Sport;
use App\Models\Pronostic;
use Illuminate\Support\Collection;

class Rank extends Component
{
    public $results;
    public $selectedLeagueTitle;
    public $selectedSportTitle;
    public $leagues;

    private $first_league;
    private $first_sport;

    public array $ranking = []; // Initialise la propriété en tant que tableau

    public function mount()
    {
        $this->leagues = Auth::user()->leagues()->with('sports')->get();
        $this->results = $this->getRank();

        // Initialize selectedLeagueTitle with the first league title
        $this->selectedLeagueTitle = optional($this->leagues->first())->title;

        // Initialize selectedSportTitle with the first sport title of the selected league
        $firstLeague = $this->leagues->first();
        if ($firstLeague) {
            $firstSport = $firstLeague->sports->first();
            if ($firstSport) {
                $this->selectedSportTitle = in_array($firstSport->id, [5, 6, 7]) ? 'Médailles' : $firstSport->title;
            }
        }

        // Call update methods to initialize ranking
        $this->updatedSelectedLeagueTitle($this->selectedLeagueTitle);
        $this->updatedSelectedSportTitle($this->selectedSportTitle);
    }

    public function updatedSelectedLeagueTitle($value) {
        $this->selectedLeagueTitle = $value;
        $this->ranking = isset($this->results['leagues'][$this->selectedLeagueTitle])
            ? ($this->results['leagues'][$this->selectedLeagueTitle] instanceof Collection
                ? $this->results['leagues'][$this->selectedLeagueTitle]->toArray()
                : $this->results['leagues'][$this->selectedLeagueTitle])
            : [];
    }

    public function updatedSelectedSportTitle($value) {
        $this->selectedSportTitle = $value;
        $this->ranking = isset($this->results['leagues'][$this->selectedLeagueTitle]['sports'][$this->selectedSportTitle])
            ? ($this->results['leagues'][$this->selectedLeagueTitle]['sports'][$this->selectedSportTitle] instanceof Collection
                ? $this->results['leagues'][$this->selectedLeagueTitle]['sports'][$this->selectedSportTitle]->toArray()
                : $this->results['leagues'][$this->selectedLeagueTitle]['sports'][$this->selectedSportTitle])
            : [];
    }

    public function getRank() {
        $results = collect();

        $this->leagues->each(function ($league, $key) use ($results) {
            // Initialiser la structure de la ligue
            $results->put('leagues', collect());
            $results['leagues']->put($league->title, collect());

            $this->first_league = $league->title;
            $results['leagues'][$league->title]->put('sports', collect());

            // Traiter les sports de la ligue
            $league->sports->each(function ($sport, $k) use ($results, $league) {
                $this->first_sport = $sport->title;

                if (in_array($sport->id, [8, 9, 10]) ) {
                    $sportTitle = 'Médailles Paralympiques';
                } else {
                    $sportTitle = in_array($sport->id, [5, 6, 7]) ? 'Médailles' : $sport->title;
                }
                // Initialiser la structure des sports
                $results['leagues'][$league->title]['sports']->put($sportTitle, collect());
                $results['leagues'][$league->title]['sports']->put('Total', collect());

                // Traiter les utilisateurs de la ligue
                $league->users->each(function ($user) use ($results, $sport, $league, $sportTitle) {
                    // Calculer les points par sport
                    if (in_array($sport->id, [8, 9, 10])) {
                        $totalBySport = Pronostic::whereHas('game', function ($query) use ($sport) {
                            $query->whereIn('sport_id', [8, 9, 10]);
                        })
                        ->where('user_id', $user->id)
                        ->sum('points');
                    } elseif (in_array($sport->id, [5, 6, 7])) {
                        $totalBySport = Pronostic::whereHas('game', function ($query) use ($sport) {
                            $query->whereIn('sport_id', [5, 6, 7]);
                        })
                        ->where('user_id', $user->id)
                        ->sum('points');
                    } else {
                        $totalBySport = Pronostic::whereHas('game', function ($query) use ($sport) {
                            $query->where('sport_id', $sport->id);
                        })
                        ->where('user_id', $user->id)
                        ->sum('points');
                    }

                    $total = Pronostic::where('user_id', $user->id)
                    ->sum('points');

                    $user->setAttribute($sportTitle.'_sport_points', $totalBySport);
                    $user->setAttribute('Total'.'_sport_points', $total);

                    // Ajouter l'utilisateur à la collection des résultats seulement s'il n'est pas déjà présent
                    if (!$results['leagues'][$league->title]['sports'][$sportTitle]->contains('id', $user->id)) {
                        $results['leagues'][$league->title]['sports'][$sportTitle]->push($user);
                    }

                    // Ajouter l'utilisateur à la collection des résultats 'Total' seulement s'il n'est pas déjà présent
                    if (!$results['leagues'][$league->title]['sports']['Total']->contains('id', $user->id)) {
                        $results['leagues'][$league->title]['sports']['Total']->push($user);
                    }
                });
            });

            // Déplacer le groupe 'Total' à la fin de la collection des sports
            $keyToMove = 'Total';
            $value = $results['leagues'][$league->title]['sports']->pull($keyToMove);
            $results['leagues'][$league->title]['sports']->put($keyToMove, $value);
        });
        return $results;
    }

    public function render()
    {
        return view('livewire.site.rank', [
            'results' => $this->results,
            'ranking' => $this->ranking
        ]);
    }
}
