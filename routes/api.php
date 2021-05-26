<?php

use App\Http\Controllers\API\LeaguesController;
use App\Http\Controllers\API\MatchesController;
use App\Http\Controllers\API\PredictionsController;
use App\Http\Controllers\API\WeeksController;
use Illuminate\Support\Facades\Route;

Route::get('/weeks/current', [WeeksController::class, 'current']);

Route::get('/league', [LeaguesController::class, 'index']);

Route::get('/predictions', PredictionsController::class);

Route::group(['prefix' => 'matches'], function () {
    Route::get('/{week}', [MatchesController::class, 'index']);
    Route::post('/', [MatchesController::class, 'play']);
    Route::post('/playAll', [MatchesController::class, 'playAll']);
});
