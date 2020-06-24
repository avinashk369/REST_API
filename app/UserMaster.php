<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class UserMaster extends Authenticatable
{
    protected $table = 'user_master';
    protected $primaryKey = 'id';
    protected $guarded = [];

    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mobile','otp','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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
}
