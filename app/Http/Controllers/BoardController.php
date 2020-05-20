<?php

namespace App\Http\Controllers;

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
        $board = Auth::user()->board;
        return view('board');
    }
}
