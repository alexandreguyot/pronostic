<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            [
                'name'              => 'France',
                'sport_id'             => 1,
                'group'             => 'Groupe B',
                'icon'              => 'fi fi-fr fis'
            ],
            [
                'name'              => 'Allemagne',
                'sport_id'             => 1,
                'group'             => 'Groupe B',
                'icon'              => 'fi fi-de fis'
            ],
            [
                'name'              => 'Japon',
                'sport_id'             => 1,
                'group'             => 'Groupe B',
                'icon'              => 'fi fi-jp fis'
            ],
            [
                'name'              => 'Canada',
                'sport_id'             => 1,
                'group'             => 'Groupe A',
                'icon'              => 'fi fi-ca fis'
            ],
            [
                'name'              => 'Australie',
                'sport_id'             => 1,
                'group'             => 'Groupe A',
                'icon'              => 'fi fi-au fis'
            ],
            [
                'name'              => 'Serbie',
                'sport_id'             => 1,
                'group'             => 'Groupe A',
                'icon'              => 'fi fi-rs fis'
            ],
            [
                'name'              => 'USA',
                'sport_id'             => 1,
                'group'             => 'Groupe A',
                'icon'              => 'fi fi-us fis'
            ],
            [
                'name'              => 'Soudan du sud',
                'sport_id'             => 1,
                'group'             => 'Groupe A',
                'icon'              => 'fi fi-ss fis'
            ],
            [
                'name'              => 'France F',
                'sport_id'             => 2,
                'group'             => 'Groupe B',
                'icon'              => 'fi fi-fr fis'
            ],
            [
                'name'              => 'Canada F',
                'sport_id'             => 2,
                'group'             => 'Groupe B',
                'icon'              => 'fi fi-ca fis'
            ],
            [
                'name'              => 'Australie F',
                'sport_id'             => 2,
                'group'             => 'Groupe B',
                'icon'              => 'fi fi-as fis'
            ],
            [
                'name'              => 'Nigéria F',
                'sport_id'             => 2,
                'group'             => 'Groupe B',
                'icon'              => 'fi fi-ng fis'
            ],
            [
                'name'              => 'Serbie F',
                'sport_id'             => 2,
                'group'             => 'Groupe A',
                'icon'              => 'fi fi-sr fis'
            ],
            [
                'name'              => 'Espagne F',
                'sport_id'             => 2,
                'group'             => 'Groupe A',
                'icon'              => 'fi fi-es fis'
            ],
            [
                'name'              => 'Chine F',
                'sport_id'             => 2,
                'group'             => 'Groupe A',
                'icon'              => 'fi fi-cn fis'
            ],
            [
                'name'              => 'Porto Rico F',
                'sport_id'             => 2,
                'group'             => 'Groupe A',
                'icon'              => 'fi fi-pr fis'
            ],
            [
                'name'              => 'Belgique F',
                'sport_id'             => 2,
                'group'             => 'Groupe C',
                'icon'              => 'fi fi-be fis'
            ],
            [
                'name'              => 'Allemagne F',
                'sport_id'             => 2,
                'group'             => 'Groupe C',
                'icon'              => 'fi fi-de fis'
            ],
            [
                'name'              => 'USA F',
                'sport_id'             => 2,
                'group'             => 'Groupe C',
                'icon'              => 'fi fi-us fis'
            ],
            [
                'name'              => 'Japon F',
                'sport_id'             => 2,
                'group'             => 'Groupe C',
                'icon'              => 'fi fi-jp fis'
            ],
        ];

        Team::insert($teams);
    }
}
