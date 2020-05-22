<?php

namespace App\Http\Livewire\Board;

use Illuminate\View\View;
use Livewire\Component;

class Votes extends Component
{
    public $votes;
    public $boardId;
    public $test = 'no';

    /**
     * @param $votes
     * @param $boardId
     */
    public function mount($votes, $boardId): void
    {
        $this->boardId = $boardId;
        $this->votes = $votes;
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.board.votes');
    }


    public function testf() {
        $this->test = 'yes';
    }
    public function getListeners()
    {
        return [
            'echo:board-votes.' . $this->boardId . ',Voted' => 'testf'
        ];
    }

}
