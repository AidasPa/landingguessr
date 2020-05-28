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
                'twitch_color' => $request->json('vote')['twitch_color'],
                'guess' => $request->json('vote')['guess']
            ]);


            if ($request->json('vote')['twitch_id'] === $board->user()->twitch_id) {
                $vote->is_owner = true;
            }
            // Save the vote
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
