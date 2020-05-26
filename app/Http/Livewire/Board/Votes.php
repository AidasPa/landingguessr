<?php

namespace App\Http\Livewire\Board;

use App\Board;
use App\Helpers\VoteSortHelper;
use App\Vote;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class Votes extends Component
{
    public $votes;
    public $board;


    public $boardReset = false;
    public $landingRate = false;

    public $boardId;

    /**
     * @param $votes
     * @param Board $board
     */
    public function mount($votes, Board $board): void
    {
        if ($board->landing_rate === NULL) {
            $this->votes = $votes->toArray();
        } else {
            $this->landingRate = $board->landing_rate;
            $this->votes = $votes->toArray();

            $sorter = new VoteSortHelper($this->votes, $this->landingRate);
            $this->votes = $sorter->sortVotes();
        }

        $this->board = $board;
        $this->boardId = $board->id;

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
            'echo:landings.' . $this->boardId . ',Landed' => 'setLandingRate',
            'echo:board-votes.' . $this->boardId . ',Voted' => 'addVote',
        ];
    }

    /**
     * @param array $landing
     */
    public function setLandingRate(array $landing): void
    {
        $this->landingRate = $landing['landing'];

        $sorter = new VoteSortHelper($this->votes, $this->landingRate);
        $this->votes = $sorter->sortVotes();
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

        Vote::where('board_id', '=', $this->board->id)
            ->delete();
        $this->board->landing_rate = NULL;
        $this->board->save();

        $this->boardReset = true;
        $this->landingRate = false;
        $this->votes = [];
    }

}
