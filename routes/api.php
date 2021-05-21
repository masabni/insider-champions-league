<?php

use App\Http\Controllers\API\LeaguesController;
use App\Http\Controllers\API\MatchesController;
use App\Http\Controllers\API\PredictionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/league', [LeaguesController::class, 'index']);

Route::get('/predictions/{week}', PredictionsController::class);

Route::group(['prefix' => 'matches'], function () {
    Route::get('/{week}', [MatchesController::class, 'index']);
    Route::post('/{week}', [MatchesController::class, 'play']);
    Route::post('/', [MatchesController::class, 'playAll']);
});
//Route::post('/play', [MatchesController::class, 'play']);
