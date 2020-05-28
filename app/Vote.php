<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'twitch_username', 'guess', 'board_id', 'twitch_color', 'is_owner'
    ];
}
