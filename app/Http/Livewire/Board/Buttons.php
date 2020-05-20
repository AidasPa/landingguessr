<?php

namespace App\Http\Livewire\Board;

use App\Board;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

class Buttons extends Component
{
    public $clientConnected = false;
    public $votingAllowed = false;

    public $board;

    /**
     * @param $board
     */
    public function mount(Board $board)
    {
        $this->board = $board;
        $this->votingAllowed = $board->votingAllowed;
    }

    public function allowVoting()
    {
        $this->board->votingAllowed = true;
        $this->board->save();
        $this->votingAllowed = true;
    }

    public function stopVoting()
    {
        $this->board->votingAllowed = false;
        $this->board->save();
        $this->votingAllowed = false;
    }


    /**
     * @return Factory|View
     */
    public function render(): View
    {
        return view('livewire.board.buttons');
    }
}
