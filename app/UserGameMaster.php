<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGameMaster extends Model
{
    protected $table = 'user_game_master';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
