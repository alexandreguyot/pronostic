<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Pronostic;
use App\Models\Game;
use App\Models\League;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        // Récupérer tous les matchs existants
        $games = Game::all();

        // Créer un pronostic pour chaque match
        foreach ($games as $game) {
            Pronostic::create([
                'user_id' => $user->id,
                'game_id' => $game->id,
                'score_home' => null,
                'score_exterior' => null,
                'points' => null,
            ]);
        }

        $leagueId = League::find(1)->pluck('id')->toArray();
        $user->leagues()->sync($leagueId);
    }
}
