<?php

namespace App\Http\Controllers;

use App\Board;
use App\Events\Landed;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BoardController extends Controller
{
    /**
     * @return View
     */
    public function show_my(): View
    {
        /** @var Board $board */
        $board = Auth::user()->board;

        return view('board', [
            'board' => $board
        ]);
    }

    public function landing(Request $request): JsonResponse
    {
        $landing_rate = $request->json('landing_rate');
        /** @var Board $board */


        $board = \auth('api')->user()->board;
        $board->landing_rate = $landing_rate;

        // Disable further voting
        $board->voting_allowed = false;
        $board->save();

        // Emit an event

        event(new Landed($landing_rate, $board->id));

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
