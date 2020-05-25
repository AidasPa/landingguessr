<?php

namespace App\Http\Livewire\Board;

use App\Board;
use App\Vote;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class Votes extends Component
{
    public $votes;
    public $boardId;

    public $boardReset = false;
    public $landingRate = false;

    /**
     * @param $votes
     * @param $boardId
     */
    public function mount($votes, Board $board): void
    {
        $this->landingRate = $board->landing_rate === NULL ? false : $board->landing_rate;
        $this->boardId = $board->id;
        $this->votes = $votes->toArray();
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
            'resetBoard',
            'echo:board-votes.' . $this->boardId . ',Voted' => 'addVote',
            'echo:board-landings.' . $this->boardId . ',Landed' => 'landed'
        ];
    }

    /**
     * @param int $landingRate
     */
    public function landed(int $landingRate): void
    {
        $this->landingRate = $landingRate;
    }

    /**
     * @param Vote $vote
     * @return void
     */
    public function addVote($vote): void
    {
        array_push($this->votes, $vote);
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
