<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pronostic;
use App\Models\User;
use App\Models\League;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;

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

    public function processPronostic() {
        Artisan::call('pronostics:process');
        // Optionally return a response
        return response()->json(['message' => 'Pronostics processing started.']);
    }

    public function duplicatePronostic() {
        $userBCR = User::whereId(6)->first();
        $user = User::whereId(1)->first();
        $leagueBCR = League::whereId(2)->first();

        $pronostics = Pronostic::with('game')
        ->where('user_id', $user->id)
        ->whereHas('game', function ($query) {
            $query->where('date_time', '>', Carbon::tomorrow());
            $query->whereIn('sport_id', [1,3]);
        })
        ->get();
        $pronostics->each(function ($item, $key) use ($userBCR) {
            $prono = Pronostic::where('user_id', $userBCR->id)->where('game_id', $item->game_id)->first();
            $prono->score_home = $item->score_home;
            $prono->score_exterior = $item->score_exterior;
            $prono->save();
        });
    }
}
