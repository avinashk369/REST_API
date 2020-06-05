<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class AdminMaster extends Model
{
    use HasApiTokens;
    protected $table = 'admin_master';
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $casts = [
        'is_admin' => 'boolean',
    ];
 
    public function setFirstNameAttribute($value)
    {
        $this->attributes['access_token'] = $value;
    }

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

    public function scopeAdmin( $query,$userName) {
        $query->where('user_name','=',$userName);
    }
}
