<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competition;
use App\Models\Sport;
use App\Models\League;
use App\Models\User;

class LeagueRelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sports = Sport::all()->pluck('id');
        $competitions = Competition::all()->pluck('id');
        $users = User::all()->pluck('id');
        $league = League::findOrFail(1);
        $league->sports()->sync($sports);
        $league->competitions()->sync($competitions);
        $league->users()->sync($users);
    }
}
