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
        $games = Game::notPassed()->orderBy('date_time')->get();
        foreach ($games as $game) {
            $prono = Pronostic::where('game_id', $game->id)->where('user_id', Auth::user()->id)->first();
            if (!$prono) {
                $prono = new Pronostic();
                $prono->user_id = Auth::user()->id;
                $prono->game_id = $game->id;
                $prono->save();
            }
        }

    $groupedPronostics = Pronostic::with(['game', 'game.sport'])
        ->join('games', 'pronostics.game_id', '=', 'games.id')
        ->join('sports', 'games.sport_id', '=', 'sports.id')
        ->where('pronostics.user_id', Auth::user()->id)
        ->where('games.date_time', '>', Carbon::now())
        ->orderBy('games.date_time')
        ->select('pronostics.*', 'sports.id as sport_id', 'sports.title as sport_title')
        ->get()
        ->groupBy(function ($item) {
            // Regrouper les sports IDs 5, 6, et 7 sous un même titre
            if (in_array($item->sport_id, [5, 6, 7])) {
                return 'Médailles';
            }
            return $item->sport_title;
        });

        $groupedPronostics->transform(function ($pronostics, $sportTitle) {
            // Vous pouvez personnaliser le sportTitle si nécessaire, comme ajouter une condition pour le groupe 5-6-7
            if ($sportTitle === 'Médailles') {
                $sportTitle = 'Médailles'; // Donnez un nom personnalisé à ce groupe
            }

            $sport = Sport::find($pronostics->first()->sport_id);
            $mediaItem = $sport ? $sport->getPictoAttribute() : null;
            $url = $mediaItem ? $mediaItem->pluck('url')->first() : null;

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

    public function results() {
        $groupedPronostics = Pronostic::with(['game', 'game.sport'])
            ->join('games', 'pronostics.game_id', '=', 'games.id')
            ->join('sports', 'games.sport_id', '=', 'sports.id')
            ->where('pronostics.user_id', Auth::user()->id)
            ->where('games.date_time', '<', Carbon::now())
            ->orderBy('games.date_time')
            ->select('pronostics.*', 'sports.title as sport_title')
            ->get()
            ->groupBy('sport_title');

        return view('site.results', compact('groupedPronostics'));
    }

    public function rank() {
        $leagues = Auth::user()->leagues()->with(['users.pronostics.game.sport'])->get();
        $leaguesWithPoints = $leagues->map(function ($league) {
            $users = $league->users->map(function ($user) use ($league) {
                $totalPoints = 0;
                $sportsPoints = new Collection();

                foreach ($user->pronostics as $pronostic) {
                    $game = $pronostic->game;
                    if ($league->sports->contains($game->sport)) {
                        $sportTitle = $game->sport->title;
                        if (!$sportsPoints->has($sportTitle)) {
                            $sportsPoints->put($sportTitle, 0);
                        }
                        if ($game->date_time < Carbon::now() && $game->home_score !== null && $game->exterior_score !== null) {
                            $points = $pronostic->points || 0;
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

            return [
                'league' => $league,
                'users' => $users,
            ];
        });
        return view('site.rank', compact('leaguesWithPoints', 'leagues'));
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
