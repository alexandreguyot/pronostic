<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use App\Observers\UserObserver;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                => 1,
                'name'          => 'Guyot',
                'firstname'         => 'Alexandre',
                'email'             => 'a.pro.guyot@gmail.com',
                'password'          => bcrypt('alex'),
                'remember_token'    => null,
                'email_verified_at' => now(),
                'locale'            => 'fr',
            ]
        ];

        User::insert($users);
        foreach(User::all() as $user) {
            $observer = new UserObserver();
            $observer->created($user);
        }
    }
}
