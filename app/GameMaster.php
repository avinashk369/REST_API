<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use DB;

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

    
    /**
     * to enable default listing of nested relation uncomment $with 
     * to get nested relation use dot opertor like - 'users.user'
     */
    //protected $with = ['users'];

    /**
     * use scope with filters to add additional column with eloqouent model 
     */
    public function scopeWithTotalPlayers($query)
    {
        $query->addSelect(['totalusers' => UserGameMaster
                ::selectRaw('count(*)')
                ->whereColumn('game_id', 'game_master.id')
            ]);
    }


    /**
     * return only active gave
     */
    public function scopeWithActive( $query, $active = false ) {
        $this->withActive( $query, $active );
    }

    protected function withActive( $query, $active = false ) {
        $isActive = $active ? '1': '0';
        $query->where(DB::raw('substr(flags, 1, 1)'), '=', $isActive );
    }

    /**
     * Any game can have multiple users enrolled with
     */
    public function users()
    {
        return $this->hasMany('App\UserGameMaster','game_id');
    }


    public function scopeWithLnum( $query) {
        $query->where('result_master','game_master.r_num','=','result_master.r_num')
        ->orWhere('result_master','game_master.l_num','=','result_master.l_num')
        ->orWhere('result_master','game_master.p_num','=','result_master.p_num');
    }

    /**
     * game result
     */
    public function result()
    {
        return $this->hasOne('App\ResultMaster','game_id');
    }
}
