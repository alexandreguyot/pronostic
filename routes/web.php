<?php

use App\Http\Controllers\Site\HomeController as SiteHomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::redirect('/', '/login');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/pronostics', [SiteHomeController::class, 'pronostics'])->name('pronostics');
    Route::get('/resultats', [SiteHomeController::class, 'results'])->name('results');
    Route::get('/classements', [SiteHomeController::class, 'rank'])->name('rank');
    Route::get('/ligues', [SiteHomeController::class, 'leagues'])->name('leagues');
    Route::get('/profil', [SiteHomeController::class, 'profile'])->name('profile');

    Route::get('/ligue/{league}', [SiteHomeController::class, 'league'])->name('league');
});

