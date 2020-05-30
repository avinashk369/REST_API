<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameMaster extends Model
{
    protected $table = 'game_master';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
