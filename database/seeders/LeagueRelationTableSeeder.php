<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competition;
use App\Models\Sport;
use App\Models\League;

class LeagueRelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sports = Sport::all()->pluck('id');
        $competition = Competition::all()->pluck('id');
        $league = League::findOrFail(1);
        $league->sport()->sync($sports);
        $league->competition()->sync($competition);
    }
}
