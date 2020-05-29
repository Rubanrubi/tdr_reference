<?php

namespace App\Model\Notifier;

use Illuminate\Database\Eloquent\Model;

class ParticipatingCreditor extends Model
{
    protected $table = 'participating_creditors';

    protected $fillable = [
        'request_id',
        'creditor_id',
    ];
}
