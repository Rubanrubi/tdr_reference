<?php

namespace App\Model\Notifier;

use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    protected $table = 'notifier_identity';

    protected $fillable = [
        'request_id',
        'id_type',
        'id_number'
    ];

}
