<?php

use App\Http\Controllers\Site\HomeController as SiteHomeController;


Route::get('/', [SiteHomeController::class, 'home'])->name('home');

