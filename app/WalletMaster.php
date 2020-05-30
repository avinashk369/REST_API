<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletMaster extends Model
{
    protected $table = 'wallet_master';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
