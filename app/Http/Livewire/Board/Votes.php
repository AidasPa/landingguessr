<?php

namespace App\Http\Livewire\Board;

use App\Vote;
use Illuminate\View\View;
use Livewire\Component;

class Votes extends Component
{
    public $votes;
    public $boardId;

    public $boardReset = false;

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

    /**
     * @return array
     */
    public function getListeners(): array
    {
        return [
            'resetBoard'
        ];
    }


    /**
     * @return void
     */
    public function resetBoard(): void
    {

        Vote::where('board_id', '=', $this->boardId)
            ->delete();

        $this->boardReset = true;
        $this->votes = [];
    }

}
