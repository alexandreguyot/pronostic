<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompetitionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('competition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.competition.index');
    }

    public function create()
    {
        abort_if(Gate::denies('competition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.competition.create');
    }

    public function edit(Competition $competition)
    {
        abort_if(Gate::denies('competition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.competition.edit', compact('competition'));
    }

    public function show(Competition $competition)
    {
        abort_if(Gate::denies('competition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.competition.show', compact('competition'));
    }
}
