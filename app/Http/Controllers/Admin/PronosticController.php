<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pronostic;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PronosticController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pronostic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pronostic.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pronostic_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pronostic.create');
    }

    public function edit(Pronostic $pronostic)
    {
        abort_if(Gate::denies('pronostic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pronostic.edit', compact('pronostic'));
    }

    public function show(Pronostic $pronostic)
    {
        abort_if(Gate::denies('pronostic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pronostic->load('game');

        return view('admin.pronostic.show', compact('pronostic'));
    }
}
