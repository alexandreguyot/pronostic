<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GameController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('game_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.game.index');
    }

    public function create()
    {
        abort_if(Gate::denies('game_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.game.create');
    }

    public function edit(Game $game)
    {
        abort_if(Gate::denies('game_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.game.edit', compact('game'));
    }

    public function show(Game $game)
    {
        abort_if(Gate::denies('game_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $game->load('competition', 'homeTeam', 'exteriorTeam', 'sport');

        return view('admin.game.show', compact('game'));
    }
}
