<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'pronostic_create',
            ],
            [
                'id'    => 19,
                'title' => 'pronostic_edit',
            ],
            [
                'id'    => 20,
                'title' => 'pronostic_show',
            ],
            [
                'id'    => 21,
                'title' => 'pronostic_delete',
            ],
            [
                'id'    => 22,
                'title' => 'pronostic_access',
            ],
            [
                'id'    => 23,
                'title' => 'parametre_access',
            ],
            [
                'id'    => 24,
                'title' => 'team_create',
            ],
            [
                'id'    => 25,
                'title' => 'team_edit',
            ],
            [
                'id'    => 26,
                'title' => 'team_show',
            ],
            [
                'id'    => 27,
                'title' => 'team_delete',
            ],
            [
                'id'    => 28,
                'title' => 'team_access',
            ],
            [
                'id'    => 29,
                'title' => 'classement_create',
            ],
            [
                'id'    => 30,
                'title' => 'classement_edit',
            ],
            [
                'id'    => 31,
                'title' => 'classement_show',
            ],
            [
                'id'    => 32,
                'title' => 'classement_delete',
            ],
            [
                'id'    => 33,
                'title' => 'classement_access',
            ],
            [
                'id'    => 34,
                'title' => 'championship_create',
            ],
            [
                'id'    => 35,
                'title' => 'championship_edit',
            ],
            [
                'id'    => 36,
                'title' => 'championship_show',
            ],
            [
                'id'    => 37,
                'title' => 'championship_delete',
            ],
            [
                'id'    => 38,
                'title' => 'championship_access',
            ],
            [
                'id'    => 39,
                'title' => 'competition_create',
            ],
            [
                'id'    => 40,
                'title' => 'competition_edit',
            ],
            [
                'id'    => 41,
                'title' => 'competition_show',
            ],
            [
                'id'    => 42,
                'title' => 'competition_delete',
            ],
            [
                'id'    => 43,
                'title' => 'competition_access',
            ],
            [
                'id'    => 44,
                'title' => 'game_create',
            ],
            [
                'id'    => 45,
                'title' => 'game_edit',
            ],
            [
                'id'    => 46,
                'title' => 'game_show',
            ],
            [
                'id'    => 47,
                'title' => 'game_delete',
            ],
            [
                'id'    => 48,
                'title' => 'game_access',
            ],
            [
                'id'    => 49,
                'title' => 'sport_create',
            ],
            [
                'id'    => 50,
                'title' => 'sport_edit',
            ],
            [
                'id'    => 51,
                'title' => 'sport_show',
            ],
            [
                'id'    => 52,
                'title' => 'sport_delete',
            ],
            [
                'id'    => 53,
                'title' => 'sport_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
