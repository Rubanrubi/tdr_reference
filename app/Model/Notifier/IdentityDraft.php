<?php

namespace App\Model\Notifier;

use Illuminate\Database\Eloquent\Model;

class IdentityDraft extends Model
{
    protected $table = 'notifier_identity_draft';

    protected $fillable = [
        'request_id',
        'id_type',
        'id_number'
    ];

}
