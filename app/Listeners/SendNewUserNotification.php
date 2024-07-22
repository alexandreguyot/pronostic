<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\NewUserRegistered;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNewUserNotification
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        // Get the admin user (assuming you have an admin user or you can get admin email from config)
        $admin = User::where('email', 'a.pro.guyot@gmail.com')->first();

        // Send the notification
        Notification::send($admin, new NewUserRegistered($event->user));
    }
}
