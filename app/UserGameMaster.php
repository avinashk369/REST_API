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

    /**
     * this cast muttators can be help to covert data type and return them 
     * like if my table has boolean field having 0,1 value
     * that data can be converted into true false using muttator attribute
     */
    protected $casts = [
        'is_left' => 'boolean',
        'is_right' => 'boolean',
        'is_pair' => 'boolean',
    ];

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


    //protected $with = ['games'];

    /**
     * game details 
     */
    public function games()
    {
        return $this->belongsTo('App\GameMaster','game_id');
    }

    /**
     * user details
     */
    public function user()
    {
        return $this->belongsTo('App\UserMaster','user_id');
    }

    

    
}
