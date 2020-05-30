<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\GameMaster;

class UserGameMaster extends Model
{
    protected $table = 'user_game_master';
    protected $primaryKey = 'id';
    protected $guarded = [];

    //protected $dateFormat = 'U';

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] =  Carbon::parse($value)->format('Y-m-d H:i:s');
    }
    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] =  Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }


    protected $with = ['games'];

    //relation
    public function games()
    {
        return $this->hasOne('App\GameMaster','id')->where('flags','=', '10000');;
    }

    
}
