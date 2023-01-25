<?php

use App\Http\Controllers\DivisionsController;
use App\Http\Controllers\TeamsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/divisions', [DivisionsController::class, 'index']);
Route::post('/divisions', [DivisionsController::class, 'store']);
Route::get('/teams', [TeamsController::class, 'index']);

Route::get('/teams/{name} ', [TeamsController::class, 'getTeamsByName']);

Route::post('/teams', [TeamsController::class, 'store']);
