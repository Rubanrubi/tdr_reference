<?php

namespace App\Model\Notifier;

use Illuminate\Database\Eloquent\Model;

class DecedentRequestCreditor extends Model
{
    protected $fillable = [
        'request_id',
        'creditor_id',
        'asset_type',
        'account_number'
    ];
}
