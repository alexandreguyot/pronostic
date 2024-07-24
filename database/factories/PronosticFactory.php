<?php

namespace Database\Factories;

use App\Models\Pronostic;
use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PronosticFactory extends Factory
{
    protected $model = Pronostic::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Crée un utilisateur associé
            'game_id' => Game::factory(), // Crée un jeu associé
            'score_home' => $this->faker->numberBetween(0, 100),
            'score_exterior' => $this->faker->numberBetween(0, 100),
            'points' => null, // Vous pouvez définir une valeur par défaut ou la laisser null
        ];
    }
}

