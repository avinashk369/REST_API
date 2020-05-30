<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithdrawMaster extends Model
{
    protected $table = 'withdraw_master';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
