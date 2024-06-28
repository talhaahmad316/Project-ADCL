<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\ClubController;

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

Route::get('players', [PlayerController::class, 'search']);
Route::post('players', [PlayerController::class, 'store']);
Route::put('players/{id}', [PlayerController::class, 'update']);

Route::get('clubs', [ClubController::class, 'index']);
Route::post('clubs', [ClubController::class, 'store']);
Route::put('clubs/{id}', [ClubController::class, 'update']);

