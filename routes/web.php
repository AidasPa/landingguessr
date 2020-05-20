<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::middleware(['auth', 'twitch_linked'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/board', 'BoardController@show_my')->name('boards.me');
});


Route::middleware('auth')->prefix('login/twitch')->namespace('Auth')->name('twitch.')->group(function () {
    Route::get('/', 'TwitchLoginController@redirectToProvider')
        ->name('login');
    Route::get('/callback', 'TwitchLoginController@handleProviderCallback')
        ->name('callback');
});
