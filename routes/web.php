<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
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


Route::get('/event', function () {
    $faker = Faker\Factory::create();


    $vote = new \App\Vote();
    $vote->guess = -168;
    $vote->twitch_username = $faker->userName;
    $vote->board_id = 1;

    $vote->save();
    event(new \App\Events\Voted($vote));
    dd($vote);

});

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
