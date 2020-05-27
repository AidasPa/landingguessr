<?php

namespace App\Http\Controllers;

use App\Board;
use App\Events\Voted;
use App\Vote;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * @param Request $request
     * @param Board $board
     * @return JsonResponse
     */
    public function create(Request $request, Board $board): JsonResponse
    {
        if ($board->voting_allowed) {

            $vote = new Vote([
                'board_id' => $board->id,
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
