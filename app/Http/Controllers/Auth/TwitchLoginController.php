<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $user = Socialite::driver('twitch')->user();
        $this->setUserHandle($user);
        return redirect(route('welcome'));
    }

    private function setUserHandle($user): void
    {
        dd($user);
    }


}
