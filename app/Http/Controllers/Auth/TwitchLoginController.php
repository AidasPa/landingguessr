<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Socialite;

class TwitchLoginController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function redirectToProvider(): RedirectResponse
    {
        return Socialite::driver('twitch')->redirect();
    }

    /**
     * @return RedirectResponse
     */
    public function handleProviderCallback(): RedirectResponse
    {
        $twitchAccount = Socialite::driver('twitch')->user();

        $user = Auth::user();
        $user->twitch_id = $twitchAccount->id;
        $user->save();

        return redirect(route('home'))->with([
            'linked' => true
        ]);
    }



}
