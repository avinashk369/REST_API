<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class GameMaster extends Model
{
    protected $table = 'game_master';
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

    
    //to get nested relation use 'users.user'
    //protected $with = ['users'];

    public function scopeWithTotalPlayers($query)
    {
        $query->addSelect(['totalusers' => UserGameMaster
                ::selectRaw('count(*)')
                ->whereColumn('game_id', 'game_master.id')
            ]);
    }


    // Only active games
    public function scopeWithActive( $query, $active = false ) {
        $isActive = $active ? '1': '0';
        $query->where( \DB::raw('substr(flags, 1, 1)'), '=', $isActive );
    }

    //relation
    public function users()
    {
        return $this->hasMany('App\UserGameMaster','game_id');
    }
}
