<?php

namespace App\Http\Livewire\Board;

use Illuminate\View\View;
use Livewire\Component;

class Votes extends Component
{
    public $votes;

    /**
     * @param $votes
     */
    public function mount($votes): void
    {
        $this->votes = $votes;
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.board.votes');
    }
}
