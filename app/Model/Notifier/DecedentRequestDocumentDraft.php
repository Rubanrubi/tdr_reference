<?php

namespace App\Model\Notifier;

use Illuminate\Database\Eloquent\Model;

class DecedentRequestDocumentDraft extends Model
{
    protected $table = 'decedent_request_documents_draft';

    protected $fillable = [
        'request_id',
        'document',
        'size'
    ];
}
