<?php

namespace App\Http\Controllers\Admin;


use App\Models\Pronostic;
use Carbon\Carbon;


class HomeController
{
    public function index()
    {
        return view('admin.home');
    }

    public function debug() {
        $pronostics = Pronostic::with(['game', 'game.sport'])
            ->join('games', 'pronostics.game_id', '=', 'games.id')
            ->where('games.date_time', '<', Carbon::now()->endOfDay())->get();

        foreach($pronostics as $pronostic) {
            $pronostic->delete();
        }
    }
}
