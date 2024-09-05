<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\League;
use App\Models\Pronostic;
use App\Models\Sport;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function pronostics() {
        // Récupérer les ligues de l'utilisateur et leurs sports associés
        $userLeagues = Auth::user()->leagues()->with('sports')->get();
        $leagueSportIds = $userLeagues->pluck('sports.*.id')->flatten()->unique()->toArray();

        $groupedPronostics = Pronostic::with(['game', 'game.sport'])
            ->join('games', 'pronostics.game_id', '=', 'games.id')
            ->join('sports', 'games.sport_id', '=', 'sports.id')
            ->where('pronostics.user_id', Auth::user()->id)
            ->where('games.date_time', '>', Carbon::now())
            ->whereIn('sports.id', $leagueSportIds)
            ->whereNull('pronostics.deleted_at')
            ->orderBy('games.date_time')
            ->select('pronostics.*', 'sports.id as sport_id', 'sports.title as sport_title')
            ->get()
            ->groupBy(function ($item) {
                // Regrouper les sports IDs 5, 6, et 7 sous un même titre
                if (in_array($item->sport_id, [5, 6, 7])) {
                    return 'Médailles';
                }
                if (in_array($item->sport_id, [8,9,10])) {
                    return 'Médailles Paralympiques';
                }
                return $item->sport_title;
            });

        $groupedPronostics->transform(function ($pronostics, $sportTitle) {
            // Vous pouvez personnaliser le sportTitle si nécessaire, comme ajouter une condition pour le groupe 5-6-7
            if ($sportTitle === 'Médailles') {
                $sportTitle = 'Médailles';
            }
            if ($sportTitle === 'Médailles Paralympiques') {
                $sportTitle = 'Médailles Paralympiques';
            }

            $sport = Sport::find($pronostics->first()->sport_id);
            $mediaItem = $sport ? $sport->getPictoAttribute() : null;
            $url = $mediaItem ? $mediaItem->pluck('url')->first() : null;

             // Pour le groupe 'Médailles', trier les pronostics par sport_id
            if ($sportTitle === 'Médailles') {
                $pronostics = $pronostics->sortBy(function ($pronostic) {
                    return $pronostic->game->sport->id;
                });
            }

            if ($sportTitle === 'Médailles Paralympiques') {
                $pronostics = $pronostics->sortBy(function ($pronostic) {
                    return $pronostic->game->sport->id;
                });
            }

            return [
                'pronostics' => $pronostics,
                'url' => $url,
            ];
        });
        // Trier pour mettre le groupe 'Médailles' en premier
        $groupedPronostics = $groupedPronostics->sortBy(function ($value, $key) {
            return $key === 'Médailles' ? 0 : 1;
        });

        return view('site.pronostics', compact('groupedPronostics'));
    }

    public function pronos() {
        $userLeagues = Auth::user()->leagues()->with('sports')->get();
        $leagueSportIds = $userLeagues->pluck('sports.*.id')->flatten()->unique()->toArray();
        $groupedPronostics = Pronostic::with(['game', 'game.sport'])
            ->join('games', 'pronostics.game_id', '=', 'games.id')
            ->join('sports', 'games.sport_id', '=', 'sports.id')
            ->where('pronostics.user_id', Auth::user()->id)
            ->where('games.date_time', '>', Carbon::now())
            ->whereIn('sports.id', $leagueSportIds)
            ->whereNull('pronostics.deleted_at')
            ->orderBy('games.date_time')
            ->get();

        return view('site.pronos', compact('groupedPronostics'));
    }

    public function results() {
        // Récupérer les ligues de l'utilisateur et leurs sports associés
        $userLeagues = Auth::user()->leagues()->with('sports')->get();
        $leagueSportIds = $userLeagues->pluck('sports.*.id')->flatten()->unique()->toArray();
        $groupedPronostics = Pronostic::with(['game', 'game.sport'])
            ->join('games', 'pronostics.game_id', '=', 'games.id')
            ->join('sports', 'games.sport_id', '=', 'sports.id')
            ->where('pronostics.user_id', Auth::user()->id)
            ->where('games.date_time', '<', Carbon::now())
            ->whereIn('sports.id', $leagueSportIds)
            ->orderBy('games.date_time')
            ->select('pronostics.*', 'sports.id as sport_id', 'sports.title as sport_title')
            ->get()
            ->groupBy(function ($item) {
                // Regrouper les sports IDs 5, 6, et 7 sous un même titre
                if (in_array($item->sport_id, [5, 6, 7])) {
                    return 'Médailles';
                }
                if (in_array($item->sport_id, [8,9,10])) {
                    return 'Médailles Paralympiques';
                }
                return $item->sport_title;
            });

        $groupedPronostics->transform(function ($pronostics, $sportTitle) {
            // Vous pouvez personnaliser le sportTitle si nécessaire, comme ajouter une condition pour le groupe 5-6-7
            if ($sportTitle === 'Médailles') {
                $sportTitle = 'Médailles'; // Donnez un nom personnalisé à ce groupe
            }

            if ($sportTitle === 'Médailles') {
                $sportTitle = 'Médailles Paralympiques'; // Donnez un nom personnalisé à ce groupe
            }

            $sport = Sport::find($pronostics->first()->sport_id);
            $mediaItem = $sport ? $sport->getPictoAttribute() : null;
            $url = $mediaItem ? $mediaItem->pluck('url')->first() : null;

             // Pour le groupe 'Médailles', trier les pronostics par sport_id
            if ($sportTitle === 'Médailles') {
                $pronostics = $pronostics->sortBy(function ($pronostic) {
                    return $pronostic->game->sport->id; // Triez par sport_id
                });
            }
            if ($sportTitle === 'Médailles Paralympiques') {
                $pronostics = $pronostics->sortBy(function ($pronostic) {
                    return $pronostic->game->sport->id; // Triez par sport_id
                });
            }

            return [
                'pronostics' => $pronostics,
                'url' => $url,
            ];
        });
        // Trier pour mettre le groupe 'Médailles' en premier
        $groupedPronostics = $groupedPronostics->sortBy(function ($value, $key) {
            return $key === 'Médailles' ? 0 : 1;
        });

        return view('site.results', compact('groupedPronostics'));
    }

    public function results2 () {
        $userLeagues = Auth::user()->leagues()->with('sports')->get();
        $leagueSportIds = $userLeagues->pluck('sports.*.id')->flatten()->unique()->toArray();
        $groupedPronostics = Pronostic::with(['game', 'game.sport'])
            ->join('games', 'pronostics.game_id', '=', 'games.id')
            ->join('sports', 'games.sport_id', '=', 'sports.id')
            ->where('pronostics.user_id', Auth::user()->id)
            ->where('games.date_time', '<', Carbon::now())
            ->whereIn('sports.id', $leagueSportIds)
            ->whereNull('pronostics.deleted_at')
            ->orderBy('games.date_time')
            ->get();
        return view('site.results2', compact('groupedPronostics'));
    }

    public function rank() {
        return view('site.rank');
    }

    public function leagues() {
        $leagues = League::all();
        return view('site.leagues', compact('leagues'));
    }

    public function league($league) {
        $league = League::with('competition', 'user', 'sport')->where('id', $league)->firstOrFail();
        return view('site.league', compact('league'));
    }

    public function profile() {
        $user = Auth::user();
        return view('site.profile', compact('user'));
    }

    public function rules() {
        return view('site.rules');
    }
}
