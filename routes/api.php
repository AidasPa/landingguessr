<?php

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

Route::prefix('auth')->group(function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::middleware('auth:api')->group(function () {
    Route::prefix('client')->group(function () {
        Route::post('connect', 'ClientController@connect');
        Route::post('disconnect', 'ClientController@disconnect');
    });
    Route::post('boards/me/landing', 'BoardController@landing');
    Route::post('/boards/me/votes', 'VoteController@create');
});
