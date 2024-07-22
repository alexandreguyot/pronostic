<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\League;
use App\Models\Pronostic;
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
            ->select('pronostics.*', 'sports.title as sport_title')
            ->get()
            ->groupBy('sport_title');

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
                            $points = calculatePoints($pronostic);
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

    function calculatePoints($pronostic) {
        // Logique pour calculer les points
        $points = 0;

        // Points pour le bon vainqueur
        if (($pronostic->game->home_score > $pronostic->game->exterior_score && $pronostic->score_home > $pronostic->score_exterior) ||
            ($pronostic->game->home_score < $pronostic->game->exterior_score && $pronostic->score_home < $pronostic->score_exterior) ||
            ($pronostic->game->home_score == $pronostic->game->exterior_score && $pronostic->score_home == $pronostic->score_exterior)) {
            $points += 2;
        }

        // Points bonus pour le basket
        if ($pronostic->game->sport->title == 'Basket') {
            if (abs($pronostic->game->home_score - $pronostic->score_home) <= 5) {
                $points += 1;
            }
            if (abs($pronostic->game->home_score - $pronostic->score_home) <= 2) {
                $points += 2;
            }
            if ($pronostic->game->home_score == $pronostic->score_home && $pronostic->game->exterior_score == $pronostic->score_exterior) {
                $points += 4;
            }
        }

        // Points bonus pour le handball
        if ($pronostic->game->sport->title == 'Handball') {
            if (abs($pronostic->game->home_score - $pronostic->score_home) <= 3) {
                $points += 1;
            }
            if (abs($pronostic->game->home_score - $pronostic->score_home) <= 1) {
                $points += 2;
            }
            if ($pronostic->game->home_score == $pronostic->score_home && $pronostic->game->exterior_score == $pronostic->score_exterior) {
                $points += 4;
            }
        }

        return $points;
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
