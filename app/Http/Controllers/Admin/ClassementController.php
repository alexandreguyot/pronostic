<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classement;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('classement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classement.index');
    }

    public function create()
    {
        abort_if(Gate::denies('classement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classement.create');
    }

    public function edit(Classement $classement)
    {
        abort_if(Gate::denies('classement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classement.edit', compact('classement'));
    }

    public function show(Classement $classement)
    {
        abort_if(Gate::denies('classement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.classement.show', compact('classement'));
    }
}
