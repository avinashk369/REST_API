<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class GameType extends Model
{
    protected $table = 'game_type';
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
}
