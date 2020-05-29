<?php

namespace App\Model\Notifier;

use Illuminate\Database\Eloquent\Model;

class DecedentNewCreditorDraft extends Model
{
    protected $table = 'decedent_new_creditors_draft';

    protected $fillable = [
        'request_id',
        'name'
    ];
}
