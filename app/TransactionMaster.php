<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionMaster extends Model
{
    protected $table = 'transaction_master';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
