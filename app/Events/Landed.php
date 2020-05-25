<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Landed implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var integer
     */
    public $landingRate;
    public $boardId;

    /**
     * Create a new event instance.
     *
     * @param integer $landingRate
     * @param int $boardId
     */
    public function __construct(int $landingRate, int $boardId)
    {
        $this->landingRate = $landingRate;
        $this->boardId = $boardId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn(): Channel
    {
        return new Channel('board-landings.' . $this->boardId);
    }

    public function broadcastWith(): array
    {
        return [
            'landing' => $this->landingRate
        ];
    }
}
