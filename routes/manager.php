<?php

use App\Http\Controllers\Admin\ChampionshipController;
use App\Http\Controllers\Admin\ClassementController;
use App\Http\Controllers\Admin\CompetitionController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PronosticController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SportController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::redirect('/', '/login');

Route::group(['as' => 'admin.', 'middleware' => ['auth', 'verified']], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Pronostic
    Route::resource('pronostics', PronosticController::class, ['except' => ['store', 'update', 'destroy']]);

    // Team
    Route::resource('teams', TeamController::class, ['except' => ['store', 'update', 'destroy']]);

    // Classement
    Route::resource('classements', ClassementController::class, ['except' => ['store', 'update', 'destroy']]);

    // League
    Route::resource('leagues', ChampionshipController::class, ['except' => ['store', 'update', 'destroy']]);

    // Competition
    Route::resource('competitions', CompetitionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Game
    Route::resource('games', GameController::class, ['except' => ['store', 'update', 'destroy']]);

    // Sport
    Route::post('sports/media', [SportController::class, 'storeMedia'])->name('sports.storeMedia');
    Route::resource('sports', SportController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
