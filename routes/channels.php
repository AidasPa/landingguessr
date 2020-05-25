<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('board-votes.', \App\Broadcasting\BoardVotesChannel::class);
Broadcast::channel('user-client.', function () {
//    return $user->id == \App\User::query()->find($userId)->id;
    return true;
});
Broadcast::channel('board-landings.', function () {
    return true;
});
