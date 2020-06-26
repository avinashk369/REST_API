<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class WinnerMaster extends Model
{
    protected $table = 'winner_master';
    protected $primaryKey = 'id';
    protected $guarded = [];

    //protected $dateFormat = 'U';

    /**
     * this cast muttators can be help to covert data type and return them 
     * like if my table has boolean field having 0,1 value
     * that data can be converted into true false using muttator attribute
     */
    protected $casts = [
        'is_win' => 'boolean',
        'is_lost' => 'boolean',
    ];

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

    /**
     * user game details 
     */
    public function usergames()
    {
        return $this->belongsTo('App\UserGameMaster','game_id');
    }

}
