<?php

namespace App\Model\Notifier;

use Illuminate\Database\Eloquent\Model;

class ParticipatingCreditorDraft extends Model
{
    protected $table = 'participating_creditors_draft';

    protected $fillable = [
        'request_id',
        'creditor_id',
    ];
}
