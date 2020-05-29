<?php

namespace App\Model\Notifier;

use Illuminate\Database\Eloquent\Model;

class DecedentNewCreditor extends Model
{
    protected $fillable = [
        'request_id',
        'name'
    ];
}
