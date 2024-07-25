<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pronostic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class HomeController
{
    public function index()
    {
        return view('admin.home');
    }

    public function debug() {
        $fixedDate = Carbon::create(2024, 7, 25, 23, 59, 59); // 25 juillet 2024 à 23:59:59

        $pronostics = Pronostic::whereHas('game', function($query) use ($fixedDate) {
            $query->where('game_id', $fixedDate);
        })->with(['game', 'game.sport'])->get();

        foreach ($pronostics as $pronostic) {
            Log::info('Deleting pronostic', ['pronostic_id' => $pronostic->id]);
            $pronostic->delete();
        }
    }
}
