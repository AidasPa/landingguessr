<?php

namespace App\Http\Livewire\Board;

use App\Board;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

class Buttons extends Component
{
    public $clientStatus = false;
    public $votingAllowed = false;

    public $board;


    /**
     * @param $board
     */
    public function mount(Board $board)
    {
        $this->clientStatus = auth()->user()->client_status;
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

    /**
     * @return array
     */
    public function getListeners(): array
    {
        return [
            'echo:user-client.' . auth()->user()->id . ',ClientStateChanged' => 'changeClientState'
        ];
    }

    /**
     * @param array $client
     * @return void
     */
    public function changeClientState(array $client): void
    {
        $this->clientStatus = $client['state'];
    }
}
