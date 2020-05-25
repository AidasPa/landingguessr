<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Board extends Model
{
    protected $fillable = [
        'user_id', 'voting_allowed', 'landing_rate'
    ];

    protected $casts = [
        'voting_allowed' => 'boolean'
    ];

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class, 'board_id');
    }
}
