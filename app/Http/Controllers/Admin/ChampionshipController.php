<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\League;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChampionshipController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('league_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.league.index');
    }

    public function create()
    {
        abort_if(Gate::denies('league_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.league.create');
    }

    public function edit(League $league)
    {
        abort_if(Gate::denies('league_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.league.edit', compact('league'));
    }

    public function show(League $league)
    {
        abort_if(Gate::denies('league_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $league->load('user');

        return view('admin.league.show', compact('league'));
    }
}
