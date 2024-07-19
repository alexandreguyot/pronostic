<?php

use App\Http\Controllers\Site\HomeController as SiteHomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::redirect('/', '/pronostics');
    Route::get('/pronostics', [SiteHomeController::class, 'pronostics'])->name('pronostics');
    Route::get('/resultats', [SiteHomeController::class, 'results'])->name('results');
    Route::get('/classements', [SiteHomeController::class, 'rank'])->name('rank');
    Route::get('/reglements', [SiteHomeController::class, 'rules'])->name('rules');
    Route::get('/ligues', [SiteHomeController::class, 'leagues'])->name('leagues');
    Route::get('/profil', [SiteHomeController::class, 'profile'])->name('profile');

    Route::get('/ligue/{league}', [SiteHomeController::class, 'league'])->name('league');
});

