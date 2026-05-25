<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\LandmarkController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/country/{country}', [CountryController::class, 'show'])
     ->where('country', 'cambodia|philippines')
     ->name('country.show');

Route::get('/landmark/{landmark:slug}', [LandmarkController::class, 'show'])
     ->name('landmark.show');

Route::post('/favorites/toggle/{landmark:slug}', [LandmarkController::class, 'toggleFavorite'])
    ->name('favorites.toggle');

Route::get('/favorites', [LandmarkController::class, 'favorites'])
     ->name('favorites.index');

Route::get('/search', [HomeController::class, 'search'])->name('search');