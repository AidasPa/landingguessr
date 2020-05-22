<?php

namespace App\Http\Controllers;

use App\Board;
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


}
