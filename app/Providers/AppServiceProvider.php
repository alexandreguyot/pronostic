<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Observers\UserObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Request::macro('isAdmin', function () {
            return $this->getHost() === adminUrl();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale(config('app.locale'));
        Carbon::setlocale('fr_FR.UTF-8');
        setlocale(LC_TIME, 'fr_FR.UTF-8');
        setlocale(LC_MONETARY, 'fr_FR.UTF-8');
        User::observe(UserObserver::class);
    }
}
