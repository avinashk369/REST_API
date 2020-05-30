<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KycMaster extends Model
{
    protected $table = 'kyc_master';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
