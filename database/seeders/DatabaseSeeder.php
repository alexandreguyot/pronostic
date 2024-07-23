<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Observers\UserObserver;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SportTableSeeder::class,
            TeamTableSeeder::class,
            CompetitionTableSeeder::class,
            LeagueTableSeeder::class,
            GameTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            CompetitionSportTableSeeder::class,
            LeagueRelationTableSeeder::class,
        ]);

        foreach(User::all() as $user) {
            $observer = new UserObserver();
            $observer->created($user);
        }
    }
}
