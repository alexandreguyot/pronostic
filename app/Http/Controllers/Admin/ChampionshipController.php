<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Championship;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChampionshipController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('championship_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.championship.index');
    }

    public function create()
    {
        abort_if(Gate::denies('championship_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.championship.create');
    }

    public function edit(Championship $championship)
    {
        abort_if(Gate::denies('championship_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.championship.edit', compact('championship'));
    }

    public function show(Championship $championship)
    {
        abort_if(Gate::denies('championship_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $championship->load('user');

        return view('admin.championship.show', compact('championship'));
    }
}
