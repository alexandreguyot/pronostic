<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Sport;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sport_id' => Sport::factory(), // Crée un sport associé
            'home_team_id' => Team::factory(), // Crée une équipe à domicile associée
            'exterior_team_id' => Team::factory(), // Crée une équipe extérieure associée
            'home_score' => $this->faker->numberBetween(0, 100),
            'exterior_score' => $this->faker->numberBetween(0, 100),
            'date_time' => Carbon::now()->addDays(rand(1, 10)), // Ajoute un jour aléatoire pour la date du match
        ];
    }
}
