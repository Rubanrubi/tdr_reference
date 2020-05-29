<?php

namespace App\Model\Notifier;

use Illuminate\Database\Eloquent\Model;

class DecedentRequestDocument extends Model
{
    protected $table = 'decedent_request_document';

    protected $fillable = [
        'request_id',
        'document',
        'size'
    ];
}
