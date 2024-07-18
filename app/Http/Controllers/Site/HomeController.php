<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\League;
use Auth;

class HomeController extends Controller
{
    public function pronostics() {
        $games = Game::notPassed()->orderBy('date_time')->get();
        return view('site.pronostics', compact('games'));
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
