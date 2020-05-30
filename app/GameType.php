<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameType extends Model
{
    protected $table = 'game_type';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
