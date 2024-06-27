<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class HomeController extends Controller
{
    public function home() {
        $games = Game::orderBy('date_time')->get();
        return view('site.home', compact('games'));
    }
}
