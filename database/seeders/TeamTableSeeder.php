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
                'icon'              => 'fi fi-en fis'
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
                'name'              => 'Porto Rico',
                'sport_id'          => 1,
                'group'             => 'Groupe C',
                'icon'              => 'fi fi-ss fis'
            ],
            [
                'name'              => 'Espagne',
                'sport_id'          => 1,
                'group'             => 'Groupe A',
                'icon'              => 'fi fi-es fis'
            ],
            [
                'name'              => 'Brésil',
                'sport_id'          => 1,
                'group'             => 'Groupe B',
                'icon'              => 'fi fi-br fis'
            ],
            [
                'name'              => 'Grèce',
                'sport_id'          => 1,
                'group'             => 'Groupe A',
                'icon'              => 'fi fi-gr fis'
            ],
            [
                'name'              => 'France',
                'sport_id'             => 2,
                'group'             => 'Groupe B',
                'icon'              => 'fi fi-fr fis'
            ],
            [
                'name'              => 'Canada',
                'sport_id'             => 2,
                'group'             => 'Groupe B',
                'icon'              => 'fi fi-ca fis'
            ],
            [
                'name'              => 'Australie',
                'sport_id'             => 2,
                'group'             => 'Groupe B',
                'icon'              => 'fi fi-en fis'
            ],
            [
                'name'              => 'Nigéria',
                'sport_id'             => 2,
                'group'             => 'Groupe B',
                'icon'              => 'fi fi-ng fis'
            ],
            [
                'name'              => 'Serbie',
                'sport_id'             => 2,
                'group'             => 'Groupe A',
                'icon'              => 'fi fi-rs fis'
            ],
            [
                'name'              => 'Espagne',
                'sport_id'             => 2,
                'group'             => 'Groupe A',
                'icon'              => 'fi fi-es fis'
            ],
            [
                'name'              => 'Chine',
                'sport_id'             => 2,
                'group'             => 'Groupe A',
                'icon'              => 'fi fi-cn fis'
            ],
            [
                'name'              => 'Porto Rico',
                'sport_id'             => 2,
                'group'             => 'Groupe A',
                'icon'              => 'fi fi-pr fis'
            ],
            [
                'name'              => 'Belgique',
                'sport_id'             => 2,
                'group'             => 'Groupe C',
                'icon'              => 'fi fi-be fis'
            ],
            [
                'name'              => 'Allemagne',
                'sport_id'             => 2,
                'group'             => 'Groupe C',
                'icon'              => 'fi fi-de fis'
            ],
            [
                'name'              => 'USA',
                'sport_id'             => 2,
                'group'             => 'Groupe C',
                'icon'              => 'fi fi-us fis'
            ],
            [
                'name'              => 'Japon',
                'sport_id'             => 2,
                'group'             => 'Groupe C',
                'icon'              => 'fi fi-jp fis'
            ],
            [
                'name' => 'France',
                'sport_id' => 4,
                'group' => 'Groupe B',
                'icon' => 'fi fi-fr fis'
            ],
            [
                'name' => 'Allemagne',
                'sport_id' => 4,
                'group' => 'Groupe A',
                'icon' => 'fi fi-de fis'
            ],
            [
                'name' => 'Slovénie',
                'sport_id' => 4,
                'group' => 'Groupe A',
                'icon' => 'fi fi-si fis'
            ],
            [
                'name' => 'Danemark',
                'sport_id' => 4,
                'group' => 'Groupe A',
                'icon' => 'fi fi-dk fis'
            ],
            [
                'name' => 'Pays-Bas',
                'sport_id' => 4,
                'group' => 'Groupe B',
                'icon' => 'fi fi-nl fis'
            ],
            [
                'name' => 'Angola',
                'sport_id' => 4,
                'group' => 'Groupe B',
                'icon' => 'fi fi-ao fis'
            ],
            [
                'name' => 'Espagne',
                'sport_id' => 4,
                'group' => 'Groupe B',
                'icon' => 'fi fi-es fis'
            ],
            [
                'name' => 'Brésil',
                'sport_id' => 4,
                'group' => 'Groupe B',
                'icon' => 'fi fi-br fis'
            ],
            [
                'name' => 'Corée',
                'sport_id' => 4,
                'group' => 'Groupe A',
                'icon' => 'fi fi-kr fis'
            ],
            [
                'name' => 'Hongrie',
                'sport_id' => 4,
                'group' => 'Groupe B',
                'icon' => 'fi fi-hu fis'
            ],
            [
                'name' => 'Norvège',
                'sport_id' => 4,
                'group' => 'Groupe A',
                'icon' => 'fi fi-no fis'
            ],
            [
                'name' => 'Suède',
                'sport_id' => 4,
                'group' => 'Groupe A',
                'icon' => 'fi fi-se fis'
            ],
            [
                'name' => 'Espagne',
                'sport_id' => 3,
                'group' => 'Groupe A',
                'icon' => 'fi fi-es fis'
            ],
            [
                'name' => 'Slovénie',
                'sport_id' => 3,
                'group' => 'Groupe A',
                'icon' => 'fi fi-si fis'
            ],
            [
                'name' => 'Hongrie',
                'sport_id' => 3,
                'group' => 'Groupe B',
                'icon' => 'fi fi-hu fis'
            ],
            [
                'name' => 'Égypte',
                'sport_id' => 3,
                'group' => 'Groupe B',
                'icon' => 'fi fi-eg fis'
            ],
            [
                'name' => 'Croatie',
                'sport_id' => 3,
                'group' => 'Groupe A',
                'icon' => 'fi fi-hr fis'
            ],
            [
                'name' => 'Japon',
                'sport_id' => 3,
                'group' => 'Groupe A',
                'icon' => 'fi fi-jp fis'
            ],
            [
                'name' => 'Norvège',
                'sport_id' => 3,
                'group' => 'Groupe B',
                'icon' => 'fi fi-no fis'
            ],
            [
                'name' => 'Argentine',
                'sport_id' => 3,
                'group' => 'Groupe B',
                'icon' => 'fi fi-ar fis'
            ],
            [
                'name' => 'Allemagne',
                'sport_id' => 3,
                'group' => 'Groupe A',
                'icon' => 'fi fi-de fis'
            ],
            [
                'name' => 'Suède',
                'sport_id' => 3,
                'group' => 'Groupe A',
                'icon' => 'fi fi-se fis'
            ],
            [
                'name' => 'Danemark',
                'sport_id' => 3,
                'group' => 'Groupe B',
                'icon' => 'fi fi-dk fis'
            ],
            [
                'name' => 'France',
                'sport_id' => 3,
                'group' => 'Groupe B',
                'icon' => 'fi fi-fr fis'
            ],
        ];

        Team::insert($teams);
    }
}
