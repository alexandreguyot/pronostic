<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\League;
use App\Models\Pronostic;
use Auth;

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

        $pronostics = Pronostic::where('user_id', Auth::user()->id)->get();

        return view('site.pronostics', compact('pronostics'));
    }

    public function results() {
        $games = Game::passed()->orderBy('date_time')->get();
        return view('site.results', compact('games'));
    }

    public function rank() {
        $leagues = League::with('competition', 'user', 'sport')->get();
        return view('site.rank', compact('leagues'));
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
}
