<?php

namespace App\Http\Controllers;

use App\Events\Voted;
use App\Vote;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        if (auth()->user()->board->voting_allowed) {

            $vote = new Vote([
                'board_id' => auth()->user()->board->id,
                'twitch_username' => $request->json('vote')['twitch_username'],
                'guess' => $request->json('vote')['guess']
            ]);
            $vote->save();
            event(new Voted($vote));
            return response()->json([
                'status' => 'ok'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'voting not allowed yet'
        ], 401);


    }
}
